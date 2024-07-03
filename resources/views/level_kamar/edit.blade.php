@extends('layouts.app')

@section('title', 'Edit Level Kamar')

@section('content')
    <div class="container">
        <h1>Edit Level Kamar</h1>
        <form action="{{ route('level-kamar.update', $levelKamar->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Level Kamar Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $levelKamar->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Level Kamar</button>
        </form>
    </div>
@endsection
