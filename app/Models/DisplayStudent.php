<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisplayStudent extends Model
{
    protected $table = 'display_student';

    protected $fillable = [
        'univ_roll_no','class_roll_no','first_name','last_name','batch',
        'whatsapp_cont','branch_type','stream','blood_group','height','weight
        training_sem','shift','section','phone_number','gender','category',
        'father_name','father_phone_number','mother_name','mother_phone_number','father_occupation',
        'farming_background','address','phone_number','city','state','district','pincode','form_status',
        'spec_mba','spec_mtech','work_experience','graduation',
        'specialization','passing_year','marks_type','CGPA','percentage',

        'tenth_board','tenth_institute','tenth_year','tenth_obtained_marks',
        'tenth_max_marks','tenth_marks_type','tenth_percentage',

        'education','year_gap','jee_rank','XII_board','XII_institute',
        'XII_year','XII_obtained_marks','XII_max_marks','XII_percentage',
        'diploma_board','diploma_institute','diploma_year','diploma_obtained_marks',
        'diploma_max_marks','diploma_percentage',

        // 'sem_obt_marks_1','credits_1','active_backlog_1','passive_backlog_1',
        // 'sem_obt_marks_2','credits_2','active_backlog_2','passive_backlog_2',
        // 'sem_obt_marks_3','credits_3','active_backlog_3','passive_backlog_3',
        // 'sem_obt_marks_4','credits_4','active_backlog_4','passive_backlog_4',
        // 'sem_obt_marks_5','credits_5','active_backlog_5','passive_backlog_5',
        // 'sem_obt_marks_6','credits_6','active_backlog_6','passive_backlog_6',
        // 'sem_obt_marks_7','credits_7','active_backlog_7','passive_backlog_7',
        // 'sem_obt_marks_8','credits_8','active_backlog_8','passive_backlog_8',

        // 'sgpa_aggregate','percentage_aggregate','credits_aggregate',
        // 'active_backlog_aggregate','passive_backlog_aggregate',
        // 'verify_status'
    ];
}