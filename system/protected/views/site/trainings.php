<section class="content">
    <div class="row">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'daotao-form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('role' => 'form', 'data-toggle' => 'validator', 'enctype' => 'multipart/form-data')
        ));
        ?>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Features</h3>                                    
                </div>

                <div class="box-body">

                    <div class="form-group">
                        <?php echo $form->labelEx($daotao, 'name'); ?>
                        <?php echo $form->textField($daotao, 'name', array('class' => 'form-control')); ?>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($daotao, 'image'); ?>
                        <?php echo $form->fileField($daotao, 'image'); ?>
                        <?php if (isset($daotao->oldImage) && $daotao->oldImage): ?>
                            <div style="margin-top:10px;"><img src="../images/<?php echo $daotao->oldImage; ?>" width="80px" /></div>
                        <?php endif; ?>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($daotao, 'content'); ?>
                        <?php echo $form->textArea($daotao, 'content', array('rows' => 5, 'class' => 'form-control', 'id' => 'editor2')); ?>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-success', 'style' => 'margin-top:20px;')); ?>
                        <?php echo CHtml::button('Create', array('onclick' => 'js:document.location.href="index.php?r=site/setting"','class' => 'btn btn-success','style' => 'margin-top:20px;')); ?>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Features</h3>                                    
                </div>

                <div class="box-body table-responsive">

                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'daotao-grid',
                        'htmlOptions' => array('class' => 'dataTables_wrapper form-inline'),
                        'itemsCssClass' => 'table table-bordered table-hover dataTable',
                        'pagerCssClass' => 'dataTables_paginate paging_bootstrap',
                        'pager' => array(
                            'header' => '',
                            'class' => 'CLinkPager',
                            'htmlOptions' => array(
                                'class' => 'pagination',
                            ),
                            'selectedPageCssClass' => 'active',
                            'hiddenPageCssClass' => 'disabled',
                            'firstPageCssClass' => 'hidden',
                            'prevPageLabel' => '«',
                            'nextPageLabel' => '»',
                            'lastPageCssClass' => 'hidden'
                        ),
                        'summaryCssClass' => 'summaryPosts',
                        'template' => "{summary}\n{items}\n{pager}",
                        //'rowCssClassExpression' => '$data->parent_id == 0 ? "parent" : "child"',
                        'dataProvider' => $dataF->search(),
                        //'ajaxUpdate' => true,
                        'columns' => array(
                            'id',
                            array(
                                'name' => 'name',
                                'value' => '$data->setLabel()',
                                'type' => 'raw',
                                'htmlOptions' => array(
                                    'style' => 'text-align:center;'
                                )
                            ),
                            array(
                                'name' => 'content',
                                'value' => '$data->content',
                                'type' => 'raw',
                            ),
                            array(
                                'class' => 'CButtonColumn',
                                'template' => '{edit}{delete}',
                                'buttons' => array(
                                    'edit' => array(
                                        'label' => '',
                                        'options' => array('class' => 'glyphicon glyphicon-edit', 'title' => 'Update', 'style' => 'margin-right: 5px;'),
                                        'imageUrl' => FALSE,
                                        'url' => 'Yii::app()->createUrl("site/setting",array("daotao_id"=>$data->id))',
                                    ),
                                    'delete' => array(
                                        'label' => '',
                                        'options' => array('class' => 'glyphicon glyphicon-remove', 'title' => 'Delete'),
                                        'imageUrl' => FALSE,
                                        'url' => 'Yii::app()->createUrl("daotao/delete", array("id"=>$data->id))',
                                    ),
                                ),
                            ),
                        ),
                    ));
                    ?>

                </div><!-- /.box-body -->
            </div>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</section>