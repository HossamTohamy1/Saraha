<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $fillable = [
        
        'user_id',
        'followed_id',
        'isHidden',
    ];
 
    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }

  
    public function FollowedUser() {
        return $this->belongsTo(User::class, 'followed_id');
    }
}
