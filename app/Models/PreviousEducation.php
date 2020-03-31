<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreviousEducation extends Model
{
    protected $table = 'previous_education';
    
    protected $fillable = [
        'univ_roll_no','education','year_gap','jee_rank',
        'XII_board','XII_institute','XII_year','XII_obtained_marks','XII_max_marks','XII_percentage',
        'diploma_previous_edu_certificate','XII_previous_edu_certificate',
        'diploma_board','diploma_institute','diploma_year','diploma_obtained_marks','diploma_max_marks','diploma_percentage'
    ];
}
