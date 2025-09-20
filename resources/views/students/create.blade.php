<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('students.index')" :active="request()->routeIs('students.index')">
                {{ __('الطلاب') }}
            </x-nav-link>
            <x-nav-link :href="route('students.create')" :active="request()->routeIs('students.create')">
                {{ __('➕ إضافة طالب جديد') }}
            </x-nav-link>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        Welcome In Students Create Page.
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
                    <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @csrf
                
                        <!-- الاسم -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">اسم الطالب</label>
                            <input type="text" name="name" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500" required>
                        </div>
                
                        <!-- اسم الأب -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">اسم الأب</label>
                            <input type="text" name="father_name" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500" required>
                        </div>
                
                        <!-- اسم الأم -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">اسم الأم</label>
                            <input type="text" name="mother_name" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500" required>
                        </div>
                
                        <!-- الهاتف -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">رقم الهاتف</label>
                            <input type="text" name="phone" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500" required>
                        </div>

                            <!-- البريد الالكتروني -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">البريد الالكتروني</label>
                                <input type="email" name="email" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500" required>
                            </div>
                
                        <!-- العنوان -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">العنوان</label>
                            <input type="text" name="address" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500" required>
                        </div>
                
                        <!-- تاريخ الميلاد -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">تاريخ الميلاد</label>
                            <input type="date" name="birthday" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500" required>
                        </div>
                
                        <!-- النوع -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">النوع</label>
                            <select name="gender" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500" required>
                                <option value="">اختر النوع</option>
                                <option value="male">ذكر</option>
                                <option value="female">أنثى</option>
                            </select>
                        </div>
                
                        <!-- الديانة -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">الديانة</label>
                            <input type="text" name="religion" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500" required>
                        </div>
                
                        <!-- فصيلة الدم -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">فصيلة الدم</label>
                            <select name="blood_group" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500" required>
                                <option value="">اختر</option>
                                @foreach(['A+','A-','B+','B-','O+','O-','AB+','AB-'] as $bg)
                                    <option value="{{ $bg }}">{{ $bg }}</option>
                                @endforeach
                            </select>
                        </div>
                
                        <!-- الفصل -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">الفصل</label>
                            <select name="classroom_id" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500">
                                <option value="">اختر الفصل</option>
                                @foreach($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- الصف -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">الصف</label>
                            <select name="grade_id" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500">
                                <option value="">اختر الصف</option>
                                @foreach($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                        </div>
                
                        <!-- رقم الجلوس -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">رقم الجلوس</label>
                            <input type="text" name="roll_number" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500" required>
                        </div>
                
                        <!-- صورة الطالب -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">📷 صورة الطالب</label>
                            <input type="file" name="photo_path" id="photoInput"
                                class="mt-1 w-full text-sm text-gray-700 dark:text-gray-200
                                        file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0
                                        file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700
                                        hover:file:bg-blue-100 dark:file:bg-gray-700 dark:file:text-gray-200
                                        dark:hover:file:bg-gray-600" required>
                        </div>

                        <!-- زر الحفظ -->
                        <div class="md:col-span-2 flex justify-end">
                            <button type="submit"
                                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow
                                        hover:bg-blue-700 transition">
                                💾 حفظ الطالب
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 
</x-app-layout>