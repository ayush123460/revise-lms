@extends('home.header')

@section('title', 'Online Class')

@section('content')

<div class="mt-5">
    <a class="px-4 py-2 text-center bg-blue-600 hover:bg-blue-400 active:border text-white cursor-pointer rounded" href="{{ route('auth_home') }}">Go back</a>
    <a class="px-4 py-2 text-center bg-blue-600 hover:bg-blue-400 active:border text-white cursor-pointer rounded" href="" onclick="openWhiteboard()">Open Whiteboard</a>
</div>

<div class="flex w-full">

    <div class="meet flex-1 flex-shrink"></div>

    <div class="whiteboard"></div>

</div>

<input type="hidden" class="class_code" value="{{ $c->code }}">

<input type="hidden" class="user_name" value="{{ auth()->user()->fname . " " . auth()->user()->lname }}">

<input type="hidden" class="user_email" value="{{ auth()->user()->email }}">

@endsection

<script src='https://meet.jit.si/external_api.js'></script>

<script>

    window.onload = function() {

        const domain = 'meet.jit.si';
        const options = {
            roomName: document.querySelector('.class_code').value,
            width: '100%',
            height: '720px',
            parentNode: document.querySelector('.meet'),
            userInfo: {
                email: document.querySelector('.user_name').value,
                displayName: document.querySelector('.user_email').value
            },
            interfaceConfigOverwrite: {
                SHOW_WATERMARK_FOR_GUESTS: false,
                SHOW_BRAND_WATERMARK: false,
                CLOSE_PAGE_GUEST_HINT: false,
                MOBILE_APP_PROMO: true,
            }
        };

        const api = new JitsiMeetExternalAPI(domain, options);
        
    }

    function openWhiteboard() {

        event.preventDefault();

        let el = document.querySelector('.whiteboard');

        let iframe = document.createElement('iframe');

        iframe.style.width = "640px";

        iframe.style.height = "100%";

        iframe.src = `https://wbo.ophir.dev/boards/${document.querySelector('.class_code').value}`

        el.appendChild(iframe);

    }



</script>