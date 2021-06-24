<div class="container-fluid">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Registration</h1>
                </div>
            </div>

            <div class="panel-body">
                    
                    <div class="row" ng-controller="registrationCtrl">

                        <?php
                            $attr=array(
                              "class"=>"form-horizontal"
                            );
                           echo form_open_multipart("registration/regi_validation",$attr);
                          ?>


                            <div class="form-group ">
                                <label class="col-md-3 control-label">Student's Name <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-3 control-label">Roll <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="roll" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-3 control-label">Father's Name <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="father_name" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-3 control-label">Mother's Name <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="mother_name" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-3 control-label">Father's Profession <span class="req"> &nbsp;</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="father_profession" class="form-control" >
                                </div>
                            </div>
							
							<div class="form-group ">
                                <label class="col-md-3 control-label">Mother's Profession <span class="req"> &nbsp;</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="mother_profession" class="form-control" >
                                </div>
                            </div>
							
							<div class="form-group ">
                                <label class="col-md-3 control-label">Student's Mobile  Number <span class="req">&nbsp;</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="student_mobile" class="form-control" required>
                                </div>
                            </div>
							
							<div class="form-group ">
                                <label class="col-md-3 control-label">Guardian Mobile Number <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="guardian_mobile" class="form-control" required>
                                </div>
                            </div>
							
							<div class="form-group ">
                                <label class="col-md-3 control-label">Date of Birth <span class="req">*</span></label>
	                            <div class="input-group date col-md-5" id="datetimepicker1">
	                                <input type="text" class="form-control" name="birth_date" required>
	                                <span class="input-group-addon">
	                                    <span class="glyphicon glyphicon-calendar"></span>
	                                </span>
	                            </div>
                            </div>
							
							<div class="form-group ">
                                <label class="col-md-3 control-label">Religion <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="religion" class="form-control" required>
                                        <option value="">-- Select Religion --</option>
                                        <?php 
                                            foreach(config_item('religion') as $key => $value){?>
                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php
                                            }
                                        ?>                                        
                                    </select>
                                </div>
                            </div>
							
							<div class="form-group ">
								<label class="col-md-3 control-label">Gender <span class="req">*</span></label>
								<div class="col-md-7">
									<label class="radio-inline">
										<input type="radio" name="gender" value="Male" checked="checked"> Male
									</label>
									<label class="radio-inline">
										<input type="radio" name="gender" value="Female" > Female
									</label>
								</div>
							</div>
                           
							<div class="form-group ">
								<label class="col-md-3 control-label">Present Address <span class="req">*</span></label>
								<div class="col-md-5">
									<textarea name="present_address" ng-model="present_address" id="pre_addr" class="form-control" cols="30" rows="5" required></textarea>
								</div>
							</div>
						
							<div class="form-group ">
								<label class="col-md-3 control-label">Permanent Address <span class="req">&nbsp;</span></label>
								<div class="col-md-5">
									<input type="checkbox" ng-click="check()" ng-model="checkbox" id="permanent_address"> <label for="permanent_address">Same as Present Address</label>
									<textarea name="permanent_address"  ng-bind="permanent_address" id="per_addr" class="form-control" cols="30" rows="5"></textarea>
								</div>
							</div>                           
							
                            
                            <div class="form-group ">
                                <label class="col-md-3 control-label">Class <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="class" class="form-control">
                                        <option value="">-- Select Class --</option>
                                        <?php 
                                            foreach(config_item('classes') as $key => $value){?>
                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group ">
                                <label class="col-md-3 control-label">Section<span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="section" class="form-control">
                                        <option value="">-- Select Section--</option>
                                        <?php 
                                            foreach(config_item('section') as $key => $value){?>
                                                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group ">
                                <label class="col-md-3 control-label">Group <span class="req">&nbsp;</span></label>
                                <div class="col-md-5">
                                    <select name="group" class="form-control">
                                        <option value="">-- Select Group --</option>
                                        <?php 
                                            foreach(config_item('group') as $key => $value){?>
                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php
                                            }
                                        ?>                                        
                                    </select>
                                </div>
                            </div>
                           

                            <div class="form-group ">
                                <label class="col-md-3 control-label">Session <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="session" class="form-control">
                                       <option value="">Select Session</option>
                                        <?php for($i=2014; $i<=date("Y")+3; $i++){?>
                                        <option value="<?php echo $i."-".($i+1); ?>"><?php echo $i."-".($i+1); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Shift <span class="req">&nbsp;</span></label>
                                <div class="col-md-5">
                                    <select name="shift" class="form-control">
                                        <option value="">-- Select Shift --</option>
                                        <?php foreach(config_item('shift') as $key => $value){ ?>
                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-3 control-label">Optional Subject <span class="req">&nbsp;</span></label>
                                <div class="col-md-5">
                                    <select name="optional_subject" class="form-control">
                                        <?php foreach(config_item("optional") as $val){ ?>
                                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
							
                            <div class="form-group ">
                                <label class="col-md-3 control-label">Student Photo <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input id="input-test" required type="file"  name="photo" class="form-control file" data-show-preview="true" data-show-upload="false" required data-show-remove="false">
                                </div>
                            </div>

                            <div class="col-md-8">
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
