@extends('layouts.app')

@section('title', 'Rooms')

@section('content')
    <div class="container">
        <h1>Kamar</h1>
        <a href="{{ route('rooms.create') }}" class="btn btn-primary">Add Room</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nomor Kamar</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->room_number }}</td>
                        <td>{{ $room->levelKamar->name }}</td>
                        <td>{{ $room->status ? 'Available' : 'Not Available' }}</td>
                        <td>
                            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
