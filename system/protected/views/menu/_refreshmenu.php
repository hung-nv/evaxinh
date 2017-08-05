<?php if (isset($menu) && $menu): ?>
    <?php foreach ($menu as $i): ?>
        <div class="panel box box-danger">
            <div class="box-header with-border">
                <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#menu-refresh" href="#collapse<?php echo $i['id']; ?>" class="collapsed" aria-expanded="false">
                        <?php echo $i['title']; ?>
                    </a>
                    <span><?php echo ucwords($i['type']); ?></span>
                </h4>
            </div>
            <div id="collapse<?php echo $i['id']; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="required">Order</label>
                                <input class="form-control" name="Menu[ordering][]" value="<?php echo $i['ordering']; ?>" type="text">
                            </div>
                            <div class="col-md-9">
                                <label class="required">Parent</label>

                                <select id="" class="form-control" name="Menu[parent_id][]">
                                    <option value="0">Select...</option>
                                    <?php foreach ($parent as $item): ?>
                                        <option value="<?php echo $item['id']; ?>"><?php echo $item['title']; ?></option>
                                        <?php if (isset($item['child']) && $item['child']): ?>
                                            <?php foreach ($item['child'] as $sub): ?>
                                                <option value="<?php echo $sub['id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sub['title']; ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary btn-sm" type="button" value="Update" data="<?php echo $i['id']; ?>" name="Menu[update][]">
                        <a href="<?php echo Yii::app()->createUrl('menu/remove', array('id' => $i['id'])); ?>" class="text-red" style="padding-left: 10px;">Remove</a>
                    </div>
                </div>
            </div>
        </div>

        <?php if (isset($i['child']) && $i['child']): ?>
            <?php foreach ($i['child'] as $j): ?>
                <div class="panel box box-danger" style="margin-left: 30px;">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#menu-refresh" href="#collapse<?php echo $j['id']; ?>" class="collapsed" aria-expanded="false">
                                <?php echo $j['title']; ?> <i style="padding-left: 10px; font-weight: normal; font-size: 13px;">chỉ mục con</i>
                            </a>
                            <span><?php echo ucwords($j['type']); ?></span>
                        </h4>
                    </div>
                    <div id="collapse<?php echo $j['id']; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="required">Order</label>
                                        <input class="form-control" name="Menu[ordering][]" value="<?php echo $j['ordering']; ?>" type="text">
                                    </div>
                                    <div class="col-md-9">
                                        <label class="required">Parent</label>

                                        <select id="" class="form-control" name="Menu[parent_id][]">
                                            <option value="0">Select...</option>
                                            <?php foreach ($parent as $item): ?>
                                                <option value="<?php echo $item['id']; ?>" <?php if ($j['parent_id'] == $item['id']): ?> selected="selected" <?php endif; ?>><?php echo $item['title']; ?></option>
                                                <?php if (isset($item['child']) && $item['child']): ?>
                                                    <?php foreach ($item['child'] as $sub): ?>
                                                        <option value="<?php echo $sub['id']; ?>" <?php if ($j['parent_id'] == $sub['id']): ?> selected="selected" <?php endif; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sub['title']; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary btn-sm" type="button" value="Update" data="<?php echo $j['id']; ?>" name="Menu[update][]">
                                <a href="<?php echo Yii::app()->createUrl('menu/remove', array('id' => $j['id'])); ?>" class="text-red" style="padding-left: 10px;">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>

<script type="text/javascript">
    $(document).ready(function() {
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
    });
</script>