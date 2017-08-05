<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php $counts = 0; ?>
        <?php foreach ($slider as $sl): ?>
            <div class="item <?php if ($counts == 0): ?> active <?php endif; ?>">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/slider/<?php echo $sl->image; ?>">
            </div>
            <?php $counts++; ?>
        <?php endforeach; ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span data-u="arrowleft" class="arrow arrowleft" style="top: 40%; width: 40px; height: 58px; right: 0;" data-autocenter="2"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span data-u="arrowright" class="arrow arrowright" style="top: 40%; width: 40px; height: 58px;" data-autocenter="2"></span>
        <span class="sr-only">Next</span>
    </a>
</div>



<div class="container">
    <div class="bna-page-title-wrap">
        <h1 class="bna-page-home-title">H?C VI?N TH?M M? ??U TI�N T?I VI?T NAM</h1>
    </div>

    <div class="bna-intro-section">
        <div class="bna-intro-item col-md-6 col-sm-6">
            <div class="bna-intro-img">
                <img src="http://bichnguyetacademy.com/wp-content/uploads/2014/10/intro1.jpg" alt="12 N?M KINH NGHI?M TH?M M?">
                <div class="portfolio-content-wrapper">
                    <div class="portfolio-content">
                        <div class="portfolio-title">
                            <a class="view-more" href="http://bichnguyetacademy.com/bich-nguyet-academy-12-nam-mot-chang-duong.html">Xem th�m</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bna-intro-content">
                <span class="bna-intro-title">12 N?M KINH NGHI?M TH?M M?</span>
                <div class="bna-intro-des">
                    <p>L� H?c vi?n th?m m? ??u ti�n t?i Vi?t Nam c� ti?n ?? v� c�ng v?ng ch?c, ???c th�nh l?p t? H? th?ng th?m m? vi?n B�ch Nguy?t uy t�n c� h?n 12 n?m kinh nghi?m trong ng�nh th?m m?.</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="bna-intro-item col-md-6 col-sm-6">
            <div class="bna-intro-img">
                <img src="http://bichnguyetacademy.com/wp-content/uploads/2014/10/intro2.jpg" alt="GI?NG VI�N UY T�N CHUY�N GIA H�NG ??U">
                <div class="portfolio-content-wrapper">
                    <div class="portfolio-content">
                        <div class="portfolio-title">
                            <a class="view-more" href="http://bichnguyetacademy.com/doi-ngu-giang-vien-uy-tin-chuyen-gia-hang-dau.html">Xem th�m</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bna-intro-content">
                <span class="bna-intro-title">GI?NG VI�N UY T�N CHUY�N GIA H�NG ??U</span>
                <div class="bna-intro-des">
                    <p>S? h?u ??i ng? gi?ng vi�n l� nh?ng chuy�n gia ??u ng�nh trong l?nh v?c th?m m?, ??u c� th?i gian tu nghi?p t?i c�c n??c c� n?n th?m m? ph�t tri?n, 100% c� Ch?ng ch? Qu?c T?.</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="bna-intro-item col-md-6 col-sm-6">
            <div class="bna-intro-img">
                <img src="http://bichnguyetacademy.com/wp-content/uploads/2014/10/intro3.jpg" alt="H?P T�C QU?C T? VI?T - H�N">
                <div class="portfolio-content-wrapper"><div class="portfolio-content"><div class="portfolio-title"><a class="view-more" href="http://bichnguyetacademy.com/bich-nguyet-academy-co-so-dao-tao-mang-tam-quoc-te.html">Xem th�m</a></div></div></div>
            </div>
            <div class="bna-intro-content">
                <span class="bna-intro-title">H?P T�C QU?C T? VI?T - H�N</span>
                <div class="bna-intro-des">
                    <p>Bich Nguyet Academy vinh d? l� ??n v? ??i di?n ??c quy?n c?a H?c vi?n Qu?c T? Broadcasting Academy Beauty School � ???c ?�nh gi� l� H?c vi?n ?�o t?o th?m m? h�ng ??u H�n Qu?c.</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="bna-intro-item col-md-6 col-sm-6">
            <div class="bna-intro-img">
                <img src="http://bichnguyetacademy.com/wp-content/uploads/2014/10/intro4.jpg" alt="C?P ch?ng ch? Qu?c T? DUY NH?T T?I VI?T NAM">
                <div class="portfolio-content-wrapper"><div class="portfolio-content"><div class="portfolio-title"><a class="view-more" href="http://bichnguyetacademy.com/bich-nguyet-academy-don-vi-duy-nhat-cap-chung-chi-quoc-te-tai-viet-nam.html">Xem th�m</a></div></div></div>
            </div>
            <div class="bna-intro-content">
                <span class="bna-intro-title">C?P ch?ng ch? Qu?c T? DUY NH?T T?I VI?T NAM</span>
                <div class="bna-intro-des">
                    <p>Bich Nguyet Beauty Academy t? h�o l� ??a ch? d?y ngh? th?m m? ??U TI�N t?i Vi?t Nam c?p ch?ng ch? Qu?c T?. ?�y ch�nh l� �ch�a kh�a v�ng� gi�p b?n m? ra �c�nh c?a� vi?c l�m c? trong v� ngo�i n??c.</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="bna-quality-section">
        <div class="bna-quality-left">
            <div class="bna-quality-head">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/0.png" alt=""> <span class="bna-quality-title"><?php echo $this->site->why_me_label; ?></span>
            </div>
            <ul class="bna-quality-list">
                <?php echo str_replace('<p>', '<li><span>', str_replace('</p>', '</span></li>', $this->site->why_me_content)); ?>
            </ul>
        </div>
        <div class="bna-quality-right">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/camket.png" alt="cam ket">
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="bna-diamon-section">
        <div class="bna-specialized-section-title text-center">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/hat.png" alt="hat"> <span>Chuyên nghành đào tạo</span>
        </div>
        <div class="bna-specialized-flexbox">
            <div class="bna-specialized-item col-md-3 col-sm-6">
                <div class="bna-specialized-content">
                    <div class="bna-diamon-head">
                        <img src="http://bichnguyetacademy.com/wp-content/uploads/2014/10/img_KH1.png" alt="Ch?m s�c da">
                    </div>
                    <div class="bna-specialized-title">
                        <span>Chuy�n ng�nh</span>
                        <span>Ch?m s�c da</span>
                    </div>
                    <div class="bna-specialized-des">
                        <p style="text-align: justify;">Ng�nh <strong><a href="http://bichnguyetacademy.com/chuyen-nganh-cham-soc-da" target="_blank">ch?m s�c da</a></strong> � spa lu�n l� ng�nh ngh� HOT nh?t, thu h�t s? l??ng h?c vi�n l?n nh?t b?i c? h?i vi?c l�m ?n ??nh v?i m?c thu nh?p cao.</p>
                    </div>
                </div>
            </div>
            <div class="bna-specialized-item col-md-3 col-sm-6">
                <div class="bna-specialized-content">
                    <div class="bna-diamon-head">
                        <img src="http://bichnguyetacademy.com/wp-content/uploads/2014/10/img_KH2.png" alt="Phun x?m">
                    </div>
                    <div class="bna-specialized-title">
                        <span>Chuy�n ng�nh</span>
                        <span>Phun x?m</span>
                    </div>
                    <div class="bna-specialized-des">
                        <p style="text-align: justify;"><strong><a href="http://bichnguyetacademy.com/khoa-dao-tao-phun-xam" target="_blank">H?c phun x?m th?m m?</a></strong> cho b?n c? h?i tr? th�nh nh?ng ngh? nh�n phun x?m h�ng ??u v?i tay ngh? ?i�u luy?n, v?a c� th? �h?t b?c�, v?a c� th? th?a ni?m ?am m� l�m ??p.</p>
                    </div>
                </div>
            </div>
            <div class="bna-specialized-item col-md-3 col-sm-6">
                <div class="bna-specialized-content">
                    <div class="bna-diamon-head">
                        <img src="http://bichnguyetacademy.com/wp-content/uploads/2014/10/img_KH3.png" alt="TK t?o m?u t�c">
                    </div>
                    <div class="bna-specialized-title">
                        <span>Chuy�n ng�nh</span>
                        <span>TK t?o m?u t�c</span>
                    </div>
                    <div class="bna-specialized-des">
                        <p style="text-align: justify;">Ngh? <strong><a href="http://bichnguyetacademy.com/nganh-day-thiet-ke-tao-mau-toc" target="_blank">thi?t k? t?o m?u t�c</a></strong> kh�ng bao gi? l� l?i m?t trong x� h?i hi?n ??i. H�y n?m b?t c? h?i ???c ?�o t?o th�nh nh?ng nh� thi?t k? t?o m?u t�c chuy�n nghi?p trong t??ng lai.</p>
                    </div>
                </div>
            </div>
            <div class="bna-specialized-item col-md-3 col-sm-6">
                <div class="bna-specialized-content">
                    <div class="bna-diamon-head">
                        <img src="http://bichnguyetacademy.com/wp-content/uploads/2014/10/img_KH4.png" alt="Trang ?i?m">
                    </div>
                    <div class="bna-specialized-title">
                        <span>Chuy�n ng�nh</span>
                        <span>Trang ?i?m</span>
                    </div>
                    <div class="bna-specialized-des">
                        <p style="text-align: justify;"><a href="http://bichnguyetacademy.com/chuyen-nganh-day-trang-diem" target="_blank"><strong>Ngh? trang ?i?m</strong></a> lu�n ??ng ??u danh s�ch ???c c�c b?n tr? l?a ch?n l?p nghi?p v?i ni?m ?am m� l�m ??p cho m?i ng??i v� cho ch�nh b?n th�n c�c b?n.</p>
                    </div>
                </div>
            </div>
            <div class="bna-specialized-item col-md-3 col-sm-6">
                <div class="bna-specialized-content">
                    <div class="bna-diamon-head">
                        <img src="http://bichnguyetacademy.com/wp-content/uploads/2014/10/img_KH5.png" alt="Qu?n l� spa">
                    </div>
                    <div class="bna-specialized-title">
                        <span>Chuy�n ng�nh</span>
                        <span>Qu?n l� spa</span>
                    </div>
                    <div class="bna-specialized-des">
                        <p style="text-align: justify;">B?n m? ??c l�m ch? m?t spa cao c?p c?a ri�ng m�nh? C� ?am m�, d�m ??c m?, ch�ng t�i s? gi�p b?n ho�n thi?n ki?n th?c v� k? n?ng <strong><a href="http://bichnguyetacademy.com/chuyen-nganh-day-quan-ly-spa" target="_blank">qu?n l� spa</a></strong> chuy�n nghi?p.</p>
                    </div>
                </div>
            </div>
            <div class="bna-specialized-item col-md-3 col-sm-6">
                <div class="bna-specialized-content">
                    <div class="bna-diamon-head">
                        <img src="http://bichnguyetacademy.com/wp-content/uploads/2014/10/img_KH6.png" alt="V? m�ng">
                    </div>
                    <div class="bna-specialized-title">
                        <span>Chuy�n ng�nh</span>
                        <span>V? m�ng</span>
                    </div>
                    <div class="bna-specialized-des">
                        <p style="text-align: justify;"><a href="http://bichnguyetacademy.com/chuyen-nganh-day-ve-mong" target="_blank"><strong>Ngh? nail</strong></a> l� m?t ng�nh ngh? m?i ?ang ???c nhi?u b?n tr? l?a ch?n ?? kh?i nghi?p, ?? th?a s?c s�ng t?o v� tr? t�i kh�o l�o v?i nh?ng b? m�ng xinh ??p.</p>
                    </div>
                </div>
            </div>
            <div class="bna-specialized-item col-md-3 col-sm-6">
                <div class="bna-specialized-content">
                    <div class="bna-diamon-head">
                        <img src="http://bichnguyetacademy.com/wp-content/uploads/2014/10/img_KH7.png" alt="Phun x?m H�n Qu?c">
                    </div>
                    <div class="bna-specialized-title">
                        <span>Chuy�n ng�nh</span>
                        <span>Phun x?m H�n Qu?c</span>
                    </div>
                    <div class="bna-specialized-des">
                        <p style="text-align: justify;"><strong><a href="http://bichnguyetacademy.com/phun-xam-tham-my-han-quoc" target="_blank">Phun x?m H�n Qu?c</a></strong> v?i nh?ng k? thu?t tinh t? v� ?i�u luy?n ??n t? c�c chuy�n gia h�ng ??u x? Kim chi s? cho b?n h�nh trang qu� b�u ?? tr? th�nh nh?ng ngh? nh�n phun x?m x?ng t?m qu?c t?.</p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div><!-- End .bna-specialized-flexbox -->
    </div>

    <div class="bna-two-col-section">
        <div class="col-md-6 col-sm6 bna-video-section">
            <div class="bna-video-title-wrap">
                <img src="http://bichnguyetacademy.com/wp-content/themes/bichnguyetacademy-2016/img/icon/video.png" alt="video">
                <span class="bna-video-title">Thư viện video</span>
                <a href="https://www.youtube.com/channel/UC3gnghT7EvVDHVqe1e43VtQ" class="bna-video-view-more">Xem nhiều hơn</a>
            </div>
            <div class="bna-video-content">
                <div class="bna-video-img">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/NYkX-ho_TZ0" frameborder="0" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm6 bna-register-form-section">
            <div class="bna-register-form-title text-center">
                <span>Đăng ký khóa học</span> <img src="http://bichnguyetacademy.com/wp-content/themes/bichnguyetacademy-2016/img/icon/pen.png" alt="pen">
            </div>
            <div class="textwidget">
                <div role="form">
                    <div class="screen-reader-response"></div>
                    <form method="post" role="form" class="frmRegister">
                        <div class="form-group">
                            <input type="text" name="Contact[name]" value="" size="40" class="form-control" placeholder="Họ tên" required="required">
                        </div>
                        <div class="form-group">
                            <input type="text" name="Contact[mobile]" value="" size="40" class="form-control" placeholder="Điện thoại" required="required">
                        </div>
                        <div class="form-group">
                            <input type="email" name="Contact[email]" value="" size="40" class="form-control" placeholder="Email" required="required">
                        </div>
                        <div class="form-group input-register">
                            <div class="row">
                                <?php if (isset($this->allPrograms) && $this->allPrograms): ?>
                                    <?php foreach ($this->allPrograms as $m): ?>
                                        <div class="col-lg-6 col-sm-12">
                                            <label style="font-size: 13px;"><input type="checkbox" name="Contact[program][]" value="<?php echo $m->title; ?>" style="width: auto;">&nbsp;<span><?php echo $m->title; ?></span></label>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <div class="form-group">
                                        <textarea name="Contact[content]" cols="40" rows="5" class="form-control" placeholder="Lời nhắn" style="padding: 9px 12px;"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <button type="submit" class="bna-register-btn"><i class="fa fa-plane"></i><span>Đăng ký</span></button>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>