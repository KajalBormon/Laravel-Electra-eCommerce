@extends('admin.index')

@section('container')
    <h3 class="text-center text-light">All Products</h3>
    <div class="search">
        <div class="col-4">
            <form action="{{ route('product.search') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" name="search" id="" placeholder="Search..." class="form-control text-light">
                    <div class="input-group-append">
                        <input type="submit" value="Search" class="btn btn-success form-control bg-success ">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="all_product mt-4">
        <div class="col-10">
            <table class="table table-bordered">
                <thead>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Brand Badge</th>
                    <th>Discount Badge</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{!! Str::limit($product->description,30,'...') !!}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->brand_badge }}</td>
                        <td>{{ $product->discount_badge }}</td>
                        <td><img src="{{ asset('/storage/'.$product->image) }}" alt="" width="80px" height="90px"></td>
                        <td>
                            <a href="{{ route('products.edit',$product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('products.destroy',$product->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
 {{--   <div class="mt-2 pagination">
        {{ $products->onEachSide(1)->links() }}
    </div> --}}
@endsection