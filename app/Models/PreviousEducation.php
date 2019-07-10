<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreviousEducation extends Model
{
    protected $table = 'previous_education';
    
    protected $fillable = [
        'univ_roll_no','board_XII','month_XII','year_XII','obtained_marks_XII',
        'max_marks_XII','percentage_XII','institute_XII',
        'month_Diploma','year_Diploma','obtained_marks_Diploma',
        'max_marks_Diploma','percentage_Diploma','institute_Diploma',
        'year_gap','jee_rank_XII'
    ];
}
