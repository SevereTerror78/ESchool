@extends('layout')

@section('content')
    <h1>{{ __('messages.details') }}</h1>
    
    <a href="{{ route('student.index') }}">{{ __('messages.back') }}</a>
    <div>
        <p><strong>{{ __('messages.student') }}:</strong> {{ $student->name }}</p>
        {{dd($student)}}
    </div>
@endsection
