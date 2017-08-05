<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/lightbox.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/lightbox.css" />
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'explain-data-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => true,
    'htmlOptions' => array('role' => 'form', 'data-toggle' => 'validator')
        ));
?>

<div class="col-md-8">
    <div class="box box-primary">
        <div class="box-body">
            <?php if (Yii::app()->user->hasFlash('explainUpdate')): ?>
                <div class="alert alert-success alert-dismissable">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo Yii::app()->user->getFlash('explainUpdate'); ?>
                </div>
            <?php endif; ?>

            <?php echo $form->errorSummary($model, 'Vui lòng sửa các lỗi bên dưới:', '', array('class' => 'callout callout-danger')); ?>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'news_id'); ?>
                <?php echo $form->textField($model, 'newsName', array('class' => 'form-control', 'readOnly' => true, 'style' => 'color: red;')); ?>
                <div class="help-block with-errors"></div>
            </div>
            
            <div class="form-group">
                <?php echo $form->labelEx($model, 'label'); ?>
                <?php echo $form->textField($model, 'label', array('class' => 'form-control', 'required' => 'required', 'data-error' => 'Tiêu đề không được để trống')); ?>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'data'); ?>
                <?php echo $form->textArea($model, 'data', array('class' => 'form-control', 'rows' => '30', 'id' => 'editor1', 'required' => 'required', 'data-error' => 'Nội dung không được để trống!')); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="box box-info">
        <div class="box-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <?php echo $form->labelEx($model, 'location'); ?>
                        <?php echo $form->dropDownList($model, 'location', array('' => 'Select', 2 => 'First After Content', 3 => 'Second After Content'), array('class' => 'form-control', 'style' => 'width: 100%;')); ?>
                        <?php echo $form->error($model, 'location'); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', array('class' => 'btn btn-success', 'style' => 'margin-top:20px;')); ?>
                    </div>
                </div>
            </div>

            <div class="form-group" style="margin-top: 50px;">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/img/location.jpg" data-lightbox="roadtrip"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/location.jpg" style="width: 100%;" /></a>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<?php $this->endWidget(); ?>