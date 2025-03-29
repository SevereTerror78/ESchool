<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
    public function mark()
    {
        return $this->hasMany(Mark::class, 'subject_id');
    }
}
