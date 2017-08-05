<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/nvh.css" rel="stylesheet" type="text/css" />

        <title><?php echo CHtml::encode(Yii::app()->name); ?></title>
        
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- date-range-picker -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/AdminLTE/app.js" type="text/javascript"></script>

        <?php if ($this->isEditor): ?>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <?php endif; ?>

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/validator.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                $('#add-page').click(function() {
                    var ids = $('input[name="MenuPageForm[page][]"]:checkbox:checked').map(function() {
                        return $(this).val();
                    }).get();

                    $.ajax({
                        type: "get",
                        dataType: '',
                        url: window.location.pathname + '?r=menu/addpage',
                        data: "ids=" + ids + '&location=' + $('#select-location').val(),
                        beforeSend: function(request) {
                            // This is where you show the dialog.
                            // return confirm('Do you want to delete!');
                        },
                        success: function(result) {
                            var ids = result.split(',');
                            if ($.isArray(ids)) {
                                $("#menu-refresh").load(window.location.pathname + "?r=menu/refresh&location=" + getUrlVars()["location"]);
                            }

                        },
                        error: function() {
                        }
                    });
                });

                $('#add-category').click(function() {
                    var ids = $('input[name="MenuCategoryForm[category][]"]:checkbox:checked').map(function() {
                        return $(this).val();
                    }).get();

                    $.ajax({
                        type: "get",
                        dataType: '',
                        url: window.location.pathname + '?r=menu/addcategory',
                        data: "ids=" + ids + '&location=' + $('#select-location').val(),
                        beforeSend: function(request) {
                            // This is where you show the dialog.
                            // return confirm('Do you want to delete!');
                        },
                        success: function(result) {
                            var ids = result.split(',');
                            if ($.isArray(ids)) {
                                $("#menu-refresh").load(window.location.pathname + "?r=menu/refresh&location=" + getUrlVars()["location"]);
                            }

                        },
                        error: function() {
                        }
                    });
                });


                $('#add-custom').click(function() {
                    var title = $('input[name="MenuCustomForm[title]').val();
                    var url = $('input[name="Categories[direct]"]').val();

                    $.ajax({
                        type: "get",
                        dataType: '',
                        url: window.location.pathname + '?r=menu/addcustom',
                        data: "title=" + title + '&url=' + url + '&location=' + $('#select-location').val(),
                        beforeSend: function(request) {
                            // This is where you show the dialog.
                            // return confirm('Do you want to delete!');
                        },
                        success: function(result) {
                            $('input[name="MenuCustomForm[title]').val('');
                            $('input[name="Categories[direct]"]').val('');
                            $("#menu-refresh").load(window.location.pathname + "?r=menu/refresh&location=" + getUrlVars()["location"]);
                        },
                        error: function() {
                        }
                    });
                });

                $('input[name="MenuCategoryForm[category][]"]').each(function() {
                    $(this).change(function() {
                        if (this.checked) {
                            if ($(this).parent().has("ul").length) {
                                $(this).parent().children("ul").children("li").children("input[type='checkbox']").prop('checked', true);
                            }
                        } else {
                            if ($(this).parent().has("ul").length) {
                                $(this).parent().children("ul").children("li").children("input[type='checkbox']").prop('checked', false);
                            }
                        }
                    });
                });

                $('input[name="Menu[update][]"]').each(function(index) {
                    $(this).click(function() {
                        var order = $('input[name="Menu[ordering][]"]');
                        var parent = $('select[name="Menu[parent_id][]"]');
                        var id = $(this).attr('data');

                        $.ajax({
                            type: "get",
                            url: window.location.pathname + '?r=menu/update',
                            data: "id=" + id + '&order=' + $(order[index]).val() + '&parent_id=' + $(parent[index]).val(),
                            beforeSend: function(request) {
                                // This is where you show the dialog.
                                // return confirm('Do you want to delete!');
                            },
                            success: function(result) {
                                $("#menu-refresh").load(window.location.pathname + "?r=menu/refresh&location=" + getUrlVars()["location"]);
                            },
                            error: function() {
                            }
                        });
                    });
                });


                $('#btn-select-location').click(function() {
                    var l = getUrlVars()["location"];
                    var r = getUrlVars()["r"];
                    var change = $('#select-location').val();

                    if (typeof l === "undefined")
                        l = 'top';

                    if (l !== change)
                        location.href = window.location.pathname + '?r=' + r + '&location=' + change;

                });

                $('#load').click(function() {
                    $("#menu-refresh").load("http://localhost/cmsadmin/index.php?r=menu/refresh&location=" + getUrlVars()["location"]);
                });
            });
        </script>
    </head>

    <?php $router = Yii::app()->controller->getId() . '/' . Yii::app()->controller->getAction()->getId(); ?>
    <?php // echo Yii::app()->homeUrl; ?>

    <body class="skin-blue">
        <header class="header">
            <a class="logo" href="<?php echo Yii::app()->homeUrl; ?>">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Admin
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav role="navigation" class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a role="button" data-toggle="offcanvas" class="navbar-btn sidebar-toggle" href="#">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo Yii::app()->user->account->fullname; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img alt="User Image" class="img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/img/user.jpg" />
                                    <p>
                                        <?php echo Yii::app()->user->account->fullname; ?>
                                        <small>Member since Nov. 2015</small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a class="btn btn-default btn-flat" href="<?php echo Yii::app()->createUrl('myaccount/changepassword'); ?>">Change Password</a>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-default btn-flat" href="<?php echo Yii::app()->createUrl('site/logout'); ?>">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="wrapper row-offcanvas row-offcanvas-left" style="min-height: 919px;">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas" style="min-height: 1633px;">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img alt="User Image" class="img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/img/user.jpg" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo Yii::app()->user->account->fullname; ?></p>

                            <a href="javascript: void();"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="javascript: void();">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>

                        <?php if (isset($this->menu) && $this->menu): ?>
                            <?php foreach ($this->menu as $i): ?>
                                <li <?php if (isset($i['child']) && $i['child']): ?> class="treeview <?php if (isset($i['s']) && strlen(strstr($i['s'], $router)) > 0): ?>active<?php endif; ?>"<?php else: ?> <?php if (strlen(strstr($i['module'], $router)) > 0): ?> class="active" <?php endif; ?> <?php endif; ?> style="display: block;">
                                    <a href="<?php if ($i['module'] != ''): ?> <?php echo Yii::app()->homeUrl . $i['module']; ?> <?php else: echo 'javascript:void();'; ?> <?php endif; ?>">
                                        <i class="<?php echo $i['icon']; ?>"></i>
                                        <span><?php echo $i['name']; ?></span>

                                        <?php if (isset($i['child']) && $i['child']): ?>
                                            <i class="fa fa-angle-left pull-right"></i>
                                        <?php endif; ?>
                                    </a>
                                    <?php if (isset($i['child']) && $i['child']): ?>
                                        <ul class="treeview-menu">
                                            <?php foreach ($i['child'] as $j): ?>
                                                <li <?php if (strlen(strstr($j['module'], $router)) > 0): ?> class="active" <?php endif; ?>><a href="<?php echo Yii::app()->homeUrl . $j['module']; ?>" style="margin-left: 10px;"><i class="<?php echo $j['icon']; ?>"></i><?php echo $j['name']; ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <?php echo $content; ?>
            </aside><!-- /.right-side -->
        </div>

        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- InputMask -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/input-mask/jquery.inputmask.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/input-mask/jquery.inputmask.extensions.js"></script>
        <!-- date-range-picker -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/AdminLTE/app.js" type="text/javascript"></script>

        <?php if ($this->isEditor): ?>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <?php endif; ?>

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/validator.js"></script>

        <!-- Page script -->
        <?php if ($this->isEditor): ?>
            <script type="text/javascript">
                $(function() {
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('editor1');
                    CKEDITOR.replace('editor2');
                });
            </script>
        <?php endif; ?>
        <script type="text/javascript">
            $(function() {
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
                $("[data-mask]").inputmask();
                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});

                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>
    </body>
</html>