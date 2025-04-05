@extends('layout')

@section('content')
    <h1>{{ __('messages.new_mark') }}</h1>

    <form action="{{ route('mark.store') }}" method="POST">
        @csrf
        <div>
            <label for="student_id">{{__('messages.student_name')}}</label>
            <select name="student_id" id="student_id" required>
                <option value="">{{ __('messages.none') }}</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div>
            <label for="subject_id">{{ __('messages.subject') }}</label>
            <select name="subject_id" id="subject_id" required>
                <option value="">{{ __('messages.none') }}</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="marks">{{ __('messages.marks') }}</label>
            <input type="text" name="marks" id="marks" required>
        </div>

        <div>
            <button type="submit">{{ __('messages.add_mark') }}</button>
        </div>
        <a href="{{ route('mark.index') }}">{{ __('messages.back') }}</a>
    </form>
@endsection
