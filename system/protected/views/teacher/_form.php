<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'teacher-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('role' => 'form', 'data-toggle' => 'validator', 'enctype' => 'multipart/form-data')
)); ?>

<div class="col-md-6">
    <div class="box box-primary">
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
                <?php echo $form->textField($model, 'name', array('class' => 'form-control', 'required' => 'required')); ?>
                <div class="help-block with-errors"></div>
            </div>
            
            <div class="form-group">
                <?php echo $form->labelEx($model, 'avatar'); ?>
                <?php echo $form->fileField($model, 'avatar'); ?>
                <?php if (isset($model->oldAvatar) && $model->oldAvatar): ?>
                    <div style="margin-top:10px;"><img src="../uploads/teacher/<?php echo $model->oldAvatar; ?>" width="80px" /></div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <?php echo $form->labelEx($model, 'introduction'); ?>
                <?php echo $form->textArea($model, 'introduction', array('rows' => 5,'id' => 'editor1','class' => 'form-control', 'required' => 'required')); ?>
                <div class="help-block with-errors"></div>
            </div>
            
            <div class="form-group">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', array('class' => 'btn btn-success', 'style' => 'margin-top:20px;')); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>