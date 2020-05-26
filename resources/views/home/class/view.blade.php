@extends('home.header')

@section('title', 'Class')

@section('content')

<div class="mt-10 py-6 px-4 bg-green-400 rounded h-64">

    <h1 class="text-center text-3xl font-semibold">{{ $c->name }}</h1>
    <h2 class="text-center text-lg font-semibold">Subject: {{ $c->description }}</h2>
    <h2 class="text-center text-lg font-semibold">Teacher: {{ $t['name'] }}</h2>
    <h3 class="text-center">Email: {{ $t['email'] }}</h3>
    <h3 class="text-center">Cabin No.: {{ $t['cabinno'] }}</h3>
    <h3 class="text-center">Phone No.: {{ $t['phone'] }}</h3>

    @if(auth()->user()->role =='teacher')

    <h3 class="text-center">Class Code: {{ $c->code }}</h3>

    @endif

</div>

<div class="mt-5 flex justify-evenly relative">

    <x-class-sidebar :course="$c->id" :s="$s" :m="$m" :st="$st"></x-class-sidebar>

    @isset($msg)
    <div class="my-3 py-2 px-4 text-green-500 border-2 border-green-400">
        {{ $msg }}
    </div>
    @endisset

    <div class="flex flex-col w-8/12 items-center">
        
        <div class="w-full h-16 bg-white min-h-0 rounded flex justify-center items-center">
    
            @if(auth()->user()->role == 'teacher')
            
            <a class="text-blue-600 hover:text-blue-300" href="" onclick="showPost()">Share something with your class...</a>

            @else

            <a class="text-blue-600 hover:text-blue-300" href="" onclick="showPost()">Ask a question or share something...</a>

            @endif
    
        </div>

        @if($p->count() == 0)

        @if(auth()->user()->role == 'teacher')

        <div class="w-1/2 border border-gray-500 border-4 rounded mt-5 px-4 py-6">

            <h2 class="text-lg text-green-600 font-semibold">Communicate with your class here</h2>
            
            <div class="flex mt-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24">
                    <path d="M10 5h-5.033c-2.743 0-4.967 2.239-4.967 5 0 2.762 2.224 5 4.967 5h5.033v-10zm2.007 17.475c-.52-.424-.902-.994-1.095-1.637l-1.151-3.827h-5.125l1.905 5.883c.214.659.828 1.106 1.521 1.106h3.439c.358 0 .677-.225.797-.562.12-.337.015-.713-.263-.939l-.028-.024zm-.007-17.475v2.014c3.088-.445 6.379-1.603 10-3.544v13.064c-3.607-1.924-6.958-3.109-10-3.548v2.014c3.164.509 7.16 1.992 12 5v-20c-4.964 3.085-8.877 4.502-12 5z"/>
                </svg>
                <span class="ml-2">Share important details</span>
            </div>

            <div class="flex mt-4">
                <svg viewbox="0 0 24 24" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                    <path d="M12 1c-6.338 0-12 4.226-12 10.007 0 2.05.739 4.063 2.047 5.625l-1.993 6.368 6.946-3c1.705.439 3.334.641 4.864.641 7.174 0 12.136-4.439 12.136-9.634 0-5.812-5.701-10.007-12-10.007zm0 1c6.065 0 11 4.041 11 9.007 0 4.922-4.787 8.634-11.136 8.634-1.881 0-3.401-.299-4.946-.695l-5.258 2.271 1.505-4.808c-1.308-1.564-2.165-3.128-2.165-5.402 0-4.966 4.935-9.007 11-9.007zm-5 7.5c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5-1.5-.672-1.5-1.5.672-1.5 1.5-1.5zm5 0c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5-1.5-.672-1.5-1.5.672-1.5 1.5-1.5zm5 0c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5-1.5-.672-1.5-1.5.672-1.5 1.5-1.5z"/>
                </svg>

                <span class="ml-2">Interact and reply to them</span>

            </div>

        </div>

        @endif


        @endif
    
    </div>

</div>

@endsection