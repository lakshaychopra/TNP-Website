<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyRegistration extends Model
{
    protected $table = 'registration_details';

    protected $fillable = [
        'univ_roll_no','class_roll_no','name','branch','company_name'
    ];
    

}
