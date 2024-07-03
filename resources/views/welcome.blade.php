<!-- resources/views/welcome.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Welcome') }}</div>

                    <div class="card-body">
                        <p>Welcome to our application!</p>
                        <p>
                            <a href="{{ route('rooms.index') }}" class="btn btn-primary">Go to Rooms</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
