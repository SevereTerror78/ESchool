<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EChalk extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'class_id', 'schoolClass'];

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    public function marks()
    {
        return $this->hasMany(Mark::class, 'student_id');
    }
}
