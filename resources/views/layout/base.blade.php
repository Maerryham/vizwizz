<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>VIZWIZZ</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Mega  -->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animations.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome5.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontello.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" >
    <link rel="stylesheet" href="{{asset('css/shop.css')}}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png')}}">


    @yield('style-section')

</head>

<body>


<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="widget widget_search">
        <form method="get" class="searchform search-form" action="http://webdesign-finder.com/">
            <div class="form-group">
                <input type="text" value="" name="search" class="form-control" placeholder="Search keyword" id="modal-search-input">
            </div>
            <button type="submit" class="btn">Search</button>
        </form>
    </div>
</div>
<div id="team-form" class="ds modal">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="header title">
                            <h4>Contact Me</h4>
                            <p>Have You any Questions? Ask Me!</p>
                        </div>

                    </div>
                    <a href="javascript:void(0)" data-dismiss="modal" aria-label="Close" class="remove">×</a>
                </div>
                <form class="contact-form c-mb-25 c-gutter-20" method="post" action="http://webdesign-finder.com/">


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-placeholder">
                                <label for="name3">Full Name <span class="required">*</span></label>

                                <input type="text" aria-required="true" size="30" value="" name="name" id="name3" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group has-placeholder">
                                <label for="email3">Email address<span class="required">*</span></label>

                                <input type="email" aria-required="true" size="30" value="" name="email3" id="email3" class="form-control" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-placeholder">
                                <label for="message3">Message</label>
                                <textarea aria-required="true" rows="6" cols="45" name="message" id="message3" class="form-control" placeholder="Message"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <input class="btn btn-maincolor" type="submit" value="Send Message">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>


    </div>


</div>
<div id="login-form" class="ls modal c-gutter-0">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="container">
        <div class="row">
            <div class="col-md-6 ds column-overlay">
                <img src="images/signup.jpg" alt="">
            </div>
            <div class="col-md-6 ls">
                <div class="divider-65 hidden-below-md"></div>
                <div class="divider-60 hidden-above-md"></div>
                <h4 class="special-heading text-center text-capitalize">Sign Up</h4>

                <form class="contact-form c-mb-30 c-gutter-20" method="post" action="http://webdesign-finder.com/">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-placeholder">
                                <label for="name">Full Name <span class="required">*</span></label>

                                <input type="text" aria-required="true" size="30" value="" name="name" id="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group has-placeholder">
                                <label for="email">Email address<span class="required">*</span></label>

                                <input type="email" aria-required="true" size="30" value="" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group has-placeholder">
                                <label for="password">Password<span class="required">*</span></label>

                                <input type="password" aria-required="true" size="30" value="" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">

                                <input type="checkbox" id="agree" name="agree" checked>
                                <label for="agree">I agree with all the text in the agreement</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <a href="#" class="btn btn-with-border sign-in">I am already Member</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <input class="btn btn-maincolor" type="submit" value="Learn more">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div id="login-form2" class="ls modal c-gutter-0">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ds column-overlay">
                <img src="images/signup.jpg" alt="">
            </div>
            <div class="col-md-6 align-items-center d-flex flex-column justify-content-center ls">
                <div class="divider-65 hidden-below-md"></div>
                <div class="divider-60 hidden-above-md"></div>
                <h4 class="special-heading text-center text-capitalize">Sign in</h4>

                <form class="contact-form c-mb-30 c-gutter-20" method="post" action="http://webdesign-finder.com/">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-placeholder">
                                <label for="name2">Full Name <span class="required">*</span></label>

                                <input type="text" aria-required="true" size="30" value="" name="name" id="name2" class="form-control" placeholder="Name">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group has-placeholder">
                                <label for="password2">Password<span class="required">*</span></label>

                                <input type="password" aria-required="true" size="30" value="" name="password2" id="password2" class="form-control" placeholder="Password">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="#" class="btn btn-with-border">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <input class="btn btn-maincolor" type="submit" value="Learn more">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


{{--<div id="years" class="ls s-py-md-70 s-py-60 years modal text-center">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-12">--}}
                {{--<h4 class="special-heading text-center">Are you over 21 years old?</h4>--}}
                {{--<div class="divider-70 hidden-below-md"></div>--}}
                {{--<div class="divider-30 hidden-above-md"></div>--}}
                {{--<div class="years-btn">--}}
                    {{--<a href="#" class="btn btn-maincolor2 btn-yes">Yes</a>--}}
                    {{--<a href="index.html" class="btn btn-maincolor btn-no">no</a>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}


<!-- Unyson messages modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
    <div class="fw-messages-wrap ls p-normal">
        <!-- Uncomment this UL with LI to show messages in modal popup to your user: -->
        <!--
    <ul class="list-unstyled">
        <li>Message To User</li>
    </ul>
    -->

    </div>
</div><!-- eof .modal -->

<!-- wrappers for visual page editor and boxed version of template -->
<div id="canvas">
    <div id="box_wrapper">

        <!-- template sections -->

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
                        {{--<div class="login-modal">--}}
                            {{--<a class="login-form-btn" href="#"><i class="fa fa-user"></i></a>--}}
                        {{--</div>--}}

                        <!--user action-->
                        <div class="dropdown widget_search">
                            <a class="dropdown-toggle dropdown-toggle-split" href="#" id="headerSearchDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-search"></i>
                            </a>

                            <div class="dropdown-menu ls ms " aria-labelledby="headerSearchDropdown">
                                <form role="search" method="get" class="search-form" action="http://webdesign-finder.com/">
                                    <label for="search-form-top">
                                        <span class="screen-reader-text">Search for:</span>
                                    </label>
                                    <input type="search" id="search-form-top" class="search-field" placeholder="Search keyword" value="" name="search">
                                    <button type="submit" class="search-submit">
                                        <span class="screen-reader-text">Search</span>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown shopping-cart">
                            <a class="dropdown-toggle dropdown-shopping-cart" href="#" role="button" id="dropdown-shopping-cart" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-shopping-bag"></i>

                                <span id="counter" class="badge bg-maincolor2">
                                @if(count($cart) > 0)
                                        {{count($cart)}}
                                @endif
                                </span>

                            </a>
                            <div class="dropdown-menu ls" aria-labelledby="dropdown-shopping-cart">
                                <div class="widget woocommerce widget_shopping_cart">


                                    <div class="widget_shopping_cart_content">
                                        {{--@if(count($cart) > 0)--}}
                                        {{--<ul class="woocommerce-mini-cart cart_list product_list_widget ">--}}
                                            {{--@foreach($cart as $item)--}}
                                            {{--<li class="woocommerce-mini-cart-item mini_cart_item">--}}
                                                {{--<a href="{{ route('remove_item', $item['id'])}}" class="remove" aria-label="Remove this item" data-product_id="{{$item['id']}}" data-product_sku="">×</a>--}}
                                                {{--<a href="shop-product-right.html">--}}
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

                                        <p class="woocommerce-mini-cart__total total">
                                            <strong>Subtotal:</strong>
                                            <span class="woocommerce-Price-amount amount">
													<span class="woocommerce-Price-currencySymbol">$</span>
													27.00
												</span>
                                        </p>

                                        <p class="woocommerce-mini-cart__buttons buttons">
                                            <a href="{{route('shopping-cart')}}" class="button wc-forward">View cart</a>
                                            <a href="{{route('shop-checkout')}}" class="button checkout wc-forward">Checkout</a>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--eof topline-->


        @include('component.header')
        @yield('main-section')
        @include('component.footer')

        <section class="page_copyright ds ms s-py-15 s-bordertop">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-md-12 text-center">
                        <p>&copy; Copyright <span class="copyright_year">2019</span> All Rights Reserved</p>
                    </div>

                </div>
            </div>
        </section>


    </div><!-- eof #box_wrapper -->
</div><!-- eof #canvas -->

@yield('jquery')
<script src="{{asset('js/vendor/modernizr-2.6.2.min.js')}}"></script>



<script src="{{asset('js/compressed.js')}}"></script>
{{--<script src="{{asset('js/jquery.min.js')}}"></script>--}}

{{--<script src="{{asset('js/main.js')}}"></script>--}}
<script src="{{asset('js/cart.js')}}"></script>

{{--<script src="{{asset('js/switcher.js')}}"></script>--}}

@yield('script-section')

</body>

</html>
