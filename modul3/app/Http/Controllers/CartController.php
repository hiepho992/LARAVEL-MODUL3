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
        // dd($carts);

        return view('carts.index', compact('carts'));
    }

    public function cart(Request $request, $id){

        // $products = Product::findOrFail($id);
        // if(!empty($products)){
        //     $oldCart = session('cart') ? session('cart') : '';
        //     $newCart = new Cart($oldCart);
        //     $newCart->addCart($products, $id);
        //     request()->session()->put('cart', $newCart);
        // }

        $products = Product::findOrFail($id);
        if(!$request->session()->has('cart')){
            $request->session()->put('cart');
        }
        // dd(Session::get('cart'));
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

               return redirect()->back();
            }


        }


    }

}
