<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //g tau benner apa salah
        if(Auth::user()->is_admin == 1){
            return view('adminPanel');
        }
        else{
            return view('home');
        }
    }

    public function itemSearch(Request $request){
        $search = $request->search;

        $product = Product::where('name','like',"%".$search."%")->paginate(3);

        return view('search', compact('product'));
    }
}
