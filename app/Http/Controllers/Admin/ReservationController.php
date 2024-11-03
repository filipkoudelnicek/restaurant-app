<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        $tables = Table::where('status', TableStatus::Volný)->get();
        return view('admin.reservations.edit', compact('reservation', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationStoreRequest $request, Reservation $reservation)
    {
        $table = Table::findOrFail($request->table_id);
        if ($request->number_of_guests > $table->number_of_guests) {
            return back()->with('warning', 'Prosím vyberte stůl podle počtu lidí!');
        }
        $request_date = Carbon::parse($request->reservation_date);
        $reservation = $table->reservations()->where('id', '!=', $reservation->id)->get();
        foreach($reservation as $reservation) {
            if (Carbon::parse($reservation->reservation_date)->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'Tento stůl je pro tento den již zarezervovaný!');
            }
        }
        $reservation->update($request->validated());
        return to_route('admin.reservations.index')->with('success', 'Rezervace byla úspěšně upravena');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return to_route('admin.reservations.index')->with('success', 'Rezervace byla úspěšně smazána');
    }
}
