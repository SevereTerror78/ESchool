<!-- resources/views/schoolClass/edit.blade.php -->

@extends('layout')

@section('content')
    <h1>{{ __('messages.student') }}</h1>

    <form action="{{ route('student.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">{{ __('messages.student_name') }}</label>
            <input type="text" id="name" name="name" value="{{ old('name', $student->name) }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="name">{{ __('messages.sex') }}</label>
            <input type="text" id="sex" name="sex" value="{{ old('sex', $student->sex) }}" required>
            @error('sex')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="class_id">{{ __('messages.class') }}</label>
            <select name="class_id" id="class_id" required>
                <option value="">{{ __('messages.none') }}</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit">{{ __('messages.save') }}</button>
        </div>
    </form>

    <a href="{{ route('student.index') }}">{{ __('messages.back') }}</a>
@endsection
