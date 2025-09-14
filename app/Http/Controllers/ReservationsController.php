<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    public function create(Room $room){

        return view('reservations.new-reservation' , compact('room'));
    }

    public function store(Room $room){
        $validated = request()->validate([
            
          'start_date'=>['required' , 'date' ,'after_or_equal:today' ] ,
          'end_date'=>['required' , 'date'  , 'after:start_date'],

        ]);

  $overlap = Reservations::where('room_id', $room->room_id)
        ->where(function ($query) use ($validated) {
            $query->whereBetween('start_date', [$validated['start_date'], $validated['end_date']])
                  ->orWhereBetween('end_date', [$validated['start_date'], $validated['end_date']])
                  ->orWhere(function ($query) use ($validated) {
                      $query->where('start_date', '<=', $validated['start_date'])
                            ->where('end_date', '>=', $validated['end_date']);
                  });
        })
        ->exists();

    if ($overlap) {
        return back()->withErrors([
            'reservation_conflict' => "❌ Sorry! This room is already booked for the selected dates."
        ])->withInput();
    }


          $start = \Carbon\Carbon::parse($validated['start_date']);
           $end   = \Carbon\Carbon::parse($validated['end_date']);
           $days  = $start->diffInDays($end);

           
           $total = $days * $room->price;

           

        $validated['user_id']= Auth::id();
        $validated['room_id']=$room->room_id;
        $validated['status'] = 'pending';
         $validated['payment_status'] = 'unpaid';
         $validated['total_price']=$total;

         $reservation = Reservations::create($validated);

         return redirect()->route('rooms.index-user')->with('success', 'Reservation created successfully!');
 



    }
}
