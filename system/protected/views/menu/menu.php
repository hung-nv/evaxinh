<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/functions.js" type="text/javascript"></script>
<style>
    .menu-category-list, .menu-category-list li ul {
        list-style: none;
        padding-left: 20px;
    }
    .menu-category-list li label {
        padding-left: 20px;
    }
    .menu-category-list input[type="checkbox"] {
        position: absolute;
    }
</style>
<section class="content-header">
    <h1>
        Managa Menu
        <!--<small>Preview</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->homeUrl; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('categories/menu'); ?>">Menu</a></li>
        <li class="active">All</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header pad">
                    <!--<i class="fa fa-list"></i>-->
                    <div class="col-md-2">
                        <select class="form-control" id="select-location">
                            <option value="top" <?php if (isset($location) && $location == 'top'): ?> selected <?php endif; ?>>Top Menu</option>
                            <option value="bottom" <?php if (isset($location) && $location == 'bottom'): ?> selected <?php endif; ?>>Bottom Menu</option>
                            <option value="left" <?php if (isset($location) && $location == 'left'): ?> selected <?php endif; ?>>Left Menu</option>
                            <option value="right" <?php if (isset($location) && $location == 'right'): ?> selected <?php endif; ?>>Right Menu</option>
                        </select>
                    </div>
                    <div class="col-md-10">
                        <button class="btn btn-success btn-sm" id="btn-select-location">Select</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-body">
                    <div class="box-group" id="accordion">
                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                        <div class="panel box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        Page
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="box-body">
                                    <?php
                                    $form = $this->beginWidget('CActiveForm', array(
                                        'id' => 'insert-page-form',
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation' => false,
                                        'htmlOptions' => array('role' => 'form', 'data-toggle' => 'validator')
                                    ));
                                    ?>
                                    <?php echo $form->checkBoxList($menuPage, 'page', $menuPage->getListPage(), array('template' => '<li>{input}{label}</li>', 'container' => 'ul class="menu-category-list"', 'separator' => '')); ?>

                                    <div class="form-group">
                                        <?php echo CHtml::button('Add to menu', array('class' => 'btn btn-primary btn-sm', 'id' => 'add-page')); ?>
                                    </div>
                                    <?php $this->endWidget(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel box box-danger">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        Custom Link
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="box-body">
                                    <?php
                                    $form = $this->beginWidget('CActiveForm', array(
                                        'id' => 'insert-link-form',
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation' => false,
                                        'htmlOptions' => array('role' => 'form', 'data-toggle' => 'validator')
                                    ));
                                    ?>
                                    <div class="form-group">
                                        <?php echo $form->labelEx($custom, 'title'); ?>
                                        <input class="form-control" placeholder="Enter name" required name="MenuCustomForm[title]" id="MenuCustomForm_title" type="text">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <?php echo $form->labelEx($custom, 'direct'); ?>
                                        <input class="form-control" placeholder="Enter url" name="Categories[direct]" id="Categories_direct" type="url" required>
                                        <?php echo $form->error($custom, 'direct'); ?>
                                    </div>

                                    <div class="form-group">
                                        <?php echo CHtml::button('Add to menu', array('class' => 'btn btn-primary btn-sm', 'id' => 'add-custom')); ?>
                                    </div>
                                    <?php $this->endWidget(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel box box-success">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        Categories
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="box-body">
                                    <?php
                                    $form = $this->beginWidget('CActiveForm', array(
                                        'id' => 'insert-category-form',
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation' => false,
                                        'htmlOptions' => array('role' => 'form', 'data-toggle' => 'validator')
                                    ));
                                    ?>

                                    <?php if ($menuCategory->getListCategory()): ?>
                                        <ul class="menu-category-list" id="MenuCategoryForm_category">
                                            <?php foreach ($menuCategory->getListCategory() as $item): ?>
                                                <li>
                                                    <input value="<?php echo $item['id']; ?>" type="checkbox" name="MenuCategoryForm[category][]">
                                                    <label><?php echo $item['title']; ?></label>
                                                    <?php if (isset($item['child']) && $item['child']): ?>
                                                        <ul>
                                                            <?php foreach ($item['child'] as $child): ?>
                                                                <li>
                                                                    <input class="category_child" value="<?php echo $child['id']; ?>" type="checkbox" name="MenuCategoryForm[category][]">
                                                                    <label><?php echo $child['title']; ?></label>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>

                                    <div class="form-group">
                                        <?php echo CHtml::button('Add to menu', array('class' => 'btn btn-primary btn-sm', 'id' => 'add-category')); ?>
                                    </div>
                                    <?php $this->endWidget(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div>
        </div>

        <div class="col-md-9">
            <div class="box">

                <div class="box-header with-border" style="padding-bottom: 0;">
                    <h3 class="box-title"><i>Tên menu:</i> <?php echo ucwords($location); ?> Menu</h3>
                </div>
                <div class="box-body table-responsive" style="padding-top: 0;">
                    <div class="row">
                        <div class="col-md-4" id="menu-refresh" style="margin-top: 20px;">
                            <?php if (isset($menu) && $menu): ?>
                                <?php foreach ($menu as $i): ?>
                                    <div class="panel box box-danger">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#menu-refresh" href="#collapse<?php echo $i['id']; ?>" class="collapsed" aria-expanded="false">
                                                    <?php echo $i['title']; ?>
                                                </a>
                                                <span><?php echo ucwords($i['type']); ?></span>
                                            </h4>
                                        </div>
                                        <div id="collapse<?php echo $i['id']; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="required">Order</label>
                                                            <input class="form-control" name="Menu[ordering][]" value="<?php echo $i['ordering']; ?>" type="text">
                                                        </div>
                                                        <div class="col-md-9">
                                                            <label class="required">Parent</label>

                                                            <select id="" class="form-control" name="Menu[parent_id][]">
                                                                <option value="0">Select...</option>
                                                                <?php foreach ($parent as $item): ?>
                                                                    <option value="<?php echo $item['id']; ?>"><?php echo $item['title']; ?></option>
                                                                    <?php if (isset($item['child']) && $item['child']): ?>
                                                                        <?php foreach ($item['child'] as $sub): ?>
                                                                            <option value="<?php echo $sub['id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sub['title']; ?></option>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <input class="btn btn-primary btn-sm" type="button" value="Update" data="<?php echo $i['id']; ?>" name="Menu[update][]">
                                                    <a href="<?php echo Yii::app()->createUrl('menu/remove', array('id' => $i['id'])); ?>" class="text-red" style="padding-left: 10px;">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if (isset($i['child']) && $i['child']): ?>
                                        <?php foreach ($i['child'] as $j): ?>
                                            <div class="panel box box-danger" style="margin-left: 30px;">
                                                <div class="box-header with-border">
                                                    <h4 class="box-title">
                                                        <a data-toggle="collapse" data-parent="#menu-refresh" href="#collapse<?php echo $j['id']; ?>" class="collapsed" aria-expanded="false">
                                                            <?php echo $j['title']; ?> <i style="padding-left: 10px; font-weight: normal; font-size: 13px;">chỉ mục con</i>
                                                        </a>
                                                        <span><?php echo ucwords($j['type']); ?></span>
                                                    </h4>
                                                </div>
                                                <div id="collapse<?php echo $j['id']; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label class="required">Order</label>
                                                                    <input class="form-control" name="Menu[ordering][]" value="<?php echo $j['ordering']; ?>" type="text">
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <label class="required">Parent</label>

                                                                    <select id="" class="form-control" name="Menu[parent_id][]">
                                                                        <option value="0">Select...</option>
                                                                        <?php foreach ($parent as $item): ?>
                                                                            <option value="<?php echo $item['id']; ?>" <?php if ($j['parent_id'] == $item['id']): ?> selected="selected" <?php endif; ?>><?php echo $item['title']; ?></option>
                                                                            <?php if (isset($item['child']) && $item['child']): ?>
                                                                                <?php foreach ($item['child'] as $sub): ?>
                                                                                    <option value="<?php echo $sub['id']; ?>" <?php if ($j['parent_id'] == $sub['id']): ?> selected="selected" <?php endif; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sub['title']; ?></option>
                                                                                <?php endforeach; ?>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <input class="btn btn-primary btn-sm" type="button" value="Update" data="<?php echo $j['id']; ?>" name="Menu[update][]">
                                                            <a href="<?php echo Yii::app()->createUrl('menu/remove', array('id' => $j['id'])); ?>" class="text-red" style="padding-left: 10px;">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>
</section><!-- /.content -->