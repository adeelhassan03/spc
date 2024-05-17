<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $menus = MenuService::getMenuData(); // Use MenuService or fetch directly from Menu model
        return view('menus.index', compact('menus'));
    }

    public function store(Request $request)
    {
        try {
            $menu = MenuService::createMenu($request->all());
            return back()->with('success', 'Menu created successfully!');
        } catch (ValidationException $e) {
            return back()->withErrors($e->validator);
        }
    }

    public function update(Menu $menu, Request $request)
    {
        try {
            $menu = MenuService::updateMenu($menu, $request->all());
            return back()->with('success', 'Menu updated successfully!');
        } catch (ValidationException $e) {
            return back()->withErrors($e->validator);
        }
    }
}
