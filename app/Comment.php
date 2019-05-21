<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\VoteableTrait;
use App\Http\Traits\OwnedbyTrait;

class Comment extends Model
{
    use VoteableTrait;
    use OwnedbyTrait;

    protected $fillable = [
        'thread_id',
        'user_id',
        'content',
    ];
    public function thread(){
        return $this->belongsTo(Thread::class);
    }
    
    
}
