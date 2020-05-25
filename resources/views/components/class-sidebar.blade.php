<div class="w-3/12 flex flex-col">
        
    <div class="w-60 px-4 py-6 bg-white border border-gray-300 rounded-lg text-center">
        
        <h3 class="font-semibold">Syllabus</h3>

        @if($s->count() == 0)

            @if(auth()->user()->role == 'teacher')

            <a class="block mt-5 text-blue-600 hover:text-blue-300" href="">Click here to add chapters</a>

            @else

            There is nothing here.

            @endif

        @else

        hola!

        @endif

    </div>

    <div class="w-60 px-4 py-6 mt-5 bg-white border border-gray-300 rounded-lg text-center">

        <h3 class="font-semibold">Material</h3>

        @if($m->count() == 0)

            @if(auth()->user()->role == 'teacher')
            
            <a class="block mt-5 text-blue-600 hover:text-blue-300" href="">Click here to upload material</a>

            @else

            There is nothing here.

            @endif

        @else

        hola!

        @endif

    </div>

    @if(auth()->user()->role == 'teacher')

    <div class="w-60 px-4 py-6 mt-5 bg-white border border-gray-300 rounded-lg text-center">

        <h3 class="font-semibold">Students</h3>

        @if($st->count() == 0)

        Give your students the class code so they can join!

        @else

        <ul class="list-disc">

            @foreach($st as $student)

            <li>{{ $student->fname . " " . $student->lname }}</li>

            @endforeach

        </ul>



        @endif

    </div>

    @endif

</div>