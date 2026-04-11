<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    public function show(Menu $menu)
    {
        $menu->load('items');
        return view('admin.menus.show', compact('menu'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'location' => 'required|string|unique:menus,location',
        ]);
        Menu::create($data);
        return back()->with('success', 'Menu created.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menus.index')->with('success', 'Menu deleted.');
    }

    public function addItem(Request $request, Menu $menu)
    {
        $data = $request->validate([
            'label' => 'required|string',
            'link' => 'required|string',
            'parent_id' => 'nullable|exists:menu_items,id',
            'sort_order' => 'integer',
        ]);

        $menu->allItems()->create($data);
        return back()->with('success', 'Menu item added.');
    }

    public function removeItem(\App\Models\MenuItem $item)
    {
        $item->delete();
        return back()->with('success', 'Menu item removed.');
    }
}
