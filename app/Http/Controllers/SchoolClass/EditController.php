<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke(string $id)
    {
        $title = "Sistem Sekolah - Edit Kelas";

        $classes = [
            [
                'id' => 1,
                'name' => 'XII AKL 1',
                'grade' => 'XII',
                'major' => 'AKL',
                'homeroom_teacher' => 'Budi Santoso'
            ],
            [
                'id' => 2,
                'name' => 'XII TKJ 1',
                'grade' => 'XII',
                'major' => 'TKJ',
                'homeroom_teacher' => 'Siti Aminah'
            ]
        ];

        $majors = [
            [
                'id' => 1,
                'code' => 'AKL',
                'name' => 'Akuntansi dan Keuangan Lembaga'
            ],
            [
                'id' => 2,
                'code' => 'TKJ',
                'name' => 'Teknik Komputer dan Jaringan'
            ],
            [
                'id' => 3,
                'code' => 'BD',
                'name' => 'Bisnis Digital'
            ]
        ];

        $teachers = [
            [
                'id' => 1,
                'name' => 'Budi Santoso'
            ],
            [
                'id' => 2,
                'name' => 'Siti Aminah'
            ]
        ];

        $class = null;

        foreach ($classes as $data) {
            if ($data['id'] == $id) {
                $class = $data;
                break;
            }
        }

        if ($class == null) {
            abort(404);
        }

        return view('school_class.edit', [
            'title' => $title,
            'class' => $class,
            'majors' => $majors,
            'teachers' => $teachers
        ]);
    }
}