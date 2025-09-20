<?php

namespace App\Http\Controllers\GC;

use App\Http\Controllers\Controller;
use App\Models\ESS\Classrooms;
use App\Models\ESS\Grades;
use Illuminate\Http\Request;

class ClassroomsController extends Controller
{
    public function index()
    {
        $classrooms = Classrooms::paginate(5);
        return view('GC.classrooms.home', compact('classrooms'));
    }
    public function create()
    {
        $grades = Grades::all();
        return view('GC.classrooms.create', compact('grades'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:1|unique:classrooms,name',
            'grade_id' => 'required|exists:grades,id',
        ]);
        try {
            $data = $request->all();
            $name = $request->name. '/' .$request->grade_id;
            $data['name'] = $name;
            $classroom = Classrooms::create($data);
            return redirect()->route('GC.classrooms.index')->with('success', 'تم إضافة الفصل بنجاح ✅');
        } 
        catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ: ' . $e->getMessage())
                        ->withInput();
        }
    }
    public function edit($id)
    {
        $classroom = Classrooms::findOrFail($id);
        $grades = Grades::all();
        return view('GC.classrooms.edit', compact('classroom', 'grades'));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3|unique:classrooms,name',
        ]);
        try {
            $data = $request->all();
            $classroom = Classrooms::findOrFail($id);
            $classroom->update($data);
            return redirect()->route('GC.classrooms.index')->with('success', 'تم تحديث الفصل بنجاح ✅');
        } 
        catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ: ' . $e->getMessage())
                        ->withInput();
        }
    }
    public function destroy($id)
    {
        try {
            $classroom = Classrooms::findOrFail($id);
            $classroom->delete();
            return redirect()->route('GC.classrooms.index')->with('success', 'تم حذف الفصل بنجاح ✅');
        } 
        catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }
}
