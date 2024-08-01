<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = DB::table('orders')->get();

        $id = auth()->user()->id;

        return view('orders.show', ['orders' => $orders, 'userId' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $order = new Order;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $menuName = $request->input('menu_name');
        $menuPrice = $request->input('menu_price');
        $menuItem = DB::table('menus')->where('name', $menuName)->first();
        $randomId = rand(10, 90);
        $rowId = uniqid($randomId, true);
        $userId = auth()->user()->id;


        dd($menuName);

        // if ($request) {

        //     Cart::add([
        //         'id' => $menuItem->id,
        //         'name' => $menuName,
        //         'qty' => 1,
        //         'price' => $menuPrice,
        //         'user_id' => $userId,
        //     ]);
        // }


        // $cartCount = Cart::content();

        // dd($cartCount);

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

  
        

         return view('order.list', compact('cartItems','user')); 
    }
    public function showaorders()
    {



        // $id=1;
        // $order = Order::findOrFail($id);

        // dd($order);
        // $userId = auth()->user()->id;
        // return redirect()->route('orders.show', compact('order'));  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
