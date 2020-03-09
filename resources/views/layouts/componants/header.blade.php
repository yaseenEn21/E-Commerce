

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.html"><img src="{{asset('img/core-img/logo.png')}}" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo" style="margin-bottom:50px;">
                <a href="index.html"><img src="{{asset('img/core-img/logo.png')}}" alt=""></a>
            </div>
            <!-- Amado Nav -->

                  @if(Auth::user())
                <a href="{{ route('profile.index')}}" style="font-size:20px;  text-transform: capitalize;"> {{ auth()->user()->name}}</a>
                    @endif</li>
            <br><br>
             <nav class="amado-nav">
                <ul>
                    
                    @guest
                    <li> <a href="{{route('login')}}">Login</a> </li>
                    <li> <a href="{{route('register')}}">Register</a> </li>
                   @else
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>
     
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                    </li>
                    @endguest

                    <li class="active"><a href="{{route('home.index')}}">Home</a></li>
                    <li><a href="{{route('shop.index')}}">Shop</a></li>
                     <li><a href="{{route('cart.index')}}">Cart-{{Cart::count()}}-</a></li>
                    <li><a href="{{route('checkout.index')}}">Checkout</a></li>
                </ul>
            </nav>
            <!-- Button Group 
            <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">%Discount%</a>
                <a href="#" class="btn amado-btn active">New this week</a>
            </div>
            -->
            <hr>
           
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="{{route('cart.index')}}" class="cart-nav"><img src="{{asset('img/core-img/cart.png')}}" alt=""> Cart <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="{{asset('img/core-img/favorites.png')}}" alt=""> Favourite</a>
                <a href="#" class="search-nav"><img src="{{asset('img/core-img/search.png')}}" alt=""> Search</a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
