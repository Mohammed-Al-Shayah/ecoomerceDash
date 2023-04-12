<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory,Trans;
    protected $guarded=[];
    protected $fillable=['name','image','parent_id'];
    protected $casts = [
        'name' => 'json',
    ];

    public function perant()
    {
        return $this->belongsTo(Category::class,'parent_id')->withDefault();
    }

    public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
    }


    public function prodects()
    {
        return $this->hasMany(Product::class);
    }





}
