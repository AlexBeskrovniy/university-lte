<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_number',
    ];

    public function students(){
        return $this->hasMany(User::class, 'group_id', 'id');
    }

    public function lessons(){
        return $this->hasMany(Lesson::class, 'group_id', 'id');
    }
}
