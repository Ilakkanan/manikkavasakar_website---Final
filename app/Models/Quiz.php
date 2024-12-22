<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'staff_id',
        'title',
        'description',
        'grade',
        'time',
        'max_attempts',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class, 'quiz_id');
    }
    public function quizAttempts()
{
    return $this->hasMany(QuizAttempt::class);
}

public function students()
{
    return $this->belongsToMany(Student::class, 'student_quizzes', 'quiz_id', 'student_id')
        ->withTimestamps(); // Assuming a pivot table called 'student_quizzes'
}

}
