<?php

namespace App\Http\Controllers;

use App\Models\PetugasKamar;
use App\Models\Room;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PetugasKamarController extends Controller
{
    public function index()
    {
        $assignments = PetugasKamar::with('room', 'pasien')->get();
        return view('petugas_kamar.index', compact('assignments'));
    }

    public function create()
    {
        $rooms = Room::where('status', true)->get();
        $pasiens = Pasien::all();
        return view('petugas_kamar.create', compact('rooms', 'pasiens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'pasien_id' => 'required|exists:pasiens,id',
            'assigned_at' => 'required|date',
        ]);

        $assignment = PetugasKamar::create($request->all());

        // Update room status to not available
        $room = Room::find($request->room_id);
        $room->status = false;
        $room->save();

        return redirect()->route('petugas-kamar.index')->with('success', 'Room assigned successfully.');
    }

    public function show(PetugasKamar $petugasKamar)
    {
        return view('petugas_kamar.show', compact('petugasKamar'));
    }

    public function edit(PetugasKamar $petugasKamar)
    {
        $rooms = Room::all();
        $pasiens = Pasien::all();
        return view('petugas_kamar.edit', compact('petugasKamar', 'rooms', 'pasiens'));
    }

    public function update(Request $request, PetugasKamar $petugasKamar)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'pasien_id' => 'required|exists:pasiens,id',
            'assigned_at' => 'required|date',
            'discharged_at' => 'nullable|date',
        ]);

        $petugasKamar->update($request->all());

        // Update room status based on discharge status
        $room = Room::find($request->room_id);
        $room->status = $request->discharged_at ? true : false;
        $room->save();

        return redirect()->route('petugas-kamar.index')->with('success', 'Assignment updated successfully.');
    }

    public function destroy(PetugasKamar $petugasKamar)
    {
        $room = Room::find($petugasKamar->room_id);
        $room->status = true; // Set room status to available before deleting the assignment
        $room->save();

        $petugasKamar->delete();
        return redirect()->route('petugas-kamar.index')->with('success', 'Assignment deleted successfully.');
    }
}
