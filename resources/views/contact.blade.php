@extends('layout.base')
@section('main-section')

    <section class="page_title ds s-parallax s-overlay s-py-65">
        <div class="s-blur"></div>
        <div class="container">
            <div class="row">


                <div class="col-md-12 text-center text-sm-left">
                    <h1>Contact 2 Page</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Pages</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Contact 2 Page
                        </li>
                    </ol>
                </div>


            </div>
        </div>
    </section>

    <section class="ls s-py-xl-150 s-py-lg-130 s-py-md-90 s-py-60 c-mb-30 c-gutter-30">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-6 col-12">
                <div class="media text-center text-sm-left">
                    <div class="icon-styled color-main fs-28">
                        <img src="images/icons/icon1.png" alt="">
                    </div>
                    <div class="media-body">
                        <h5>
                            Adress
                        </h5>
                        <p>
                            3570 Bloomfield Way
                            Littleton, ME 04760
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="media text-center text-sm-left">
                    <div class="icon-styled color-main fs-28">
                        <img src="images/icons/icon2.png" alt="">
                    </div>
                    <div class="media-body">
                        <h5>
                            Opening Hours
                        </h5>
                        <p>
                            Mon to Fr: 10am to 7pm <br>
                            Saturday: 10am to 4pm
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="media text-center text-sm-left">
                    <div class="icon-styled color-main fs-28">
                        <img src="images/icons/icon3.png" alt="">
                    </div>
                    <div class="media-body">
                        <h5>
                            Email Adress
                        </h5>
                        <p>
                            mail@example.com
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="media text-center text-sm-left">
                    <div class="icon-styled color-main fs-28">
                        <img src="images/icons/icon4.png" alt="">
                    </div>
                    <div class="media-body">
                        <h5>
                            Phone
                        </h5>
                        <p>
                            Call customer services <br>
                            on 0800 123 45 67
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb--30"></div>
    </div>
</section>

<section class="ls ms s-py-xl-150 s-py-lg-130 s-py-md-90 s-py-60">
    <div class="container">
        <div class="row">
            <div class="col-12 contact-us animate" data-animation="scaleAppear">
                <h4 class="special-heading text-center text-capitalize">Contact us</h4>
                <p class="special-heading text-center">Have You any Questions? Ask Us!</p>
                <div class="divider-50 hidden-below-md"></div>
                <div class="divider-20 hidden-above-md"></div>
                <form class="contact-form content-center c-mb-40 c-gutter-20" method="post" action="http://webdesign-finder.com/">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-placeholder">
                                <label for="name444">Full Name <span class="required">*</span></label>

                                <input type="text" aria-required="true" size="30" value="" name="name" id="name444" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group has-placeholder">
                                <label for="email444">Email address<span class="required">*</span></label>

                                <input type="email" aria-required="true" size="30" value="" name="email" id="email444" class="form-control" placeholder="Email">
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
                                <input class="btn btn-maincolor" type="submit" value="Send Message">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--.col-* -->
        </div>
    </div>
</section>

@endsection
