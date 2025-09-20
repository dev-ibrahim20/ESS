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
                    @if(session('error'))
                    <p>في حاجة غلط</p>
                    @endif
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">بيانات الطالب :-</h2>
                    <br>
                    <form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @csrf
                        @method('PUT')
                
                        <!-- الاسم -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">اسم الطالب</label>
                            <input type="text" name="name" value="{{ old('name', $student->name) }}" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500" required>
                            @error('name') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                
                        <!-- اسم الأب -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">اسم الأب</label>
                            <input type="text" name="father_name" value="{{ old('father_name', $student->father_name) }}" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500">
                            @error('father_name') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                
                        <!-- اسم الأم -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">اسم الأم</label>
                            <input type="text" name="mother_name" value="{{ old('mother_name', $student->mother_name) }}" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500">
                            @error('mother_name') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                
                        <!-- الهاتف -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">رقم الهاتف</label>
                            <input type="text" name="phone" value="{{ old('phone', $student->phone) }}" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500">
                            @error('phone') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>

                        <!-- البريد الالكتروني -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">البريد الالكتروني</label>
                            <input type="email" name="email" value="{{ old('email', $student->email) }}" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500">
                            @error('email') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                
                        <!-- العنوان -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">العنوان</label>
                            <input type="text" name="address" value="{{ old('address', $student->address) }}" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500">
                            @error('address') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                
                        <!-- تاريخ الميلاد -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">تاريخ الميلاد</label>
                            <input type="date" name="birthday" value="{{ old('birthday', optional($student->birthday)->format('Y-m-d')) }}" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500">
                            @error('birthday') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                
                        <!-- النوع -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">النوع</label>
                            <select name="gender" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500">
                                <option value="">اختر النوع</option>
                                <option value="male" {{ old('gender', $student->gender) === 'male' ? 'selected' : '' }}>ذكر</option>
                                <option value="female" {{ old('gender', $student->gender) === 'female' ? 'selected' : '' }}>أنثى</option>
                            </select>
                            @error('gender') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                
                        <!-- الديانة -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">الديانة</label>
                            <input type="text" name="religion" value="{{ old('religion', $student->religion) }}" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500">
                            @error('religion') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                
                        <!-- فصيلة الدم -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">فصيلة الدم</label>
                            <select name="blood_group" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500">
                                <option value="">اختر</option>
                                @foreach(['A+','A-','B+','B-','O+','O-','AB+','AB-'] as $bg)
                                    <option value="{{ $bg }}" {{ old('blood_group', $student->blood_group) === $bg ? 'selected' : '' }}>{{ $bg }}</option>
                                @endforeach
                            </select>
                            @error('blood_group') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                
                        <!-- الفصل -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">الفصل</label>
                            <select name="classroom_id" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500">
                                <option value="">اختر الفصل</option>
                                @foreach($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}" {{ old('classroom_id', $student->classroom_id) == $classroom->id ? 'selected' : '' }}>
                                        {{ $classroom->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('classroom_id') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>


                        <!-- الصف -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">الصف</label>
                            <select name="grade_id" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500">
                                <option value="">اختر الصف</option>
                                @foreach($grades as $grade)
                                    <option value="{{ $grade->id }}" {{ old('grade_id', $student->grade_id) == $grade->id ? 'selected' : '' }}>{{ $grade->name }}</option>
                                @endforeach
                            </select>
                            @error('grade_id') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                
                        <!-- رقم الجلوس -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">رقم الجلوس</label>
                            <input type="text" name="roll_number" value="{{ old('roll_number', $student->roll_number) }}" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500" required>
                            @error('roll_number') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                
                        <!-- صورة الطالب -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">📷 صورة الطالب</label>
                            <input type="file" name="photo_path" id="photoInput"
                                class="mt-1 w-full text-sm text-gray-700 dark:text-gray-200
                                        file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0
                                        file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700
                                        hover:file:bg-blue-100 dark:file:bg-gray-700 dark:file:text-gray-200
                                        dark:hover:file:bg-gray-600">
                
                            <!-- current image -->
                            @if($student->photo_path)
                                <div class="mt-4">
                                    <img id="currentPhoto" src="{{ asset('storage/app/public/students/'.$student->photo_path) }}" class="w-32 h-32 object-cover rounded-lg cursor-pointer" alt="photo">
                                </div>
                            @endif
                
                            <!-- preview -->
                            <div class="mt-4">
                                <img id="photoPreview" class="hidden w-32 h-32 object-cover rounded-lg border border-gray-300 dark:border-gray-700">
                            </div>
                
                            @error('photo_path') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                
                        <!-- زر الحفظ -->
                        <div class="md:col-span-2 flex justify-end">
                            <button type="submit"
                                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow
                                        hover:bg-blue-700 transition">
                                💾 حفظ التعديلات
                            </button>
                        </div>
                    </form>
                </div>
                
                
                
</x-app-layout>