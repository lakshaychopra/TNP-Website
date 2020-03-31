<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'univ_roll_no','class_roll_no','first_name','last_name','batch','whatsapp_cont','branch_type','stream','blood_group','height','weight','training_sem','shift','section','phone_number','gender','category','father_name','father_phone_number','mother_name','mother_phone_number','father_occupation','farming_background','address','phone_number','city','state','district','pincode','form_status',
        'spec_mba','spec_mtech','work_experience','graduation','specialization','passing_year','marks_type','CGPA','percentage','graduation_certificate'
    ];
    
}
