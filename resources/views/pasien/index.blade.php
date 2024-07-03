@extends('layouts.app')

@section('title', 'Pasiens')

@section('content')
    <div class="container">
        <h1>Pasien</h1>
        <a href="{{ route('pasien.create') }}" class="btn btn-primary">Add Pasien</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pasiens as $pasien)
                    <tr>
                        <td>{{ $pasien->name }}</td>
                        <td>{{ $pasien->birthdate }}</td>
                        <td>
                            <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" style="display:inline-block;">
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
