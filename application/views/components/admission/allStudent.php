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
		.title{
			font-size: 25px;		
		}
	}
</style>

<div class="container-fluid">
    <div class="row">
    <?php echo $this->session->flashdata('confirmation');?>

        <div class="panel panel-default none">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Student</h1>
                </div>
            </div>

            <div class="panel-body">

                <?php
                $attr=array("class"=>"form-horizontal");
                echo form_open('',$attr);
                ?>
				
                    <div class="form-group">
                        <label class="col-md-2 control-label">Class <span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <select name="search[class]" class="form-control">
                                <option value="">-- Select Class--</option>
                                <?php 
                                    foreach(config_item('classes') as $key => $value){?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-2 control-label">Group <span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <select name="search[group]" class="form-control">
                                <option value="">-- Select Group --</option>
                                <?php foreach(config_item("group") as $key => $val){ ?>
                                <option value="<?php echo $key; ?>">
                                <?php echo $val; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Section<span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <select name="search[section]" class="form-control">
                               <option value="">-- Select Section--</option>
                               <?php foreach (config_item('section') as $key => $value) { ?>
                               <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                               <?php } ?>
                           </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Session <span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <select name="search[session]" class="form-control">
                               <option value="">-- Select Session --</option>
                               <?php foreach ($session_list as $key => $value) { ?>
                               <option value="<?php echo $value->session; ?>"><?php echo $value->session; ?></option>
                               <?php } ?>
                           </select>
                        </div>
                    </div>
					
					<!--div class="form-group ">
						<label class="col-md-2 control-label">Batch <span class="req">&nbsp;</span></label>
						<div class="col-md-5">
							<select name="search[batch]" class="form-control">
								<option value="">-- Select Batch --</option>
								<?php
									foreach(config_item('batch') as $key => $value){?>
										<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
									<?php
									}
								?>
							</select>
						</div>
					</div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Shift <span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <select name="search[shift]" class="form-control">
                                <option value="">-- Select Shift --</option>
                                <option value="day">Day</option>
                                <option value="morning">Morning</option>
                            </select>
                        </div>
                    </div-->

                    <div class="col-md-7">
						<div class="btn-group pull-right">
							<input type="submit" value="Show" name="show" class="btn btn-primary">
						</div>
                    </div>

                <?php echo form_close(); ?>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>




        <!-- result -->
        <?php if($result != null){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Show Result</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">
            
                <div class="row hide">
                    <div class="view-profile">
                        <div class="col-xs-2">
                            <figure class="pull-left">
                                <img class="img-responsive" src="<?php echo site_url('public/logo/logo.png'); ?>" style="width: 100px; height: 100px;" alt="">
                            </figure>
                        </div>

                        <div class="col-xs-8">
                            <div class="institute">
                                <h2 class="text-center title" style="margin-top: 10; font-weight: bold;"><?php echo config_item('header')['title']; ?></h2>
                                <h3 class="text-center" style="margin: 0;"><?php echo config_item('header')['place']; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="hide" style="border-bottom: 1px solid #ccc;">

                <h3 class="text-center hide">All Students</h3>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th> 
                                <th>Session</th>
                                <th>Photo</th>
                                <th>Student's Name</th>
                                <th>Group</th>
                                <!--th>Batch</th-->
                                <th>Class</th>
                                <th class="none">Action</th>
                            </tr>
                            
                            <?php foreach($result as $key=>$row){ ?>
                            <tr>
                                <td> <?php echo ($key + 1); ?> </td>
                                <td> <?php echo $row->session; ?> </td>
                                <td> 
                                    <?php
                                    $where = array("id" => $row->student_id);
                                    $info = $this->action->read("registration", $where);
                                    ?>
                                    <img src="<?php echo site_url('public/students/'.$info[0]->photo); ?>" 
                                        width="50px" height="50px" 
                                        alt="Photo not found!">
                                </td>
                                <td> <?php echo $info[0]->name; ?> </td>
                                <td> <?php echo $row->group; ?> </td>
                                <!--td> <?php echo ucwords(str_replace("_"," ",$row->batch)); ?> </td-->
                                <td> <?php echo $row->class; ?> </td>
                                
                                <td class="none" style="width: 216px;">
                                    <a class="btn btn-primary" 
                                        href="<?php echo base_url('admission/admission/profile?id='.$row->id); ?>">
                                        View
                                    </a>
                                    
                                    <a class="btn btn-warning" 
                                        href="<?php echo base_url('admission/admission/editStudent?id='.$row->id); ?>">
                                        Edit
                                    </a>
                                    
                                    <a class="btn btn-danger" 
                                        onclick="return confirm('Are you sure to delete this Data');" 
                                        href="<?php echo base_url('admission/admission/allStudent?id='.$info[0]->id.'&img_url=./public/students/'.$info[0]->photo); ?>">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php } ?>

    </div>
</div>

