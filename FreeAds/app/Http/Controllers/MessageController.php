<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Controllers\Message;

class MessageController extends Controller
{

   /**
     * Create a new controller instance.
     *
     * @return void
     */
   public function __construct()
   {
       $this->middleware(['auth','verified']);
   }

    public function create(Request $request)
    {   
        $seller_id = $request['seller_id'];
        $ad_id = $request['ad_id'];
        return view ('message', compact('seller_id', 'ad_id'));
    }

  
}
