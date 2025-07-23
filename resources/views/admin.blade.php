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
            <h6 class="mb-2 text-md font-bold tracking-tight text-gray-900 text-center"> تقرير الطالبين المسجلين
            </h6>
        </div>

        <section>
            @foreach ($users as $user)
                <div>{{ $user->studentName }}</div>
                <div>{{ $user->email }}</div>
                <div>{{ $user->mobile }}</div>
                <div>{{ $user->type }}</div>
                @foreach ($user->attachments as $attachment)
                    <form action="{{ route('download') }}"  method="post">
                        @csrf
                        <input type="hidden" name="link" value="{{ $attachment->link }}">
                        <button>{{ $attachment->readableName() }}</button>
                    </form>
                @endforeach
                <hr>
            @endforeach
        </section>
    </div>
</body>

</html>


{{-- <form action="{{ route('download') }}" method="post">
        @csrf
        <input type="hidden" name="file" value="uploads/2318777675|rivyk@mailinator.com|high_school_achievement.png">
        <button>Download</button>
    </form> --}}
