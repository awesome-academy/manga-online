<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table = 'messages';
    protected $fillable = ['content', 'user_id', 'status', 'room_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
