<?php

namespace App\Models;

use App\Models\StudentClassModel;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $table = 'student';
    protected $guarded = [];

    public $timestamps = false;

    public function studentClass()
    {
        return $this->belongsToMany(StudentClassModel::class, 'student_class', 'student_id', 'id');
    }
}
