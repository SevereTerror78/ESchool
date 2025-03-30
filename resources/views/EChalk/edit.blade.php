<!-- resources/views/schoolClass/edit.blade.php -->

@extends('layout')

@section('content')
    <h1>Osztály Módosítása</h1>

    <form action="{{ route('subject.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Subject update:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $subject->name) }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">Save</button>
        </div>
    </form>

    <a href="{{ route('subject.index') }}">Back</a>
@endsection
