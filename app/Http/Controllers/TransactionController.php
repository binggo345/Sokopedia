<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Transaction;
use App\TransactionDetail;

class TransactionController extends Controller
{
    public function showList($id){
        $trans = Transaction::where('users_id', $id)->get();
        
        return view('transaction',['trans'=>$trans]);
    }

    public function showDetail($id){
        $trans_det = TransactionDetail::where('transactions_id', $id)
        ->join('products', 'products.id', '=', 'transaction_details.products_id')
        ->get();
        return view('transactiondetail', compact('trans_det'));
    }
}
