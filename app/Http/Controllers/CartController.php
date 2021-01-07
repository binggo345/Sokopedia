<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Cart;
use App\Transaction;
use App\TransactionDetail;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ganti ke store kalo add cart dh bener
        $product = Product::paginate(3);

        return view('home')->with('product', $product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $i = Cart::where([
            'users_id' => $request->hidden_user_id,
            'products_id' => $request->hidden_product_id
        ])->first();
        if(!empty($i)){
            $i->quantity = $request->quantity;
            $i->save();
        }
        else{
            Cart::create([
                'users_id' => $request->hidden_user_id,
                'products_id' => $request->hidden_product_id,
                'quantity' => $request->quantity
            ]);
        }
        
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $quantity = 0;
        $cart = Cart::where('users_id', auth()->user()->id)->where('products_id', $id);
        if($cart->first())
        {
            $cart = $cart->first();
            $quantity = $cart->quantity;
        }
        return view('addCart',compact('product','quantity'));
    }
    public function showList($id){
        $cart = Cart::where('users_id', $id)->get();
        $items = Cart::where('users_id', $id)->get();

        $product = [];
        $i = 0;
        foreach ($cart as $c) {
            $product[] = Product::find($c -> products_id);  
            $i++;   
        }
        return view('cart',['product'=>$product, 'cart'=>$cart]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $i = Cart::find($id);
        $i->quantity = $request->quantity;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::destroy($id);
        return redirect()->back();
    }

    public function checkout(Request $request){
        $trans = new Transaction;
        $trans->users_id = auth()->user()->id;
        $trans->save();

        $cart = Cart::where('users_id', auth()->user()->id)->get();
        foreach($cart as $c){
            $trans_det = new TransactionDetail;
            $trans_det->transactions_id = $trans->id;
            $trans_det->products_id = $c->products_id;
            $trans_det->quantity = $c->quantity;
            $trans_det->save();
            Cart::find($c->id)->delete();
        }

        return redirect()->route('home');
    }
}
