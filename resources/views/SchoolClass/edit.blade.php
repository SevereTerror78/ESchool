<!-- resources/views/schoolClass/edit.blade.php -->

@extends('layout')

@section('content')
    <h1>{{__('messages.class')}}</h1>

    <form action="{{ route('schoolClass.update', $class->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">{{__('messages.class')}}</label>
            <input type="text" id="name" name="name" value="{{ old('name', $class->name) }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="year">{{__('messages.year')}}</label>
            <input type="text" id="year" name="year" value="{{ old('year', $class->year) }}" required>
            @error('year')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">{{__('messages.save')}}</button>
        </div>
    </form>

    <a href="{{ route('SchoolClass.index') }}">{{__('messages.back')}}</a>
@endsection
