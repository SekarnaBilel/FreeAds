<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

// use Illuminate\Routing\Controller as BaseController;
class IndexController extends Controller{ 

    public function showIndex()
    {
        return view('index');
    }
}
