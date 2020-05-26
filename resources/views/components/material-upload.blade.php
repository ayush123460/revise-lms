<div class="overlay-box material-upload">

    <h2 class="text-center my-4 text-gray-900 font-semibold text-lg">Upload Material</h2>

    <form action="{{ route('material_upload') }}" method="POST" class="w-full flex flex-col justify-center items-center px-4 py-6" enctype="multipart/form-data">
        
        @csrf

        <div class="w-11/12 flex justify-between items-center">

            <label for="file">File:</label>

            <input type="file" name="file" required accept="application/pdf">

            <input class="input" type="hidden" name="course_id" value="{{ $course }}">

        </div>

        <div class="w-11/12 my-4 flex space-evenly bg-blue-200">

            <input type="submit" class="w-full py-2 text-center bg-blue-600 hover:bg-blue-400 active:border text-white cursor-pointer rounded" value="Upload">

            <a href="" onclick="closeUploadMaterial()" class="w-full py-2 text-center bg-red-600 hover:bg-red-400 active:border text-white cursor-pointer rounded" value="Join">
                Close
            </a>

        </div>

    </form>
    
</div>

<script>

function showUploadMaterial() {
    event.preventDefault();
    document.querySelector('.material-upload').style.display = "block";
    setTimeout(function() {
        document.querySelector('.material-upload').style.opacity = "100";
    }, 200);
}

function closeUploadMaterial() {
    event.preventDefault();
    document.querySelector('.material-upload').style.opacity = "0";
    setTimeout(function() {
        document.querySelector('.material-upload').style.display = "none";
    }, 200);
}

</script>