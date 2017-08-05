var OSThemes = OSThemes || {};
(function($) {
    "use strict";

    var $window = $(window),
        $body = $('body'),
        isRTL = $body.data('rtl') ? true : false,
        deviceAgent = navigator.userAgent.toLowerCase(),
        isMobile = deviceAgent.match(/(iphone|ipod|android|iemobile)/),
        isMobileAlt = deviceAgent.match(/(iphone|ipod|ipad|android|iemobile)/),
        isAppleDevice = deviceAgent.match(/(iphone|ipod|ipad)/),
        isIEMobile = deviceAgent.match(/(iemobile)/);


    OSThemes.common = {
        init: function() {
            OSThemes.common.owlCarousel();
            OSThemes.common.stellar();
            OSThemes.common.magicLine();
            OSThemes.common.tooltip();
            OSThemes.common.fill_service_data();
            OSThemes.common.select2();
            OSThemes.common.autoSelectService();

        },
        owlCarousel: function() {
            $('div.owl-carousel:not(.manual):not(.owl-loaded)').each(function() {
                var slider = $(this);
                var defaults = {
                    items: 4,
                    nav: false,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    dots: false,
                    loop: true,
                    center: false,
                    mouseDrag: true,
                    touchDrag: true,
                    pullDrag: true,
                    freeDrag: false,
                    margin: 0,
                    stagePadding: 0,
                    merge: false,
                    mergeFit: true,
                    autoWidth: false,
                    startPosition: 0,
                    rtl: isRTL,
                    smartSpeed: 250,
                    fluidSpeed: false,
                    dragEndSpeed: false,
                    autoplayHoverPause: true
                };

                var config = $.extend({}, defaults, slider.data("plugin-options"));
                // Initialize Slider
                slider.owlCarousel(config);

                slider.on('initialized.owl.carousel', function(event) {
                    OSThemes.common.owlCarousel();
                });
            });
        },
        isDesktop: function() {
            var responsive_breakpoint = 991;
            var $menu = $('.x-nav-menu');
            if (($menu.length > 0) && (typeof ($menu.attr('responsive-breakpoint')) != "undefined") && !isNaN(parseInt($menu.attr('responsive-breakpoint'), 10))) {
                responsive_breakpoint = parseInt($menu.attr('responsive-breakpoint'), 10);
            }
            return window.matchMedia('(min-width: ' + (responsive_breakpoint + 1) + 'px)').matches;
        },
        stellar: function() {
            $.stellar({
                horizontalScrolling: false,
                scrollProperty: 'scroll',
                positionProperty: 'position',
                responsive: false
            });
        },
        prettyPhoto: function() {
            $("a[data-rel^='prettyPhoto']").prettyPhoto({
                hook: 'data-rel',
                social_tools: '',
                animation_speed: 'normal',
                theme: 'light_square'
            });
        },
        magicLine: function() {
            $('.magic-line-container').each(function() {
                var activeItem = $('li.active', this);
                var topMagicLine = $('.top.magic-line', $(activeItem).parent());
                var bottomMagicLine = $('.bottom.magic-line', $(activeItem).parent());
                topMagicLine.hide();
                bottomMagicLine.hide();
                setTimeout(function() {
                    OSThemes.common.magicLineSetPosition(activeItem);
                    topMagicLine.show();
                    bottomMagicLine.show();
                }, 100);


                $('li', this).hover(function() {
                    if (!$(this).hasClass('none-magic-line')) {
                        OSThemes.common.magicLineSetPosition(this);
                    }
                }, function() {
                    if (!$(this).hasClass('none-magic-line')) {
                        OSThemes.common.magicLineReturnActive(this);
                    }
                });
            });
        },
        magicLineSetPosition: function(item) {
            if (item != null && item != 'undefined') {
                var left = 0;
                var $padding_left = $(item).css("padding-left");
                if (typeof $padding_left != 'undefined') {
                    $padding_left = $padding_left.replace("px", "");

                    $padding_left = parseInt($padding_left);
                } else {
                    $padding_left = 0;
                }
                if ($(item).position() != null)
                    left = $(item).position().left + $padding_left;

                var marginLeft = $(item).css('margin-left');
                var marginRight = $(item).css('margin-right');

                var topMagicLine = $('.top.magic-line', $(item).parent());
                var bottomMagicLine = $('.bottom.magic-line', $(item).parent());
                if (topMagicLine != null && topMagicLine != 'undefined') {
                    $(topMagicLine).css('left', left);
                    $(topMagicLine).css('width', $(item).width());
                    $(topMagicLine).css('margin-left', marginLeft);
                    $(topMagicLine).css('margin-right', marginRight);
                }
                if (bottomMagicLine != null && bottomMagicLine != 'undefined') {
                    $(bottomMagicLine).css('left', left);
                    $(bottomMagicLine).css('width', $(item).width());
                    $(bottomMagicLine).css('margin-left', marginLeft);
                    $(bottomMagicLine).css('margin-right', marginRight);
                }
            }
        },
        magicLineReturnActive: function(current_item) {
            if (!$(current_item).hasClass('active')) {
                var activeItem = $('li.active', $(current_item).parent());
                OSThemes.common.magicLineSetPosition(activeItem);
            }
        },
        showLoading: function() {
            $body.addClass('overflow-hidden');
            if ($('.loading-wrapper').length == 0) {
                $body.append('<div class="loading-wrapper"><span class="spinner-double-section-far"></span></div>');
            }
        },
        hideLoading: function() {
            $('.loading-wrapper').fadeOut(function() {
                $('.loading-wrapper').remove();
                $('body').removeClass('overflow-hidden');
            });
        },
        tooltip: function() {
            if ($().tooltip && !isMobileAlt) {
                if (!$body.hasClass('woocommerce-compare-page')) {
                    $('[data-toggle="tooltip"]').tooltip();
                }
                $('.yith-wcwl-wishlistexistsbrowse,.yith-wcwl-add-button,.yith-wcwl-wishlistaddedbrowse', '.product-actions').tooltip({
                    title: 'WishList'
                });
            }
        },
        isIE: function() {
            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");

            if (msie || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
                return true;
            }
            return false;
        },
        fill_service_data: function() {
            if (typeof(osthemes_framework_service_data) !== 'undefined') {
                osthemes_framework_service_data.forEach(function(e) {
                    $('.service-data').append($('<option>', {
                        value: e,
                        text: e
                    }));
                })
            }
        },
        select2: function() {
            var $sv_placeholder = 'Services';
            if (typeof (osthemes_framework_reservation_servicepicker_placeholder) !== 'undefined') {
                $sv_placeholder = osthemes_framework_reservation_servicepicker_placeholder;
            }
            $(".service-data").select2({
                placeholder: $sv_placeholder,
                allowClear: true,
                width: '100%'
            });
        },
        getURLParam: function(param) {
            var vars = {};
            window.location.href.replace(location.hash, '').replace(
                /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
                function(m, key, value) { // callback
                    vars[key] = value !== undefined ? value : '';
                }
            );

            if (param) {
                return vars[param] ? vars[param] : null;
            }
            return vars;
        },
        autoSelectService: function() {
            if (typeof (osthemes_framework_auto_select) !== 'undefined' && osthemes_framework_auto_select == '1') {
                var $service_name = decodeURI(OSThemes.common.getURLParam('service-name'));
                if ($service_name !== null) {
                    $(".service-data").val($service_name).change();
                }
            }
        }

    };


    OSThemes.page = {
        init: function() {
            OSThemes.page.pageTransition();
            OSThemes.page.footerParallax();
            OSThemes.page.topDrawer();
            OSThemes.page.events();
            OSThemes.page.backToTop();
            OSThemes.page.setWidgetCollapse();
            //OSThemes.page.pageTitleBackgroundParallax();
        },
        events: function() {
        },
        windowLoad: function() {
            OSThemes.page.setPositionPageTitle();
            OSThemes.page.fadePageIn();
        },
        windowResized: function() {
            OSThemes.page.footerParallax();
            OSThemes.page.setPositionPageTitle();
            OSThemes.page.setWidgetCollapse();
            //OSThemes.page.pageTitleBackgroundParallax();
        },
        setPositionPageTitle: function() {
            var $sectionTitle = $('#page-title');
            if (!OSThemes.common.isDesktop()) {
                if ($('#mobile-header-wrapper').hasClass('mobile-header-float')) {
                    var headerHeight = $('#mobile-header-wrapper').outerHeight();
                    $sectionTitle.css('padding-top', headerHeight);
                }
                else {
                    $sectionTitle.css('padding-top', '');
                }
            }
            else {
                if ($('body').hasClass('header-is-float')) {
                    if ($sectionTitle != null && typeof $sectionTitle != 'undefined') {
                        var headerHeight = $('header.main-header').outerHeight();
                        $sectionTitle.css('padding-top', headerHeight);
                    }
                }
                else {
                    $sectionTitle.css('padding-top', '');
                }
            }
        },
        footerParallax: function() {
            var $footer = $('footer.main-footer-wrapper'),
                headerSticky = $('header.main-header .sticky-wrapper').length > 0 ? 60 : 0,
                $adminBar = $('#wpadminbar'),
                $adminBarHeight = $adminBar.length > 0 ? $adminBar.outerHeight() : 0;


            if (!$body.hasClass('page-template-coming-soon')) {
                if ($footer.hasClass('enable-parallax')) {
                    if ((OSThemes.common.isDesktop()) && ($window.height() >= ($footer.outerHeight() + headerSticky + $adminBarHeight))) {
                        $body.css({
                            'padding-bottom': ($footer.outerHeight()) + 'px'
                        });
                        $body.removeClass('footer-static');
                    } else {
                        $body.addClass('footer-static');
                        $body.css({
                            'padding-bottom': '0px'
                        });
                    }
                }
            } else {
                $body.removeClass('footer-static');
            }
        },
        topDrawer: function() {
            $('.top-drawer-toggle').click(function() {
                var $topDrawerBar = $('#top-drawer-bar');
                $topDrawerBar.slideToggle('slow');
                $(this).toggleClass('open');
            });
        },
        backToTop: function() {
            var $backToTop = $('.back-to-top');
            if ($backToTop.length > 0) {
                $backToTop.click(function(event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: '0px'}, 800);
                });
                $window.on('scroll', function(event) {
                    var scrollPosition = $window.scrollTop();
                    var windowHeight = $window.height() / 2;
                    if (scrollPosition > windowHeight) {
                        $backToTop.addClass('in');
                    }
                    else {
                        $backToTop.removeClass('in');
                    }
                });
            }
        },
        setWidgetCollapse: function() {
            var windowWidth = $window.width();
            if (window.matchMedia('(max-width: 767px)').matches) {
                $('footer.footer-collapse-able aside.widget').each(function() {
                    var title = $('h4:first', this);
                    var content = $(title).next();
                    $(title).addClass('collapse');
                    if (content != null && content != 'undefined')
                        $(content).hide();
                    $(title).off();
                    $(title).click(function() {
                        var content = $(this).next();
                        if ($(this).hasClass('expanded')) {
                            $(this).removeClass('expanded');
                            $(title).addClass('collapse');
                            $(content).slideUp();
                        }
                        else {
                            $(this).addClass('expanded');
                            $(title).removeClass('collapse');
                            $(content).slideDown();
                        }

                    });

                });
            } else {
                $('footer aside.widget').each(function() {
                    var title = $('h4:first', this);
                    $(title).off();
                    var content = $(title).next();
                    $(title).removeClass('collapse');
                    $(title).removeClass('expanded');
                    $(content).show();
                });
            }
        },
        pageTransition: function() {
            if ($body.hasClass('page-transitions')) {
                var linkElement = '.animsition-link, a[href]:not([target="_blank"]):not([href^="#"]):not([href*="javascript"]):not([href*=".jpg"]):not([href*=".jpeg"]):not([href*=".gif"]):not([href*=".png"]):not([href*=".mov"]):not([href*=".swf"]):not([href*=".mp4"]):not([href*=".flv"]):not([href*=".avi"]):not([href*=".mp3"]):not([href^="mailto:"]):not([class*="no-animation"]):not([class*="prettyPhoto"]):not([class*="add_to_wishlist"]):not([class*="add_to_cart_button"])';
                $(linkElement).on('click', function(event) {
                    event.preventDefault();
                    var $self = $(this);
                    var url = $self.attr('href');

                    // middle mouse button issue #24
                    // if(middle mouse button || command key || shift key || win control key)
                    if (event.which === 2 || event.metaKey || event.shiftKey || navigator.platform.toUpperCase().indexOf('WIN') !== -1 && event.ctrlKey) {
                        window.open(url, '_blank');
                    } else {
                        OSThemes.page.fadePageOut(url);
                    }

                });
            }
        },
        fadePageIn: function() {
            if ($body.hasClass('page-loading')) {
                var preloadTime = 1000,
                    $loading = $('.site-loading');
                $loading.css('opacity', '0');
                setTimeout(function() {
                    $loading.css('display', 'none');
                }, preloadTime);
            }
        },
        fadePageOut: function(link) {

            $('.site-loading').css('display', 'block').animate({
                opacity: 1,
                delay: 200
            }, 600, "linear");

            $('html,body').animate({scrollTop: '0px'}, 800);

            setTimeout(function() {
                window.location = link;
            }, 600);
        },
        pageTitleBackgroundParallax: function() {
            var windowWidth = $window.width();
            $('.page-title-parallax').css('background-size', windowWidth + 'px');
        }
    };

    OSThemes.portfolio = {
        init: function() {

        }
    };

    OSThemes.blog = {
        init: function() {
            OSThemes.blog.jPlayerSetup();
            OSThemes.blog.infiniteScroll();
            OSThemes.blog.loadMore();
            OSThemes.blog.gridLayout();
            setInterval(OSThemes.blog.gridLayout, 300);
            OSThemes.blog.masonryLayout();
            setInterval(OSThemes.blog.masonryLayout, 300);
            OSThemes.blog.likeComment();
            OSThemes.blog.shareLinkButton();
        },
        windowResized: function() {
            OSThemes.blog.processWidthAudioPlayer();
        },
        jPlayerSetup: function() {
            $('.jp-jplayer').each(function() {
                var $this = $(this),
                    url = $this.data('audio'),
                    title = $this.data('title'),
                    type = url.substr(url.lastIndexOf('.') + 1),
                    player = '#' + $this.data('player'),
                    audio = {};
                audio[type] = url;
                audio['title'] = title;
                $this.jPlayer({
                    ready: function() {
                        $this.jPlayer('setMedia', audio);
                    },
                    swfPath: '../plugins/jquery.jPlayer',
                    cssSelectorAncestor: player
                });
            });
            OSThemes.blog.processWidthAudioPlayer();
        },
        processWidthAudioPlayer: function() {
            setTimeout(function() {
                $('.jp-audio .jp-type-single').each(function() {
                    var _width = $(this).outerWidth() - $('.jp-controls', this).outerWidth() - parseInt($('.jp-controls', this).css('margin-right').replace('px', ''), 10) - 25;
                    $('.jp-progress', this).width(_width);
                });
            }, 100);
        },
        infiniteScroll: function() {
            var contentWrapper = '.blog-inner';
            $('.blog-inner').infinitescroll({
                navSelector: "#infinite_scroll_button",
                nextSelector: "#infinite_scroll_button a",
                itemSelector: "article",
                animate: false,
                loading: {
                    'selector': '#infinite_scroll_loading',
                    'img': 'images/ajax-loader.gif',
                    'msgText': 'Loading...',
                    'finishedMsg': ''
                },
                bufferPx: 1000,
                extraScrollPx: 0
            }, function(newElements, data, url) {
                var $newElems = $(newElements).css({
                    opacity: 0
                });
                $newElems.imagesLoaded(function() {
                    OSThemes.common.owlCarousel();
                    OSThemes.blog.jPlayerSetup();
                    OSThemes.common.prettyPhoto();
                    $newElems.animate({
                        opacity: 1
                    });


                    if ($(contentWrapper).hasClass('blog-style-masonry') || $(contentWrapper).hasClass('blog-style-grid')) {
                        $(contentWrapper).isotope('appended', $newElems);
                        setTimeout(function() {
                            $(contentWrapper).isotope('layout');
                        }, 400);
                    }
                });

            });
        },
        loadMore: function() {
            $('.blog-load-more').on('click', function(event) {
                event.preventDefault();
                var $this = $(this).button('loading');
                var link = $(this).attr('data-href');
                var contentWrapper = '.blog-inner';
                var element = 'article';

                $.get(link, function(data) {
                    var next_href = $('.blog-load-more', data).attr('data-href');
                    var $newElems = $(element, data).css({
                        opacity: 0
                    });

                    $(contentWrapper).append($newElems);
                    $newElems.imagesLoaded(function() {
                        OSThemes.common.owlCarousel();
                        OSThemes.blog.jPlayerSetup();
                        OSThemes.common.prettyPhoto();

                        $newElems.animate({
                            opacity: 1
                        });

                        if (($(contentWrapper).hasClass('blog-style-masonry')) || ($(contentWrapper).hasClass('blog-style-grid'))) {
                            $(contentWrapper).isotope('appended', $newElems);
                            setTimeout(function() {
                                $(contentWrapper).isotope('layout');
                            }, 400);
                        }

                    });


                    if (typeof(next_href) == 'undefined') {
                        $this.parent().remove();
                    } else {
                        $this.button('reset');
                        $this.attr('data-href', next_href);
                    }

                });
            });
        },
        gridLayout: function() {
            var $blog_grid = $('.blog-style-grid');
            $blog_grid.imagesLoaded(function() {
                $blog_grid.isotope({
                    itemSelector: 'article',
                    layoutMode: "fitRows",
                    isOriginLeft: !isRTL
                });
                setTimeout(function() {
                    $blog_grid.isotope('layout');
                }, 500);
            });
        },
        masonryLayout: function() {
            var $blog_masonry = $('.blog-style-masonry');
            $blog_masonry.imagesLoaded(function() {
                $blog_masonry.isotope({
                    itemSelector: 'article',
                    layoutMode: "masonry",
                    isOriginLeft: !isRTL
                });

                setTimeout(function() {
                    $blog_masonry.isotope('layout');
                }, 500);
            });
        },
        likeComment: function() {
            $(document).on('click', 'a[data-like-comment="true"]:not(".liked")', function(event) {
                event.preventDefault();
                var $this = $(this);
                var id = $(this).data('id');
                var comment_liked = $.cookie('osthemes_comment_liked');
                if (typeof(comment_liked) != "undefined" && comment_liked.indexOf('|' + id + '|') >= 0) {
                    return;
                }
                $.ajax({
                    url: osthemes_framework_ajax_url,
                    data: {
                        action: 'blog_comment_like',
                        id: id
                    },
                    success: function(data) {
                        var comment_liked = $.cookie('osthemes_comment_liked');
                        if (typeof(comment_liked) == "undefined") {
                            comment_liked = '|' + id + '|';
                        } else {
                            comment_liked += id + '|';
                        }
                        $.cookie('osthemes_comment_liked', comment_liked, {path: '/'});
                        $this.addClass('liked');
                        $('label', $this).text(data);
                    }
                });
            });
        },
        shareLinkButton: function() {
            $(document).delegate(".share-link", "click", function(e) {
                e.preventDefault();
                var wrapper = $(this).closest('.social-share-wrap').find('.social-profile');
                console.log(wrapper);
                wrapper.toggleClass('show-it');
            });
            $(document).on('click', function(event) {
                if (($(event.target).closest('.social-share-wrap').length == 0)) {
                    $('.social-profile').removeClass('show-it');
                }
            });

        }

    };

    OSThemes.search = {
        up: function($wrapper) {
            var $item = $('li.selected', $wrapper);
            console.log($item, $wrapper);
            if ($('li', $wrapper).length < 2)
                return;
            var $prev = $item.prev();
            $item.removeClass('selected');
            if ($prev.length) {
                $prev.addClass('selected');
            }
            else {
                $('li:last', $wrapper).addClass('selected');
                $prev = $('li:last', $wrapper);
            }
            var $ajaxSearchResult = $(' > ul', $wrapper);

            if ($prev.position().top < $ajaxSearchResult.scrollTop()) {
                $ajaxSearchResult.scrollTop($prev.position().top);
            }
            else if ($prev.position().top + $prev.outerHeight() > $ajaxSearchResult.scrollTop() + $ajaxSearchResult.height()) {
                $ajaxSearchResult.scrollTop($prev.position().top - $ajaxSearchResult.height() + $prev.outerHeight());
            }
        },
        down: function($wrapper) {
            var $item = $('li.selected', $wrapper);
            if ($('li', $wrapper).length < 2)
                return;
            var $next = $item.next();
            $item.removeClass('selected');
            if ($next.length) {
                $next.addClass('selected');
            }
            else {
                $('li:first', $wrapper).addClass('selected');
                $next = $('li:first', $wrapper);
            }
            var $ajaxSearchResult = $('> ul', $wrapper);

            if ($next.position().top < $ajaxSearchResult.scrollTop()) {
                $ajaxSearchResult.scrollTop($next.position().top);
            }
            else if ($next.position().top + $next.outerHeight() > $ajaxSearchResult.scrollTop() + $ajaxSearchResult.height()) {
                $ajaxSearchResult.scrollTop($next.position().top - $ajaxSearchResult.height() + $next.outerHeight());
            }
        }
    };

    OSThemes.header = {
        timeOutSearch: null,
        init: function() {
            OSThemes.header.stickyHeader();
            OSThemes.header.menuOnePage();
            OSThemes.header.menuMobile();
            OSThemes.header.events();
            OSThemes.header.headerLeftPosition();
            OSThemes.header.headerOverlay();
            OSThemes.header.canvasMenu();
        },
        events: function() {
            // Anchors Position
            $("a[data-hash]").on("click", function(e) {
                e.preventDefault();
                OSThemes.page.anchorsPosition(this);
                return false;
            });

            // Sroll bar header mobile
            $('#mobile-header-wrapper .header-mobile-nav').perfectScrollbar({
                wheelSpeed: 0.5,
                suppressScrollX: true
            });
        },
        windowResized: function() {
            OSThemes.header.stickyHeader();
            OSThemes.header.headerNavSpacing(1);
            if (OSThemes.common.isDesktop()) {
                $('.toggle-icon-wrapper[data-drop]').removeClass('in');
            }
            var $adminBar = $('#wpadminbar');

            if ($adminBar.length > 0) {
                $body.attr('data-offset', $adminBar.outerHeight() + 1);
            }
            if ($adminBar.length > 0) {
                $body.attr('data-offset', $adminBar.outerHeight() + 1);
            }
            OSThemes.header.headerMobileFlyPosition();
            OSThemes.header.headerMobilePosition();
            OSThemes.header.changeSubMenuMultiHeight();
        },
        windowLoad: function() {
            OSThemes.header.headerNavSpacing(1);
            OSThemes.header.headerLeftScrollBar();
            OSThemes.header.headerMobileFlyPosition();
            OSThemes.header.headerMobilePosition();
            OSThemes.header.fixStickyLogoSize();
            OSThemes.header.changeSubMenuMultiHeight();
        },
        fixStickyLogoSize: function() {
            // if IE
            if (OSThemes.common.isIE()) {
                var $logo = $("header .logo-sticky img");
                if ($logo.length == 0) {
                    return;
                }
                var logo_url = $logo.attr('src');
                if (logo_url.length - logo_url.lastIndexOf('.svg') != 4) {
                    return;
                }
                $.get(logo_url, function(svgxml) {
                    /* now with access to the source of the SVG, lookup the values you want... */
                    var attrs = svgxml.documentElement.attributes;

                    var pic_real_width = attrs.width.value;   // Note: $(this).width() will not
                    var pic_real_height = attrs.height.value; // work for in memory images.

                    if (typeof (pic_real_width) == "string") {
                        pic_real_width = pic_real_width.replace('px', '');
                        pic_real_width = parseInt(pic_real_width, 10);
                    }
                    if (typeof (pic_real_height) == "string") {
                        pic_real_height = pic_real_height.replace('px', '');
                        pic_real_height = parseInt(pic_real_height, 10);
                    }

                    if (pic_real_height > 0) {
                        $logo.css('width', (pic_real_width * 30 / pic_real_height) + 'px');
                    }
                }, "xml");

            }
        },
        headerMobileFlyPosition: function() {
            var top = 0;
            if (($('#wpadminbar').length > 0) && ($('#wpadminbar').css('position') == 'fixed')) {
                top = $('#wpadminbar').outerHeight();
            }
            if (top > 0) {
                $('.header-mobile-nav.menu-drop-fly').css('top', top + 'px');
            }
            else {
                $('.header-mobile-nav.menu-drop-fly').css('top', '');
            }
        },
        headerMobilePosition: function() {
            var top = 0;
            if (($('#wpadminbar').length > 0) && ($('#wpadminbar').css('position') == 'fixed')) {
                top = $('#wpadminbar').outerHeight();
            }
            if (top > 0) {
                $('.header-mobile-nav.menu-drop-fly').css('top', top + 'px');
            }
            else {
                $('.header-mobile-nav.menu-drop-fly').css('top', '');
            }
        },
        headerLeftPosition: function() {
            var top = 0;
            if ($('#wpadminbar').length > 0) {
                top = $('#wpadminbar').outerHeight();
            }
            if (top > 0) {
                $('header.header-left').css('top', top + 'px');
            }
        },
        stickyHeader: function() {
            var topSticky = 0,
                $adminBar = $('#wpadminbar');

            if (($adminBar.length > 0) && ($adminBar.css('position') == 'fixed')) {
                topSticky = $adminBar.outerHeight();
            }

            $('.header-sticky, .header-mobile-sticky').unstick();

            var topSpacing = topSticky;

            if (OSThemes.common.isDesktop()) {
                topSpacing = -$(window).height() + 132; // 66 sticky height
                $('.header-sticky').sticky({
                    topSpacing: topSpacing,
                    topSticky: topSticky,
                    change: function() {
                        OSThemes.header.headerNavSpacing(1);
                        $('header.main-header .x-nav-menu > li').each(function() {
                            APP_XMENU.process_menu_position(this);
                        });
                    }
                });
            }
            else {
                $('.header-mobile-sticky').sticky({topSpacing: topSpacing, topSticky: topSticky});
            }
        },
        menuOnePage: function() {
            $('.menu-one-page').onePageNav({
                currentClass: 'menu-current',
                changeHash: false,
                scrollSpeed: 750,
                scrollThreshold: 0,
                filter: '',
                easing: 'swing'
            });
        },
        anchorsPosition: function(obj, time) {
            var target = $(obj).attr("href");
            if ($(target).length > 0) {
                var _scrollTop = $(target).offset().top,
                    $adminBar = $('#wpadminbar');
                if ($adminBar.length > 0) {
                    _scrollTop -= $adminBar.outerHeight();
                }
                $("html,body").animate({scrollTop: _scrollTop}, time, 'swing', function() {

                });
            }
        },
        menuMobile: function() {
            $('.toggle-mobile-menu[data-ref]').click(function(event) {
                event.preventDefault();
                var $this = $(this);
                var data_drop = $this.data('ref');
                $this.toggleClass('in');
                switch ($this.data('drop-type')) {
                    case 'dropdown':
                        $('#' + data_drop).slideToggle();
                        break;
                    case 'fly':
                        $('body').toggleClass('menu-mobile-in');
                        $('#' + data_drop).toggleClass('in');
                        break;
                }

            });

            $('.toggle-icon-wrapper[data-ref]:not(.toggle-mobile-menu)').click(function(event) {
                event.preventDefault();
                var $this = $(this);
                var data_ref = $this.data('ref');
                $this.toggleClass('in');
                $('#' + data_ref).toggleClass('in');
            });

            $('.main-menu-overlay').click(function() {
                $body.removeClass('menu-mobile-in');
                $('#nav-menu-mobile').removeClass('in');
                $('.toggle-icon-wrapper[data-ref]').removeClass('in');
            });
        },
        search: function() {
            var $search_popup = $('#search_popup_wrapper');
            if (($search_popup.length > 0) && ($('header .icon-search-menu').data('search-type') == 'standard')) {
                var dlg_search = new DialogFx($search_popup[0]);
                $('header .icon-search-menu').click(dlg_search.toggle.bind(dlg_search));

            }

            $('header .icon-search-menu').click(function(event) {
                event.preventDefault();
                if ($(this).data('search-type') == 'ajax') {
                    OSThemes.header.searchPopupOpen();
                }
                else {
                    $('#search_popup_wrapper input[type="text"]').focus();
                }
            });

            $('.osthemes-dismiss-modal, .modal-backdrop', '#osthemes-modal-search').click(function() {
                OSThemes.header.searchPopupClose();
            });
            $('.osthemes-search-wrapper button > i.ajax-search-icon').click(function() {
                s_search();
            });

            // Search Ajax
            $('#search-ajax', '#osthemes-modal-search').on('keyup', function(event) {
                if (event.altKey || event.ctrlKey || event.shiftKey || event.metaKey) {
                    return;
                }

                var keys = ["Control", "Alt", "Shift"];
                if (keys.indexOf(event.key) != -1)
                    return;
                switch (event.which) {
                    case 27:	// ESC
                        OSThemes.header.searchPopupClose();
                        break;
                    case 38:	// UP
                        s_up();
                        break;
                    case 40:	// DOWN
                        s_down();
                        break;
                    case 13:	//ENTER
                        var $item = $('li.selected a', '#osthemes-modal-search');
                        if ($item.length == 0) {
                            event.preventDefault();
                            return false;
                        }
                        s_enter();
                        break;
                    default:
                        clearTimeout(OSThemes.header.timeOutSearch);
                        OSThemes.header.timeOutSearch = setTimeout(s_search, 500);
                        break;
                }
            });

            function s_up() {
                var $item = $('li.selected', '#osthemes-modal-search');
                if ($('li', '#osthemes-modal-search').length < 2)
                    return;
                var $prev = $item.prev();
                $item.removeClass('selected');
                if ($prev.length) {
                    $prev.addClass('selected');
                }
                else {
                    $('li:last', '#osthemes-modal-search').addClass('selected');
                    $prev = $('li:last', '#osthemes-modal-search');
                }
                if ($prev.position().top < $('#osthemes-modal-search .ajax-search-result').scrollTop()) {
                    $('#osthemes-modal-search .ajax-search-result').scrollTop($prev.position().top);
                }
                else if ($prev.position().top + $prev.outerHeight() > $('#osthemes-modal-search .ajax-search-result').scrollTop() + $('#osthemes-modal-search .ajax-search-result').height()) {
                    $('#osthemes-modal-search .ajax-search-result').scrollTop($prev.position().top - $('#osthemes-modal-search .ajax-search-result').height() + $prev.outerHeight());
                }
            }

            function s_down() {
                var $item = $('li.selected', '#osthemes-modal-search');
                if ($('li', '#osthemes-modal-search').length < 2)
                    return;
                var $next = $item.next();
                $item.removeClass('selected');
                if ($next.length) {
                    $next.addClass('selected');
                }
                else {
                    $('li:first', '#osthemes-modal-search').addClass('selected');
                    $next = $('li:first', '#osthemes-modal-search');
                }
                if ($next.position().top < $('#osthemes-modal-search .ajax-search-result').scrollTop()) {
                    $('#osthemes-modal-search .ajax-search-result').scrollTop($next.position().top);
                }
                else if ($next.position().top + $next.outerHeight() > $('#osthemes-modal-search .ajax-search-result').scrollTop() + $('#osthemes-modal-search .ajax-search-result').height()) {
                    $('#osthemes-modal-search .ajax-search-result').scrollTop($next.position().top - $('#osthemes-modal-search .ajax-search-result').height() + $next.outerHeight());
                }
            }

            function s_enter() {
                var $item = $('li.selected a', '#osthemes-modal-search');
                if ($item.length > 0) {
                    window.location = $item.attr('href');
                }
            }
        },

        headerNavSpacing: function(retryAmount) {
            if (typeof (retryAmount) == "undefined") {
                retryAmount = 0;
            }

            if (!OSThemes.common.isDesktop()) {
                OSThemes.header.changeStickyWrapperSize(3);
                return;
            }

            var arrConfig = {
                'header-1': {
                    container: 'header.main-header .header-container',
                    items: '> .header-logo, > .header-nav-right'
                },
                'header-2': {
                    container: 'header.main-header .header-nav-left, header.main-header .header-nav-right',
                    items: '> .header-customize'
                },
                'header-3': {
                    container: 'header.main-header .header-nav-left, header.main-header .header-nav-right',
                    items: '> .header-customize'
                },
                'header-4': {
                    container: 'header.main-header .header-container',
                    items: '> .header-nav-left, > .header-nav-right'
                },
                'header-5': {
                    container: 'header.main-header .header-container',
                    items: '> .header-nav-left, > .header-nav-right'
                },
                'header-6': {
                    container: 'header.main-header .header-container',
                    items: '> .header-nav-left, > .header-nav-right'
                }
            };

            var headerLayout = $('body').attr('data-header');

            if ((typeof (headerLayout) != "undefined") && (headerLayout != null) && (typeof (arrConfig[headerLayout]) != "undefined")) {
                $(arrConfig[headerLayout].container).each(function() {
                    var $container = $(this);
                    $('ul.main-menu > li', $container).css('margin-left', '');

                    var marginDefault = 40;
                    var containerWidth = $container.width();

                    var navItemCount = 0;

                    $('.x-nav-menu > li', $container).each(function() {
                        var $this = $(this);
                        if ($this.is(':visible')) {
                            navItemCount++;
                        }
                    });

                    var totalWidth = 0;
                    $(arrConfig[headerLayout].items, $container).each(function() {
                        var $this = $(this);
                        if ($this.is(':visible')) {
                            totalWidth += $this.outerWidth();
                        }
                    });

                    if (containerWidth < totalWidth) {
                        navItemCount--;

                        if (navItemCount > 0) {
                            console.log(marginDefault, totalWidth, containerWidth, navItemCount);
                            var marginLeft = marginDefault - (totalWidth - containerWidth + 40) * 1.0 / navItemCount;
                            if (marginLeft < 10) {
                                marginLeft = 10;
                            }
                            if (marginLeft < marginDefault) {
                                $('ul.main-menu > li', $container).not(':first').css('margin-left', marginLeft + 'px');
                            }
                        }
                    }
                });
            }

            OSThemes.header.changeStickyWrapperSize(3);

            if (retryAmount > 0) {
                setTimeout(function() {
                    OSThemes.header.headerNavSpacing(retryAmount - 1);
                }, 100);
            }
        },
        changeStickyWrapperSize: function(count) {
            var $sticky_wrapper = $('header.main-header .sticky-wrapper');
            if ($sticky_wrapper.length > 0) {
                $sticky_wrapper.height($(' > .header-sticky', $sticky_wrapper).outerHeight());
            }

            if (count > 0) {
                setTimeout(function() {
                    OSThemes.header.changeStickyWrapperSize(count - 1);
                }, 100);
            }
        },
        headerLeftScrollBar: function() {
            $('header.header-left').perfectScrollbar({
                wheelSpeed: 0.5,
                suppressScrollX: true
            });
        },

        headerOverlay: function() {
            $('.overlay-menu-wrapper .overlay-menu-inner').perfectScrollbar({
                wheelSpeed: 0.5,
                suppressScrollX: true
            });

            $('header.main-header .header-overlay-open').on('click', function() {
                $('header.main-header .header-overlay-open').toggleClass('in');
                $('.overlay-menu-wrapper').toggleClass('in');
            });
            $('header.main-header .header-overlay-close').on('click', function() {
                $('header.main-header .header-overlay-open').toggleClass('in');
                $('.overlay-menu-wrapper').toggleClass('in');
            });

        },
        canvasMenu: function() {
            $('nav.canvas-menu-wrapper').perfectScrollbar({
                wheelSpeed: 0.5,
                suppressScrollX: true
            });

            $(document).on('click', function(event) {
                if (($(event.target).closest('nav.canvas-menu-wrapper').length == 0)
                    && ($(event.target).closest('.canvas-menu-toggle')).length == 0) {
                    $('nav.canvas-menu-wrapper').removeClass('in');
                }
            });

            $('.canvas-menu-toggle').on('click', function(event) {
                event.preventDefault();
                $('nav.canvas-menu-wrapper').toggleClass('in');
            });
            $('.canvas-menu-close').on('click', function(event) {
                event.preventDefault();
                $('nav.canvas-menu-wrapper').removeClass('in');
            });
        },
        changeSubMenuMultiHeight: function() {
            if (OSThemes.common.isDesktop()) {
                $('.x-sub-menu-multi-column > li').css('height', '');

                $('.x-sub-menu-multi-column').each(function() {

                });
            }
            else {
                $('.x-sub-menu-multi-column > li').css('height', '');
            }
        }
    };

    OSThemes.footer = {
        init: function() {
            OSThemes.footer.scrollUp();
        },
        scrollUp: function() {
            var $scrollUp = $('.a-scroll-up', '.map-scroll-up');
            if ($scrollUp.length > 0) {
                $scrollUp.click(function(event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: '0px'}, 800);
                });
            }
        }
    };

    OSThemes.onReady = {
        init: function() {
            OSThemes.common.init();
            OSThemes.header.init();
            OSThemes.page.init();
            OSThemes.blog.init();
            OSThemes.portfolio.init();
            OSThemes.footer.init();
        }
    };

    OSThemes.onLoad = {
        init: function() {
            OSThemes.header.windowLoad();
            OSThemes.page.windowLoad();
        }
    };

    OSThemes.onResize = {
        init: function() {
            OSThemes.page.windowResized();
            OSThemes.header.windowResized();
            OSThemes.blog.windowResized();
        }
    };

    OSThemes.onScroll = {
        init: function() {

        }
    };

    $(window).resize(OSThemes.onResize.init);
    $(window).scroll(OSThemes.onScroll.init);
    $(document).ready(OSThemes.onReady.init);
    $(window).load(OSThemes.onLoad.init);
})(jQuery);
