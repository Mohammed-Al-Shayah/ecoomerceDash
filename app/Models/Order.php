<?php

namespace App\Models;

use Faker\Provider\ar_EG\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function orderItem()
    {
        return $this->hasMany(Order_item::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
