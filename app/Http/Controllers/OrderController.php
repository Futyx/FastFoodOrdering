<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $id = auth()->user()->id;

        $orders = Order::where('user_id', $id)
            ->where('status', 'new')
            ->get();



        return view('order.info', ['orders' => $orders, 'userId' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $cartItems = $request->session()->get('cart_items1', []);

        if (empty($cartItems)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $order = Order::create([
            'user_id' => Auth::id(),
        ]);

        $menuIds = [];

        foreach ($cartItems as $item) {
            $menu = Menu::where('name', $item['name'])->first();
            // echo $menu->name . ' ' .$menu->id;
            if ($menu) {
                $menuIds[] = $menu->id;
            } else {
                return redirect()->back()->with('error', "Menu item '{$item['name']}' not found.");
            }
        }
        if (!empty($menuIds)) {

            $order->menus()->attach($menuIds);
        }
        return redirect()->route('order.info')->with('success', 'سفارش شما با موفقیت ثبت شد.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        dd($request->session()->get('cart_items1', []));

        return view('orders.show', ['orders' => $orders, 'userId' => $id]);
    }

    public function remove(Request $request, $id)
    {

        $cart = session()->get('cart_items1', []);


        if (isset($cart[$id])) {

            unset($cart[$id]);

            session()->put('cart_items1', $cart);
        }

        // Optionally, you may want to redirect back to the cart or provide feedback  
        return redirect()->back()->with('success', 'Item removed from cart');
    }

    public function deleteItem(Request $request, $id)
    {

        // $id = $request->input('item_id');  

        // // Retrieve the items from the session  
        // $cartItems = $request->session()->get('cart_items1', []);  

        // // Check if the item exists in the cart  
        // $itemFound = false;  
        // $cartItems = collect($cartItems)->filter(function ($item) use ($id, &$itemFound) {  
        //     if ($item['id'] == $id) {  
        //         $itemFound = true; // Mark that the item was found  
        //         return false;      // Skip this item  
        //     }  
        //     return true; // Keep this item  
        // })->values()->toArray();  

        // // Update the session without the deleted item  
        // $request->session()->put('cart_items1', $cartItems);  

        // // Redirect back with a success or error message  
        // if ($itemFound) {  
        //     return redirect()->back()->with('success', "Deleted item with ID: " . $id);  
        // }  

        // return redirect()->back()->with('error', "Item not found.");  


        // // Retrieve the cart items from the session  

        // // Find the item to delete  
        // // $selectedItem = collect($cartItems)->firstWhere('id', $id);

        // // // Check if the item is found  
        // // if ($selectedItem) {
        // //     $itemName = $selectedItem['name'];

        // //     // Remove the item from the cart  
        // //     $cartItems = collect($cartItems)->reject(function ($item) use ($id) {
        // //         return $item['id'] === $id;
        // //     })->values()->toArray();

        // //     // Update the session with the new cart items array  
        // //     $request->session()->put('cart_items1', $cartItems);

        // //     return "Deleted item: " . $itemName;
        // // }

        // // return "Item not found.";
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $userId = auth()->user()->id;
        $user = auth()->user();
        $sessionKey = 'cart_items' . $userId;
        $cartItems = session($sessionKey, []);



        return view('order.list', compact('cartItems', 'user'));
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {

        $cartItems = session('cart_items', []);

        foreach ($cartItems as $item) {

            $selectedItem = collect($item)->firstWhere('id', $id);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
