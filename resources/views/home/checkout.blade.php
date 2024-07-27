@include('home.header')

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="heading">
                    <h3 class="text-center mb-3">Checkout Your Process</h3>
                </div>
               <div class="checkout">
                @if(session('status'))
                <div>
                    <p class="text-success">{{ session('status') }}</p>
                </div>
                @endif
                  <form action="{{ route('order') }}" method="post">
                    @csrf
                    <div>
                        <label>Your Name</label>
                        <input type="text" placeholder="Your Name" class="form-control" id="" value="{{ Auth::user()->name }}" name="customer_name">
                    </div>
                    <div class="margin">
                        <label>Your Email</label>
                        <input type="email" placeholder="Your Email" name="email" id="" class="form-control" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="margin">
                        <label>Your Number</label>
                        <input type="number" placeholder="Your Number" name="number" id="" class="form-control" value="{{ Auth::user()->phone }}">
                    </div>
                    <div class="margin">
                        <label>Your Receiving Address</label>
                        <textarea name="address" class="form-control" id="" cols="30" rows="5">{{ Auth::user()->address }}</textarea>
                    </div>
                    <div class="margin">
                        <button type="submit" class="btn btn-primary">Cash On Delivery</button>
                        <a href="" class="btn btn-success">Pay On Stripe</a>
                    </div>
                  </form>
               </div>

            </div>
        </div>
    </div>

@include('home.footer')