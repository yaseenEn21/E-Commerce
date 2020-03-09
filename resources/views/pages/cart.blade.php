@extends('layouts.componants.main')
@section('title','Amado - Cart')

@section('contant')
    

<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="cart-title mt-50">
                    <h2>Shopping Cart</h2>
                </div>
                <div>
                    @if (session()->has('success_message'))

                    <div class="alert alert-success"> {{session()->get('success_message')}}</div>
                         
                @endif
                </div>
                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $item)
                                
                            <tr>
                                <td class="cart_product_img">
                                    <a href="#"><img src="img/bg-img/cart1.jpg" alt="Product"></a>
                                </td>
                                <td class="cart_product_desc">
                                    <h5>{{$item->name}}r</h5>
                                </td>
                                <td class="price">
                                    <span>${{$item->price}}</span>
                                </td>
                                <td class="qty">
                                    <div class="qty-btn d-flex">
                                        <div class="quantity">
                                        <form action="{{route('cart.delete',$item->rowId)}}" method="POST">
                                            @csrf
                                            {{method_field('delete')}}
                                        <button type="submit">delete</button>
                                        </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
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
                    </ul>
                    <div>
                   
                    </div>
                </div>               <div class="cart-btn mt-50">
                <a href="{{route('checkout.index')}}" class="btn amado-btn w-100">Checkout</a>
            </div>
            </div>
            
        </div>
    </div>
</div>
</div>
<!-- ##### Main Content Wrapper End ##### -->


    @endsection
    