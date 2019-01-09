<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DevTeam extends Model
{
  protected $table = 'dev_team';

  protected $fillable = [
    'name','description','branch','image','year'
  ];
}
