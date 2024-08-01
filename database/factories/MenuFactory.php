<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Menu::class;  

    public function definition()  
    {  
        return [  
            'id' => $this->faker->rand(1,20)->uniqid,  
            'price' => $this->faker->numberBetween(5, 50),  
        ];  
    }  
}
