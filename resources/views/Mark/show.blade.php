@extends('layout')

@section('content')
    <h1>{{ __('messages.details') }}</h1>
    
    <a href="{{ route('mark.index') }}">{{ __('messages.back') }}</a>
    <div>
        <p><strong>{{ __('messages.student_name') }}</strong> {{ $mark->name }}</p>
        {{dd($mark)}}
    </div>
@endsection
