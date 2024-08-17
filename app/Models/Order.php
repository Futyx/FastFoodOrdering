<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected $fillable = [
        'customer_id',
        'user_id',
        'status',
        'payment_status',
    ];
    public function menus(){

        return $this->belongsToMany(Menu::class);
        
    }

    public function user(){

        return $this->belongsTo(User::class,'id', 'user_id');
        
    }
    public function customer(){

        return $this->belongsTo(Customer::class,'id', 'customer_id');
        
    }

}
