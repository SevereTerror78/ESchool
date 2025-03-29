<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();

        return view('subject.index', compact('subjects'));
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subject.edit', compact('subject'));
    }

    public function show($id)
    {
        $subject = Subject::findOrFail($id);
       return view('subject.show', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $subject->update($request->all());
        return redirect()->route('subject.index')->with('success', 'Az osztály sikeresen módosítva.');
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect()->route('subject.index')->with('success', 'Az osztály sikeresen törölve.');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Subject::create($request->all());
        return redirect()->route('subject.index')->with('success', 'Az osztály sikeresen hozzáadva.');
    }
    public function create()
    {
        return view('subject.create');
    }
}
