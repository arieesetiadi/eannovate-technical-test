<?php

namespace App\Models;

use App\Models\StudentClassModel;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'class';
    protected $guarded = [];
    protected $casts = ['id' => 'string'];

    public $timestamps = false;

    public function studentClass()
    {
        return $this->belongsToMany(StudentClassModel::class, 'student_class', 'student_id', 'id');
    }
}
