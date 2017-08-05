<link href="//fonts.googleapis.com/css?family=Roboto:700|Roboto:normal&amp;subset=latin" rel="stylesheet" type="text/css">
<style type="text/css">
    body { font-family: 'Roboto'; font-weight: normal; font-size: 15px; color: #444444; }
    h1.heading-title { font-family: 'Roboto' !important; font-size: 30px !important; }

</style>
<div id="wrapper-content" class="clearfix">
    <div class="vc_row wpb_row vc_row-fluid bgp-center-bottom glass-none eclipse-shadow-none vc_custom_1458642282379 vc_row-has-fill vc_column-gap-0">
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                    <div class="container">
                        <div class="vc_row wpb_row vc_inner vc_row-fluid bgp-center-center glass-none vc_custom_1458642377111 vc_row-has-fill vc_column-gap-0">
                            <div class="wpb_column vc_column_container vc_col-sm-10 vc_col-sm-offset-1">
                                <div class="vc_column-inner ">
                                    <div class="wpb_wrapper">
                                        <div class="osthemes-heading color-dark  text-center  ">
                                            <h1 class="heading-title">
                                                Liên hệ
                                            </h1>
                                            <span class="heading-sub-title fz-14 balls-at-both-side ">
                                                Liên hệ với học viện thẩm mỹ Bích Nguyệt để được tư vấn và hỗ trợ tốt nhất!
                                            </span>
                                            <img src="http://pure.osthemes.biz/yoga/wp-content/uploads/sites/5/2016/03/leaf-small-3.png " alt="Contact Us ">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-md-6 vc_col-sm-offset-1">
                                <div class="vc_column-inner ">
                                    <?php if (Yii::app()->user->hasFlash('contact')): ?>
                                        <p style="color:red;"><?php echo Yii::app()->user->getFlash('contact'); ?></p>
                                    <?php endif; ?>

                                    <div class="wpb_wrapper">
                                        <?php
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'contact-form',
                                            'enableClientValidation' => true,
                                            'clientOptions' => array(
                                                'validateOnSubmit' => true,
                                            ),
                                            'htmlOptions' => array('data-toggle' => 'validator', 'role' => 'form', 'class' => 'wpcf7-form'),
                                        ));
                                        ?>
                                        <!--<form action="/yoga/contact/#wpcf7-f4-p15-o1" method="post" class="wpcf7-form" novalidate="novalidate">-->
                                        <div class="form-contact-wrap">
                                            <div class="row">
                                                <div class="col-md-6 margin-bottom-25">
                                                    <span class="wpcf7-form-control-wrap">
                                                        <?php echo $form->textField($model, 'name', array('size' => 40, 'required' => 'required', 'placeholder' => 'Họ tên')); ?>
                                                    </span>
                                                </div>
                                                <div class="col-md-6 margin-bottom-25">
                                                    <span class="wpcf7-form-control-wrap">
                                                        <?php echo $form->textField($model, 'mobile', array('size' => 40, 'required' => 'required', 'placeholder' => 'Số điện thoại')); ?>
                                                    </span>
                                                </div>
                                                <div class="col-md-12 margin-bottom-25">
                                                    <span class="wpcf7-form-control-wrap your-email">
                                                        <input size="40" required="required" placeholder="Email" name="Contact[email]" id="Contact_name" type="email" maxlength="100">
                                                    </span>
                                                </div>
                                                <div class="col-md-12 margin-bottom-25">
                                                    <span class="wpcf7-form-control-wrap your-message">
                                                        <?php echo $form->textArea($model, 'content', array('rows' => 10, 'cols' => '40', 'required' => 'required', 'style' => 'width:100%;', 'placeholder' => 'Lời nhắn')) ?>
                                                    </span>
                                                </div>
                                                <div class="col-md-4 margin-bottom-25 col-md-offset-8 text-right">
                                                    <?php echo CHtml::submitButton('Gửi', array('class' => 'wpcf7-form-control wpcf7-submit p-button p-button-primary p-button-bg')); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!--</form>-->
                                        <?php $this->endWidget(); ?>
                                    </div>
                                </div>
                            </div>


                            <script type="text/javascript">
                                $('#contact-form').validator();
                            </script>
                            <div class="wpb_column vc_column_container vc_col-sm-4 vc_col-md-4">
                                <div class="vc_column-inner ">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                                            <div class="wpb_wrapper">
                                                <div class="footer-contact-info">
                                                    <ul>
                                                        <li>
                                                            <i class="icon icon-outline-vector-icons-pack-22"></i>
                                                            <span style="font-weight: 500"><?php echo $this->site->address; ?> / <?php echo $this->site->phone; ?></span>
                                                        </li>
                                                        <?php if ($this->site->address2): ?>
                                                            <li>
                                                                <i class="icon icon-outline-vector-icons-pack-22"></i>
                                                                <span style="font-weight: 500"><?php echo $this->site->address2; ?> / <?php echo $this->site->phone2; ?></span>
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if ($this->site->address3): ?>
                                                            <li>
                                                                <i class="icon icon-outline-vector-icons-pack-22"></i>
                                                                <span style="font-weight: 500"><?php echo $this->site->address3; ?> / <?php echo $this->site->phone3; ?></span>
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if ($this->site->address4): ?>
                                                            <li>
                                                                <i class="icon icon-outline-vector-icons-pack-22"></i>
                                                                <span style="font-weight: 500"><?php echo $this->site->address4; ?> / <?php echo $this->site->phone4; ?></span>
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if ($this->site->address5): ?>
                                                            <li>
                                                                <i class="icon icon-outline-vector-icons-pack-22"></i>
                                                                <span style="font-weight: 500"><?php echo $this->site->address5; ?> / <?php echo $this->site->phone5; ?></span>
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if ($this->site->address6): ?>
                                                            <li>
                                                                <i class="icon icon-outline-vector-icons-pack-22"></i>
                                                                <span style="font-weight: 500"><?php echo $this->site->address6; ?> / <?php echo $this->site->phone6; ?></span>
                                                            </li>
                                                        <?php endif; ?>
                                                        <li>
                                                            <i class="icon icon-outline-vector-icons-pack-86"></i>
                                                            <span style="font-weight: 500">Hotline: <?php echo $this->site->hotline; ?></span>
                                                        </li>
                                                        <li>
                                                            <i class="icon icon-ios-email-outline"></i>
                                                            <span style="font-weight: 500"><?php echo $this->site->email; ?></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
<!--                                        <div class="wpb_gmaps_widget wpb_content_element">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_map_wraper">
                                                    <iframe src="<?php echo $this->site->googlemap; ?>" width="270" height="243" frameborder="0" style="border: 0px; pointer-events: none;" allowfullscreen=""></iframe>
                                                </div>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>