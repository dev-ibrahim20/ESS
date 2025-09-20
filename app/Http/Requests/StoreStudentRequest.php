<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'          => 'required|string|max:255',
            'father_name'   => 'required|string|max:255',
            'mother_name'   => 'required|string|max:255',
            'email'         => 'required|email|unique:students,email|max:255',
            'phone'         => 'required|string|regex:/^[0-9]{11}$/',
            'address'       => 'required|string|max:500',
            'birthday'      => 'required|date',
            'gender'        => 'required|in:male,female',
            'religion'      => 'required|string|max:100',
            'blood_group'   => 'required|string|max:5',
            'classroom_id'  => 'required|exists:classrooms,id',
            'grade_id'      => 'required|exists:grades,id',
            'roll_number'   => 'required|string|max:50|unique:students,roll_number',
            'photo_path'    => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'حقل الاسم مطلوب',
            'father_name.required' => 'حقل اسم الأب مطلوب',
            'mother_name.required' => 'حقل اسم الأم مطلوب',
            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'email.email' => 'يجب إدخال بريد إلكتروني صحيح',
            'email.unique' => 'هذا البريد الإلكتروني مسجل مسبقاً',
            'phone.required' => 'حقل الهاتف مطلوب',
            'phone.regex' => 'يجب أن يتكون رقم الهاتف من 11 رقم',
            'address.required' => 'حقل العنوان مطلوب',
            'birthday.required' => 'حقل تاريخ الميلاد مطلوب',
            'birthday.date' => 'يجب إدخال تاريخ صحيح',
            'gender.required' => 'حقل النوع مطلوب',
            'gender.in' => 'يجب اختيار النوع من القائمة المنسدلة',
            'religion.required' => 'حقل الديانة مطلوب',
            'blood_group.required' => 'حقل فصيلة الدم مطلوب',
            'classroom_id.required' => 'حقل الفصل مطلوب',
            'classroom_id.exists' => 'الفصل المحدد غير صحيح',
            'roll_number.required' => 'حقل رقم الجلوس مطلوب',
            'roll_number.unique' => 'رقم الجلوس مسجل مسبقاً',
            'photo_path.required' => 'حقل صورة الطالب مطلوب',
            'photo_path.image' => 'يجب أن يكون الملف المرفوع صورة',
            'photo_path.mimes' => 'يجب أن يكون نوع الملف jpg أو jpeg أو png',
            'photo_path.max' => 'يجب أن لا يتجاوز حجم الصورة 2 ميجابايت',
        ];
    }
}
