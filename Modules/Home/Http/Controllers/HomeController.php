<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Banner; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Service\Entities\Service;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }
    public function index($isTrashed = false)
    {
        if (request()->ajax()) {
            if ($isTrashed) {
                $banners = Banner::orderBy('id', 'desc')->get();
            } else {
                $banners = Banner::orderBy('id', 'desc')->get();
            }
    
            $datatable = DataTables::of($banners)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) use ($isTrashed) {
                        $csrf = csrf_field();
                        $method_delete = method_field("delete");
                        $html = '<a class="btn waves-effect waves-light btn-info btn-sm btn-circle" title="View Banner Details" href="' . route('admin.banner.show', $row->id) . '"><i class="fa fa-eye"></i></a>';
    
                        if ($row->deleted_at === null) {
                            $deleteRoute =  route('admin.banner.destroy', [$row->id]);
                           
                                $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1 " title="Edit Banner Details" href="' . route('admin.banner.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
                          
                            
                                $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Banner" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';
                          
                        } else {
                            $deleteRoute =  route('banner.trashed.destroy', [$row->id]);
                            $revertRoute = route('banner.trashed.revert', [$row->id]);
    
                            if (auth()->user()->can('admin.banner.delete')) {
                                $html .= '<a class="btn waves-effect waves-light btn-warning btn-sm btn-circle ml-1" title="Revert Back" id="revertItem' . $row->id . '"><i class="fa fa-check"></i></a>';
                                $html .= '
                                <form id="revertForm' . $row->id . '" action="' . $revertRoute . '" method="post" style="display:none">' . $csrf . $method_put . '
                                    <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i class="fa fa-check"></i> Confirm Revert</button>
                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                </form>';
                                $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Banner Permanently" id="deleteItemPermanent' . $row->id . '"><i class="fa fa-trash"></i></a>';
                            }
                        }
    
                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Banner will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                            });
                        </script>';
    
                       
                            $html .= '<script>
                            $("#deleteItemPermanent' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Banner will be deleted permanently, both from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                            });
                        </script>';
    
                            $html .= '<script>
                            $("#revertItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Banner will be revert back from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, Revert Back!"
                                }).then((result) => { if (result.value) {$("#revertForm' . $row->id . '").submit();}})
                            });
                        </script>';
    
                            $html .= '
                            <form id="deleteForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i class="fa fa-check"></i> Confirm Delete</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                            </form>';
    
                            $html .= '
                            <form id="deletePermanentForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i class="fa fa-check"></i> Confirm Permanent Delete</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                            </form>';
                        
                        return $html;
                    }
                )
                ->editColumn('banner_image', function ($row) {
                    if ($row->banner_image != null) {
                        return "<img src='" . asset('public/images/banners/' . $row->banner_image) . "' class='img img-display-list' />";
                    }
                    return '-';
                });
    
            $rawColumns = ['action', 'banner_image'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }
        return view('home::banner.index' );
    }
    
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $latestBanner = Banner::latest()->first();
        if ($latestBanner) {
            $bannerImagePath = asset('public/assets/images/banner/' . $latestBanner->image_path);
        } 
        else {
            $bannerImagePath = 'null';
        }
        return view('home::banner.create', compact('bannerImagePath'));
    }

    public function store(Request $request)
    {
      
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        try {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('public/assets/images/banner'), $imageName);
            $banner = new Banner();
            $banner->image_path = $imageName;
            $banner->save();
            session()->flash('success', 'Banner uploaded successfully!');
            return back();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error uploading image: '.$e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $banner = Banner::find($id); 
        return view('home::banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $banner = Banner::find($id);
        return view('home::banner.edit', compact('banner'));
    }


    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        if (is_null($banner)) {
            session()->flash('error', "The banner is not found!");
            return redirect()->route('admin.banner.index');
        }

        $request->validate([
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            DB::beginTransaction();
            if ($banner->image_path && $request->hasFile('banner_image')) {
                $previousImagePath = public_path('public/assets/images/banner/' . $banner->image_path);
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }

            if ($request->hasFile('banner_image')) {
                $bannerImage = $request->file('banner_image');
                $bannerImageName = $bannerImage->getClientOriginalName();
                $bannerImage->move(public_path('public/assets/images/banner'), $bannerImageName);
                $banner->image_path = $bannerImageName;
            }
            $banner->save();
            DB::commit();
            session()->flash('success', 'Banner image has been updated successfully!');
            return redirect()->route('admin.banner.index');
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
        $banner = Banner::find($id);
        if (is_null($banner)) {
            session()->flash('error', "The banner is not found!");
            return redirect()->route('admin.banner.index');
        }

        $imagePath = public_path('public/assets/images/banner/' . $banner->image_path);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $banner->delete();
        session()->flash('success', 'Banner has been deleted successfully!');
        return redirect()->route('admin.banner.index');
    }


    /**
     * Revert the specified resource from trash.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function revertFromTrash($id)
    {
        
        $banner = Banner::find($id);
        if (is_null($banner)) {
            session()->flash('error', "The banner is not found!");
            return redirect()->route('banner.trashed');
        }

        $banner->deleted_at = null;
        $banner->deleted_by = null;
        $banner->save();

        session()->flash('success', 'Banner has been reverted back successfully!');
        return redirect()->route('admin.banner.trashed');
    }

    /**
     * Destroy the specified resource permanently from trash.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('banner.delete')) {
            $message = 'You are not allowed to access this page!';
            return view('errors.403', compact('message'));
        }

        $banner = Banner::find($id);
        if (is_null($banner)) {
            session()->flash('error', "The banner is not found!");
            return redirect()->route('admin.banner.trashed');
        }

        UploadHelper::deleteFile('public/assets/images/banners/' . $banner->banner_image);
        $banner->delete();
        session()->flash('success', 'Banner has been deleted permanently!');
        return redirect()->route('admin.banner.trashed');
    }

    /**
     * Display a listing of trashed banners.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        return $this->index(true);
    }


}
