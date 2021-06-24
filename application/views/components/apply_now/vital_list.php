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

		.table tr th, .table tr td {
			padding: 4px !important;
		}
		.table {
			margin-bottom: 10px !important;
		}
		.page-B {
		    page-break-after: always !important;
		    margin-bottom: 600px;
		}
	}
	.hr {
	    border: 10px solid #ddd;
	    background: #ddd;
	}
</style>



<div class="container-fluid">
    <div class="row">
        
          <div class="panel panel-default none">

                <div class="panel-heading panal-header">
                    <div class="panal-header-title pull-left">
                        <h1>Vital List</h1>
                    </div>
                </div>

                <div class="panel-body">
                    <?php
                        $attr=array("class"=>"form-horizontal");
                        echo form_open_multipart('', $attr);
                    ?>
                        
                        <div class="form-group">
                            <label class="col-md-2 control-label">Class</label>
                            <div class="col-md-5">
                                <select name="search[hsc_class]" class="form-control"  required>
                                    <option value="">-- Select Class --</option>
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
                        
                        <div class="form-group">
                            <label class="col-md-2 control-label">Section<span class="req">&nbsp;</span></label>
                            <div class="col-md-5">
                                <select name="search[hsc_section]" class="form-control" required>
                                    <option value="">-- Select --</option>
                                    <?php foreach(config_item('section') as $key => $value){?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-7">
                            <div class="btn-group pull-right">
                                <input type="submit" value="Show" name="search_item" class="btn btn-primary">
                            </div>
                        </div>
                   <?php echo form_close(); ?>

                </div>
                <div class="panel-footer">&nbsp;</div>
            </div>
            
        
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Student's Information</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>
            
            <?php if(!$students==NULL){ 
                foreach($students as $key =>$student ){
            ?>
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
                                <h2 class="text-center" style="font-weight: bold;">NOTRE DAME COLLEGE</h2>
                                <h3 class="text-center">MYMENSINGH</h3>
                            </div>
                        </div>
                                
                        <div class="col-xs-2">
                            <figure class="pull-right">
                                <!--<img class="img-responsive" src="<?php // echo site_url($student->photo);?>" style="width: 100px; height: 100px;" alt="Photo not found!" class="img-responsive">-->
                                <!--<img class="img-responsive" src="<?php // echo site_url('./public/students/'.$student->photo); ?>" style="width: 100px; height: 100px;" alt="Photo not found!" class="img-responsive">-->
                            </figure>
                        </div>
                    </div>

                </div>

                <hr style="border-bottom: 1px solid #ccc; margin: 10px 0">

                <h3 class="hide text-center" style="margin: 0 0 20px 0;">Student's Information</h3>
			    <table class="table table-bordered">
        <tr>
            <th width="300">Name of Student (In English)</th>
            <td><?php echo ucwords($student->name_english); ?></td>
            <td rowspan="4" width="125"><img class="img-responsive" src="<?php echo site_url($student->photo);?>" alt="student photo"></td>
        </tr>
        <tr>
            <th>Name of Student (বাংলা)</th>
            <td><?php echo ucwords($student->name_bangla); ?></td>
        </tr>
        <tr>
            <th>Nickname</th>
            <td><?php echo (isset($student->nickname) ? ucwords($student->nickname) : ''); ?></td>
        </tr>
         <tr>
            <th> College Roll  </th>
            <td><?php echo (isset($student->college_id) ? ucwords($student->college_id) : ''); ?></td>
        </tr>
    </table>

			    
			    <table class="table table-bordered">
			        <th colspan="4" class="text-center">
		                SSC RECORD
		            </th>
		            <?php 
		                $ssc_record                 = json_decode($student->ssc_record, true);
		                $compulsory_subject_grade   = json_decode($student->compulsory_subject_grade, true); 
		                $elective_subject_grade     = json_decode($student->elective_subject_grade, true); 
		                $additional_subject_grade   = json_decode($student->additional_subject_grade, true); 
		                $father_info                = json_decode($student->father_info, true); 
		                $mother_info                = json_decode($student->mother_info, true); 
		                $local_gurdian              = json_decode($student->local_gurdian, true); 
		                $progress_report            = json_decode($student->progress_report, true); 
		                $extra_activity             = json_decode($student->extra_activity, true); 
		                $compulsory                 = json_decode($student->compulsory, true); 
		                $optional                   = json_decode($student->optional, true); 
		            ?>
			        <tr>
			            <th width="150">SSC Group</th>
			            <td><?php echo ucwords($student->ssc_group); ?></td>
			            <th width="200">School Name</th>
			            <td><?php echo ucwords($ssc_record['school_name']); ?></td>
			        </tr>
			        <tr>
			            <th>School Address</th>
			            <td><?php echo ucwords($ssc_record['school_address']); ?></td>
			            <th>District</th>
			            <td><?php echo ucwords($ssc_record['district']); ?></td>
			        </tr>
			        <tr>
			            <th>Board</th>
			            <td><?php echo ucwords($ssc_record['board']); ?></td>
			            <th>Center</th>
			            <td><?php echo ucwords($ssc_record['center']); ?></td>
			        </tr>
			        <tr>
			            <th>SSC Roll No</th>
			            <td><?php echo $student->roll_no; ?></td>
			            <th>Exam Year</th>
			            <td><?php echo $student->exam_year; ?></td>
			        </tr>
			        <tr>
			            <!--<th>College Roll No</th>
			            <td><?php //echo (isset($student->college_id) ? $student->college_id : '' ); ?></td>-->
			            <th>No of A+</th>
			            <td><?php echo ucwords($ssc_record['no_of_plush']); ?></td>
			            <th>&nbsp;</th>
			            <td>&nbsp;</td>
			        </tr>
			        <tr>
			            <th>Registration No</th>
			            <td><?php echo $student->reg_no; ?></td>
			            <th>Registration Year/Session</th>
			            <td><?php echo $student->ssc_session; ?></td>
			        </tr>
			        <tr>
			            <th>GPA&nbsp;<small>(With Additional Subject)</small></th>
			            <td><?php echo ucwords($ssc_record['gpa_with_addition']); ?></td>
			            <th>GPA&nbsp;<small>(Without Additional Subject)</th>
			            <td><?php echo ucwords($ssc_record['gpa_without_addition']); ?></td>
			        </tr>
			        
			    </table>
			    <table class="table table-bordered">
			        <tr>
			            <th colspan="6" class="text-center">
			                SSC LETTER GRADES <br>
			                <small>General Compulsory Subjects</small>
			            </th>
			        </tr>
			        <tr>
			            <th width="200">Bangla</th>
			            <td><?php echo ucwords($compulsory_subject_grade['bangla']); ?></td>
			            <th width="200">English</th>
			            <td><?php echo ucwords($compulsory_subject_grade['english']); ?></td>
			            <th width="200">Mathematics</th>
			            <td><?php echo ucwords($compulsory_subject_grade['mathematics']); ?></td>
			        </tr>
			        <tr>
			            <th width="200">Genarel Science</th>
			            <td><?php echo (isset($compulsory_subject_grade['social_science']) ? ucwords($compulsory_subject_grade['social_science']) : "N/A"); ?></td>
			            <th width="200">ICT</th>
			            <td><?php echo (isset($compulsory_subject_grade['ict']) ? $compulsory_subject_grade['ict'] : 'N/A'); ?></td>
			            <th width="200">Career Education</th>
			            <td><?php echo (isset($compulsory_subject_grade['career_education']) ? $compulsory_subject_grade['career_education'] : 'N/A'); ?></td>
			        </tr>
			        
			        <tr>
			            <th width="200">Religion</th>
			            <td><?php echo (isset($compulsory_subject_grade['religion']) ? $compulsory_subject_grade['religion'] : 'N/A'); ?></td>
			        </tr>
			        
			        
			        <tr>
			            <th colspan="6" class="text-center">
			                <small>Other Compulsory Subjects</small>
			            </th>
			        </tr>
			        
			        
			        <?php if($student->ssc_group=='Science'){ ?>
    			        <tr> 
    			            <th>Physics</th>
    			            <td><?php echo (isset($elective_subject_grade['physics']) ? ucwords($elective_subject_grade['physics']) : 'N/A'); ?></td>
    			            <th>Chemistry</th>
    			            <td><?php echo (isset($elective_subject_grade['chemistry']) ? ucwords($elective_subject_grade['chemistry']) : "N/A"); ?></td>
    			            <th>Higer Math</th>
    			            <td><?php echo (isset($elective_subject_grade['higer_math']) ? ucwords($elective_subject_grade['higer_math']) : "N/A") ; ?></td>
    			        </tr>
    			        <tr> 
    			            <th>Biology</th>
    			            <td><?php echo (isset($elective_subject_grade['biology']) ? ucwords($elective_subject_grade['biology']) : 'N/A'); ?></td>
    			            <th>Physical Education</th>
    			            <td>
    			                <?php echo (isset($elective_subject_grade['physical_education']) ? $elective_subject_grade['physical_education'] : 'N/A'); ?>
    			            </td>
    			            <th></th>
    			            <td></td>
    			        </tr>
			        <?php } ?>
			        
			        
			        <?php if($student->ssc_group=='Humanities'){ ?>
    			        <tr> 
    			            <th>Soc./Gen.Science</th>
    			            <td><?php echo (isset($elective_subject_grade['gen_science']) ? ucwords($elective_subject_grade['gen_science']) : 'N/A'); ?></td>
    			            <th>Religion</th>
    			            <td><?php echo (isset($elective_subject_grade['religion']) ? ucwords($elective_subject_grade['religion']) : "N/A"); ?></td>
    			            <th>Geography</th>
    			            <td><?php echo (isset($elective_subject_grade['giography']) ? ucwords($elective_subject_grade['giography']) : "N/A") ; ?></td>
    			        </tr>
    			        <tr> 
    			            <th>History</th>
    			            <td><?php echo (isset($elective_subject_grade['history']) ? ucwords($elective_subject_grade['history']) : 'N/A'); ?></td>
    			            <th>Civics</th>
    			            <td><?php echo (isset($elective_subject_grade['civics']) ? $elective_subject_grade['civics'] : 'N/A'); ?></td>
    			            <th>Physical Education</th>
    			            <td><?php echo (isset($elective_subject_grade['physical_education']) ? $elective_subject_grade['physical_education'] : 'N/A'); ?></td>
    			        </tr>
			        <?php } ?>
			        
			        
			        <?php if($student->ssc_group=='Business_Studies'){ ?>
    			        <tr> 
    			            <th>Business Intro./Entre</th>
    			            <td><?php echo (isset($elective_subject_grade['intro_to_business']) ? ucwords($elective_subject_grade['intro_to_business']) : 'N/A'); ?></td>
    			            <th>Accounting</th>
    			            <td><?php echo (isset($elective_subject_grade['accounting']) ? ucwords($elective_subject_grade['accounting']) : "N/A"); ?></td>
    			            <th>Management</th>
    			            <td><?php echo (isset($elective_subject_grade['management']) ? ucwords($elective_subject_grade['management']) : "N/A") ; ?></td>
    			        </tr>
    			        <tr> 
    			            <th>Finace & Banking</th>
    			            <td><?php echo (isset($elective_subject_grade['finace']) ? ucwords($elective_subject_grade['finace']) : 'N/A'); ?></td>
    			            <th>Physical Education</th>
    			            <td><?php echo (isset($elective_subject_grade['physical_education']) ? $elective_subject_grade['physical_education'] : 'N/A'); ?></td>
    			            <th></th>
    			            <td></td>
    			        </tr>
			        <?php } ?>
			        
			        
			        <tr>
			            <th colspan="6" class="text-center">
			                <small>Additional Subject</small>
			            </th>
			        </tr>
			        
			        
			        <?php if($student->ssc_group =='Science') { ?>
			            
			            <tr>
			            <th>
			               Higher Math
			             </th>
			            <td>
			              <?php 
			                 echo (isset($additional_subject_grade['higer_math']) ? $additional_subject_grade['higer_math'] : '');
			              ?>
			           </td>
			            <th>
			                Biology
			            </th>
			            <td>
			                <?php echo (isset($additional_subject_grade['biology']) ? $additional_subject_grade['biology'] : ''); ?>
			            </td>
			            <th></th>
			            <td></td>
			        </tr>
			        
			        
			        <?php } ?>
			        
			        
			        <?php if($student->ssc_group =='Business_Studies') { ?>
			            
			            <tr>
			            <th>
			               Computer St.
			             </th>
			            <td>
			              <?php 
			                 echo (isset($additional_subject_grade['computer_st']) ? $additional_subject_grade['computer_st'] : 'N/A');
			              ?>
			           </td>
			            <th>
			                Agriculture studys
			            </th>
			            <td>
			                <?php echo (isset($additional_subject_grade['agriculture_studys']) ? $additional_subject_grade['agriculture_studys'] : 'N/A'); ?>
			            </td>
			            <th></th>
			            <td></td>
			        </tr>
			        
			        
			        <?php } ?>
			        
			        
			        <?php if($student->ssc_group =='Humanities') { ?>
			            
			            <tr>
			            <th>
			                Higher Math
			             </th>
			            <td>
			              <?php 
			                 echo (isset($additional_subject_grade['higer_math']) ? $additional_subject_grade['higer_math'] : '');
			              ?>
			           </td>
			            <th>
			                Agriculture studys
			            </th>
			            <td>
			                <?php echo (isset($additional_subject_grade['agriculture_studys']) ? $additional_subject_grade['agriculture_studys'] : ''); ?>
			            </td>
			            <th>ICT (Elective Subject) </th>
			            <td><?php echo (isset($elective_subject_grade['ict']) ? $elective_subject_grade['ict'] : 'NAN'); ?></td>
			        </tr>
			        <?php } ?>
	
			    </table>
			    
			    <table class="table table-bordered">
			        <tr>
			            <th colspan="4" class="text-center">
			                GENERAL INFORMATION (STUDENT)
			            </th>
			        </tr>
			        <tr>
			            <th width="200">Date of Birth</th>
			            <td><?php echo ucwords($student->birth_date); ?></td>
			            <th width="200">Nationality</th>
			            <td><?php echo ucwords($student->nationalitity); ?></td>
			        </tr>
			        <tr>
			            <th width="200">Religion</th>
			            <td><?php echo ucwords($student->religion); ?></td>
			            <th width="200">Blood Group</th>
			            <td><?php echo ucwords($student->blood_group); ?></td>
			        </tr>
			        <tr>
			            <th width="200">District</th>
			            <td><?php echo ucwords($student->district); ?></td>
			            <th width="200">Students Mobile</th>
			            <td><?php echo ucwords($student->student_phone); ?></td>
			        </tr>
			        <tr>
			            <th width="200">Present Address</th>
			            <td colspan="3"><?php echo ucwords($student->present_address); ?></td>
			        </tr>
			        <tr>
			            <th width="200">Permanent Address</th>
			            <td colspan="3"><?php echo ucwords($student->permanent_address); ?></td>
			        </tr>
			        <tr>
			            <th width="200">Phone&nbsp;(Res)</th>
			            <td><?php echo ucwords($student->phone_res); ?></td>
			            <th width="200">Stay With</th>
			            <td><?php echo ucwords($student->stay_with); ?></td>
			        </tr>
			    </table>
			    
			    <div class="page-break"></div>
			    
			    <table class="table table-bordered mt-20">
			        <tr>
			            <th colspan="2" class="text-center">
			                FATHER'S INFORMATION
			            </th>
			            <th colspan="2" class="text-center">
			                MOTHER'S INFORMATION
			            </th>
			        </tr>
			        <tr>
			            <th width="200">Name</th>
			            <td><?php echo ucwords($father_info['name']); ?></td>
			            <th width="200">Name</th>
			            <td><?php echo ucwords($mother_info['name']); ?></td>
			        </tr>
			        <tr>
			            <th width="200">Occupation</th>
			            <td><?php echo ucwords($father_info['occupation']); ?></td>
			            <th width="200">Occupation</th>
			            <td><?php echo (isset($mother_info['occupation']) ? ucwords($mother_info['occupation']) : ''); ?></td>
			        </tr>
			        <tr>
			            <th width="200">Designation</th>
			            <td><?php echo ucwords($father_info['designation']); ?></td>
			            <th width="200">Designation</th>
			            <td><?php echo (isset($mother_info['designation']) ? ucwords($mother_info['designation']) : ''); ?></td>
			        </tr>
			        <tr>
			            <th width="200">Workpalce Address</th>
			            <td><?php echo ucwords($father_info['institution']); ?></td>
			            <th width="200">Workpalce Address</th>
			            <td><?php echo (isset($mother_info['institution']) ? ucwords($mother_info['institution']) : ''); ?></td>
			        </tr>
			        <tr>
			            <th width="200">Phone&nbsp;(Office)</th>
			            <td><?php echo ucwords($father_info['phone']); ?></td>
			            <th width="200">Phone&nbsp;(Office)</th>
			            <td><?php echo (isset($mother_info['phone']) ? $mother_info['phone'] : ''); ?></td>
			        </tr>
			        <tr>
			            <th width="200">Monthly Income of Parents (Tk)</th>
			            <td><?php echo ucwords($father_info['monthly_income']).' '.'/-'; ?></td>
						<th width="200">Total Monthly Income of Family (Tk)</th>
			            <td><?php echo $father_info['total_monthly_income'].' '.'/-'; ?></td>
			        </tr>
			    </table>
			    
			    <table class="table table-bordered">
			        <tr>
			            <th colspan="4" class="text-center">LOCAL GURDIAN</th>
			        </tr> 
			        <tr>
			            <th width="200">Name</th>
			            <td><?php echo ucwords($local_gurdian['name']); ?></td>
			            <th width="200">Relation</th>
			            <td><?php echo ucwords($local_gurdian['relation']); ?></td>
			        </tr>
			        <tr>
			            <th>Occupation</th>
			            <td><?php echo ucwords($local_gurdian['occupation']); ?></td>
			            <th>Designation</th>
			            <td><?php echo ucwords($local_gurdian['designation']); ?></td>
			        </tr>
			        <tr>
			            <th>Phone&nbsp;(Res)</th>
			            <td><?php echo (isset($local_gurdian['phone_res']) ? $local_gurdian['phone_res'] : ''); ?></td>
			            <th>Phone&nbsp;(Office)</th>
			            <td><?php echo (isset($local_gurdian['phone_off']) ? $local_gurdian['phone_off'] : ''); ?></td>
			        </tr>
			        <tr>
			            <th>Workplace Address</th>
			            <td><?php echo (isset($local_gurdian['institution']) ? $local_gurdian['institution'] : ''); ?></td>
			            <th>Present Address</th>
			            <td><?php echo (isset($local_gurdian['address']) ? $local_gurdian['address'] : ''); ?></td>
			        </tr>
			    </table>
			    
			    <table class="table table-bordered">
    		        <tr>
    		            <th colspan="4" class="text-center">
        	                INFORMATION TO BE SENT TO
        	            </th>
    		        </tr>
    		        <tr>
    		            <th width="200">Name</th>
    		            <td><?php echo ucwords($progress_report['name']); ?></td>
    		            <th width="200">Relationship</th>
    		            <td><?php echo ucwords($progress_report['relationship']); ?></td>
    		        </tr>
    		        <tr>
    		            <th width="200">Address</th>
    		            <td><?php echo ucwords($progress_report['address']); ?></td>
    		            <th width="200">Phone&nbsp;(Res)</th>
    		            <td><?php echo ucwords($progress_report['phone_res']); ?></td>
    		        </tr>
			    </table>
			    <table class="table table-bordered">
			        <tr>
    		            <th colspan="4" class="text-center">
        	               Co-Curricular activities you took part while in high school
        	            </th>
    		        </tr>
    		        <tr>
    		            <th width="200">Sports</th>
    		            <td><?php echo (isset($extra_activity['sports']) ? $extra_activity['sports'] : ''); ?></td>
    		            <th width="200">Clubs</th>
    		            <td><?php echo (isset($extra_activity['club']) ? $extra_activity['club'] : ''); ?></td>
    		        </tr>
    		        <tr>
    		            <th>Others</th>
    		            <td><?php echo (isset($extra_activity['others']) ? $extra_activity['others'] : ''); ?></td>
    		            <th></th>
    		            <td></td>
    		        </tr>
			    </table>
			    <table class="table table-bordered">
			        <tr>
    		            <th colspan="8" class="text-center">
        	                SUBJECT YOU WISH TO STUDY AT NOTRE DAME COLLEGE MYMENSINGH
        	            </th>
    		        </tr>
    		        <tr>
    		            <th>Class</th></th>
    		            <td><?php echo ucwords($student->hsc_class); ?></td>
    		            <th>Group</th></th>
    		            <td><?php echo ucwords($student->group); ?></td>
    		            <th>Session / Year</th></th>
    		            <td><?php echo ucwords($student->hsc_session); ?></td>
    		            <th>Section</th></th>
    		            <td><?php echo ucwords($student->hsc_section); ?></td>
    		        </tr>
			    </table>
			    <table class="table table-bordered">
			        <tr>
			            <th width="100">Subject</th>
			            <th colspan="6" class="text-center">Compulsory</th>
			            <th class="text-center">Optional</th>
			        </tr>
			        <tr>
			            <th>Name</th>
			            <td><?php echo (!empty($compulsory[0]['subject']) ? $compulsory[0]['subject'] : ''); ?></td>
			            <td><?php echo (!empty($compulsory[1]['subject']) ? $compulsory[1]['subject'] : ''); ?></td>
			            <td><?php echo (!empty($compulsory[2]['subject']) ? $compulsory[2]['subject'] : ''); ?></td>
			            <td><?php echo (!empty($compulsory[3]['subject']) ? $compulsory[3]['subject'] : ''); ?></td>
			            <td><?php echo (!empty($compulsory[4]['subject']) ? $compulsory[4]['subject'] : ''); ?></td>
			            <td>
			             <?php 
			                echo (!empty($compulsory[5]['subject']) ? $compulsory[5]['subject'] : '');
			             ?>
			            </td>
			            <td><?php echo (!empty($optional['subject']) ? $optional['subject'] : ''); ?></td>
			        </tr>
			        <tr>
			            <th>Code</th>
			            <td><?php echo (!empty($compulsory[0]['code']) ? $compulsory[0]['code'] : ''); ?></td>
			            <td><?php echo (!empty($compulsory[1]['code']) ? $compulsory[1]['code'] : ''); ?></td>
			            <td><?php echo (!empty($compulsory[2]['code']) ? $compulsory[2]['code'] : ''); ?></td>
			            <td><?php echo (!empty($compulsory[3]['code']) ? $compulsory[3]['code'] : ''); ?></td>
			            <td><?php echo (!empty($compulsory[4]['code']) ? $compulsory[4]['code'] : ''); ?></td>
			            <td>
			                <?php 
			                    echo (!empty($compulsory[5]['code']) ? $compulsory[5]['code'] : '');
			                ?>
			            </td>
			            <td ><?php echo (!empty($optional['code']) ? $optional['code'] : ''); ?></td>
			        </tr>
			    </table>

            </div>
            <div class="hr none">&nbsp;</div>
            <div class="page-B">&nbsp;</div>
            <?php }} ?>
            <div class="panel-footer">&nbsp;</div>
        </div>
        
    </div>
</div>
