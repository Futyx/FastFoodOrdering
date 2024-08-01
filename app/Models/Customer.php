<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Authenticatable
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class, 'order_id');
    }

    public function latestOrder(): HasOne
    {
        return $this->hasOne(Order::class)->latestOfMany();
    }

    public function favoriteOrder(): HasOne
    {
        return $this->hasOne(Order::class)->ofMany('amount', 'max');
    }
}
