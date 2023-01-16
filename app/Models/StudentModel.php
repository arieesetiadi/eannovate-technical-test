<?php

namespace App\Models;

use App\Models\StudentClassModel;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{

    // Properties
    protected $table = 'student';
    protected $casts = ['id' => 'string'];
    protected $guarded = [];

    public $timestamps = false;

    // Relationships
    public function studentClass()
    {
        return $this->hasMany(StudentClassModel::class, 'student_id', 'id');
    }
}
