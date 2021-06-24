<div class="container-fluid">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Add Exam Name</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php
                $attr = array("class" => "form-horizontal");
                echo form_open("", $attr);
                ?>

                <div class="form-group">
                    <label class="col-md-2 control-label">
                       Exam Name
                        <span class="req">*</span>
                    </label>

                    <div class="col-md-5">
                        <input type="text" name="exam_name" class="form-control" required>
                        <input type="hidden" name="exam_code" value="<?php echo strtotime("now"); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">
                        Starting Date 
                        <span class="req">*</span>
                    </label>

                    <div class="col-md-5">
                        <div class="input-group date" id="examStartAt">
                            <input type="text" name="dateTime" class="form-control" required>

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
                        <input type="submit" value="Save" name="add" class="btn btn-primary">
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php if($records != null){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>All Exam Name</h1>
                </div>
            </div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Starting Date</th>
                        <th>Exam Name </th>
                        <th>Exam Code</th>
                        <th>Action</th>
                    </tr>

                    <?php foreach($records as $key => $row) { ?>
                    <tr>
                        <td><?php echo ($key + 1); ?></td>
                        <td><?php echo $row->start_at; ?></td>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->code; ?></td>
                        <td>
                            <a href="<?php echo site_url('exam/exam/editNewExam?id=' . $row->code); ?>" class="btn btn-info">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>

                            <a href="<?php echo site_url('exam/exam/deleteExam?id=' . $row->id); ?>" onclick="return confirm('Are You Sure Want to Delete this Exam Name?');" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php } ?>
    </div>
</div>
