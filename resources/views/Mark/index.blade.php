@extends('layout')

@section('content')
    <h1>{{ __('messages.marks') }}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @auth
        <a href="{{ route('mark.create') }}">{{ __('messages.add_mark') }}</a>
    @endauth
    <form method="GET" action="{{ route('mark.index') }}">
        <label for="subject">{{ __('messages.subject') }}</label>
        <select name="subject" id="subject">
            <option value="">{{ __('messages.none') }}</option>
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ request('subject') == $subject->id ? 'selected' : '' }}>
                    {{ $subject->name }}
                </option>
            @endforeach
        </select>

        <label for="student">{{ __('messages.student_name') }}</label>
        <select name="student" id="student">
            <option value="">{{ __('messages.none') }}</option>
            @foreach($students as $student)
                <option value="{{ $student->id }}" {{ request('student') == $student->id ? 'selected' : '' }}>
                    {{ $student->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">{{ __('messages.find') }}</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>{{ __('messages.student_name') }}</th>
                <th>{{ __('messages.subject') }}</th>
                <th>{{ __('messages.marks') }}</th>
                <th>{{ __('messages.date') }}</th>
                <th>{{ __('messages.option') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($marks as $mark)
                <tr>
                    <td>{{ $mark->student->name }}</td> 
                    <td>{{ $mark->subject->name }}</td> 
                    <td>{{ $mark->marks }}</td> 
                    <td>{{ $mark->date }}</td>
                    <td>
                        <a href="{{ route('mark.show', $mark->id) }}"><i class="fa-solid fa-list-ul"></i></a>
                        @auth
                            <a href="{{ route('mark.edit', $mark->id) }}"><i class="fa-solid fa-gear"></i></a>

                            <form action="{{ route('mark.destroy', $mark->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('{!! __('messages.are_you_sure') !!}')" style="border:none; background:none; cursor:pointer;">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                            </form>
                        @endauth
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
