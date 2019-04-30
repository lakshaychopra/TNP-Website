<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisplayStudent extends Model
{
    protected $table = 'display_student';

    protected $fillable = [
        'univ_roll_no','class_roll_no','name','dob','batch','branch_type','stream','training_semester',
        'shift','section','email','phone_number','gender','category','blood_group','height',
        'weight','father_name','father_phone_number','mother_name','mother_phone_number','address',
        'city','state','district','pincode',

        'tenth_board','tenth_institute','tenth_month','tenth_year','tenth_obtained_marks',
        'tenth_max_marks','tenth_marks_type','tenth_percentage',

        'prev_edu_board','prev_edu_month','prev_edu_year','prev_edu_obtained_marks',
        'prev_edu_max_marks','prev_edu_percentage','prev_edu_institute','prev_edu_year_gap',
        'prev_edu_jee_rank','prev_edu_education',

        'semester','sem_obtained_marks','sem_max_marks','sem_credits','sem_active_backlog',
        'sem_passive_backlog', 'sem_marks_type','sem_percentage'
    ];
}