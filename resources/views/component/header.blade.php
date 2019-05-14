<?php
?>
<!--topline section visible only on small screens|-->

<section class="page_topline topline-1 ls s-borderbottom py-9">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12 text-md-left text-center ">
                <span class="social-icons">
                    <a href="#" class="fab fab fa-facebook-f " title="facebook"></a>
                    <a href="#" class="fab fa-telegram-plane " title="telegram"></a>
                    <a href="#" class="fab fa-linkedin-in " title="linkedin"></a>
                    <a href="#" class="fab fa-instagram " title="instagram"></a>
                    <a href="#" class="fab fa-youtube " title="youtube"></a>
                </span>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12 d-flex justify-content-md-end justify-content-center align-items-center">
                @guest
                    <div class="login-modal">
                        <a class="login-form-btn"  href="{{route('login')}}"><i class="fa fa-user"></i></a>
                    </div>

                @else
                    <div class="dropdown-toggle login-modal">
                        <a class="login-form-btn1" data-toggle="dropdown" id="headerLogout" href="#" aria-haspopup="true" aria-expanded="false">
                            Hi, {{Auth::user()->first_name}} <i class="fa fa-user" style="color:#00929E"></i>
                        </a>
                    </div>

                    <div class="dropdown-menu ls ms " aria-labelledby="headerLogout">

                        <a class="btn btn-info" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                    <style>
                        .dropdown-toggle::after {
                            content: none;
                        }
                    </style>
            @endguest

            <!--user action-->
                {{--<div class="dropdown widget_search">--}}
                    {{--<a class="dropdown-toggle dropdown-toggle-split" href="#" id="headerSearchDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                        {{--<i class="fa fa-search"></i>--}}
                    {{--</a>--}}

                    {{--<div class="dropdown-menu ls ms " aria-labelledby="headerSearchDropdown">--}}
                        {{--<form role="search" method="get" class="search-form" action="search">--}}
                            {{--<label for="search-form-top">--}}
                                {{--<span class="screen-reader-text">Search for:</span>--}}
                            {{--</label>--}}
                            {{--<input type="search" id="search-form-top" class="search-field" placeholder="Search keyword" value="" name="search">--}}
                            {{--<button type="submit" class="search-submit">--}}
                                {{--<span class="screen-reader-text">Search</span>--}}
                            {{--</button>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}


            </div>
        </div>
    </div>
</section>
<!--eof topline-->


<header class="page_header header-1 ls s-py-20 " data-toggle="affix">

    <div class="container">

        <div class="row ">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-8 col-12">
                <a href="{{route('index_page')}}" class="logo">
                    <img src="images/vizwizzlogo.png" alt="">

                </a>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-4 col-12 d-flex align-items-center justify-content-end ">
                <!-- main nav start -->
                <nav class="top-nav">
                    <ul class="nav sf-menu">


                        <li class="<?php if($page !='' && $page == 'home'){ echo 'active';}else{ echo '';} ?>">
                            <a href="{{route('index_page')}}">Home</a>
                        </li>
                        <li class="<?php if($page !='' && $page == 'tobacco'){ echo 'active';}else{ echo '';} ?>">
                            <a href="{{route('tobacco')}}">Tobacco</a>
                        </li>
                        <li class="<?php if($page !='' && $page == 'shisha_pots'){ echo 'active';}else{ echo '';} ?>">
                            <a href="{{route('shisha_pots')}}">Shisha Pots</a>
                        </li>
                        <li class="<?php if($page !='' && $page == 'group_bookings'){ echo 'active';}else{ echo '';} ?>">
                            <a href="{{route('group_bookings')}}">Group Bookings</a>
                        </li>
                        <!-- contacts -->
                        <li>
                        <div class="dropdown shopping-cart">
                            <a class="dropdown-toggle dropdown-shopping-cart" href="#" role="button" id="dropdown-shopping-cart" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-shopping-cart"></i>

                                <span id="counter" class="badge bg-maincolor2">
                                @if($cart && count($cart) > 0)
                                        {{count($cart)}}
                                    @endif
                                </span>

                            </a>
                            <div class="dropdown-menu ls " aria-labelledby="dropdown-shopping-cart" >

                                <a href="{{route('shopping-cart')}}" class="button wc-forward">View cart</a>

                            </div>

                            {{--<div class="dropdown-menu" aria-labelledby="dropdown-shopping-cart">--}}
                            {{--<div class="widget woocommerce widget_shopping_cart">--}}


                            {{--<div class="widget_shopping_cart_content">--}}
                            {{--@if($cart && count($cart) > 0)--}}
                            {{--<ul class="woocommerce-mini-cart cart_list product_list_widget ">--}}
                            {{--@foreach($cart as $item)--}}
                            {{--<li class="woocommerce-mini-cart-item mini_cart_item">--}}
                            {{--<a href="{{ route('remove_item', $item['id'])}}" class="remove" aria-label="Remove this item" data-product_id="{{$item['id']}}" data-product_sku="">×</a>--}}
                            {{--<a href="#">--}}
                            {{--<img src="images/shop/{{ $item['image_link']}}" alt="">{{ $item['title']}}--}}
                            {{--</a>--}}

                            {{--<span class="quantity">1 ×--}}
                            {{--<span class="woocommerce-Price-amount amount">--}}
                            {{--<span class="woocommerce-Price-currencySymbol">&#8358;</span>--}}
                            {{--{{ number_format($item['price'])}}--}}
                            {{--</span>--}}
                            {{--</span>--}}
                            {{--</li>--}}
                            {{--@endforeach--}}

                            {{--</ul>--}}
                            {{--@endif--}}

                            {{--<p class="woocommerce-mini-cart__total total">--}}
                            {{--<strong>Subtotal:</strong>--}}
                            {{--<span class="woocommerce-Price-amount amount">--}}
                            {{--<span class="woocommerce-Price-currencySymbol">&#8358;</span>--}}
                            {{--27.00--}}
                            {{--</span>--}}
                            {{--</p>--}}

                            {{--<p class="woocommerce-mini-cart__buttons buttons">--}}
                            {{--<a href="{{route('shopping-cart')}}" class="button wc-forward">View cart</a>--}}
                            {{--<a href="{{route('shop-checkout')}}" class="button checkout wc-forward">Checkout</a>--}}
                            {{--</p>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--</div>--}}
                        </div>
                        </li>


                    </ul>



                </nav>
                <!-- eof main nav -->
            </div>

        </div>

    </div>
    <!-- header toggler -->
    <span class="toggle_menu"><span></span></span>
</header>

<div class="info-box">

</div>
