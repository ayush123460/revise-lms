@extends('home.header')

@section('title', 'Create a Class')

@section('content')

<div class="mt-10 px-4 py-6">

    <h1 class="text-center font-semibold">Create a class</h1>

    <form action="{{ route('course_create') }}" method="POST" class="w-2/4 mx-auto flex flex-col justify-evenly items-center">

        @isset($err)
        <div class="my-3 py-2 px-4 text-red-500 border-2 border-red-400">
            {{ $err }}
        </div>
        @endisset

        @csrf

        <div class="input-group">
            <label for="name">Class Name:</label>
            <input class="input" type="text" name="name">
        </div>

        <div class="input-group">
            <label for="description">Subject:</label>
            <input class="input" type="text" name="description">
        </div>

        <div class="input-group">
            <label for="name">Grade/Year:</label>
            <input class="input" type="text" name="grade">
        </div>

        <div class="input-group">
            <input class="w-32 p-2 bg-green-600 hover:bg-green-300 active:border text-white cursor-pointer rounded" type="submit" value="Create">
        </div>

    </form>

</div>

@endsection