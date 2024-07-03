<?php

namespace App\Http\Controllers;

use App\Models\LevelKamar;
use Illuminate\Http\Request;

class LevelKamarController extends Controller
{
    public function index()
    {
        $levels = LevelKamar::all();
        return view('level_kamar.index', compact('levels'));
    }

    public function create()
    {
        return view('level_kamar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:level_kamar',
        ]);

        LevelKamar::create($request->all());
        return redirect()->route('level-kamar.index')->with('success', 'Level Kamar created successfully.');
    }

    public function show(LevelKamar $levelKamar)
    {
        return view('level_kamar.show', compact('levelKamar'));
    }

    public function edit(LevelKamar $levelKamar)
    {
        return view('level_kamar.edit', compact('levelKamar'));
    }

    public function update(Request $request, LevelKamar $levelKamar)
    {
        $request->validate([
            'name' => 'required|unique:level_kamar,name,' . $levelKamar->id,
        ]);

        $levelKamar->update($request->all());
        return redirect()->route('level-kamar.index')->with('success', 'Level Kamar updated successfully.');
    }

    public function destroy(LevelKamar $levelKamar)
    {
        $levelKamar->delete();
        return redirect()->route('level-kamar.index')->with('success', 'Level Kamar deleted successfully.');
    }
}
