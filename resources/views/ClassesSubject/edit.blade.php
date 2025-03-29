<!-- resources/views/schoolClass/edit.blade.php -->

@extends('layout')

@section('content')
    <h1>Osztály Módosítása</h1>

    <form action="{{ route('schoolClass.update', $class->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Osztály neve:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $class->name) }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="year">Év:</label>
            <input type="text" id="year" name="year" value="{{ old('year', $class->year) }}" required>
            @error('year')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">Módosítás mentése</button>
        </div>
    </form>

    <a href="{{ route('SchoolClass.index') }}">Vissza az osztályok listájához</a>
@endsection
