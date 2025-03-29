<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    public $timestamps = false;
    protected $fillable = ['subject_id', 'student_id', 'name'];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
