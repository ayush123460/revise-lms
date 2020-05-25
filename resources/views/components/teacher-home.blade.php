@foreach($courses as $course)

<h1 class="text-center font-semibold text-2xl">Your classes</h1>
<div class="text-center mt-2">
    <a class="inline-block px-4 py-2 bg-blue-600 text-white hover:bg-blue-300 rounded" href="{{ route('create_class') }}">+ Create New</a>
</div>

<div class="flex flex-wrap">

    @foreach($courses as $c)

    <a class="bg-white px-6 py-6 rounded flex justify-center items-center transition-shadow duration-200 hover:shadow-md" href="{{ route('course_view', $c->code) }}">
        {{ $c->name }}
    </a>

    @endforeach

</div>

@endforeach