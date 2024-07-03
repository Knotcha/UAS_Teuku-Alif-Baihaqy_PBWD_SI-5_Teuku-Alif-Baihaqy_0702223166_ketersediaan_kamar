@extends('layouts.app')

@section('title', 'Add Pasien')

@section('content')
    <div class="container">
        <h1>Tambah Pasien</h1>
        <form action="{{ route('pasien.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Pasien</button>
        </form>
    </div>
@endsection
