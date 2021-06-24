<style>
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
		.none{
			display: none;
		}
		.panel-heading{
			display: none;
		}
		
		.panel-footer{
			display: none;
		}
        .panel .hide{
            display: block !important;
        }
	}
</style>

<div class="container-fluid">
    <div class="row">
<?php //echo "<pre>"; print_r($session_list); echo "</pre>";?>
        <div class="panel panel-default none">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Student</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>All Admitted Student</h4>

                    <ol style="font-size: 14px;">
                        <li>1. fill all the required <mark>*</mark> fields</li>
                        <li>2. click the <mark>show</mark> button to insert data</li>
                    </ol>

                </blockquote>

                <hr-->

                <?php
                    $attr=array(
                        "class"=>"form-horizontal"
                        );
                echo form_open('',$attr);?>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Session</label>
                        <div class="col-md-5">
                            <select name="search[session]" class="form-control">
                               <option value="">-- Select Session --</option>
                               <?php foreach ($session_list as $key => $value) { ?>
                               <option value="<?php echo $value->session; ?>"><?php echo $value->session; ?></option>
                               <?php } ?>
                           </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Class</label>
                        <div class="col-md-5">
                            <select name="search[class]" class="form-control">
                                <option value="">-- Select Class--</option>
                                <?php foreach(config_item('classes') as $key => $value){ ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <!--div class="form-group">
                        <label class="col-md-2 control-label">Shift</label>
                        <div class="col-md-5">
                            <select name="search[student_shift]" class="form-control">
                                <option value="">-- Select Shift --</option>
                                <option value="day">Day</option>
                                <option value="morning">Morning</option>
                            </select>
                        </div>
                    </div-->
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Section</label>
                        <div class="col-md-5">
                            <select name="search[student_section]" class="form-control">
                                <option value="">-- Select Section --</option>
                                <option value="Section_I">Section I</option>
                                <option value="Section_II">Section II</option>
                                <option value="Section_III">Section III</option>
                                <option value="Section_IV">Section IV</option>
                                <option value="Section_V">Section V</option>
                                <option value="Section_VI">Section VI</option>
                                <option value="Section_VII">Section VII</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Group</label>
                        <div class="col-md-5">
                            <select name="search[student_group]" class="form-control">
                                <option value="">-- Select Group --</option>
                                <option value="Science">Science</option>
                                <option value="Huminities">Huminities</option>
                                <option value="Business_Studies">Business Studies</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Roll No</label>
                        <div class="col-md-5">
                            <input type="text" name="search[students_roll]" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" value="Show" name="viewQuery" class="btn btn-primary">
                    </div>
                    </div>

                <?php echo form_close(); ?>

            </div>
            <div class="panel-footer">&nbsp;</div>

        </div>

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
                                <img class="img-responsive" src="<?php echo site_url('private/images/logo.jpg'); ?>" style="width: 100px; height: 100px;" alt="">
                            </figure>
                        </div>

                        <div class="col-xs-8">
                            <div class="institute">
                                <h2 class="text-center" style="margin-top: 10; font-weight: bold;">NOTRE DAME COLLEGE</h2>
                                <h3 class="text-center">MYMENSINGH</h3>
                            </div>
                        </div>
                                
                        <!--div class="col-xs-2">
                            <figure class="pull-right">
                                <img class="img-responsive" src="<?php echo site_url($student_info[0]->photo); ?>" style="width: 100px; height: 100px;" alt="Photo not found!" class="img-responsive">
                            </figure>
                        </div-->

                    </div>

                </div>

                <hr>

                <h3 class="text-center hide">All Student</h3>


                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th> 
                                <th>Session</th>
                                <th>Photo</th>
                                <th>Student's Name</th>
                                <th>Group</th>
                                <th>Section</th>
                                <th>Class</th>
                                <th class="none">Action</th>
                            </tr>
                            <?php foreach ($student_info as $key => $students) { ?>
                            <tr>
                                <td> <?php echo $key+1; ?> </td>
                                <td> <?php echo $students->session; ?> </td>
                                <td> <img src="<?php echo base_url($students->photo); ?>" width="50px" height="50px" alt=""></td>
                                <td> <?php echo $students->students_name; ?></td>
                                <td><?php echo str_replace("_", " ",$students->student_group); ?></td>
                                <td><?php echo str_replace("_", " ", $students->student_section); ?></td>
                                <td><?php echo $students->class; ?></td>
                                <td class="none" style="width: 216px;">
                                    <a class="btn btn-primary" href="<?php echo site_url('students/admission_view/student_profile')?>?id=<?php echo $students->id;?>">View</a>
                                    <a class="btn btn-warning" href="<?php echo site_url('students/admission_view/student_edit')?>?id=<?php echo $students->id;?>">Edit</a>
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this Data');" href="?delete_token=<?php echo $students->id;?>&img_url=<?php echo $students->photo;?>">Delete</a>
                                </td>
                            </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>

            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

