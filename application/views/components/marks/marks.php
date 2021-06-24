<style>
    .attendance tr th{
        text-align: center;
    }
    .attendance label{
        display: block;
    }
    .panelShow{
        display: none;
    }
    .exam-table tr td{
        padding: 0 !important;
    }
    .exam-table tr td .form-control{
        border: none;
    }
</style>

<div class="container-fluid" ng-controller="MarksCtrl">
    <div class="row">
        <?php echo $confirmation; ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Marks</h1>
                </div>
            </div>

            <div class="panel-body">
                <form method="post" class="form-horizontal" ng-submit="getAllStudents()">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Exam Name <span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="exam_id" ng-change="getExamTypeInfoFn();" ng-model="examID" class="form-control" require>
                                <option value="" selected> -- Select Exam Name -- </option>
                                <?php if($exam != null){ foreach($exam as $row){ ?>
                                <option value="<?php echo $row->exam_id; ?>">
                                    <?php echo $row->title; ?>
                                </option>
                                <?php }} ?>
                            </select>
                        </div>
                        <input type="hidden"  ng-value="exam_type">
                    </div>

                    <!--div class="form-group">
                        <label class="col-md-2 control-label">Year <span class="req">*</span></label>
                        <div class="col-md-5" ng-init="year=<?php echo date('Y'); ?>">
                            <input type="text" name="year" ng-model="year" class="form-control" required>
                        </div>
                    </div-->
                    
                    
                     <div class="form-group">
                        <label class="col-md-2 control-label">Session<span class="req"> *</span></label>
                        <div class="col-md-5">
                           <select class="form-control" name="year" ng-model="year" required>				
                				<?php
                				  for($i=2015;$i<=date("Y");$i++){
                				  $j = $i+1;
                				  $sess = $i."-".$j;
                				 ?>
                				  <option value="<?php echo $i; ?>"><?php echo $sess;?></option>
                				<?php } ?>
                			</select>
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-md-2 control-label">Class <span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="class" ng-model="class" class="form-control" required >
                                <option value="">-- Select Class --</option>
                                <?php foreach(config_item('classes') as $key => $value){ ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="col-md-2 control-label">Group <span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <select name="group" ng-model="group" class="form-control">
                                <option value="" selected>-- Select Group --</option>
                                <?php foreach(config_item('group') as $key => $value){ ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="col-md-2 control-label">Subject Name <span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="subject_name" ng-model="subjectName" class="form-control" required>
                                <?php foreach (config_item('subject') as $key => $value) { ?>
                                <optgroup label="Class <?php echo $key; ?>" ng-if="class=='<?php echo $key; ?>'">
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
                        <label class="col-md-2 control-label">Paper </label>
                        <div class="col-md-5">
                            <select name="paper" ng-model="paper" class="form-control">
                                <option value="" selected>-- Select Paper --</option>
                                <option value="1st">1st Paper</option>
                                <option value="2nd">2nd Paper</option>
                            </select>
                        </div>
                    </div>
                    
                      <div class="form-group ">
                        <label class="col-md-2 control-label">Section <span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="section" ng-model="section" class="form-control" required>
                                <option value="" selected>-- Select Section--</option>
                               <?php foreach(config_item('section') as $value){ ?>
				<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
				<?php } ?>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-7">
                        <div class="btn-group pull-right">
                            <input type="submit" value="Show" name="show" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>       


        <div ng-init="active=true" class="panel panel-default" ng-hide="active" ng-cloak>
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Set Marks</h1>
                    <p>Total <strong>{{ totalStudent }}</strong> Students Found.</p>
                </div>
            </div>

            <?php
            $attribute = array("name" => "");
            echo form_open("", $attribute);
            ?>
            <div class="panel-body">
                <!-- pre><?php print_r($students); ?></pre>
                <pre><?php print_r($marks); ?></pre -->

                <input type="hidden" name="exam_id" ng-value="examID">
                <input type="hidden" name="year" ng-value="year">
                <input type="hidden" name="class" ng-value="class">
                <input type="hidden" name="group" ng-value="group">
                <input type="hidden" name="subject" ng-value="subjectName">
                <input type="hidden" name="subject_code" ng-value="subjectCode">
                <input type="hidden" name="paper" ng-value="paper">
                <input type="hidden" name="section" ng-value="section">
                
                
                <table class="table table-bordered exam-table" ng-init="row_active=true;">
                    <tr>
                        <th width="80px" style="cursor:pointer;">Roll</th>
                        <th> Name </th>
                        <th ng-hide="row_active">Attendance</th>
                        <th ng-hide="row_active">Monthly Test</th>
                        <th width="90px">Objective</th>
                        <th width="90px">Written</th>
                        <th width="90px">Practical</th>
                        <th width="100px">Total Marks</th>
                        <th width="110px">Letter Grade</th>
                        <th width="100px">Grade Point</th>
                    </tr>

                    <tr ng-repeat="student in students | orderBy:sort:reverse">
                        <td>
                            <input type="text" name="student[]" class="form-control" ng-model="student.roll" readonly>
                        </td>
                        
                        <td style="padding: 4px 8px !important;"> {{student.name}}</td>

                        <td ng-hide="row_active">
                            <input
                                type="number" class="form-control" name="attendance[]"
                                min="0" max="5"
                                ng-model="student.attendance" step="any">
                        </td>

                        <td ng-hide="row_active">
                            <input
                                type="number" class="form-control" name="monthlyTest[]"
                                min="0" max="30"
                                ng-model="student.monthlyTest" step="any">
                        </td>

                        <td>
                            <input
                                type="number" class="form-control" name="objective[]"
                                min="0" max="{{ subject.objective }}"
                                ng-model="student.objective" step="any">
                        </td>

                        <td>
                            <input
                                type="number" class="form-control" name="written[]"
                                min="0" max="{{ subject.written }}"
                                ng-model="student.written" step="any">
                        </td>

                        <td>
                            <input
                                type="number" class="form-control" name="practical[]"
                                min="0" max="{{ subject.practical }}"
                                ng-model="student.practical" step="any">
                        </td>

                        <td>
                            <input
                                type="text" class="form-control" name="total[]"
                                ng-model="student.total"
                                ng-value="totalMarksFn(student.roll)" readonly>
                        </td>

                        <td>
                            <input
                                type="text" class="form-control" name="letter[]"
                                ng-model="student.letter"
                                ng-value="letterGradeFn(student.roll)" readonly>
                        </td>

                        <td>
                            <input
                                type="text" class="form-control" name="grade[]"
                                ng-model="student.grade"
                                ng-value="gradePointFn(student.roll)" readonly>
                        </td>
                    </tr>

                </table>

                <div class="btn-group pull-right">
                    <input type="submit" value="Save" name="save" class="btn btn-primary">
                </div>

            </div>
            <?php echo form_close(); ?>

            <div class="panel-footer">&nbsp;</div>
        </div>

    </div>
</div>
