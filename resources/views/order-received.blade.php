@extends('layout.base')
@section('main-section')
    <section class="page_title ds s-parallax s-overlay s-py-65">
        <div class="s-blur"></div>
        <div class="container">
            <div class="row">


                <div class="col-md-12 text-center text-sm-left">
                    <h1>Account Details</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('index_page')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Shop</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Order Received
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
                    <article id="post-1707" class="post-1707 page type-page status-publish hentry">
                        <header class="entry-header">
                            <h1 class="entry-title">Order received</h1>
                            {{--<span class="edit-link">--}}
										{{--<a class="post-edit-link" href="#">Edit--}}
											{{--<span class="screen-reader-text"> "Checkout"--}}
											{{--</span>--}}
										{{--</a>--}}
									{{--</span>--}}
                        </header>
                        <!-- .entry-header -->
                        <div class="entry-content">
                            <div class="woocommerce">
                                <div class="woocommerce-order" id="message">
                                    @if(Session::has('message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('message') }}
                                        </div>
                                    @endif
                                    {{--<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">--}}
                                        {{--Thank you. Your order has been received.--}}
                                    {{--</p>--}}

                                    <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

                                        <li class="woocommerce-order-overview__order order">
                                            Order number: <strong>{{$order->reference}}</strong>
                                        </li>
@php
$date_det = strftime("%B %d, %Y", strtotime($order->created_at));
@endphp
                                        <li class="woocommerce-order-overview__date date">
                                            Date: <strong>{{$date_det}}</strong>
                                        </li>

                                        <li class="woocommerce-order-overview__total total">
                                            Total: <strong>
                        <span class="woocommerce-Price-amount amount">
                            <span
                                class="woocommerce-Price-currencySymbol">&#8358;</span>{{$order->total}}</span>
                                            </strong>
                                        </li>


                                        <li class="woocommerce-order-overview__payment-method method">
                                            Payment method: <strong>Online</strong>
                                        </li>


                                    </ul>


                                    {{--<p>Pay with .</p>--}}

                                    <section class="woocommerce-order-details">

                                        <h2 class="woocommerce-order-details__title">Order details</h2>

                                        <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

                                            <thead>
                                            <tr>
                                                <th class="woocommerce-table__product-name product-name">Product</th>
                                                <th class="woocommerce-table__product-table product-total">Total</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php $product = json_decode($order->products); ?>
                                            @foreach($product as $item)
                                            <tr class="woocommerce-table__line-item order_item">

                                                <td class="woocommerce-table__product-name product-name">
                                                    <a href="shop-product-right.html">{{$item->title}}</a> <strong
                                                        class="product-quantity">× {{$item->qty}}</strong>
                                                </td>

                                                <td class="woocommerce-table__product-total product-total">
																<span class="woocommerce-Price-amount amount">
																	<span class="woocommerce-Price-currencySymbol">&#8358;</span>{{$item->total}}</span>
                                                </td>

                                            </tr>
                                            @endforeach

                                            </tbody>

                                            <tfoot>
                                            <tr>
                                                <th scope="row">Subtotal:</th>
                                                <td>
																<span class="woocommerce-Price-amount amount">
																	<span class="woocommerce-Price-currencySymbol">&#8358;</span>{{$order->subtotal}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Delivery Fee:</th>
                                                <td>
																<span class="woocommerce-Price-amount amount">
																	<span class="woocommerce-Price-currencySymbol">&#8358;</span>{{$order->delivery_fee}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Payment method:</th>
                                                <td>Online</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Total:</th>
                                                <td>
																<span class="woocommerce-Price-amount amount">
																	<span class="woocommerce-Price-currencySymbol">&#8358;</span>{{$order->total}}</span>
                                                </td>
                                            </tr>
                                            </tfoot>

                                        </table>


                                        <section class="woocommerce-customer-details">

                                            <h2>Customer details</h2>

                                            <table class="woocommerce-table woocommerce-table--customer-details shop_table customer_details">


                                                <tbody>
                                                <tr>
                                                    <th>Email:</th>
                                                    <td>{{$order->email}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Phone:</th>
                                                    <td>{{$order->phone}}</td>
                                                </tr>


                                                </tbody>
                                            </table>


                                            <h3 class="woocommerce-column__title">Billing address</h3>

                                            <address>
                                                {{$order->address}}
                                            </address>


                                        </section>

                                    </section>


                                </div>
                            </div>
                        </div>
                        <!-- .entry-content -->
                    </article>

                </main>


            </div>

        </div>
    </section>
    <div class="mt--15"></div>

@endsection
