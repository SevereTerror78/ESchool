<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolClass;

class SchoolClassController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::all();

        return view('schoolClass.index', compact('classes'));
    }

    public function edit($id)
    {
        $class = SchoolClass::findOrFail($id);
        return view('SchoolClass.edit', compact('class'));
    }

    public function show($id)
    {
        $class = SchoolClass::findOrFail($id);
       return view('SchoolClass.show', compact('class'));
    }

    public function update(Request $request, $id)
    {
        $class = SchoolClass::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
        ]);
        $class->update($request->all());
        return redirect()->route('SchoolClass.index')->with('success', 'Az osztály sikeresen módosítva.');
    }

    public function destroy($id)
    {
        $schoolClass = SchoolClass::findOrFail($id);
        $schoolClass->delete();
    
        return redirect()->route('SchoolClass.index')->with('success', 'Osztály és a hozzá tartozó diákok/jegyek sikeresen törölve.');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
        ]);
        SchoolClass::create($request->all());
        return redirect()->route('SchoolClass.index')->with('success', 'Az osztály sikeresen hozzáadva.');
    }
    public function create()
    {
        return view('schoolClass.create');
    }
}