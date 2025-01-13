<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function showReceipt(Request $request)
    {
        // Get cart data from session
        $cart = json_decode($request->session()->get('cart'), true) ?? [];
        
        // Calculate total
        $totalBelanja = 0;
        foreach ($cart as $item) {
            $totalBelanja += $item['price'] * $item['quantity'];
        }

        return view('receipt', compact('cart', 'totalBelanja'));
    }
}