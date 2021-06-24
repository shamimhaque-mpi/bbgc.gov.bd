<div class="container-fluid">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>পরিবর্তন করুন </h1>
                </div>
            </div>

            <!--pre><?php //print_r($student); ?></pre-->

            <div class="panel-body">

                    <div class="row" ng-controller="registrationCtrl">

                        <?php
                            $attr=array(
                              "class"=>"form-horizontal"
                            );
                           echo form_open_multipart("admission/admission/update?id=" . $student[0]->reg_id, $attr);
                          ?>


                            <div class="form-group ">
                                <label class="col-md-3 control-label">শিক্ষার্থী নাম <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="name" value="<?php echo $student[0]->name; ?>" class="form-control" required>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">
                                      শিক্ষার্থীর আইডি
                                    <span class="req">&nbsp;*</span>
                                </label>
                                <div class="col-md-5">
                                    <input type="text" name="student_input_id" value="<?php echo $student[0]->reg_id; ?>"  id="student_id" class="form-control" readonly>
                                </div>
                            </div>                             

                            <div class="form-group ">
                                <label class="col-md-3 control-label">পিতার নাম <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="father_name" value="<?php echo $student[0]->father_name; ?>" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-3 control-label">মাতার নাম <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="mother_name" value="<?php echo $student[0]->mother_name; ?>" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-3 control-label">পিতার পেশা <span class="req"> &nbsp;</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="father_profession" value="<?php echo $student[0]->father_profession; ?>" class="form-control" >
                                </div>
                            </div>

							<div class="form-group ">
                                <label class="col-md-3 control-label">মাতার পেশা <span class="req"> &nbsp;</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="mother_profession"  value="<?php echo $student[0]->mother_profession; ?>" class="form-control" >
                                </div>
                            </div>

							<div class="form-group ">
                                <label class="col-md-3 control-label">শিক্ষার্থীর মোবাইল নম্বর </label>
                                <div class="col-md-5">
                                    <input type="text" name="student_mobile" value="<?php echo $student[0]->student_mobile; ?>" class="form-control">
                                </div>
                            </div>

							<div class="form-group ">
                                <label class="col-md-3 control-label">অভিভাবকের মোবাইল নম্বর <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="guardian_mobile" value="<?php echo $student[0]->guardian_mobile; ?>" class="form-control" required>
                                </div>
                            </div>

							<div class="form-group ">
                                <label class="col-md-3 control-label">জন্ম তারিখ <span class="req">*</span></label>
	                            <div class="input-group date col-md-5" id="datetimepicker1">
	                                <input type="text" class="form-control" value="<?php echo $student[0]->birth_date; ?>" name="birth_date" required>
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
                                                <option <?php if($student[0]->religion == $key){ echo "selected"; } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
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
										<input type="radio" name="gender" <?php if($student[0]->gender =="Male"){ echo "checked"; } ?> value="Male"> পুরুষ
									</label>
									<label class="radio-inline">
										<input type="radio" name="gender" <?php if($student[0]->gender =="Female"){ echo "checked"; } ?> value="Female" > মহিলা
									</label>
								</div>
							</div>

							<div class="form-group ">
								<label class="col-md-3 control-label">বর্তমান ঠিকানা <span class="req">*</span></label>
								<div class="col-md-5">
									<textarea name="present_address"  class="form-control" cols="30" rows="5" required><?php echo $student[0]->present_address; ?></textarea>
								</div>
							</div>

							<div class="form-group ">
								<label class="col-md-3 control-label">স্থায়ী ঠিকানা <span class="req">&nbsp;</span></label>
								<div class="col-md-5">
									<textarea name="permanent_address"   class="form-control" cols="30" rows="5"><?php echo $student[0]->permanent_address; ?></textarea>
								</div>
							</div>

                            <div class="form-group ">
                                <label class="col-md-3 control-label">সেশন <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="session" value="<?php echo $student[0]->session; ?>" class="form-control" readonly>
                                </div>
                            </div>


                            <div class="form-group ">
                                <label class="col-md-3 control-label">ক্লাস <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="class" class="form-control">
                                        <option value="">-- Select Class --</option>
                                        <?php
                                            foreach(config_item('classes') as $key => $value){?>
                                                <option <?php if($student[0]->class == $key){ echo "selected"; } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                    <input type="hidden" name="hidden_class" value="<?php echo $student[0]->class; ?>">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-3 control-label">সেকশন <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="section" class="form-control" required>
                                        <option value="">-- Select Section--</option>
                                        <?php
                                            foreach(config_item('section') as $key => $value){?>
                                                <option <?php if($student[0]->section == $value){ echo "selected"; } ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                    <input type="hidden" name="hidden_section" value="<?php echo $student[0]->section; ?>">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-3 control-label">গ্রুপ <span class="req">&nbsp;</span></label>
                                <div class="col-md-5">
                                    <select name="group" class="form-control">
                                        <option value="">-- Select Group --</option>
                                        <?php
                                            foreach(config_item('group') as $key => $value){?>
                                                <option <?php if($student[0]->group == $key){ echo "selected"; } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>


                          <div class="form-group ">
                            <label class="col-md-3 control-label">রোল <span class="req"> *</span></label>
                            <div class="col-md-5">
                                <input type="text" name="roll" value="<?php echo $student[0]->roll; ?>" class="form-control" required>
                                <input type="hidden" name="hidden_roll" value="<?php echo $student[0]->roll; ?>">
                            </div>
                          </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">শিফট <span class="req">&nbsp;</span></label>
                            <div class="col-md-5">
                                <select name="shift" class="form-control">
                                    <option value="">-- Select Shift --</option>
                                    <?php foreach(config_item('shift') as $key => $value){ ?>
                                        <option <?php if($student[0]->shift == $key){ echo "selected"; } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-3 control-label">ঐচ্ছিক বিষয় <span class="req">&nbsp;</span></label>
                            <div class="col-md-5">
                                <select name="optional_subject" class="form-control">
                                    <?php foreach(config_item("optional") as $val){ ?>
                                    <option <?php if($student[0]->optional == $val){ echo "selected"; } ?> value="<?php echo $val; ?>">
                                        <?php echo $val; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-3 control-label">&nbsp;</label>
                            <div class="col-md-5">
                                <img src="<?php echo site_url($student[0]->photo); ?>" alt="Photo Missing!" width="80px" height="80px">
                            </div>
                        </div>


                        <div class="form-group ">
                            <label class="col-md-3 control-label">বিষয় কোড <span class="req">&nbsp;</span></label>
                            <div class="col-md-5">
                                <textarea name="subjects" class="form-control" cols="30" rows="5"><?php echo $student[0]->subjects; ?></textarea>
                            </div>
                        </div>


                        <div class="form-group ">
                            <label class="col-md-3 control-label">শিক্ষার্থীর ছবি <span class="req">&nbsp;</span></label>
                            <div class="col-md-5">
                                <input id="input-test"  type="file"  name="photo" class="form-control file" data-show-preview="true" data-show-upload="false" data-show-remove="false">
                                <input type="hidden"  name="hidden_student_photo" value="<?php echo $student[0]->photo;?>">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-3 control-label">অবস্থা<span class="req">&nbsp;</span></label>
                            <div class="col-md-5">
                                <select name="status" class="form-control" required>
                                    <option <?php if($student[0]->status == "active"){ echo "selected"; } ?> value="active">নিয়মিত</option>
                                    <option <?php if($student[0]->status == "deactivate"){ echo "selected"; } ?> value="deactivate">অনিয়মিত</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="btn-group pull-right">
                                <input type="submit" value="আপডেট" name="student_submit" class="btn btn-info">
                            </div>
                        </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
