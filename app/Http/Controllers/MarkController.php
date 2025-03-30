<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function index(Request $request)
    {
        $query = Mark::query();
    
        if ($request->has('subject') && $request->subject) {
            $query->where('subject_id', $request->subject);
        }
    
        if ($request->has('student') && $request->student) {
            $query->where('student_id', $request->student);
        }
    
        $marks = $query->get();
        $subjects = Subject::all();
        $students = Student::all();
    
        return view('mark.index', compact('marks', 'subjects', 'students'));
    }
    

    public function edit($id)
    {
        $mark = Mark::findOrFail($id);

        return view('mark.edit', compact('mark'));
    }

    public function show($id)
    {
        $mark = Mark::with(['student', 'subject'])->findOrFail($id);
        return view('mark.show', compact('mark'));
    }

    public function update(Request $request, $id)
    {
        $mark = Mark::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'student_id' => 'required|int',
            'subject_id' => 'required|int',
        ]);

        $mark->update($request->all());

        return redirect()->route('mark.index')->with('success', 'A jegy sikeresen módosítva.');
    }

    public function destroy($id)
    {
        $mark = Mark::findOrFail($id);
        $mark->delete();

        return redirect()->route('mark.index')->with('success', 'A jegy törlésre került.');
    }
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'marks' => 'required|numeric',
        ]);

        Mark::create([
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
            'marks' => $request->marks,  
            'date' => now(),
        ]);

        return redirect()->route('mark.index')->with('success', 'Jegy sikeresen hozzáadva.');
    }

    public function create()
    {
        $students = Student::all(); 
        $subjects = Subject::all(); 
        return view('mark.create', compact('students', 'subjects'));
    }
}
