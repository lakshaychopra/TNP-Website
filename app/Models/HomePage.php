<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $table = 'home_page';
    
    protected $fillable = [
        'office_widget','office_name','office_position','office_email','office_picture','office_phone'
    ];
}
