@extends('admin.index')

@section('container')
    <h3 class="text-center text-light">All Orders</h3>
    <div class="search">
        <div class="col-4">
            <form action="" method="POST">
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
        <div class="col-md-10">
            <table class="table table-bordered">
                <thead>
                    <th>Customer Name</th>
                    <th>Product Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Change Status</th>
                    <th>Pdf</th>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->product->title }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->receving_add }}</td>
                        <td><img src="{{ asset('/storage/'.$order->product->image) }}" alt="" width="80px" height="100px"></td>
                        <td>
                            @if($order->status=='In Progress')
                            <span class="text-danger">{{ $order->status }}</span>
                            @elseif($order->status=='on the way')
                            <span class="text-warning">{{ $order->status }}</span>
                            @elseif($order->status=='Delivered')
                            <span class="text-success">{{ $order->status }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('on_the_way',$order->id) }}" class="btn btn-sm btn-danger">On the Way</a>
                            <br>
                            <a href="{{ route('delivered',$order->id) }}" class="btn btn-sm btn-success mt-1">Delivered</a>
                        </td>
                        <td><a href="{{ route('pdf',$order->id) }}" class="btn btn-light">Pdf</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
 {{--    <div class="mt-2 paginate">
        {{ $orders->links() }}
    </div> --}}
@endsection