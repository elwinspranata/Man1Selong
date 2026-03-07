<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SchoolSetting;

class HeroController extends Controller
{
    public function index()
    {
        $setting = SchoolSetting::firstOrCreate(['id' => 1]);
        return view('admin.hero.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = SchoolSetting::firstOrCreate(['id' => 1]);

        $data = $request->validate([
            'hero_title' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string|max:500',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('hero', 'public');
        }

        $setting->update($data);

        return redirect()->route('admin.hero.index')->with('success', 'Pengaturan Hero berhasil diperbarui.');
    }
}
