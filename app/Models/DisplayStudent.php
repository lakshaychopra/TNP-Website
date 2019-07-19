<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisplayStudent extends Model
{
    protected $table = 'display_student';

    protected $fillable = [
        'univ_roll_no','class_roll_no','name','dob','batch','branch_type','stream','training_semester',
        'shift','section','email','phone_number','gender','category','blood_group','height',
        'weight','father_name','father_phone','mother_name','mother_phone','address',
        'city','state','district','pincode','whatsapp_cont','mail_id','phone_number',

        'tenth_board','tenth_institute','tenth_month','tenth_year','tenth_obtained_marks',
        'tenth_max_marks','tenth_marks_type','tenth_percentage',

        'board_XII','month_XII','year_XII','obtained_marks_XII',
        'max_marks_XII','percentage_XII','institute_XII','board_Diploma',
        'month_Diploma','year_Diploma','obtained_marks_Diploma','max_marks_Diploma',
        'percentage_Diploma','institute_Diploma','year_gap','jee_rank_XII',

        'sem_obt_marks_1','credits_1','active_backlog_1','passive_backlog_1',
        'sem_obt_marks_2','credits_2','active_backlog_2','passive_backlog_2',
        'sem_obt_marks_3','credits_3','active_backlog_3','passive_backlog_3',
        'sem_obt_marks_4','credits_4','active_backlog_4','passive_backlog_4',
        'sem_obt_marks_5','credits_5','active_backlog_5','passive_backlog_5',
        'sem_obt_marks_6','credits_6','active_backlog_6','passive_backlog_6',
        'sem_obt_marks_7','credits_7','active_backlog_7','passive_backlog_7',
        'sem_obt_marks_8','credits_8','active_backlog_8','passive_backlog_8',

        'sgpa_aggregate','percentage_aggregate','credits_aggregate',
        'active_backlog_aggregate','passive_backlog_aggregate',
        'verify_status'
    ];
}