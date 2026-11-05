<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $userTeacherEmail = 'richard@ski.sch.id';
        $userStudentEmail = 'andi@ski.sch.id';

        // user teacher
        User :: updateOrCreate(
            ['email' => $userTeacherEmail],
            [
                'name' => 'Richard Marcel',
                'password' => bcrypt('password'),
                'role' => 'teacher',
            ]
        );

        // user student
        User :: updateOrCreate(
            ['email' => $userStudentEmail],
            [
                'name' => 'Richard Marcel',
                'password' => bcrypt('password'),
                'role' => 'student',
            ]
        );
    }
}
