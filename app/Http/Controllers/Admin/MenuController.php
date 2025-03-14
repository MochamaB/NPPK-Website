<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Page;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of menus
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $menus = Menu::withCount('menuItems')->get();
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new menu
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.menus.create');
    }

    /**
     * Store a newly created menu
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255|unique:menus,location',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $menu = Menu::create([
            'name' => $request->name,
            'location' => $request->location,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.menu-items.create', ['menu' => $menu->id])
            ->with('success', 'Menu created successfully. Now you can add menu items.');
    }

    /**
     * Show the form for editing the specified menu
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\View\View
     */
    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }

    /**
     * Update the specified menu
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Menu $menu)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255|unique:menus,location,' . $menu->id,
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $menu->update([
            'name' => $request->name,
            'location' => $request->location,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu updated successfully');
    }

    /**
     * Remove the specified menu
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu deleted successfully');
    }

    /**
     * Display the menu items for a specific menu.
     */
    public function items(Menu $menu)
    {
        // Get all menu items for this menu with proper hierarchy
        $menuItems = $menu->menuItems()
            ->with(['page', 'children.page', 'children.children.page'])
            ->whereNull('parent_id')
            ->orderBy('order_index')
            ->get();
        
        // Get all menu items (flat list) for parent selection in the form
        $allMenuItems = $menu->menuItems()->get();
        
        // Get all pages for selection
        $pages = \App\Models\Page::all();
        
        return view('admin.menus.items', compact('menu', 'menuItems', 'allMenuItems', 'pages'));
    }
}
