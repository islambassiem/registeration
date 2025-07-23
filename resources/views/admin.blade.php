<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Registered Students</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
</head>

<body class="flex p-6 lg:p-8 items-center lg:justify-center flex-col bg-gray-200/50" dir="rtl">
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm w-8/12 ">

        <div class="flex justify-center">
            <img class=" w-16 h-16 mt-10" src="https://csmonline.net/assets/img/logo.png" alt="logo" />
        </div>
        <div class="p-5 mx-auto">
            <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 text-center">كليات العناية الطبية</h5>
            <h6 class="mb-2 text-md font-bold tracking-tight text-gray-900 text-center"> قسم التكنولوجيا الطبية
                الحيوية
            </h6>
            <h6 class="mb-2 text-md font-bold tracking-tight text-gray-900 text-center"> تقرير الطلاب المسجلين
            </h6>
        </div>


        @if ($users->isEmpty())
            <div class="flex items-center p-4 mb-4 mx-5 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 "
                role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="font-medium text-lg">
                    لا يوجد طلبه مسجلين حتي الآن
                </div>
            </div>
        @else
            <section>
                {{-- @foreach ($users as $user)
                    <div>{{ $user->studentName }}</div>
                    <div>{{ $user->email }}</div>
                    <div>{{ $user->mobile }}</div>
                    <div>{{ $user->type }}</div>
                    @foreach ($user->attachments as $attachment)
                        <form action="{{ route('download') }}" method="post">
                            @csrf
                            <input type="hidden" name="link" value="{{ $attachment->link }}">
                            <button>{{ $attachment->readableName() }}</button>
                        </form>
                    @endforeach
                    <hr>
                @endforeach --}}

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 0">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xl">
                                    الطالب
                                </th>
                                <th scope="col" class="px-6 py-3 text-xl">
                                    الهوية
                                </th>
                                <th scope="col" class="px-6 py-3 text-xl">
                                    الجوال
                                </th>
                                <th scope="col" class="px-6 py-3 text-xl">
                                    الشهادة
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="bg-white border-gray-200 hover:bg-gray-600 hover:text-white">
                                    <th scope="row"
                                        class="flex items-center px-6 py-4  whitespace-nowrap ">
                                        <div class="ps-3">
                                            <div class="text-base font-semibold">{{ $user->studentName }}</div>
                                            <div class="font-normal ">{{ $user->email }}</div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4 text-lg">
                                        {{ $user->nationalID }}
                                    </td>
                                    <td class="px-6 py-4 text-lg">
                                        {{ $user->mobile }}
                                    </td>
                                    <td class="px-6 py-4 text-lg">
                                        {{ $user->type }}
                                    </td>
                                </tr>
                                <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                                    <td colspan="4">
                                        <div class="flex items-center py-4 mx-6 text-gray-900 whitespace-nowrap">
                                            <div class="ps-3">
                                                <div class="font-normal text-gray-500 flex flex-wrap gap-4 justify-between items-center">
                                                    @foreach ($user->attachments as $attachment)
                                                        <form action="{{ route('download') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="link"
                                                                value="{{ $attachment->link }}">
                                                            <button class="bg-blue-500/50 hover:bg-blue-700 text-black/50 hover:text-white text-sm py-2 px-4 rounded-4xl">{{ $attachment->readableName() }}</button>
                                                        </form>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        @endif

    </div>
</body>

</html>


{{-- <form action="{{ route('download') }}" method="post">
        @csrf
        <input type="hidden" name="file" value="uploads/2318777675|rivyk@mailinator.com|high_school_achievement.png">
        <button>Download</button>
    </form> --}}
