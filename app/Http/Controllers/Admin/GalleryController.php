<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:image,video_url',
            'image' => 'nullable',
            'is_active' => 'boolean',
        ]);

        if ($request->type === 'image') {
            $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120']);
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('galleries', 'public');
            }
        } else {
            $request->validate(['image' => 'required|url']);
        }

        Gallery::create($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Media berhasil ditambahkan ke galeri.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:image,video_url',
            'image' => 'nullable',
            'is_active' => 'boolean',
        ]);

        if ($request->type === 'image') {
            if ($request->hasFile('image')) {
                $request->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:5120']);
                $data['image'] = $request->file('image')->store('galleries', 'public');
            } else {
                unset($data['image']);
            }
        } else {
            $request->validate(['image' => 'required|url']);
            $data['image'] = $request->image;
        }

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Media galeri berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', 'Media galeri berhasil dihapus.');
    }
}
