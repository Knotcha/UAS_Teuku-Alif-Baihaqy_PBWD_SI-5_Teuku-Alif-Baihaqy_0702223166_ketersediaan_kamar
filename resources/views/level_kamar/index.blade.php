@extends('layouts.app')

@section('title', 'Level Kamar')

@section('content')
    <div class="container">
        <h1>Level Kamar</h1>
        <a href="{{ route('level-kamar.create') }}" class="btn btn-primary">Add Level Kamar</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($levels as $level)
                    <tr>
                        <td>{{ $level->name }}</td>
                        <td>
                            <a href="{{ route('level-kamar.edit', $level->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('level-kamar.destroy', $level->id) }}" method="POST" style="display:inline-block;">
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
