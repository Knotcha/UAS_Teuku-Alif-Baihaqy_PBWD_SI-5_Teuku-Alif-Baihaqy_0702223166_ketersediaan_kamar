@extends('layouts.app')

@section('title', 'Edit Room Assignment')

@section('content')
    <div class="container">
        <h1>Edit Kelola</h1>
        <form action="{{ route('petugas-kamar.update', $assignment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="room_id">Room</label>
                <select class="form-control" id="room_id" name="room_id" required>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}" {{ $assignment->room_id == $room->id ? 'selected' : '' }}>{{ $room->room_number }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="pasien_id">Pasien</label>
                <select class="form-control" id="pasien_id" name="pasien_id" required>
                    @foreach($pasiens as $pasien)
                        <option value="{{ $pasien->id }}" {{ $assignment->pasien_id == $pasien->id ? 'selected' : '' }}>{{ $pasien->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="assigned_at">Assigned At</label>
                <input type="datetime-local" class="form-control" id="assigned_at" name="assigned_at" value="{{ $assignment->assigned_at->format('Y-m-d\TH:i') }}" required>
            </div>
            <div class="form-group">
                <label for="discharged_at">Discharged At</label>
                <input type="datetime-local" class="form-control" id="discharged_at" name="discharged_at" value="{{ $assignment->discharged_at ? $assignment->discharged_at->format('Y-m-d\TH:i') : '' }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Assignment</button>
        </form>
    </div>
@endsection
