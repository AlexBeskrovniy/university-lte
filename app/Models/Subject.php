<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function educator(){
        return $this->hasOne(User::class, 'subject_id', 'id');
    }

    public function lessons(){
        return $this->hasMany(Lesson::class, 'subject_id', 'id');
    }
}
