<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Owner extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];

    public function restaurants(){

        return $this->hasMany(Owner::class);
    }

}
