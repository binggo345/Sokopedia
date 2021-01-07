<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Type;
use App\Product;

class AdminController extends Controller
{
    public function addProduct(){
        $product = Product::all();
        $type = Type::all();

        return view('admin/addProduct', compact('product', 'type'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:products',
            'cat' => 'required',
            'desc' => 'required',
            'price' => 'required|integer|min:100',
            'img' => 'required|image|max:10000',
        ]);
        
        $ex = $request->file('img');
        // Define upload path
        $destinationPath = public_path('storage/images');
		// Upload Orginal Image           
        $profileImage = time().'.'. $ex->getClientOriginalExtension();
        $ex->move($destinationPath, $profileImage);

        Product::create([
            'name' => $request->name,
            'types_id' => $request->cat,
            'photo' => 'storage/images/'.$profileImage,
            'price' => $request->price,
            'desc' => $request->desc
        ]);  
        return view('home');
    }

    public function listProduct(){
        $product = Product::all();

        return view('admin/listProduct', compact('product'));
    }
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->back();
    }

    public function addCategory(){

        return view('admin/addCategory');
    }
    public function storeCat(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:types'
        ]);
        
        Type::create([
            'name' => $request->name
        ]);  
        return view('home');
    }

    public function listCategory(){
        $type = Type::all();

        return view('admin/listCategory', compact('type'));
    }
    public function listCategoryDet($id){
        $type = Type::all();
        $product = Product::where('types_id', $id)
        ->get();

        return view('admin/listCategoryDet', compact('type', 'product'));
    }
}
