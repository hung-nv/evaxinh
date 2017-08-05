jQuery(document).ready(function($) {
    'use-strict';

    function ROsmoothScroll() {
        if (navigator.appVersion.indexOf("Mac") == -1) {
            $('body').append("<script src='vendors/smooth-scroll/SmoothScroll.js'></script>");
        }
    }
    ROsmoothScroll();

    function ROtouchNav() {
        if ($('html').hasClass('touch')) {
            $('#ro-main-nav .ro-sub-nav').siblings('a').on('click', function() {
                return false;
            });
        }
    }
    ROtouchNav();

    function RObackTop() {
        $('#ro-backtop').on('click', function() {
            $('html,body').animate({
                scrollTop: 0
            }, 400);
        });

        if ($(window).scrollTop() > 300) {
            $('#ro-backtop').addClass('ro-show');
        } else {
            $('#ro-backtop').removeClass('ro-show');
        }

        $(window).on('scroll', function() {

            if ($(window).scrollTop() > 300) {
                $('#ro-backtop').addClass('ro-show');
            } else {
                $('#ro-backtop').removeClass('ro-show');
            }
        });
    }
    RObackTop();

    function ROtesttimonialSlider($elem) {
        if ($elem.length) {
            $elem.flexslider({
                controlNav: false,
                directionNav: true
            });
        }
    }
    ROtesttimonialSlider($('#ro-testimonial-slider'));

    function ROtextEllipsis() {
        $(".ro-ellipsis").each(function() {
            $(this).dotdotdot();
        });
        $(window).on('resize', function() {
            $(".ro-ellipsis").each(function() {
                $(this).dotdotdot();
            });
        });
    }
    ROtextEllipsis();

    function RODismissBlogNote(){
        $('.ro-dismiss-thisnote').on('click', function() {
            $(this).parent('.ro-note').hide();
            return false;
            /* Act on the event */
        });
    }
    RODismissBlogNote();

    function ROratingStar() {
        $('.ro-rating').each(function() {
            var point = $(this).attr('data-rating');
            if (point == 5) {
                $(this).children().addClass('ro-rated');
            } else {
                $(this).children().eq(point).prevAll().addClass('ro-rated');
            }
        });
    }
    ROratingStar();

    function ROhomeSlider1() {
        var _SlideshowTransitions = [
            //Fade
            {
                $Duration: 1200,
                $Opacity: 2
            }
        ];

        var _CaptionTransitions = [];
        _CaptionTransitions.L = {
            $Duration: 800,
            x: 0.6,
            $Easing: {
                $Left: $JssorEasing$.$EaseInOutSine
            },
            $Opacity: 2
        };
        _CaptionTransitions.FADE = {
            $Duration: 900,
            $Opacity: 2
        };
        _CaptionTransitions.R = {
            $Duration: 800,
            x: -0.6,
            $Easing: {
                $Left: $JssorEasing$.$EaseInOutSine
            },
            $Opacity: 2
        };
        _CaptionTransitions.T = {
            $Duration: 800,
            y: 0.6,
            $Easing: {
                $Top: $JssorEasing$.$EaseInOutSine
            },
            $Opacity: 2
        };
        _CaptionTransitions.B = {
            $Duration: 800,
            y: -0.6,
            $Easing: {
                $Top: $JssorEasing$.$EaseInOutSine
            },
            $Opacity: 2
        };

        var options = {
            $AutoPlay: true, //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
            $DragOrientation: 3, //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
            $CaptionSliderOptions: { //[Optional] Options which specifies how to animate caption
                $Class: $JssorCaptionSlider$, //[Required] Class to create instance to animate caption
                $CaptionTransitions: _CaptionTransitions, //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
                $PlayInMode: 1, //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
                $PlayOutMode: 3 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
            },
            $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$, //[Required] Class to create instance of slideshow
                $Transitions: _SlideshowTransitions, //[Required] An array of slideshow transitions to play slideshow
                $TransitionsOrder: 1, //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                $ShowLink: true //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
            },
        };

        var jssor_slider1 = new $JssorSlider$("ro-slider-style-1", options);

        function ROresponsiveHomeSlider() {
            var parentWidth = $('#ro-slider-style-1').parent().width();
            if (parentWidth) {
                jssor_slider1.$ScaleWidth(parentWidth);
            } else
                window.setTimeout(ROresponsiveHomeSlider, 30);
        }

        ROresponsiveHomeSlider();
        $(window).on('resize', function() {
            ROresponsiveHomeSlider();
        });
    }

    if ($('#ro-slider-style-1').length) {
        ROhomeSlider1();
    }

    function ROhomeSlider2() {
        var _SlideshowTransitions = [
            //Fade
            {
                $Duration: 1200,
                $Opacity: 2
            }
        ];

        var _CaptionTransitions = [];
        _CaptionTransitions.L = {
            $Duration: 800,
            x: 0.6,
            $Easing: {
                $Left: $JssorEasing$.$EaseInOutSine
            },
            $Opacity: 2
        };
        _CaptionTransitions.R = {
            $Duration: 800,
            x: -0.6,
            $Easing: {
                $Left: $JssorEasing$.$EaseInOutSine
            },
            $Opacity: 2
        };
        _CaptionTransitions.T = {
            $Duration: 800,
            y: 0.6,
            $Easing: {
                $Top: $JssorEasing$.$EaseInOutSine
            },
            $Opacity: 2
        };
        _CaptionTransitions.B = {
            $Duration: 800,
            y: -0.6,
            $Easing: {
                $Top: $JssorEasing$.$EaseInOutSine
            },
            $Opacity: 2
        };

        var options = {
            $AutoPlay: true, //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
            $DragOrientation: 3, //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
            $CaptionSliderOptions: { //[Optional] Options which specifies how to animate caption
                $Class: $JssorCaptionSlider$, //[Required] Class to create instance to animate caption
                $CaptionTransitions: _CaptionTransitions, //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
                $PlayInMode: 1, //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
                $PlayOutMode: 3 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
            },
            $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$, //[Required] Class to create instance of slideshow
                $Transitions: _SlideshowTransitions, //[Required] An array of slideshow transitions to play slideshow
                $TransitionsOrder: 1, //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                $ShowLink: true //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
            }
        };

        var jssor_slider2 = new $JssorSlider$("ro-slider-style-2", options);

        function ROresponsiveHomeSlider() {
            var parentWidth = $('#ro-slider-style-2').parent().width();
            if (parentWidth) {
                jssor_slider2.$ScaleWidth(parentWidth);
            } else
                window.setTimeout(ROresponsiveHomeSlider, 30);
        }

        ROresponsiveHomeSlider();
        $(window).on('resize', function() {
            ROresponsiveHomeSlider();
        });


        var listBG = ['#ABDCE1', '#DEB6B6'];
        var currentBackgroud;
        jssor_slider2.$On($JssorSlider$.$EVT_SWIPE_END, function(slideIndex) {
            currentBackgroud = listBG[Math.abs(jssor_slider2.$CurrentIndex())];
            $('#ro-slider-style2-background').css('background-color', currentBackgroud);
        });
    }
    if ($('#ro-slider-style-2').length) {
        ROhomeSlider2();
    }

    function RODatePicker() {
        if ($('.ro-date-picker').length) {
            $('.ro-date-picker').datepicker();
        }
    }
    RODatePicker();

    function ROcountdownClock() {
        $('.ro-countdown-clock').each(function() {
            var countdownTime = $(this).attr('data-countdown');
            $(this).countdown({
                until: countdownTime,
                format: 'ODHMS',
                padZeroes: true
            });
        });
    }
    ROcountdownClock();

    function ROmainNav() {
        $('#ro-hamburger').on('click', function() {
            $('body').toggleClass('ro-main-nav-opened');
        });
    }
    ROmainNav();

    function ROscroller() {}
    ROscroller();

});