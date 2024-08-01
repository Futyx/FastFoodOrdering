<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    use HasFactory , Sluggable ;
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    
   

    public function category(){

        return $this->belongsTo(Category::class, 'id','category_id');
        
    }
    public function orders(){

        return $this->belongsToMany(Order::class, 'id','order_id');
        
    }
    

    

}
