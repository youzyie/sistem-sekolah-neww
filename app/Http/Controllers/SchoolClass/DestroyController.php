<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(string $id)
    {
        return "Menghapus data kelas dengan ID: {$id}";
    }
}