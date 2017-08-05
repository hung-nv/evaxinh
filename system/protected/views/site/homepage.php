<section class="content">
    <div class="row">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'user-form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('role' => 'form', 'data-toggle' => 'validator', 'enctype' => 'multipart/form-data')
        ));
        ?>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Meta Tags</h3>                                    
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'meta_title'); ?>
                        <?php echo $form->textField($model, 'meta_title', array('class' => 'form-control', 'required' => 'required')); ?>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'meta_description'); ?>
                        <?php echo $form->textField($model, 'meta_description', array('class' => 'form-control', 'required' => 'required')); ?>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'meta_keywords'); ?>
                        <?php echo $form->textField($model, 'meta_keywords', array('class' => 'form-control')); ?>
                        <div class="help-block with-errors"></div>
                    </div>

                </div>

            </div>

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Social</h3>                                    
                </div>

                <div class="box-body">
                    
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'logo'); ?>
                        <?php echo $form->fileField($model, 'logo'); ?>
                        <?php if (isset($model->oldLogo) && $model->oldLogo): ?>
                            <div style="margin-top:10px;"><img src="../images/<?php echo $model->oldLogo; ?>" width="80px" /></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'favico'); ?>
                        <?php echo $form->fileField($model, 'favico'); ?>
                        <?php if (isset($model->oldFavico) && $model->oldFavico): ?>
                            <div style="margin-top:10px;"><img src="../images/<?php echo $model->oldFavico; ?>" width="10px" /></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'fanpage'); ?>
                        <?php echo $form->textField($model, 'fanpage', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'fanpage'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'youtube'); ?>
                        <?php echo $form->textField($model, 'youtube', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'youtube'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'googlemap'); ?>
                        <?php echo $form->textField($model, 'googlemap', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'googlemap'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-success', 'style' => 'margin-top:20px;')); ?>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">General</h3>                                    
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo $form->labelEx($model, 'hotline'); ?>
                                <?php echo $form->textField($model, 'hotline', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'hotline'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $form->labelEx($model, 'skype'); ?>
                                <?php echo $form->textField($model, 'skype', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'skype'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo $form->labelEx($model, 'address'); ?>
                                <?php echo $form->textField($model, 'address', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'address'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $form->labelEx($model, 'phone'); ?>
                                <?php echo $form->textField($model, 'phone', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'phone'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo $form->labelEx($model, 'address2'); ?>
                                <?php echo $form->textField($model, 'address2', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'address2'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $form->labelEx($model, 'phone2'); ?>
                                <?php echo $form->textField($model, 'phone2', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'phone2'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo $form->labelEx($model, 'address3'); ?>
                                <?php echo $form->textField($model, 'address3', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'address3'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $form->labelEx($model, 'phone3'); ?>
                                <?php echo $form->textField($model, 'phone3', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'phone3'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo $form->labelEx($model, 'address4'); ?>
                                <?php echo $form->textField($model, 'address4', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'address4'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $form->labelEx($model, 'phone4'); ?>
                                <?php echo $form->textField($model, 'phone4', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'phone4'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo $form->labelEx($model, 'address5'); ?>
                                <?php echo $form->textField($model, 'address5', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'address5'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $form->labelEx($model, 'phone5'); ?>
                                <?php echo $form->textField($model, 'phone5', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'phone5'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo $form->labelEx($model, 'address6'); ?>
                                <?php echo $form->textField($model, 'address6', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'address6'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $form->labelEx($model, 'phone6'); ?>
                                <?php echo $form->textField($model, 'phone6', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'phone6'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo $form->labelEx($model, 'email'); ?>
                                <?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'email'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $form->labelEx($model, 'fax'); ?>
                                <?php echo $form->textField($model, 'fax', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'fax'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'news_ids'); ?>
                        <?php echo $form->textField($model, 'news_ids', array('class' => 'form-control')); ?>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</section>