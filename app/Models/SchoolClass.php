<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'year'];

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($schoolClass) {
            foreach ($schoolClass->students as $student) {
                $student->mark()->delete(); 
                $student->delete();
            }
        });
    }
}
