<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.view_product',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::get();
        return view('admin.add_product',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);

        $path = $request->file('image')->store('products','public');

        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category' => $request->category,
            'discount_badge' => $request->discount_badge,
            'brand_badge' => $request->brand_badge,
            'image' => $path
        ]);
    
        return redirect()->back()->with('status','Add Product Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.update_product',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->update([
                'title' => $request->title,
                'description' => $request->description,
                'category' => $request->category,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'brand_badge' => $request->brand_badge,
                'discount_badge' => $request->discount_badge,
                  
                ]);
                
                if($request->hasFile('image')){
                    $path_image = public_path('storage/').$product->image;
                    if(file_exists($path_image)){
                        @unlink($path_image);
                    }
                }
                $path = $request->file('image')->store('products','public');
                $product->image = $path;
                $product->save();
                return redirect()->route('products.index')
                                ->with('status','Update Product Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        
        $path = public_path('storage/').$product->image;
        if(file_exists($path)){
            @unlink($path);
        }
        return redirect()->back()->with('status','Delete Product Successfully');
    }
}
