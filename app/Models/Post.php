<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Moloquent;

class Post extends Moloquent
{
    protected $connection = 'mongodb';
    
    protected $collection = 'posts';

    protected $fillable = [
        'title', 'body', 'author', 'author_id', 'tag', 'category',
    ];
    
}
