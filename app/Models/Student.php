<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'sex', 'class_id'];
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }
    public function mark()
    {
        return $this->hasMany(Mark::class, 'student_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($student) {
            $student->mark()->delete(); 
        });
    }
}
