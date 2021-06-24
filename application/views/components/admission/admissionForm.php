<div class="container-fluid" ng-controller="getStudentInfoCtrl">
    <div class="row">

        <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left"><h1>Admission</h1></div>
            </div>
			
			
			<?php
			$arguments = array("class"=>"form-horizontal");
			echo form_open("", $arguments); 
			?>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8">
                    
                        <div class="form-group" ng-init="student_id=<?php echo $this->input->get('id'); ?>">
                            <label class="col-md-4 control-label">Student Id <span class="req">&nbsp;</span></label>
                            <div class="col-md-8">
                                <input type="text" readonly name="student_id" ng-model="student_id" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-group ">
                            <label class="col-md-4 control-label">Roll <span class="req">&nbsp;</span></label>
                            <div class="col-md-8">
                                <input type="text" name="roll" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-group ">
                            <label class="col-md-4 control-label">Class <span class="req">&nbsp;</span></label>
                            <div class="col-md-8">
                                <input class="form-control" type="text"  name="class" ng-model="class" readonly >
                            </div>
                        </div>
                        
                        <div class="form-group ">
                            <label class="col-md-4 control-label">Group <span class="req">&nbsp;</span></label>
                            <div class="col-md-8">
                                <input class="form-control" type="text"  name="group" ng-model="group" readonly >
                            </div>
                        </div>
                        
                        <div class="form-group ">
                            <label class="col-md-4 control-label">Session <span class="req">&nbsp;</span></label>
                            <div class="col-md-8">
                                <input class="form-control" type="text"  name="session"  ng-model="session" readonly >
                            </div>
                        </div>
                        
                         <div class="form-group ">
                            <label class="col-md-4 control-label">Section<span class="req">&nbsp;</span></label>
                            <div class="col-md-8">
                                <input class="form-control" type="text"  name="section"  ng-model="section" readonly >
                            </div>
                        </div>
                        
                        <!--div class="form-group ">
                            <label class="col-md-4 control-label">Batch <span class="req">&nbsp;</span></label>
                            <div class="col-md-8">
                                <select name="batch" class="form-control">
                                    <option value="">-- Select Batch --</option>
                                    <?php foreach(config_item('batch') as $key => $value){ ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div-->
                        
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Shift <span class="req">&nbsp;</span></label>
                            <div class="col-md-8">
                                <select name="shift" class="form-control">
                                    <option value="">-- Select Shift --</option>
                                    <?php foreach(config_item('shift') as $key => $value){ ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-4 control-label">Optional Subject <span class="req">&nbsp;</span></label>
                            <div class="col-md-8">
                                <select name="optional_subject" class="form-control">
                                    <?php foreach(config_item("optional") as $val){ ?>
                                    <option value="<?php echo $val; ?>">
                                        <?php echo $val; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                    </div>
                    
                    <div class="col-md-4">
                        <figure>
                            <img class="img-responsive pull-right" ng-src="<?php echo base_url('public/students/{{photo}}'); ?>" alt="" width="150px" height="150px" style="margin-bottom: 15px;">
                            <figcaption></figcaption>
                        </figure>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="btn-group pull-right">
                            <input type="submit" value="Save" name="save" class="btn btn-primary">
                        </div>
                    </div>
                </div>  

            
            </div>
			<?php echo form_close(); ?>

            <div class="panel-footer">&nbsp;</div>
        </div>

    </div>
</div>
