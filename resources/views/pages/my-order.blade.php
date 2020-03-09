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
            <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Orders</a>
        </li>
    </ul>
    <div  style="padding-top:20px" class="tab-content p-b-3">
        <div class="tab-pane active" id="profile">
           
            </div>
        <h4 class="m-y-2">Orders : {{$orders->count()}}</h4>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">Total price</th>
                            <th scope="col">Date</th>
                            <th scope="col">Details</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                            <th scope="row">{{$order->id}}</th>
                            <th scope="row">${{$order->billing_total}}</th>
                            <th scope="row">{{$order->created_at->toDateString()}}</th>
                            <th scope="row"><a href="{{route('order.show',$order->id)}}" type="button">Details</a></th>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
                 
            </div>

            <!--/row-->
        </div>
        
        <div class="tab-pane " id="edit">   </div>
    </div>
</div>
<hr>

</div>
    @endsection
    @section('news-footer')
        @includeIf('layouts.componants.footer.news-footer')
    @endsection
