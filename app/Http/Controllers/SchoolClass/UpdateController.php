<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request, string $id)
    {
        return "Mengubah data kelas dengan ID: {$id}";
    }
}