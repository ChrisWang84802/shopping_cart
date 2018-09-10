<?php

namespace App\Http\Controllers;

use App\Cart;
use App\HttpRequests;
use Illuminate\Http\Request;
use App\Product;
use Session;

class ProductController extends Controller
{
    public function getIndex()
    {
	    $products = Product::all();//fetch all product
	    //Session::flush();
	    return view('shop.index', ['products' => $products]);
    }

    public function getAddToCart(Request $request ,$id)
    {	
	    $product = Product::find($id);
	    $oldCart = Session::has('cart') ? Session::get('cart') : null;
	    $cart = new Cart($oldCart);
	    $cart->add($product,$product->id);
	
	    $request->session()->put('cart' , $cart);
	    //dd($request->session()->get('cart'));
	    return redirect()->route('product.index');
    }

    public function getCart()
    {	
       	//$products = Session::all();
	    //return $products;
	    if(!Session::has('cart')){
	        return view('shop.shopping-cart');
	    }

	    $oldCart = Session::get('cart');
	    // dd($oldCart);
	    $cart = new Cart($oldCart);
	    
	    return view('shop.shopping-cart', [ 'products' => $cart->items, 'totalPrice' => $cart->totalPrice ]);   
    	

    }


    public function getCheckout()
    {
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout',['total' => $total]);
    }

    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

    public function clear()
    {
	    Session::flush();
	    return redirect()->route('product.index');
    }

}
