
<div id="wrapper-content" class="clearfix">
    <section id="page-title"
             class="page-title-wrap page-title-size-md page-title-glass-flash-cross-side-left page-title-glass-flash-schema-primary page-title-margin page-title-breadcrumbs-float" >
        <div class="page-title-wrap-bg" style="background-image: url('<?php echo Yii::app()->request->baseUrl; ?>/images/homepage-banner-behind-video.jpg');">
        </div>
        <div class="container">
            <div
                class="page-title-inner-wrapper text-left" >
                <div class="page-title-inner text-left inline-block" >
                    <h1 class="slogan"><?php echo $category->title; ?></h1>
                </div>
            </div>
            <div class="breadcrumbs-wrap float text-left">
                <div class="breadcrumbs-inner text-left">
                    <label class="p-font"></label>
                    <ul class="breadcrumbs">
                        <li>
                            <a href="<?php echo Yii::app()->homeUrl; ?>" class="home">Trang chủ</a>
                        </li>
                        <?php if (isset($this->subLabel) && $this->subLabel): ?>
                            <li>
                                <a href="<?php echo Yii::app()->createUrl('categories/view', array('alias' => $this->cateAlias)); ?>" class="home"><?php echo $this->cateLabel; ?></a>
                            </li>
                            <li>
                                <span><?php echo $this->subLabel; ?></span>
                            </li>
                        <?php else: ?>
                            <li>
                                <span><?php echo $this->cateLabel; ?></span>
                            </li>
                        <?php endif; ?>
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

                                <?php if (isset($news) && $news): ?>
                                    <?php $i = 0; ?>
                                    <?php $len = count($news); ?>

                                    <?php if ($i < 3): ?>
                                        <div class="featured-post-wrapper post-num-1">
                                            <div class="row">
                                                <?php if (isset($news[0]) && $news[0]): ?>
                                                    <div class="col-md-8">
                                                        <article id="post-213" class="clearfix post-213 post type-post status-publish format-standard has-post-thumbnail hentry category-art category-life category-meditation tag-life tag-mind tag-teacher">
                                                            <div class="entry-thumbnail-wrap">
                                                                <div class="entry-thumbnail">
                                                                    <a href="<?php echo $news[0]->setUrl(); ?>" title="<?php echo $news[0]->setUrl(); ?>" class="entry-thumbnail-overlay">
                                                                        <img width="1170" height="658" class="img-responsive" src="<?php echo $news[0]->setImageUrl(); ?>" alt="<?php echo $news[0]->title; ?>">
                                                                    </a>
                                                                    <a data-rel="prettyPhoto" href="<?php echo $news[0]->setImageUrl(); ?>" class="prettyPhoto"><i class="fa fa-expand"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="entry-content-wrap">
                                                                <h1 class="entry-post-title p-font" style="margin-bottom: 12px;">
                                                                    <a href="<?php echo $news[0]->setUrl(); ?>" rel="bookmark" title="<?php echo $news[0]->title; ?>"><?php echo $news[0]->title; ?></a>
                                                                </h1>
                                                                <div class="entry-post-meta-wrap">
                                                                    <ul class="entry-meta p-font">
                                                                        <li class="entry-meta-date">
                                                                            <?php echo $news[0]->setDate(); ?>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="entry-excerpt training-content">
                                                                    <?php echo $news[0]->setDescription(); ?>
                                                                </div>

                                                            </div>
                                                        </article>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="col-md-4">
                                                    <?php if (isset($news[1]) && $news[1]): ?>
                                                        <article>
                                                            <img width="100%" class="img-responsive" src="<?php echo $news[1]->setImageUrl(); ?>" alt="<?php echo $news[1]->title; ?>" />
                                                            <h3 class="catesub-entry-title"><a href="<?php echo $news[1]->setUrl(); ?>"><?php echo $news[1]->title; ?></a></h3>
                                                        </article>
                                                    <?php endif; ?>
                                                    <?php if (isset($news[2]) && $news[2]): ?>
                                                        <article>
                                                            <img width="100%" class="img-responsive" src="<?php echo $news[2]->setImageUrl(); ?>" alt="<?php echo $news[2]->title; ?>" />
                                                            <h3 class="catesub-entry-title"><a href="<?php echo $news[2]->setUrl(); ?>"><?php echo $news[2]->title; ?></a></h3>
                                                        </article>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php $news = array_slice($news, 3); ?>
                                    <div class="blog-inner clearfix blog-style-grid">
                                        <?php foreach ($news as $item): ?>
                                            <article class="col-md-12">
                                                <div class="entry-thumbnail-wrap col-md-4 col-sm-6">
                                                    <div class="entry-thumbnail">
                                                        <a href="<?php echo $item->setUrl(); ?>" title="<?php echo $item->title; ?>" class="entry-thumbnail-overlay">
                                                            <img width="570" height="321" class="img-responsive" src="<?php echo $item->setImageUrl(); ?>" alt="<?php echo $item->title; ?>" />
                                                        </a>
                                                        <a data-rel="prettyPhoto" href="<?php echo $item->setImageUrl(); ?>" class="prettyPhoto">
                                                            <i class="fa fa-expand"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="entry-content-wrap" col-md-8 col-sm-6>
                                                    <h3 class="entry-post-title p-font">
                                                        <a href="<?php echo $item->setUrl(); ?>" rel="bookmark" title="<?php echo $item->title; ?>"><?php echo $item->title; ?></a>
                                                    </h3>
                                                    <p>
                                                        <?php echo $item->setDescription(); ?>
                                                    </p>
                                                </div>
                                            </article>
                                        <?php endforeach; ?>
                                    </div>

                                <?php endif; ?>
                            </div>
                        </div>
                        <ul class='pagination'>
                            <?php
                            //$this->widget('CLinkPager', array('pages' => $pages));
                            $this->widget('CLinkPager', array(
                                'header' => '',
                                'cssFile' => FALSE,
                                'firstPageLabel' => '<<',
                                'lastPageLabel' => '>>',
                                'firstPageCssClass' => 'hidden',
                                'lastPageCssClass' => 'hidden',
                                'nextPageLabel' => 'Sau',
                                'prevPageLabel' => 'Trước',
                                'maxButtonCount' => 5,
                                'pages' => $pages,
                            ));
                            ?>
                        </ul>
                    </div>
                </div>

                <?php $this->renderPartial('../template/sidebar'); ?>
            </div>
        </div>
    </main>
</div>