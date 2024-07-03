@extends('layouts.app')

@section('title', 'Assign Room')

@section('content')
    <div class="container">
        <h1>Tambah Kelola</h1>
        <form action="{{ route('petugas-kamar.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="room_id">Room</label>
                <select class="form-control" id="room_id" name="room_id" required>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="pasien_id">Pasien</label>
                <select class="form-control" id="pasien_id" name="pasien_id" required>
                    @foreach($pasiens as $pasien)
                        <option value="{{ $pasien->id }}">{{ $pasien->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="assigned_at">Assigned At</label>
                <input type="datetime-local" class="form-control" id="assigned_at" name="assigned_at" required>
            </div>
            <button type="submit" class="btn btn-primary">Assign Room</button>
        </form>
    </div>
@endsection
