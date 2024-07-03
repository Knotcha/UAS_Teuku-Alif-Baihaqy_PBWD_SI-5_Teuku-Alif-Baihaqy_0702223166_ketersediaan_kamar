@extends('layouts.app')

@section('title', 'Edit Room')

@section('content')
    <div class="container">
        <h1>Edit Kamar</h1>
        <form action="{{ route('rooms.update', $room->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="room_number">Room Number</label>
                <input type="text" class="form-control" id="room_number" name="room_number" value="{{ $room->room_number }}" required>
            </div>
            <div class="form-group">
                <label for="level_kamar_id">Level</label>
                <select class="form-control" id="level_kamar_id" name="level_kamar_id" required>
                    @foreach($levels as $level)
                        <option value="{{ $level->id }}" {{ $room->level_kamar_id == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="1" {{ $room->status == 1 ? 'selected' : '' }}>Available</option>
                    <option value="0" {{ $room->status == 0 ? 'selected' : '' }}>Not Available</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Room</button>
        </form>
    </div>
@endsection
