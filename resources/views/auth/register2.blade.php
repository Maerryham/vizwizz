@extends('layout.base')
@section('main-section')
    <section class="page_title ds s-parallax s-overlay s-py-65">
        <div class="s-blur"></div>
        <div class="container">
            <div class="row">


                <div class="col-md-12 text-center text-sm-left">
                    <h1>Account - Register</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('index_page')}}">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Account - Register
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

                                <form class="woocomerce-form woocommerce-form-login login" method="post" action="{{ route('register') }}">
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="username">First Name<span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" id="username"  value="{{ old('first_name') }}" placeholder="First Name">
                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="username">Last Name<span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" id="last_name"  value="{{ old('last_name') }}" placeholder="Last Name">
                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide" style="margin-bottom: 1.5em !important; order: 0 !important;">
                                        <label for="address">Address<span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="address" value="{{ old('address') }}" placeholder="Address">
                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="phone">Phone<span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Phone Number">
                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="username">Email address <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" value="{{ old('email') }}" placeholder="Email address">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="password5675">Password <span class="required">*</span>
                                        </label>
                                        <input class="woocommerce-Input woocommerce-Input--text input-text form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" id="password5675" placeholder="Password">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="password5675">Confirm Password <span class="required">*</span>
                                        </label>
                                        <input class="woocommerce-Input woocommerce-Input--text input-text form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" id="password-confirm"  class="form-control" name="password_confirmation" placeholder="Confirm Password">

                                    </p>
                                    <p class="form-row">
                                        <input type="submit" class="woocommerce-Button button" name="register" value="Sign up">
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
