<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Revise</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
</head>
<body class="bg-gray-100">
    
    <header class="h-20 bg-white shadow flex flex-col justify-center items-center">
        <h1 class="text-xl font-semibold text-gray-900">Revise</h1>
        <span class="text-sm italic">All-in-one learning.</span>
    </header>

    @yield('content')

    <footer class="h-20 w-screen bg-gray-700 text-gray-500 flex justify-center items-center absolute bottom-0">
        &copy; 2020 Team XForce.
    </footer>

</body>
</html>