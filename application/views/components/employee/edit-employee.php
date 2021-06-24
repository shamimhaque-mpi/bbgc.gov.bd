<div class="container-fluid">
    <div class="row">
<?php //echo "<pre>"; print_r($emp_info); echo "</pre>"; ?>
<?php echo $confirmation; ?>
<?php
        $img_url=$emp_name=$email=$status=null;
        if ($emp_info[0]->employee_type=="teacher"){
            $img_url=$emp_info[0]->image;
            $emp_name=$emp_info[0]->name;
            $email=$emp_info[0]->email;
        }
        elseif($emp_info[0]->employee_type=="staff"){
            $img_url=$emp_info[0]->employee_photo;
            $emp_name=$emp_info[0]->employee_name;
            $email=$emp_info[0]->employee_email;
        }
        if ($emp_info[0]->employee_status==1) {
            $status="Available";
        }
        elseif ($emp_info[0]->employee_status==0) {
            $status="Not Available";
        }
    ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Employee</h1>
                </div>
            </div>

            <div class="panel-body">
                <!--blockquote class="form-head">
                    <h4>Add New Employee</h4>
                    <ol style="font-size: 14px;">
                        <li>1 . If you want to insert <mark>new employee</mark> then use the fields</li>
                        <li>2 . At last click on the <mark>Save</mark> button</li>
                    </ol>
                </blockquote>
                <hr-->

                <?php
                $attr=array(
                    "class"=>"form-horizontal"
                    );
                echo form_open_multipart("employee/employee/edit_employee?mobile=".$this->input->get("mobile"),$attr);?>
                <input type="hidden" name="type" value="<?php echo $emp_info[0]->employee_type; ?>">
                <input type="hidden" name="old_file" value="<?php echo $img_url; ?>">
                <input type="hidden" name="emp_id" value="<?php echo $emp_info[0]->employee_emp_id; ?>">

                    <div class="form-group">
                        <label class="col-md-2 control-label">&nbsp; <span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <img src="<?php echo base_url($img_url); ?>" width="80px" height="80px" alt="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Employee ID <span class="req">*</span></label>
                        <div class="col-md-5">
                            <input type="text" name="emp_id" placeholder="Type Employee ID" value="<?php echo $emp_info[0]->employee_emp_id; ?>" class="form-control" readonly required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Full Name <span class="req">*</span></label>
                        <div class="col-md-5">
                            <input type="text" name="full_name" placeholder="Type Full Name" value="<?php echo $emp_name; ?>" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Joining Date <span class="req">*</span></label>
                        <div class="input-group date col-md-5" id="datetimepicker">
                            <input type="text" name="joining_date" placeholder="YYYY-MM-YY" class="form-control" value="<?php echo $emp_info[0]->employee_joining; ?>" required>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    
                    <script type="text/javascript">
                            $(document).ready(function(){
		                $('#datetimepicker').datetimepicker({
		                    format: 'YYYY-MM-DD'
		                });
		            });
                    </script>

                    <!--div class="form-group">
                        <label class="col-md-2 control-label">Select Gender <span class="req">*</span></label>
                        <div class="col-md-5">
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="Male" required> Male
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="Female" required> Female
                            </label>
                        </div>
                    </div-->

                    <div class="form-group">
                        <label class="col-md-2 control-label">Mobile Number <span class="req">*</span></label>
                        <div class="col-md-5">
                            <input type="hidden" name="mobile_number" placeholder="without +88" value="<?php echo $emp_info[0]->employee_mobile; ?>" class="form-control" required>
                            <input type="text" name="new_mobile_number" placeholder="without +88" value="<?php echo $emp_info[0]->employee_mobile; ?>" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Email Address <span class="req">*</span></label>
                        <div class="col-md-5">
                            <input type="email" name="emp_email" placeholder="Type your Email" value="<?php echo $email; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Present Address <span class="req">*</span></label>
                        <div class="col-md-5">
                            <textarea name="present_address" placeholder="Type Present Address" class="form-control" cols="30" rows="5" required><?php echo $emp_info[0]->employee_present_address; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Permanent Address <span class="req">*</span></label>
                        <div class="col-md-5">
                            <textarea name="permanent_address" placeholder="Type Permanent Address" class="form-control" cols="30" rows="5" required><?php echo $emp_info[0]->employee_permanent_address; ?></textarea>
                        </div>
                    </div>

                    <!--div class="form-group">
                        <label class="col-md-2 control-label">Type <span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="type" id="teacher_type" value="<?php echo $emp_info[0]->employee_type; ?>" class="form-control" >
                                <option value="">Select Employee Type</option>
                                <option <?php if($emp_info[0]->employee_type=="teacher") echo "selected"; ?> value="teacher">Teacher</option>
                                <option <?php if($emp_info[0]->employee_type=="staff") echo "selected"; ?> value="staff">Staff</option>
                            </select>
                        </div>
                    </div-->
                    <?php if($emp_info[0]->employee_type=="teacher"){ ?>
                    <div class="form-group teachers_option">
                        <label class="col-md-2 control-label">Designation <span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="designation_teacher" class="form-control" >
                                <option value="">Select Designation</option>
                               	<?php foreach(config_item('teacher_designation') as $key=>$value){?>
                                <option <?php if($emp_info[0]->employee_designation==$key) echo "selected"; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
				<?php } ?>
                            </select>
                        </div>
                    </div>

                    <?php } if($emp_info[0]->employee_type=="staff"){ ?>
                    <div class="form-group staff_option">
                        <label class="col-md-2 control-label">Designation <span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="designation_staff" class="form-control" >
                                <option value="">Select Designation</option>                    
                                <option <?php if($emp_info[0]->employee_designation=="office_assistant") echo "selected"; ?> value="office_assistant">Office Assistant</option>
                                <option <?php if($emp_info[0]->employee_designation=="Office_Head_Accountant") echo "selected"; ?> value="Office_Head_Accountant">Office Head Accountant</option>
                                <option <?php if($emp_info[0]->employee_designation=="Office_Accountant_Assistant_(C.T)") echo "selected"; ?> value="Office_Accountant_Assistant_(C.T)">Office Accountant Assistant (C.T)</option>
                                <option <?php if($emp_info[0]->employee_designation=="Lab_Assistant") echo "selected"; ?> value="Lab_Assistant">Lab Assistant</option>
                                <option <?php if($emp_info[0]->employee_designation=="Typing_Lab_Assistant") echo "selected"; ?> value="Typing_Lab_Assistant">Typing Lab Assistant</option>
                                <option <?php if($emp_info[0]->employee_designation=="accountant") echo "selected"; ?> value="accountant">Accountant</option>
                                <option <?php if($emp_info[0]->employee_designation=="hostel_super") echo "selected"; ?> value="hostel_super">Hostel Super</option>
                                <option <?php if($emp_info[0]->employee_designation=="cooker") echo "selected"; ?> value="cooker">Cooker</option>
                                <option <?php if($emp_info[0]->employee_designation=="security_gard") echo "selected"; ?> value="security_gard">Security Gard</option>     
                                <option <?php if($emp_info[0]->employee_designation=="Librarian") echo "selected"; ?> value="Librarian">Librarian</option>
                            </select>   
                        </div>
                    </div>
                <?php } if($emp_info[0]->employee_type=="teacher"){ ?>
                    <div class="form-group teachers_option">
                        <label class="col-md-2 control-label">Subject <span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="subject" class="form-control" >
                                 <option value="">-- Select Subject --</option>
                                 
                                 <?php foreach(config_item('teacherSubject')  as $key => $value){ ?>
                                <optgroup  label="<?php echo $key; ?>">
                                    <?php foreach($value as $row){?>
                                    <option value="<?php echo $row; ?>" <?php if($emp_info[0]->employee_subject==$row) echo "selected"; ?>><?php echo $row; ?></option>
                                    <?php } ?>
                                </optgroup>
                                <?php } ?>
                                
                            </select> 
                        </div>
                    </div>

                    <div class="form-group teachers_option">
                        <label class="col-md-2 control-label">Username <span class="req">*</span></label>
                        <div class="col-md-5">
                            <input type="text" name="username" value="<?php echo $emp_info[0]->username; ?>" placeholder="Username" class="form-control">
                        </div>
                    </div>

                    <div class="form-group teachers_option">
                        <label class="col-md-2 control-label">Password <span class="req">*</span></label>
                        <div class="col-md-5">
                            <input type="password" name="password" placeholder="password" class="form-control"/>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Salary <span class="req">*</span></label>
                        <div class="col-md-5">
                            <input type="text" name="salary" value="<?php echo $emp_info[0]->employee_salary; ?>" placeholder="Amount in Tk" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Employee's Photo <span class="req">*</span></label>
                        <div class="col-md-5">
                            <input id="input-test" type="file" name="attachFile" class="form-control file" data-show-preview="false" data-show-upload="false" data-show-remove="false">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-2 control-label">Status <span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <label class="radio-inline">
                                <input type="radio" <?php if($emp_info[0]->employee_status=="1") echo "checked"; ?> name="status" value="1" >&nbsp; Available
                            </label>
                            <label class="radio-inline">
                                <input type="radio" <?php if($emp_info[0]->employee_status=="0") echo "checked"; ?> name="status" value="0" >&nbsp; Not Available
                            </label>
                        </div>
                    </div>

                    <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" name="update_emp" value="Update" class="btn btn-success">
                    </div>
                    </div>
                    
                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
