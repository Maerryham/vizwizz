@extends('layout.base')
@section('main-section')

    <section class="page_title ds s-parallax s-overlay s-py-65">
    <div class="s-blur"></div>
    <div class="container">
        <div class="row">


            <div class="col-md-12 text-center text-sm-left">
                <h1>Shopping Checkout</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('index_page')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Shop</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Shopping Checkout
                    </li>
                </ol>
            </div>


        </div>
    </div>
</section>


<section class="ls s-py-xl-150 s-py-lg-130 s-py-md-90 s-py-60">
    <div class="container">
        <div class="row">


            <main class="col-lg-12">
                @guest
                <div class="woocommerce-info">Returning customer? <a href="#" class="showlogin">Click here to login</a>
                </div>
                <?php
                    session(['link' => Request::fullUrl()])
                ?>
                    <form class="woocomerce-form woocommerce-form-login login" method="POST" action="{{ route('login') }}" style="">
                        @csrf

                        <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer,
                            please proceed to the Billing &amp; Shipping section.</p>

                        <p class="form-row form-row-first">
                            <label for="username">Username or email <span class="required">*</span>
                            </label>
                            <input type="email" class="input-text" name="email" id="username" placeholder="Your Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </p>
                        <p class="form-row form-row-last">
                            <label for="password66">Password <span class="required">*</span>
                            </label>
                            <input class="input-text" type="password" name="password"  placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </p>
                        <div class="clear">

                        </div>


                        <p class="form-row">

                            <input type="submit" class="button" name="login" value="Login">
                            <label>
                                <input name="rememberme" type="checkbox" id="rememberme" value="forever">
                                <span>Remember me</span>
                            </label>
                        </p>
                        <p class="lost_password">
                            <a href="shop-account-password-reset.html">Lost your password?</a>
                        </p>

                        <div class="clear">

                        </div>


                    </form>

                @else
                @endguest
                @if (session('order_success'))
                    <div class="alert alert-success">
                        {{ session('order_success') }}
                    </div>
                @endif
                @if($cart && count($cart) > 0)
                    @if(session('order_error'))
                        <div class="alert alert-error">
                            {{ session('order_error') }}
                        </div>
                    @endif

                {{--<div class="woocommerce-info">Have a coupon? <a href="#" class="showcoupon">Click here to enter your code</a>--}}
                {{--</div>--}}

                {{--<form class="checkout_coupon" method="post" style="display: none;">--}}

                    {{--<p class="form-row form-row-first">--}}
                        {{--<input type="text" name="coupon_code" class="input-text" placeholder="Coupon code" id="coupon_code" value="">--}}
                    {{--</p>--}}

                    {{--<p class="form-row form-row-last">--}}
                        {{--<input type="submit" class="button" name="apply_coupon" value="Apply coupon">--}}
                    {{--</p>--}}

                    {{--<div class="clear">--}}

                    {{--</div>--}}
                {{--</form>--}}

                <form name="checkout" method="post" action="{{route('place_order')}}" class="checkout woocommerce-checkout place_order"  enctype="multipart/form-data" novalidate="novalidate">

                    @csrf
                    {{--<input type="text" class="input-text " name="reference" id="reference" placeholder="Last name" value="hgkbhnhllkghg" autocomplete="family-name">--}}
                    {{--<div class="woocommerce-NoticeGroup woocommerce-NoticeGroup-checkout">--}}
                        {{--<ul class="woocommerce-error">--}}
                            {{--<li><strong>Billing First name</strong> is a required field.</li>--}}
                            {{--<li><strong>Billing Last name</strong> is a required field.</li>--}}
                            {{--<li>Please enter a valid postcode / ZIP.</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}


                    <div class="col2-set" id="customer_details">
                        <div class="col-1">
                            <div class="woocommerce-billing-fields">

                                <h3>Billing details</h3>


                                <div class="woocommerce-billing-fields__field-wrapper">
                                    <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
                                        <label for="billing_first_name" class="">First name <abbr class="required" title="required">*</abbr>
                                        </label>
                                        @guest
                                           <input type="text" class="input-text " name="first_name" id="billing_first_name" placeholder="First name" value="" autocomplete="given-name" autofocus="autofocus" required="required">

                                        @else
                                            {{--<input type="text" class="input-text" name="first_name" id="billing_first_name" placeholder="{{ Auth::user()->name }}">--}}
                                            <input type="text" class="input-text " name="first_name" id="billing_first_name" placeholder="First name" value="{{ Auth::user()->first_name }}" autocomplete="given-name" autofocus="autofocus" required="required">
                                            <input type="hidden" placeholder="First name" value="{{ Auth::user()->id }}" required="required">
                                        @endguest

                                    </p>
                                    <p class="form-row form-row-last validate-required" id="billing_last_name_field" data-priority="20">
                                        <label for="billing_last_name" class="">Last name <abbr class="required" title="required">*</abbr>
                                        </label>
                                        @guest
                                        <input type="text" class="input-text " name="last_name" id="billing_last_name" placeholder="Last name" value="" autocomplete="family-name" required="required">
                                        @else
                                            <input type="text" class="input-text " name="last_name" id="billing_last_name" placeholder="Last name" value="{{ Auth::user()->last_name }}" autocomplete="family-name" required="required">
                                        @endguest
                                    </p>
                                    <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
                                        <label for="billing_address_1" class="">Street address <abbr class="required" title="required">*</abbr>
                                        </label>
                                        @guest
                                        <input type="text" class="input-text " name="address" id="billing_address_1" placeholder="House number and street name" value="" autocomplete="address-line1" required="required">
                                        @else
                                            <input type="text" class="input-text " name="address" id="billing_address_1" placeholder="House number and street name" value="{{ Auth::user()->address }}" autocomplete="address-line1" required="required">
                                        @endguest
                                    </p>
                                    <p class="form-row form-row-first validate-required validate-phone" id="billing_phone_field" data-priority="100">
                                        <label for="billing_phone" class="">Phone <abbr class="required" title="required">*</abbr>
                                        </label>
                                        @guest
                                        <input type="tel" class="input-text " name="phone" id="billing_phone" placeholder="Phone" value="" autocomplete="tel" required="required">
                                        @else
                                            <input type="tel" class="input-text " name="phone" id="billing_phone" placeholder="Phone" value="{{ Auth::user()->phone }}" autocomplete="tel" required="required">
                                        @endguest
                                    </p>
                                    <p class="form-row form-row-last validate-required validate-email" id="billing_email_field" data-priority="110">
                                        <label for="billing_email" class="">Email address <abbr class="required" title="required">*</abbr>
                                        </label>
                                        @guest
                                        <input type="email" class="input-text " name="email" id="billing_email" placeholder="Email address" value="" required="required">
                                        @else
                                        <input type="email" class="input-text " name="email" id="billing_email" placeholder="Email address" value="{{ Auth::user()->email }}" required="required">
                                        @endguest
                                    </p>
                                </div>

                            </div>

                        </div>

                        <div class="col-2">
                            <div class="woocommerce-shipping-fields">
                            </div>
                            <div class="woocommerce-additional-fields">
                                <h3>Additional information</h3>
                                <div class="woocommerce-additional-fields__field-wrapper">
                                    <p class="form-row notes" id="order_comments_field" data-priority="">
                                        <label for="order_comments" class="">Order notes</label>
                                        <textarea name="additional_information" class="input-text " id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
                                    </p>
                                </div>


                            </div>
                        </div>
                    </div>


                    <h3 id="order_review_heading">Your order</h3>


                    <div id="order_review" class="woocommerce-checkout-review-order">
                        @if(count($cart) > 0)
                        <table class="shop_table woocommerce-checkout-review-order-table">
                            <thead>
                            <tr>
                                <th class="product-name">Product</th>
                                <th class="product-total">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart as $item)
                            <tr class="cart_item">
                                <td class="product-name">
                                    {{$item['title']}}&nbsp; <strong class="product-quantity">× {{$item['qty']}}</strong>
                                </td>
                                <td class="product-total">
													<span class="woocommerce-Price-amount amount">
														<span class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format($item['total'])}}</span>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>

                            <tr class="cart-subtotal">
                                <th>Subtotal</th>
                                <td>
													<span class="woocommerce-Price-amount amount">
														<span class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format($subtotal)}}</span>
                                </td>
                            </tr>
                            <tr class="cart-subtotal">
                                <th>Delivery Fee <br><span style="font-size: 12px">(within Lagos only)</span></th>
                                <td>
													<span class="woocommerce-Price-amount amount">
														<span class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format($delivery_fee)}}</span>
                                </td>
                            </tr>


                            <tr class="order-total">
                                <th>Total</th>
                                <td>
                                    <strong>
                        <span class="woocommerce-Price-amount amount">
                            <span
                                class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format($total)}}</span>
                                    </strong>
                                </td>
                            </tr>


                            </tfoot>
                        </table>

                        <div id="payment" class="woocommerce-checkout-payment">
                            <ul class="wc_payment_methods payment_methods methods">
                                <li class="wc_payment_method payment_method_cheque">
                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cheque" checked="checked" data-order_button_text="">

                                    <label for="payment_method_cheque">
                                        Online Payment (Paystack)</label>
                                    <div class="payment_box payment_method_cheque" style="display: none;">
                                        <p>Paystack</p>
                                    </div>
                                </li>

                            </ul>
                            <div class="form-row place-order">
                                <input name="subtotal" type="hidden" value="{{$subtotal}}"/>
                                <input name="delivery_fee" type="hidden" value="{{$delivery_fee}}"/>
                                <input name="total" type="hidden" value="{{$total}}"/>



                                <input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">

                            </div>
                        </div>
                        @else
                            <p>No item in your Cart</p>
                        @endif
                    </div>


                </form>

                @endif
            </main>


        </div>

    </div>
</section>
@endsection



@section('script-section')
    {{--Test url--}}
    {{--<script src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>--}}
    {{--Live url--}}
    <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        const donation_form = $('.place_order');
        const anonymous_input = $('#anonymous');


        function generateRef1(){
            return Math.floor(Math.random() * (2000000 - 1000) + 100);
        }

        function generateRef(length) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }


        function payWithRave(data) {

            const API_publicKey = "{{env('RAVE_PUBLIC_KEY')}}";

            var x = getpaidSetup({
                PBFPubKey: API_publicKey,
                customer_email: data.email,
                amount: data.total,
                customer_phone: data.phone,
                currency: "NGN",
                txref: data.reference,
                meta: [{
                    metaname: "Payment From Vizwizz",
                    metavalue: "AP1234"
                }],
                onclose: function() {},
                callback: function(response) {
                    var txref = response.tx.txRef; // collect txRef returned and pass to a server page to complete status check.
                    console.log("This is the response returned after a charge", response);
                    if (
                        response.tx.chargeResponseCode == "00" ||
                        response.tx.chargeResponseCode == "0"
                    ) {
                        // redirect to a success page
                        window.location.assign("/payment/confirmation/"+ response.tx.txRef);
                        //send response to db again with transaction reference and price on columns separated
                    } else {
                        // redirect to a failure page.
                        window.location.assign("/payment/failed/"+ response.tx.txRef);
                    }

                    x.close(); // use this to close the modal immediately after payment.
                }
            });
        }

        function placeOrder(data){
            $.ajax({
                url: "{{ route('place_order')}}",
                method:'POST',
                data: data,
                success: function (response){
                    if(response.status){
                        payWithRave(response.data);
                    }
                },
                error: function (response){
                    console.log(response);

                }
            })
        }

        donation_form.on('submit', function (e) {
            e.preventDefault();
            // e.preventDefault(); begins
            var $form = $(this);
            $($form).find('.contact-form-respond').remove();

            //checking on empty values
            $($form).find('[aria-required="true"], [required]').each(function (index) {
                var $thisRequired = $(this);
                if (!$thisRequired.val().length) {
                    $thisRequired
                        .addClass('invalid')
                        .on('focus', function () {
                            $thisRequired
                                .removeClass('invalid');
                        });
                }
            });
            //if one of form fields is empty - exit
            if ($form.find('[aria-required="true"], [required]').hasClass('invalid')) {
                $($form).find('[type="submit"]').attr('disabled', false).blur().parent().append('<div class="contact-form-respond color-main mt-100" style="color:red">Please ensure all fields are not empty</div>');
                woocommerce-error
                return;
            } //after

            var data = $(this).serialize();
            data += '&reference=' + generateRef1();
            placeOrder(data);
        });


    </script>
    <script>
        $(document).ready(function() {
            $("#choose").on("change", function() {
                if ($(this).val() === "other") {
                    $("#others").show();
                }
                else {
                    $("#others").hide();
                }
            });
        });
    </script>
@endsection()


