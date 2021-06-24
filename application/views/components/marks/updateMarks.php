<style>
.exam tr td{
	padding: 0 !important;
}
.exam tr td .form-control{
	border: transparent;
}
.exam tr th.width{
	width: 110px;
}
</style>

<div class="container-fluid" ng-controller="updateMarksCtrl" >
    <div class="row">
        <?php echo $confirmation; ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Change Number</h1>
                </div>
            </div>

            <div class="panel-body">
                <form method="post" class="form-horizontal" ng-submit="getAllMarks();">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Exam<span class="req"> * </span></label>
                        <div class="col-md-5">
                            <select name="exam_id" ng-model="search.exam_id" class="form-control" required>
                                <option value="" selected> -- Select Exam -- </option>
                                <?php if($exam != null){ foreach($exam as $row){ ?>
                                <option value="<?php echo $row->exam_id; ?>">
                                    <?php echo $row->title; ?>
                                </option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Session<span class="req">*</span></label>
                        
                        <div class="col-md-5" ng-init="search.year=<?php echo date('Y'); ?>">                             
                            <select class="form-control" name="year" ng-model="search.year" required>				
            				<?php
                                for($i=2015;$i<=date("Y");$i++){
                                    $j    = $i+1;
                                    $sess = $i."-".$j;
            				 ?>
            				 <option value="<?php echo $j; ?>"><?php echo $sess;?></option>
            				<?php } ?>
            			    </select>
                        </div>
                    </div>
                        
                    <div class="form-group">
                        <label class="col-md-2 control-label">Class <span class="req"> *</span></label>
                        <div class="col-md-5">
                            <select name="class" ng-model="search.class" class="form-control" required >
                                <option value="">-- Select  Class  --</option>
                                <?php foreach(config_item('classes') as $key => $value){ ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Section <span class="req"> * </span></label>
                        <div class="col-md-5">
                            <select name="section" ng-model="search.section" class="form-control" required >
                                <option value="">-- Select Section --</option>
                                <?php foreach(config_item('section') as $key => $value){ ?>
                                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

		            <div class="form-group">
                        <label class="col-md-2 control-label"> Roll<span class="req"> * </span></label>
                        <div class="col-md-5">
                            <input type="text" name="roll" ng-model="search.roll" class="form-control" required>
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


        <div ng-init="active=true" class="panel panel-default" ng-hide="active">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Show Result</h1>
                </div>
            </div>

            <?php
                $attribute = array("name" => "");
                echo form_open("", $attribute);
            ?>
            <div class="panel-body">
            	<!-- table class="table">
            		<tr>
            			<th>Name</th>
            			<th>{{ details.student_name }}</th>
            			<td rowspan="4" style="text-align: right;">
            				<img src="<?php echo site_url(); ?>{{ details.student_photo }}" width="100">
            			</td>
            		</tr>

            		<tr>
            			<th>Reg. ID</th>
            			<th>{{ details.reg_id }}</th>
            		</tr>

            		<tr>
            			<th>Class</th>
            			<th>{{ details.class }}</th>
            		</tr>

            		<tr>
            			<th>Roll</th>
            			<th>{{ details.roll }}</th>
            		</tr>
            	</table -->

                <table class="table table-bordered exam" >
                    <tr>

                        <th class="text-center" style="width: 50px !important;">SL</th>
                        <th class="text-center">Subject</th>
                        <th class="width" ng-hide="row_active">Attendance</th>
                        <th class="width" ng-hide="row_active">Monthly Test</th>
                        <th class="width">Objective</th>
                        <th class="width">Written</th>
                        <th class="width">Practical</th>
                        <th class="width">Total Marks</th>
                        <th class="width">Letter Grade</th>
                        <th class="width">Grade Point</th>
                    </tr>

                    <tr ng-repeat="row in allMarks" ng-cloak>
                        <td class="text-center">{{$index+1}}</td>
                        <td class="text-center">{{row.subject}}</td>      
                        
                        <td ng-hide="row_active">
                            <input
                                type="number" class="form-control" name="attendance[]"
                                min="0" max="5"
                                ng-model="row.attendance" step="any">
                        </td>

                        <td ng-hide="row_active">
                            <input
                                type="number" class="form-control" name="monthlyTest[]"
                                min="0" max="30"
                                ng-model="row.monthlyTest" step="any">
                        </td>

			            <td>
                            <input
                                class="form-control"
                                type="number" class="form-control" name="objective[]"
                                min="0" max="{{ row.exam_objective }}"
                                ng-model="row.objective" step="any">
                                <input type="hidden" name="id[]" ng-value="{{row.id}}">
                        </td>

                        <td>
                            <input
                                class="form-control"
                                type="number" class="form-control" name="written[]"
                                min="0" max="{{  row.exam_written }}"
                                ng-model="row.written" step="any">
                        </td>

                        <td>
                            <input
                                class="form-control"
                                type="number" class="form-control" name="practical[]"
                                min="0" max="{{  row.exam_practical }}"
                                ng-model="row.practical" step="any">
                        </td>

                        <td>
                            <input
                                class="form-control"
                                type="text" class="form-control" name="total[]"
                                ng-model="student.total"
                                ng-value="totalMarksFn($index)" readonly>
                        </td>

                        <td>
                            <input
                                class="form-control"
                                type="text" class="form-control" name="letter[]"
                                ng-model="student.letter"
                                ng-value="letterGradeFn($index)" readonly>
                        </td>

                        <td>
                            <input
                                class="form-control"
                                type="text" class="form-control" name="grade[]"
                                ng-model="student.grade"
                                ng-value="gradePointFn($index)" readonly>
                        </td>
                    </tr>
                </table>

                <div class="btn-group pull-right">
                    <input type="submit" value="Update" name="update" class="btn btn-primary">
                </div>
            </div>
            <?php echo form_close(); ?>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
