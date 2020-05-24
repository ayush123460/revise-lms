@extends('header')

@section('content')

<div class="mt-10 py-4 px-6">

    <div class="h-40 container mx-auto flex flex-col justify-center items-center">

        <a href="{{ route('doLogin') }}" class="inline-block w-32 py-2 text-center bg-blue-600 hover:bg-blue-400 active:border text-white cursor-pointer rounded">
            Login
        </a>

        <h1 class="font-semibold text-center">Login to access your classes.</h1>

    </div>

</div>

@endsection