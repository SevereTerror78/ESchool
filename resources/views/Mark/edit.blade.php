@extends('layout')

@section('content')
    <h1>{{ __('messages.marks') }}</h1>

    <form action="{{ route('mark.update', $mark->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="student_id">{{ __('messages.student_name') }}</label>
            <select name="student_id" id="student_id" required>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ $mark->student_id == $student->id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="subject_id">{{ __('messages.subject') }}</label>
            <select name="subject_id" id="subject_id" required>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ $mark->subject_id == $subject->id ? 'selected' : '' }}>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="marks">{{ __('messages.marks') }}</label>
            <select name="marks" id="marks" required>
                <option value="">{{ __('messages.option') }}</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ $mark->marks == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div>
            <button type="submit">{{ __('messages.save') }}</button>
        </div>
    </form>
    <a href="{{ route('mark.index') }}">{{ __('messages.back') }}</a>
@endsection