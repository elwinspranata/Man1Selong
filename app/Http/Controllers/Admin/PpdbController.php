<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SchoolSetting;
use App\Models\PpdbRegistrant;

class PpdbController extends Controller
{
    public function settings()
    {
        $settings = SchoolSetting::first();
        return view('admin.ppdb.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $data = $request->validate([
            'ppdb_status' => 'required|in:open,closed',
            'ppdb_year' => 'required|string|max:255',
        ]);

        $settings = SchoolSetting::first();
        $settings->update($data);

        return redirect()->back()->with('success', 'Pengaturan PPDB berhasil diperbarui.');
    }

    public function registrants()
    {
        $registrants = PpdbRegistrant::latest()->paginate(10);
        return view('admin.ppdb.registrants.index', compact('registrants'));
    }

    public function showRegistrant(PpdbRegistrant $registrant)
    {
        return view('admin.ppdb.registrants.show', compact('registrant'));
    }

    public function destroyRegistrant(PpdbRegistrant $registrant)
    {
        $registrant->delete();
        return redirect()->route('admin.ppdb.registrants.index')->with('success', 'Data pendaftar berhasil dihapus.');
    }

    public function verifyRegistrant(Request $request, PpdbRegistrant $registrant)
    {
        $data = $request->validate([
            'status' => 'required|in:draft,pending,verified,accepted,rejected',
            'notes' => 'nullable|string'
        ]);

        $registrant->update($data);

        return redirect()->back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }
}
