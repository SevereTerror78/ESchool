@extends('layout')

@section('content')
    <h1>{{ __('messages.main_site') }}</h1>

    <form method="GET" action="{{ route('student.report') }}">
        <!-- Year Select -->
        <div>
            <label for="year">{{ __('messages.year') }}</label>
            <select name="year" id="year" onchange="this.form.submit()">
                <option value="">{{ __('messages.none') }}</option>
                @foreach ($years as $year)
                    <option value="{{ $year->year }}" {{ request('year') == $year->year ? 'selected' : '' }}>{{ $year->year }}</option>
                @endforeach
            </select>
        </div>

        <!-- Class Select -->
        <div>
            <label for="class_id">{{ __('messages.class') }}</label>
            <select name="class_id" id="class_id" onchange="this.form.submit()">
                <option value="">{{ __('messages.none') }}</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}" {{ request('class_id') == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                @endforeach
            </select>
            <!-- Class Average Display -->
            @php
                $classMarks = $students->where('class_id', request('class_id'))->flatMap->mark->pluck('marks');
                $classAverage = $classMarks->isNotEmpty() ? $classMarks->avg() : 0;
            @endphp
            {{ __('messages.class_average') }}: {{ number_format($classAverage, 2) }}    
        </div>

        <!-- Subject Select -->
        <div>
            <label for="subject_id">{{ __('messages.subject') }}</label>
            <select name="subject_id" id="subject_id" onchange="this.form.submit()">
                <option value="">{{ __('messages.none') }}</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ request('subject_id') == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                @endforeach
            </select>
            <!-- Subject Average Display -->
            @php
                $subjectMarks = $students->flatMap->mark->where('subject_id', request('subject_id'))->pluck('marks');
                $subjectAverage = $subjectMarks->isNotEmpty() ? $subjectMarks->avg() : 0;
            @endphp
            {{ __('messages.subject_average') }}: {{ number_format($subjectAverage, 2) }}
        </div>

        <button type="submit">{{ __('messages.find') }}</button>
    </form>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>{{ __('messages.student_name') }}</th>
                <th>{{ __('messages.marks') }}</th>
                <th>{{ __('messages.average') }}</th>
                <th>{{ __('messages.new_mark') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>
                    @php
                        $filteredMarks = $student->mark->filter(function ($m) {
                            return $m->subject_id == request('subject_id');
                        });
                    @endphp
                    
                    @foreach ($filteredMarks as $mark)
                        <span title="{{ __('messages.date') }}: {{ $mark->date }}" class="tooltip-text">{{ $mark->marks }}</span>
                        @if (!$loop->last), @endif
                    @endforeach
                </td>

                <td>
                    @php
                        $marks = $student->mark->filter(function ($m) {
                            return $m->subject_id == request('subject_id');
                        })->pluck('marks');

                        $average = $marks->isNotEmpty() ? $marks->avg() : 0;
                    @endphp
                    {{ number_format($average, 2) }}
                </td>
                <td>
                    <form method="POST" action="{{ route('echalk.store') }}">
                        @csrf
                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                        <input type="hidden" name="subject_id" value="{{ request('subject_id') }}">

                        <select name="marks" required>
                            <option value="">{{ __('messages.option') }}</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>

                        <button type="submit"><i class="fa-solid fa-plus"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
