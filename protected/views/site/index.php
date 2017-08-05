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
        <h1 class="bna-page-home-title">HỌC VIỆN THẨM MỸ ĐẦU TIÊN TẠI VIỆT NAM</h1>
    </div>

    <div class="bna-intro-section">
        <?php if (isset($features) && $features): ?>
            <?php foreach ($features as $f): ?>
                <div class="bna-intro-item col-md-6 col-sm-6">
                    <div class="bna-intro-img">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/290_250/<?php echo $f->image; ?>" alt="<?php echo $f->label; ?>">
                        <div class="portfolio-content-wrapper">
                            <div class="portfolio-content">
                                <div class="portfolio-title">
                                    <a class="view-more" href="<?php echo $f->url; ?>">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bna-intro-content">
                        <span class="bna-intro-title"><?php echo $f->label; ?></span>
                        <div class="bna-intro-des">
                            <p><?php echo $f->content; ?></p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
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
            <?php if (isset($daotao) && $daotao): ?>
                <?php foreach ($daotao as $dt): ?>
                    <div class="bna-specialized-item col-md-3 col-sm-6">
                        <div class="bna-specialized-content">
                            <div class="bna-diamon-head">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $dt->image; ?>" alt="<?php echo $dt->name; ?>">
                            </div>
                            <div class="bna-specialized-title">
                                <span>Chuyên nghành</span>
                                <span><?php echo $dt->name; ?></span>
                            </div>
                            <div class="bna-specialized-des">
                                <?php echo $dt->content; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <div class="clearfix"></div>
        </div><!-- End .bna-specialized-flexbox -->
    </div>

    <div class="bna-two-col-section">
        <div class="col-md-6 col-sm6 bna-video-section">
            <div class="bna-video-title-wrap">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/video.png" alt="video">
                <span class="bna-video-title">Thư viện video</span>
                <a href="javascript: void();" class="bna-video-view-more">Xem nhiều hơn</a>
            </div>
            <div class="bna-video-content">
                <div class="bna-video-img">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $this->site->getIdYoutube(); ?>" frameborder="0" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm6 bna-register-form-section">
            <div class="bna-register-form-title text-center">
                    <span>Đăng ký khóa học</span> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/pen.png" alt="pen">
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