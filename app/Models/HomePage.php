<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $table = 'home_page';
    
    protected $fillable = [
        'office_name','office_position','office_email','office_picture','office_phone','about_address','about_location','about_phone','about_website','about_email'
    ];
}
