<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ppdb_registrants', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->unique()->nullable();
            
            // Account credentials
            $table->string('email')->unique();
            $table->string('password');
            
            // Biodata
            $table->string('full_name');
            $table->string('nisn')->nullable();
            $table->string('nik')->nullable();
            $table->enum('gender', ['L', 'P'])->default('L');
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('religion')->nullable();
            
            // School info
            $table->string('origin_school')->nullable();
            $table->string('origin_school_npsn')->nullable();
            
            // Contact
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable(); // Kecamatan
            $table->string('village')->nullable(); // Desa/Kelurahan
            $table->string('postal_code')->nullable();
            
            // Parent info
            $table->string('father_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_phone')->nullable();
            
            // Registration info
            $table->enum('jalur', ['prestasi', 'reguler'])->default('reguler');
            $table->string('photo')->nullable(); // Pas foto
            $table->string('ijazah_file')->nullable();
            $table->string('kk_file')->nullable(); // Kartu Keluarga
            $table->string('akta_file')->nullable(); // Akta Kelahiran
            $table->string('prestasi_file')->nullable(); // Sertifikat prestasi
            $table->string('raport_file')->nullable();
            
            // Semester grades (for Jalur Prestasi)
            $table->decimal('nilai_mtk_3', 5, 2)->nullable();
            $table->decimal('nilai_mtk_4', 5, 2)->nullable();
            $table->decimal('nilai_mtk_5', 5, 2)->nullable();
            $table->decimal('nilai_ipa_3', 5, 2)->nullable();
            $table->decimal('nilai_ipa_4', 5, 2)->nullable();
            $table->decimal('nilai_ipa_5', 5, 2)->nullable();
            $table->decimal('nilai_ips_3', 5, 2)->nullable();
            $table->decimal('nilai_ips_4', 5, 2)->nullable();
            $table->decimal('nilai_ips_5', 5, 2)->nullable();
            $table->decimal('nilai_eng_3', 5, 2)->nullable();
            $table->decimal('nilai_eng_4', 5, 2)->nullable();
            $table->decimal('nilai_eng_5', 5, 2)->nullable();
            
            // Status
            $table->boolean('is_submitted')->default(false);
            $table->enum('status', ['draft', 'pending', 'verified', 'accepted', 'rejected'])->default('draft');
            $table->text('notes')->nullable(); // Admin notes
            $table->timestamp('submitted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppdb_registrants');
    }
};
