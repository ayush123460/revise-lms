<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Revise</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
</head>
<body class="bg-gray-200">
    
    <header class="bg-white">
        <div class="h-20 container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-900">Revise</h1>
            <span class="flex px-4">
                Welcome, {{ auth()->user()->fname }} |&nbsp;
                <a class="text-blue-600 hover:text-blue-300" href="{{ route('logout') }}">Logout</a>
            </span>
        </div>
    </header>

    <div class="container mx-auto">
        @yield('content')
    </div>

    <footer class="h-20 w-screen bg-gray-700 text-gray-500 flex justify-center items-center absolute bottom-0">
        &copy; 2020 Team XForce.
    </footer>

</body>
</html>