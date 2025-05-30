<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('fileupload.index', compact('galleries'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $image = $request->file('image');

        $storage = Storage::disk('public');
        $storage->makeDirectory('foto');
        if (!$storage->exists('foto')) {
            $path = $storage->putFileAs('images', $image);
        } else {
            $path = $storage->putFile('foto', $image);
        }

        $gallery = new Gallery();
        $gallery->images = $path;
        $gallery->title = $image->getClientOriginalName();
        $gallery->save( );
        return redirect()->route('fileupload.index');
    }
    public function delete(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->images);
        $gallery->delete();
        return redirect()->route('fileupload.index');
    }
}
