<!-- resources/views/schoolClass/store.blade.php -->

@extends('layout') <!-- Az alapértelmezett sablonra való hivatkozás -->

@section('content')
    <h1>Add Class</h1>

    <form action="{{ route('schoolClass.store') }}" method="POST">
        @csrf 
        <div>
            <label for="name">Class:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="year">Year:</label>
            <input type="text" id="year" name="year" value="{{ old('year') }}" required>
            @error('year')
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

    <a href="{{ route('SchoolClass.index') }}">Back</a>
@endsection
