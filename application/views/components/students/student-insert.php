<div class="container-fluid">
    <div class="row">
        <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>New Student</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>Add Student Data</h4>

                    <ol style="font-size: 14px;">
                        <li>1. fill all the required <mark>*</mark> fields</li>
                        <li>2. click the <mark>save</mark> button to insert data</li>
                    </ol>

                </blockquote>

                
                <hr-->

                <!-- horizontal form -->
                    
                    <div class="col-sm-12 no-padding">

                        <?php
                        $attr=array(
                            "class"=>"form-horizontal"
                            );
                        echo form_open_multipart("",$attr);?>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Student's Name <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="students_name" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Father's Name <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="fathers_name" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Mother's Name <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="mothers_name" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Father's Profession</label>
                                <div class="col-md-5">
                                    <input type="text" name="fathers_profession" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Religion <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="religion" class="form-control" required>
                                        <option value="">-- Select Religion --</option>
                                        <option value="islam">Islam</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="buddhist">Buddhist</option>
                                        <option value="christian">Christian</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Nationality <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="nationality" class="form-control">
                                        <option value="">-- Select Nationality --</option>
                                        <option value="bangladeshi">Bangladeshi</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Date of Birth <span class="req">*</span></label>
	                            <div class="input-group date col-md-5" id="datetimepicker1">
	                                <input type="text" class="form-control" name="birth_date">
	                                <span class="input-group-addon">
	                                    <span class="glyphicon glyphicon-calendar"></span>
	                                </span>
	                            </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Present Address</label>
                                <div class="col-md-5">
                                    <textarea name="preasent_address" id="pre_addr" class="form-control" cols="30" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Permanent Address</label>
                                <div class="col-md-5">
                                    <input type="checkbox" id="permanent_address" value="0"> <label for="permanent_address">Same as Present Address</label>
                                    <textarea name="permanent_address" id="per_addr" class="form-control" cols="30" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Parents Mobile Number <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="parents_mobile" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Local Guardian Mobile Number <span class="req">&nbsp;</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="lg_mobile" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Student Mobile  Number</label>
                                <div class="col-md-5">
                                    <input type="text" name="mobile_number" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Session <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="session" class="form-control">
                                        <?php for($i=date("Y")-1; $i<=date("Y")+5; $i++){?>
                                        <option value="<?php echo $i."-".($i+1); ?>"><?php echo $i."-".($i+1); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Roll <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="roll" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Class <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="class" class="form-control">
                                        <option value="">-- Select Class --</option>
                                        <?php
                                            foreach (config_item('classes') as $key => $value) {?>
                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <!--div class="form-group">
                                <label class="col-md-2 control-label">Shift <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="shift" class="form-control">
                                        <option value="">-- Select Shift --</option>
                                        <option value="day">Day</option>
                                        <option value="morning">Morning</option>
                                    </select>
                                </div>
                            </div-->

                            <div class="form-group">
                                <label class="col-md-2 control-label">Group</label>
                                <div class="col-md-5">
                                    <select name="group" class="form-control">
                                        <option value="">-- Select Group --</option>
                                        <?php
                                            foreach (config_item('group') as $key => $value) {?>
                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Student Photo <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input id="input-test" type="file" name="attachFile" class="form-control file" data-show-preview="false" data-show-upload="false" required data-show-remove="false">
                                </div>
                            </div>  

                            <div class="col-md-7">
                            <div class="btn-group pull-right">
                                <input type="submit" value="Save" name="student_submit" class="btn btn-primary">
                            </div>
                            </div>

                        <?php echo form_close(); ?>

                    </div>

                </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script>
    $("#permanent_address").on("click",function(){
        
        if ($(this).is(":checked")) {
            $("#per_addr").val($("#pre_addr").val());
        }
        else{
            $("#per_addr").val("");
        }
    });    
</script>