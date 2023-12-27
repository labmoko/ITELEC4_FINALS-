<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function show(Product $product)
    {
        return view('checkout.show', compact('product'));
    }
}