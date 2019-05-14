<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'univ_roll_no','class_roll_no','name','batch','whatsapp_cont','branch_type','stream','training_sem','shift','section','email','phone_number','gender','category','blood_group','height','weight','father_name','father_phone_number','mother_name','mother_phone_number','address','city','state','district','pincode','mail_id','form_status'
    ];
    
}
