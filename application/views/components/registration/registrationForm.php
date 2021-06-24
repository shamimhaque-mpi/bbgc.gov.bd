<div class="container-fluid">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>রেজিস্ট্রেশন করুন</h1>
                </div>
            </div>

            <div class="panel-body">

                    <div class="row" ng-controller="registrationCtrl">

                        <?php
                            $attr=array(
                              "class"=>"form-horizontal",
                              "onsubmit"=>"form_validate()"
                            );
                           echo form_open_multipart("registration/regi_validation",$attr);
                          ?>

                    
                            <div class="form-group ">
                                <label class="col-md-3 control-label">শিক্ষার্থী নাম <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">
                                      শিক্ষার্থীর আইডি
                                    <span class="req">&nbsp;*</span>
                                </label>
                                <div class="col-md-5">
                                    <input type="text" name="reg_id" id="student_id" class="form-control" required>
                                    <small style="color:red;"> * Student Id Must Be Uniqe With  7 Digit.</small>
                                </div>
                            </div> 



                            <div class="form-group ">
                                <label class="col-md-3 control-label">পিতার নাম <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="father_name" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-3 control-label">মাতার নাম <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="mother_name" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-3 control-label">পিতার পেশা <span class="req"> &nbsp;</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="father_profession" class="form-control" >
                                </div>
                            </div>

							<div class="form-group ">
                                <label class="col-md-3 control-label">মাতার পেশা <span class="req"> &nbsp;</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="mother_profession" class="form-control" >
                                </div>
                            </div>

							<div class="form-group ">
                                <label class="col-md-3 control-label">শিক্ষার্থীর মোবাইল নম্বর </label>
                                <div class="col-md-5">
                                    <input type="text" name="student_mobile" class="form-control">
                                </div>
                            </div>

							<div class="form-group ">
                                <label class="col-md-3 control-label">অভিভাবকের মোবাইল নম্বর <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="guardian_mobile" class="form-control" required>
                                </div>
                            </div>

							<div class="form-group ">
                                <label class="col-md-3 control-label">জন্ম তারিখ <span class="req">*</span></label>
	                            <div class="input-group date col-md-5" id="datetimepicker1">
	                                <input type="text" class="form-control" name="birth_date" required>
	                                <span class="input-group-addon">
	                                    <span class="glyphicon glyphicon-calendar"></span>
	                                </span>
	                            </div>
                            </div>

							<div class="form-group ">
                                <label class="col-md-3 control-label">ধর্ম <span class="req">*</span></label>
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
								<label class="col-md-3 control-label">জেন্ডার <span class="req">*</span></label>
								<div class="col-md-7">
									<label class="radio-inline">
										<input type="radio" name="gender" value="Male" checked="checked"> পুরুষ
									</label>
									<label class="radio-inline">
										<input type="radio" name="gender" value="Female" > মহিলা
									</label>
								</div>
							</div>

							<div class="form-group ">
								<label class="col-md-3 control-label">বর্তমান ঠিকানা <span class="req">*</span></label>
								<div class="col-md-5">
									<textarea name="present_address" ng-model="present_address" id="pre_addr" class="form-control" cols="30" rows="5" required></textarea>
								</div>
							</div>

							<div class="form-group ">
								<label class="col-md-3 control-label">স্থায়ী ঠিকানা <span class="req">&nbsp;</span></label>
								<div class="col-md-5">
									<input type="checkbox" ng-click="check()" ng-model="checkbox" id="permanent_address"> <label for="permanent_address">স্থায়ী ঠিকানা একই</label>
									<textarea name="permanent_address"  ng-bind="permanent_address" id="per_addr" class="form-control" cols="30" rows="5"></textarea>
								</div>
							</div>

                            <div class="form-group ">
                                <label class="col-md-3 control-label">Year <span class="req"></span></label>
                                <div class="col-md-5">
                                    <input type="text" name="year" value="<?php echo date('Y'); ?>" class="form-control">                                      
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-3 control-label">সেশন <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="session" class="form-control">
                                       <option value="">Select Session</option>
                                        <?php for($i=date("Y")+1; $i>=2010; $i--){ ?>
                                        <option value="<?php echo $i."-".($i+1); ?>"><?php echo $i."-".($i+1); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group ">
                                <label class="col-md-3 control-label">ক্লাস <span class="req">*</span></label>
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
                                <label class="col-md-3 control-label">সেকশন <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="section" class="form-control" required>
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
                                <label class="col-md-3 control-label">গ্রুপ <span class="req">&nbsp;</span></label>
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
                            <label class="col-md-3 control-label">রোল <span class="req"> *</span></label>
                            <div class="col-md-5">
                                <input type="text" name="roll" class="form-control" required>
                            </div>
                          </div>

                       <!-- <div class="form-group">
                            <label class="col-md-3 control-label">শিফট <span class="req">&nbsp;</span></label>
                            <div class="col-md-5">
                                <select name="shift" class="form-control">
                                    <option value="">-- Select Shift --</option>
                                    <?php foreach(config_item('shift') as $key => $value){ ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> -->

                        <div class="form-group ">
                            <label class="col-md-3 control-label">ঐচ্ছিক বিষয় <span class="req">&nbsp;</span></label>
                            <div class="col-md-5">
                                <select name="optional_subject" class="form-control">
                                    <?php foreach(config_item("optional") as $val){ ?>
                                    <option value="<?php echo $val; ?>">
                                        <?php echo $val; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-3 control-label">বিষয় কোড </label>
                            <div class="col-md-5">
                                <textarea name="subjects" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-3 control-label">শিক্ষার্থীর ছবি <span class="req">*</span></label>
                            <div class="col-md-5">
                                <input id="input-test" required type="file"  name="photo" class="form-control file" data-show-preview="true" data-show-upload="false" required data-show-remove="false">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="btn-group pull-right">
                                <input type="submit" value="সেইভ"   id="submit_btn"    name="student_submit"  class="btn btn-primary">
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

    function form_validate(){
        var submit_btn = document.querySelector("#submit_btn");
        submit_btn.classList.add("hide");
    }
    
    $("#student_id").keyup(function(){
        var student_id = $("#student_id").val();
        var length =student_id.length;
        if(length == 7){
            
            $.post("<?php echo site_url('registration/regi_validation/student_id_info');  ?>", 
            { student_id:student_id }, 
            function(data,success){
               if(parseInt(data) == 0){
                   $('#submit_btn').show();
               }else{
                   alert('Student Id Already Exists.Please Try Another Code..');
                   $('#submit_btn').hide();
               }
            });
        }else{
            $('#submit_btn').hide();
        }     
    });
    
$('#submit_btn').show();

</script>
