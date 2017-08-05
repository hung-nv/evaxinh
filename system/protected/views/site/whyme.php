<section class="content">
    <div class="row">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'user-form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('role' => 'form', 'data-toggle' => 'validator')
        ));
        ?>
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Why me?</h3>                                    
                </div>

                <div class="box-body">

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'why_me_label'); ?>
                        <?php echo $form->textField($model, 'why_me_label', array('class' => 'form-control')); ?>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'why_me_content'); ?>
                        <?php echo $form->textArea($model, 'why_me_content', array('rows' => 10, 'id' => 'editor1', 'class' => 'form-control')); ?>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-success', 'style' => 'margin-top:20px;')); ?>
                    </div>
                </div>

            </div>
        </div>
        
        <?php $this->endWidget(); ?>
    </div>
</section>