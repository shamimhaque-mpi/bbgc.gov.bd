<div class="container-fluid">
    <div class="row">
        <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>পরিবর্তন করুন</h1>
                </div>
            </div>

            <div class="panel-body">
			
			<?php
			 	$attr=array("class"=>"form-horizontal");
				echo form_open_multipart("registration/regi_validation/update/".$student[0]->id,$attr);
			?>
                    
				<div class="row">
				
					<div class="col-md-8">

					      <div class="form-group ">
								<label class="col-md-4 control-label">শিক্ষার্থী নাম </label>
								<div class="col-md-8">
									<input type="text" name="name" value="<?php echo $student[0]->name;?>" class="form-control">
								</div>
							</div>

							<div class="form-group ">
								<label class="col-md-4 control-label">পিতার নাম </label>
								<div class="col-md-8">
									<input type="text" name="father_name" value="<?php echo $student[0]->father_name;?>" class="form-control">
								</div>
							</div>

							<div class="form-group ">
								<label class="col-md-4 control-label">মাতার নাম </label>
								<div class="col-md-8">
									<input type="text" name="mother_name" value="<?php echo $student[0]->mother_name;?>" class="form-control">
								</div>
							</div>

							<div class="form-group ">
								<label class="col-md-4 control-label">পিতার পেশা <span class="req"> &nbsp;</span></label>
								<div class="col-md-8">
									<input type="text" name="father_profession" value="<?php echo $student[0]->father_profession;?>"class="form-control" >
								</div>
							</div>
							
							<div class="form-group ">
								<label class="col-md-4 control-label">মাতার পেশা <span class="req"> &nbsp;</span></label>
								<div class="col-md-8">
									<input type="text" name="mother_profession" value="<?php echo $student[0]->mother_profession;?>" class="form-control" >
								</div>
							</div>
							
							<div class="form-group ">
								<label class="col-md-4 control-label">শিক্ষার্থীর মোবাইল নম্বর</label>
								<div class="col-md-8">
									<input type="text" name="student_mobile" value="<?php echo $student[0]->student_mobile;?>" class="form-control">
								</div>
							</div>
							
							<div class="form-group ">
								<label class="col-md-4 control-label">অভিভাবকের মোবাইল নম্বর </label>
								<div class="col-md-8">
									<input type="text" name="guardian_mobile" value="<?php echo $student[0]->guardian_mobile;?>" class="form-control">
								</div>
							</div>
							
							<div class="form-group ">
								<label class="col-md-4 control-label">জন্ম তারিখ </label>
								<div class="input-group date col-md-8" id="dateOfBirth">
									<input type="text" class="form-control" value="<?php echo $student[0]->birth_date;?>" name="birth_date">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
							
							<script type="text/javascript">
                                $(document).ready(function(){
            		                $('#dateOfBirth').datetimepicker({
            		                    format: 'YYYY-MM-DD'
            		                });
            		            });
                            </script>
							
							<div class="form-group ">
								<label class="col-md-4 control-label">ধর্ম </label>
								<div class="col-md-8">
									<select name="religion" class="form-control">
										<option value="">-- Select Religion --</option>
										<?php
										 foreach (config_item('religion') as $key => $value) { ?>
										 	<option value="<?php echo $key;?>" <?php if($key==$student[0]->religion){ echo "selected";}?>><?php echo $value;?></option>
										<?php }	?>
									</select>
								</div>
							</div>
							
							<div class="form-group ">
								<label class="col-md-4 control-label">জেন্ডার </label>
								<div class="col-md-8">
									<label class="radio-inline">
										<input type="radio" name="gender" <?php if($student[0]->gender=="Male"){echo "checked";}?> value="Male"> পুরুষ
									</label>
									<label class="radio-inline">
										<input type="radio" name="gender" <?php if($student[0]->gender=="Female"){echo "checked";}?> value="Female"> মহিলা
									</label>
								</div>
							</div>
						   
							<div class="form-group ">
								<label class="col-md-4 control-label">বর্তমান ঠিকানা </label>
								<div class="col-md-8">
									<textarea name="present_address" id="pre_addr" class="form-control" cols="30" rows="5"><?php echo $student[0]->present_address;?></textarea>
								</div>
							</div>
						
							<div class="form-group ">
								<label class="col-md-4 control-label">স্থায়ী ঠিকানা </label>
								<div class="col-md-8">
									<input type="checkbox" id="permanent_address" value="0"> <label for="permanent_address">স্থায়ী ঠিকানা একই</label>
									<textarea name="permanent_address" id="per_addr" class="form-control" cols="30" rows="5"><?php echo $student[0]->permanent_address;?></textarea>
								</div>
							</div>						
						
					</div>
					
					<div class="col-md-4">
						<figure>
							<img class="img-responsive pull-right" src="<?php echo base_url('public/students/'.$student[0]->photo); ?>" alt="" width="150px" height="150px"  />
						</figure>
					</div>
					
					
				</div>
					
					
				<div class="row">
				
					<div class="col-md-8">
						
						<div class="form-group ">
							<label class="col-md-4 control-label">শিক্ষার্থীর ছবি <span class="req"></span></label>
							<div class="col-md-8">
								<input id="input-test" type="file" name="photo" class="form-control file" data-show-preview="true" data-show-upload="false"  data-show-remove="false">
								<input type="hidden" name="picture" value="<?php echo $student[0]->photo;?>">
							</div>
						</div>
						
						<div class="form-group ">
							<label class="col-md-4 control-label">ক্লাস <span class="req">*</span></label>
							<div class="col-md-8">
								<select name="class" class="form-control">
									<option value="">-- Select Class --</option>
									<?php 
										foreach(config_item('classes') as $key => $value){?>
											<option <?php if($key==$student[0]->class){ echo "selected";}?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
										<?php
										}
									?>
								</select>
							</div>
						</div>
						
						
						
						
						<div class="form-group ">
                                <label class="col-md-4 control-label">সেকশন<span class="req">*</span></label>
                                <div class="col-md-8">
                                    <select name="section" class="form-control">
                                        <option value="">-- Select Section--</option>
                                        <?php 
                                            foreach(config_item('section') as $key => $value){?>
                                                <option <?php if($value==$student[0]->section){echo "selected";}?> value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            
						
						<div class="form-group ">
							<label class="col-md-4 control-label">গ্রুপ <span class="req">&nbsp;</span></label>
							<div class="col-md-8">
								<select name="group" class="form-control">
									<option value="">-- Select Group --</option>
									<?php 
										foreach(config_item('group') as $key => $value){?>
											<option <?php if($key==$student[0]->group){ echo "selected";}?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
										<?php
										}
									?>
								</select>
							</div>
						</div>
					   

						<div class="form-group ">
							<label class="col-md-4 control-label">সেশন <span class="req">*</span></label>
							<div class="col-md-8">
								<select name="session" class="form-control">
								  <option value="">Select Session</option>
									<?php for($i=2014; $i<=date("Y")+3; $i++){?>
									<option <?php if($i==$student[0]->session){echo "selected";}?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>				

					
						<div class="btn-group pull-right">
							<input type="submit" value="আপডেট" name="student_submit" class="btn btn-primary">
						</div>

					</div>
				</div>
				
				<?php echo form_close(); ?>

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