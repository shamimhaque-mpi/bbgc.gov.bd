<div class="container-fluid">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">
        
        <!--pre><?php print_r($result);?></pre-->

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Edit Student's Information</h1>
                </div>
            </div>

            <div class="panel-body">
			
			<?php
			
			 	$attr=array("class"=>"form-horizontal");
				echo form_open_multipart("admission/admission/update/".$result[0]->student_id,$attr);
				//echo $result[0]->student_id;
			?>
                    
				<div class="row">
				
					<div class="col-md-8">

					      <div class="form-group ">
								<label class="col-md-4 control-label">Student's Name <span class="req">*</span></label>
								<div class="col-md-8">
									<input type="text" name="name" value="<?php echo $result[0]->name;?>" class="form-control" required>
								</div>
							</div>

							<input type="hidden" name="id" value="<?php echo $id;?>">

							<div class="form-group ">
								<label class="col-md-4 control-label">Father's Name <span class="req">*</span></label>
								<div class="col-md-8">
									<input type="text" name="father_name" value="<?php echo $result[0]->father_name;?>" class="form-control" required>
								</div>
							</div>

							<div class="form-group ">
								<label class="col-md-4 control-label">Mother's Name <span class="req">*</span></label>
								<div class="col-md-8">
									<input type="text" name="mother_name" value="<?php echo $result[0]->mother_name;?>" class="form-control" required>
								</div>
							</div>

							<div class="form-group ">
								<label class="col-md-4 control-label">Father's Profession <span class="req"> &nbsp;</span></label>
								<div class="col-md-8">
									<input type="text" name="father_profession" value="<?php echo $result[0]->father_profession;?>"class="form-control" >
								</div>
							</div>
							
							<div class="form-group ">
								<label class="col-md-4 control-label">Mother's Profession <span class="req"> &nbsp;</span></label>
								<div class="col-md-8">
									<input type="text" name="mother_profession" value="<?php echo $result[0]->mother_profession;?>" class="form-control" >
								</div>
							</div>
							
							<div class="form-group ">
								<label class="col-md-4 control-label">Student's Mobile  Number <span class="req">*</span></label>
								<div class="col-md-8">
									<input type="text" name="student_mobile" value="<?php echo $result[0]->student_mobile;?>" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group ">
								<label class="col-md-4 control-label">Guardian Mobile Number <span class="req">*</span></label>
								<div class="col-md-8">
									<input type="text" name="guardian_mobile" value="<?php echo $result[0]->guardian_mobile;?>" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group ">
								<label class="col-md-4 control-label">Date of Birth <span class="req">*</span></label>
								<div class="input-group date col-md-8" id="dateOfBirth">
									<input type="text" class="form-control" value="<?php echo $result[0]->birth_date;?>" name="birth_date">
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
								<label class="col-md-4 control-label">Religion <span class="req">*</span></label>
								<div class="col-md-8">
									<select name="religion" class="form-control" required>
										<option value="">-- Select Religion --</option>
										<?php
										 foreach (config_item('religion') as $key => $value) { ?>
										 	<option value="<?php echo $key;?>" <?php if($key==$result[0]->religion){ echo "selected";}?>><?php echo $value;?></option>
										<?php }	?>
									</select>
								</div>
							</div>
							
							<div class="form-group ">
								<label class="col-md-4 control-label">Gender <span class="req">*</span></label>
								<div class="col-md-8">
									<label class="radio-inline">
										<input type="radio" name="gender" <?php if($result[0]->gender=="Male"){echo "checked";}?> value="Male" required> Male
									</label>
									<label class="radio-inline">
										<input type="radio" name="gender" <?php if($result[0]->gender=="Female"){echo "checked";}?> value="Female" required> Female
									</label>
								</div>
							</div>
						   
							<div class="form-group ">
								<label class="col-md-4 control-label">Present Address <span class="req">*</span></label>
								<div class="col-md-8">
									<textarea name="present_address" id="pre_addr" class="form-control" cols="30" rows="5" required><?php echo $result[0]->present_address;?></textarea>
								</div>
							</div>
						
							<div class="form-group ">
								<label class="col-md-4 control-label">Permanent Address <span class="req">&nbsp;</span></label>
								<div class="col-md-8">
									<input type="checkbox" id="permanent_address" value="0"> <label for="permanent_address">Same as Present Address</label>
									<textarea name="permanent_address" id="per_addr" class="form-control" cols="30" rows="5"><?php echo $result[0]->permanent_address;?></textarea>
								</div>
							</div>						
						
					</div>
					
					<div class="col-md-4">
						<figure>
							<img class="img-responsive pull-right" src="<?php echo base_url('public/students/'.$result[0]->photo); ?>" alt="" width="150px" height="150px"  />
						</figure>
					</div>
					
					
				</div>
					
					
				<div class="row">
				
					<div class="col-md-8">
						
						<div class="form-group ">
							<label class="col-md-4 control-label">Student Photo <span class="req"></span></label>
							<div class="col-md-8">
								<input id="input-test" type="file" name="photo" class="form-control file" data-show-preview="true" data-show-upload="false"  data-show-remove="false">
								<input type="hidden" name="picture" value="<?php echo $result[0]->photo;?>">
							</div>
						</div>
						
						<div class="form-group ">
							<label class="col-md-4 control-label">Class <span class="req">*</span></label>
							<div class="col-md-8">
								<select name="class" class="form-control">
									<option value="">-- Select Class --</option>
									<?php 
										foreach(config_item('classes') as $key => $value){?>
											<option <?php if($key==$result[0]->class){ echo "selected";}?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
										<?php
										}
									?>
								</select>
							</div>
						</div>
						
						
						<div class="form-group ">
								<label class="col-md-4 control-label">Roll <span class="req">*</span></label>
								<div class="col-md-8">
									<input type="text" name="roll" value="<?php echo $result[0]->roll;?>" class="form-control" required>
								</div>
							</div>
						
						
						
						
						<div class="form-group ">
                                <label class="col-md-4 control-label">Section<span class="req">*</span></label>
                                <div class="col-md-8">
                                    <select name="section" class="form-control">
                                        <option value="">-- Select Section--</option>
                                        <?php 
                                            foreach(config_item('section') as $key => $value){?>
                                                <option <?php if($value==$result[0]->section){echo "selected";}?> value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            
						
						<div class="form-group ">
							<label class="col-md-4 control-label">Group <span class="req">&nbsp;</span></label>
							<div class="col-md-8">
								<select name="group" class="form-control">
									<option value="">-- Select Group --</option>
									<?php 
										foreach(config_item('group') as $key => $value){?>
											<option <?php if($key==$result[0]->group){ echo "selected";}?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
										<?php
										}
									?>
								</select>
							</div>
						</div>
					   

						<div class="form-group ">
							<label class="col-md-4 control-label">Session <span class="req">*</span></label>
							<div class="col-md-8">
								<select name="session" class="form-control">
								  <option value="">Select Session</option>
									<?php for($i=2014; $i<=date("Y")+3; $i++){?>
									<option <?php if($i."-".($i+1)==$result[0]->session){echo "selected";}?> value="<?php echo $i."-".($i+1); ?>"><?php echo $i."-".($i+1); ?></option>
									<?php } ?>
								</select>
							</div>
						</div>

					
						<div class="btn-group pull-right">
							<input type="submit" value="Update" name="student_submit" class="btn btn-primary">
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