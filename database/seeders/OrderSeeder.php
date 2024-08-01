<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         // Create orders and attach random menus to each order  
        //  Order::factory()->count(5)->create()->each(function ($order) use ($menus) {  
        //     $order->menus()->attach(  
        //         $menus->random(rand(1, 3))->pluck('id')->toArray() // Attach 1 to 3 random menus  
        //     );  
        // });  
    
        // Order::UpdateOrCreate([
        //     'email' => 'admin@example.com',
        //     'password' => '$2y$12$aJGyaGCpf/NPlweC5btlhuCWA9.1H.yQgm1RN1dtuk9rRukXgSUYC',
        // ]); 
    }
}
