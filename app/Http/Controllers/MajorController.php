<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    private function getMajors()
    {
        return [
            [
                'id' => 1,
                'code' => 'AKL',
                'name' => 'Akuntansi dan Keuangan Lembaga',
                'description' => 'Mempelajari akuntansi, keuangan, dan pengelolaan administrasi keuangan.'
            ],
            [
                'id' => 2,
                'code' => 'TKJ',
                'name' => 'Teknik Komputer dan Jaringan',
                'description' => 'Mempelajari komputer, jaringan, sistem operasi, dan teknologi informasi.'
            ],
            [
                'id' => 3,
                'code' => 'BD',
                'name' => 'Bisnis Digital',
                'description' => 'Mempelajari bisnis, pemasaran digital, dan pengelolaan bisnis berbasis teknologi.'
            ]
        ];
    }

    public function index()
    {
        $title = "Sistem Sekolah - Daftar Jurusan";

        $majors = $this->getMajors();

        return view('majors.index', [
            'title' => $title,
            'majors' => $majors
        ]);
    }

    public function create()
    {
        $title = "Sistem Sekolah - Tambah Jurusan";

        return view('majors.create', [
            'title' => $title
        ]);
    }

    public function store(Request $request)
    {
        return "Menambah data jurusan baru";
    }

    public function show(string $major)
    {
        $title = "Sistem Sekolah - Detail Jurusan";

        $majors = $this->getMajors();

        $majorData = null;

        foreach ($majors as $data) {
            if ($data['id'] == $major) {
                $majorData = $data;
                break;
            }
        }

        if ($majorData == null) {
            abort(404);
        }

        return view('majors.show', [
            'title' => $title,
            'major' => $majorData
        ]);
    }

    public function edit(string $major)
    {
        $title = "Sistem Sekolah - Edit Jurusan";

        $majors = $this->getMajors();

        $majorData = null;

        foreach ($majors as $data) {
            if ($data['id'] == $major) {
                $majorData = $data;
                break;
            }
        }

        if ($majorData == null) {
            abort(404);
        }

        return view('majors.edit', [
            'title' => $title,
            'major' => $majorData
        ]);
    }

    public function update(Request $request, string $major)
    {
        return "Mengubah data jurusan dengan ID: {$major}";
    }

    public function destroy(string $major)
    {
        return "Menghapus data jurusan dengan ID: {$major}";
    }
}