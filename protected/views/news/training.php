<div id="wrapper-content" class="clearfix">

    <section id="training-breadcrumbs">
        <div class="training-inner">
            <div class="container">
                <div class="row">
                    <h1 class="bread-title text-center"><?php echo $model->title; ?></h1>
                    <div class="breadcrumbs">
                        <ul class="breadcrumbs">
                            <li>
                                <a href="<?php echo Yii::app()->homeUrl; ?>" class="home">Trang chủ</a>
                            </li>
                            <li>
                                <span class="text-uppercase"><?php echo $model->title; ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="page-title" class="page-title-wrap page-title-margin">
        <div class="youwant">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                        <div class="entry-excerpt training-content">
                            <?php if (isset($firstAfterContent) && $firstAfterContent): ?>
                                <?php foreach ($firstAfterContent as $i): ?>
                                    <div class="study-program">
                                        <div class="page-child-col-module">
                                            <div class="page-child-module-head">
                                                <div class="border-conner1"><?php echo $i->label; ?></div>
                                            </div>
                                            <div class="study-content">
                                                <ul>
                                                    <?php echo str_replace('<p>', '<li><i class="fa fa-fw fa-hand-o-right"></i>', str_replace('</p>', '</li>', $i->data)); ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="learning" class="page-title-wrap page-title-margin">
        <div class="youlearning">
            <div class="container">
                <div class="row">
                    <h2 class="h2training-box-title">BẠN SẼ HỌC GÌ</h2>
                    <div class="col-md-9 col-md-offset-2 col-sm-12 col-xs-12">
                        <?php if (isset($secondAfterContent) && $secondAfterContent): ?>
                            <?php foreach ($secondAfterContent as $j): ?>
                                <div class="col-lg-12 col-sm-12">
                                    <div class="feature-box-style1 icon-animation wow fadeInLeft"
                                         data-wow-duration="1.5s">
                                        <!-- feature-icon -->
                                        <div class="feature-icon">
                                            <i class="fa fa-check"></i>
                                        </div><!-- /feature-icon -->

                                        <!-- feature-title -->
                                        <div class="feature-title">
                                            <h4><?php echo $j->label; ?></h4>
                                        </div><!-- /feature-title -->

                                        <!-- feature-desc -->
                                        <div class="feature-desc">
                                            <?php echo str_replace('<p>', '<p><i class="fa fa-fw fa-check"></i>', $j->data); ?>
                                        </div><!-- /feature-desc -->

                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if ($model->tName): ?>
        <section id="teacher" class="page-title-wrap page-title-margin">
            <div class="container">
                <div class="row">
                    <h2 class="h2training-box-title" style="color:#333;"><?php echo $model->tName; ?></h2>
                    <div class="col-md-10 col-md-offset-1 col-sm-12">
                        <div class="col-md-3">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/teacher/<?php echo $model->tAvatar; ?>"
                                 class="img-circle img-thumbnail">
                        </div>
                        <div class="col-md-9 box-content">
                            <div class="column-inner box-arrow-left">
                                <?php echo $model->tIntro; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if (isset($comment) && $comment): ?>
        <section id="comment">
            <div class="container">
                <div class="row">
                    <div class="<?php if (!empty($model->video_youtube)): ?>col-lg-6 col-md-6 col-xs-12 <?php else: ?>col-lg-12<?php endif; ?>">
                        <div id="quote-carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php $countComment = 0; ?>
                                <?php foreach ($comment as $m): ?>
                                    <li data-target="#quote-carousel"
                                        data-slide-to="<?php echo $countComment; ?>" <?php if ($countComment == 0): ?> class="active" <?php endif; ?>>
                                        <img class="img-responsive "
                                             src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/comment/<?php echo $m->avatar; ?>"
                                             alt="client">
                                    </li>
                                    <?php $countComment++; ?>
                                <?php endforeach; ?>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <?php $countK = 0; ?>
                                <?php foreach ($comment as $k): ?>
                                    <div class="item <?php if ($countK == 0) echo "active"; ?>">
                                        <blockquote>
                                            <div class="row">
                                                <div class="col-sm-8 col-sm-offset-2 col-xs-12">
                                                    <p><?php echo $k->content; ?></p>
                                                    <small><?php echo $k->name; ?></small>
                                                </div>
                                            </div>
                                        </blockquote>
                                    </div>
                                    <?php $countK++; ?>
                                <?php endforeach; ?>
                            </div>

                            <!-- Controls -->

                        </div>
                    </div>

                    <?php if (!empty($model->video_youtube)): ?>
                        <div class="col-lg-6 col-md-6 col-xs-12 bna-video-section">
                            <div id="quote-carousel">
                                <div class="bna-video-content">
                                    <div class="bna-video-img">
                                        <iframe width="560" height="315"
                                                src="https://www.youtube.com/embed/<?php echo $model->getIdYoutube(); ?>"
                                                frameborder="0" allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section id="register">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-md-offset-2 col-sm-12">
                    <div class="register-inner">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="register-heading margin-bottom-25">
                                    ĐĂNG KÝ KHÓA HỌC NGAY<br/>
                                    ĐỂ TIẾT KIỆM CHI PHÍ <span
                                            style="color:#ff4444;"><?php echo round($model->old_price - $model->new_price) / $model->old_price * 100; ?>
                                        %</span>
                                </div>

                                <div class="training-price">
                                    <div class="old-price">
                                        <?php echo number_format($model->old_price); ?>
                                    </div>
                                    <div class="new-price">
                                        <?php echo number_format($model->new_price); ?>
                                    </div>
                                </div>

                                <p class="register-label">
                                    Áp dụng đến ngày <?php echo date('d/m/Y', strtotime($model->open_datetime)); ?><br/>
                                    NHANH TAY LÊN!
                                </p>
                                <input type="hidden" value="<?php echo $model->open_datetime; ?>" id="open_datetime"/>
                                <p class="register-heading margin-bottom-15">Thời gian chỉ còn</p>
                                <div id="opening-hours-584fb1482ec8a" class="opening-hours" style="opacity: 1;">
                                    <div class="square pull-left">
                                        <div class="canvas cd-light text-inherit">
                                            <span id="days" class="times">21</span>
                                            <span class="separator bg-primary"></span>
                                            <span class="title">Days</span>
                                        </div>
                                        <div class="canvas cd-light text-inherit">
                                            <span id="hours" class="times">08</span>
                                            <span class="separator bg-primary"></span>
                                            <span class="title">Hours</span>
                                        </div>
                                        <div class="canvas cd-light text-inherit">
                                            <span id="minutes" class="times">39</span>
                                            <span class="separator bg-primary"></span>
                                            <span class="title">Minutes</span>
                                        </div>
                                        <div class="canvas cd-light text-inherit">
                                            <span id="second" class="times">44</span>
                                            <span class="separator bg-primary"></span>
                                            <span class="title">Seconds</span>
                                        </div>
                                    </div>
                                    <div style="clear: both"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xs-12">
                                <?php if (Yii::app()->user->hasFlash('successful')): ?>
                                    <p style="margin-bottom: 10px;margin-left: 15px;color: #ff4444;">
                                        <?php echo Yii::app()->user->getFlash('successful'); ?>
                                    </p>
                                <?php endif; ?>
                                <form method="post" class="frmRegister">
                                    <div class="col-md-12 margin-bottom-15">
                                        <input type="text" name="Contact[name]" placeholder="Họ tên"
                                               required="required">
                                    </div>
                                    <div class="col-md-12 margin-bottom-15">
                                        <input type="text" name="Contact[email]" placeholder="Email"
                                               required="required">
                                    </div>
                                    <div class="col-md-12 margin-bottom-15">
                                        <input type="text" name="Contact[mobile]" placeholder="Số điện thoại"
                                               required="required">
                                    </div>
                                    <div class="col-md-12 margin-bottom-15">
                                        <input type="text" name="Contact[address]" placeholder="Địa chỉ">
                                    </div>
                                    <div class="col-md-12 margin-bottom-15 input-register">
                                        <?php if (isset($this->allPrograms) && $this->allPrograms): ?>
                                            <?php foreach ($this->allPrograms as $m): ?>
                                                <label style="color:#fff;"><input type="checkbox"
                                                                                  name="Contact[program][]"
                                                                                  value="<?php echo $m->title; ?>"
                                                                                  style="width: auto;"><?php echo $m->title; ?>
                                                </label>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="submit" value="ĐĂNG KÝ NGAY">
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-12">
                                <div class="register-label">Vui lòng cung cấp chính xác các thông tin.<br/> Chúng tôi sẽ
                                    gửi email hoặc gọi điện cho bạn trong thời gian sớm nhất có thể.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>