<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SemesterMarks extends Model
{
    protected $table = 'semester_marks';
    
    protected $fillable = [
        'univ_roll_no','semester','obtained_marks','max_marks','credits','active_backlog','passive_backlog','stream','marks_type','percentage','semester_status'
    ];
}