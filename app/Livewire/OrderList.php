<?php

namespace App\Livewire;

use App\Models\Menu;
use App\Models\Order;
use DragonCode\Contracts\Cashier\Http\Request;
use Livewire\Component;

class OrderList extends Component
{

    public $cartItems = [];

    public $quantities = [];

    public $menuName;

    public $data;


    public function mount($cartItems)
    {

        $this->cartItems = $cartItems;

        foreach ($cartItems as $item) {
            $this->quantities[$item['id']] = $item['quantity'] ?? 1;
        }
        if (empty($this->cartItems)) {
            session()->flash('message', 'شما سفارشی ندارید');
        }else{

            // $collection = collect($cartItems);  
            // $item = $collection->firstWhere('name', 'چیکن برگر');  


            // dd($cartItems);
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
    public function test($cartItems) {

        dd($cartItems);

    } 


    public function remove( $itemId)  
    {  


        // Check if the item exists in the cart  
        // if (isset($this->cartItems[$id])) {  
        //     // Remove the item from the cart  
        //     unset($this->cartItems[$id]);  
            
        //     // Update the session  
        //     session()->put('cart_items', $this->cartItems);  
            
        //     // Optionally give feedback  
        //     session()->flash('success', 'Item removed from cart');  

        //     // Sync the cart in the current component state  
        //     $this->cartItems = session()->get('cart', []);  
        // }  
    }  
   
    
    public function removeFromCart($itemId)
    {
        $userId = auth()->user()->id;
     
        $cartItems = session('cart_items', []);  



        // Remove the item with the specified ID  
        $cartItems = array_filter($cartItems, function($item) use ($itemId) {  
            return $item['id'] !== $itemId;  
        });  


        session(['cart_items' => array_values($cartItems)]); // Optional: Reindex  
        $this->cartItems = array_values($cartItems); // Reindex  


        session()->flash('message', 'Item removed from cart successfully.');
    }
    public function delete($id)
    {

        $cartItems = session('cart_items', []);  

        foreach($cartItems as $item){

            $selectedItem = collect($item)->firstWhere('id', $id);
             return $this->menuName =$item['name'];



        }

        // Find the item in the cart items array  
        // $item = collect($cartItems)->firstWhere('id', $id);  
    
        // return $this->data =$item; // This will return the item or null if not found  


        


        // $session = Session::get('cart_items');
        // $value = session('cart_items');
        // dd($value);



        // $cartItems = session()->get('cartItems');

        // if (isset($cartItems[$itemId])) {
        //     unset($cartItems[$itemId]);
        //     session()->put('cartItems', $cartItems);  
        //     \Log::info(session()->get('cartItems'));

        //     $this->cartItems = $cartItems;

        //     $this->data = 'Item deleted!';
        // } else {
        //     // Item not found in cart, you could set a different message if needed  
        //     $this->data = 'Item not found.';
        // }

        // // dd($request);
        // // $itemId =
        // // $request->session()->forget('key')


    }

    public function addToOrder(Request $request)
    {
            $cartItems = session()->get('cart-items');


            $cartItems = $request->session()->get('cart_items', []);  
            $userId = auth()->user()->id; // assuming the user is authenticated  
        
            // Calculate total price  
            $totalPrice = array_sum(array_column($cartItems, 'price')); // Ensure 'price' field exists in your items  
        
            // Create the order  
            $order = Order::create([  
                'user_id' => $userId,  
                'menus' => json_encode($cartItems), // Store items as JSON  
                'amount' => $totalPrice,  
            ]);  
        
            // Clear the session cart items  
            $request->session()->forget('cart_items');  
        
            // Redirect with success message  
            return redirect()->route('order.list')->with('success', 'Order placed successfully!');  
        




    }

    public function render()
    {
        return view('livewire.order-list', ['cartItems' => $this->cartItems]);
    }
}
