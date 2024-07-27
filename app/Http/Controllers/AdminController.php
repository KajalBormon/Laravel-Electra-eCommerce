<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function product_search(Request $request){
        $request->validate([
            'search' => 'required|string'
        ]);

        session([
            'search_result' => $request->search
        ]);
        return redirect()->route('search.result');
    }

    public function search_result(){
        $products = Product::get();
        $search = session('search_result');

        if($search){
            $products = Product::where('title','LIKE','%'.$search.'%')
                                ->orWhere('category','LIKE','%'.$search.'%')
                                ->get();

                session()->forget('search_result');
        }
        return view('admin.view_product',compact('products'));
    }

    public function view_order(){
        $orders = Order::all();
        return view('admin.view_order',compact('orders'));
    }

    public function on_the_way($id){
        $order = Order::find($id);
        
        $order->update([
                'status' => 'on the way'
            ]);
        return redirect('/view_order');
    }

    public function delivered($id){
        $order = Order::find($id);
        
        $order->update([
                'status' => 'Delivered'
            ]);
        return redirect('/view_order');
    }


    public function pdf($id){
        $data = Order::find($id);
        $pdf = pdf::loadView('admin.invoice',compact('data'));
        return $pdf->download('invoice.pdf');
    } 


}
