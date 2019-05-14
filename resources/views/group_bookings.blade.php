@extends('layout.base')
@section('main-section')

    <section class="page_title ds s-parallax s-overlay s-py-65">
        <div class="s-blur"></div>
        <div class="container">
            <div class="row">


                <div class="col-md-12 text-center text-sm-left">
                    <h1>Group Bookings</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('index_page')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('group_bookings')}}">Group Bookings</a>
                        </li>
                        {{--<li class="breadcrumb-item active">--}}
                            {{--Contact 2 Page--}}
                        {{--</li>--}}
                    </ol>
                </div>


            </div>
        </div>
    </section>


<section class="ls ms s-py-xl-150 s-py-lg-130 s-py-md-90 s-py-60">
    <div class="container">
        <div class="row">
            <div class="col-12 contact-us " data-animation="scaleAppear">
                <h4 class="special-heading text-center text-capitalize">Group Bookings</h4>
                <p class="special-heading text-center">You want to Order from us in Bulk?</p>
                <div class="divider-50 hidden-below-md"></div>
                <div class="divider-20 hidden-above-md"></div>
                <form class="group-bookings content-center c-mb-40 c-gutter-20" method="post" action="#">
@csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-placeholder">
                                <label for="name444">Full Name <span class="required">*</span></label>

                                <input type="text" aria-required="true" size="30" name="name" id="name444" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group has-placeholder">
                                <label for="email444">Email address<span class="required">*</span></label>

                                <input type="email" aria-required="true" size="30" name="email" id="email444" class="form-control" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mb-0">
                            <div class="form-group has-placeholder">
                                <label for="message444">Message</label>
                                <textarea aria-required="true" rows="3" cols="45" name="message" id="message444" class="form-control" placeholder="Message"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <input class="btn btn-maincolor" type="submit" value="Place Order">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--.col-* -->
        </div>
    </div>
</section>
    <style>
        form.group-bookings {
            background-color: #fff;
            margin-bottom: 26px;
            padding: 3.3rem 3.85rem 1.7rem;
        }
    </style>

@endsection

