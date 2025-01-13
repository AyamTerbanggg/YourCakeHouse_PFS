<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'namaPenerima' => 'required|string|max:255',
            'alamatPenerima' => 'required|string|max:255',
            'tlp' => 'required|string|max:15',
            'ekspedisi' => 'required|string',
        ]);

        // Store the cart data in the session
        $cart = json_decode($request->session()->get('cart'), true) ?? [];
        $request->session()->put('cart', json_encode($cart));

        // Set a success message
        // $request->session()->flash('success', 'Checkout successful! Your order has been placed.');

        // Redirect to the receipt page or wherever you want
        return redirect()->route('receipt.show');
    }
}