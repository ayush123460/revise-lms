<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Courses;
use App\Files;
use App\Material;

class MaterialController extends Controller
{

    public function upload(Request $request)
    {
        $file = $request->file('file');

        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        Storage::disk('s3')->put($file->getClientOriginalName(), file_get_contents($file), 'public');

        $url = Storage::disk('s3')->url($file->getClientOriginalName());

        $f = Files::create([
            'name' => $filename,
            'url' => $url,
        ]);

        $m = Material::create([
            'user_id' => auth()->user()->id,
            'course_id' => $request->course_id,
            'file_id' => $f->id,
        ]);

        return back()->with('msg', 'Uploaded successfully.');
    }
    
}
