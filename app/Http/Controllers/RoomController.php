<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\LevelKamar;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('levelKamar')->get();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        $levels = LevelKamar::all();
        return view('rooms.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_number' => 'required|unique:rooms',
            'level_kamar_id' => 'required',
            'status' => 'required|boolean',
        ]);

        Room::create($request->all());
        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    public function edit(Room $room)
    {
        $levels = LevelKamar::all();
        return view('rooms.edit', compact('room', 'levels'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_number' => 'required|unique:rooms,room_number,' . $room->id,
            'level_kamar_id' => 'required',
            'status' => 'required|boolean',
        ]);

        $room->update($request->all());
        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}
