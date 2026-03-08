<?php

// Custom Admin Routes
Route::prefix('custom-admin')->group(function () {
    Route::get('/login', [App\Http\Controllers\AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
        
        // Profile & School Identity
        Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('admin.profile.index');
        Route::post('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('admin.profile.update');
        
        // Teachers & Staff
        Route::resource('teachers', App\Http\Controllers\Admin\TeacherController::class)->names('admin.teachers');

        // News & Articles (Posts)
        Route::resource('posts', App\Http\Controllers\Admin\PostController::class)->names('admin.posts');

        // School Agenda
        Route::resource('agendas', App\Http\Controllers\Admin\AgendaController::class)->names('admin.agendas');

        // PPDB Management
        Route::get('/ppdb/settings', [App\Http\Controllers\Admin\PpdbController::class, 'settings'])->name('admin.ppdb.settings');
        Route::post('/ppdb/settings', [App\Http\Controllers\Admin\PpdbController::class, 'updateSettings'])->name('admin.ppdb.settings.update');
        Route::get('/ppdb/registrants', [App\Http\Controllers\Admin\PpdbController::class, 'registrants'])->name('admin.ppdb.registrants.index');
        Route::get('/ppdb/registrants/export', [App\Http\Controllers\Admin\PpdbController::class, 'export'])->name('admin.ppdb.registrants.export');
        Route::get('/ppdb/registrants/{registrant}', [App\Http\Controllers\Admin\PpdbController::class, 'showRegistrant'])->name('admin.ppdb.registrants.show');
        Route::put('/ppdb/registrants/{registrant}/verify', [App\Http\Controllers\Admin\PpdbController::class, 'verifyRegistrant'])->name('admin.ppdb.registrants.verify');
        Route::delete('/ppdb/registrants/{registrant}', [App\Http\Controllers\Admin\PpdbController::class, 'destroyRegistrant'])->name('admin.ppdb.registrants.destroy');

        // Achievements
        Route::resource('achievements', App\Http\Controllers\Admin\AchievementController::class)->names('admin.achievements');

        // School Programs
        Route::resource('programs', App\Http\Controllers\Admin\ProgramController::class)->names('admin.programs');

        // Extracurriculars
        Route::resource('extracurriculars', App\Http\Controllers\Admin\ExtracurricularController::class)->names('admin.extracurriculars');

        // Gallery
        Route::resource('galleries', App\Http\Controllers\Admin\GalleryController::class)->names('admin.galleries');

        // Student Statistics
        Route::resource('student-statistics', App\Http\Controllers\Admin\StudentStatisticController::class)->names('admin.student_statistics');
        
        // Contact Info
        Route::get('contact', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('admin.contact.index');
        Route::put('contact', [App\Http\Controllers\Admin\ContactController::class, 'update'])->name('admin.contact.update');
        
        // Hero Settings
        Route::get('hero', [App\Http\Controllers\Admin\HeroController::class, 'index'])->name('admin.hero.index');
        Route::put('hero', [App\Http\Controllers\Admin\HeroController::class, 'update'])->name('admin.hero.update');
        
        // Future resources will go here

    });
});

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Achievement;
use App\Models\Agenda;
use App\Models\Gallery;
use App\Models\Ekskul;

Route::get('/', function () { 
    $posts = Post::where('is_published', true)->latest()->take(3)->get();
    $achievements = Achievement::latest()->take(4)->get();
    $agendas = Agenda::where('event_date', '>=', now())->orderBy('event_date', 'asc')->take(5)->get();
    $galleries = Gallery::latest()->take(8)->get();
    $stats = \App\Models\StudentStat::orderBy('sort_order')->get();
    $programs = \App\Models\Program::where('is_active', true)->take(6)->get();
    
    return view('welcome', compact('posts', 'achievements', 'agendas', 'galleries', 'stats', 'programs')); 
})->name('home');

Route::get('/profil', function () { return view('pages.profil'); })->name('profil');
Route::get('/profil/direktori-guru', function () { 
    $teachers = \App\Models\Teacher::where('is_active', true)->orderBy('sort_order')->get();
    return view('pages.teachers', compact('teachers')); 
})->name('profil.direktori');
Route::get('/profil/visi-misi', function () { return view('pages.profil.visi-misi'); })->name('profil.visi-misi');
Route::get('/profil/sambutan-kepala', function () { return view('pages.profil.sambutan'); })->name('profil.sambutan');
Route::get('/profil/statistik', function () { 
    $stats = \App\Models\StudentStat::orderBy('sort_order')->get();
    return view('pages.profil.statistik', compact('stats')); 
})->name('profil.statistik');

Route::get('/berita', function () { 
    $posts = Post::where('is_published', true)->latest()->paginate(9);
    return view('pages.berita', compact('posts')); 
})->name('berita');

Route::get('/berita/{slug}', function ($slug) {
    $post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
    return view('pages.berita-detail', compact('post'));
})->name('berita.detail');

Route::get('/kegiatan', function () { 
    $ekskuls = Ekskul::all();
    $programs = \App\Models\Program::where('is_active', true)->get();
    return view('pages.kegiatan', compact('ekskuls', 'programs')); 
})->name('kegiatan');

Route::get('/program/{slug}', function ($slug) {
    $program = \App\Models\Program::where('slug', $slug)->where('is_active', true)->firstOrFail();
    return view('pages.program-detail', compact('program'));
})->name('program.detail');

Route::get('/kegiatan/tahfidz', function () { return view('pages.programs.tahfidz'); })->name('kegiatan.tahfidz');
Route::get('/kegiatan/sains-robotik', function () { return view('pages.programs.sains'); })->name('kegiatan.sains');
Route::get('/kegiatan/bilingual', function () { return view('pages.programs.bilingual'); })->name('kegiatan.bilingual');

Route::get('/kegiatan/ekskul/{slug}', function ($slug) {
    $ekskul = Ekskul::where('slug', $slug)->firstOrFail();
    return view('pages.ekskul-detail', compact('ekskul'));
})->name('kegiatan.ekskul');

Route::get('/prestasi', function () { 
    $achievements = Achievement::latest()->get();
    return view('pages.prestasi', compact('achievements')); 
})->name('prestasi');

Route::get('/agenda', function () { 
    $agendas = Agenda::orderBy('event_date', 'desc')->get();
    return view('pages.agenda', compact('agendas')); 
})->name('agenda');

Route::get('/galeri', function () { 
    $galleries = Gallery::latest()->paginate(12);
    return view('pages.galeri', compact('galleries')); 
})->name('galeri');

Route::get('/kontak', function () { return view('pages.kontak'); })->name('kontak');

// ══════════════════════════════════════════════════
//  PPDB Online Routes
// ══════════════════════════════════════════════════
Route::prefix('ppdb')->group(function () {
    // Public pages
    Route::get('/', [\App\Http\Controllers\PpdbController::class, 'index'])->name('ppdb.home');
    Route::get('/informasi', [\App\Http\Controllers\PpdbController::class, 'informasi'])->name('ppdb.informasi');
    Route::get('/pengumuman', [\App\Http\Controllers\PpdbController::class, 'pengumuman'])->name('ppdb.pengumuman');
    
    // Auth (login / register)
    Route::get('/daftar', [\App\Http\Controllers\PpdbController::class, 'showLogin'])->name('ppdb.daftar');
    Route::post('/daftar', [\App\Http\Controllers\PpdbController::class, 'login'])->name('ppdb.login.submit');
    Route::get('/register', [\App\Http\Controllers\PpdbController::class, 'showRegister'])->name('ppdb.register');
    Route::post('/register', [\App\Http\Controllers\PpdbController::class, 'register'])->name('ppdb.register.submit');
    Route::post('/logout', [\App\Http\Controllers\PpdbController::class, 'logout'])->name('ppdb.logout');
    
    // Authenticated pages
    Route::middleware('auth:ppdb')->group(function () {
        Route::get('/formulir', [\App\Http\Controllers\PpdbController::class, 'formulir'])->name('ppdb.formulir');
        Route::post('/formulir', [\App\Http\Controllers\PpdbController::class, 'saveFormulir'])->name('ppdb.formulir.save');
        Route::post('/formulir/submit', [\App\Http\Controllers\PpdbController::class, 'submit'])->name('ppdb.formulir.submit');
        Route::get('/print/bukti', [\App\Http\Controllers\PpdbController::class, 'printBukti'])->name('ppdb.print.bukti');
        Route::get('/print/kartu', [\App\Http\Controllers\PpdbController::class, 'printKartu'])->name('ppdb.print.kartu');
    });
});

// Old PPDB redirect for compatibility
Route::get('/ppdb-info', function () { return redirect()->route('ppdb.home'); })->name('ppdb');
