<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        \App\Models\User::factory()->create([
            'name' => 'Administrator MAN 1',
            'email' => 'admin@admin.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);

        // Seed Posts (News)
        $posts = [
            [
                'title' => 'Digitalisasi Pembelajaran: MAN 1 Lombok Timur Luncurkan Smart Classroom',
                'slug' => 'digitalisasi-pembelajaran-smart-classroom',
                'content' => '<p>MAN 1 Lombok Timur kembali melakukan inovasi besar dalam dunia pendidikan dengan meluncurkan program <strong>Smart Classroom</strong>. Program ini bertujuan untuk meningkatkan kualitas belajar mengajar dengan mengintegrasikan teknologi interaktif di setiap ruang kelas.</p><p>Kepala Madrasah menyatakan bahwa langkah ini adalah bagian dari visi madrasah untuk mencetak generasi yang tidak hanya kuat secara iman, tapi juga cakap dalam teknologi digital.</p>',
                'category' => 'Pendidikan',
                'image' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Juara Umum KSM 2026: Siswa MAN 1 Borong Medali Emas',
                'slug' => 'juara-umum-ksm-2026',
                'content' => '<p>Prestasi membanggakan kembali diraih oleh siswa-siswi MAN 1 Lombok Timur dalam ajang Kompetisi Sains Madrasah (KSM) tingkat Provinsi 2026. Dengan persiapan yang matang dan bimbingan guru-guru ahli, tim KSM berhasil membawa pulang 5 medali emas dari berbagai kategori.</p>',
                'category' => 'Prestasi',
                'image' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Latihan Dasar Kepemimpinan (LDK) OSIS Periode 2026/2027',
                'slug' => 'ldk-osis-2026-2027',
                'content' => '<p>OSIS MAN 1 Lombok Timur menyelenggarakan Latihan Dasar Kepemimpinan (LDK) selama tiga hari di kaki Gunung Rinjani. Kegiatan ini merupakan agenda tahunan untuk membangun jiwa kepemimpinan yang berintegritas dan tangguh bagi pengurus baru.</p>',
                'category' => 'Kegiatan',
                'image' => null,
                'is_published' => true,
            ],
        ];

        foreach ($posts as $post) {
            \App\Models\Post::create($post);
        }

        // Seed Achievements
        $achievements = [
            ['title' => 'Juara 1 Robotik Creative', 'rank' => 'Tingkat Nasional', 'year' => '2026', 'description' => 'Diselenggarakan oleh Kemenag RI di Jakarta.', 'icon' => '🤖'],
            ['title' => 'Medali Emas Biologi Terintegrasi', 'rank' => 'Juara 1 KSM', 'year' => '2025', 'description' => 'Kompetisi Sains Madrasah tingkat Provinsi NTB.', 'icon' => '🥇'],
            ['title' => 'Juara 1 Debat Bahasa Inggris', 'rank' => 'Tingkat Umum', 'year' => '2025', 'description' => 'Festival Bahasa Nasional Universitas Mataram.', 'icon' => '🗣️'],
            ['title' => 'Juara Umum Kaligrafi Kontemporer', 'rank' => 'Piala Gubernur', 'year' => '2024', 'description' => 'MTQ Pelajar Se-Nusa Tenggara Barat.', 'icon' => '✍️'],
        ];

        foreach ($achievements as $ach) {
            \App\Models\Achievement::create($ach);
        }

        // Seed Agendas
        $agendas = [
            ['title' => 'Ujian Akhir Semester Genap', 'event_date' => now()->addDays(15), 'time' => '07:30 - 12:00', 'location' => 'Gedung Kelas Baru'],
            ['title' => 'Rapat Pleno Komite & Wali Murid', 'event_date' => now()->addDays(20), 'time' => '09:00 - 11:30', 'location' => 'Aula Serbaguna'],
            ['title' => 'Penerimaan Peserta Didik Baru (PPDB)', 'event_date' => now()->addDays(30), 'time' => '08:00 - Selesai', 'location' => 'Sekretariat PPDB'],
            ['title' => 'Wisuda & Pelepasan Kelas XII', 'event_date' => now()->addMonths(2), 'time' => '08:00 - 13:00', 'location' => 'Gedung Juang Selong'],
        ];

        foreach ($agendas as $agenda) {
            \App\Models\Agenda::create($agenda);
        }

        // Seed Ekskuls
        $ekskuls = [
            ['title' => 'Pramuka', 'icon' => '👨‍🚒', 'slug' => 'pramuka', 'schedule' => 'Jumat, 15:00 WITA', 'location' => 'Lapangan Utama'],
            ['title' => 'PMR (Palang Merah Remaja)', 'icon' => '🚑', 'slug' => 'pmr', 'schedule' => 'Sabtu, 14:00 WITA', 'location' => 'UKM Center'],
            ['title' => 'Robotik & Coding', 'icon' => '💻', 'slug' => 'robotik', 'schedule' => 'Sabtu, 10:00 WITA', 'location' => 'Lab Komputer 1'],
            ['title' => 'Marching Band', 'icon' => '🎺', 'slug' => 'marching-band', 'schedule' => 'Minggu, 08:30 WITA', 'location' => 'Halaman Tengah'],
            ['title' => 'Bulu Tangkis', 'icon' => '🏸', 'slug' => 'bulutangkis', 'schedule' => 'Selasa, 15:30 WITA', 'location' => 'Gedung Olahraga'],
            ['title' => 'Seni Teater', 'icon' => '🎭', 'slug' => 'teater', 'schedule' => 'Rabu, 15:30 WITA', 'location' => 'Aula Madrasah'],
        ];

        foreach ($ekskuls as $item) {
            \App\Models\Ekskul::create([
                'title' => $item['title'],
                'slug' => $item['slug'],
                'icon' => $item['icon'],
                'description' => 'Wadah bagi siswa untuk mengembangkan minat dan bakat di bidang ' . $item['title'] . '.',
                'schedule' => $item['schedule'],
                'location' => $item['location'],
            ]);
        }
        
        // Seed Gallery
        $galleries = [
            ['title' => 'Gedung Utama MAN 1', 'caption' => 'Ikon kebanggaan MAN 1 Lombok Timur.'],
            ['title' => 'Kegiatan Sholat Berjamaah', 'caption' => 'Pembiasaan karakter religius siswa.'],
            ['title' => 'Praktikum Biologi', 'caption' => 'Siswa sedang melakukan observasi mikroskop.'],
            ['title' => 'Upacara Bendera Senin Pagi', 'caption' => 'Menumbuhkan jiwa nasionalisme.'],
        ];

        foreach ($galleries as $gal) {
             \App\Models\Gallery::create($gal);
        }

        // Seed School Settings
        \App\Models\SchoolSetting::create([
            'school_name' => 'MAN 1 Lombok Timur',
            'school_alias' => 'Kemenag Lotim',
            'principal_name' => 'Drs. H. Muhammad Amin, M.Pd.',
            'welcome_message' => '<p>"Pendidikan bukanlah semata-mata tentang ilmu pengetahuan, tetapi juga tentang pembentukan karakter dan kepribadian yang mulia. Di MAN 1 Lombok Timur, kami berkomitmen untuk mendidik generasi yang tidak hanya cerdas secara intelektual, tetapi juga kuat dalam iman dan taqwa."</p>',
            'vision' => '<p>Terwujudnya Madrasah yang <strong>unggul, religius, berprestasi</strong>, dan berbasis teknologi dalam mencetak generasi yang beriman, berilmu, dan berakhlak mulia.</p>',
            'mission' => '<ul><li>Menyelenggarakan pendidikan yang berkualitas berdasarkan nilai-nilai Islam.</li><li>Mengembangkan kurikulum yang relevan dengan perkembangan IPTEK.</li><li>Membina peserta didik agar berprestasi di bidang akademik dan non-akademik.</li><li>Membangun lingkungan madrasah yang kondusif, bersih, dan islami.</li></ul>',
            'phone' => '(0376) 21234',
            'email' => 'info@man1lomboktimur.sch.id',
            'address' => 'Jl. Pejanggik No. 123, Selong, Lombok Timur, NTB 83611',
            'map_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.1!2d116.5!3d-8.6!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOMKwMzYnMDAuMCJTIDExNsKwMzAnMDAuMCJF!5e0!3m2!1sid!2sid!4v1234567890',
            'hero_title' => 'Membangun Generasi Emas yang Berkarakter Islami',
            'hero_subtitle' => 'MAN 1 Lombok Timur hadir sebagai pusat pendidikan yang memadukan keunggulan sains dengan kedalaman spiritual.',
        ]);

        // Seed Student Stats
        $stats = [
            ['label' => 'Siswa Aktif', 'value' => '1200+', 'icon' => 'M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z'],
            ['label' => 'Tenaga Pendidik', 'value' => '85+', 'icon' => 'M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5'],
            ['label' => 'Akreditasi', 'value' => 'A', 'icon' => 'M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M18.75 4.236c.982.143 1.954.317 2.916.52A6.003 6.003 0 0016.27 9.728M18.75 4.236V4.5c0 2.108-.966 3.99-2.48 5.228m0 0a6.003 6.003 0 01-2.77.978m-2.77.978a6.004 6.004 0 01-2.77-.978M12 17.25h.008v.008H12v-.008z'],
            ['label' => 'Prestasi', 'value' => '150+', 'icon' => 'M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z'],
        ];

        foreach($stats as $index => $stat) {
            \App\Models\StudentStat::create([
                'label' => $stat['label'],
                'value' => $stat['value'],
                'icon' => $stat['icon'],
                'sort_order' => $index,
            ]);
        }
    }
}
