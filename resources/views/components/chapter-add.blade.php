<div class="overlay-box">

    <h2 class="text-center my-4 text-gray-900 font-semibold text-lg">Add Chapter</h2>

    <form action="{{ route('chapter_add') }}" method="POST" class="w-full flex flex-col justify-center items-center px-4 py-6">
        
        @csrf

        <div class="w-11/12 flex justify-between items-center">

            <label for="chapter-name">Chapter Name:</label>

            <input class="input" type="text" name="chapter_name" required autocomplete="off">

            <input class="input" type="hidden" name="course_id" value="{{ $course }}">

        </div>

        <div class="w-11/12 my-4 flex space-evenly bg-blue-200">

            <input type="submit" class="w-full py-2 text-center bg-blue-600 hover:bg-blue-400 active:border text-white cursor-pointer rounded" value="Add">

            <a href="" onclick="closeChapterAdd()" class="w-full py-2 text-center bg-red-600 hover:bg-red-400 active:border text-white cursor-pointer rounded" value="Join">
                Close
            </a>

        </div>

    </form>
    
</div>

<script>

function showChapterAdd() {
    event.preventDefault();
    document.querySelector('.overlay-box').style.display = "block";
    setTimeout(function() {
        document.querySelector('.overlay-box').style.opacity = "100";
    }, 200);
}

function closeChapterAdd() {
    event.preventDefault();
    document.querySelector('.overlay-box').style.opacity = "0";
    setTimeout(function() {
        document.querySelector('.overlay-box').style.display = "none";
    }, 200);
}

</script>