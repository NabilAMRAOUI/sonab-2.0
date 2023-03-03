<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeCheckoutController extends Controller
{
    public  function create() 
    {
        return view('checkout.create');
    }
}
