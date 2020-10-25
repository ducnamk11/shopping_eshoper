<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    const CONFIRMED = 1;
    const UNCONFIRMED = 0;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
