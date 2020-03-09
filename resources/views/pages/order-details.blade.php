@extends('layouts.componants.main')
@section('title')
@if(Auth::user())
   {{ auth()->user()->name}} - profile

@endif
@endsection

@section('contant')


<div style="padding-top:60px"class="col-lg-8 push-lg-4">
    @if (session()->has('sucsses_message'))
    <div class="alert alert-success"> {{session()->get('sucsses_message')}} </div>
@endif   

    <ul class="nav nav-tabs">

        <li class="nav-item">
        <a href="{{route('profile.index')}}" class="nav-link">Edit</a>
        </li>
        <li class="nav-item">
            <a href="{{route('order.index')}}" class="nav-link">Orders</a>
        </li>
         <li class="nav-item">
            <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Details</a>
        </li>
    </ul>
    <div  style="padding-top:20px" class="tab-content p-b-3">
        <div class="tab-pane active" id="profile">
        <h4 class="m-y-2">Details For Order : {{$order->id}}</h4>
        <p><span>Tax : {{config('cart.tax')}}%</span></p>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Product</th>
                            <th scope="col">Quntity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <th scope="row">Image Here.</th>
                                <th scope="row">{{$product->name}}</th>
                                <th scope="row">1</th>
                            <th scope="row">${{$product->price}}</th>
                            <th scope="row">{{$product->created_at->toDateString()}}</th>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
                 
            </div>

            <!--/row-->
        </div>
        <div class="tab-pane active" id="profile">


            <!--/row-->
        </div>
        
        <div class="tab-pane " id="edit">
    
                    
         
        </div>
    </div>
</div>
<hr>

</div>
    @endsection
    @section('news-footer')
        @includeIf('layouts.componants.footer.news-footer')
    @endsection
