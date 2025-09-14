<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function index(){

        $rooms=Room::with(['reservations.user'])->paginate(6);

        return view('rooms.index' , compact('rooms'));
    }
      
     
    public function indexuser(){
  $rooms=Room::with(['reservations.user'])->paginate(6);

        return view('rooms.index-user' , compact('rooms'));
    }

  public function show(Room $room)
    {
          return view('rooms.show', ['room'=>$room]);
    }

 public function Reservation(Room $room){
        return view('reservations.new-reservation', ['room' => $room]);
}

    public function create(){
        return view ('rooms.create');
    }
}
