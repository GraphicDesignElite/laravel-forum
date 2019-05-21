<?php
namespace App\Http\Traits;
use App\User;

trait OwnedbyTrait {
    public function user(){
        return $this->belongsTo(User::class);
    }
}