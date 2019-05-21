<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

use App\Http\Traits\VoteableTrait;
use App\Http\Traits\OwnedbyTrait;

class Thread extends Model
{
    use VoteableTrait;
    use OwnedbyTrait;

    protected $fillable = [
        'title', 
        'content',
        'slug',
        'topic_id',
        'user_id',
        'username',
        'views',
        'is_active'
    ];
    public function topic(){
        return $this->belongsTo(Topic::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
