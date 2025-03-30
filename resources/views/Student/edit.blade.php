<!-- resources/views/schoolClass/edit.blade.php -->

@extends('layout')

@section('content')
    <h1>Student Modif</h1>

    <form action="{{ route('student.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Student name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $student->name) }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="name">Student sex:</label>
            <input type="text" id="sex" name="sex" value="{{ old('sex', $student->sex) }}" required>
            @error('sex')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="class_id">Class</label>
            <select name="class_id" id="class_id" required>
                <option value="">Choice one</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit">Save</button>
        </div>
    </form>

    <a href="{{ route('student.index') }}">Back</a>
@endsection
