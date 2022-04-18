<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Filterable;

class Lesson extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'room_id',
        'subject_id',
        'group_id',
        'educator_id',
        'date',
        'day_of_week',
        'time',
    ];

    public function room(){
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function group(){
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function educator(){
        return $this->belongsTo(User::class, 'educator_id', 'id');
    }
}
