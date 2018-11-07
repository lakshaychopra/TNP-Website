<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aggregate extends Model
{
    protected $table = 'aggregate';
    
    protected $fillable = [
        'univ_roll_no','semester','obtained_marks','max_marks','credits','active_backlog','passive_backlog','marks_type','percentage','semester_status'
    ];
}
