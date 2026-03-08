<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    /**
     * Show the admin login page.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    /**
     * Handle admin login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    /**
     * Handle admin logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    /**
     * Show the admin dashboard.
     */
    public function dashboard()
    {
        $ppdb_stats = [
            'prestasi' => [
                'accepted' => \App\Models\PpdbRegistrant::where('jalur', 'prestasi')->where('status', 'accepted')->count(),
                'process' => \App\Models\PpdbRegistrant::where('jalur', 'prestasi')->whereIn('status', ['pending', 'verified'])->count(),
                'rejected' => \App\Models\PpdbRegistrant::where('jalur', 'prestasi')->where('status', 'rejected')->count(),
                'total' => \App\Models\PpdbRegistrant::where('jalur', 'prestasi')->count(),
            ],
            'reguler' => [
                'accepted' => \App\Models\PpdbRegistrant::where('jalur', 'reguler')->where('status', 'accepted')->count(),
                'process' => \App\Models\PpdbRegistrant::where('jalur', 'reguler')->whereIn('status', ['pending', 'verified'])->count(),
                'rejected' => \App\Models\PpdbRegistrant::where('jalur', 'reguler')->where('status', 'rejected')->count(),
                'total' => \App\Models\PpdbRegistrant::where('jalur', 'reguler')->count(),
            ]
        ];

        $stats = [
            'posts_count' => \App\Models\Post::count(),
            'teachers_count' => \App\Models\Teacher::count(),
            'agendas_count' => \App\Models\Agenda::count(),
            'registrants_count' => \App\Models\PpdbRegistrant::count(),
        ];

        return view('admin.dashboard', compact('stats', 'ppdb_stats'));
    }
}
