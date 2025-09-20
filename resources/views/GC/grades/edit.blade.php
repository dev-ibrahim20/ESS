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
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        Welcome In Grades Create Page.
                    </h2>
                    <br>
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-600 text-white rounded-lg">
                            <strong>⚠ يوجد بعض الأخطاء:</strong>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                     @endif
                
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">بيانات الطالب :-</h2>
                    <br>
                    <form method="POST" action="{{ route('GC.grades.update', $grade->id) }}" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @csrf
                        @method('PUT')
                
                        <!-- الاسم -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">اسم الصف</label>
                            <input type="text" value="{{ $grade->name }}" name="name" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- زر الحفظ -->
                        <div class="md:col-span-2 flex justify-end">
                            <button type="submit"
                                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow
                                        hover:bg-blue-700 transition">
                                💾 حفظ 
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 
</x-app-layout>