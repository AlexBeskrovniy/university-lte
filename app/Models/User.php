<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Traits\Filterable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'group_id',
        'subject_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function group(){
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function lessons(){
        return $this->hasMany(Lesson::class, 'educator_id', 'id');
    }
}
