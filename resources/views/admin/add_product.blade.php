@extends('admin.index')

@section('container')
    <h3 class="text-center text-light">Add Products</h3>
    @if(session('status'))
    <div>
        <p class="text-success text-center">{{ session('status') }}</p>
    </div>
    @endif
    <div class="product">
        <div class="col-6">
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
             @csrf
                <div>
                    <input type="text" name="title" placeholder="Title" id="" class="form-control">
                </div>
                <div class="mt-2">
                    <textarea name="description" id="" cols="60" rows="5" placeholder="Description" class="form-control text-light"></textarea>
                </div>
                <div class="mt-2">
                    <input type="number" name="price" class="form-control" id="" placeholder="Product Price">
                </div>
                <div class="mt-2">
                    <input type="number" name="quantity" class="form-control" id="" placeholder="Product Quantity">
                </div>
                <div class="mt-2">
                   <select name="category" id="" class="form-control text-light">
                    @foreach ($category as $cat)
                    <option value="{{ $cat->category_name }}">{{ $cat->category_name }}</option>
                    @endforeach
                   </select>
                 
                </div>
                <div class="mt-2">
                    <input type="text" name="brand_badge" placeholder="Brand collection" class="form-control" id="">
                </div>
                <div class="mt-2">
                    <input type="text" name="discount_badge" placeholder="Discount Percentage" class="form-control" id="">
                </div>
                <div class="mt-2">
                    <input type="file" name="image" class="form-control" id="" accept="jpg,jpeg,png,gif">
                </div>
                <div class="mt-2">
                    <input type="submit" value="Add Product" class="btn btn-success form-control">
                </div>
            </form>
        </div>
    </div>
@endsection