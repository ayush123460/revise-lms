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

<div class="my-5 flex justify-evenly relative">

    <x-class-sidebar :course="$c->id" :s="$s" :m="$m" :st="$st"></x-class-sidebar>

    @isset($msg)
    <div class="my-3 py-2 px-4 text-green-500 border-2 border-green-400">
        {{ $msg }}
    </div>
    @endisset

    <div class="flex flex-col w-8/12 items-center">

        <div class="w-full px-4 py-6 bg-white min-h-0 rounded">
            
            <h2 class="font-semibold text-lg text-center">Class Tools</h2>
            
            <div class="my-2 mx-auto flex w-3/5 justify-center items-center">
                
                @if(auth()->user()->role == 'teacher')
                
                <a class="px-4 py-2 text-center bg-blue-600 hover:bg-blue-400 active:border text-white cursor-pointer rounded" 
                href="{{ route('course_online', $c->code) }}">Take Online Class</a>

                @else

                <a class="px-4 py-2 text-center bg-blue-600 hover:bg-blue-400 active:border text-white cursor-pointer rounded" 
                href="{{ route('course_online', $c->code) }}">View Online Class</a>

                @endif

            </div>

        </div>

        
        <div class="mt-5 w-full bg-white min-h-0 rounded flex justify-center items-center">
    
            @if(auth()->user()->role == 'teacher')
            
            <a class="post-pre text-blue-600 px-4 py-6 hover:text-blue-300" href="" onclick="showPost()">Share something with your class...</a>

            @else

            <a class="post-pre text-blue-600 px-4 py-6 hover:text-blue-300" href="" onclick="showPost()">Ask a question or share something...</a>

            @endif

            <form id="post" method="POST" action="{{ route('post_create') }}" class="post flex flex-1 p-2 m-1" style="display: none; flex-direction=column;">
                
                @csrf

                <textarea name="post" rows="5" class="postarea w-full h-auto mb-2 border-0 border-b-2 focus:border-green-600 border-blue-600 text-gray-900" style="resize: none;" placeholder="Type here..."></textarea>

                <input type="hidden" name="course_id" value="{{ $c->id }}">

                <input type="submit" class="float-right w-32 py-2 text-center bg-blue-600 hover:bg-blue-400 active:border text-white cursor-pointer rounded" value="Post" onclick="checkPost()">

            </form>
    
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

        @foreach($p as $post)

        <div class="w-full mt-5 px-4 py-6 bg-white">
            
            <div class="font-semibold text-green-800 mb-1">{{ $post->user->fname . " " . $post->user->lname }}</div>

            <div class="font-medium text-gray-700 mb-5">{{ $post->created_at->diffForHumans() }}</div>

            {{ $post->content }}

            <div class="w-3/5 mx-auto border-t-2 mt-5"></div>
            
            @foreach($post->comments as $comment)

            <div class="w-3/5 mx-auto">
            
                <div class="font-semibold text-green-800 mb-1">{{ $comment->user->fname . " " . $comment->user->lname }}</div>
    
                <div class="font-medium text-gray-700 mb-2">{{ $comment->created_at->diffForHumans() }}</div>
    
                {{ $comment->content }}

            </div>

            <div class="w-3/5 mx-auto border-t-2 mt-2"></div>

            @endforeach

            <a class="mt-5 flex items-center text-gray-700 hover:text-green-600" class="pre-comment" href="" onclick="showComments({{ "'p-" .   $post->created_at->unix() . "'" }})">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M4 4v20h20v-20h-20zm18 18h-16v-13h16v13zm-3-3h-10v-1h10v1zm0-3h-10v-1h10v1zm0-3h-10v-1h10v1zm3-10h-19v19h-1v-20h20v1zm-2-2h-19v19h-1v-20h20v1z"/>
                </svg>
                <span class="ml-2">Comment</span>
            </a>

            <div class="comment" id="{{ 'p-' . $post->created_at->unix() }}" style="display: none;">
                
                <form id="{{ 'commentarea-' . $post->id . '-f' }}" method="POST" action="{{ route('comment_create') }}" class="comment flex flex-col flex-1 p-2 m-1">
                
                    @csrf
    
                    <textarea name="comment" id="commentarea-{{ $post->id }}" rows="3" class="w-full h-auto mb-2 border-0 border-b-2 focus:border-green-600 border-blue-600 text-gray-900" style="resize: none;" placeholder="Type here..."></textarea>
    
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
    
                    <input type="submit" class="float-right w-32 py-2 text-center bg-blue-600 hover:bg-blue-400 active:border text-white cursor-pointer rounded" value="Comment" onclick="checkComment( {{ "'commentarea-" . $post->id . "'" }})">
    
                </form>

            </div>

        </div>

        @endforeach
    
    </div>

</div>

@endsection

<script>

    function showPost() {
        event.preventDefault();
        document.querySelector('.post-pre').style.display = 'none';
        document.querySelector('.post').style.display = 'block';
    }

    function checkPost() {
        event.preventDefault();
        if(document.querySelector('.postarea').value)
            document.querySelector('#post').submit();
    }

    // function showComments(id) {
    //     event.preventDefault();
    //     let el = document.querySelector(`#${id}`);
    //     if(el.style.display == 'block')
    //         el.style.display = 'none';
    //     else
    //         el.style.display = 'block';
    // }

    function checkComment(id) {
        event.preventDefault();
        if(document.querySelector(`#${id}`).value)
            document.querySelector(`#${id}-f`).submit();
    }

</script>