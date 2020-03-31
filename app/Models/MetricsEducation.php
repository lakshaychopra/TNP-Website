<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetricsEducation extends Model
{
    protected $table = 'metrics_education';
    
    protected $fillable = [
        'univ_roll_no','board','institute','year','obtained_marks','max_marks','marks_type','percentage','tenth_certificate'
    ];
}
