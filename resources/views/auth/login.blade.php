@extends('layout.base')
@section('main-section')
    <section class="page_title ds s-parallax s-overlay s-py-65">
        <div class="s-blur"></div>
        <div class="container">
            <div class="row">


                <div class="col-md-12 text-center text-sm-left">
                    <h1>Account - Login</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('login')}}">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Account - Login
                        </li>
                    </ol>
                </div>


            </div>
        </div>
    </section>


    <section class="ls s-py-xl-150 s-py-lg-120 s-py-md-80 s-py-50">
        <div class="container">
            <div class="row">


                <main class="col-lg-12">
                    <article>
                        <!-- .entry-header -->
                        <div class="entry-content">
                            <div class="woocommerce">

                                <!--
    <div class="woocommerce-message">Are you sure you want to log out? <a
        href="shop-account-login.html">Confirm and log out</a>
    </div>
    -->

                                <form class="woocomerce-form woocommerce-form-login login" method="post" action="{{route('login')}}">
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="username">Email address <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="username" value="" placeholder="Email address">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="password5675">Password <span class="required">*</span>
                                        </label>
                                        <input class="woocommerce-Input woocommerce-Input--text input-text form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="password" name="password" id="password5675" placeholder="Password">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </p>

                                    <p class="form-row">
                                        <input type="submit" class="woocommerce-Button button" name="login" value="Login">
                                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                                            <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever">
                                            <span>Remember me</span>
                                        </label>
                                    </p>
                                    <p class="woocommerce-LostPassword lost_password">
                                        <a href="shop-account-password-reset.html">Lost your password?</a>
                                    </p>
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <!-- .entry-content -->
                    </article>


                </main>


            </div>

        </div>
    </section>


@endsection
