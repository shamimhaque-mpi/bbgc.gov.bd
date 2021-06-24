<style>
    .student-table{
        width: 100%;
        margin-bottom: 15px;
    }
    .student-table tr td{
        padding: 2px 0;
    }

    .instruction ul li{
        padding-left: 15px;
        margin-bottom: 10px;
    }
    .instruction ul li i{
        font-size: 8px;
    }

    /* custom form style*/

    .custom-form .control-label{
        float: left;
        margin-right: 10px;
        padding-top: 6px;
        width: 36%;
    }
    .custom-form .form-group{
        margin-bottom: 5px;
    }
    .custom-form .custom-file{
        width: 200px;
        display: table;
    }

    @media print{
             aside, nav, .none, .panel-heading, .panel-footer{display: none !important;}
            .panel{border: 1px solid transparent;left: 0px;position: absolute;top: 0px;width: 100%;}
            .hide{display: block !important;}
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
        .panel .none{
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
        .custom-form .control-label{
            width: 230px;
        }
        input[type="text"]{
            border: 1px solid transparent;
        }
        span{
            display: none !important;
        }
        input[type="submit"]{
            display: none;
        }
        .title{
            font-size: 25px;
        }
    }
</style>

<div class="container-fluid">
    <div class="row" ng-controller="testimonialCtrl" ng-cloak>
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Student Testomonial</h1>
                </div>
            </div>

            <div class="panel-body none">
                
                <?php
	                $attr=array('class'=>'form-horizontal');
	                echo form_open('testimonial/certificate',$attr);
                ?>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Roll No <span class="req">*</span></label>
                       <div class="col-md-5">
                           <input type="text" name="search[roll]" ng-model="roll" ng-change="getstudentInfofn()" class="form-control" required>
                       </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Registration No <span class="req"></span></label>
                       <div class="col-md-5">
                           <input type="text" name="search[reg_id]" ng-value="reg_id" class="form-control" readonly>
                       </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Name <span class="req"></span></label>
                       <div class="col-md-5">
                           <input type="text" name="" ng-value="name" class="form-control" readonly>
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

        <div class="panel panel-default" ng-hide="active" ng-init="active=true;">
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
	                			<img class="img-responsive" src="<?php echo site_url('public/logo/logo.png'); ?>" style="width: 100px; height: 100px;" alt="">
	                		</figure>
	                	</div>

	                	<div class="col-xs-8">
							<div class="institute">
								<h2 class="text-center title" style="margin-top: 10; font-weight: bold;">Bongobondhu Government College</h2>
                                <h3 class="text-center" style="margin: 0;">Tarakanda</h3>
							</div>
						</div>

                    </div>

                </div>

                <hr style="border: 2px solid #ccc;">

                <h4 class="text-center">Testimonial Certificate</h4>

                <div class="row">
                    <div class="col-xs-9">
                        <table class="student-table">

                            <tr>
                                <th>ID</th>
                                <td>{{student.id}}</td>
                            </tr>

                            <tr>
                                <th>Name</th>
                                <td>{{student.name}}</td>
                            </tr>

                            <tr>
                                <th>Father's Name</th>
                                <td>{{student.father_name}}</td>
                            </tr>

                            <tr>
                                <th>Mother's Name</th>
                                <td>{{student.mother_name}}</td>
                            </tr>
                            
                            <!--tr>
                                <th>Address</th>
                                <td>{{student.present_address}}</td>
                            </tr-->
                            
                            <tr>
                                <th>Session</th>
                                <td>{{student.session}}</td>
                            </tr>

                            <tr>
                                <th>Date Of Birth</th>
                                <td>{{student.birth_date}}</td>
                            </tr>

                            <tr>
                                <th>Class</th>
                                <td>{{student.class}}</td>
                            </tr>                        
                        </table>
                    </div>

                    <div class="col-xs-3">
                        <figure class="pull-right">
                            <img style="width: 100px; height: 100px;" class="img-responsive" src="<?php echo site_url('public/students/'.'{{student.photo}}'); ?>" alt="Photo not found!" class="img-responsive">
                        </figure>
                    </div>

                </div> 

                <?php 
                $attr = array('class' => 'custom-form');
                echo form_open("", $attr); 
                ?>


                <input type="hidden" name="id" ng-value="student.id">
                <input type="hidden" name="name" ng-value="student.name">
                <input type="hidden" name="father_name" ng-value="student.father_name">
                <input type="hidden" name="mother_name" ng-value="student.mother_name">
                <input type="hidden" name="birth_date" ng-value="student.birth_date">
                <input type="hidden" name="class" ng-value="student.class">
                <input type="hidden" name="session" ng-value="student.session">
                 <input type="hidden" name="address" ng-value="student.permanent_address">

                 <div class="form-group">
                    <label class="control-label">Roll </label>
                    <div class="custom-file">
                        <input type="text" name="roll" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">GPA</label>
                    <div class="custom-file">
                        <input type="text" name="gpa" class="form-control">
                    </div>
                </div>
                <div class="btn-group pull-right">
                    <input type="submit" name="submit" value="Save" class="btn btn-primary">
                </div>

                <?php echo form_close();?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

