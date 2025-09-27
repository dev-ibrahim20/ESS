<?php

namespace App\Http\Controllers\GC;

use App\Http\Controllers\Controller;
use App\Models\ESS\Grades;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    public function index()
    {
        $grades = Grades::paginate(5);
        return view('GC.grades.home', compact('grades'));
    }

    public function create()
    {
        return view('GC.grades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3|unique:grades,name',
        ]);
        try {
            $data = $request->all();
            $grade = Grades::create($data);
            return redirect()->route('grades.index')->with('success', 'تم إضافة الصف بنجاح ✅');
        } 
        catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ: ' . $e->getMessage())
                        ->withInput();
        }
    }
    public function edit($id)
    {
        $grade = Grades::findOrFail($id);
        return view('GC.grades.edit', compact('grade'));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3|unique:grades,name',
        ]);
        try {
            $data = $request->all();
            $grade = Grades::findOrFail($id);
            $grade->update($data);
            return redirect()->route('GC.grades.index')->with('success', 'تم تحديث الصف بنجاح ✅');
        } 
        catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ: ' . $e->getMessage())
                        ->withInput();
        }
    }
    public function destroy($id)
    {
        try {
            $grade = Grades::findOrFail($id);
            $grade->delete();
            return redirect()->route('grades.index')->with('success', 'تم حذف الصف بنجاح ✅');
        } 
        catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }
}
