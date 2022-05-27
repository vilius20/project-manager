<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Projects</title>
</head>

<body class="bg-gray-300">
    <nav class="p-6 bg-white flex justify-between mb-5">
        <a href="/">
            <!-- Name in left top corner -->
            <h1 class="text-3xl">Project Manager</h1>
        </a>
        <ul class="flex items-center">
            <!-- Button for adding project -->
            <li>
                <a class="p-3" href="{{ route('newProject') }}">New project</a>
            </li>
        </ul>
    </nav>
    {{-- Main content --}}
    <div class="flex justify-center">
        <div class="md:w-11/12 m-5 w-full bg-white p-6 rounded-lg">
            @yield('projects')
        </div>
    </div>
    {{-- Main content end --}}

</body>

</html>