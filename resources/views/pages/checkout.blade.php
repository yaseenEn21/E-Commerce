@extends('layouts.componants.main')
@section('title','Amado - Checkout')

@section('contant')
    
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-title">
                        <h2>Checkout</h2>
                    </div>
                    @if (session()->has('success_message'))

                    <div class="alert alert-success"> {{session()->get('success_message')}}</div>
                    @elseif(session()->has('error_message'))
                    <div class="alert alert-danger"> {{session()->get('error_message')}}</div>

                @endif
                <form action="{{route('checkout.store')}}" id="payment-form" method="post">
                    @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <input type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName"  placeholder="First Name">
                                
                                @error('firstName')
                                <span  style="color: #dd4343" class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control   @error('lastName') is-invalid @enderror" name="lastName"  placeholder="Last Name">
                                @error('lastName')
                                <span  style="color: #dd4343" class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control   @error('phoneNumber') is-invalid @enderror" name="phoneNumber"  min="0" placeholder="Phone No"">
                                @error('phoneNumber')
                                <span  style="color: #dd4343" class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                            <div class="col-12 mb-3">
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{auth()->user()->email}}">
                            @error('email')
                            <span  style="color: #dd4343" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                            </div>
                            <div class="col-md-6 mb-3">
                            <input type="text" class="form-control  @error('city') is-invalid @enderror" name="city"  placeholder="City">
                                @error('city')
                                <span  style="color: #dd4343" class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control   @error('street') is-invalid @enderror" name="street"   placeholder="Street">
                                @error('street')
                                <span  style="color: #dd4343" class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                            <div class="col-12 mb-3">
                                <textarea name="comment" class="form-control w-100" cols="30" rows="10" placeholder="Leave a comment about your order"></textarea>
                            </div>
                            <div class="col-12">
                                <label for="card-element">
                                    Credit or debit card
                                  </label>
                                  <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                  </div>
                                </div>
                                          
                        </div>
                        <button type="submit" class="btn amado-btn w-100 mt-50">Send</button>

                    </form>
                </div>
            </div>
            <div class="col-12 col-lg-4">
              <div class="cart-summary">
                <h5>Cart Total</h5>
                <ul class="summary-table">
            
                    <li><span>subtotal:</span> <span>${{Cart::subtotal()}}</span></li>
                    <li><span>tax: ( {{config('cart.tax')}}% )</span> <span>${{Cart::tax()}}</span></li>
                    <li><span>delivery:</span> <span>Free</span></li>
                    <li><span>total:</span> <span>${{Cart::total()}}</span></li>
                    @if (session()->has('coupon'))
                    <hr>
                    <li><span>Code used :</span> <strong>{{session()->get('coupon')['name']}}</strong></li>
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
                            <input type="text"  name="couponCode" placeholder="Coupon code" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn" style="background-color:#fbb710; color:white">Apply</button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>                <div class="cart-btn mt-50">
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- ##### Main Content Wrapper End ##### -->
    @endsection
    <script src="https://js.stripe.com/v3"></script>
    <script>
    
        window.onload = function(){
        // Create a Stripe client.
        var stripe = Stripe('pk_test_Cr1UeXWyUdPxMoEW0Jhl6CGv00mTS1DZ6e');
        
        // Create an instance of Elements.
        var elements = stripe.elements();
        
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
          base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
              color: '#aab7c4'
            }
          },
          invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
          }
        };
        
        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});
        
        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');
        
        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
          var displayError = document.getElementById('card-errors');
          if (event.error) {
            displayError.textContent = event.error.message;
          } else {
            displayError.textContent = '';
          }
        });
        
        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
          event.preventDefault();
    
         // document.getElementById('complete-order').disabled = true;
        
          stripe.createToken(card).then(function(result) {
            if (result.error) {
              // Inform the user if there was an error.
              var errorElement = document.getElementById('card-errors');
              errorElement.textContent = result.error.message;
    
           //   document.getElementById('complete-order').disabled = false;
    
            } else {
              // Send the token to your server.
              stripeTokenHandler(result.token);
            }
          });
        });
        
        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
          // Insert the token ID into the form so it gets submitted to the server
          var form = document.getElementById('payment-form');
          var hiddenInput = document.createElement('input');
          hiddenInput.setAttribute('type', 'hidden');
          hiddenInput.setAttribute('name', 'stripeToken');
          hiddenInput.setAttribute('value', token.id);
          form.appendChild(hiddenInput);
        
          // Submit the form
          form.submit();
        }
            };

           
        </script>
