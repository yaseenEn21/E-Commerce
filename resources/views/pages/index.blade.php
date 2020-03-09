@extends('layouts.componants.main')
@section('title','Amado - Home')

@section('contant')
    
        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">

                @foreach ($categories as $item)
                
                     <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{route('shop.index',['category'=>$item->slug])}}">
                       <img src="img/bg-img/2.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From $180</p>
                            <h4>{{$item->name}}</h4>
                        </div>
                    </a>
                </div>
                @endforeach
               

      
            </div>
        </div>
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
    @endsection
    @section('news-footer')
        @includeIf('layouts.componants.footer.news-footer')
    @endsection
