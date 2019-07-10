<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student_entries';

    protected $fillable = [
        'univ_roll_no','name','branch_type'
    ];
    
}
