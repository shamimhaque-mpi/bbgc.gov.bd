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
<?php //echo "<pre>"; print_r($student_info); echo "</pre>";?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Student's Information</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">

                <div class="row">

	                <div class="view-profile">
	                	<div class="col-xs-2">
	                		<figure class="pull-left">
	                			<img class="img-responsive" src="<?php echo site_url('public/logo/logo.png'); ?>" style="width: 100px; height: 100px;" alt="">
	                		</figure>
	                	</div>

	                	<div class="col-xs-8">
							<div class="institute">
								<h2 class="text-center title" style="margin-top: 10; font-weight: bold;">Border Guard Public School and College</h2>
                                <h3 class="text-center" style="margin: 0;">MYMENSINGH</h3>
							</div>
						</div>
								
						<div class="col-xs-2">
                			<figure class="pull-right">
                				<img class="img-responsive" src="<?php echo site_url($student_info[0]->photo); ?>" style="width: 100px; height: 100px;" alt="Photo not found!" class="img-responsive">
                			</figure>
	                	</div>

                	</div>

                </div>

                <hr style="border-bottom: 1px solid #ccc;">

            	<div class="row">

                <h3 class="hide text-center" style="margin: 0 0 20px 0;">Student's Information</h3>
            
                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Student's Name</label>
                        <div class="col-xs-6">
                            <p><?php echo $student_info[0]->students_name; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Student's Roll</label>
                        <div class="col-xs-6">
                            <p><?php echo $student_info[0]->students_roll; ?></p>
                        </div>
                    </div>                    

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Father's Name</label>
                        <div class="col-xs-6">
                            <p><?php echo $student_info[0]->fathers_name; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Mother's Name</label>
                        <div class="col-xs-6">
                            <p><?php echo $student_info[0]->mothers_name; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Father's Profession</label>
                        <div class="col-xs-6">
                            <p><?php echo $student_info[0]->fathers_profession; ?> </p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Religion</label>
                        <div class="col-xs-6">
                            <p><?php echo ucfirst($student_info[0]->student_religion); ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Nationality</label>
                        <div class="col-xs-6">
                            <p><?php echo $student_info[0]->nationality; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Date of Birth</label>
                        <div class="col-xs-6">
                            <p><?php echo $student_info[0]->birth_date; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Present Address</label>
                        <div class="col-xs-6">
                            <p><?php echo $student_info[0]->preasent_address; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Permanent Address</label>
                        <div class="col-xs-6">
                            <p><?php echo $student_info[0]->permanent_address; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Parents Mobile Number</label>
                        <div class="col-xs-6">
                            <?php
                            if ($student_info[0]->parents_mobile=="") {
                                $p_mobile="N/A";
                            }
                            else{
                                $p_mobile=$student_info[0]->parents_mobile;
                            }
                            ?>
                            <p><?php echo $p_mobile; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Local Guardian Mobile Number</label>
                        <div class="col-xs-6">
                            <?php
                            if ($student_info[0]->lg_mobile=="") {
                                $lg_mobile="N/A";
                            }
                            else{
                                $lg_mobile=$student_info[0]->lg_mobile;
                            }
                            ?>
                            <p><?php echo $lg_mobile; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Student Mobile Number</label>
                        <div class="col-xs-6">
                            <p><?php echo $student_info[0]->mobile_number; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Session </label>
                        <div class="col-xs-6">
                            <p><?php echo $student_info[0]->session; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Section </label>
                        <div class="col-xs-6">
                            <p><?php echo str_replace("_"," ",$student_info[0]->student_section); ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Group </label>
                        <div class="col-xs-6">
                            <p><?php echo $student_info[0]->student_group; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Class </label>
                        <div class="col-xs-6">
                            <p><?php echo $student_info[0]->class; ?></p>
                        </div>
                    </div>

                </div>
     
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>


