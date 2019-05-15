<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'name', 
        'description',
        'slug',
        'allows_new_threads'
    ];
    public function threads(){
        // Listings have many reviews
        return $this->hasMany(Thread::class);
    }
}
