<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolSetting;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = SchoolSetting::firstOrCreate([], [
            'school_name' => 'MAN 1 LOMBOK TIMUR'
        ]);
        return view('admin.profile.index', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $setting = SchoolSetting::first();
        
        $data = $request->validate([
            'school_name' => 'required|string|max:255',
            'school_alias' => 'nullable|string|max:255',
            'principal_name' => 'nullable|string|max:255',
            'welcome_message' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'history' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'map_url' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'principal_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('school', 'public');
        }

        if ($request->hasFile('principal_photo')) {
            $data['principal_photo'] = $request->file('principal_photo')->store('school', 'public');
        }

        $setting->update($data);

        return redirect()->back()->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}
