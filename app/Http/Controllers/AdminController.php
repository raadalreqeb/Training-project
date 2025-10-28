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



      public function createAdminForm()
      {
          return view('admin.create-admin');
      }

      public function createAdmin(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'password' => Hash::make($validated['password']),
            'role_id' => 1, 
        ]);

        return redirect()->route('admin.create.form')->with('success', 'Admin created successfully!');
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


public function confirmDelete(Room $room)
{
    return view('admin.rooms.delete', compact('room'));
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
