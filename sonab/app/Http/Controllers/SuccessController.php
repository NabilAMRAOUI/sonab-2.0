<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuccessController extends Controller{

    public function create()
    {
      return view('thankyou.index');
    }
}

