@extends('layout')

@section('content')
    <h1>Diákok jelentése</h1>

    <form method="GET" action="{{ route('student.report') }}">
        <div>
            <label for="year">Év</label>
            <select name="year" id="year">
                <option value="">Válassz évet</option>
                @foreach ($years as $year)
                    <option value="{{ $year->year }}" {{ request('year') == $year->year ? 'selected' : '' }}>{{ $year->year }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="class_id">Osztály</label>
            <select name="class_id" id="class_id">
                <option value="">Válassz osztályt</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}" {{ request('class_id') == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="subject_id">Tantárgy</label>
            <select name="subject_id" id="subject_id">
                <option value="">Válassz tantárgyat</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ request('subject_id') == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Szűrés</button>
    </form>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Diák neve</th>
                <th>Jegyek</th>
                <th>Átlag</th>
                <th>Új jegy</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>
                    @foreach ($student->mark as $mark)
                        {{ $mark->marks }} @if (!$loop->last), @endif
                    @endforeach
                </td>
                <td>
                    @php
                        $mark = $student->mark->where('subject_id', request('subject_id'))->pluck('marks');
                        $average = $mark->isNotEmpty() ? $mark->avg() : 0;
                    @endphp
                    {{ number_format($average, 2) }}
                </td>
                <td>
                    <form method="POST" action="{{ route('echalk.store') }}">
                        @csrf
                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                        <input type="hidden" name="subject_id" value="{{ request('subject_id') }}">
                        
                        <select name="marks" required>
                            <option value="">Válassz</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>

                        <button type="submit">➕</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
