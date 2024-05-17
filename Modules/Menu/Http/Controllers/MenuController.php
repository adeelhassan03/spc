<?php

namespace Modules\Menu\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\MenuItem;
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


class MenuController extends Controller
{
   /**
 *
 * @param bool $isTrashed
 * @return \Illuminate\Http\Response
 */
public function index($isTrashed = false)
{
    if (request()->ajax()) {
        if ($isTrashed) {
            $menuItems = MenuItem::onlyTrashed()->orderBy('id', 'desc')->get();
        } else {
            $menuItems = MenuItem::where('category', 'Menu')->whereNull('deleted_at')->orderBy('id', 'desc')->get();
        }

        $datatable = DataTables::of($menuItems, $isTrashed)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($row) use ($isTrashed) {
                    $csrf = csrf_field();
                    $method_delete = method_field("delete");
                    $method_put = "" . method_field("put") . "";
                    $html ='';

                    if ($row->deleted_at === null) {
                        $deleteRoute = route('admin.menu.destroy', [$row->id]);
                        $html = '<a class="btn waves-effect waves-light btn-info btn-sm btn-circle" title="View Menu Details" href="' . route('admin.menu.show', $row->id) . '"><i class="fa fa-eye"></i></a>';
                            $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1 " title="Edit Menu Details" href="' . route('admin.menu.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Menu" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';
                    } else {
                        $deleteRoute = route('admin.menu.trashed.destroy', [$row->id]);
                        $revertRoute = route('admin.menu.trashed.revert', [$row->id]);
                            $html .= '<a class="btn waves-effect waves-light btn-warning btn-sm btn-circle ml-1" title="Revert Back" id="revertItem' . $row->id . '"><i class="fa fa-check"></i></a>';
                            $html .= '
                                <form id="revertForm' . $row->id . '" action="' . $revertRoute . '" method="post" style="display:none">' . $csrf . $method_put . '
                                    <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                            class="fa fa-check"></i> Confirm Revert</button>
                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                            class="fa fa-times"></i> Cancel</button>
                                </form>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Menu Permanently" id="deleteItemPermanent' . $row->id . '"><i class="fa fa-trash"></i></a>';
                    }

                    $html .= '<script>
                        $("#deleteItem' . $row->id . '").click(function(){
                            swal.fire({ title: "Are you sure?",text: "Menu will be deleted as trashed!",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                            }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                        });
                    </script>';
                        $html .= '<script>
                            $("#deleteItemPermanent' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Menu will be deleted permanently, both from trash!",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#revertItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Menu will be reverted back from trash!",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, Revert Back!"
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
    $countMenuItems = MenuItem::where('category', 'Menu')->count();
    $countActiveMenuItems = MenuItem::where('category', 'Menu')
    ->where('status', 'Active')
    ->count();
    $countTrashedMenuItems = MenuItem::onlyTrashed()
    ->where('category', 'Menu')
    ->count();

    return view('menu::menu.index', compact('countMenuItems', 'countActiveMenuItems', 'countTrashedMenuItems'));
}


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('menu::menu.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'slug' => 'nullable|string|max:255',
            'group' => 'required|string',
            'status' => 'required|in:Active,Inactive',
        ]);
    
        $mainMenuItem = new MenuItem();
        $mainMenuItem->title = $request->input('title');
        $mainMenuItem->slug = $request->input('slug');
        $mainMenuItem->group = $request->input('group');
        $mainMenuItem->category = 'Menu';
        $mainMenuItem->status = $request->input('status');
        $mainMenuItem->save();

        $subMenus = $request->input('category', ''); 
        if ($subMenus && is_array($subMenus)) {
            foreach ($subMenus as $key => $category) {
                if ($category == 'Sub Menu') {
                    $subMenuItem = new MenuItem();
                    $subMenuItem->title = $request->input('title_' . $key);
                    $subMenuItem->slug = $request->input('slug_' . $key);
                    $subMenuItem->group = $request->input('group_' . $key);
                    $subMenuItem->category = $category;
                    $subMenuItem->status = $request->input('sub_menu_status_' . $key);
                    $subMenuItem->save();
                }
            }
        }
    
        return redirect()->back()->with('success', 'Menu created successfully.');
    }
    
    


 /**
 * Display the specified menu item.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
   
    $menu = MenuItem::find($id);
    if (!$menu) {
        abort(404, 'Menu item not found');
    }
    $subMenus = MenuItem::where('group', $menu->group)
                        ->where('category', 'Sub Menu')
                        ->get();
    
    return view('menu::menu.show', compact('menu', 'subMenus'));
}

public function edit($id)
{
    $menuItem = MenuItem::find($id);
    if (!$menuItem) {

        abort(404, 'Menu item not found');
    }
    $subMenus = MenuItem::where('group', $menuItem->group)
                        ->where('category', 'Sub Menu')
                        ->get();
    return view('menu::menu.edit', compact('menuItem', 'subMenus'));
}


/**
 * Update the specified menu item in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'nullable|string|max:255',
        'group' => 'required|string|max:255',
        'status' => 'required|in:Active,Inactive',
        'sub_menus.*.title' => 'required|string|max:255',
        'sub_menus.*.group' => 'required|string|max:255',
        'sub_menus.*.status' => 'required|in:Active,Inactive',
        'sub_menus.*.slug' => 'nullable|string|max:255',
    ]);

    DB::beginTransaction();

    try {
        $menuItem = MenuItem::findOrFail($id);
        $menuItem->update($request->only(['title', 'slug', 'group', 'status']));

        // Handling sub-menus
        $subMenus = $request->input('sub_menus', []);
        foreach ($subMenus as $subMenuData) {
            if (!empty($subMenuData['id'])) {
                // Update existing sub-menu
                $subMenu = MenuItem::findOrFail($subMenuData['id']);
                $subMenu->update($subMenuData);
            } else {
                // Create new sub-menu
                $menuItem->subMenus()->create(array_merge($subMenuData, ['category' => 'Sub Menu']));
            }
        }

        // Handling deleted sub-menus
        $deletedSubMenus = $request->input('deleted_sub_menus', []);
        MenuItem::destroy($deletedSubMenus);

        DB::commit();
        return redirect()->route('admin.menu.index')->with('success', 'Menu updated successfully.');
    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->with('error', 'Failed to update the menu. Error: ' . $e->getMessage());
    }
}

    /**
 * Delete the specified menu item and move it to trash.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{

    $menuItem = MenuItem::findOrFail($id);
    $menuItem->delete();
    return redirect()->back()->with('success', 'Menu moved to trash successfully.');
}

/**
 * revertFromTrash
 *
 * @param integer $id
 * @return \Illuminate\Http\Response
 */
public function revertFromTrash($id)
{

    $menuItem = MenuItem::withTrashed()->find($id);
    if (is_null($menuItem)) {
        session()->flash('error', "The menu item is not found !");
        return redirect()->route('admin.menu.trashed');
    }

    $menuItem->deleted_at = null;
    $menuItem->deleted_by = null;
    $menuItem->save();

    session()->flash('success', 'Menu has been reverted back successfully !!');
    return redirect()->route('admin.menu.trashed');
}

/**
 * destroyTrash
 *
 * @param integer $id
 * @return \Illuminate\Http\Response
 */
public function destroyTrash($id)
{
    $menuItem = MenuItem::withTrashed()->find($id);
    if (is_null($menuItem)) {
        session()->flash('error', "The menu is not found !");
        return redirect()->route('admin.menu.trashed');
    }

    $menuItem->forceDelete();

    session()->flash('success', 'Menu has been deleted permanently !!');
    return redirect()->route('admin.menu.trashed');
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
