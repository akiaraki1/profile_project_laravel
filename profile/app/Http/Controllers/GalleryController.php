<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        if (!session('user_id')) {
            return redirect('/');
        }
        
        $files = Storage::disk('public')->files('image');

        return view('gallery', compact('files'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        $request->file('picture')->store('image', 'public');

        return redirect()->route('gallery.index');
    }
}
