<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Edit Exam Name</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php
                $attr = array("class" => "form-horizontal");
                echo form_open("", $attr);
                ?>

                <!-- pre><?php print_r($records); ?></pre -->

                <div class="form-group">
                    <label class="col-md-2 control-label">
                        Exam Name
                        <span class="req">*</span>
                    </label>

                    <div class="col-md-5">
                        <input type="text" name="exam_name" value="<?php echo $records[0]->name; ?>" class="form-control" required>
                        <input type="hidden" name="exam_code" value="<?php echo $records[0]->code; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">
                       Starting Date
                        <span class="req">*</span>
                    </label>

                    <div class="col-md-5">
                        <div class="input-group date" id="examStartAt">
                            <input type="text" name="dateTime" value="<?php echo $records[0]->start_at; ?>" class="form-control" required>

                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <script type="text/javascript">
                    $('#examStartAt').datetimepicker({format: 'YYYY-MM-DD hh:mm:ss'});
                    </script>
                </div>

                <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" value="Update" name="change" class="btn btn-primary">
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
