<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\SchoolClass;

class StudentController extends Controller
{
    public function index()
    { 
        $students = Student::with('schoolClass')->get(); 
        $classes = SchoolClass::all();
        
        return view('student.index', compact('students', 'classes'));
    }

    public function edit($id)
    {
        $classes = SchoolClass::all(); 
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student', 'classes'));
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
       return view('student.show', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'sex' => 'required|string|max:255',
            'class_id' => 'required|int|max:255',
        ]);
        $student->update($request->all());
        return redirect()->route('student.index')->with('success', 'Az osztály sikeresen módosítva.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
    
        return redirect()->route('student.index')->with('success', 'A diák és a hozzá tartozó jegyek sikeresen törölve.');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sex' => 'required|string|max:255',
            'class_id' => 'required|int|max:255',
        ]);
        Student::create($request->all());
        return redirect()->route('student.index')->with('success', 'Az osztály sikeresen hozzáadva.');
    }
    public function create()
    {
        $classes = SchoolClass::all(); 
        return view('student.create', compact('classes')); 
    }
    
}
