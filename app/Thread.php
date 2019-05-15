<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = [
        'title', 
        'content',
        'slug',
        'topic_id',
        'user_id',
        'username',
        'views',
        'upvotes',
        'downvotes',
        'is_active'
    ];
    public function topic(){
        return $this->belongsTo(Topic::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
