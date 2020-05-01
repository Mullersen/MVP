<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function getTransportation(){
        $transportation = \App\Transportation::all();
        return response()->json(['transportation' => $transportation]);
    }
}
