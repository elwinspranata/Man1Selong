<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentStatistic;
use Illuminate\Http\Request;

class StudentStatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statistics = StudentStatistic::orderBy('academic_year', 'desc')->orderBy('grade_level', 'asc')->paginate(15);
        return view('admin.student_statistics.index', compact('statistics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student_statistics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'academic_year' => 'required|string|max:255',
            'grade_level' => 'required|string|max:255',
            'male_count' => 'required|integer|min:0',
            'female_count' => 'required|integer|min:0',
        ]);

        StudentStatistic::create($data);

        return redirect()->route('admin.student_statistics.index')->with('success', 'Statistik siswa berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentStatistic $student_statistic)
    {
        return view('admin.student_statistics.edit', compact('student_statistic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentStatistic $student_statistic)
    {
        $data = $request->validate([
            'academic_year' => 'required|string|max:255',
            'grade_level' => 'required|string|max:255',
            'male_count' => 'required|integer|min:0',
            'female_count' => 'required|integer|min:0',
        ]);

        $student_statistic->update($data);

        return redirect()->route('admin.student_statistics.index')->with('success', 'Statistik siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentStatistic $student_statistic)
    {
        $student_statistic->delete();
        return redirect()->route('admin.student_statistics.index')->with('success', 'Statistik siswa berhasil dihapus.');
    }
}
