@extends('layout.base')
@section('main-section')
    <section class="page_title ds s-parallax s-overlay s-py-65">
    <div class="s-blur"></div>
    <div class="container">
        <div class="row">


            <div class="col-md-12 text-center text-sm-left">
                <h1>{{$category->category_name}}</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('index_page')}}">Home</a>
                    </li>
                    {{--<li class="breadcrumb-item">--}}
                        {{--<a href="#">Shop</a>--}}
                    {{--</li>--}}
                    <li class="breadcrumb-item active">
                        {{$category->category_name}}
                    </li>
                </ol>
            </div>


        </div>
    </div>
</section>


<section class="ls s-py-xl-150 s-py-lg-130 s-py-md-90 s-py-60 c-gutter-30">
    <div class="container">
        <div class="row">


            <main class="col-lg-7 col-xl-9">
                <div class="columns-3">
                    {{--<div class="products-selection">--}}
                        {{--<p class="woocommerce-result-count">--}}
                            {{--Showing all 23 results</p>--}}
                        {{--<form class="woocommerce-ordering" method="get">--}}
                            {{--<select name="orderby" class="orderby">--}}
                                {{--<option value="menu_order" selected="selected">Default sorting</option>--}}
                                {{--<option value="popularity">Sort by popularity</option>--}}
                                {{--<option value="rating">Sort by average rating</option>--}}
                                {{--<option value="date">Sort by newness</option>--}}
                                {{--<option value="price">Sort by price: low to high</option>--}}
                                {{--<option value="price-desc">Sort by price: high to low</option>--}}
                            {{--</select>--}}
                        {{--</form>--}}
                        {{--<span class="toggle_view">--}}
										{{--View--}}
										{{--<a class="full" href="#"><i class="fas fa-bars"></i></a>--}}
										{{--<a class="grid active" href="#"><i class="fas fa-th"></i></a>--}}
									{{--</span>--}}
                    {{--</div>--}}


                    <ul class="products">
                        @foreach($products as $product)
                            <li class="product">
                                <a class="woocommerce-LoopProduct-link" href="#">
                                    <img src="{{asset('images/shop/'.$product->image_link)}}" alt="">
                                    <h2>{{$product->title}}</h2>
                                    <div class="star-rating">
                                        <span style="width:80%">Rated <strong class="rating">4.00</strong> out of 5</span>
                                    </div>
                                    <div class="product-description-short">
                                        <p>
                                            <span>Category:</span>
                                            <span><strong>{{$product->category->category_name}}</strong></span>
                                        </p>

                                            <p>
                                                <span>
                                                    @php
                                                    if($product->brand_id == 2){
                                                       $brand = "Brand";
                                                         }else{
                                                        $brand = "Size:";
                                                    }
                                                    @endphp
                                                    {{$brand}}
                                                    <span><strong> {{$product->brand->brand_name}} </strong></span></span>
                                            </p>

                                        @if($product->flavor != '')
                                            <p>
                                                <span>Flavor:</span>
                                                <span><strong>{{$product->flavor}}</strong></span>
                                            </p>
                                        @endif
                                    </div>
                                    <span class="price">
															{{--<del>--}}
                                        {{--<span>--}}
                                        {{--<span>&#8358;</span>15.00--}}
                                        {{--</span>--}}
                                        {{--</del>--}}
															<ins>
																<span>
																	<span>&#8358;</span>{{$product->price}}
																</span>
															</ins>
														</span>
                                </a>
                                <button rel="nofollow" style="cursor:pointer" data-id="{{$product->id}}" class="button product_type_simple add_to_cart_button  add-to-cart">Add to cart</button>
                                <a href="{{route('shopping-cart')}}" class="added_to_cart wc-forward" title="View cart">View cart</a>
                            </li>
                        @endforeach




                    </ul>
                </div>
                <!-- columns 2 -->
                <nav class="woocommerce-pagination">
                {{$products->links()}}
                </nav>



            </main>

            <aside class="col-lg-5 col-xl-3">
                <div class="ls ms px-20 py-40">
                    <div class="widget widget_product_search">

                        <h3 class="widget-title">Search</h3>

                        <form role="search" class="woocommerce-product-search" action="http://webdesign-finder.com/">

                            <label class="screen-reader-text" for="woocommerce-product-search-field-widget">
                                Search for:
                            </label>

                            <input type="search" id="woocommerce-product-search-field-widget" class="search-field" placeholder="Search" value="" name="search">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                </div>


                <div class="widget woocommerce widget_product_categories">
                    <h3 class="widget-title">Categories</h3>
                    <ul class="product-categories">
                        @php

                        @endphp
                        @foreach($categories as $category)
                        <li class="cat-item cat-parent">
                            <a href="{{route($category->slug)}}">{{$category->category_name}}</a>
                            <span class="count">({{ App\Product::category_product_counter($category->id)  }})</span>
                            <ul class="children">
                                @foreach($brands as $brand)
                                @if($brand->category_id == $category->id)
                                <li class="cat-item">
                                    <a href="{{$category->slug.'/'.$brand->slug}}">{{$brand->brand_name}}</a>
                                    <span class="count">{{ App\Product::product_counter($brand->id)  }}</span>
                                </li>
                                @endif
                                @endforeach

                            </ul>
                        </li>
                        @endforeach


                    </ul>
                </div>


                {{--<div class="widget woocommerce widget_top_rated_products">--}}
                    {{--<h3 class="widget-title">Top Products</h3>--}}
                    {{--<ul class="product_list_widget">--}}
                        {{--<li>--}}
                            {{--<a href="shop-product-right.html">--}}
                                {{--<img src="images/shop/01.jpg" alt="">--}}
                                {{--<span class="product-title">Ninja Silhouette</span>--}}
                            {{--</a>--}}
                            {{--<div class="star-rating">--}}
											{{--<span style="width:100%">Rated--}}
												{{--<strong class="rating">5.00 </strong>--}}
												{{--out of 5--}}
											{{--</span>--}}
                            {{--</div>--}}
                            {{--<span class="woocommerce-Price-amount amount">--}}
											{{--<span class="woocommerce-Price-currencySymbol">$</span>--}}
											{{--20.00--}}
										{{--</span>--}}
                        {{--</li>--}}

                        {{--<li>--}}
                            {{--<a href="shop-product-right.html">--}}
                                {{--<img src="images/shop/02.jpg" alt="">--}}
                                {{--<span class="product-title">Woo Album #4</span>--}}
                            {{--</a>--}}
                            {{--<div class="star-rating">--}}
											{{--<span style="width:100%">Rated--}}
												{{--<strong class="rating">5.00</strong>--}}
												{{--out of 5--}}
											{{--</span>--}}
                            {{--</div>--}}
                            {{--<span class="woocommerce-Price-amount amount">--}}
											{{--<span class="woocommerce-Price-currencySymbol">$</span>--}}
											{{--9.00--}}
										{{--</span>--}}
                        {{--</li>--}}

                        {{--<li>--}}
                            {{--<a href="shop-product-right.html">--}}
                                {{--<img src="images/shop/03.jpg" alt="">--}}
                                {{--<span class="product-title">Happy Ninja</span>--}}
                            {{--</a>--}}
                            {{--<div class="star-rating">--}}
											{{--<span style="width:100%">Rated--}}
												{{--<strong class="rating">5.00</strong>--}}
												{{--out of 5--}}
											{{--</span>--}}
                            {{--</div>--}}
                            {{--<span class="woocommerce-Price-amount amount">--}}
											{{--<span class="woocommerce-Price-currencySymbol">$</span>--}}
											{{--18.00--}}
										{{--</span>--}}
                        {{--</li>--}}

                        {{--<li>--}}
                            {{--<a href="shop-product-right.html">--}}
                                {{--<img src="images/shop/04.jpg" alt="">--}}
                                {{--<span class="product-title">Patient Ninja</span>--}}
                            {{--</a>--}}
                            {{--<div class="star-rating">--}}
											{{--<span style="width:93.4%">Rated--}}
												{{--<strong class="rating">4.67</strong>--}}
												{{--out of 5--}}
											{{--</span>--}}
                            {{--</div>--}}
                            {{--<span class="woocommerce-Price-amount amount">--}}
											{{--<span class="woocommerce-Price-currencySymbol">$</span>--}}
											{{--35.00--}}
										{{--</span>--}}
                        {{--</li>--}}

                        {{--<li>--}}
                            {{--<a href="shop-product-right.html">--}}
                                {{--<img src="images/shop/05.jpg" alt="">--}}
                                {{--<span class="product-title">Premium Quality</span>--}}
                            {{--</a>--}}
                            {{--<div class="star-rating">--}}
											{{--<span style="width:90%">Rated--}}
												{{--<strong class="rating">4.50</strong>--}}
												{{--out of 5--}}
											{{--</span>--}}
                            {{--</div>--}}
                            {{--<span class="woocommerce-Price-amount amount">--}}
											{{--<span class="woocommerce-Price-currencySymbol">$</span>--}}
											{{--20.00--}}
										{{--</span>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}


                {{--<div class="widget woocommerce widget_price_filter">--}}

                    {{--<h3 class="widget-title">Price Filter</h3>--}}

                    {{--<form method="get" action="http://webdesign-finder.com/">--}}
                        {{--<div class="price_slider_wrapper">--}}
                            {{--<div class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">--}}
                                {{--<div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 10%; width: 70%;">--}}

                                {{--</div>--}}
                                {{--<span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 10%;">--}}

											{{--</span>--}}
                                {{--<span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 80%;">--}}

											{{--</span>--}}
                            {{--</div>--}}
                            {{--<div class="price_slider_amount">--}}
                                {{--<input type="text" id="min_price" name="min_price" value="" data-min="20" placeholder="Min price" style="display: none;">--}}
                                {{--<input type="text" id="max_price" name="max_price" value="" data-max="30" placeholder="Max price" style="display: none;">--}}
                                {{--<button type="submit" class="button">Filter</button>--}}
                                {{--<div class="price_label" style="">--}}
                                    {{--Price: <span class="from">$21</span> - <span class="to">$28</span>--}}
                                {{--</div>--}}

                                {{--<div class="clear"></div>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}


                {{--<div class="widget woocommerce widget_product_tag_cloud">--}}

                    {{--<h3 class="widget-title">Price Filter</h3>--}}

                    {{--<div class="tagcloud">--}}
                        {{--<a href="shop-right.html" class="tag-cloud-link" aria-label="album (1 product)">--}}
                            {{--Cannabis--}}
                        {{--</a>--}}
                        {{--<a href="shop-right.html" class="tag-cloud-link" aria-label="premium (1 product)">--}}
                            {{--Medical--}}
                        {{--</a>--}}
                        {{--<a href="shop-right.html" class="tag-cloud-link" aria-label="product (1 product)">--}}
                            {{--Marijuana--}}
                        {{--</a>--}}
                        {{--<a href="shop-right.html" class="tag-cloud-link" aria-label="single (1 product)">--}}
                            {{--Health--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}


            </aside>


        </div>

    </div>
</section>
@endsection
@section('style-section')
    <style>
        ul.pagination a {
            background-color: #fff;
            border: 1px solid #e4ebe8 !important;
            border-radius: 0 !important;
            color: #7a998c;
            display: inline-block;
            height: 2.5em;
            letter-spacing: 0;
            line-height: 1;
            margin-left: 0;
            margin-right: 4px;
            min-width: 2.5em;
            padding: 0.6em 0.4em 0.3em;
            text-align: center;
        }
        .pagination{
            list-style: none;
            margin-top: 35px;
            padding: 0;
        }
        .page-item.active .page-link{

            background-color: #00929E !important;
            border-color: #00929E !important;
            color: #fff !important;
            cursor: not-allowed !important;
            display: inline-block;
            height: 2.5em;
            letter-spacing: 0;
            line-height: 1;
            margin-left: 0;
            margin-right: 4px;
            min-width: 2.5em;
            padding: 0.6em 0.4em 0.3em;
            text-align: center;
        }

        .page-item.disabled .page-link{
            cursor: not-allowed !important;
            border-color: #00929E !important;
            border: 1px solid #e4ebe8 !important;
            border-radius: 0 !important;

            display: inline-block;
            height: 2.5em;
            letter-spacing: 0;
            line-height: 1;
            margin-left: 0;
            margin-right: 4px;
            min-width: 2.5em;
            padding: 0.6em 0.4em 0.3em;
            text-align: center;
        }

    </style>
    @endsection
