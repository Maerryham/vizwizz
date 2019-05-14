<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{$title}} | Vizwizz.com </title>
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
    <button type="button"  id="btnClose" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="container">
        <div class="row">
            <div class="col-md-6 ds column-overlay">
                <img src="images/signup.jpg" alt="">
            </div>
            <div class="col-md-6 align-items-center d-flex flex-column justify-content-center ls">
                <div class="divider-65 hidden-below-md"></div>
                <div class="divider-60 hidden-above-md"></div>
                <h4 class="special-heading text-center text-capitalize">Sign in</h4>

                <form class="contact-form c-mb-30 c-gutter-20" method="post" action="{{ route('login') }}">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-placeholder">
                                <label for="name2">Email <span class="required">*</span></label>

                                <input type="email" aria-required="true" size="30" name="email" id="name2" class="form-control" placeholder="Email">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group has-placeholder">
                                <label for="password2">Password<span class="required">*</span></label>

                                <input type="password" aria-required="true" size="30" value="" name="password" id="password2" class="form-control" placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <input class="btn btn-maincolor" type="submit" value="Sign In">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{ route('password.request') }}" class="btn btn-with-border">Forgot Password?</a>
                        </div>
                        <div class="divider-65 hidden-below-md"></div>

                        <div class="col-sm-12">
                            New Member? <a href="{{route('register')}}" class="btn btn-with-border">Sign up</a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>


<!-- wrappers for visual page editor and boxed version of template -->
<div id="canvas">
    <div id="box_wrapper">

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

<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/cart.js')}}"></script>

{{--<script src="{{asset('js/switcher.js')}}"></script>--}}

@yield('script-section')
<script>


</script>

</body>

</html>
