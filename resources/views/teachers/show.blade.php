<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('teachers.show')" :active="request()->routeIs('teachers.show')">
                {{ __('المدرسين') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 p-4 sm:p-6 lg:p-8">
                        @if(session('success'))
                            <div id="success-message" 
                                class="mb-4 px-4 py-2 bg-green-600 text-white font-semibold rounded-lg shadow">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="max-w-7xl mx-auto">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                                <div>
                                    <h2 class="text-2xl sm:text-3xl font-bold bg-gradient-to-r from-blue-600 to-cyan-500 dark:from-blue-400 dark:to-cyan-300 bg-clip-text text-transparent">
                                        📋 قائمة المدرسين
                                    </h2>
                                </div>
                                <div class="mb-6">
                                    <a href="{{ route('students.create') }}" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white text-sm font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                        </svg>
                                        إضافة مدرس جديد
                                    </a>
                                </div>
                            </div>
                            
                            <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm">
                                <div class="overflow-x-auto w-full">
                                    <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead class="bg-gray-50 dark:bg-gray-700">
                                            <tr>
                                                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider" style="width: 25%;">
                                                    <div class="flex items-center justify-end">
                                                        <span class="ml-2">المدرس</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                        </svg>
                                                    </div>
                                                </th>
                                                <th class="px-2 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider" style="width: 10%;">
                                                    العنوان
                                                </th>
                                                <th class="px-2 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider" style="width: 10%;">
                                                    الهاتف
                                                </th>
                                                <th class="px-2 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider" style="width: 15%;">
                                                    الايميل
                                                </th>
                                                <th class="px-2 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider" style="width: 15%;">
                                                    الجنس
                                                </th>
                                                <th class="px-2 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider" style="width: 15%;">
                                                    الإجراءات
                                                </th>
                                            </tr>
                                        </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    @if($teachers->count() > 0)
                                        @foreach($teachers as $teacher)
                                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-9 w-9 rounded-full bg-gradient-to-br from-blue-500 to-cyan-500 flex items-center justify-center shadow-sm mr-3 text-white font-medium">
                                                            <span class="text-white font-medium text-sm">{{ substr($teacher->name, 0, 1) }}</span>
                                                        </div>
                                                        <div class="text-right rtl:text-right">
                                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                                                {{ $teacher->name }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                    <td class="px-4 py-3 text-center">
                                                        <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-200 text-sm font-medium">
                                                            {{ $teacher->grade->name }}
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 text-center">
                                                        <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-sm font-medium">
                                                            {{ $teacher->classroom->name }}
                                                        </div>
                                                    </td>
                                                    <td class="px-2 py-3 text-center">
                                                        <div class="text-sm text-gray-900 dark:text-gray-100">
                                                            {{ $teacher->roll_number }}
                                                        </div>
                                                    </td>
                                                    <td class="px-2 py-3 text-center">
                                                        <a href="tel:{{ $teacher->phone }}" class="inline-flex items-center text-sm text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-gray-500 dark:text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                                            </svg>
                                                            {{ $teacher->phone }}
                                                        </a>
                                                    </td>
                                                    <td class="px-2 py-3">
                                                        <div class="flex items-center justify-center gap-2">
                                                            <a href="{{ route('teachers.edit', $teacher->id) }}" class="w-8 h-8 flex items-center justify-center text-gray-600 hover:text-white hover:bg-blue-500 dark:text-gray-400 dark:hover:bg-blue-600 rounded-full transition-all duration-200" title="تعديل">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                </svg>
                                                            </a>
                                                            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا الطالب؟')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="w-8 h-8 flex items-center justify-center text-gray-600 hover:text-white hover:bg-red-500 dark:text-gray-400 dark:hover:bg-red-600 rounded-full transition-all duration-200" title="حذف">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                        <tr>
                                            <td colspan="6" class="py-16 text-center">
                                                <div class="flex flex-col items-center justify-center w-full">
                                                    <div class="text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-300 dark:text-gray-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                        </svg>
                                                        <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">لا توجد سجلات</h3>
                                                        <p class="text-sm text-gray-500 dark:text-gray-400">لم يتم العثور على أي مدرسين مسجلين في النظام.</p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                
                                @if($teachers->hasPages())
                                <div class="px-6 py-4 bg-gray-900/30 border-t border-gray-800">
                                    <div class="flex flex-col sm:flex-row items-center justify-between">
                                        <div class="mb-4 sm:mb-0">
                                            <p class="text-sm text-gray-400">
                                                عرض
                                                <span class="font-medium text-white">{{ $teachers->firstItem() }}</span>
                                                إلى
                                                <span class="font-medium text-white">{{ $teachers->lastItem() }}</span>
                                                من
                                                <span class="font-medium text-white">{{ $teachers->total() }}</span>
                                                نتيجة
                                            </p>
                                        </div>
                                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                            {{ $teachers->links() }}
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.transition = "opacity 0.5s ease";
                    successMessage.style.opacity = 0;
                    setTimeout(() => successMessage.remove(), 500);
                }, 3000); // 3 ثواني
            }
        });
    </script>
    

</x-app-layout>