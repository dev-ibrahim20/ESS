<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\ESS\Teachers;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        return view('teachers.home');
    }
    public function show()
    {
        $teachers = Teachers::paginate(10);
        return view('teachers.show', compact('teachers'));
    }
    public function create()
    {
        return view('teachers.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'photo' => 'required',
            'grade_id' => 'required',
            'classroom_id' => 'required',
            'subject_id' => 'required',
            'section_id' => 'required',
        ]);
        Teachers::create($request->all());
        return redirect()->route('teachers.index');
    }
    public function edit($id)
    {
        $teacher = Teachers::findOrFail($id);
        return view('teachers.edit', compact('teacher'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'photo' => 'required',
            'grade_id' => 'required',
            'classroom_id' => 'required',
            'subject_id' => 'required',
            'section_id' => 'required',
        ]);
        $teacher = Teachers::findOrFail($id);
        $teacher->update($request->all());
        return redirect()->route('teachers.index');
    }
    public function destroy($id)
    {
        $teacher = Teachers::findOrFail($id);
        $teacher->delete();
        return redirect()->route('teachers.index');
    }
}
