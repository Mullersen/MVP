<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function getTransportation(){
        $transportation = \App\Transportation::all();
        return response()->json(['transportation' => $transportation]);
    }
    function getAddons(){
        $addons = \App\Addon::all();
        return response()->json(['addons' => $addons]);
    }
    function getCartAddons(Request $request){
        $chosenAddons = \App\Addon::whereIn('id', $request->id)->get();
        return response()->json(['chosenAddons' => $chosenAddons]);
    }
}
