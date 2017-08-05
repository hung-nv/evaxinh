<div id="wrapper-content" class="clearfix">
    <section id="page-title"
             class="page-title-wrap page-title-size-md page-title-glass-flash-cross-side-left page-title-glass-flash-schema-primary page-title-margin page-title-breadcrumbs-float" >
        <div class="page-title-wrap-bg" style="background-image: url('<?php echo Yii::app()->request->baseUrl; ?>/images/homepage-banner-behind-video.jpg');">
        </div>
        <div class="container">
            <div
                class="page-title-inner-wrapper text-left" >
                <div class="page-title-inner text-left inline-block" >
                    <h1 class="slogan">Hỏi đáp</h1>
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
                                <span>Hỏi đáp</span>
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

                                    <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                        <?php $count = 0; ?>
                                        <?php foreach ($news as $k): ?>
                                            <li role="presentation" <?php if ($count == 0): ?> class="active" <?php endif; ?>>
                                                <a href="#<?php echo $k['alias']; ?>" id="<?php echo $k['alias']; ?>-tab" role="tab" data-toggle="tab" aria-controls="<?php echo $k['alias']; ?>" aria-expanded="true"><?php echo $k['title']; ?></a>
                                            </li>
                                            <?php $count++; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <div class="tab-content" id="myTabContent">
                                    <?php if (isset($news) && $news): ?>
                                        <?php $countj = 0; ?>
                                        <?php foreach ($news as $i): ?>
                                            <div class="tab-pane fade" role="tabpanel" id="<?php echo $i['alias']; ?>" aria-labelledby="<?php echo $i['alias']; ?>-tab">
                                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                    <?php if (isset($i['child']) && $i['child']): ?>
                                                        <?php $countk = 0; ?>
                                                        <?php foreach ($i['child'] as $j): ?>
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading" role="tab" id="heading<?php echo $j['id']; ?>">
                                                                    <h4 class="panel-title">
                                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $j['id']; ?>" <?php if ($countk == 0): ?> aria-expanded="true" <?php else: ?> aria-expanded="false" <?php endif; ?> aria-controls="collapse<?php echo $j['id']; ?>">
                                                                            <?php echo $j['title']; ?>
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <div id="collapse<?php echo $j['id']; ?>" class="panel-collapse collapse <?php if ($countk == 0) echo "in"; ?>" role="tabpanel" aria-labelledby="heading<?php echo $j['id']; ?>">
                                                                    <div class="panel-body">
                                                                        <?php echo $j['description']; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php $countk++; ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <?php $countj++; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        <ul class='pagination'>

                        </ul>
                    </div>
                </div>

                <?php $this->renderPartial('../template/sidebar'); ?>
            </div>
        </div>
    </main>
</div>