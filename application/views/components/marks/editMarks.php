<style>
    .attendance tr th{
        text-align: center;
    }
    .attendance label{
        display: block;
    }
    .exam td{
        padding:  0 !important;
    }
    .exam input[type="text"], input[type="number"]{
        border: 1px solid transparent;
    }
</style>

<div class="container-fluid" ng-controller="EditMarksCtrl" ng-cloak>
    <div class="row">
        <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Edit</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php
                $attr = array("class" => "form-horizontal");
                echo form_open("marks/marks/editMarks?id=".$this->input->get('id'), $attr);
                ?>

                <div ng-init="id=<?php echo $this->input->get('id'); ?>">&nbsp;</div>

                <table class="table table-bordered exam">
                    <tr>
                        <th>Roll</th>
                        <th>Subject</th>
                        <th ng-hide="row_active">Attendance</th>
                        <th ng-hide="row_active">Monthly Test</th>
                        <th>Objective</th>
                        <th>Written</th>
                        <th>Practical</th>
                        <th>Total Marks</th>
                        <th>Letter Grade</th>
                        <th>Grade Point</th>
                    </tr>

                    <tr ng-repeat="mark in marks">
                        <td>
                            <input
                                type="text" name="roll" class="form-control"
                                ng-model="mark.roll">
                        </td>
                        <input type="hidden" ng-value="id" name="id">

                        <td>
                            <input
                                type="text" name="subject" class="form-control"
                                ng-model="mark.subject">
                        </td>


  			<td ng-hide="row_active">
                            <input
                                type="number" class="form-control" name="attendance"
                                min="0" max="5"
                                ng-model="mark.attendance" step="any">
                        </td>

                        <td ng-hide="row_active">
                            <input
                                type="number" class="form-control" name="monthlyTest"
                                min="0" max="30"
                                ng-model="mark.monthlyTest" step="any">
                        </td>
                        
                        
                        
                        
                        
                        <td>
                            <input
                                type="number" name="objective" class="form-control"
                                ng-model="mark.objective"
                                max="{{mark.objectiveMark}}" min="0" step="any">
                        </td>

                        <td>
                            <input
                                type="number" name="written" class="form-control"
                                ng-model="mark.written"
                                max="{{mark.writtenMark}}" min="0" step="any">
                        </td>

                        <td>
                            <input
                                type="number" name="practical" class="form-control"
                                ng-model="mark.practical"
                                max="{{mark.practicalMark}}" min="0" step="any">
                        </td>

                        <td>
                            <input
                                type="text" name="total" class="form-control"
                                ng-model="mark.total"
                                ng-value="totalMarksFn($index)" readonly>
                        </td>

                        <td>
                            <input
                                type="text" name="letter" class="form-control"
                                ng-model="mark.letter"
                                ng-value="letterGradeFn($index)" readonly>
                        </td>

                        <td>
                            <input
                                type="text" name="grade" class="form-control"
                                ng-model="mark.point"
                                ng-value="gradePointFn($index)" readonly>
                        </td>
                    </tr>
                </table>

                <div class="btn-group pull-right">
                    <input type="submit" value="Update" name="update" class="btn btn-primary">
                </div>

                <?php echo form_close();?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
