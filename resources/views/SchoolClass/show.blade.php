@extends('layout')

@section('content')
    <h1>{{__('messages.details')}}</h1>
    <div>
        <p><strong>{{__('messages.class')}}</strong> {{ $class->name }}</p>
        <p><strong>{{__('messages.year')}}</strong> {{ $class->year }}</p>
    </div>
    <a href="{{ route('SchoolClass.index') }}">{{__('messages.back')}}</a>
@endsection
