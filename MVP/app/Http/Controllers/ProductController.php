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
    function newAddon(Request $request){
        // $request->validate([
        //     'title'          =>  'required',

        //     'image'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        // ]);
        //error_log($request->title);
        $newAddon = new \App\Addon;
        $newAddon->image = $request->file('image')->store('uploads');
        $newAddon->activity = $request->title;
        $newAddon->description = $request->description;
        $newAddon->price = $request->price;
        $newAddon->location = $request->location;
        $newAddon->save();

        return response()->json(['success' => 'good']);
    }
}
