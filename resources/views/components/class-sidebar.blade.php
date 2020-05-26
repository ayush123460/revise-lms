<div class="w-3/12 flex flex-col">
        
    <div class="w-60 px-4 py-6 flex flex-col justify-evenly items-center bg-white rounded-lg text-center">
        
        <h3 class="font-semibold">Syllabus</h3>

        @if($s == null)

            @if(auth()->user()->role == 'teacher')

            <a class="block mt-5 text-blue-600 hover:text-blue-300" href="" onclick="showChapterAdd()">Click here to add chapters</a>

            @else

            There is nothing here.

            @endif

        @else

        <ol class="list-decimal text-left">

            @foreach($s as $chapter)

            @if(auth()->user()->role == 'teacher')

            <form method="POST" action="{{ route('chapter_complete') }}" id="{{ Str::slug($chapter->name) }}">

                @csrf

                @if($chapter->completed == '1')

                <li><input type="checkbox" checked onclick="updateCompleted({{ "'" .  Str::slug($chapter->name) . "'" }})"> {{ $chapter->name }}</li>

                @else

                <li><input type="checkbox" onclick="updateCompleted({{ "'" . Str::slug($chapter->name) . "'" }})"> {{ $chapter->name }}</li>

                @endif

                <input type="hidden" name="chapter_id" value="{{ $chapter->id }}">
                
            </form>

            @else

            <li class="{{ $chapter->completed == '1' ? 'font-semibold' : '' }}">{{ $chapter->name }}</li>

            @endif
            
            @endforeach

        </ol>

        @if(auth()->user()->role == 'teacher')

        <a class="block mt-2 text-blue-600 hover:text-blue-300" href="" onclick="showChapterAdd()">Add chapter</a>

        @else
        
        <div class="italic mt-2">Chapters in bold are marked as completed by the teacher.</div>

        @endif

        @endif

        <x-chapter-add :course="$course"></x-chapter-add>

    </div>

    <div class="w-60 px-4 py-6 mt-5 bg-white rounded-lg text-center">

        <h3 class="font-semibold">Material</h3>

        @if($m->count() == 0)

            @if(auth()->user()->role == 'teacher')
            
            <a class="block mt-5 text-blue-600 hover:text-blue-300" href="" onclick="showUploadMaterial()">Click here to upload material</a>

            @else

            There is nothing here.

            @endif

        @else

        @foreach($m as $material)

        <a class="block my-2 text-blue-600 hover:text-blue-300" target="_blank" href="{{ $material->file->url }}">{{ $material->file->name }}</a>

        @endforeach

        @if(auth()->user()->role == 'teacher')
            
        <a class="block mt-5 text-blue-600 hover:text-blue-300" href="" onclick="showUploadMaterial()">Upload material</a>

        @endif

        @endif


        <x-material-upload :course="$course"></x-material-upload>

    </div>

    @if(auth()->user()->role == 'teacher')

    <div class="w-60 px-4 py-6 mt-5 bg-white rounded-lg text-center">

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

<script>

    function updateCompleted(id) {

        console.log(id);

        document.querySelector("form#" + id).submit();

    }

</script>