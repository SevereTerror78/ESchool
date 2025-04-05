<!-- resources/views/schoolClass/store.blade.php -->

@extends('layout') <!-- Az alapértelmezett sablonra való hivatkozás -->

@section('content')
    <h1>{{ __('messages.new_subject') }}</h1>

    <form action="{{ route('subject.store') }}" method="POST">
        @csrf 
        <div>
            <label for="name">{{ __('messages.subject') }}</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button type="submit">{{ __('messages.save') }}</button>
        </div>
    </form>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('subject.index') }}">{{ __('messages.back') }}</a>
@endsection
