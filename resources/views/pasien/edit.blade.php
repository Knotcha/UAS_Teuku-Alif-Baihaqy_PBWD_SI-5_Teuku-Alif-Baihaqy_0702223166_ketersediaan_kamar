@extends('layouts.app')

@section('title', 'Edit Pasien')

@section('content')
    <div class="container">
        <h1>Edit Pasien</h1>
        <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $pasien->name }}" required>
            </div>
            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $pasien->birthdate }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Pasien</button>
        </form>
    </div>
@endsection
