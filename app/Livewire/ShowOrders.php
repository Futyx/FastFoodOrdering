<?php

namespace App\Livewire;

use Livewire\Component;

class ShowOrders extends Component
{
    #[On('cartItems')] 

    public $cartItems;
    

    public function render()
    {
        return view('livewire.show-orders');
    }
}
