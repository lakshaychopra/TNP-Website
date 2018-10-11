<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutWidget extends Model
{
    protected $table = 'about_widget';
    
    protected $fillable = [
        'about_address','about_location','about_phone','about_website','about_email','about_fax'
    ];
}
