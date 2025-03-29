<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassesSubjectController extends Controller
{
    public function index()
    {
        $subject = ClassesSubject::all();

        return view('classesSubject.index', compact('classes'));
    }

    public function edit($id)
    {
        $subject = ClassesSubject::findOrFail($id);
        return view('classesSubject.edit', compact('class'));
    }

    public function show($id)
    {
        $subject = ClassesSubject::findOrFail($id);
       return view('ClassesSubject.show', compact('class'));
    }

    public function update(Request $request, $id)
    {
        $subject = ClassesSubject::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
        ]);
        $subject->update($request->all());
        return redirect()->route('ClassesSubject.index')->with('success', 'Az osztály sikeresen módosítva.');
    }

    public function destroy($id)
    {
        $subject = ClassesSubject::findOrFail($id);
        $subject->delete();
        return redirect()->route('ClassesSubject.index')->with('success', 'Az osztály sikeresen törölve.');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
        ]);
        ClassesSubject::create($request->all());
        return redirect()->route('ClassesSubject.index')->with('success', 'Az osztály sikeresen hozzáadva.');
    }
    public function create()
    {
        return view('classesSubject.create');
    }
}
