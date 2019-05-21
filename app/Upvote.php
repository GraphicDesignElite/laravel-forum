<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Upvote extends Model
{
    use SoftDeletes;

    protected $table = 'upvoteables';

    protected $fillable = [
        'user_id',
        'upvoteable_id',
        'upvoteable_type',
    ];

    public function threads()
    {
        return $this->morphedByMany('App\Thread', 'upvoteable');
    }
    public function comments()
    {
        return $this->morphedByMany('App\Comment', 'upvoteable');
    }
}
