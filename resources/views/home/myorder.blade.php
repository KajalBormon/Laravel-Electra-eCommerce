@include('home.header')

    <div class="container view_cart">
        <div class="row">
            <div class="col-8">
                <table class="table">
                    <thead>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        <?php
                            $total_price = 0;    
                        ?>
                        @foreach($orders as $order)
                        <tr>
                            <td><img src="{{ asset('/storage/'.$order->product->image) }}" alt="" width="80px" height="90px"></td>
                            <td>{{ $order->product->title }}</td>
                            <td>${{ $order->product->price }}</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                        <?php
                            $total_price = $total_price + $order->product->price;
                        ?>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="total_value">Total: ${{ $total_price }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
         
        </div>
    </div>

@include('home.footer')