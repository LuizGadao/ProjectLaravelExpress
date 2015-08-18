<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //MassAssignmentException
    protected $fillable = ['title', 'content'];

    //retorna todos os comentários relacionados ao post
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag', 'posts_tags');
    }
}
