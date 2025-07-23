<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Registeration</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
</head>

<body class="flex p-6 lg:p-8 items-center lg:justify-center flex-col bg-gray-200/50" dir="rtl">
    <form action="{{ route('upload') }}" method="post" class="w-8/12" enctype="multipart/form-data"
        x-data="{ type: '' }">
        @csrf
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="flex justify-center">
                <img class=" w-16 h-16 mt-10" src="https://csmonline.net/assets/img/logo.png" alt="logo" />
            </div>
            <div class="p-5 mx-auto">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 text-center">كليات العناية الطبية</h5>
                <h6 class="mb-2 text-md font-bold tracking-tight text-gray-900 text-center"> قسم التكنولوجيا الطبية
                    الحيوية
                </h6>
            </div>

            @if (session()->has('success'))
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 mx-5"
                    role="alert">
                    <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">تم التسجيل بنجاح</span>
                    </div>
                </div>
            @endif

            <section class="p-6 pb-3">
                <div>
                    <label for="studentName" class="block mb-2 text-sm font-medium text-gray-900 ">إسم الطالب</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                            </svg>
                        </span>
                        <input type="text" id="studentName" name="studentName"
                            class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  "
                            placeholder="الاسم الكامل" value="{{ old('studentName') }}">
                    </div>
                    @error('studentName')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">البريد
                        الالكتروني</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 16">
                                <path
                                    d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                <path
                                    d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                            </svg>
                        </div>
                        <input type="text" id="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 "
                            placeholder="البريد الالكتروني" value="{{ old('email') }}" />
                    </div>
                    @error('email')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-5">
                    <label for="mobile" class="block mb-2 text-sm font-medium text-gray-900 ">رقم الهاتف</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 19 18">
                                <path
                                    d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                            </svg>
                        </div>
                        <input type="number" id="mobile" aria-describedby="helper-text-explanation" name="mobile"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  "
                            pattern="[0-9]{10}" placeholder="0501234567" value="{{ old('mobile') }}" />
                    </div>
                    @error('mobile')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-5">
                    <label for="nationalID" class="block mb-2 text-sm font-medium text-gray-900 ">رقم الهوية</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="w-4 h-4 text-gray-900 " stroke-width="1" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33" />
                            </svg>
                        </div>
                        <input type="number" id="nationalID" aria-describedby="helper-text-explanation"
                            name="nationalID"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  "
                            pattern="[0-9]{10}" placeholder="123456789" value="{{ old('nationalID') }}" />
                    </div>
                    @error('nationalID')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-5">
                    <label for="certificateSelect" class="block mb-2 text-sm font-medium text-gray-900 ">نوع
                        الشهادة</label>
                    <select id="certificateSelect" name="type" x-on:change="type = $event.target.value"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected disabled>نوع الشهادة</option>
                        <option value='ثانوي'>ثانوي</option>
                        <option value='دبلوم تقنية الأجهزة الطبية'>دبلوم تقنية الأجهزة
                            الطبية</option>
                        <option value='الدبومات الاخرى'>الدبومات الاخرى</option>
                    </select>
                </div>
                @error('type')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </section>
            @error('high_school_certificate')
                <div class="text-red-600 ps-5">{{ $message }}</div>
            @enderror
            @error('يرجى إرفاق شهادة القدرات')
                <div class="text-red-600 ps-5">{{ $message }}</div>
            @enderror
            @error('يرجى إرفاق شهادة التحصيلي')
                <div class="text-red-600 ps-5">{{ $message }}</div>
            @enderror
            <template x-if="type === 'ثانوي'">
                <div>
                    <x-upload title="شهادة الثانوية (مطلوب*)" name="high_school_certificate" />
                    <x-upload title="شهادة القدرات (مطلوب*)" name="high_school_aptitudes" />
                    <x-upload title="شهادة التحصيلي (مطلوب*)" name="high_school_achievement" />
                </div>
            </template>
            <template x-if="type === 'دبلوم تقنية الأجهزة الطبية'">
                <div>
                    <x-upload title="صورة من وثيقة الدبلوم (مطلوب*)" name="bmt_certificate" />
                    <x-upload title="صورة من السجل الاكاديمي (مطلوب*)" name="bmt_transcript" />
                    <x-upload title="شهادة الثانوية (مطلوب*)" name="bmt_high_school_certificate" />
                    <x-upload title="صورة من بطاقة تصنيف الهيئة (مطلوب*)" name="bmt_sce" />
                    <x-upload title="شهادة الثانوية (مطلوب*)" name="bmt_language" />
                </div>
            </template>
            <template x-if="type === 'الدبومات الاخرى'">
                <div>
                    <x-upload title="شهادة الثانوية (مطلوب*)" name="other_high_school_certificate" />
                    <x-upload title="شهادة القدرات (مطلوب*)" name="other_aptitudes_certificate" />
                    <x-upload title="شهادة التحصيلي (مطلوب*)" name="other_achievement_certificate" />
                    <x-upload title="شهادة السجل الاكاديمي (مطلوب*)" name="other_tramscript_certificate" />
                </div>
            </template>
            <div class="felx justify-end">
                <button type="submit"
                    class="text-white bg-purple-700 hover:bg-purple-800 disabled:bg-purple-100 disabled:text-gray-400 disabled:cursor-not-allowed focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center m-2">تسجيل</button>
            </div>
    </form>
    </div>
    {{-- <form action="{{ route('download') }}" method="post">
        @csrf
        <input type="hidden" name="file" value="uploads/2318777675|rivyk@mailinator.com|high_school_achievement.png">
        <button>Download</button>
    </form> --}}
</body>

</html>
