@extends('layout')

@section('content')
    <h1>Marks List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @auth
        <a href="{{ route('mark.create') }}">Új osztály hozzáadása</a>
    @endauth
    <form method="GET" action="{{ route('mark.index') }}">
        <label for="subject">Tantárgy:</label>
        <select name="subject" id="subject">
            <option value="">Összes tantárgy</option>
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ request('subject') == $subject->id ? 'selected' : '' }}>
                    {{ $subject->name }}
                </option>
            @endforeach
        </select>

        <label for="student">Tanuló:</label>
        <select name="student" id="student">
            <option value="">Összes tanuló</option>
            @foreach($students as $student)
                <option value="{{ $student->id }}" {{ request('student') == $student->id ? 'selected' : '' }}>
                    {{ $student->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Szűrés</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Tanuló</th>
                <th>Tantárgy</th>
                <th>Jegy</th>
                <th>Akciók</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($marks as $mark)
                <tr>
                    <td>{{ $mark->student->name }}</td> 
                    <td>{{ $mark->subject->name }}</td> 
                    <td>{{ $mark->marks }}</td> 
                    <td>
                        <a href="{{ route('mark.show', $mark->id) }}"><i class="fa-solid fa-list-ul"></i></a>
                        @auth
                            <a href="{{ route('mark.edit', $mark->id) }}"><i class="fa-solid fa-gear"></i></a>

                            <form action="{{ route('mark.destroy', $mark->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Biztosan törölni szeretnéd az osztályt?')" style="border:none; background:none; cursor:pointer;">
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
