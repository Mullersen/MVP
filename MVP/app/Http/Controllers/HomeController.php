<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //this demanded all routes that went through the home controller "must be authorized."
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function getImages(){
        $images = \App\Carousel::all();
        return view('welcome' , ['carouselImages' => $images]);
    }
    public function uploadCarouselImage(Request $request){
        $validator = $request->validate([
            'image'     =>  'required|mimes:jpeg,png,jpg,gif|max:7000'
        ]);
        $newImage = new \App\Carousel;
        $newImage->images = $request->file('image')->store('carousel');
        $newImage->save();
        return response()->json(['upload' => 'success']);
    }
    public function getCarouselImages(){
        $images = \App\Carousel::all();
        return response()->json(['carouselImages' => $images]);
    }
    function deleteCarouselImage(Request $request){
        \App\Carousel::where('id', '=', $request->id)->delete();
        return response()->json(['image' => 'deleted']);
    }
}
