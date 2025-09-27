<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('GC.grades.index')" :active="request()->routeIs('GC.grades.*')">
                    {{ __('الصفوف') }}
                </x-nav-link>
                <x-nav-link :href="route('GC.classrooms.index')" :active="request()->routeIs('GC.classrooms.*')">
                    {{ __('الفصول') }}
                </x-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="w-full mx-auto">
                        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                            @if(session('success'))
                            <div id="success-message" 
                                class="mb-4 px-4 py-2 bg-green-600 text-white font-semibold rounded-lg shadow">
                                {{ session('success') }}
                            </div>
                            @endif
                            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                                <h2 class="text-xl font-bold text-gray-800 dark:text-white">قائمة الصفوف الدراسية</h2>
                                <a href="{{ route('GC.grades.create')}}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                    <i class="fas fa-plus ml-2"></i> {{ __('➕ إضافة صف جديد') }}
                                </a>
                            </div>
                            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden mx-auto w-full items-center">
                                <div class="overflow-x-auto w-full">
                                    <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead class="bg-gray-50 dark:bg-gray-700 text-center">
                                            <tr class="text-center">
                                                <th scope="col" class="px-6 py-3 text-center text-sm font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                    الإجراءات
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center text-sm font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                    عدد الطلاب
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center text-sm font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                    اسم الصف
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white dark:bg-gray-800 divide-y w-full divide-gray-200 dark:divide-gray-700">
                                            @forelse ($grades as $grade)
                                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors text-center">
                                                <td class="px-2 py-3">
                                                    <div class="flex items-center justify-center gap-2">
                                                        <a href="{{ route('GC.grades.edit', $grade->id) }}" class="w-8 h-8 flex items-center justify-center text-gray-600 hover:text-white hover:bg-blue-500 dark:text-gray-400 dark:hover:bg-blue-600 rounded-full transition-all duration-200" title="تعديل">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                            </svg>
                                                        </a>
                                                        <form action="{{ route('GC.grades.destroy', $grade->id) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا الطالب؟')">
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
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                    <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100">
                                                        {{ $grade->students_count ?? 0 }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ $grade->name }}
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="3" class="px-6 py-12 text-center">
                                                    <div class="text-gray-400 dark:text-gray-500">
                                                        <i class="fas fa-inbox text-4xl mb-3"></i>
                                                        <p class="text-lg font-medium">لا توجد صفوف مضافة</p>
                                                        <p class="text-sm mt-1">انقر على زر إضافة صف جديد لبدء الإضافة</p>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                @if($grades->hasPages())
                                <div class="px-6 py-4 bg-gray-900/30 border-t border-gray-800">
                                    <div class="flex flex-col sm:flex-row items-center justify-between">
                                        <div class="mb-4 sm:mb-0">
                                            <p class="text-sm text-gray-400">
                                                عرض
                                                <span class="font-medium text-white">{{ $grades->firstItem() }}</span>
                                                إلى
                                                <span class="font-medium text-white">{{ $grades->lastItem() }}</span>
                                                من
                                                <span class="font-medium text-white">{{ $grades->total() }}</span>
                                                نتيجة
                                            </p>
                                        </div>
                                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                            {{ $grades->links() }}
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