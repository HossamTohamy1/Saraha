<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'content',
        'image',
        'receiver_id',
        'sender_id',
    ];
    public function user(){
        return $this->sender();
    }
    public function receiver(){
        return $this->belongsTo(User::class);
    }
    public function sender(){
        return $this->belongsTo(User::class);
    }
}
