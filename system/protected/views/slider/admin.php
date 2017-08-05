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
                    <h3 class="box-title">All Slider</h3>                                    
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php if (isset($homeSlider) && $homeSlider): ?>
            <div class="col-lg-2 col-xs-6 slider-img-box">
                <!-- small box -->
                <div class="small-box">
                    <img src="../uploads/slider/<?php echo $homeSlider[0]->image; ?>" />
                </div>
                <a href="#" class="bg-light-blue clearfix" style="display: block; padding: 5px 0;">
                    <span style="float: left; padding-left: 10px;" onclick="location.href = '<?php echo Yii::app()->createUrl('slider/view', array('location' => 1)); ?>';"><i class="fa fa-pencil"></i> Edit</span>
                    <span style="float: right; padding-right: 10px;">Home Slider <!-- <i class="fa fa-cog"></i> --></span>
                </a>
            </div><!-- ./col -->
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
</section><!-- /.content -->