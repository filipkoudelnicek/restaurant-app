<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuStoreRequest $request)
    {
        $image = $request->file('image')->store('menus', 'public');

        $menu = Menu::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'image'=> $image,
            'price'=> $request->price
        ]);

        if($request->has('categories')){
            $menu->categories()->attach($request->categories);
        }

        return to_route('admin.menus.index')->with('success', 'Menu bylo úspěšně vytvořeno');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $image = $menu->image;
        if($request->hasFile('image')){
            Storage::disk('public')->delete(str_replace('/storage/', '', $menu->image));
            $image = $request->file('image')->store('menus', 'public');
        }
        $menu->update([
            'name' => request('name'),
            'description' => request('description'),
            'image' => $image,
            'price' => request('price')
        ]);

        if($request->has('categories')){
            $menu->categories()->sync($request->categories);
        }

        return to_route('admin.menus.index')->with('success', 'Menu bylo úspěšně upraveno');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->categories()->detach();
        Storage::disk('public')->delete(str_replace('/storage/', '', $menu->image));
        $menu->delete();
        return to_route('admin.menus.index')->with('danger', 'Menu bylo úspěšně odstraněno');
    }
}
