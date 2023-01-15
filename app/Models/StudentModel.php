<?php

namespace App\Models;

use App\Models\StudentClassModel;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $table = 'student';
    protected $guarded = [];
    protected $casts = ['id' => 'string'];

    public $timestamps = false;

    public function studentClass()
    {
        return $this->hasMany(StudentClassModel::class, 'student_id', 'id');
    }

    public function classes()
    {
        return $this->hasManyThrough(ClassModel::class, StudentClassModel::class, 'student_id', 'id', 'id', 'id');
    }
}
