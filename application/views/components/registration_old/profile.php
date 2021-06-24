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
<?php //echo "<pre>"; print_r($student); echo "</pre>";?>
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
								<h2 class="text-center title" style="margin-top: 10; font-weight: bold;"><?php echo $site_name; ?></h2>
							</div>
						</div>
								
						<div class="col-xs-2">
                			<figure class="pull-right">
                				<img src="<?php echo site_url('public/students/'.$student[0]->photo);?>" class="img-responsive" src="" style="width: 100px; height: 100px;" alt="Photo not found!" class="img-responsive">
                			</figure>
	                	</div>

                	</div>

                </div>

                <hr style="border-bottom: 1px solid #ccc;">

            	<div class="row">

                <h3 class="hide text-center" style="margin: 0 0 20px 0;">Student's Information</h3>
            
                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Student's  Name</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->name;?></p>
                        </div>
                    </div>

                    <!--div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Last Name</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->name;?></p>
                        </div>
                    </div-->                    

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Father's Name</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->father_name;?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Mother's Name</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->mother_name;?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Father's Profession</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->father_profession;?></p>
                        </div>
                    </div>
					
					<div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Mother's Profession</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->mother_profession;?></p>
                        </div>
                    </div>
					
					<div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Student's Mobile  Number</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->student_mobile;?></p>
                        </div>
                    </div>
					
					<div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Guardian Mobile Number</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->guardian_mobile;?></p>
                        </div>
                    </div>
					
					<div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Date of Birth</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->birth_date;?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Religion</label>
                        <div class="col-xs-6">
                            <p><?php echo ucwords($student[0]->religion);?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Gender</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->gender;?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Present Address</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->present_address;?></p>
                        </div>
                    </div>
					
					<div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Permanent Address</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->permanent_address;?></p>
                        </div>
                    </div>
					
					<div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Class </label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->class;?></p>
                        </div>
                    </div>
                    
                    
					<div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Section</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->section;?></p>
                        </div>
                    </div>
					
					<div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Group </label>
                        <div class="col-xs-6">
                            <p><?php echo ucwords($student[0]->group);?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Session </label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->session;?></p>
                        </div>
                    </div>

                </div>
     
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>


