<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $image = $request->file('image')->store('categories', 'public');

        Category::create([
        'name'=> $request->name,
        'description'=> $request->description,
        'image'=> $image
    ]);
    return to_route('admin.categories.index')->with('success', 'Kategorie byla úspěšně vytvořena');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $image = $category->image;
        if($request->hasFile('image')){
            Storage::disk('public')->delete(str_replace('/storage/', '', $category->image));
            $image = $request->file('image')->store('categories', 'public');
        }
        $category->update([
            'name' => request('name'),
            'description' => request('description'),
            'image' => $image
        ]);
        return to_route('admin.categories.index')->with('success', 'Kategorie byla úspěšně upravena');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->menus()->detach();
        Storage::disk('public')->delete(str_replace('/storage/', '', $category->image));
        $category->delete();

        return to_route('admin.categories.index')->with('danger', 'Kategorie byla úspěšně odstraněna');
    }
}
