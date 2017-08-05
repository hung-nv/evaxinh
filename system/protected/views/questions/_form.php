<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'news-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => true,
    'htmlOptions' => array('role' => 'form', 'data-toggle' => 'validator', 'enctype' => 'multipart/form-data')
        ));
?>

<div class="col-md-8">
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
                <label for="News_title" class="required">Tiêu đề <span class="required">*</span></label>
                <?php echo $form->textField($model, 'title', array('class' => 'form-control', 'required' => 'required', 'data-error' => 'Tiêu đề bài viết không được để trống')); ?>
                <div class="help-block with-errors"></div>
            </div>
            
            <div class="form-group">
                <?php echo $form->labelEx($model, 'alias'); ?>
                <?php echo $form->textField($model, 'alias', array('class' => 'form-control')); ?>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="News_description" class="required">Nội dung câu hỏi <span class="required">*</span></label>
                <?php echo $form->textArea($model, 'description', array('class' => 'form-control', 'rows' => '3', 'spellcheck' => 'false', 'required' => 'required', 'data-error' => 'Mô tả ngắn không được để trống!')); ?>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="News_content" class="required">Trả lời <span class="required">*</span></label>
                <?php echo $form->textArea($model, 'content', array('class' => 'form-control', 'rows' => '30', 'id' => 'editor1', 'required' => 'required', 'data-error' => 'Nội dung không được để trống!')); ?>
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
                        <?php echo $form->labelEx($model, 'status'); ?>
                        <?php echo $form->dropDownList($model, 'status', array(1 => 'Yes', 0 => 'No'), array('class' => 'form-control', 'style' => 'width: 50%;')); ?>
                        <?php echo $form->error($model, 'status'); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', array('class' => 'btn btn-success', 'style' => 'margin-top:20px;')); ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <?php echo $form->labelEx($model, 'tag'); ?>
                        <?php echo $form->dropDownList($model, 'tag', $model->getListCategory(1), array('class' => 'form-control', 'style' => 'height: auto;')); ?>
                        <?php echo $form->error($model, 'tag'); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $form->labelEx($model, 'image'); ?>
                        <?php echo $form->fileField($model, 'image'); ?>
                        <?php if (isset($model->oldImage) && $model->oldImage): ?>
                            <div style="margin-top:10px;"><img src="../uploads/news/<?php echo $model->oldImage; ?>" width="80px" /></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'keywords'); ?>
                <?php echo $form->textField($model, 'keywords', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'keywords'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'meta_title'); ?>
                <?php echo $form->textField($model, 'meta_title', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'meta_title'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'meta_description'); ?>
                <?php echo $form->textField($model, 'meta_description', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'meta_description'); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>