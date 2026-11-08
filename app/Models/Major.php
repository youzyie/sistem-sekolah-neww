<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable; 

#[Table('Majors')]
#[Fillable('name')]

class Major extends Model
{
    public function students()
    {
        return $this->hasMany(Student::class, 'major_id', 'id');
    }
}
