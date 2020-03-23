<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $sum = 0;
        foreach ($carts as $cart) {
           $sum += $cart->quantity * $cart->product->price;
        }

        return view('pages.orders')->withCarts($carts)->withSum($sum);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $quantity = 1;
        $oldcart = Cart::where('user_id', auth()->user()->id)->where('product_id', $request->id)->first();
        if(count($oldcart) > 0){
            $quantity = $oldcart->quantity + 1;
            $cart = Cart::find($oldcart->id);
            $cart->quantity = $quantity;
            $cart->update();
            session()->flash('success', 'Cart incremented successfully');
            return redirect()->back();

        } else {
            $cart = new Cart;
                    $cart->user_id = auth()->user()->id;
                    $cart->product_id = $request->id;
                    $cart->quantity = $quantity;

                    $cart->save();
                    session()->flash('success' ,'Item added to cart successfully');

                    return redirect()->back();
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        if($cart->quantity > 1){
            $quantity = $cart->quantity;
            $quantity--;

            $cart->quantity = $quantity;
            $cart->update();

            return redirect()->route('carts.index');

        } else {
            $cart->delete();

            return redirect()->route('carts.index');
        }
    }

    public function goToCheckOut(){
        return view('pages.checkout');
    }
}
