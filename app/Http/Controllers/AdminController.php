<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    public function index()
    {
        $rooms = Room::paginate(8);
        return view('admin.rooms.index', compact('rooms'));
    }
    public function dashboard()
    {
        $rooms = Room::paginate(8);
        return view('admin.rooms.index' ,compact('rooms'));
    }



      public function createAdmin()
    {
        User::create([
            'first_name' => 'New',
            'last_name' => 'Admin',
            'email' => 'newadmin@example.com',
            'password' => Hash::make('password123'),
            'role_id' => 1, 
        ]);

        return redirect()->back()->with('success', 'Admin created!');
    }
    



    public function store(Request $request)
{
    $data = $request->validate([
        'type' => 'required|string',
        'status' => 'required|string',
        'price' => 'required|numeric',
       'number' => 'required|unique:rooms,number',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('rooms', 'public');
    }

    Room::create($data);

    return redirect()->route('admin.rooms.index')->with('success', 'Room created successfully!');
}

    public function create(){
        return view('admin.rooms.create');
    }



    public function show(Room $room)
{
    return view('admin.rooms.show', compact('room'));
}

public function edit(Room $room)
{
    return view('admin.rooms.edit', compact('room'));
}    

public function update(Request $request, Room $room)
{
    $data = $request->validate([
        'type' => 'required|string',
        'status' => 'required|string',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('rooms', 'public');
    }

    $room->update($data);

    return redirect()->route('admin.rooms.show', $room)
                     ->with('success', 'Room updated successfully!');
}


public function destroy(Room $room)
{
    $room->delete();
    return redirect()->route('admin.rooms.index')
                     ->with('success', 'Room deleted successfully!');
}


public function allReservations(){
    $reservations = Reservations::with(['user' , 'room'])->paginate(6);
    
    return view('admin.reservations.index' , compact('reservations'));
}

public function destroyreservation(Reservations  $reservations ){

 $reservations->delete();
 return redirect()->route('admin.reservations.index') ->with('success', 'Room deleted successfully!');
}



}
