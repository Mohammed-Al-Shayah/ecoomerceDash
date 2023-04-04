<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Product::class)->withDefault();
    }

    public function orderItem()
    {
        return $this->hasMany(Order_item::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function card()
    {
        return $this->hasMany(Card::class);
    }


}
