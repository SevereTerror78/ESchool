<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\Subject;
use Illuminate\Http\Request;

class EChalkController extends Controller
{
    public function index(Request $request)
    {
        $years = SchoolClass::distinct()->get(['year']);
        $classes = SchoolClass::all(); 
        $subjects = Subject::all();

        $students = Student::with('mark') 
        ->when($request->year, function ($query) use ($request) {
            $query->whereHas('schoolClass', function ($query) use ($request) {
                $query->where('year', $request->year);
            });
        })
        ->when($request->class_id, function ($query) use ($request) {
            $query->where('class_id', $request->class_id);
        })
        ->when($request->subject_id, function ($query) use ($request) {
            $query->whereHas('mark', function ($query) use ($request) {
                $query->where('subject_id', $request->subject_id);
            });
        })
        ->get();
    

        return view('echalk.index', compact('students', 'years', 'classes', 'subjects'));
    }
}
