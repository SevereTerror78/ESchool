@extends('layout')

@section('content')
    <h1>{{ __('messages.details') }}</h1>
    
    <a href="{{ route('subject.index') }}">{{ __('messages.back') }}</a>
    <div>
        <p><strong>{{ __('messages.subject') }}</strong> {{ $subject->name }}</p>
        {{dd($subject)}}
    </div>
@endsection
