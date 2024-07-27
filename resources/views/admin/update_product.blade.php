@extends('admin.index')

@section('container')
    <h3 class="text-center text-light">Update Products</h3>
    <div class="product">
      <div class="col-6">
        <form action="{{ route('products.update',$product->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div>
                <label for="titile">Title</label>
                <input type="text" name="title" id="" value="{{ $product->title }}" class="form-control">
            </div>
            <div class="mt-2">
                <label for="description">Description</label>
                <textarea name="description" id="" cols="60" rows="30" class="form-control text-light">{{ $product->description }}</textarea>
                
            </div>
            <div class="mt-2">
                <label for="category">Category</label>
                <select name="category" id="" class="form-control text-light">
                    <option value="">Select Option</option>
                    @foreach($category as $cat)
                    <option value="{{ $cat->category_name }}">{{ $cat->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <label for="price">Price</label>
                <input type="number" name=price" id="" value="{{ $product->price }}" class="form-control">
            </div>
            <div class="mt-2">
                <label for="quantity">Quantity</label>
                <input type="number" name=quantity" id="" value="{{ $product->quantity }}" class="form-control">
            </div>
            <div class="mt-2">
                <label for="Brand Badge">Brand Badge</label>
                <input type="text" name=brand_badge" id="" value="{{ $product->brand_badge }}" class="form-control">
            </div>
            <div class="mt-2">
                <label for="discount_badge">Discount Badge</label>
                <input type="text" name=discount_badge" id="" value="{{ $product->discount_badge }}" class="form-control text-light">
            </div>
            <div class="mt-2">
                <label for="imgage">Image</label>
                <img src="{{ asset('/storage/'.$product->image) }}" alt="" width="90px" height="100px" id="output">
            </div>
            <div class="mt-2">
                <input type="file" name="image" onchange="document.querySelector('#output').src=window.URL.createObjectURL(this.files[0])" class="form-control" id="">
            </div>
            <div class="mt-2">
                <input type="submit" value="Update Product" class="btn btn-success">
            </div>
        </form>
      </div>
    </div>
@endsection