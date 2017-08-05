
<div id="wrapper-content" class="clearfix">
    <section id="page-title" class="page-title-wrap page-title-size-md page-title-glass-flash-cross-side-left page-title-glass-flash-schema-primary page-title-margin page-title-breadcrumbs-float" >
        <div class="page-title-wrap-bg" style="background-image: url('<?php echo Yii::app()->request->baseUrl; ?>/images/homepage-banner-behind-video.jpg');">
        </div>
        <div class="container">
            <div
                class="page-title-inner-wrapper text-left" >
                <div class="page-title-inner text-left inline-block" >
                    <h1 class="slogan"><?php echo $model->title; ?></h1>
                    <?php if (isset($header) && $header): ?>
                        <p class="sub-title" style="font-style: italic;">
                            <strong><?php echo $header->label; ?>:</strong> <?php echo strip_tags($header->data); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="breadcrumbs-wrap float text-left">
                <div class="breadcrumbs-inner text-left">
                    <label class="p-font"></label>
                    <ul class="breadcrumbs">
                        <li>
                            <a href="<?php echo Yii::app()->homeUrl; ?>" class="home">Trang chủ</a>
                        </li>
                        <li>
                            <span><?php echo $model->title; ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <main  class="site-content-page no-margin-bottom has-sidebar">
        <div class="container clearfix">
            <div class="row clearfix">
                <div class="col-md-9">
                    <div class="page-content">
                        <div class="shortcode-blog-wrap" >
                            <div class="blog-wrap grid">
                                <div class="featured-post-wrapper post-num-1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <article id="post-213" class="clearfix post-213 post type-post status-publish format-standard has-post-thumbnail hentry category-art category-life category-meditation tag-life tag-mind tag-teacher">
                                                <div class="entry-content-wrap">
                                                    <div class="entry-post-meta-wrap">
                                                        <ul class="entry-meta p-font">
                                                            <li class="entry-meta-date">
                                                                <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $model->setDate(); ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="entry-excerpt training-content">
                                                        <?php echo $model->content; ?>

                                                        <?php if (isset($firstAfterContent) && $firstAfterContent): ?>
                                                            <?php foreach ($firstAfterContent as $i): ?>
                                                                <div class="study-program">
                                                                    <div class="page-child-col-module">
                                                                        <div class="page-child-module-head">
                                                                            <div class="border-conner1"><?php echo $i->label; ?></div>
                                                                        </div>
                                                                        <div class="study-content">
                                                                            <?php echo $i->data; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>

                                                        <?php if (isset($secondAfterContent) && $secondAfterContent): ?>
                                                            <div class="bna-page-2-col-special-section">
                                                                <?php foreach ($secondAfterContent as $j): ?>
                                                                    <div class="col-md-6 col-xs-12">
                                                                        <div class="page-child-col-module">
                                                                            <div class="page-child-module-head">
                                                                                <div class="border-conner1"><?php echo $j->label; ?></div>
                                                                            </div>
                                                                            <ul class="nav">
                                                                                <?php echo str_replace('<p>', '<li>', str_replace('</p>', '</li>', $j->data)); ?>
                                                                            </ul>
                                                                        </div>
                                                                    </div><!-- End .bna-page-special-left -->
                                                                <?php endforeach; ?>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-inner clearfix blog-style-grid no-sidebar hide-excerpt blog-col-3">
                                    <?php if (isset($related) && $related): ?>
                                        <?php foreach ($related as $k): ?>
                                            <article class="col-md-4 col-xs-6">
                                                <div class="entry-thumbnail-wrap">
                                                    <div class="entry-thumbnail">
                                                        <a href="<?php echo $k->setUrl(); ?>" class="entry-thumbnail-overlay">
                                                            <img width="570" height="321" class="img-responsive" src="<?php echo $k->setImageUrl(); ?>" alt="<?php echo $k->title; ?>" />
                                                        </a>
                                                        <a data-rel="prettyPhoto" href="<?php echo $k->setUrl(); ?>" class="prettyPhoto">
                                                            <i class="fa fa-expand"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="entry-content-wrap">
                                                    <h3 class="related-title p-font">
                                                        <a href="<?php echo $k->setUrl(); ?>" rel="bookmark" title="<?php echo $k->title; ?>"><?php echo $k->title; ?></a>
                                                    </h3>
                                                </div>
                                            </article>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar left-sidebar col-md-3 sidebar-small">
<!--                    <div class="services-full">
                        <h4>CAM KẾT</h4>
                        <p class="clearfix">Hoàn trả 100% học phí sau 5 buổi học đầu tiên (bao gồm cả thời gian học thử) nếu học viên không hài lòng với phương pháp giảng dạy của EvaXinh.</p>
                        <p class="clearfix">100% học viên có thể làm việc tốt sau khi kết thúc khóa học.</p>
                        <p class="clearfix">Học xong có thể làm việc trực tiếp tại EvaXinh</p>
                    </div>
                    <div class="services-full services-secondary">
                        <h4>ƯU ĐÃI THÁNG 12</h4>
                        <p class="clearfix">
                            Giảm 20% học phí<br />
                            Tặng khóa học 0 đồng
                        </p>
                    </div>-->

                    <aside id="categories-3" class="padding-bottom-15 widget widget_categories">
                        <h4 class="widget-title">
                            <span>Đăng ký khóa học</span>
                        </h4>
                        <form class="frmRegister" method="post">
                            <div class="input-register">
                                <input required="required" placeholder="Họ tên" name="Contact[name]" id="Contact_name" type="text" maxlength="100">
                            </div>
                            <div class="input-register">
                                <input required="required" placeholder="Điện thoại" name="Contact[mobile]" id="Contact_name" type="text" maxlength="100">
                            </div>
                            <div class="input-register">
                                <input required="required" placeholder="Email" name="Contact[email]" id="Contact_name" type="email" maxlength="100" style="width: 100%; height:36px;">
                            </div>
                            <div class="input-register">
                                <?php if (isset($this->allPrograms) && $this->allPrograms): ?>
                                    <?php foreach ($this->allPrograms as $m): ?>
                                        <label><input type="checkbox" name="Contact[program][]" value="<?php echo $m->title; ?>" style="width: auto;"><?php echo $m->title; ?></label>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <div class="input-register">
                                <textarea rows="4" required="required" style="width:100%;" placeholder="Lời nhắn" name="Contact[content]" id="Contact_content"></textarea>
                            </div>

                            <div class="input-register">
                                <input type="submit" value="Đăng ký" />
                            </div>
                        </form>
                    </aside>
                </div>
            </div>
        </div>
    </main>
</div>