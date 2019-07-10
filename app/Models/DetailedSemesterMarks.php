<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SemesterMarks extends Model
{
    protected $table = 'detailed_semester_marks';
    
    protected $fillable = [
        'univ_roll_no',
        'obtained_marks_1','credits_1','active_backlog_1','passive_backlog_1', 
        'obtained_marks_2','credits_2','active_backlog_2','passive_backlog_2', 
        'obtained_marks_3','credits_3','active_backlog_3','passive_backlog_3', 
        'obtained_marks_4','credits_4','active_backlog_4','passive_backlog_4', 
        'obtained_marks_5','credits_5','active_backlog_5','passive_backlog_5', 
        'obtained_marks_6','credits_6','active_backlog_6','passive_backlog_6', 
        'obtained_marks_7','credits_7','active_backlog_7','passive_backlog_7', 
        'obtained_marks_8','credits_8','active_backlog_8','passive_backlog_8', 
        'percentage_aggregate','sgpa_aggregate','credits_aggregate','active_backlog_aggregate','passive_backlog_aggregate'
    ];
}