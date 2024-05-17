<?php

namespace Modules\Catalog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Catalog;

use App\Helpers\StringHelper;
use App\Helpers\UploadHelper;

use Modules\Article\Entities\Category;
use App\Models\Track;
// use Modules\Catalog\Entities\Catalog;
use Modules\Article\Entities\Page;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Yajra\DataTables\Facades\DataTables;

class CatalogController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($isTrashed = false)
    {
        if (request()->ajax()) {
            if ($isTrashed) {
                $catalogs = Catalog::onlyTrashed()->orderBy('id', 'desc')->get();
            } else {
                $catalogs = Catalog::orderBy('id', 'desc')
                    ->whereNull('deleted_at')
                    ->where('status', 1)
                    ->get();
            }
    
            $datatable = DataTables::of($catalogs, $isTrashed)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) use ($isTrashed) {
                        $html = '';
                        $csrf = csrf_field();
                        $method_delete = method_field("delete");
                        $method_put = method_field("put");
    
                        // $html .= '<a class="btn waves-effect waves-light btn-info btn-sm btn-circle" title="View Catalog Details" href="' . route('admin.catalog.show', $row->id) . '"><i class="fa fa-eye"></i></a>';
    
                        if ($row->deleted_at === null) {
                            $deleteRoute =  route('admin.catalog.destroy', [$row->id]);
                            // if ($this->user->can('catalog.edit')) {
                                $html .= '<a class="btn waves-effect waves-light btn-info btn-sm btn-circle" title="View Catalog Details" href="' . route('admin.catalog.show', $row->id) . '"><i class="fa fa-eye"></i></a>';
                                $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1" title="Edit Catalog Details" href="' . route('admin.catalog.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
                            // }
                            // if ($this->user->can('catalog.delete')) {
                                $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Catalog" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';
                            // }
                        } else {
                            $deleteRoute =  route('admin.catalog.trashed.destroy', [$row->id]);
                            $revertRoute = route('admin.catalog.trashed.revert', [$row->id]);
                            // if ($this->user->can('catalog.delete')) {
                                $html .= '<a class="btn waves-effect waves-light btn-warning btn-sm btn-circle ml-1" title="Revert Back" id="revertItem' . $row->id . '"><i class="fa fa-check"></i></a>';
                                $html .= '<form id="revertForm' . $row->id . '" action="' . $revertRoute . '" method="post" style="display:none">' . $csrf . $method_put . '
                                    <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i class="fa fa-check"></i> Confirm Revert</button>
                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                </form>';
                                $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Catalog Permanently" id="deleteItemPermanent' . $row->id . '"><i class="fa fa-trash"></i></a>';
                            // }
                        }
    
                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Catalog will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                            });
                        </script>';
    
                        // if ($this->user->can('catalog.delete')) {
                            $html .= '<script>
                            $("#deleteItemPermanent' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Catalog will be deleted permanently, both from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                            });
                        </script>';
                        // }
    
                        $html .= '<script>
                            $("#revertItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Catalog will be revert back from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, Revert Back!"
                                }).then((result) => { if (result.value) {$("#revertForm' . $row->id . '").submit();}})
                            });
                        </script>';
    
                        $html .= '<form id="deleteForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                            <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i class="fa fa-check"></i> Confirm Delete</button>
                            <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                        </form>';
    
                        $html .= '<form id="deletePermanentForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                            <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i class="fa fa-check"></i> Confirm Permanent Delete</button>
                            <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                        </form>';
    
                        return $html;
                    }
                )
                ->editColumn('title', function ($row) {
                    return $row->title;
                })

                ->editColumn('image', function ($row) {
                    if ($row->image != null) {
                        return "<img src='" . asset('public/assets/images/catalog/' . $row->image) . "' class='img img-display-list' />";
                    }
                    return '-';
                })
                ->addColumn('category', function ($row) {
                    $html = "";
                    $category = Category::find($row->category_id);
                    if (!is_null($category)) {
                        $html .= "<span>" . $category->name . "</span>";
                    } else {
                        $html .= "-";
                    }
                    return $html;
                })
                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="badge badge-success font-weight-100">Active</span>';
                    } else if ($row->deleted_at != null) {
                        return '<span class="badge badge-danger">Trashed</span>';
                    } else {
                        return '<span class="badge badge-warning">Inactive</span>';
                    }
                })
                ->addColumn('pdf_link', function ($row) {
                    return '<a href="' . asset('public/assets/pdf/catalog/' . $row->pdf) . '">PDF</a>';
                });

            $rawColumns = ['action', 'title', 'status', 'category', 'banner_image', 'image', 'pdf_link'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);


           
        }
    
        $count_catalogs = Catalog::count();
        $count_active_catalogs = Catalog::where('status', 1)->count();
    
        $count_trashed_catalogs = Catalog::onlyTrashed()->count();

    
        return view('catalog::index', compact('count_catalogs', 'count_active_catalogs','count_trashed_catalogs'));
    }
    
    
    

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('catalog::create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'part_no' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:50000',
            'status' => 'required|in:0,1',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('public/assets/images/catalog'), $imageName);

        $pdfName = null;

        if ($request->hasFile('pdf')) {
            $pdfName = time() . '.' . $request->pdf->extension();
            $request->pdf->move(public_path('public/assets/pdf/catalog'), $pdfName);
        }

        Catalog::create([
            'title' => $request->title,
            'part_no' => $request->part_no,
            'description' => $request->description,
            'image' => $imageName,
            'pdf' => $pdfName,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.catalog.index')->with('success','Catalog created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {

        // if (is_null($this->user) || !$this->user->can('catalog.view')) {
        //     $message = 'You are not allowed to access this page!';
        //     return view('errors.403', compact('message'));
        // }
        $catalog = Catalog::find($id);

        if (!$catalog) {
            session()->flash('error', 'The catalog entry is not found!');
            return redirect()->route('admin.catalog.index');
        }
        return view('catalog::edit', compact( 'catalog'));
    }
    

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        // if (is_null($this->user) || !$this->user->can('catalog.edit')) {
        //     $message = 'You are not allowed to access this page !';
        //     return view('errors.403', compact('message'));
        // }
        
        $catalog = Catalog::find($id); 
        return view('catalog::edit', compact('catalog'));
    }
    

    public function update(Request $request, $id)
    {
        $catalog = Catalog::find($id);
        if (is_null($catalog)) {
            session()->flash('error', "The catalog is not found !");
            return redirect()->route('admin.catalog.index');
        }
    
        $request->validate([
            'title' => 'required|max:100',
            'part_no' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:50000', 
            'status' => 'required|in:0,1',
        ]);
    
        try {
            DB::beginTransaction();

            $catalog->title = $request->title;
            $catalog->part_no = $request->part_no;
            $catalog->description = $request->description;
            $catalog->status = $request->status;

            if (!is_null($request->image)) {
                if ($catalog->image) {
                    $oldImagePath = public_path('public/assets/images/catalog') . '/' . $catalog->image;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $imageName = time() . '.' . $request->image->extension();  
                $request->image->move(public_path('public/assets/images/catalog'), $imageName);
    
                $catalog->image = $imageName;
            }

            if (!is_null($request->pdf)) {
                if ($catalog->pdf) {
                    $oldPdfPath = public_path('public/assets/pdf/catalog') . '/' . $catalog->pdf;
                    if (file_exists($oldPdfPath)) {
                        unlink($oldPdfPath);
                    }
                }
                $pdfName = time() . '.' . $request->pdf->extension();  
                $request->pdf->move(public_path('public/assets/pdf/catalog'), $pdfName);
    
                $catalog->pdf = $pdfName;
            }
    
            $catalog->updated_by = Auth::id();
            $catalog->updated_at = now();
            $catalog->save();
    
            DB::commit();
    
            session()->flash('success', 'Catalog has been updated successfully !!');
            return redirect()->route('admin.catalog.index');
        } catch (\Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
        {
            // Authorization check
            // if (is_null($this->user) || !$this->user->can('catalog.delete')) {
            //     $message = 'You are not allowed to access this page !';
            //     return view('errors.403', compact('message'));
            // }

            // Find the catalog
            $catalog = Catalog::find($id);
            if (is_null($catalog)) {
                session()->flash('error', "The page is not found !");
                return redirect()->route('admin.catalog.index');
            }

            try {
                // Soft delete the catalog
                $catalog->deleted_at = Carbon::now();
                $catalog->deleted_by = Auth::id();
                $catalog->status = 0;
                $catalog->save();

                session()->flash('success', 'Catalog has been deleted successfully as trashed !!');
                return redirect()->route('admin.catalog.index');
            } catch (\Exception $e) {
                session()->flash('sticky_error', $e->getMessage());
                return back();
            }
        }

    /**
     * Revert the catalog from trash to active by setting deleted_at to null.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function revertFromTrash($id)
    {
        try {
            $catalog = Catalog::withTrashed()->find($id);
            if (is_null($catalog)) {
                return redirect()->route('admin.catalog.trashed')->with('error', 'Catalog not found!');
            }
            $catalog->deleted_at = null;
            $catalog->deleted_by = null;
            $catalog->status = 1;
            $catalog->save();
            return redirect()->route('admin.catalog.trashed')->with('success', 'Catalog has been restored successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to restore catalog. Error: ' . $e->getMessage());
        }
    }


    /**
     * Permanently delete the catalog data.
     *
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function destroyTrash($id)
    {
        try {
            $catalog = Catalog::withTrashed()->find($id);
            if (is_null($catalog)) {
                session()->flash('error', "The catalog is not found !");
                return redirect()->route('admin.catalog.trashed');
            }
            if (!empty($catalog->image)) {
                $imagePath = public_path('public/assets/images/catalog') . '/' . $catalog->image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $catalog->forceDelete();

            session()->flash('success', 'Catalog has been deleted permanently !!');
            return redirect()->route('admin.catalog.trashed');
        } catch (\Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            return back();
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
