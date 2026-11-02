<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nis'    => ['required', 'string', 'size:4', 'unique:students,nis'],
            'name'   => ['required', 'string'],
            'gender' => ['required', 'string', 'in:Laki-laki,Perempuan'],
            'major'  => ['required', 'string', 'in:AKL,TKJ,RPL'],
            'class'  => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'nis.required' => 'Nomor Induk Siswa wajib diisi',
            'nis.size'     => 'Nomor Induk Siswa harus terdiri dari 4 karakter',
            'nis.unique'   => 'Nomor Induk Siswa sudah terdaftar',
        ];
    }
}