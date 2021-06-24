<style>
	.attendance tr th{
		text-align: center;
	}
	.attendance label{
		display: block;
	}

	@media print{
		aside{
			display: none !important;
		}
		nav{
			display: none;
		}
		.panel{
			border: 1px solid transparent;
			left: 0px;
			position: absolute;
			top: 0px;
			width: 100%;
		}
		.box-width{
			width: 50%;
		}
		.none{
			display: none;
		}
		.panel-heading{
			display: none;
		}
		
		.panel-footer{
			display: none;
		}
        .hide{
            display: block !important;
        }
        .title{
            font-size:  25px;
        }
	}

</style>
<div class="container-fluid">
    <div class="row">
        <?php //echo $confirmation; echo"<pre>"; print_r($students_report); echo"</pre>"; ?>
        <div class="panel panel-default none">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Student Report</h1>
                </div>
            </div>

            <div class="panel-body">              

                <!-- horizontal form -->
                    
                    <div class="col-sm-12 no-padding">

                        <?php
                        $attr=array(
                            "class"=>"form-horizontal"
                            );
                        echo form_open("",$attr);
                       //print_r($student);
                        ?>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Class <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="class" class="form-control" required>
                                        <option value="">-- Select Class --</option>
                                      
                                        <?php foreach ($class_list as $key => $value) { ?>
                                        <option value="<?php echo $value->class; ?>"><?php echo $value->class; ?></option>
                                        <?php } ?> 
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-2 control-label">Group <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="group" class="form-control" required>
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
                            
                            <!--div class="form-group">
                                <label class="col-md-2 control-label">Session <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="section" class="form-control" required>
                                    <option value="">--Select section--</option>
                                       <?php foreach ($session_list as $key => $value) { ?>
                                       <option value="<?php echo $value->session; ?>"><?php echo $value->session; ?></option>
                                       <?php } ?>  
                                    </select>
                                </div>
                            </div-->

                            <div class="form-group">
                                <label class="col-md-2 control-label">Section <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="section" class="form-control" required>
                                    <option value="">--Select section--</option>
                                       <?php foreach ($section_list as $key => $value) { ?>
                                       <option value="<?php echo $value->section; ?>"><?php echo $value->section; ?></option>
                                       <?php } ?>  
                                    </select>
                                </div>
                            </div>

                            

                            <!--div class="form-group">
                                <label class="col-md-2 control-label">Date From <span class="req">*</span></label>

                                <div class="input-group date col-md-5" id="datetimepickerFrom1">
                                    <input type="text" name="date[from]" class="form-control" placeholder="YYYY-MM-DD">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Date to <span class="req">*</span></label>

                                <div class="input-group date col-md-5" id="datetimepickerTo2">
                                    <input type="text" name="date[to]" class="form-control" placeholder="YYYY-MM-DD">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>

                            </div-->
                            
                            <div class="form-group">
                                <label class="col-md-2 control-label">Roll <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="roll" class="form-control" required>
                                </div>
                            </div> 

                            <div class="col-md-7">
                                <div class="btn-group pull-right">
                                    <input type="submit" value="Show" name="submit" class="btn btn-primary">
                                </div>
                            </div>                       

                         <?php echo form_close(); ?>

                    </div>

                </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php         
         if($student!=NULL){ ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                 <div class="panal-header-title">
                        <h1 class="pull-left">Show Result</h1>
                        <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                    </div>
                </div>
                
                <div class="panel-body">
                    
                    <div class="row">

                        <div class="view-profile">
                            <div class="col-xs-2">
                                <figure class="pull-left">
                                    <img class="img-responsive" src="<?php echo site_url('public/logo/logo.png'); ?>" style="width: 100px; max-height: 100px;" alt="">
                                </figure>
                            </div>

                            <div class="col-xs-8">
                                <div class="institute">
                                    <h2 class="text-center title" style="margin-top: 10; font-weight: bold;">Bongobondhu Degree College</h2>
                                    <h3 class="text-center" style="margin: 0;">MYMENSINGH</h3>
                                </div>
                            </div>
                                    
                            <div class="col-xs-2">
                                <figure class="pull-right">
                                    <img class="img-responsive" src="<?php echo base_url($student[0]->photo);?>" style="width: 100px; max-height: 100px;" alt="Photo not found!" class="img-responsive">
                                </figure>
                            </div>

                        </div>

                    </div>

                    <hr style="border-bottom: 1px solid #ccc;">
                    
                    <h3 class="hide text-center" style="margin-top: -10px;">Attendance Report</h3>

                    <div class="row">
                        <div class="col-sm-6 no-padding box-width">
                            <div class="form-group">
                                <label class="col-xs-5">Student's Name </label>
                                <div class="col-xs-7">
                                    <p><?php echo $student[0]->name;?></p>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-xs-5">Father's Name </label>
                                <div class="col-xs-7">
                                    <p><?php echo $student[0]->father_name;?></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-5">Mother's Name </label>
                                <div class="col-xs-7">
                                    <p><?php echo $student[0]->mother_name;?></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6 no-padding box-width">
                            <div class="form-group">
                                <label class="col-xs-5">Class </label>
                                <div class="col-xs-7">
                                    <p><?php echo $student[0]->class;?> </p>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-xs-5">Group </label>
                                <div class="col-xs-7">
                                    <p><?php echo $student[0]->group;?> </p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-5">Roll </label>
                                <div class="col-xs-7">
                                    <p><?php echo $student[0]->roll;?></p>
                                </div>
                            </div>
                        </div>
                    </div>              
              
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                                <?php 
                                  $total_working_day=0;
                                  $total_present=0;
                                  $total_absent=0;
                                  $roll_array=array();
                                  
                                  foreach ($students_report as $key => $value) {
                                    $total_working_day++;
                                    $roll_array=json_decode($value->roll,true);  
                                  ?>
                                    <tr>
                                        <td><?php echo $value->date;?></td>
                                        <td>
                                          <?php
                                            if(!in_array($student[0]->roll,$roll_array)){
                                                echo "<p style='color:#f00;'>Absent</p>";
                                                $total_absent++;
                                            } else{
                                              echo "<p style='color:#008000;'>Present</p>";  
                                              $total_present++;
                                            }                               
                                          ?>
                                         </td>
                                    </tr>
                                  <?php 
                                 } 
                               ?> 
                           
                            </table>
                        </div>
                    </div>               

                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Total Working Days</th>
                                    <th>Total Present</th>
                                    <th>Total Absent</th>
                                    <th>Percent</th>
                                </tr>

                                <tr>
                                    <td><?php echo $total_working_day;?></td>
                                    <td><?php echo $total_present;?></td>
                                    <td><?php echo $total_absent;?></td>
                                    <td><?php echo "<b>".((100*$total_present)/$total_working_day)."</b>";?>&nbsp;%</td>
                                </tr>

                            </table>
                        </div>
                    </div>

                </div>
                <div class="panel-footer">&nbsp;</div>
            </div>
        <?php } ?> 
    </div>
</div>

<script>
    // linking between two date
    $('#datetimepickerFrom1').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerTo2').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $("#datetimepickerSMSFrom").on("dp.change", function (e) {
        $('#datetimepickerSMSTo').data("DateTimePicker").minDate(e.date);
    });
    $("#datetimepickerSMSTo").on("dp.change", function (e) {
        $('#datetimepickerSMSFrom').data("DateTimePicker").maxDate(e.date);
    });
</script>