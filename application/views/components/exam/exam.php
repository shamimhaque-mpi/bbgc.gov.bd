<style>
	.attendance tr th{text-align: center;}
	.attendance label{display: block;}
    .exam td{padding:  0 !important;}
    .exam input[type="text"], input[type="number"]{border: 1px solid transparent;}
    .td-width{width: 10%;}
</style>

<div class="container-fluid" ng-controller="SetExamCtrl">
    <div class="row">
        <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Add Exam</h1>
                    <blockquote style="font-size: 15px !important;margin-top: 11px auto !important;">
                        N.B.  If Attendance's & Monthly Test's  marks is included with the exam then Exam type will be Final Exam otherwise not.                          
                    </blockquote>
                </div>
            </div>

            <div class="panel-body">
                <?php
                $attr = array("class" => "form-horizontal");
                echo form_open("", $attr);
                ?>

                <div class="form-group">
                    <label class="col-md-2 control-label">Exam Name <span class="req">*</span></label>
                    <div class="col-md-5">
			<select class="form-control" name="exam_name" ng-model="exam_name" ng-change="getExamInfo();" required>
			  <option value="" selected disabled>&nbsp;</option>
			
			 <?php
			   if($exam != null){
			    foreach($exam as $row) {
			  ?>
			     <option value="<?php echo $row->code; ?>"><?php echo filter($row->name); ?></option>
			  <?php } } ?>
			</select>
						
                        
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-md-2 control-label">Exam Type<span class="req"> *</span></label>
                    <div class="col-md-5">
                        <select name="type" class="form-control" required >
                            <option value="">-- Select Type --</option>                            
                            <option value="monthly">Monthly Exam</option>
                            <option value="half_yearly">Half Yearly Exam</option>
                            <option value="pre_test">Pre Test Exam</option> 
                            <option value="final">Final Exam</option>   
                            <option value="test">Test-2017</option>    
                            <option value="model_test">Model Test-2017</option> 
                            <option value="annual">Annual Exam-2017</option>                    
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Exam Start At <span class="req">*</span></label>
                        <div class="col-md-5">
                        <div class="input-group date" id="examStartAt">
                              <input type="text" name="dateTime" ng-model="exam_date" class="form-control" required readonly>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                $(function () {
                    $('#examStartAt').datetimepicker({
                        format: 'YYYY-MM-DD hh:mm:ss'
                    });
                });
                </script>

                <div class="form-group">
                    <label class="col-md-2 control-label">Class <span class="req">*</span></label>
                    <div class="col-md-5">
                        <select name="class" class="form-control" required >
                            <option value="">-- Select Class --</option>
                            <?php foreach(config_item('classes') as $key => $value){ ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-2 control-label">Group <span class="req">&nbsp;</span></label>
                    <div class="col-md-5">
                        <select name="group" class="form-control">
                            <option value="">-- Select Group --</option>
                            <?php foreach(config_item('group') as $key => $value){ ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>                                        
                        </select>
                    </div>
                </div>
                       
                <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" value="Show" name="show" class="btn btn-primary">
                    </div>
                </div>

                <?php echo form_close(); ?>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>








        <?php if($subjects != null){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Set Marks</h1>
                </div>
            </div>

            <?php
            $attribute = array("name" => "");
            echo form_open("", $attribute);
            ?>
            <div class="panel-body">
                <!--pre><?php //print_r($subjects); ?></pre-->
               
                <input type="hidden" name="dateTime" value="<?php echo $this->input->post('dateTime'); ?>">
                <input type="hidden" name="class" value="<?php echo $this->input->post('class'); ?>">
                <input type="hidden" name="type" value="<?php echo $this->input->post('type'); ?>">
                <input type="hidden" name="exam_id" value="<?php echo $this->input->post('exam_name'); ?>">

                <table class="table table-bordered exam">
                    <tr>
                        <th>SL</th>
                        <th>Subject Name</th>
                        <th>Group</th>
                        <th class="td-width">Objective</th>
                        <th class="td-width">OPM</th>
                        <th class="td-width">Written</th>
                        <th class="td-width">WPM</th>
                        <th class="td-width">Practical</th>
                        <th class="td-width">PPM</th>
                        <th class="td-width">Total</th>
                    </tr>

                    <?php foreach($subjects as $key => $row){ ?>
                    <tr>
                        <td style="padding: 7px 8px !important;"><?php echo ($key+1); ?></td>
                        
                        <td>
                            <input class="form-control" type="text" name="name[]" value="<?php echo $row->subject_name; ?>" readonly>
                            <input class="form-control" type="hidden" name="subject_code[]" value="<?php echo $row->subject_code; ?>">
                        </td>
                        
                        <td><input class="form-control" type="text" name="group[]" value="<?php echo $row->group; ?>" readonly></td>
                        
                        <td><input class="form-control" type="number" name="objective[]" ng-model="objective<?php echo $key; ?>" ng-init="objective<?php echo $key; ?>=<?php echo $row->objective; ?>" max="100" min="0"></td>
                        
                        <td><input class="form-control" type="number" name="opm[]" max="100" min="0"></td>
                        
                        <td><input class="form-control" type="number" name="written[]" ng-model="written<?php echo $key; ?>" ng-init="written<?php echo $key; ?>=<?php echo $row->written; ?>" max="100" min="0"></td>
                        
                        <td><input class="form-control" type="number" name="wpm[]" max="100" min="0"></td>
                        
                        <td><input class="form-control" type="number" name="practical[]" ng-model="practical<?php echo $key; ?>" ng-init="practical<?php echo $key; ?>=<?php echo $row->practical; ?>" max="100" min="0" ></td>

                        <td><input class="form-control" type="number" name="ppm[]" max="100" min="0" ></td>

                        <td><input class="form-control" type="text" name="total[]" ng-value="totalFn(objective<?php echo $key; ?>, written<?php echo $key; ?>, practical<?php echo $key; ?>)" readonly></td>
                    </tr>
                    <?php } ?>

                </table>

                <div class="btn-group pull-right">
                    <input type="submit" value="Set" name="set" class="btn btn-primary">
                </div>
            </div> 
            <?php echo form_close(); ?>

            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php } ?>
    </div>
</div>


