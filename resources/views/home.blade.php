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

<body class="min-h-screen bg-slate-300 flex justify-center p-10">
    <div class="flex flex-col gap-5 justify-center items-center">
        <h1 class="text-2xl font-bold">Student Manager</h1>
        <p>Please select the data to view:</p>
        <div class="flex gap-5">
            <a href="{{ route('students') }}">
                <button class="bg-slate-800 p-5 rounded-2xl shadow text-white">
                    Students
                </button>
            </a>
            <a href="{{ route('subjects') }}">
                <button class="bg-slate-800 p-5 rounded-2xl shadow text-white">
                    Subjects
                </button>
            </a>
        </div>
    </div>
</body>

</html>
