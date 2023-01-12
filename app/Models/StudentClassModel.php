<?php

namespace App\Models;

use App\Models\ClassModel;
use App\Models\StudentModel;
use Illuminate\Database\Eloquent\Model;

class StudentClassModel extends Model
{
    protected $table = 'student_class';
    public $timestamps = false;

    public function class()
    {
        return $this->hasOne(ClassModel::class, 'class_id', 'id');
    }

    public function student()
    {
        return $this->hasOne(StudentModel::class, 'student_id', 'id');
    }
}
