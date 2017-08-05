<!DOCTYPE html>
<!-- Open Html -->
<html lang="en-US">
    <!-- Open Head -->
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="pingback" href="http://pure.osthemes.biz/yoga/xmlrpc.php"/>
        <link rel="shortcut icon" href="http://pure.osthemes.biz/yoga/wp-content/themes/pure/assets/images/favicon.ico" />
        <title><?php echo $this->meta['title']; ?></title>

        <!-- CSS -->
        <link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/css/amination.css?ver=4.5.3' type='text/css' />
        <link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/css/js_composer.min.css?ver=4.11.2.1' type='text/css' />
        <link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/css/fonts-awesome/css/font-awesome.min.css?ver=4.5.3' type='text/css' />
        <link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/css/fonts-awesome/css/font-awesome-animation.min.css?ver=4.5.3' type='text/css' />
        <link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css?ver=4.5.3' type='text/css' />
        <link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/css/pure/css/styles.css?ver=4.5.3' type='text/css' />
        <link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/css/select2.min.css?ver=4.5.3' type='text/css' />
        <link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/css/style-5.css?ver=4.5.3' type='text/css' />
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Great+Vibes'  type='text/css'>
        <link rel='stylesheet' id='jquery-ui-css'  property='stylesheet' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css?ver=4.5.3' type='text/css' media='all' />
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:700|Roboto:normal&amp;subset=latin" type="text/css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom-css.css" type='text/css' />
        <link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/css/nvh.css' type='text/css' />

        <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.min.js'></script>
        <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/select2.full.min.js?ver=4.5.3'></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.hoverOver.min.js"></script>
        <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js?ver=4.5.3'></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-92621408-1', 'auto');
  ga('send', 'pageview');

</script>

        <script type="text/javascript">
            (function($) {
                $(document).ready(function() {
                    $('.training-content h3').each(function(s) {
                        var count = $(this).index('h3') + 1;
                        $(this).addClass("addtitle" + count);
                    });
                    $('#myTabs a').click(function(e) {
                        e.preventDefault()
                        $(this).tab('show')
                    });
                    $('.tab-pane:first').addClass('active in');

                    $('.demo7').hoverOver({
                        aniTypeIn: 'flybottom',
                        aniTypeOut: 'flybottom',
                        aniDurationIn: 500,
                        aniDurationOut: 500,
                        contentShowHeight: 60
                    });

                    $('.carousel').carousel({
                        interval: 2000
                    });

                    "use strict";
                    var elm = $('#opening-hours-584fb1482ec8a');
                    $(document).ready(function() {
                        $("#opening-hours-584fb1482ec8a").countdown($('#open_datetime').val(), function(event) {
                            setTimeout(function() {
                                $(elm).css('opacity', '1');
                            }, 500);

                        });

                        $("#opening-hours-584fb1482ec8a").countdown($('#open_datetime').val()).on('update.countdown', function(event) {
                            var second = parseInt(event.strftime('%S'));
                            var minutes = parseInt(event.strftime('%M'));
                            var hours = parseInt(event.strftime('%H'));
                            var days = parseInt(event.strftime('%d'));
                            var months = parseInt(event.strftime('%m'));
                            var weeks = parseInt(event.strftime('%w'));
                            if (months > 0) {
                                var bufferDay = weeks % 4 * 7;
                                if (bufferDay > 0) {
                                    days = bufferDay;
                                }
                            }
                            else {
                                days = weeks * 7 + days;
                            }
                            if (second < 10)
                                second = '0' + second;
                            if (minutes < 10)
                                minutes = '0' + minutes;
                            if (hours < 10)
                                hours = '0' + hours;
                            if (days < 10)
                                days = '0' + days;
                            if (months < 10)
                                months = '0' + months;

                            var elm = $('#opening-hours-584fb1482ec8a');
                            $('#second', elm).html(second).trigger('change');
                            $('#minutes', elm).html(minutes).trigger('change');
                            $('#hours', elm).html(hours).trigger('change');
                            $('#days', elm).html(days).trigger('change');
                            $('#months', elm).html(months).trigger('change');

                        }).on('finish.countdown', function(event) {
                            var elm = $('#opening-hours-584fb1482ec8a');
                            $('#seconds', elm).val(0);
                            window.location.href = '#';
                        });
                    });
                });
            })(jQuery);
        </script>
    </head>
    <!-- Close Head -->
    <body class="home page page-id-7 page-template-default footer-static header-2 chrome wpb-js-composer js-comp-ver-4.11.2.1 vc_responsive" data-responsive="991" data-header="header-2">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1695154867379686";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <!-- Open Wrapper -->
        <div id="wrapper">

            <header id="main-header-wrapper" class="main-header header-light sub-menu-dark" >
                <!--	-->
                <div class="header-nav-wrapper header-1 header-light header-sticky sticky-inherit">
                    <div class="container">
                        <div class="header-container clearfix">
                            <div class="header-logo">
                                <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo $this->site->meta_title; ?>" style="font-family: 'Great Vibes' !important;    vertical-align: middle;">
                                    <img class="has-retina" src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $this->site->logo; ?>" alt="<?php echo $this->site->meta_title; ?>" />
                                </a>
                            </div>

                            <div class="header-nav-right">
                                <div id="primary-menu" class="menu-wrapper">
                                    <ul id="main-menu" class="main-menu x-nav-menu x-nav-menu_main-menu x-animate-sign-flip">
                                        <li class="menu-item x-menu-item current-menu-ancestor">
                                            <a href="<?php echo Yii::app()->homeUrl; ?>" class="x-menu-a-text">
                                                <span class="x-menu-text">Home</span>
                                                <b class="x-caret"></b>
                                            </a>
                                        </li>
                                        <?php if (isset($this->menu) && $this->menu): ?>
                                            <?php foreach ($this->menu as $item): ?>
                                                <li id="menu-item-38" class="menu-item x-menu-item">
                                                    <a href="<?php echo $item['url']; ?>" class="x-menu-a-text">
                                                        <span class="x-menu-text"><?php echo $item['label']; ?></span>
                                                        <b class="x-caret"></b>
                                                    </a>
                                                    <?php if (isset($item['child']) && $item['child']): ?>
                                                        <ul class="x-sub-menu x-sub-menu-standard x-list-style-none" style="left: 480.297px; right: auto;">
                                                            <?php foreach ($item['child'] as $sub): ?>
                                                                <li class="menu-item x-menu-item">
                                                                    <a href="<?php echo $sub['url']; ?>" class="x-menu-a-text">
                                                                        <span class="x-menu-text"><?php echo $sub['label']; ?></span>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="header-customize header-customize-nav"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <header id="mobile-header-wrapper" class="mobile-header header-mobile-1 header-light">
                <!--	-->
                <div class="header-container-wrapper header-mobile-sticky">
                    <div class="container header-mobile-container">
                        <div class="header-mobile-inner">
                            <div class="toggle-icon-wrapper toggle-mobile-menu" data-ref="nav-menu-mobile" data-drop-type="fly">
                                <div class="toggle-icon">
                                    <span></span>
                                </div>
                            </div>
                            <div class="header-logo-mobile">
                                <a href="<?php echo Yii::app()->homeUrl; ?>" title="<?php echo $this->site->meta_title; ?>">
                                    <img class="has-retina"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $this->site->logo; ?>" alt="<?php echo $this->site->meta_title; ?>" />
                                    <img class="retina-logo"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $this->site->logo; ?>" alt="<?php echo $this->site->meta_title; ?>" />
                                </a>
                            </div>
                        </div>
                        <div id="nav-menu-mobile" class="header-mobile-nav menu-drop-fly">
                            <form class="search-form-menu-mobile"  method="get" action="">
                                <input type="text" name="s" placeholder="Search...">
                                <button type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                            <ul id="menu-mobile-menu" class="nav-menu-mobile x-nav-menu x-nav-menu_mobile-menu x-animate-sign-flip">
                                <li id="menu-item-mobile-58" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home x-menu-item x-item-menu-standard">
                                    <a href="<?php echo Yii::app()->homeUrl; ?>" class="x-menu-a-text">
                                        <span class="x-menu-text">Home</span>
                                    </a>
                                </li>

                                <?php if (isset($this->menu) && $this->menu): ?>
                                    <?php foreach ($this->menu as $item): ?>
                                        <li class="menu-item x-menu-item">
                                            <a href="<?php echo $item['url']; ?>" class="x-menu-a-text">
                                                <span class="x-menu-text"><?php echo $item['label']; ?></span>
                                                <b class="x-caret"></b>
                                            </a>
                                            <?php if (isset($item['child']) && $item['child']): ?>
                                                <ul class="x-sub-menu x-sub-menu-standard x-list-style-none">
                                                    <?php foreach ($item['child'] as $sub): ?>
                                                        <li id="menu-item-mobile-69" class="menu-item x-menu-item">
                                                            <a href="<?php echo $sub['url']; ?>" class="x-menu-a-text">
                                                                <span class="x-menu-text"><?php echo $sub['label']; ?></span>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                            </ul>
                        </div>
                        <div class="main-menu-overlay"></div>
                    </div>
                </div>
            </header>

            <div id="search_popup_wrapper" class="dialog">
                <div class="dialog__overlay"></div>
                <div class="dialog__content">
                    <div class="morph-shape">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 520 280"
                             preserveAspectRatio="none">
                        <rect x="3" y="3" fill="none" width="516" height="276"/>
                        </svg>
                    </div>
                    <div class="dialog-inner">
                        <h2>Enter your keyword</h2>
                        <form  method="get" action="" class="search-popup-inner">
                            <input type="text" name="s" placeholder="Search...">
                            <button type="submit">Search</button>
                        </form>
                        <div><button class="action" data-dialog-close="close" type="button"><i class="fa fa-close"></i></button></div>
                    </div>
                </div>
            </div>

            <!-- Open Wrapper Content -->
            <?php echo $content; ?>
            <!-- Close Wrapper Content -->


            <footer class="footer-wrap">
                <div class="footer-above">
                    <div class="container">
                        <!-- Footer info section -->

                        <!-- Start - Javascript HTML Text Adder plugin v1.0.1 -->
                        <div class="footer-multi-col row">
                            <div class="hjawidget textwidget">
                                <?php if (isset($this->bottom) && $this->bottom): ?>
                                    <?php $countBtmenu = 1; ?>
                                    <?php $totalBtmenu = count($this->bottom); ?>
                                    <?php foreach ($this->bottom as $btmenu): ?>
                                        <div <?php if ($countBtmenu == $totalBtmenu): ?>class="col-md-2 col-sm-2 ft-menu-col"<?php else: ?>class="col-md-3 col-sm-3 ft-menu-col"<?php endif; ?>>
                                            <span class="ft-menu-col-title"><?php echo $btmenu['label']; ?></span>
                                            <?php if (isset($btmenu['child']) && $btmenu['child']): ?>
                                                <ul>
                                                    <?php foreach ($btmenu['child'] as $btchild): ?>
                                                        <li><a href="<?php echo $btchild['url']; ?>"><?php echo $btchild['label']; ?></a></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                        <?php $countBtmenu++; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <div class="col-md-4 col-sm-4">
                                    <div class="fb-page" data-href="<?php echo $this->site->fanpage; ?>" data-tabs="timeline" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                        <blockquote cite="<?php echo $this->site->fanpage; ?>" class="fb-xfbml-parse-ignore">
                                            <a href="<?php echo $this->site->fanpage; ?>">Học viện thẩm mỹ Evaxinh</a>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End - Javascript HTML Text Adder plugin v1.0.1 -->
                        <!-- End footer info section -->
                    </div>
                </div><!-- End .footer-above -->
                <div class="footer-bottom">
                    <div class="container">
                        <div class="footer-logo-address-wrap row">
                            <div class="col-md-2 col-sm-3 flaw">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $this->site->logo; ?>" alt="logo" style="height:70px;">
                            </div>
                            <div class="col-md-7 col-sm-6 ft-info-wrap flaw">
                                <ul class="ft-info-inner">
                                    <li class="col-md-6"><?php echo $this->site->address; ?><br><a href="tel:<?php echo $this->site->phone; ?>"><?php echo $this->site->phone; ?></a></li>
                                    <li class="col-md-6"><a href="mailto:<?php echo $this->site->email; ?>"><?php echo $this->site->email; ?></a> <br /></li>
                                    <div class="clearfix"></div>
                                    <?php if (isset($this->site->address2) && $this->site->address2): ?>
                                        <li class="col-md-6"><?php echo $this->site->address2; ?>  <br><a href="tel:<?php echo $this->site->phone2; ?>"><?php echo $this->site->phone2; ?></a></li>
                                    <?php endif; ?>
                                    <?php if (isset($this->site->address3) && $this->site->address3): ?>
                                        <li class="col-md-6"><?php echo $this->site->address3; ?>  <br><a href="tel:<?php echo $this->site->phone3; ?>"><?php echo $this->site->phone3; ?></a></li>
                                    <?php endif; ?>
                                    <div class="clearfix"></div>
                                    <?php if (isset($this->site->address4) && $this->site->address4): ?>
                                        <li class="col-md-6"><?php echo $this->site->address4; ?>  <br><a href="tel:<?php echo $this->site->phone4; ?>"><?php echo $this->site->phone4; ?></a></li>
                                    <?php endif; ?>
                                    <?php if (isset($this->site->address5) && $this->site->address5): ?>
                                        <li class="col-md-6"><?php echo $this->site->address5; ?>  <br><a href="tel:<?php echo $this->site->phone5; ?>"><?php echo $this->site->phone5; ?></a></li>
                                    <?php endif; ?>
                                    <div class="clearfix"></div>
                                    <?php if (isset($this->site->address6) && $this->site->address6): ?>
                                        <li class="col-md-6"><?php echo $this->site->address6; ?>  <br><a href="tel:<?php echo $this->site->phone6; ?>"><?php echo $this->site->phone6; ?></a></li>
                                    <?php endif; ?>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-3 col-sm-3 flaw">
                                <a href="tel:19006682">
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ft-hotline1.png" alt="Hotline">
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div><!-- End .footer-bottom -->
                <div class="bna-bottom-page text-center">
                    <div class="container">
                        <p>Copyright © <span>2016 Evaxinh</span>. All Rights Reserved.</p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- Close Wrapper -->

        <a  class="back-to-top" href="javascript:;">
            <i class="fa fa-angle-up"></i>
        </a>
        <link rel='stylesheet' property='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/css/vc-customize.css?ver=4.5.3' type='text/css' media='all' />

        <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/plugin.js?ver=4.5.3'></script>
        <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/main.js?ver=4.5.3'></script>
        <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.countdown.min.js?ver=1'></script>
        <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/app.js?ver=1.0.0.0'></script>
        <script type="text/javascript">
            (function() {
                function addEventListener(element, event, handler) {
                    if (element.addEventListener) {
                        element.addEventListener(event, handler, false);
                    } else if (element.attachEvent) {
                        element.attachEvent('on' + event, handler);
                    }
                }}
            )();
        </script>
    </body>
</html>