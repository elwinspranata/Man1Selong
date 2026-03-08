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
            'pengumuman_status' => 'required|boolean',
        ]);

        $settings = SchoolSetting::first();
        $settings->update($data);

        return redirect()->back()->with('success', 'Pengaturan PPDB berhasil diperbarui.');
    }

    public function registrants(Request $request)
    {
        $jalur = $request->query('jalur');
        
        $query = PpdbRegistrant::latest();
        
        if ($jalur && in_array($jalur, ['prestasi', 'reguler'])) {
            $query->where('jalur', $jalur);
        }
        
        $registrants = $query->paginate(10)->withQueryString();
        
        $counts = [
            'semua' => PpdbRegistrant::count(),
            'prestasi' => PpdbRegistrant::where('jalur', 'prestasi')->count(),
            'reguler' => PpdbRegistrant::where('jalur', 'reguler')->count(),
        ];
        
        return view('admin.ppdb.registrants.index', compact('registrants', 'counts', 'jalur'));
    }

    public function export(Request $request)
    {
        $jalur = $request->query('jalur');
        $filename = 'Data_Pendaftar_PPDB_' . ($jalur ? ucfirst($jalur) . '_' : '') . date('Ymd_His') . '.xlsx';
        
        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\RegistrantsExport($jalur), $filename);
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
