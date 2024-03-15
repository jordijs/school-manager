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
        <h2 class="text-xl">Students</h2>
        <div class="flex gap-5">
            <ul class="flex flex-col gap-5">
                @foreach ($students as $student)
                    <li>
                        <div>
                            <span class="font-bold">Name:</span> {{ $student->name }}
                        </div>
                        <div>
                            <span class="font-bold">Surname:</span> {{ $student->surname }}
                        </div>
                        <div>
                            <span class="font-bold">Birthday:</span> {{ $student->birthday }}
                        </div>
                    </li>
                @endforeach
            </ul>

        </div>

</body>

</html>
