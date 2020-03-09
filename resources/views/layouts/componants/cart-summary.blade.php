<div class="cart-summary">
    <h5>Cart Total</h5>
    <ul class="summary-table">
      <li><span>Coupon code :</span> <strong>{{session()->get('coupon')['name']}}</strong></li>

        <li><span>subtotal:</span> <span>${{Cart::subtotal()}}</span></li>
        <li><span>tax: ( {{config('cart.tax')}}% )</span> <span>${{Cart::tax()}}</span></li>
        <li><span>delivery:</span> <span>Free</span></li>
        <li><span>total:</span> <span>${{Cart::total()}}</span></li>
        @if (session()->has('coupon'))
        <hr>
        <li><span>discount :</span> <span>${{session()->get('coupon')['discount']}}</span></li>
        <li><span>new total :</span> <span>${{$newTotal}}</span></li>

        @endif
    </ul>
    <div>
      @if (! session()->has('coupon'))
    <form action="{{route('coupon')}}" method="POST">
        @csrf
            <div class="row">
                <div class="col-md-8">
                <input type="text"  name="couponCode" placeholder="Coupon code" class="form-control" value="{{old('couponCode')}}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn" style="background-color:#fbb710; color:white">Apply</button>
                </div>
            </div>
        </form>
        @endif
    </div>
</div>