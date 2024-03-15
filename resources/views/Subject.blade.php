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
        <h1 class="text-2xl font-bold">School Manager</h1>
        <h2 class="text-xl">Subject details</h2>
        <div class="flex gap-5">
            <div class="flex flex-col gap-5">
                <div>
                    <span class="font-bold">Id:</span> {{ $subject->id }}
                </div>
                <div>
                    <span class="font-bold"> Name:</span> {{ $subject->name }}
                </div>
                <div>
                    <span class="font-bold">School year:</span> {{ $subject->school_year }}
                </div>
                <div>
                    <span class="font-bold">Average grade of this subject:</span> {{ $subject->averageGrade() }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
