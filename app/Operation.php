<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Operation extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'price', 'nft_id', 'seller_id', 'buyer_id', 'comission'
    ];

    public function nft()
    {
        return $this->belongsTo(Nft::class);
    }
}
