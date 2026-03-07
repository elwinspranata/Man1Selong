<?php

namespace App\Http\Controllers;

use App\Models\PpdbRegistrant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PpdbController extends Controller
{
    /**
     * PPDB Home / Landing
     */
    public function index()
    {
        $school_setting = \App\Models\SchoolSetting::first();
        return view('ppdb.index', compact('school_setting'));
    }

    /**
     * Informasi PPDB
     */
    public function informasi()
    {
        $school_setting = \App\Models\SchoolSetting::first();
        return view('ppdb.informasi', compact('school_setting'));
    }

    /**
     * Pengumuman PPDB
     */
    public function pengumuman()
    {
        $school_setting = \App\Models\SchoolSetting::first();
        return view('ppdb.pengumuman', compact('school_setting'));
    }

    /**
     * Show login form (Formulir page default = login)
     */
    public function showLogin()
    {
        if (Auth::guard('ppdb')->check()) {
            return redirect()->route('ppdb.formulir');
        }
        $school_setting = \App\Models\SchoolSetting::first();
        return view('ppdb.login', compact('school_setting'));
    }

    /**
     * Handle login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('ppdb')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('ppdb.formulir');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * Show register form
     */
    public function showRegister()
    {
        if (Auth::guard('ppdb')->check()) {
            return redirect()->route('ppdb.formulir');
        }
        $school_setting = \App\Models\SchoolSetting::first();
        return view('ppdb.register', compact('school_setting'));
    }

    /**
     * Handle registration
     */
    public function register(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:ppdb_registrants,email',
            'password' => 'required|string|min:6|confirmed',
            'gender' => 'required|in:L,P',
        ]);

        $registrant = PpdbRegistrant::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'registration_number' => PpdbRegistrant::generateRegistrationNumber(),
            'status' => 'draft',
        ]);

        Auth::guard('ppdb')->login($registrant);

        return redirect()->route('ppdb.formulir')->with('success', 'Akun berhasil dibuat! Silakan lengkapi formulir pendaftaran.');
    }

    /**
     * Show formulir (must be logged in)
     */
    public function formulir()
    {
        $registrant = Auth::guard('ppdb')->user();
        $school_setting = \App\Models\SchoolSetting::first();
        return view('ppdb.formulir', compact('registrant', 'school_setting'));
    }

    /**
     * Save formulir data
     */
    public function saveFormulir(Request $request)
    {
        $registrant = Auth::guard('ppdb')->user();

        $request->validate([
            'full_name' => 'required|string|max:255',
            'nisn' => 'nullable|string|max:20',
            'nik' => 'nullable|string|max:20',
            'gender' => 'required|in:L,P',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'religion' => 'nullable|string|max:50',
            'origin_school' => 'required|string|max:255',
            'origin_school_npsn' => 'nullable|string|max:20',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'province' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'district' => 'nullable|string|max:100',
            'village' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:10',
            'father_name' => 'nullable|string|max:255',
            'father_occupation' => 'nullable|string|max:255',
            'father_phone' => 'nullable|string|max:20',
            'mother_name' => 'nullable|string|max:255',
            'mother_occupation' => 'nullable|string|max:255',
            'mother_phone' => 'nullable|string|max:20',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_phone' => 'nullable|string|max:20',
            'jalur' => 'required|in:prestasi,reguler',
            'photo' => 'nullable|image|max:2048',
            'ijazah_file' => 'nullable|file|max:5120',
            'kk_file' => 'nullable|file|max:5120',
            'akta_file' => 'nullable|file|max:5120',
            'prestasi_file' => 'nullable|file|max:5120',
            'raport_file' => 'nullable|file|max:5120',
        ]);

        $data = $request->except(['photo', 'ijazah_file', 'kk_file', 'akta_file', 'prestasi_file', 'raport_file', '_token']);

        // Handle file uploads
        $fileFields = ['photo', 'ijazah_file', 'kk_file', 'akta_file', 'prestasi_file', 'raport_file'];
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                if ($registrant->$field) {
                    Storage::disk('public')->delete($registrant->$field);
                }
                $data[$field] = $request->file($field)->store('ppdb/' . $registrant->id, 'public');
            }
        }

        $registrant->update($data);

        return back()->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Submit final registration
     */
    public function submit()
    {
        $registrant = Auth::guard('ppdb')->user();
        
        // Basic validation before submission
        if (!$registrant->full_name || !$registrant->birth_place || !$registrant->birth_date || 
            !$registrant->origin_school || !$registrant->phone || !$registrant->address) {
            return back()->with('error', 'Harap lengkapi semua data wajib sebelum mengirim formulir.');
        }

        $registrant->update([
            'is_submitted' => true,
            'status' => 'pending',
            'submitted_at' => now(),
        ]);

        return redirect()->route('ppdb.formulir')->with('success', 'Formulir berhasil dikirim! Data Anda akan diverifikasi oleh panitia.');
    }

    /**
     * Print bukti pendaftaran
     */
    public function printBukti()
    {
        $registrant = Auth::guard('ppdb')->user();
        if (!$registrant->is_submitted) {
            return redirect()->route('ppdb.formulir')->with('error', 'Anda belum mengirim formulir pendaftaran.');
        }
        $school_setting = \App\Models\SchoolSetting::first();
        return view('ppdb.print-bukti', compact('registrant', 'school_setting'));
    }

    /**
     * Print kartu peserta
     */
    public function printKartu()
    {
        $registrant = Auth::guard('ppdb')->user();
        if (!$registrant->is_submitted) {
            return redirect()->route('ppdb.formulir')->with('error', 'Anda belum mengirim formulir pendaftaran.');
        }
        $school_setting = \App\Models\SchoolSetting::first();
        return view('ppdb.print-kartu', compact('registrant', 'school_setting'));
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::guard('ppdb')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('ppdb.home');
    }
}
