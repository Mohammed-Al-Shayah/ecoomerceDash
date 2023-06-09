<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use Faker\Provider\ar_EG\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    // protected $guarded=['id'];
    protected $fillable=['name','email','password'];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function order()
    {
        return $this->hasMany(Order::class);
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

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    // public function notifications()
    // {
    //     return $this->hasMany(Notification::class);
    //     }

    // public function ScopeActive($query)
    // {
    //     $query->whereActive(1);
    // }


}
