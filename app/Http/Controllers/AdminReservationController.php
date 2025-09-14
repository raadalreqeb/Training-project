<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    //


        public function allReservations()
    {
        $reservations = Reservations::with(['user', 'room'])->paginate(6);
        return view('admin.reservations.index', compact('reservations'));
    }



        public function destroyreservation(Reservations $reservation)
    {
        $reservation->delete();
        return redirect()
            ->route('admin.reservations.index')
            ->with('success', 'Reservation deleted successfully!');
    }

        public function edit(Reservations $reservation)
    {
        return view('admin.reservations.edit', compact('reservation'));
    }

    public function update(Request $request, Reservations $reservation)
{
    $request->validate([
        'start_date' => 'required|date',
        'end_date'   => 'required|date|after_or_equal:start_date',
        'status'     => 'required|string',
    ]);

    $reservation->update([
        'start_date' => $request->start_date,
        'end_date'   => $request->end_date,
        'status'     => $request->status,
    ]);

    return redirect()->route('admin.reservations.index')->with('success', 'Reservation updated successfully.');
}
}
