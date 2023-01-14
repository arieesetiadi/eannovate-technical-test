<?php

namespace App\Models;

use App\Models\ClassModel;
use App\Models\StudentModel;
use Illuminate\Database\Eloquent\Model;

class StudentClassModel extends Model
{
    protected $table = 'student_class';
    protected $guarded = [];

    public $timestamps = false;

    public function class()
    {
        return $this->hasOne(ClassModel::class, 'id', 'class_id');
    }

    public function student()
    {
        return $this->hasOne(StudentModel::class, 'id', 'student_id');
    }
}
