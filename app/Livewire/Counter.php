<?php

namespace App\Livewire;

use DragonCode\Contracts\Cashier\Http\Request;
use Livewire\Component;

class Counter extends Component
{

    public $cartItems = [];

    public $quantities = [];

    public $menuId = [];


    public function mount($cartItems)
    {

        $this->cartItems = $cartItems;
        foreach ($cartItems as $item) {

            $this->quantities[$item['id']] = $item['quantity'];
        }
    }
    public function increment($itemId)
    {

        if (isset($this->quantities[$itemId])) {
            $this->quantities[$itemId]++;
        }
    }

    public function decrement($itemId)
    {
        if (isset($this->quantities[$itemId]) && $this->quantities[$itemId] > 0) {
            $this->quantities[$itemId]--;
        }
    }

    public function delete()
    {
        


    }

    public function addToOrder(Request $request)
    {
    //    $order = new Order();
    //    $order->user_id = $request->id;
    //    $order->menus =  $request->menus;

       
    }

    public function render()
    {
        return view('livewire.counter')->with([]);
    }
}
