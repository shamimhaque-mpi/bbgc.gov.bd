<style>
	@media print {
		aside {
			display: none !important;
		}

		nav {
			display: none;
		}

		.panel {
			border: 1px solid transparent;
			left: 0px;
			position: absolute;
			top: 0px;
			width: 100%;
		}

		.none {
			display: none;
		}

		.panel-heading {
			display: none;
		}

		.panel-footer {
			display: none;
		}

		.panel .hide {
			display: block !important;
		}

		.title {
			font-size: 25px;
		}

		.table tr th,
		.table tr td {
			padding: 4px !important;
		}

		.table {
			margin-bottom: 10px !important;
		}
	}
</style>


	<?php 
        //$ssc_record                 = json_decode($student[0]->ssc_record, true);
        $compulsory_subject_grade   = json_decode($student[0]->compulsory_subject_grade, true); 
        $elective_subject_grade     = json_decode($student[0]->elective_subject_grade, true); 
        $additional_subject_grade   = json_decode($student[0]->additional_subject_grade, true); 
        //$father_info                = json_decode($student[0]->father_info, true); 
        //$mother_info                = json_decode($student[0]->mother_info, true); 
        //$local_gurdian              = json_decode($student[0]->local_gurdian, true); 
        //$progress_report            = json_decode($student[0]->progress_report, true); 
        $extra_activity             = json_decode($student[0]->extra_activity, true); 
        //$compulsory                 = json_decode($student[0]->compulsory, true); 
        //$optional                   = json_decode($student[0]->optional, true); 
    ?>

<div class="container-fluid">
	<div class="row">
		<?php //echo "<pre>"; print_r($student); echo "</pre>";?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panal-header-title">
					<h1 class="pull-left">Student's Information</h1>
					<a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;"
						onclick="window.print()"><i class="fa fa-print"></i> Print</a>
				</div>
			</div>

			<div class="panel-body">

				<div class="row">

					<div class="view-profile">
						<div class="col-xs-12">
							<img style="width: 100%; margin-bottom: 10px;"
								src="<?php echo site_url('public/banner/banner.png') ?>">
						</div>
					</div>

				</div>

				<h3 class="hide text-center" style="margin: 0 0 20px 0;">Student's Information</h3>
				<table class="table table-bordered">
					<tr>
						<th width="300">Name of Student (In English)</th>
						<td><?php echo ucwords($student[0]->name_english); ?></td>
						<td rowspan="4" width="125"><img class="img-responsive"
								src="<?php echo site_url($student[0]->photo);?>" alt="student photo"></td>
					</tr>
					<tr>
						<th>Name of Student (বাংলা)</th>
						<td><?php echo ucwords($student[0]->name_bangla); ?></td>
					</tr>
					<?php /*
					<tr>
						<th>Nickname</th>
						<td><?php echo (isset($student[0]->nickname) ? ucwords($student[0]->nickname) : ''); ?></td>
					</tr>
					*/?>
					<tr>
						<th> College Roll </th>
						<td><?php echo (isset($student[0]->college_id) ? ucwords($student[0]->college_id) : ''); ?></td>
					</tr>
				</table>
                <?php /*
				<table class="table table-bordered">
					<th colspan="4" class="text-center">
						SSC RECORD
					</th>
					<tr>
						<th width="200">SSC Group</th>
						<td><?php echo ucwords($student[0]->ssc_group); ?></td>
						<th width="200">School Name</th>
						<td><?php echo ucwords($student[0]->ssc_record_school_name); ?></td>
					</tr>
					<tr>
						<th>School Address</th>
						<td><?php echo ucwords($student[0]->ssc_record_school_address); ?></td>
						<th>District</th>
						<td><?php echo ucwords($student[0]->ssc_record_district); ?></td>
					</tr>
					<tr>
						<th>Board</th>
						<td><?php echo ucwords($student[0]->ssc_record_board); ?></td>
						<th>Center</th>
						<td><?php echo ucwords($student[0]->ssc_record_center); ?></td>
					</tr>
					<tr>
						<th>SSC Roll No</th>
						<td><?php echo $student[0]->roll_no; ?></td>
						<th>Exam Year</th>
						<td><?php echo $student[0]->exam_year; ?></td>
					</tr>
					<tr>

						<!--<th>College Roll No</th>
			            <td><?php //echo (isset($student[0]->college_id) ? $student[0]->college_id : '' ); ?></td>-->
						<th>No of A+</th>
						<td><?php echo ucwords($student[0]->ssc_record_no_of_plush); ?></td>
						<th>&nbsp;</th>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<th>Registration No</th>
						<td><?php echo $student[0]->reg_no; ?></td>
						<th>Registration Year/Session</th>
						<td><?php echo $student[0]->ssc_session; ?></td>
					</tr>
					<tr>
						<th>GPA&nbsp;<small>(With Additional Subject)</small></th>
						<td><?php echo ucwords($student[0]->ssc_record_gpa_with_addition); ?></td>
						<th>GPA&nbsp;<small>(Without Additional Subject)</th>
						<td><?php echo ucwords($student[0]->ssc_record_gpa_without_addition); ?></td>
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
						<th width="100">Bangla</th>
						<td><?php echo ucwords($compulsory_subject_grade['bangla']); ?></td>
						<th width="100">English</th>
						<td><?php echo ucwords($compulsory_subject_grade['english']); ?></td>
						<th width="100">Mathematics</th>
						<td><?php echo ucwords($compulsory_subject_grade['mathematics']); ?></td>
					</tr>
					<tr>
						<th width="100">Genarel Science</th>
						<td><?php echo (isset($compulsory_subject_grade['social_science']) ? ucwords($compulsory_subject_grade['social_science']) : "N/A"); ?>
						</td>
						<th width="100">ICT</th>
						<td><?php echo (isset($compulsory_subject_grade['ict']) ? $compulsory_subject_grade['ict'] : 'N/A'); ?>
						</td>
						<th width="100">Career Education</th>
						<td><?php echo (isset($compulsory_subject_grade['career_education']) ? $compulsory_subject_grade['career_education'] : 'N/A'); ?>
						</td>
					</tr>

					<tr>
						<th width="100">Religion</th>
						<td><?php echo (isset($compulsory_subject_grade['religion']) ? $compulsory_subject_grade['religion'] : 'N/A'); ?>
						</td>
					</tr>


					<tr>
						<th colspan="6" class="text-center">
							<small>Other Compulsory Subjects</small>
						</th>
					</tr>


					<?php if($student[0]->ssc_group=='Science'){ ?>
					<tr>
						<th>Physics</th>
						<td><?php echo (isset($elective_subject_grade['physics']) ? ucwords($elective_subject_grade['physics']) : 'N/A'); ?>
						</td>
						<th>Chemistry</th>
						<td><?php echo (isset($elective_subject_grade['chemistry']) ? ucwords($elective_subject_grade['chemistry']) : "N/A"); ?>
						</td>
						<th>Higer Math</th>
						<td><?php echo (isset($elective_subject_grade['higer_math']) ? ucwords($elective_subject_grade['higer_math']) : "N/A") ; ?>
						</td>
					</tr>
					<tr>
						<th>Biology</th>
						<td><?php echo (isset($elective_subject_grade['biology']) ? ucwords($elective_subject_grade['biology']) : 'N/A'); ?>
						</td>
						<th>Physical Education</th>
						<td>
							<?php echo (isset($elective_subject_grade['physical_education']) ? $elective_subject_grade['physical_education'] : 'N/A'); ?>
						</td>
						<th></th>
						<td></td>
					</tr>
					<?php } ?>


					<?php if($student[0]->ssc_group=='Humanities'){ ?>
					<tr>
						<th>Soc./Gen.Science</th>
						<td><?php echo (isset($elective_subject_grade['gen_science']) ? ucwords($elective_subject_grade['gen_science']) : 'N/A'); ?>
						</td>
						<th>Religion</th>
						<td><?php echo (isset($elective_subject_grade['religion']) ? ucwords($elective_subject_grade['religion']) : "N/A"); ?>
						</td>
						<th>Geography</th>
						<td><?php echo (isset($elective_subject_grade['giography']) ? ucwords($elective_subject_grade['giography']) : "N/A") ; ?>
						</td>
					</tr>
					<tr>
						<th>History</th>
						<td><?php echo (isset($elective_subject_grade['history']) ? ucwords($elective_subject_grade['history']) : 'N/A'); ?>
						</td>
						<th>Civics</th>
						<td><?php echo (isset($elective_subject_grade['civics']) ? $elective_subject_grade['civics'] : 'N/A'); ?>
						</td>
						<th>Physical Education</th>
						<td><?php echo (isset($elective_subject_grade['physical_education']) ? $elective_subject_grade['physical_education'] : 'N/A'); ?>
						</td>
					</tr>
					<?php } ?>


					<?php if($student[0]->ssc_group=='Business_Studies'){ ?>
					<tr>
						<th>Business Intro./Entre</th>
						<td><?php echo (isset($elective_subject_grade['intro_to_business']) ? ucwords($elective_subject_grade['intro_to_business']) : 'N/A'); ?>
						</td>
						<th>Accounting</th>
						<td><?php echo (isset($elective_subject_grade['accounting']) ? ucwords($elective_subject_grade['accounting']) : "N/A"); ?>
						</td>
						<th>Management</th>
						<td><?php echo (isset($elective_subject_grade['management']) ? ucwords($elective_subject_grade['management']) : "N/A") ; ?>
						</td>
					</tr>
					<tr>
						<th>Finace & Banking</th>
						<td><?php echo (isset($elective_subject_grade['finace']) ? ucwords($elective_subject_grade['finace']) : 'N/A'); ?>
						</td>
						<th>Physical Education</th>
						<td><?php echo (isset($elective_subject_grade['physical_education']) ? $elective_subject_grade['physical_education'] : 'N/A'); ?>
						</td>
						<th></th>
						<td></td>
					</tr>
					<?php } ?>


					<tr>
						<th colspan="6" class="text-center">
							<small>Additional Subject</small>
						</th>
					</tr>


					<?php if($student[0]->ssc_group =='Science') { ?>

					<tr>
						<th>
							Higher Math
						</th>
						<td>
							<?php 
			                 echo (isset($additional_subject_grade['higer_math']) ? $additional_subject_grade['higer_math'] : 'N/A');
			              ?>
						</td>
						<th>
							Biology
						</th>
						<td>
							<?php echo (isset($additional_subject_grade['biology']) ? $additional_subject_grade['biology'] : 'N/A'); ?>
						</td>
						<th></th>
						<td></td>
					</tr>


					<?php } ?>


					<?php if($student[0]->ssc_group =='Business_Studies') { ?>

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


					<?php if($student[0]->ssc_group =='Humanities') { ?>

					<tr>
						<th>
							Higher Math
						</th>
						<td>
							<?php 
			                 echo (isset($additional_subject_grade['higer_math']) ? $additional_subject_grade['higer_math'] : 'N/A');
			              ?>
						</td>
						<th>
							Agriculture studys
						</th>
						<td>
							<?php echo (isset($additional_subject_grade['agriculture_studys']) ? $additional_subject_grade['agriculture_studys'] : 'N/A'); ?>
						</td>
						<th>ICT (Elective Subject) </th>
						<td><?php echo (isset($elective_subject_grade['ict']) ? $elective_subject_grade['ict'] : 'N/A'); ?>
						</td>
					</tr>
					<?php } ?>

				</table>
            */?>
				<table class="table table-bordered">
					<tr>
						<th colspan="4" class="text-center">
							GENERAL INFORMATION (STUDENT)
						</th>
					</tr>
					<tr>
						<th width="200">Date of Birth</th>
						<td><?php echo ucwords($student[0]->birth_date); ?></td>
						<th width="200">Nationality</th>
						<td><?php echo ucwords($student[0]->nationalitity); ?></td>
					</tr>
					<tr>
						<th width="200">Religion</th>
						<td><?php echo ucwords($student[0]->religion); ?></td>
						<th width="200">Blood Group</th>
						<td><?php echo ucwords($student[0]->blood_group); ?></td>
					</tr>
					<tr>
						<th width="200">District</th>
						<td><?php echo ucwords($student[0]->district); ?></td>
						<th width="200">Student'S Mobile</th>
						<td><?php echo ucwords($student[0]->student_phone); ?></td>
					</tr>
					<tr>
						<th width="200">Present Address</th>
						<td colspan="3"><?php echo ucwords($student[0]->present_address); ?></td>
					</tr>
					<tr>
						<th width="200">Permanent Address</th>
						<td colspan="3"><?php echo ucwords($student[0]->permanent_address); ?></td>
					</tr>
					<tr>
						<th width="200">Phone&nbsp;(Res)</th>
						<td colspan="3"><?php echo ucwords($student[0]->phone_res); ?></td>
						<!--<th width="200">Stay With</th>-->
						<!--<td><?php echo ucwords($student[0]->stay_with); ?></td>-->
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
						<td><?php echo ucwords($student[0]->father_info_name); ?></td>
						<th width="200">Name</th>
						<td><?php echo ucwords($student[0]->mother_info_name); ?></td>
					</tr>
					<tr>
						<th width="200">Occupation</th>
						<td><?php echo ucwords($student[0]->father_info_occupation); ?></td>
						<th width="200">Occupation</th>
						<td><?php echo (isset($student[0]->mother_info_occupation) ? ucwords($student[0]->mother_info_occupation) : ''); ?>
						</td>
					</tr>
					<?php /*
					<tr>
						<th width="200">Designation</th>
						<td><?php echo ucwords($student[0]->father_info_designation); ?></td>
						<th width="200">Designation</th>
						<td><?php echo (isset($student[0]->mother_info_designation) ? ucwords($student[0]->mother_info_designation) : ''); ?>
						</td>
					</tr>
					<tr>
						<th width="200">Workpalce Address</th>
						<td><?php echo ucwords($student[0]->father_info_institution); ?></td>
						<th width="200">Workpalce Address</th>
						<td><?php echo (isset($student[0]->mother_info_institution) ? ucwords($student[0]->mother_info_institution) : ''); ?>
						</td>
					</tr>
					<tr>
						<th width="200">Phone&nbsp;(Office)</th>
						<td><?php echo $student[0]->father_info_phone; ?></td>
						<th width="200">Phone&nbsp;(Office)</th>
						<td><?php echo (isset($student[0]->mother_info_phone) ? $student[0]->mother_info_phone : ''); ?>
						</td>
					</tr>
					<tr>
						<th width="200">Monthly Income of Parents (Tk)</th>
						<td colspan="3"><?php echo $student[0]->father_info_monthly_income.' '.'/-'; ?></td>
					</tr>
					<tr>
						<th width="200">Total Monthly Income of Family (Tk)</th>
						<td colspan="3"><?php echo $student[0]->father_info_total_monthly_income.' '.'/-'; ?></td>
					</tr>
					*/?>
				</table>

				<table class="table table-bordered">
					<tr>
						<th colspan="4" class="text-center">LOCAL GURDIAN</th>
					</tr>
					<tr>
						<th width="200">Name</th>
						<td><?php echo ucwords($student[0]->local_gurdian_name); ?></td>
						<th width="200">Relation</th>
						<td><?php echo ucwords($student[0]->local_gurdian_relation); ?></td>
					</tr>
					<tr>
						<th>Occupation</th>
						<td><?php echo ucwords($student[0]->local_gurdian_occupation); ?></td>
						<th>Designation</th>
						<td><?php echo ucwords($student[0]->local_gurdian_designation); ?></td>
					</tr>
					<tr>
						<th>Phone&nbsp;(Res)</th>
						<td><?php echo (isset($student[0]->local_gurdian_phone_res) ? $student[0]->local_gurdian_phone_res : ''); ?>
						</td>
						<?php /*
						<th>Phone&nbsp;(Office)</th>
						<td><?php echo (isset($student[0]->local_gurdian_phone_off) ? $student[0]->local_gurdian_phone_off : ''); ?>
						</td>
					</tr>
					<tr>
						<th>Workplace Address</th>
						<td><?php echo (isset($student[0]->local_gurdian_institution) ? $student[0]->local_gurdian_institution : ''); ?>
						</td>
						*/?>
						<th>Present Address</th>
						<td><?php echo (isset($student[0]->local_gurdian_address) ? $student[0]->local_gurdian_address : ''); ?>
						</td>
					</tr>
				</table>
                <?php /*
				<table class="table table-bordered">
					<tr>
						<th colspan="4" class="text-center">
							INFORMATION TO BE SENT TO
						</th>
					</tr>
					<tr>
						<th width="200">Name</th>
						<td><?php echo ucwords($student[0]->progress_report_name); ?></td>
						<th width="200">Relationship</th>
						<td><?php echo ucwords($student[0]->progress_report_relationship); ?></td>
					</tr>
					<tr>
						<th width="200">Address</th>
						<td><?php echo ucwords($student[0]->progress_report_address); ?></td>
						<th width="200">Phone&nbsp;(Res)</th>
						<td><?php echo ucwords($student[0]->progress_report_phone_res); ?></td>
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
				
				*/?>
				<table class="table table-bordered">
					<tr>
						<th colspan="4" class="text-center">
							SUBJECT YOU WISH TO STUDY AT BANGABANDHU GOVT COLLEGE MYMENSINGH
						</th>
					</tr>
					<tr>
						<th width="200">Group</th>
						</th>
						<td colspan="3"><?php echo ucwords($student[0]->group); ?></td>
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
			            <td><?php echo $student[0]->compulsory_subject_one; ?></td>
			            <td><?php echo $student[0]->compulsory_subject_two; ?></td>
			            <td><?php echo $student[0]->compulsory_subject_three; ?></td>
			            <td><?php echo $student[0]->compulsory_subject_four; ?></td>
			            <td><?php echo $student[0]->compulsory_subject_five; ?></td>
			            <td>
			             <?php 
			                 echo $student[0]->compulsory_subject_six;
			              ?>
			            </td>
			            <td><?php echo $student[0]->optional_subject; ?></td>
			        </tr>
			        <tr>
			            <th>Code</th>
			            <td><?php echo $student[0]->compulsory_code_one; ?></td>
			            <td><?php echo $student[0]->compulsory_code_two; ?></td>
			            <td><?php echo $student[0]->compulsory_code_three; ?></td>
			            <td><?php echo $student[0]->compulsory_code_four; ?></td>
			            <td><?php echo $student[0]->compulsory_code_five; ?></td>
			            <td>
			                <?php 
			                    echo $student[0]->compulsory_code_six;
			                ?>
			            </td>
			            <td ><?php echo $student[0]->optional_code; ?></td>
			        </tr>
			    </table>
				
			</div>

			<div class="panel-footer">&nbsp;</div>
		</div>
	</div>
</div>