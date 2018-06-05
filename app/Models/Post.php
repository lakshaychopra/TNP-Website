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

    public static function createPostRule()
    {
        // validate the info, create rules for the inputs
        return [
            'title' => 'required|min:5|max:30',
            'body' => 'required|min:5',
            'author' => 'required',
            'author_id' => 'required',
            'tag' => 'required',
            'category' => 'required',
        ];
    }

    public static function postRulesMessages()
    {
        return [
            // 'email.required' => trans( 'flash.validation.required',  ['attribute' => 'email'] ),
        ];
    }

    public function insertPost($data)
    {
        $this->title = $data['title'];
        $this->body = $data['body'];
        $this->save();
        return 1;

    }
}
