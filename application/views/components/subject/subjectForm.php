<div class="container-fluid">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Subject</h1>
                </div>
            </div>

            <div class="panel-body">
                    
                    <div class="row">
					
						<div class="col-md-7">

                        <?php
                        $attr=array("class"=>"form-horizontal");
                        echo form_open("subject/subject_validation",$attr);
                        ?>

                            <div class="form-group ">
                                <label class="col-md-4 control-label">Class <span class="req">*</span></label>
                                <div class="col-md-8">
                                    <select name="class" class="form-control" ng-model="class" required>
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
                                <label class="col-md-4 control-label">Group <span class="req">&nbsp;</span></label>
                                <div class="col-md-8">
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
                                <label class="col-md-4 control-label">Subject Name <span class="req">*</span></label>
                                <div class="col-md-8">
                                    <select name="subject_name" class="form-control" required>
                                     <?php foreach (config_item('subject') as $key => $value) { ?>
                                        <optgroup ng-show="class" label="Class <?php echo $key; ?>" ng-if="class=='<?php echo $key; ?>'">
                                            <?php foreach ($value as $val) { ?>
                                            <option value="<?php echo $val; ?>">
                                                <?php echo $val; ?>
                                            </option>
                                            <?php } ?>
                                        </optgroup>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label">Paper <span class="req">*</span></label>
                                <div class="col-md-8">
                                    <select name="paper" class="form-control" required>
                                        <option value="None">None</option>
                                        <option value="1st">1st Part</option>
                                        <option value="2nd">2nd Part</option>
                                    </select>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label">Subject Code <span class="req">*</span></label>
                                <div class="col-md-8">
                                    <input type="text"  name="subject_code" class="form-control" required>
                                </div>
                            </div>
							
							<div class="form-group ">
                                <label class="col-md-4 control-label">Subject Type <span class="req">*</span></label>
                                <div class="col-md-8">
                                   <select name="subject_type" class="form-control" required>
                                       <option value="compulsory" selected>Compulsory</option>
                                       <option value="optional">Optional</option>
                                   </select>
                                </div>
                            </div>
                           

                            <div class="form-group ">
                                <label class="col-md-4 control-label">Written <span class="req">&nbsp;</span></label>
                                <div class="col-md-8">
                                    <input type="number" max="100" min="0" value="0" name="written" class="form-control">
                                </div>
                            </div>

                             <div class="form-group ">
                                <label class="col-md-4 control-label">Objective <span class="req">&nbsp;</span></label>
                                <div class="col-md-8">
                                    <input class="form-control" type="number" max="100" min="0" value="0" name="objective">
                                </div>
                            </div>						
							

                            <div class="form-group ">
                                <label class="col-md-4 control-label">Practical <span class="req">&nbsp;</span></label>
                                <div class="col-md-8">
                                    <input type="number" max="100" min="0" value="0" name="practical" class="form-control">
                                </div>
                            </div>
							
                            
						</div>						
						
					</div>

                    <div class="row">
						<div class="col-md-7">
							<div class="btn-group pull-right">
								<input type="submit" value="Save" name="student_submit" class="btn btn-primary">
							</div>
						</div>
					</div>  

                    <?php echo form_close(); ?>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
