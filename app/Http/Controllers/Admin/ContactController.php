<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SchoolSetting;

class ContactController extends Controller
{
    public function index()
    {
        $setting = SchoolSetting::firstOrCreate(['id' => 1]);
        return view('admin.contact.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = SchoolSetting::firstOrCreate(['id' => 1]);

        $data = $request->validate([
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'map_url' => 'nullable|string',
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'youtube_url' => 'nullable|url|max:255',
            'tiktok_url' => 'nullable|url|max:255',
        ]);

        $setting->update($data);

        return redirect()->route('admin.contact.index')->with('success', 'Informasi kontak berhasil diperbarui.');
    }
}
