<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
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
    function getRoutes(){
        $routes = \App\Route::all();
        $tags = \App\Route::find(1)->tags;
        //error_log($routes);
        return response()->json(['routes' => $routes, 'tags' => $tags]);
    }
    function getLocationTags(){
        $tags = \App\Route::allTags()->get();
        return response()->json(['tags' => $tags]);
    }
    function getCartAddons(Request $request){
        $chosenAddons = \App\Addon::whereIn('id', $request->id)->get();
        return response()->json(['chosenAddons' => $chosenAddons]);
    }
    function getCartTransportation(Request $request){
        $chosenTransportation = \App\Transportation::where('transport_method', '=', $request->chosenMethod)->get();
        return response()->json(['chosenTransportation' => $chosenTransportation]);
    }
    function newTrip(Request $request){
        $newTrip = new \App\Route;
        $newTrip->routename = $request->title;
        $newTrip->price = $request->price;
        $newTrip->save();
        $newTrip->tag($request->tags);

        return response()->json(['success' => 'newroute']);
    }
    function newAddon(Request $request){
        //error_log($request->title);
        $newAddon = new \App\Addon;
        $newAddon->image = $request->file('image')->store('uploads');
        $newAddon->activity = $request->title;
        $newAddon->description = $request->description;
        $newAddon->price = $request->price;

        $newAddon->save();

        $newAddon->tag($request->tags);
        return response()->json(['success' => 'newaddon']);
    }
    function deleteAddon(Request $request){
        \App\Addon::find($request->id)->untag();
        \App\Addon::where('id', '=', $request->id)->delete();
        return response()->json(['addon' => 'deleted']);
        }
}
