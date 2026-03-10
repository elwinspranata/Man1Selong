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
        $tahun = $request->query('tahun');
        $search = $request->query('search');
        
        $query = PpdbRegistrant::latest();
        
        if ($jalur && in_array($jalur, ['prestasi', 'reguler'])) {
            $query->where('jalur', $jalur);
        }

        if ($tahun) {
            $query->whereYear('created_at', $tahun);
        }

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('nisn', 'like', "%{$search}%")
                  ->orWhere('registration_number', 'like', "%{$search}%");
            });
        }
        
        $registrants = $query->paginate(25)->withQueryString();
        
        $counts = [
            'semua' => PpdbRegistrant::count(),
            'prestasi' => PpdbRegistrant::where('jalur', 'prestasi')->count(),
            'reguler' => PpdbRegistrant::where('jalur', 'reguler')->count(),
            'pending' => PpdbRegistrant::where('status', 'pending')->count(),
            'verified' => PpdbRegistrant::where('status', 'verified')->count(),
            'accepted' => PpdbRegistrant::where('status', 'accepted')->count(),
        ];

        $availableYears = PpdbRegistrant::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
        
        return view('admin.ppdb.registrants.index', compact('registrants', 'counts', 'jalur', 'availableYears', 'tahun', 'search'));
    }

    public function export(Request $request)
    {
        $jalur = $request->query('jalur');
        $tahun = $request->query('tahun');
        $filename = 'Data_Pendaftar_PPDB_' . ($jalur ? ucfirst($jalur) . '_' : '') . ($tahun ? $tahun . '_' : '') . date('Ymd_His') . '.xlsx';
        
        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\RegistrantsExport($jalur, $tahun), $filename);
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
