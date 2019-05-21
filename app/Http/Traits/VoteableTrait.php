<?php
namespace App\Http\Traits;
use Illuminate\Support\Facades\Auth;

trait VoteableTrait {
    public function upvotes(){
        return $this->morphToMany('App\User', 'upvoteable')->whereDeletedAt(null);
    }
    public function getIsUpvotedAttribute(){
        $upvote = $this->upvotes()->whereUserId(Auth::id())->first();
        return (!is_null($upvote)) ? true : false;
    }
}