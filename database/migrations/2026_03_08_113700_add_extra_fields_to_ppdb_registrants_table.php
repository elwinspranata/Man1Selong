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
        Schema::table('ppdb_registrants', function (Blueprint $table) {
            // Parent NIKs
            $table->string('father_nik')->nullable()->after('father_occupation');
            $table->string('mother_nik')->nullable()->after('mother_occupation');
            $table->string('guardian_nik')->nullable()->after('guardian_name');

            // Demographics
            $table->string('pendidikan_ayah')->nullable()->after('father_phone');
            $table->string('penghasilan_ayah')->nullable()->after('pendidikan_ayah');
            $table->string('pendidikan_ibu')->nullable()->after('mother_phone');
            $table->string('penghasilan_ibu')->nullable()->after('pendidikan_ibu');
            $table->string('nomor_kip')->nullable()->after('religion');

            // PAI Grades
            $table->decimal('nilai_pai_3', 5, 2)->nullable()->after('nilai_eng_5');
            $table->decimal('nilai_pai_4', 5, 2)->nullable()->after('nilai_pai_3');
            $table->decimal('nilai_pai_5', 5, 2)->nullable()->after('nilai_pai_4');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ppdb_registrants', function (Blueprint $table) {
            $table->dropColumn([
                'father_nik',
                'mother_nik',
                'guardian_nik',
                'pendidikan_ayah',
                'penghasilan_ayah',
                'pendidikan_ibu',
                'penghasilan_ibu',
                'nomor_kip',
                'nilai_pai_3',
                'nilai_pai_4',
                'nilai_pai_5'
            ]);
        });
    }
};
