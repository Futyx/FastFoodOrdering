<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory  
{  
    protected $model = Order::class;  

    public function definition()  
    {  
        return [  
            'user_id' => $this->faker->id,  
            'order_date' => $this->faker->date,  
        ];  
    }  
}  