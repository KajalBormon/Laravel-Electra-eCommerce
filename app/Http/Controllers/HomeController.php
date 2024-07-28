<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;


class HomeController extends Controller
{
    public function index(){
        $products = Product::all();

        if(Auth::id()){
            $user_id = Auth::user()->id;
            $count = Cart::where('user_id',$user_id)->count();
            $cart_items = Cart::where('user_id',$user_id)->get();
            return view('home.index',compact('products','count','cart_items'));
        }else{
            $count = '';
            return view('home.index');
        }

    }

    public function shop(){
        $products = Product::all();

        if(Auth::id()){
            $user_id = Auth::user()->id;
            $count = Cart::where('user_id',$user_id)->count();
            $cart_items = Cart::where('user_id',$user_id)->get();
            return view('home.shop',compact('products','count','cart_items'));
        }else{
            $count = '';
            return view('home.shop',compact('products'));
        }

    }

    public function add_cart($id){
        $product_id = $id;
        $user_id = Auth::user()->id;

        Cart::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
        ]);

        return redirect()->back();
    }

    public function product_delete($id){
        $product_id = Cart::find($id);
        $product_id->delete();
        return redirect()->back();

    }

    public function view_cart(){
        $user_id = Auth::user()->id;
        $count = Cart::where('user_id',$user_id)->count();
        $cart_items = Cart::where('user_id',$user_id)->get();

        return view('home.view_cart',compact('count','cart_items'));
    }

    public function checkout(){
        $products = Product::all();

        if(Auth::id()){
            $user_id = Auth::user()->id;
            $count = Cart::where('user_id',$user_id)->count();
            $cart_items = Cart::where('user_id',$user_id)->get();
        }else{
            $count = '';
        }
        return view('home.checkout',compact('products','count','cart_items'));
    }


    public function order(Request $request){
        $user_id = Auth::user()->id;
        $carts = Cart::where('user_id',$user_id)->get();
        foreach($carts as $cart){
            Order::create([
                'customer_name' => $request->customer_name,
                'receving_add' => $request->address,
                'phone' => $request->number,
                'user_id' => $user_id,
                'product_id' => $cart->product_id
            ]);
        }
        return redirect()->back()->with('status','Your Order Successfully Placed');
    }

    public function myorder(){
        $products = Product::all();

        if(Auth::id()){
            $user_id = Auth::user()->id;
            $count = Cart::where('user_id',$user_id)->count();
            $cart_items = Cart::where('user_id',$user_id)->get();
        }else{
            $count = '';
        }

        $orders = Order::all();
        return view('home.myorder',compact('products','count','cart_items','orders'));
    }

    public function product_details($id){
        $product = Product::find($id);

        if(Auth::id()){
            $user_id = Auth::user()->id;
            $count = Cart::where('user_id',$user_id)->count();
            $cart_items = Cart::where('user_id',$user_id)->get();
        }else{
            $count = '';
        }

        $orders = Order::all();
        return view('home.product',compact('product','count','cart_items','orders'));
    }

    public function stripe($total_price)
    {

        return view('home.stripe',compact('total_price'));
    }

    public function stripePost(Request $request,$total_price)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $total_price * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment Successfully Done."
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }


}
