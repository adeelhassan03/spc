<?php

namespace Modules\Faq\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Helpers\StringHelper;
use App\Helpers\UploadHelper;
use Modules\Article\Entities\Category;
use App\Models\Track;
use Modules\Article\Entities\Page;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Service\Entities\Service;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;
use App\Models\Faq;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param bool $isTrashed
     * @return \Illuminate\Http\Response
     */
    public function index($isTrashed = false)
    {

        if (request()->ajax()) {
        
            
                if ($isTrashed) {
                
                $faqItems= Faq::onlyTrashed()->orderBy('id', 'desc')->get();
                // orderBy('id', 'desc')
                // ->whereNotNull('deleted_at')
                // ->get();
                // onlyTrashed()->orderBy('id', 'desc')->get();
            } else {
                $faqItems = Faq::orderBy('category')->orderBy('id', 'desc')->get();

            }

            
            $datatable = DataTables::of($faqItems, $isTrashed)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) use ($isTrashed) {
                        $csrf = csrf_field();
                        $method_delete = method_field("delete");

                            $method_put = "" . method_field("put") . "";
                        $html = '';
                        if ($row->deleted_at === null) {
                            $deleteRoute = route('admin.faq.destroy', [$row->id]);
                            $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1 " title="Edit FAQ Details" href="' . route('admin.faq.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete FAQ Item" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        } else {
                            $deleteRoute = route('admin.faq.trashed.destroy', [$row->id]);
                            $revertRoute = route('admin.faq.trashed.revert', [$row->id]);
                            $html .= '<a class="btn waves-effect waves-light btn-warning btn-sm btn-circle ml-1" title="Revert Back" id="revertItem' . $row->id . '"><i class="fa fa-check"></i></a>';
                            $html .= '
                                <form id="revertForm' . $row->id . '" action="' . $revertRoute . '" method="post" style="display:none">' . $csrf . $method_put . '
                                    <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                            class="fa fa-check"></i> Confirm Revert</button>
                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                            class="fa fa-times"></i> Cancel</button>
                                </form>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete FAQ Item Permanently" id="deleteItemPermanent' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        }

                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Pdf will be deleted as trashed!",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                            });
                        </script>';
                        $html .= '<script>
                            $("#deleteItemPermanent' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Pdf will be deleted permanently, both from trash!",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#revertItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "FAQ will be reverted back from trash!",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, Revert Back!"
                                }).then((result) => { if (result.value) {$("#revertForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '
                            <form id="deleteForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Delete</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';

                        $html .= '
                            <form id="deletePermanentForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Permanent Delete</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';
                        return $html;
                    }
                )
                ->editColumn('title', function ($row) {
                    return $row->title;
                });

            $rawColumns = ['action', 'title'];
            return $datatable->rawColumns($rawColumns)->make(true);
        }
        $countFaqItems = Faq::count();
        $countTrashedFaqItems = Faq::onlyTrashed()->count();
        $activeFaqItems = Faq::where('status', 1)->count();


        return view('faq::faq.index', compact('countFaqItems', 'countTrashedFaqItems','activeFaqItems'));
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('faq::faq.create');
    }

    public function store(Request $request)
    {
    
        $request->validate([
            'category' => 'required',
            'status' => 'required',
            'pdf.*' => 'required|mimes:pdf|max:100240', 
        ]);

    
        $pdfPaths = [];
        foreach ($request->file('pdf') as $pdf) {
            $pdfName = $pdf->getClientOriginalName();
            $destinationPath = 'assets/images/faq_pdfs'; 
            $pdf->move(public_path($destinationPath), $pdfName);
            $pdfPaths[] = $pdfName; 
        }

        foreach ($pdfPaths as $pdfPath) {
            Faq::create([
                'category' => $request->category,
                'status' => $request->status,
                'pdf' => $pdfPath, 
                'created_by' => auth()->id(), 
            ]);
        }

        return redirect()->back()->with('success', 'PDFs uploaded successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
   public function show($id)
    {
        $faqItem = Faq::findOrFail($id);
        $pdfFile = $faqItem->pdf; 
        return view('faq::faq.show', compact('faqItem'));
    }

    public function edit($id)
    {
        $faqItem = Faq::findOrFail($id);
        return view('faq::faq.edit', compact('faqItem'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string',
            'status' => 'required|in:Active,Inactive',
            'pdf' => 'nullable|file|mimes:pdf|max:100240', 
        ]);

        try {
            $faqItem = Faq::findOrFail($id);
            $data = [
                'category' => $request->category,
                'status' => $request->status,
            ];

            if ($request->hasFile('pdf')) {
                $pdfName = $request->file('pdf')->getClientOriginalName();
                $destinationPath = 'assets/images/faq_pdfs';
                $request->file('pdf')->move(public_path($destinationPath), $pdfName);
                $data['pdf'] = $pdfName;
            }

            $faqItem->update($data);

            return redirect()->route('admin.faq.index')->with('success', 'FAQ updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update the FAQ item. Error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage and delete associated file.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $faqItem = Faq::findOrFail($id);

            if (is_null($faqItem)) {
                session()->flash('error', "The page is not found !");
                return redirect()->route('admin.faq.trashed');
            }
            $faqItem->deleted_at = Carbon::now();
            $faqItem->deleted_by = Auth::id();
            $faqItem->status = 0;
            $faqItem->save();

            $filePath = public_path('public/assets/images/faq_pdfs/' . $faqItem->pdf);

            if (file_exists($filePath)) {
                unlink($filePath);
            }


            $faqItem->delete();
            session()->flash('success', 'Faq has been deleted successfully as trashed !!');
            return redirect()->route('admin.faq.trashed');
            // return redirect()->route('admin.faq.index')->with('success', 'PDF deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete PDF . Error: ' . $e->getMessage());
        }
    }





    public function destroyTrash($id)
    {
        $faqItem = Faq::withTrashed()->find($id);

        if (is_null($faqItem)) {
            session()->flash('error', "The FAQ item is not found !");
            return redirect()->route('admin.faq.trashed');
        }

        if (!is_null($faqItem->pdf)) {
            $filePath = public_path('assets/images/faq_pdfs/' . $faqItem->pdf);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $faqItem->forceDelete();

        session()->flash('success', 'FAQ have been deleted permanently !!');
        return redirect()->route('admin.faq.trashed');
    }
    /**
     * Restore a FAQ from trash.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function revertFromTrash($id)
    {
        try {
        


            $faq = Faq::withTrashed()->find($id);

            if (is_null($faq)) {
                return redirect()->route('admin.faq.trashed')->with('error', 'FAQ not found!');
            }

            $faq->deleted_at = null;
            $faq->deleted_by = null;
            $faq->status="Active";
            $faq->save();
            return redirect()->route('admin.faq.trashed')->with('success', 'FAQ has been restored successfully!');
        } catch (\Exception $e) {
    
            return redirect()->back()->with('error', 'Failed to restore FAQ. Error: ' . $e->getMessage());
        }
    }


    /**
     * trashed
     *
     * @return view the trashed data list -> which data status = 0 and deleted_at != null
     */
    public function trashed()
    {
        
        return $this->index(true);
    }



}
