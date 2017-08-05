<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'categories-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'htmlOptions' => array('role' => 'form', 'data-toggle' => 'validator')
        ));
?>
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Create Category</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">

        <?php if (Yii::app()->user->hasFlash('categories')): ?>
            <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo Yii::app()->user->getFlash('categories'); ?>
            </div>
        <?php endif; ?>

        <input type="hidden" value="" id="set_id" name="Categories[id]" />
        <div class="form-group">
            <?php echo $form->labelEx($model, 'title'); ?>
            <?php echo $form->textField($model, 'title', array('class' => 'form-control', 'placeholder' => 'Enter title', 'required' => 'required', 'data-error' => '"Tên" không được để trống')); ?>
            <div class="help-block with-errors"></div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'alias'); ?>
            <?php echo $form->textField($model, 'alias', array('class' => 'form-control', 'placeholder' => 'Enter alias')); ?>
            <?php echo $form->error($model, 'alias'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'parent_id'); ?>
            <select class="form-control" name="Categories[parent_id]" id="Categories_parent_id">
                <option value="0" selected="selected">Select...</option>
                <?php if ($model->getListCategory()): ?>
                    <?php foreach ($model->getListCategory() as $i): ?>
                        <option value="<?php echo $i['id']; ?>"><?php echo $i['title']; ?></option>
                        <?php if (isset($i['child']) && $i['child']): ?>
                            <?php foreach ($i['child'] as $j): ?>
                                <option class="level-1" value="<?php echo $j['id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $j['title']; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <?php echo $form->error($model, 'parent_id'); ?>
        </div>
        
        <div class="form-group">
            <?php echo $form->labelEx($model, 'status'); ?>
            <?php echo $form->dropDownList($model, 'status', array('' => 'Select...', 1 => 'Yes', 0 => 'No'), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'status'); ?>
        </div>
    </div><!-- /.box-body -->

</div>

<div class="box box-solid box-primary">
    <div class="box-header">
        <h3 class="box-title">Meta Tag</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body" style="display: block;">
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

<div class="box-footer">
    <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-primary')); ?>
</div>
<?php $this->endWidget(); ?>