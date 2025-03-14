<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Page;
use Illuminate\Support\Facades\Validator;

class MenuItemController extends Controller
{
    /**
     * Show the form for creating a new menu item
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\View\View
     */
    public function create(Menu $menu)
    {
        // Get all pages for selection
        $pages = Page::all();
        
        // Get all menu items from this menu for parent selection
        $parentItems = $menu->menuItems()->get();
        
        return view('admin.menus.item-create', compact('menu', 'pages', 'parentItems'));
    }

    /**
     * Store a newly created menu item
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Menu $menu)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:menu_items,id',
            'page_id' => 'nullable|exists:pages,id',
            'url' => 'nullable|string|max:255',
            'target' => 'nullable|string|max:50',
            'section_id' => 'nullable|string|max:255',
            'css_class' => 'nullable|string|max:255',
            'order_index' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Determine the order_index if not provided
        if (!$request->order_index) {
            $lastItem = MenuItem::where('menu_id', $menu->id)
                ->where('parent_id', $request->parent_id)
                ->orderBy('order_index', 'desc')
                ->first();
            
            $orderIndex = $lastItem ? $lastItem->order_index + 1 : 0;
        } else {
            $orderIndex = $request->order_index;
        }

        MenuItem::create([
            'menu_id' => $menu->id,
            'parent_id' => $request->parent_id,
            'page_id' => $request->page_id,
            'title' => $request->title,
            'url' => $request->url,
            'target' => $request->target,
            'section_id' => $request->section_id,
            'order_index' => $orderIndex,
            'css_class' => $request->css_class,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.menus.items', $menu)
            ->with('success', 'Menu item created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu, MenuItem $menuItem)
    {
        // Get all pages for selection
        $pages = Page::all();
        
        // Get all menu items from this menu for parent selection (excluding the current item)
        $parentItems = $menu->menuItems()->where('id', '!=', $menuItem->id)->get();
        
        return view('admin.menus.item-edit', compact('menu', 'menuItem', 'pages', 'parentItems'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu, MenuItem $menuItem)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:menu_items,id',
            'page_id' => 'nullable|exists:pages,id',
            'url' => 'nullable|string|max:255',
            'section_id' => 'nullable|string|max:255',
            'target' => 'nullable|string|in:_self,_blank',
            'css_class' => 'nullable|string|max:255',
            'order_index' => 'nullable|integer',
        ]);

        // Make sure parent_id is not the item itself or one of its descendants
        if ($request->parent_id) {
            if ($request->parent_id == $menuItem->id) {
                return redirect()->back()->with('error', 'A menu item cannot be its own parent.');
            }
            
            // Check if the selected parent is a descendant of this item
            $descendants = $menuItem->descendants()->pluck('id')->toArray();
            if (in_array($request->parent_id, $descendants)) {
                return redirect()->back()->with('error', 'A menu item cannot have one of its descendants as its parent.');
            }
        }

        $menuItem->update([
            'parent_id' => $request->parent_id,
            'page_id' => $request->page_id,
            'title' => $request->title,
            'url' => $request->url,
            'section_id' => $request->section_id,
            'target' => $request->target,
            'css_class' => $request->css_class,
            'order_index' => $request->order_index,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.menus.items', $menu)
            ->with('success', 'Menu item updated successfully.');
    }

    /**
     * Remove the specified menu item
     *
     * @param  \App\Models\Menu  $menu
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Menu $menu, MenuItem $menuItem)
    {
        $menuItem->delete();
        return redirect()->route('admin.menus.items', $menu)
            ->with('success', 'Menu item deleted successfully');
    }

    /**
     * Update the order of menu items.
     */
    public function updateOrder(Request $request, Menu $menu)
    {
        $request->validate([
            'items' => 'required|array',
        ]);

        $this->updateMenuItemsOrder($request->items);

        return response()->json(['success' => true]);
    }

    /**
     * Recursive function to update menu items order
     */
    private function updateMenuItemsOrder($items, $parentId = null, $order = 0)
    {
        foreach ($items as $index => $item) {
            $menuItem = MenuItem::findOrFail($item['id']);
            $menuItem->update([
                'parent_id' => $parentId,
                'order_index' => $order + $index
            ]);

            if (isset($item['children']) && count($item['children']) > 0) {
                $this->updateMenuItemsOrder($item['children'], $menuItem->id, 0);
            }
        }
    }
}
