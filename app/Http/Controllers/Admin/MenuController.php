<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index() {
        $menus = Menu::whereNull('parent_id')
            ->orderBy('order')
            ->with('children')
            ->get();

        return view('admin.menu.index', compact('menus'));
    }

    public function create() {
        $parents = Menu::orderBy('title')->get();
        return view('admin.menu.create', compact('parents'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'parent_id' => 'nullable|exists:menus,id',
            'order' => 'nullable|integer',
        ]);

        Menu::create($request->only('title', 'parent_id', 'order'));

        return redirect()->route('admin.menu.index');
    }

    public function edit(Menu $menu) {
        $parents = Menu::where('id', '!=', $menu->id)->get();
        return view('admin.menu.edit', compact('menu', 'parents'));
    }

    public function update(Request $request, Menu $menu) {
        $request->validate([
            'title' => 'required',
            'parent_id' => 'nullable|exists:menus,id',
            'order' => 'nullable|integer',
        ]);

        $menu->update($request->only('title', 'parent_id', 'order'));

        return redirect()->route('admin.menu.index');
    }

    public function destroy(Menu $menu) {
        $menu->delete();
        return redirect()->route('admin.menu.index');
    }
}
