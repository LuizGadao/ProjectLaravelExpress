<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'post_id',
        'name',
        'email',
        'comment'
    ];

    //retorna o post relacionado com esse comentário
    public function post(){
        return $this->belongsTo('App\Post');
    }
}
