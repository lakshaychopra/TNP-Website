<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreviousEducation extends Model
{
    protected $table = 'previous_education';
    
    protected $fillable = [
        'univ_roll_no','board','month','year','obtained_marks','max_marks','percentage','institute','year_gap','jee_rank','education'
    ];
}
