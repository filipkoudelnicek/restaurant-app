<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;
use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::all();
        return view('admin.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableStoreRequest $request)
    {
        Table::create([
            'name' => $request->name,
            'number_of_guests' => $request->number_of_guests,
            'status' => $request->status,
            'location' => $request->location,
        ]);

        return to_route('admin.tables.index')->with('success', 'Stůl byl úspěšně vytvořen');
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
    public function edit(Table $table)
    {
        return view('admin.tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableStoreRequest $request, Table $table)
    {
        $table->update($request->validated());

        return to_route('admin.tables.index')->with('success', 'Stůl byl úspěšně upraven');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
         $table->delete();
         $table->reservations()->delete();
         return to_route('admin.tables.index')->with('danger', 'Stůl byl úspěšně odstraněn');
    }
}
