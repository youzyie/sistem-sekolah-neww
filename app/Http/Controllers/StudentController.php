<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Daftar Siswa";
        $students = [
            [
                'id' => 1,
                'nis' => '1001',
                'name' => 'Nichole',
                'class' => 'XII TKJ 1',
                'Major' => 'TKJ'
            ],

            [
                'id' => 2,
                'nis' => '1002',
                'name' => 'Fredy',
                'class' => 'XII AKL',
                'Major' => 'AKL'
            ]
        ];
        return view('students.index', [
            'title' => $title,
            'students' => $students
        ]);
    }

    public function show()
    {
        $title = "Sistem Sekolah - Detail Siswa";
        return view('students.show', [
            'title' => $title
        ]);
    }

    public function create()
    {
        $title = "Sistem Sekolah - Tambah Siswa";
        return view('students.create', [
            'title' => $title
        ]);
    }
    
    public function edit(string $id)
    {
        $title = "Sistem Sekolah - Edit Siswa";
        return view('students.edit', [
            'title' => $title
        ]);
    }

    public function store()
    {
        return "Menambah data siswa baru";
    }

    public function update(string $id)
    {
        return "Mengubah data siswa dengan ID: {$id}";
    }

    public function destroy(string $id)
    {
        return "Menghapus data siswa dengan ID: {$id}";
    }
}
