<style>
    .total{
        color: #606060;
    }
    .total h4{
        margin-top: 0;
    }
    .total h4 span{
        color: #2B2B2B;
    }
</style>

<div class="container-fluid">
    <div class="row">
<?php //echo "<pre>"; print_r($student_info); echo "</pre>";?>
<?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Upgrade Student</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>All Admitted Student</h4>

                    <ol style="font-size: 14px;">
                        <li>1. fill all the required <mark>*</mark> fields</li>
                        <li>2. click the <mark>show</mark> button to insert data</li>
                    </ol>

                </blockquote>

                <hr-->

                <?php
                    $attr=array(
                        "class"=>"form-horizontal"
                        );
                echo form_open('',$attr);?>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Session</label>
                        <div class="col-md-5">
                           <select name="search[session]" class="form-control">
                               <option value="">-- Select Session --</option>
                               <?php foreach ($session_list as $key => $value) { ?>
                               <option value="<?php echo $value->session; ?>"><?php echo $value->session; ?></option>
                               <?php } ?>
                           </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Class</label>
                        <div class="col-md-5">
                            <select name="search[class]" class="form-control">
                                <option value="">-- Select Class--</option>
                                <?php
                                    foreach (config_item('classes') as $key => $value) {?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php
                                    }
                                ?>
                                    <option value="passed">Passed</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Roll No</label>
                        <div class="col-md-5">
                            <input type="text" name="search[students_roll]" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" value="Show" name="viewQuery" class="btn btn-primary">
                    </div>
                    </div>

                <?php echo form_close(); ?>

            </div>
            <div class="panel-footer">&nbsp;</div>

        </div>

        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Show Students</h1>
                </div>
            </div>

            <div class="panel-body">

                <div class="total">
                    <h4>Total: <span><?php echo count($student_info);?></span></h4>
                </div>

                <?php
                    $attr=array('class'=>'form-horizontal');
                    echo form_open('',$attr);
                ?>
                    <?php if($student_info!=null){?>
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th> 
                            <th>Update</th>
                            <th>Roll</th>
                            <th>Session</th>
                            <th>Class</th>
                            <th>Name</th>
                        </tr>
                       <?php foreach ($student_info as $key => $student) { ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><input type="checkbox" name="ids[]" value="<?php echo $student->id; ?>" checked></td>
                            <td> <?php echo $student->students_roll; ?> </td>
                            <td> <?php echo $student->session; ?> </td>
                            <td> <?php echo $student->class; ?> </td>
                            <td> <?php echo $student->students_name; ?> </td>
                        </tr>
                        <?php } ?>                       
                    </table>
                    <?php } ?>
                
                    <div class="form-group">
                        <label class="col-md-2 control-label">Class</label>
                        <div class="col-md-5">
                            <select name="class" class="form-control">
                                <option value="">-- Select Class--</option>
                                <?php
                                    foreach (config_item('classes') as $key => $value) {?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php
                                    }
                                ?>
                                    <option value="passed">Passed</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Section</label>
                        <div class="col-md-5">
                            <select name="student_section" class="form-control">
                                <option value="">-- Select Section --</option>
                                <option value="Section_I">Section I</option>
                                <option value="Section_II">Section II</option>
                                <option value="Section_III">Section III</option>
                                <option value="Section_IV">Section IV</option>
                                <option value="Section_V">Section V</option>
                                <option value="Section_VI">Section VI</option>
                                <option value="Section_VII">Section VII</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" value="Update" name="submit_upgrade" class="btn btn-primary">
                    </div>
                    </div>
                
                <?php echo form_close(); ?>

            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

