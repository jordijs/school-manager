<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>School manager</title>

    <!-- Fonts -->

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-slate-300 flex justify-center">
    <div class="flex flex-col gap-5 justify-center items-center">
        <h1 class="text-2xl font-bold">Student Manager</h1>
        <h2 class="text-xl">Subjects</h2>
        <div class="flex gap-5">
            <div class="flex flex-col gap-5">
                @foreach ($subjects as $subject)
                    <button class="bg-slate-800 p-5 rounded-2xl shadow text-white">
                        <div>
                            <span class="font-bold">Name:</span> {{ $subject->name }}
                        </div>
                        <div>
                            <span class="font-bold">School year:</span> {{ $subject->school_year }}
                        </div>
                    </button>
                @endforeach
                </div>
        </div>
</body>

</html>
