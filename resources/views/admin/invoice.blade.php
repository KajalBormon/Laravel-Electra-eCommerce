<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css')}}">
    <style>

        .pdf-heading{
            margin-top: 50px;
            text-align: center;
        }
        .pdf-product-invoice{
            display: flex;
            justify-content: center;
        }
        .pdf-product-invoice img{
            height: auto !important;
            width: 80px !important;
        }
        .table th,td{
            color: black;
        }
    </style>
    <title>Invoice</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pdf-heading">
                    <h3>Electra eCommerce Shop</h3>
                    <p>809, Business Road, Dhaka</p>
                    <p>Email: info@electra.com</p>
                </div>
                
                <div class="pdf-product-invoice">
                    <table class="table table-bordered">
                        <thead>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Price</th>
                            <th>Image</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $data->customer_name }}</td>
                                <td>{{ $data->product->title }}</td>
                                <td>{{ $data->receving_add }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>${{ $data->product->price }}</td>
                                <td><img src="{{ public_path('/storage/'.$data->product->image) }}" height="500px" width="400px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>