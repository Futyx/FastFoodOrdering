<?php

namespace App\Livewire;


use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CreateCart extends Component
{

    public $menus;
    public $menuName = '';
    public $quantities = [];
    public $totalCount = 0;
    public $cartItems = [];

    public function mount($menus)
    {
        $this->menus = $menus;
        foreach ($menus as $menu) {
            $this->quantities[$menu['id']] = 0;  
        }
    }

    public function increment($menuId)
    {
        if (isset($this->quantities[$menuId])) {
            $this->quantities[$menuId]++;
        }
    }

    public function decrement($menuId)
    {
        if (isset($this->quantities[$menuId]) && $this->quantities[$menuId] > 0) {
            $this->quantities[$menuId]--;
        }
    }

    public function addToOrder()
    {

        $cartItems = [];
        $totalCount = 0;
        $userId = auth()->user()->id;

        foreach ($this->menus as $menu) {

            
            $quantity = $this->quantities[$menu->id] ?? 0;

            if ($quantity > 0) {
                $cartItems[] = [
                    'id' => rand(),
                    'name' => $menu->name,
                    'totalPrice' => $menu->price*$quantity,
                    'quantity' => $quantity,
                    'user_id' => $userId,
                ];
            }
        }

        $sessionKey = 'cart_items' . $userId; 
        Session::put($sessionKey, $cartItems);  

        // Session::push('user_id', $cartItems);

        $session = session($sessionKey);
        // dd($session);

        session()->flash('success', 'سفارش شما با موفقیت اضافه شد');



    }


    public function render()
    {
        return view('livewire.create-cart')->with([]);
    }
}
