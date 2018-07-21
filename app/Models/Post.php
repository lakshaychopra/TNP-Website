<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title','body','user_id','username', 'tag', 'category','post_link','image','url'
    ];
    
    public function isPinned(){
        return $this->is_pinned;
    }

}
