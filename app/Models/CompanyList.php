<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyList extends Model
{
    protected $table = 'companies';
    
    protected $fillable = [
        'company_name'
    ];
}
