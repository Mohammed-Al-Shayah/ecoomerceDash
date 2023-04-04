<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['name','image','parent_id'];

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
