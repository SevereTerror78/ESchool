@extends('layout')

@section('content')
    <h1>Class-year list</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>{{ __('messages.id') }}</th>
                <th>{{ __('messages.class') }}</th>
                <th>{{ __('messages.year') }}</th>
                <th>{{ __('messages.option') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $class)
                <tr>
                    <td>{{ $class->id }}</td>
                    <td>{{ $class->name }}</td>
                    <td>{{ $class->year }}</td>
                    <td>
                        <a href="{{ route('schoolClass.show', $class->id) }}"><i class="fa-solid fa-list-ul"></i></a>

                        @auth
                            <a href="{{ route('schoolClass.edit', $class->id) }}"><i class="fa-solid fa-gear"></i></a>

                            <form action="{{ route('schoolClass.destroy', $class->id) }}" method="POST" style="display:inline;">
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

    @auth
        <a href="{{ route('schoolClass.create') }}">{{__('messages.new_class')}}</a>
    @endauth
@endsection
