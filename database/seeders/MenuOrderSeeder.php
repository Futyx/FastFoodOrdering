<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()  
    {  
        $orders = Order::all();  
        $menus = Menu::all();  

        foreach ($orders as $order) {  
            $randomMenus = $menus->random(rand(1, 12))->pluck('id')->toArray(); 
            $order->menus()->attach($randomMenus); 
        }  
    }  
}
