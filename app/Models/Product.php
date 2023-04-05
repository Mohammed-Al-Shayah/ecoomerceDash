<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory,Trans;

    protected $guarded=[];
    protected $fillable=['name', 'image', 'salary', 'quantity', 'category_id', 'content','sale_price'];

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
