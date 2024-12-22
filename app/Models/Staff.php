<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name_title',
        'full_name',
        'permanent_address',
        'nic_no',
        'phone_number',
        'work_type',
        'position',
        'profile',
        'grade',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quizzes()
{
    return $this->hasMany(Quiz::class);
}
}
