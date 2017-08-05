<div class="sidebar left-sidebar col-md-3 sidebar-small">

    <aside id="search-2" class="padding-bottom-15 widget widget_search"><form role="search" class="search-form" method="get" id="searchform" action="http://pure.osthemes.biz/yoga/">
            <input type="text" value="" name="s" id="s" placeholder="Search...">
            <button type="submit"><i class="fa fa-search"></i>Search</button>
        </form>
    </aside>

    <aside id="categories-3" class="padding-bottom-15 widget widget_categories">
        <h4 class="widget-title"><span>Chuyên nghành đào tạo</span></h4>
        <ul>
            <?php if (isset($this->allPrograms) && $this->allPrograms): ?>
                <?php foreach ($this->allPrograms as $p): ?>
                    <li class="cat-item cat-item-14"><a href="<?php echo $p->setUrl(); ?>"><?php echo $p->title; ?></a></li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </aside>

    <aside id="osthemes-posts-2" class="padding-bottom-15 widget widget-posts">
        <h4 class="widget-title">
            <span>Tin nổi bật</span>
        </h4>
        <?php if (isset($this->hotNews) && $this->hotNews): ?>
            <?php foreach ($this->hotNews as $i): ?>
                <div class="widget_posts_item clearfix">
                    <div class="widget-posts-thumbnail">
                        <div class="entry-thumbnail">
                            <a href="<?php echo $i->setUrl(); ?>" title="<?php echo $i->title; ?>" class="entry-thumbnail-overlay">
                                <img width="102" height="68" class="img-responsive" src="<?php echo $i->setImageUrl(); ?>" alt="<?php echo $i->title; ?>" />
                            </a>
                            <a data-rel="prettyPhoto" href="<?php echo $i->setImageUrl(); ?>" class="prettyPhoto">
                                <i class="fa fa-expand"></i>
                            </a>
                        </div>
                    </div>
                    <div class="widget-posts-content-wrap">
                        <a class="widget-posts-title p-font" href="<?php echo $i->setUrl(); ?>" rel="bookmark" title="<?php echo $i->title; ?>"><?php echo $i->title; ?></a>
                        <div class="widget-posts-date p-font t-color">
                            <?php echo $i->setDate(); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </aside>
</div>