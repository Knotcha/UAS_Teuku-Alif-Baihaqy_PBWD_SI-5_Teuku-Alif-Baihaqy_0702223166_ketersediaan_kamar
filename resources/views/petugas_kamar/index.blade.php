@extends('layouts.app')

@section('title', 'Room Assignments')

@section('content')
    <div class="container">
        <h1>Kelola Kamar</h1>
        <a href="{{ route('petugas-kamar.create') }}" class="btn btn-primary">Assign Room</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Kamar</th>
                    <th>Pasien</th>
                    <th>Assigned At</th>
                    <th>Discharged At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assignments as $assignment)
                    <tr>
                        <td>{{ $assignment->room->room_number }}</td>
                        <td>{{ $assignment->pasien->name }}</td>
                        <td>{{ $assignment->assigned_at }}</td>
                        <td>{{ $assignment->discharged_at ?? 'Not Discharged' }}</td>
                        <td>
                            <a href="{{ route('petugas-kamar.edit', $assignment->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('petugas-kamar.destroy', $assignment->id) }}" method="POST" style="display:inline-block;">
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
