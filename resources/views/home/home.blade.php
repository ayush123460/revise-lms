@extends('home.header')

@section('title', 'Home')

@section('content')

<div class="mt-10 px-4 py-6">

    @if(auth()->user()->role == 'admin')

    <div class="text-center">

        Coming Soon!
        
    </div>

    @endif

</div>

@endsection