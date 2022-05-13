<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Nft extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'price', 'description', 'user_id', 'category', 'onStock', 'photo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
