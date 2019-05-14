@extends('layout.base')
@section('main-section')
<section class="page_title ds s-parallax s-overlay s-py-65">
    <div class="s-blur"></div>
    <div class="container">
        <div class="row">


            <div class="col-md-12 text-center text-sm-left">
                <h1>Shopping Cart</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('index_page')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Shop</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Shopping Cart
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
                {{--<div class="woocommerce-message">--}}
                    {{--"Premium quality" removed. <a href="#">Undo?</a>--}}
                {{--</div>--}}
                @if($cart && count($cart) > 0)
                    <form class="woocommerce-cart-form" action="http://webdesign-finder.com/" method="post">

                        <table class="shop_table shop_table_responsive cart">
                            <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart as $item)
                                <?php
                                 $details = \App\Product::find($item['id']);
                                ?>
                            <tr class="cart_item">

                                <td class="product-remove">
                                    <a href="{{ route('remove_item', $item['id'])}}" class="removed" aria-label="Remove this item" data-product_id="{{$item['id']}}" data-product_sku="">×</a>
                                </td>

                                <td class="product-thumbnail">
                                    <a href="shop-product-right.html">
                                        <img width="180" height="180" src="images/shop/{{ $item['image_link']}}" class="" alt="">
                                    </a>
                                </td>

                                <td class="product-name" data-title="Product">
                                    <a href="shop-product-right.html">{{ $item['title']}}</a>
                                    <p>{{$details->category->category_name}}@if($details->brand_id != 0), {{$details->brand->brand_name}} @endif
                                        @if($details->flavor != ''), {{$details->flavor}}@endif
                                    </p>
                                </td>

                                <td class="product-price" data-title="Price">
                                    <span>&#8358;</span> <span id="price{{ $item['id']}}"  class="amount price">{{ $item['price']}}</span>
                                </td>

                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                        <input type="number" id="qty" class="input-text qty text" step="1" min="0" max="500" data-update-id="{{ $item['id']}}" name="cart[qty]" value="{{ $item['qty']}}" title="Qty" size="4">
                                    </div>
                                    {{--<div class="quantity">--}}
                                        {{--<input type="button" value="+" class="plus"><i class="fas fa-caret-up"></i>--}}
                                        {{--<input type="number" class="input-text qty text" step="1" min="0" max="500" name="cart[qty]" value="1" title="Qty" size="4">--}}
                                        {{--<input type="button" value="-" class="minus"><i class="fas fa-caret-down"></i></div>--}}
                                </td>

                                <td class="product-subtotal" data-title="Total">
												<span  id="subTotal{{ $item['id']}}" class="amount">
													<span>&#8358;</span>{{ number_format($item['total'])}}
												</span>
                                </td>
                            </tr>
                            @endforeach


                            <tr>
                                <td colspan="6" class="actions">

                                    {{--<div class="coupon">--}}
                                        {{--<label for="coupon_code">Coupon:</label>--}}
                                        {{--<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code">--}}
                                        {{--<input type="submit" class="button" name="apply_coupon" value="Apply coupon">--}}
                                    {{--</div>--}}

                                    {{--<input type="submit" class="button" name="update_cart" value="Update cart" disabled="">--}}

                                </td>
                            </tr>

                            </tbody>
                        </table>


                        {{--<div class="booking">--}}
                            {{--<div class="img">--}}
                                {{--<img src="{{ $item['image_link']}}">--}}
                            {{--</div>--}}
                            {{--<p>--}}
                                {{--{{ $item['title']}}--}}
                                {{--<small><a href="{{ route('remove_item', $item['id'])}}">Remove</a></small>--}}
                            {{--</p>--}}

                        {{--</div>--}}


                    </form>



                <section class="related products">
                    <div class="cart_totals ">


                        <h2>Cart totals</h2>

                        <table class="shop_table shop_table_responsive">

                            <tbody>
                            <tr class="cart-subtotal">
                                <th>Subtotal</th>
                                <td data-title="Subtotal">
                                    <span id="subtotal" class="amount">
                                        <span>&#8358;</span>{{number_format($subtotal)}}

                                    </span>

                                </td>
                            </tr>

                            <tr class="cart-subtotal">
                                <th>Delivery Fee</th>
                                <td data-title="Subtotal">
                                    <span id="delivery_fee" class="amount">
                                        <span>&#8358;</span>{{number_format($delivery_fee)}}

                                    </span>

                                </td>
                            </tr>


                            <tr class="order-total">
                                <th>Total</th>
                                <td data-title="Total">
                                    <strong>
                                <span id="totalAmt" class="amount">
                                    <span>&#8358;</span>{{number_format($total)}}
                                </span>
                                    </strong>
                                </td>
                            </tr>


                            </tbody>
                        </table>



                        <div class="wc-proceed-to-checkout">

                            <a href="{{route('shop-checkout')}}" class="checkout-button button alt wc-forward">
                                Proceed to checkout</a>
                        </div>


                    </div>

                </section>
                @else
                    <p>There is no item in your cart</p>
                @endif

            </main>


        </div>

    </div>
</section>
@endsection
@section('style-section')
    <style>
        .price{
            display: inline !important;
            font-weight: 700;
        }
        .product-price >span {
            color: #00929E !important;
            font-weight: 700;
        }
    </style>

    @endsection
