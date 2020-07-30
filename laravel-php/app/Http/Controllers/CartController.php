<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(){

        $carts = Session::get('cart');


        return view('carts.index', compact('carts'));
    }

    public function cart(Request $request, $id){

        $products = Product::findOrFail($id);
        if(!$request->session()->has('cart')){
            $request->session()->put('cart');
        }
        $listCart = $request->session()->get('cart');
        if(!empty($listCart)){
            foreach($listCart as $value){
                if($value['id'] == $products['id']){
                    $value['qty'] += 1;

                    return redirect()->back();
                }

            }

        }
        $products['qty'] = 1;
        $request->session()->push('cart', $products);

        return response()->json($products);
    }

    public function deleteCart(Request $request, $id){

        $listCart = $request->session()->get('cart');
        foreach($listCart as $key => $value){

            if($value['id'] == $id){
               $request->session()->forget("cart.$key");

            }
        }
        $listCart = $request->session()->get('cart');
        $request->session()->flush('cart');
        foreach($listCart as $val){
            $request->session()->push('cart', $val);
        }

    }

    public function edit(Request $request, $id, $qty){


        $products = Product::findOrFail($id);
        $listCart = $request->session()->get('cart');
        foreach($listCart as $val){
            if($val['id'] == $products['id']){
                $val['qty'] = $qty;
            }

            $amount =  $qty * $val['price'];
        }

        $listCart = $request->session()->get('cart');
        $total = 0;
        $tatolQty = 0;
        foreach($listCart as $val){
            $total += $val['qty'] * $val['price'];
            $tatolQty += $val['qty'];

        }
        return response()->json([$qty, $amount, $total, $tatolQty]);

    }

}
