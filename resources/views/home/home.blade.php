@extends('home.header')

@section('title', 'Home')

@section('content')

<div class="mt-10 px-4 py-6">

    @if(auth()->user()->role == 'admin')

    <div class="text-center">

        Coming Soon!
        
    </div>

    @elseif(auth()->user()->role == 'teacher')

        @if($c->count() > 0)

        <x-teacher-home :courses="$c"></x-teacher-home>

        @else

        <div class="text-center">
            There are no classes. <a class="text-blue-600 hover:text-blue-300" href="{{ route('create_class') }}">Create a class!</a>
        </div>

        @endif

    @elseif(auth()->user()->role == 'student')

        @if($c->count() == 0)

        <div class="text-center">
            There are no classes. <a class="text-blue-600 hover:text-blue-300" href="">Join a class!</a>
        </div>

        @endif

    @endif

</div>

@endsection