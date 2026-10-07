<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class StudentController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Daftar Siswa";


        $students = Student::select(['id', 'nis', 'name', 'gender', 'major', 'class'])->get();

        return view('students.index', [
            'title' => $title,
            'students' => $students
        ]);
    }


    public function store(Request $request)
    {
        // Validasi
        $validatedRequest = $request->validate([
            'nis' => ['required', 'string', 'size:4', 'unique:students,nis'],
            'name' => ['required', 'string'],
            'gender' => ['required', 'string', 'in:Laki-laki,Perempuan'],
            'major' => ['required', 'string', 'in:AKL,TKJ,BiD'],
            'class' => ['required', 'string'],
        ]);

        //tambahkan data ke 
        student::create($validatedRequest);

        $student = new Student();
        $student->nis = $request->input('nis');
        $student->name = $request->input('name');
        $student->gender = $request->input('gender');
        $student->major = $request->input('major');
        $student->class = $request->input('class');
        $student->save();

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil ditambahkan.');

    }


    public function show(string $id)
    {
        $title = 'Sistem Sekolah - Detail Siswa';

        $student = Student::find($id);
        return view('students.show', [

            'title' => $title,
            'student' => $student,

        ]);
    }

    public function create()
    {
        $title = "Sistem Sekolah - Tambah Siswa";
        return view('students.create', [
            'title' => $title
        ]);
    }

    public function edit(Student $student)
{
    $title = 'Sistem Sekolah - Edit Siswa';

    return view('students.edit', [
        'title'   => $title,
        'student' => $student,
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
