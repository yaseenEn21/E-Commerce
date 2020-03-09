@extends('layouts.componants.main')
@section('title','Amado - Shop')

@section('contant')
    
<div class="shop_sidebar_area">

  

    <!-- ##### Single Widget ##### -->
    <div class="widget catagory mb-50">
        <!-- Widget Title -->
        <h6 class="widget-title mb-30">Catagories</h6>

        <!--  Catagories  -->
        <div class="catagories-menu">
            <ul>
                @foreach ($categories as $item)
            <li class="{{request()->category == $item->slug ? 'active':''}}"><a href="{{route('shop.index',['category'=>$item->slug])}}">{{$item->name}}</a></li>
                @endforeach
               
            </ul>
        </div>
    </div>

    <!-- ##### Single Widget ##### -->
    <div class="widget brands mb-50">
        <!-- Widget Title -->
        <h6 class="widget-title mb-30">Brands</h6>

        <div class="widget-desc">
            <!-- Single Form Check -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="amado">
                <label class="form-check-label" for="amado">Amado</label>
            </div>
            <!-- Single Form Check -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="ikea">
                <label class="form-check-label" for="ikea">Ikea</label>
            </div>
            <!-- Single Form Check -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="furniture">
                <label class="form-check-label" for="furniture">Furniture Inc</label>
            </div>
            <!-- Single Form Check -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="factory">
                <label class="form-check-label" for="factory">The factory</label>
            </div>
            <!-- Single Form Check -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="artdeco">
                <label class="form-check-label" for="artdeco">Artdeco</label>
            </div>
        </div>
    </div>

    <!-- ##### Single Widget ##### -->
    <div class="widget color mb-50">
        <!-- Widget Title -->
        <h6 class="widget-title mb-30">Color</h6>

        <div class="widget-desc">
            <ul class="d-flex">
                <li><a href="#" class="color1"></a></li>
                <li><a href="#" class="color2"></a></li>
                <li><a href="#" class="color3"></a></li>
                <li><a href="#" class="color4"></a></li>
                <li><a href="#" class="color5"></a></li>
                <li><a href="#" class="color6"></a></li>
                <li><a href="#" class="color7"></a></li>
                <li><a href="#" class="color8"></a></li>
            </ul>
        </div>
    </div>

    <!-- ##### Single Widget ##### -->
    <div class="widget price mb-50">
        <!-- Widget Title -->
        <h6 class="widget-title mb-30">Price</h6>

        <div class="widget-desc">
            <div class="slider-range">
                <div data-min="10" data-max="1000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="10" data-value-max="1000" data-label-result="">
                    <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                </div>
                <div class="range-price">$10 - $1000</div>
            </div>
        </div>
    </div>
</div>

<div class="amado_product_area section-padding-100">

    <div class="container-fluid">

        <div class="row">


            <div class="col-12">

                <div class="product-topbar d-xl-flex align-items-end justify-content-between">

                    <!-- Total Products -->
                    <div class="total-products">
                        <div class="view d-flex">
                            <div class="aa-input-container" id="aa-input-container">
                                <input type="search" id="aa-search-input" class="aa-input-search" placeholder="Search" name="search" autocomplete="off" />
                                <svg class="aa-input-icon" viewBox="654 -372 1664 1664">
                                    <path d="M1806,332c0-123.3-43.8-228.8-131.5-316.5C1586.8-72.2,1481.3-116,1358-116s-228.8,43.8-316.5,131.5  C953.8,103.2,910,208.7,910,332s43.8,228.8,131.5,316.5C1129.2,736.2,1234.7,780,1358,780s228.8-43.8,316.5-131.5  C1762.2,560.8,1806,455.3,1806,332z M2318,1164c0,34.7-12.7,64.7-38,90s-55.3,38-90,38c-36,0-66-12.7-90-38l-343-342  c-119.3,82.7-252.3,124-399,124c-95.3,0-186.5-18.5-273.5-55.5s-162-87-225-150s-113-138-150-225S654,427.3,654,332  s18.5-186.5,55.5-273.5s87-162,150-225s138-113,225-150S1262.7-372,1358-372s186.5,18.5,273.5,55.5s162,87,225,150s113,138,150,225  S2062,236.7,2062,332c0,146.7-41.3,279.7-124,399l343,343C2305.7,1098.7,2318,1128.7,2318,1164z" />
                                </svg>
                            </div>                        </div>                        
                    </div>
                    <!-- Sorting -->
                    <div class="product-sorting d-flex">
                        <div class="sort-by-date d-flex align-items-center mr-15">
                            <p>Sort by</p>
                            <form action="#" method="get">
                                <select name="select" id="sortBydate">
                                    <option value="value">Newest</option>
                                    <option value="value">Popular</option>
                                </select>
                            </form>
                        </div>
                        <div class="view-product d-flex align-items-center">
                            <p>View</p>
                            <form action="#" method="get">
                                <select name="select" id="viewProduct">
                                    <option value="value">12</option>
                                    <option value="value">24</option>
                                    <option value="value">48</option>
                                    <option value="value">96</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
      
        <div class="row">
            @foreach ($products as $item)
                  <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                <div class="single-product-wrapper">
                    <!-- Product Image -->
                    <div class="product-img">
                        <img  src="{{$item->uploadImg($item->img)}}" alt="">
                        <!-- Hover Thumb -->
                        <img class="hover-img" src="{{$item->uploadImg($item->img)}}" alt="">
                    </div>

                    <!-- Product Description -->
                    <div class="product-description d-flex align-items-center justify-content-between">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                        <p class="product-price">{{$item->price}}</p>
                        <a href="{{ route( 'product.show' , $item->slug ) }}">

                                <h6>{{$item->name}}</h6>
                            </a>
                        </div>
                        <!-- Ratings & Cart -->
                        <div class="ratings-cart text-right">
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="cart">
                                <a href="cart.html" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/cart.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Single Product Area -->
          
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Pagination -->
                <nav aria-label="navigation">
                    {{$products->links()}}
                </nav>
            </div>
        </div>
    </div>
</div>
</div>
<!-- ##### Main Content Wrapper End ##### -->

    @endsection
    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@3/dist/algoliasearchLite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script>
        window.onload = function() {
        const client = algoliasearch("V7358JWHAQ", "2335ea2329fa36cef9a7fbd4d8679ab8");
        const index = client.initIndex('products');

autocomplete('#aa-search-input', {hint : false}, {
    
      source: autocomplete.sources.hits(index, { hitsPerPage: 3 }),
      displayKey: 'name',
      templates: {
        suggestion:function(suggestion){

            return '<span>'+
                suggestion._highlightResult.name.value + '</span><span>' +
                    suggestion.price+' $' + '</span>' ; 

        }
      }
    
}).on('autocomplete:selected',function(event,suggestion,dataset){
   window.location.href=window.location.origin +'/details/'+ suggestion.slug;
});

        }
    </script>