<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\Store;

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
        ]);
    }


  public function store(Request $request)
{
    // Validasi
    $validatedRequest = $request->validate([
        'nis'    => ['required', 'string', 'size:4', 'unique:students,nis'],
        'name'   => ['required', 'string'],
        'gender' => ['required', 'string', 'in:Laki-laki,Perempuan'],
        'major'  => ['required', 'string', 'in:AKL,TKJ,BiD'],
        'class'  => ['required', 'string'],
    ]);

//tambahkan data ke 
    $student = new Student();   
    $student->nis = $request->input('nis');
    $student->name = $request->input('name');
    $student->gender = $request->input('gender');
    $student->major = $request->input('major');
    $student->class = $request->input('class');
    $student->save();

    return redirect()->route('students.index')->with('success', 'Data siswa berhasil ditambahkan.');

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

    public function update(string $id)
    {
        return "Mengubah data siswa dengan ID: {$id}";
    }

    public function destroy(string $id)
    {
        return "Menghapus data siswa dengan ID: {$id}";
    }
}
