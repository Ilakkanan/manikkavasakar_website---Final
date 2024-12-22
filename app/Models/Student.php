<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'index_no',
        'student_fullname',
        'permanent_address',
        'residential_address',
        'date_of_birth',
        'gs_no',
        'gs_division',
        'religion',
        'grade',
        'height',
        'weight',
        'BMI',
        'birth_certificate_no',
        'birth_certificate_image',
        'father_fullname',
        'father_NIC',
        'father_phone_no',
        'father_work',
        'mother_fullname',
        'mother_NIC',
        'mother_phone_no',
        'mother_work',
        'yearly_income_family',
        'passout_year',
        'student_image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
   // Student Model
public function quizAttempts()
{
    return $this->hasMany(QuizAttempt::class, 'student_id');  // Specify the foreign key if necessary
}


public function quizzes()
{
    return $this->belongsToMany(Quiz::class, 'student_quizzes', 'student_id', 'quiz_id')
        ->withTimestamps(); // Assuming a pivot table called 'student_quizzes'
}


}
