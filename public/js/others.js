$('.plus, .minus').on('click', function (e) {
    var numberField = $(this).parent().find('[type="number"]');
    // var priceField = $(this).parent().parent().parent().find('.product-price').find('.price');
    // var amountField = $(this).parent().parent().parent().find('.product-subtotal').find('.amount');

    var currentVal = numberField.val();
    var sign = $(this).val();
    if (sign === '-') {
        if (currentVal > 1) {
            numberField.val(parseFloat(currentVal) - 1);
            let newqty = parseFloat(currentVal) -1;
            let productId =  parseFloat(numberField.attr('data-update-id'));
            updateCart(productId, newqty);
        }
    } else {
        numberField.val(parseFloat(currentVal) + 1);
        let newqty = parseFloat(currentVal) +1;
        let productId =  parseFloat(numberField.attr('data-update-id'));
        updateCart(productId, newqty);
    }
});

function windowLoadInit() {
    //////////////
    //flexslider//
    //////////////


    if ($().flexslider) {
        var $introSlider = $(".page_slider .flexslider");
        $introSlider.each(function (index) {
            var $currentSlider = $(this);
            var data = $currentSlider.data();
            var nav = (data.nav !== 'undefined') ? data.nav : true;
            var dots = (data.dots !== 'undefined') ? data.dots : true;
            var speed = (data.speed !== 'undefined') ? data.speed : 7000;

            $currentSlider.flexslider({
                animation: "fade",
                pauseOnHover: true,
                useCSS: true,
                controlNav: dots,
                directionNav: nav,
                prevText: "",
                nextText: "",
                smoothHeight: false,
                slideshowSpeed: speed,
                animationSpeed: 600,
                start: function (slider) {
                    slider.find('.intro_layers').children().css({'visibility': 'hidden'});
                    slider.find('.flex-active-slide .intro_layers').children().each(function (index) {
                        var self = $(this);
                        var animationClass = !self.data('animation') ? 'scaleAppear' : self.data('animation');
                        setTimeout(function () {
                            self.addClass("animated " + animationClass);
                        }, index * 250);
                    });
                },
                after: function (slider) {
                    slider.find('.flex-active-slide .intro_layers').children().each(function (index) {
                        var self = $(this);
                        var animationClass = !self.data('animation') ? 'scaleAppear' : self.data('animation');
                        setTimeout(function () {
                            self.addClass("animated " + animationClass);
                        }, index * 250);
                    });
                },
                end: function (slider) {
                    slider.find('.intro_layers').children().each(function () {
                        var self = $(this);
                        var animationClass = !self.data('animation') ? 'scaleAppear' : self.data('animation');
                        self.removeClass('animated ' + animationClass).css({'visibility': 'hidden'});
                        // $(this).attr('class', '');
                    });
                },

            })
            //wrapping nav with container - uncomment if need
            // .find('.flex-control-nav')
            // .wrap('<div class="container nav-container"/>')
        }); //.page_slider flex slider

        $(".flexslider").each(function (index) {
            var $currentSlider = $(this);
            //exit if intro slider already activated
            if ($currentSlider.find('.flex-active-slide').length) {
                return;
            }
            $currentSlider.flexslider({
                animation: "fade",
                useCSS: true,
                controlNav: true,
                directionNav: false,
                prevText: "",
                nextText: "",
                smoothHeight: false,
                slideshowSpeed: 5000,
                animationSpeed: 800,
            })
        });
    }

    ////////////////
    //owl carousel//
    ////////////////
    if ($().owlCarousel) {
        $('.owl-carousel').each(function () {
            var $carousel = $(this);
            $carousel.find('> *').each(function (i) {
                $(this).attr('data-index', i);
            });
            var data = $carousel.data();

            var loop = data.loop ? data.loop : false,
                margin = (data.margin || data.margin === 0) ? data.margin : 30,
                nav = data.nav ? data.nav : false,
                navPrev = data.navPrev ? data.navPrev : '<i class="fa fa-chevron-left">',
                navNext = data.navNext ? data.navNext : '<i class="fa fa-chevron-right">',
                dots = data.dots ? data.dots : false,
                themeClass = data.themeclass ? data.themeclass : 'owl-theme',
                center = data.center ? data.center : false,
                items = data.items ? data.items : 4,
                autoplay = data.autoplay ? data.autoplay : false,
                responsiveXs = data.responsiveXs ? data.responsiveXs : 1,
                responsiveSm = data.responsiveSm ? data.responsiveSm : 2,
                responsiveMd = data.responsiveMd ? data.responsiveMd : 3,
                responsiveLg = data.responsiveLg ? data.responsiveLg : 4,
                draggable = (data.draggable === false) ? data.draggable : true,
                syncedClass = (data.syncedClass) ? data.syncedClass : false,
                filters = data.filters ? data.filters : false;

            if (filters) {
                $carousel.after($carousel.clone().addClass('owl-carousel-filter-cloned'));
                $(filters).on('click', 'a', function (e) {
                    //processing filter link
                    e.preventDefault();
                    if ($(this).hasClass('selected')) {
                        return;
                    }
                    var filterValue = $(this).attr('data-filter');
                    $(this).siblings().removeClass('selected active');
                    $(this).addClass('selected active');

                    //removing old items
                    for (var i = $carousel.find('.owl-item').length - 1; i >= 0; i--) {
                        $carousel.trigger('remove.owl.carousel', [1]);
                    }
                    ;

                    //adding new items
                    var $filteredItems = $($carousel.next().find(' > ' + filterValue).clone());
                    $filteredItems.each(function () {
                        $carousel.trigger('add.owl.carousel', $(this));
                        $(this).addClass('scaleAppear');
                    });

                    $carousel.trigger('refresh.owl.carousel');

                    //reinit prettyPhoto in filtered OWL carousel
                    if ($().prettyPhoto) {
                        $carousel.find("a[data-gal^='prettyPhoto']").prettyPhoto({
                            hook: 'data-gal',
                            theme: 'facebook' /* light_rounded / dark_rounded / light_square / dark_square / facebook / pp_default*/
                        });
                    }
                });

            } //filters

            $carousel.owlCarousel({
                loop: loop,
                margin: margin,
                nav: nav,
                autoplay: autoplay,
                dots: dots,
                themeClass: themeClass,
                center: center,
                navText: [navPrev, navNext],
                mouseDrag: draggable,
                touchDrag: draggable,
                items: items,
                responsive: {
                    0: {
                        items: responsiveXs
                    },
                    767: {
                        items: responsiveSm
                    },
                    992: {
                        items: responsiveMd
                    },
                    1200: {
                        items: responsiveLg
                    }
                },
            })
                .addClass(themeClass);
            if (center) {
                $carousel.addClass('owl-center');
            }

            $window.on('resize', function () {
                $carousel.trigger('refresh.owl.carousel');
            });

            //topline two synced carousels
            if ($carousel.hasClass('owl-news-slider-items') && syncedClass) {
                $carousel.on('changed.owl.carousel', function (e) {
                    var indexTo = loop ? e.item.index + 1 : e.item.index;
                    $(syncedClass).trigger('to.owl.carousel', [indexTo]);
                })
            }


        });


    } //eof owl-carousel
    jQuery('.testimonials-owl-dots').each(function () {
        var $owl1 = jQuery(this);
        var $owl2 = $owl1.next('.testimonials-owl-content');

        $owl1.on('click', '.owl-item', function(e) {
            var carousel = $owl1.data('owl.carousel');
            e.preventDefault();
            carousel.to(carousel.relative(jQuery(this).index()));
        })
        $('.modal').find('#btnClose').click();
        $owl2.on('change.owl.carousel', function (event) {
            if (event.namespace && event.property.name === 'position') {
                var target = event.relatedTarget.relative(event.property.value, true);
                $owl1.owlCarousel('to', target, 300, true);
            }
        });
    });
    ////////////////////
    //header processing/
    ////////////////////
    //stick header to top
    //wrap header with div for smooth sticking
    var $header = $('.page_header').first();
    var boxed = $header.closest('.boxed').length;
    var headerSticked = $('.header_side_sticked').length;
    if ($header.length) {
        //hiding main menu 1st levele elements that do not fit width
        menuHideExtraElements();
        //mega menu
        initMegaMenu(1);
        //wrap header for smooth stick and unstick
        $header.wrap('<div class="page_header_wrapper"></div>');
        var $headerWrapper = $('.page_header_wrapper');
        if (!boxed) {
            setTimeout(function () {
                var headerHeight = $header.outerHeight();
                $headerWrapper.css({height: $('.page_header').first().outerHeight()});
            }, 400)
        }

        //headerWrapper background - same as header
        if ($header.hasClass('ls')) {
            $headerWrapper.addClass('ls');
            if ($header.hasClass('ms')) {
                $headerWrapper.addClass('ms');
            }
        } else if ($header.hasClass('ds')) {
            $headerWrapper.addClass('ds');
            if ($header.hasClass('bs')) {
                $headerWrapper.addClass('bs');
            }
            if ($header.hasClass('ms')) {
                $headerWrapper.addClass('ms');
            }

        } else if ($header.hasClass('cs')) {
            $headerWrapper.addClass('cs');
            if ($header.hasClass('cs2')) {
                $headerWrapper.addClass('cs2');
            }
            if ($header.hasClass('cs3')) {
                $headerWrapper.addClass('cs3');
            }
        } else if ($header.hasClass('gradient-background')) {
            $headerWrapper.addClass('gradient-background');
        }

        //get offset
        var headerOffset = 0;
        //check for sticked template headers
        if (!boxed && !($headerWrapper.css('position') === 'fixed')) {
            headerOffset = $header.offset().top;
        }

        //for boxed layout - show or hide main menu elements if width has been changed on affix
        $header.on('affixed-top.bs.affix affixed.bs.affix affixed-bottom.bs.affix', function (e) {
            if ($header.hasClass('affix-top')) {
                $headerWrapper.removeClass('affix-wrapper affix-bottom-wrapper').addClass('affix-top-wrapper');
                //cs to ls when affixed
                // if($header.hasClass('cs')) {
                // 	$header.removeClass('ls');
                // }
            } else if ($header.hasClass('affix')) {
                $headerWrapper.removeClass('affix-top-wrapper affix-bottom-wrapper').addClass('affix-wrapper');
                //cs to ls when affixed
                // if($header.hasClass('cs')) {
                // 	$header.addClass('ls');
                // }
            } else if ($header.hasClass('affix-bottom')) {
                $headerWrapper.removeClass('affix-wrapper affix-top-wrapper').addClass('affix-bottom-wrapper');
            } else {
                $headerWrapper.removeClass('affix-wrapper affix-top-wrapper affix-bottom-wrapper');
            }

            //calling this functions disable menu items animation when going from affix to affix-top with centered logo inside
            //in boxed layouts header is always fixed
            if (boxed && !($header.css('position') === 'fixed')) {
                menuHideExtraElements();
                initMegaMenu(1);
            }
            if (headerSticked) {
                initMegaMenu(1);
            }

        });

        //if header has different height on afixed and affixed-top positions - correcting wrapper height
        $header.on('affixed-top.bs.affix', function () {
            // $headerWrapper.css({height: $header.outerHeight()});
        });

        //fixing auto affix bug - toggle affix on click when page is at the top
        $header.on('affix.bs.affix', function () {
            if (!$window.scrollTop()) return false;
        });

        // $header.affix({
        //     offset: {
        //         top: headerOffset,
        //         bottom: -10
        //     }
        // });
    }

    //aside affix
    initAffixSidebar();

    $body.scrollspy('refresh');

    //appear plugin is used to elements animation, counter, pieChart, bootstrap progressbar
    if ($().appear) {
        //animation to elements on scroll
        var $animate = $('.animate');
        $animate.appear();

        $animate.filter(':appeared').each(function (index) {
            initAnimateElement($(this), index);
        });

        $body.on('appear', '.animate', function (e, $affected) {
            $($affected).each(function (index) {
                initAnimateElement($(this), index);
            });
        });

        //counters init on scroll
        if ($().countTo) {
            var $counter = $('.counter');
            $counter.appear();

            $counter.filter(':appeared').each(function () {
                initCounter($(this));
            });
            $body.on('appear', '.counter', function (e, $affected) {
                $($affected).each(function () {
                    initCounter($(this));
                });
            });
        }

        //bootstrap animated progressbar
        if ($().progressbar) {
            var $progressbar = $('.progress .progress-bar');
            $progressbar.appear();

            $progressbar.filter(':appeared').each(function () {
                initProgressbar($(this));
            });
            $body.on('appear', '.progress .progress-bar', function (e, $affected) {
                $($affected).each(function () {
                    initProgressbar($(this));
                });
            });
            //animate progress bar inside bootstrap tab
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                initProgressbar($($(e.target).attr('href')).find('.progress .progress-bar'));
            });
            //animate progress bar inside bootstrap dropdown
            $('.dropdown').on('shown.bs.dropdown', function (e) {
                initProgressbar($(this).find('.progress .progress-bar'));
            });
        }

        //circle progress bar
        if ($().easyPieChart) {
            var $chart = $('.chart');

            $chart.appear();

            $chart.filter(':appeared').each(function () {
                initChart($(this));
            });
            $body.on('appear', '.chart', function (e, $affected) {
                $($affected).each(function () {
                    initChart($(this));
                });
            });

        }

    } //appear check

    //Flickr widget
    // use http://idgettr.com/ to find your ID
    if ($().jflickrfeed) {
        var $flickr = $("#flickr, .flickr_ul");
        if ($flickr.length) {
            if (!($flickr.hasClass('flickr_loaded'))) {
                $flickr.jflickrfeed({
                    flickrbase: "http://api.flickr.com/services/feeds/",
                    limit: 4,
                    qstrings: {
                        id: "131791558@N04"
                    },
                    itemTemplate: '<a href="{{image_b}}" class="photoswipe-link"><li><img alt="{{title}}" src="{{image_m}}" /></li></a>'
                    //complete
                }, function (data) {
                    initPhotoSwipe();
                }).addClass('flickr_loaded');
            }
        }
    }

    // Instagram widget
    if (jQuery().spectragram) {
        var Spectra = {
            instaToken: '3905738328.5104743.42b91d10580042e3aeeab90c926666a4',

            init: function () {
                jQuery.fn.spectragram.accessData = {
                    accessToken: this.instaToken
                };

                //available methods: getUserFeed, getRecentTagged
                jQuery('.instafeed').each(function () {
                    var $this = jQuery(this);
                    if ($this.find('img').length) {
                        return;
                    }
                    $this.spectragram('getUserFeed', {
                        max: 4,
                        wrapEachWith: '<div class="photo" />'
                    });
                });

            }
        };

        Spectra.init();
    }

    // init Isotope
    $('.isotope-wrapper').each(function (index) {
        var $container = $(this);
        var layoutMode = ($container.hasClass('masonry-layout')) ? 'masonry' : 'fitRows';
        var columnWidth = ($container.children('.col-md-3').length) ? '.col-md-3' : false;
        $container.isotope({
            percentPosition: true,
            layoutMode: layoutMode,
            masonry: {
                //TODO for big first element in grid - giving smaller element to use as grid
                // columnWidth: '.isotope-wrapper > .col-md-4'
                columnWidth: columnWidth
            }
        });

        var $filters = $container.attr('data-filters') ? $($container.attr('data-filters')) : $container.prev().find('.filters');
        // bind filter click
        if ($filters.length) {
            $filters.on('click', 'a', function (e) {
                e.preventDefault();
                var $thisA = $(this);
                var filterValue = $thisA.attr('data-filter');
                $container.isotope({filter: filterValue});
                $thisA.siblings().removeClass('selected active');
                $thisA.addClass('selected active');
            });
            //for works on select
            $filters.on('change', 'select', function (e) {
                e.preventDefault();
                var filterValue = $(this).val();
                $container.isotope({filter: filterValue});
            });
        }
    });

////VIDEO///////
    if (document.getElementById('myVideo')) {

        var $videobg = document.getElementById('myVideo');
        var $src = $videobg.querySelector('source').dataset.src;
        var $time = $videobg.querySelector('source').dataset.time;

        if ($(window).width() > 1200) {
            if ($videobg.paused) {
                $videobg.querySelector('source').src = $src;
                $videobg.load();
                $videobg.currentTime = 7;
                $videobg.volume = 0;
                $videobg.play();

                $videobg.addEventListener('timeupdate', function () {
                    if (this.currentTime >= $time) {
                        $videobg.currentTime = 7;
                        $videobg.volume = 0;
                        $videobg.play();
                    }
                });
            }

        }

        $('.slides').on('classChanged', 'li:eq(1)', function () {
            if ($(window).width() > 1200) {
                $videobg.currentTime = 7;
                $videobg.volume = 0;
                $videobg.play();
                $videobg.addEventListener('timeupdate', function () {
                    if (this.currentTime >= $time) {
                        $videobg.currentTime = 7;
                        $videobg.volume = 0;
                        $videobg.play();
                    }
                })
            }
        });
    }

    (function () {
        var originalAddClassMethod = jQuery.fn.addClass;
        var originalRemoveClassMethod = jQuery.fn.removeClass;
        jQuery.fn.addClass = function () {
            var result = originalAddClassMethod.apply(this, arguments);
            jQuery(this).trigger('classChanged');
            return result;
        };
        jQuery.fn.removeClass = function () {
            var result = originalRemoveClassMethod.apply(this, arguments);
            jQuery(this).trigger('classChanged');
            return result;
        }
    })();


    ////**TEAM FORM**/////
    $(".team-form-btn").on('click', function(e){
        e.preventDefault();
        $('#team-form').modal('show').addClass('center').find('input').first().focus();
    });

    ////**LOGIN FORM**/////
    $(".login-form-btn").on('click', function(e){
        e.preventDefault();
        $('#login-form').modal('show').addClass('center').find('input').first().focus();
    });

    $(".sign-in").on('click', function(e){
        e.preventDefault();
        $('#login-form').find('.close').click();
        $('#login-form2').modal('show').addClass('center').find('input').first().focus();

    });


    /**YES OR NO**/
    $(".btn-yes").on('click', function () {
        document.cookie = "enter=true";
        $("#years").hide();
        $("body").removeClass('modal-open');
    });
    $(".btn-no").on('click', function () {



    });

    if ( getCookie('enter') != 'true' )
    {
        setTimeout(function(){
            $("body").addClass('modal-open');
            $("#years").show();
        }, 500)
    }

    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
    // localStorage.setItem("bgColor","green");

    // $(".btn-yes").on('click', function(e){
    //     e.preventDefault();
    //     $('#years').css('display','none');
    // });


    /**DROPDOWNS**/
    $('.dropdown-toggle').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        var item = $(this);
        $('.dropdown-menu').not(item.next()).slideUp(300);
        item.next().slideToggle(300);
    });
    $('.dropdown-menu').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
    });
    $('body').on('click', function () {
        $('.dropdown-menu').slideUp(300);
    });

    /////////
    ///MAP///
    /////////

    var offices = [
        {latLng: [28.538336,-81.379234], name: "Orlando"},
        {latLng: [44.316131,-72.751309], name: "Stowe"},
        {latLng: [37.235251,-85.738603], name: "Hardyville"},
        {latLng: [44.953972,-93.284197], name: "1163 Hayhurst Lane Westland, MI 48185"},
        {latLng: [39.015490,-96.611992], name: "Junction City"},
        {latLng: [34.455978,-106.718009], name: "Las Nutrias"},
        {latLng: [34.986554,-119.826751], name: "New Cuyama"},
        {latLng: [42.536149,-123.553618], name: "Grants Pass"},
        {latLng: [46.390630,-112.309402], name: "Helena"},
    ];

    if ( document.getElementById('map-vector') ) {
        $('#map-vector').vectorMap({
            map: 'us_lcc',
            backgroundColor: 'transparent',
            zoomOnScroll: false,
            regionStyle: {
                initial: {
                    fill: '#7a998c'
                },
                hover: {
                    "fill-opacity": 0.8,
                    cursor: 'default'
                }
            },
            markerStyle: {
                initial: {
                    fill: '#ebc912',
                    stroke: '#ebc912',
                    "stroke-width": 5,
                    r: 3
                },
                hover: {
                    fill: '#ebc912',
                    stroke: '#ebc912',
                    "stroke-width": 4,
                    r: 6
                }
            },
            markers: offices,
            onRegionTipShow: function (e, label, code) {
                e.preventDefault();
            }
        });
    };




    /////////
    //SHOP///
    /////////

    $('.remove').html('<i class="far fa-trash-alt remove-from-cart"></i>');
    $('.removed').html('<i class="far fa-trash-alt remove-from-cart"></i>');
    // $(".woocommerce-mini-cart__buttons").click(function() { window.location = $(this).find("a").attr("href"); return false; });

    var className = $('.products-selection').parent().attr('class');
    $('.products-selection .toggle_view .full').on('click', function (e) {
        e.preventDefault();
        $('.products-selection .toggle_view .full.active').removeClass('active');
        $('.products-selection .toggle_view .grid.active').removeClass('active');
        $(this).closest('.' + className).removeClass(className).addClass('columns-1');
        $(this).addClass('active');
    });

    $('.products-selection .toggle_view .grid').on('click', function (e) {
        e.preventDefault();
        $('.products-selection .toggle_view .full.active').removeClass('active');
        $('.products-selection .toggle_view .grid.active').removeClass('active');
        $(this).closest('.columns-1').removeClass('columns-1').addClass(className);
        $(this).addClass('active');
    });



    var $product = $('.products').find('.product');
    $product.find('.woocommerce-LoopProduct-link:first').after('<div class="product-wrap"></div>');
    $product.each(function () {
        var product = $(this);
        var $title = product.find('h2');
        var $rating = product.find('.star-rating');
        var $price = product.find('.price');
        var $btn = product.find('.button');
        var $disc= product.find('.product-description-short');


        product.find('.product-wrap').append($title);
        product.find('.product-wrap').append($rating);
        product.find('.product-wrap').append($disc);
        product.find('.product-wrap').append($price);
        product.find('.product-wrap').append($btn);

    });

    var $product = $('.product.type-product');
    $product.find('.entry-summary .quantity input').before('<input type="button" value="+" class="plus"><i class="fas fa-caret-up"></i>');
    $product.find('.entry-summary .quantity').append('<input type="button" value="-" class="minus"><i class="fas fa-caret-down"></i>');


    var $shopTable = $('.shop_table_responsive');

    $shopTable.find('.product-quantity .quantity input').before('<input type="button" value="+" class="plus"><i class="fas fa-caret-up"></i>');
    $shopTable.find('.product-quantity .quantity').append('<input type="button" value="-" class="minus"><i class="fas fa-caret-down"></i>');


    $('.plus, .minus').on('click', function (e) {
        var numberField = $(this).parent().find('[type="number"]');
        // var priceField = $(this).parent().parent().parent().find('.product-price').find('.price');
        // var amountField = $(this).parent().parent().parent().find('.product-subtotal').find('.amount');

        var currentVal = numberField.val();
        var sign = $(this).val();
        if (sign === '-') {
            if (currentVal > 1) {
                numberField.val(parseFloat(currentVal) - 1);
                let newqty = parseFloat(currentVal) -1;
                let productId =  parseFloat(numberField.attr('data-update-id'));
                updateCart(productId, newqty);
            }
        } else {
            numberField.val(parseFloat(currentVal) + 1);
            let newqty = parseFloat(currentVal) +1;
            let productId =  parseFloat(numberField.attr('data-update-id'));
            updateCart(productId, newqty);
        }
    });

    $('#toggle_shop_view').on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('grid-view');
        $('#products').toggleClass('grid-view list-view');
    });


    //checkout collapse forms - only for HTML
    $('a.showlogin, a.showcoupon').on('click', function (e) {
        e.preventDefault();
        var $form = $(this).parent().next();

        if ($form.css('display') === 'none') {
            $form.show(150);
        } else {
            $form.hide(150);
        }
    });


    // remove product from cart - only for HTML
    $('a.remove').on('click', function (e) {
        e.preventDefault();
        $(this).closest('tr, .media').remove();
    });


    //flexslider - only for HTML
    $('.images').flexslider({
        animation: "slide",
        controlNav: "thumbnails",
        selector: "figure > div",
        directionNav: false,
    });

    //tabs - only for HTML
    $('.wc-tab, .woocommerce-tabs .panel:not(.panel .panel)').hide();

    $('.wc-tabs li a, ul.tabs li a').on('click', function (e) {
        e.preventDefault();
        var $tab = $(this);
        var $tabs_wrapper = $tab.closest('.wc-tabs-wrapper, .woocommerce-tabs');
        var $tabs = $tabs_wrapper.find('.wc-tabs, ul.tabs');

        $tabs.find('li').removeClass('active');
        $tabs_wrapper.find('.wc-tab, .panel:not(.panel .panel)').hide();

        $tab.closest('li').addClass('active');
        $tabs_wrapper.find($tab.attr('href')).show();
    });
    // Review link
    $('a.woocommerce-review-link').on('click', function () {
        $('.reviews_tab a').trigger('click');
        return true;
    });

    //parsing URL hash
    var hash = window.location.hash;
    var url = window.location.href;
    var $tabs = $('.wc-tabs, ul.tabs').first();

    if (hash.toLowerCase().indexOf('comment-') >= 0 || hash === '#reviews' || hash === '#tab-reviews') {
        $tabs.find('li.reviews_tab a').trigger('click');
    } else if (url.indexOf('comment-page-') > 0 || url.indexOf('cpage=') > 0) {
        $tabs.find('li.reviews_tab a').trigger('click');
    } else if (hash === '#tab-additional_information') {
        $tabs.find('li.additional_information_tab a').trigger('click');
    } else {
        $tabs.find('li:first a').trigger('click');
    }


    //price filter - only for HTML
    if ($().slider) {
        var $rangeSlider = $(".slider-range-price");
        if ($rangeSlider.length) {
            var $priceMin = $(".slider_price_min");
            var $priceMax = $(".slider_price_max");
            $rangeSlider.slider({
                range: true,
                min: 0,
                max: 100000,
                values: [1500, 30000],
                slide: function (event, ui) {
                    $priceMin.val(ui.values[0]);
                    $priceMax.val(ui.values[1]);
                }
            });
            $priceMin.val($rangeSlider.slider("values", 0));
            $priceMax.val($rangeSlider.slider("values", 1));
        }
    }


    //woocommerce related products, upsells products
    $('.related.products ul.products, .upsells.products ul.products, .cross-sells ul.products')
        .addClass('owl-carousel top-right-nav')
        .owlCarousel({
            loop: true,
            autoplay: true,
            margin: 20,
            nav: false,
            dots: false,
            items: 3,
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                767: {
                    items: 2
                },
                992: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });

    //color filter
    $(".color-filters").find("a[data-background-color]").each(function () {
        $(this).css({"background-color": $(this).data("background-color")});
    });
    ////////////////
    // end of SHOP//
    ////////////////


    //Unyson or other messages modal
    var $messagesModal = $('#messages_modal');
    if ($messagesModal.find('ul').length) {
        $messagesModal.modal('show');
    }

    //page preloader
    $(".preloaderimg").fadeOut(150);
    $(".preloader").fadeOut(150).delay(50, function () {
        $(this).remove();
    });
}//eof windowLoadInit

