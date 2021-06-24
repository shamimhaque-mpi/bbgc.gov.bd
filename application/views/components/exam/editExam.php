<style>
    .attendance tr th{
        text-align: center;
    }
    .attendance label{
        display: block;
    }
    .exam td{
        padding:  0 !important;
    }
    .exam input[type="text"], input[type="number"]{
        border: 1px solid transparent;
    }
    .td-width{
        width:  10%;
    }
</style>

<div class="container-fluid" ng-controller="EditExamCtrl">
    <div class="row">
        <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Edit</h1>
                </div>
            </div>

            <div class="panel-body">

            <?php
            $attr=array("class" => "form-horizontal");
            echo form_open("exam/exam/editExam?q=".$this->input->get("q")."&&class=".$_GET['class'], $attr);
            ?>

            <!-- pre><?php print_r($info); ?></pre -->

            <div class="form-group">
                <label class="col-md-2 control-label">Exam Name <span class="req">*</span></label>
                <div class="col-md-5">
                    <input type="text" name="exam_name" value="<?php echo $info[0]->title; ?>" list="exam_name" class="form-control">
                    <datalist id="exam_name">
                        <?php 
                        if($exam != null){
                            foreach($exam as $row){
                        ?>
                        <option value="<?php echo $row->title; ?>">
                        <?php }} ?>
                    </datalist>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">Exam Start At <span class="req">*</span></label>
                    <div class="col-md-5">
                    <div class="input-group date" id="examStartAt">
                        <input type="text" name="dateTime" value="<?php echo $info[0]->date; ?>" class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
            $(function () {
                $('#examStartAt').datetimepicker({
                    format: 'YYYY-MM-DD hh:mm:ss'
                });
            });
            </script>

            <div class="form-group">
                <label class="col-md-2 control-label">Class <span class="req">*</span></label>
                <div class="col-md-5">
                    <select name="class" class="form-control" required >
                        <option value="">-- Select Class --</option>
                        <?php foreach(config_item('classes') as $key => $value){ ?>
                        <option value="<?php echo $key; ?>" <?php if($info[0]->class == $key){echo "selected";} ?>>
                            <?php echo $value; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        
            <table class="table table-bordered exam">
                <tr>
                    <th>SL</th>
                    <th>Subject Name</th>
                    <th>Group</th>
                    <th class="td-width">Objective</th>
                    <th class="td-width">OPM</th>
                    <th class="td-width">Written</th>
                    <th class="td-width">WPM</th>
                    <th class="td-width">Practical</th>
                    <th class="td-width">PPM</th>
                    <th class="td-width">Total</th>
                </tr>
                <!--pre><?php print_r($info);?></pre-->
                <?php foreach($info as $key => $row){ ?>
                <tr>
                    <td style="padding: 7px 8px !important;"><?php echo ($key+1); ?></td>
                    <td><input class="form-control" type="text" name="name[]" value="<?php echo $row->subject; ?>" readonly></td>
                    <td><input class="form-control" type="text" name="group[]" value="<?php echo $row->group; ?>" readonly></td>
                    <td><input class="form-control" type="number" name="objective[]" ng-model="objective<?php echo $key; ?>" ng-init="objective<?php echo $key; ?>=<?php echo $row->objective; ?>" max="100" min="0" step="any"></td>
                    <td><input class="form-control" type="number" name="obj_pass_marks[]" ng-model="obj_pass_marks<?php echo $key; ?>" ng-init="obj_pass_marks<?php echo $key; ?>=<?php echo $row->objective_pass_mark; ?>" max="100" min="0" step="any"></td>
                    <td><input class="form-control" type="number" name="written[]" ng-model="written<?php echo $key; ?>" ng-init="written<?php echo $key; ?>=<?php echo $row->written; ?>" max="100" min="0" step="any"></td>
                    <td><input class="form-control" type="number" name="wri_pass_marks[]" ng-model="wri_pass_marks<?php echo $key; ?>" ng-init="wri_pass_marks<?php echo $key; ?>=<?php echo $row->written_pass_mark; ?>" max="100" min="0" step="any"></td>
                    <td><input class="form-control" type="number" name="practical[]" ng-model="practical<?php echo $key; ?>" ng-init="practical<?php echo $key; ?>=<?php echo $row->practical; ?>" max="100" min="0" step="any"></td>
                    <td><input class="form-control" type="number" name="pra_pass_marks[]" ng-model="pra_pass_marks<?php echo $key; ?>" ng-init="pra_pass_marks<?php echo $key; ?>=<?php echo $row->practical_pass_mark; ?>" max="100" min="0" step="any"></td>
                    <td><input class="form-control" type="text" name="total[]" ng-value="totalFn(objective<?php echo $key; ?>, written<?php echo $key; ?>, practical<?php echo $key; ?>)" readonly></td>
                </tr>
                <?php } ?>
            </table>

            <div class="btn-group pull-right">
                <input type="submit" value="Change" name="change" class="btn btn-primary">
            </div>
            
            <?php echo form_close();?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>



