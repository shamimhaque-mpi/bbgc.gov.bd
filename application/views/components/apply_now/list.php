<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<style>
	@media print{
		aside, nav, .panel-heading, .panel-footer, .none{
			display: none !important;
		}
		.panel{
			border: 1px solid transparent;
			left: 0px;
			position: absolute;
			top: 0px;
			width: 100%;
		}
        .hide{
            display: block !important;
        }
	}
</style>

<div class="container-fluid" ng-controller="ShowAllApplyStudentCtrl" ng-cloak>
    <div class="row">
    <?php echo $this->session->flashdata('confirmation');?>

        <div class="panel panel-default none">

                <div class="panel-heading panal-header">
                    <div class="panal-header-title pull-left">
                        <h1>Applying All Student</h1>
                    </div>
                </div>

                <div class="panel-body">
                    <?php
                        $attr=array("class"=>"form-horizontal");
                        echo form_open_multipart('', $attr);
                    ?>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Name</label>
                            <div class="col-md-5">
                                <select name="search[college_id]" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                   <option value="">-- Select Name --</option>
                                   <?php  foreach ($students_name as $key => $value) { ?>
                                   <option value="<?php echo $value->college_id; ?>"><?php echo ucwords($value->college_id)." - ".$value->name_english; ?></option>
                                   <?php  }  ?>
                               </select>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label class="col-md-2 control-label">Group</label>
                            <div class="col-md-5">
                                <select  name="search[group]" class="form-control">
                                    <option value="">-- Select Group --</option>
                                    <option value="science">Science</option>
                                    <option value="humanities">Humanities</option>
                                    <option value="business studies">Business Studies</option>
                                    
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-2 control-label">Session</label>
                            <div class="col-md-5">
                                <select  name="search[hsc_session]" class="form-control">
                                    <option value="">-- Select Group --</option>
                                     <?php for($i=date("Y")-3; $i<=date("Y"); $i++){?>
                                        <option value="<?php echo $i."-".($i+1); ?>"><?php echo $i."-".($i+1); ?></option>
                                    <?php } ?> 
                                </select>
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
                        <img class="hide" style="width: 100%; margin-bottom: 10px;" src="<?php echo site_url('public/banner/banner.png') ?>">
                        <h1 class="pull-left">Applying All Students</h1>
                        <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                    </div>
                </div>

            <div class="panel-body">
                
                <h3 class="text-center hide">All Student</h3>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Sl<span class="pull-right"></span></th>
                                    <th width="60">Photo</th>
                                    <th>Student's Name <span class="pull-right"></span></th>
                                    <th>College Roll</th>
                                    <th>Birth Date <span class="pull-right"></span></th>
                                    <th>District<span class="pull-right"></span></th>
                                    <th>Phone<span class="pull-right"></span></th>
                                    <th>pass<span class="pull-right"></span></th>
                                    <th>Group <span class="pull-right"></span></th>
                                    <th>Religion</th>
                                    <th class="none" style="width: 180px !important">Action</th>
                                </tr>
                                <?php
                                if($students !=NULL){
                                foreach($students as $key => $value){  ?>
                                <tr>
                                    <td class="num-center"><?php echo ($key+1); ?></td>
                                    <td>
                                        <img src="<?php echo site_url($value->photo);?>" width="50px" height="50px" alt="">
                                    </td>
                                    <td><?php echo filter($value->name_english); ?></td>
                                    <td class="num-center"><?php echo $value->college_id; ?></td>
                                    <td><?php echo $value->birth_date; ?></td>
                                    <td><?php echo filter($value->district); ?></td>
                                    <td><?php echo $value->student_phone; ?></td>
                                    <td><?php echo $value->password; ?></td>
                                    <td><?php echo filter($value->group); ?></td>
                                    <td><?php echo filter($value->religion); ?></td>
                                    <td class="none text-center">
                                        <a class="btn btn-info" href="<?php echo base_url('apply_now/apply_now/view/'.$value->id); ?>"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-warning" href="<?php echo base_url('apply_now/apply_now/edit/'.$value->id); ?>"><i class="fa fa-pencil-square-o"></i></a>
                                        <!--<a class="btn btn-success" target="_blank" href="<?php // echo base_url('apply_now/apply_now/more/'.$value->college_id); ?>"><i class="fa fa-plus"></i></a>-->
                                        <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this Data?');" href="<?php echo base_url('apply_now/apply_now/deleteStudent/'.$value->id); ?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
    
                            <?php }} ?>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
