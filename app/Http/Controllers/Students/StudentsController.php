<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Models\ESS\Classrooms;
use App\Models\ESS\Grades;
use App\Models\ESS\Students;
use DB;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Students::paginate(5);
        return view('students.home', compact('students'));
    }
    public function create()
    {
        $classrooms = Classrooms::all();
        $grades = Grades::all();
        return view('students.create', compact('classrooms', 'grades'));
    }

    public function store(StoreStudentRequest $request)
    {
        try {
            $data = $request->validated();
            
            if ($request->hasFile('photo_path')) {
                $fileName = time() . '_' . $request->file('photo_path')->getClientOriginalName(); 
                $data['photo_path'] = $request->file('photo_path')->storeAs('students', $fileName, 'public');
            }

            $data['school_year'] = date('Y');
            $data['class_number'] = $data['classroom_id'] ?? 'غير محدد';

            $student = Students::create($data);
            
            return redirect()->route('students.index')
                ->with('success', 'تم إضافة الطالب بنجاح ✅');
                
        } catch (\Exception $e) {
            if (isset($data['photo_path']) && \Storage::disk('public')->exists($data['photo_path'])) {
                \Storage::disk('public')->delete($data['photo_path']);
            }
            
            return back()->with('error', 'حدث خطأ: ' . $e->getMessage())
                        ->withInput();
        }
    }
    public function edit($id)
    {
        $classrooms = Classrooms::all();
        $grades = Grades::all();
        $student = Students::findOrFail($id);
        return view('students.edit', compact('student', 'classrooms', 'grades'));
    }
    public function update(Request $request, $id)
    {
        $student = Students::findOrFail($id);
        $data = $request->except('_token', '_method');
        
        if ($request->hasFile('photo_path')) {
            if ($student->photo_path && \Storage::disk('public')->exists($student->photo_path)) {
                \Storage::disk('public')->delete($student->photo_path);
            }

            $fileName = time() . '_' . $request->file('photo_path')->getClientOriginalName();
            $data['photo_path'] = $request->file('photo_path')->storeAs('students', $fileName, 'public');
        } else if (isset($data['remove_photo'])) {
            if ($student->photo_path && \Storage::disk('public')->exists($student->photo_path)) {
                \Storage::disk('public')->delete($student->photo_path);
            }
            $data['photo_path'] = null;
        } else {
            unset($data['photo_path']);
        }

        try {
            $student->update($data);
            return redirect()->route('students.index')
                ->with('success', 'تم تحديث بيانات الطالب بنجاح ✅');
        } catch (\Exception $e) {
            if (isset($data['photo_path']) && \Storage::disk('public')->exists($data['photo_path'])) {
                \Storage::disk('public')->delete($data['photo_path']);
            }
            
            return back()->with('error', 'حدث خطأ أثناء التحديث: ' . $e->getMessage())
                        ->withInput();
        }
    }

    public function destroy($id)
    {
        $student = Students::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'تم حذف الطالب بنجاح ✅');
    }
}
