
<div id="wrapper-content" class="clearfix">
    <section id="page-title"
             class="page-title-wrap page-title-size-md page-title-glass-flash-cross-side-left page-title-glass-flash-schema-primary page-title-margin page-title-breadcrumbs-float" >
        <div class="page-title-wrap-bg" style="background-image: url('<?php echo Yii::app()->request->baseUrl; ?>/images/homepage-banner-behind-video.jpg');">
        </div>
        <div class="container">
            <div class="page-title-inner-wrapper text-left" >
                <div class="page-title-inner text-left inline-block" >
                    <h1 class="slogan">Khóa đào tạo spa toàn diện</h1>
                </div>
            </div>
            <div class="breadcrumbs-wrap float text-left">
                <div class="breadcrumbs-inner text-left">
                    <label class="p-font">You are here:</label>
                    <ul class="breadcrumbs">
                        <li>
                            <a href="<?php echo Yii::app()->homeUrl; ?>" class="home">Trang chủ</a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('categories/view', array('alias' => $this->cateAlias)); ?>" class="home"><?php echo $this->cateLabel; ?></a>
                        </li>
                        <li>
                            <span>Blog Side Bar</span>
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
                                                    <h1 class="entry-post-title p-font">
                                                        <a href="#" rel="bookmark" title="Here Are Many Variations Of Passages"><?php echo $model->title; ?></a>
                                                    </h1>
                                                    <div class="entry-post-meta-wrap">
                                                        <ul class="entry-meta p-font">
                                                            <li class="entry-meta-date">
                                                                <?php echo $model->setDate(); ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="entry-excerpt training-content">
                                                        <?php echo $model->content; ?>
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

                <?php $this->renderPartial('../template/sidebar'); ?>
            </div>
        </div>
    </main>
</div>