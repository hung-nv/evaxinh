<style>
    .new-box-slider { width: 100%;height: 160px;background: #fff;border: 1px dashed #ddd;border-bottom: none; display: table;text-align: center; }
    .new-box-slider:hover { border: 1px solid #ccc; border-bottom: none; }
</style>
<section class="content-header">
    <h1>
        Managa Slider
        <small>admin</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="javascript:void()"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('member/admin'); ?>">Slider</a></li>
        <li class="active">All</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header" style="padding-bottom: 0;">
                    <h3 class="box-title"><a href="<?php echo Yii::app()->createUrl('slider/admin'); ?>">All Slider</a> &nbsp;&nbsp;<span style="color:#999">»&nbsp;&nbsp; Home Slider</span></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php if (isset($slider) && $slider): ?>
            <?php $count = 1; ?>
            <?php foreach ($slider as $i): ?>
                <div class="col-lg-2 col-xs-6 slider-img-box">
                    <!-- small box -->
                    <div class="small-box">
                        <img src="../uploads/slider/<?php echo $i->image; ?>" />
                    </div>
                    <a href="#" class="bg-light-blue clearfix" style="display: block; padding: 5px 0;">
                        <span style="float: left; padding-left: 10px;">#<?php echo $count; ?></span>
                        <span style="float: right; padding-right: 10px;" 
                              onclick="if(confirm('Do you want to delete?')) location.href = '<?php echo Yii::app()->createUrl('slider/delete', array('id' => $i->id)); ?>';" 
                              id="remove-<?php echo $i->id; ?>">Delete <i class="fa fa-times"></i></span>
                    </a>
                </div><!-- ./col -->
                <?php $count++; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box" style="cursor: pointer;">
                <div class="new-box-slider">
                    <span class="glyphicon glyphicon-plus" style="color:#333; font-size: 24px; display: table-cell; vertical-align: middle;"></span>
                </div>
                <a href="#" class="small-box-footer" style="color:#333;">
                    New Slider
                </a>
            </div>
        </div><!-- ./col -->
    </div>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'slider-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => true,
        'htmlOptions' => array('role' => 'form', 'data-toggle' => 'validator', 'enctype' => 'multipart/form-data')
    ));
    ?>
    <div class="row" id="create-slider" style="margin-top: 30px;">
        <div class="col-md-3 col-xs-12">
            <div class="box">
                <div class="box-body">
                    <?php if (Yii::app()->user->hasFlash('newsUpdate')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo Yii::app()->user->getFlash('newsUpdate'); ?>
                        </div>
                    <?php endif; ?>

                    <?php echo $form->errorSummary($model, 'Vui lòng sửa các lỗi bên dưới:', '', array('class' => 'callout callout-danger')); ?>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'name'); ?>
                        <?php echo $form->textField($model, 'name', array('class' => 'form-control')); ?>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'image'); ?>
                        <?php echo $form->fileField($model, 'image'); ?>
                        <?php if (isset($model->oldImage) && $model->oldImage): ?>
                            <div style="margin-top:10px;"><img src="/uploads/news/<?php echo $model->oldImage; ?>" width="80px" /></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-success', 'style' => 'margin-top:20px;')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>

</section><!-- /.content -->