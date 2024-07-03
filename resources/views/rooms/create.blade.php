@extends('layouts.app')

@section('title', 'Add Room')

@section('content')
    <div class="container">
        <h1>Add Room</h1>
        <form action="{{ route('rooms.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="room_number">Room Number</label>
                <input type="text" class="form-control" id="room_number" name="room_number" required>
            </div>
            <div class="form-group">
                <label for="level_kamar_id">Level</label>
                <select class="form-control" id="level_kamar_id" name="level_kamar_id" required>
                    @foreach($levels as $level)
                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="1">Available</option>
                    <option value="0">Not Available</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Room</button>
        </form>
    </div>
@endsection
