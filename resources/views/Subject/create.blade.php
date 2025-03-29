<!-- resources/views/schoolClass/store.blade.php -->

@extends('layout') <!-- Az alapértelmezett sablonra való hivatkozás -->

@section('content')
    <h1>Új Osztály Hozzáadása</h1>

    <form action="{{ route('subject.store') }}" method="POST">
        @csrf 
        <div>
            <label for="name">Subject name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button type="submit">Save</button>
        </div>
    </form>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('subject.index') }}">Back</a>
@endsection
