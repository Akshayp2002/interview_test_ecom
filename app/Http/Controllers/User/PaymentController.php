<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\StripeClient;
use Stripe\Exception\CardException;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function index()
    {
        // try {
        //     $YOUR_DOMAIN = env('APP_URL');
        //     $user       = Auth::user();
        //     $cartItems  = Cart::where('user_id', $user->id)->get();
        //     $productIds = $cartItems->pluck('product_id')->toArray();
        //     $products   = Product::whereIn('id', $productIds)->get();
        //     $totalPrice = $products->sum('price');


        //     Stripe::setApiKey(env('STRIPE_SECRET'));
        //     header('Content-Type: application/json');

            
        //     $checkout_session = \Stripe\Checkout\Session::create([
        //         'line_items' => [[
        //             # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
        //             'price' => 'price_1OlpdnSFLHd3qpckpp3jB0MR',
        //             'quantity' => 1,
        //         ]],
        //         'mode' => 'payment',
        //         'success_url' => $YOUR_DOMAIN . '/user',
        //         'cancel_url' => $YOUR_DOMAIN . '/user/dashboard',
        //     ]);
            

        //     if ($checkout_session->status !== 'success') {
        //         // Handle errors or log the response
        //         dd($checkout_session);
        //     }

        //     header("HTTP/1.1 303 See Other");
        //     header("Location: " . $checkout_session->url);

        // } catch (CardException $e) {
        //     dd($e);
        // }

        return view('user.stripe.stripe');
    }

    public function store(Request $request)
    {
        try {
            $user       = Auth::user();
            $cartItems  = Cart::where('user_id', $user->id)->get();
            $productIds = $cartItems->pluck('product_id')->toArray();
            $products   = Product::whereIn('id', $productIds)->get();
            $totalPrice = $products->sum('price');


            Stripe::setApiKey(env('STRIPE_SECRET'));
            header('Content-Type: application/json');

            $YOUR_DOMAIN = env('APP_URL');

            $checkout_session = \Stripe\Checkout\Session::create([
                'line_items' => [[
                    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
                    'price' => $totalPrice,
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => $YOUR_DOMAIN . '/user',
                'cancel_url' => $YOUR_DOMAIN . '/user/dashboard',
            ]);

            header("HTTP/1.1 303 See Other");
            header("Location: " . $checkout_session->url);

            $stripe = new StripeClient(env('STRIPE_SECRET'));

            $stripe->paymentIntents->create([
                'amount' => $totalPrice,
                'currency' => 'usd',
                'payment_method' => $request->payment_method,
                'description' => 'Demo payment with stripe',
                'confirm' => true,
                'receipt_email' => $request->email,
                'return_url' => route('user.dashboard'),
            ]);
        } catch (CardException $th) {
            throw new Exception("There was a problem processing your payment", 1);
        }

        return redirect()->back()->withSuccess('Payment done.');
    }
}
