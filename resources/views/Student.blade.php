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
        <h2 class="text-xl">Student details</h2>
        <div class="flex gap-5">
            <div class="flex flex-col gap-5">
                <div>
                    <span class="font-bold">Id:</span> {{ $student->id }}
                </div>
                <div>
                    <span class="font-bold"> Name:</span> {{ $student->name }}
                </div>
                <div>
                    <span class="font-bold">Surname:</span> {{ $student->surname }}
                </div>
                <div>
                    <span class="font-bold">Birthday:</span> {{ $student->birthday }}
                </div>
                <div>
                    <div class="font-bold">Grades:</div>
                    <div class="flex flex-col gap-5">
                        Average grade: {{ $student->averageGrade() }}
                        @foreach ($student->grades as $grade)
                            <div class="border border-slate-700 p-5 rounded shadow ">
                                <div>
                                    <span class="font-bold">Subject:</span> {{ $grade->subject->name }}
                                </div>
                                <div>
                                    <span class="font-bold">Grade:</span> {{ $grade->grade }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
</body>

</html>
