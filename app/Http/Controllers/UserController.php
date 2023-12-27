<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function savedProducts()
    {
        $products = Auth::user()->savedProducts;
        return view('user.savedProducts', compact('products'));
    }
}
