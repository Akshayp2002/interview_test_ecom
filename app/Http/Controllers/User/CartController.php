<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function add(Request $request)
    {
        try {
            $user = Auth::user();
            Cart::create([
                'user_id'    => $user->id,
                'product_id' => $request->itemId,
                'quantity'   => '1',
            ]);
            return response()->json(['message' => 'Item added to the cart successfully']);
        } catch (Exception $e) {
            return response()->json(['error'   => 'Failed to add item to the cart']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function goToCart()
    {
        try {
            $user       = Auth::user();
            $cartItems  = Cart::where('user_id', $user->id)->get();
            $productIds = $cartItems->pluck('product_id')->toArray();
            $products   = Product::whereIn('id', $productIds)->get();
            $totalPrice = $products->sum('price');
            return view('user.cart.cart',compact('products', 'totalPrice'));
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
