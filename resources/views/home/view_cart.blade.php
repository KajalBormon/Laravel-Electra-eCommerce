@include('home.header')

<div class="container view_cart">
    <div class="row">
        <div class="col-8">
            <table class="table">
                <thead>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                        $total_price = 0;    
                    ?>
                    @foreach($cart_items as $item)
                    <tr>
                        <td><img src="{{ asset('/storage/'.$item->product->image) }}" alt="" width="80px" height="90px"></td>
                        <td>{{ $item->product->title }}</td>
                        <td>${{ $item->product->price }}</td>
                        <td>
                            <a href="{{ route('product_delete',$item->id) }}" class="btn btn-sm btn-danger">Remove</a>
                        </td>
                    </tr>
                    <?php
                        $total_price = $total_price + $item->product->price;
                    ?>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="total_value">Total: ${{ $total_price }}</td>
                        <td>
                            <a href="{{ route('checkout') }}" class="btn btn-sm btn-primary">CheckOut</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@include('home.footer')