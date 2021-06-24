<!DOCTYPE html>
<html>
<head>
	<title><?php echo filter($site_name); ?> | <?php echo filter($meta_title);?></title>
	<style>
		.wrapper{
            margin    : 20px auto;
            width     : 100%;
            max-width : 750px;
            height    : auto;
            border    : 1px solid rgba(0,0,0,0.2);
		}
		.header{
			text-align : center;
			max-height : 94px;
		}
		.header img{
			margin : 0;
			width  : 100%;
			height : auto;
		}
		.body{
            padding       : 10px;
            width         : 100%;
            max-width     : 730px;
            height        : auto;
            border-top    : 1px solid rgba(0,0,0,0.2);
            border-bottom : 1px solid rgba(0,0,0,0.2);
            background    : #F4F4F4;
		}
		select,
		input[type="text"],input[type="number"]{
            border       : 1px solid rgba(0,0,0,0.3);
            height       : 20px;
            padding-left : 5px;
            font-size    : 12px;
            width        : 124px;
		}
		select{
			height : 25px;
		}
		input[type="submit"]{
            width       : 80px;
            text-align  : center;
            border      : 1px solid rgba(0,0,0,0.3);
            background  : rgba(0,0,0,0.1);
            line-height : 22px;
		}
		input[type="submit"] : hover{
			cursor : pointer;
		}
		table, tr, th, td{
            font-size       : 12px;
            margin-top      : 3px;
            border          : 1px solid rgba(0,0,0,0.2);
            border-collapse : collapse;
            padding         : 5px;
		}
		.body a{
            color           : #000;
            border          : 1px solid rgba(0, 0, 0, 0.3);
            padding         : 0 20px;
            font-size       : 18px;
            background      : rgba(0, 0, 0, 0.1) none repeat scroll 0% 0%;
            text-decoration : none;
		}
		.footer{
            padding    : 10px;
            width      : 100%;
            max-width  : 730px;
            height     : auto;
            background : #F4F4F4;
            text-align : center;
		}
		.footer a{
            text-decoration : none;
            color           : #000;
            font-weight     : bold;
		}

		@media print{
			select,
			input[type="text"],
			input[type="submit"],
			a.print,
			legend{
				display: none;
			}
			.body{width:98%;}
			.footer{width:98%; margin-top: -20px;}
			table.new_remarks{border-bottom:2px solid rgba(0,0,0,0.2);}
			.none{display: none;}
			h3.new_name{margin: 0;}
		}

		/* NEW STYLE */
		h3.new_name{
            text-align    : center;
            margin-bottom : 0;
            margin-top    : 5px;
		}
		p.new_exam{
            text-align    : center;
            margin-top    : 0;
            margin-bottom : 0px;
		}
		.new_table_bottom tr,
		.new_table_bottom tr th,
		.new_table_bottom tr td{border:1px solid transparent;}
		.new_table_bottom tr th:nth-child(odd){ border-top : 2px solid rgba(0,0,0,0.2); }
		.marks-table tr, th, td{
		}
	</style>
</head>

<body>
	<?php
	$stat = $status[0]->is_publish;
	$uname = $this->session->userdata('username');
	$name= $this->session->userdata('name');
	$loggedin = $this->session->userdata('loggedin');

	if($uname != null && $name != null && $loggedin == 1 || $stat=="publish"){
	?>
	<div class="wrapper">
		<div class="header">
			<img class="img-responsive" src="<?php echo site_url($banner[0]->path);?>" alt="Uploaded banner not found!" />
		</div>

		<div class="body">

		 <?php
		 	$attr = array(
		 		'class' => 'none'
		 	);
		    echo form_open("", $attr);?>

		    <select name="year" required>
				<option value="">-- Select Session --</option>
				<?php
				  for($i=2015; $i<=date("Y"); $i++){
				  $j = $i+1;
				  $sess = $i."-".$j;
				 ?>
				  <option value="<?php echo $i; ?>"><?php echo $sess;?></option>
				<?php } ?>
			</select>

		    <select name="class" required>
				<option value="">-- Select Class --</option>
				<?php foreach (config_item('classes') as $key => $value) { ?>
				  <option value="<?php echo $key;?>" ><?php echo $value;?></option>
				<?php } ?>
			</select>

			<select name="section" required>
				<option value="">-- Select Section --</option>
				<?php foreach (config_item('section') as $value) { ?>
				  <option value="<?php echo $value; ?>" ><?php echo $value;?></option>
				<?php } ?>
			</select>

			<input type="text" name="roll" placeholder="Student's Roll" required/>

		    <select name="exam" required>
				<option value="">-- Select Exam--</option>
				<?php foreach ($exam as $key => $value) { ?>
				  <option value="<?php echo $value->exam_id;?>"><?php echo $value->title;?></option>
				<?php } ?>
			</select>

			<input type="submit" name="submit"  class="button" value="Show" />
		<?php echo form_close();?>

		<?php if($result != NULL){ ?>
			<!--<pre><?php //print_r($result); ?></pre>-->
			<!--<pre><?php //print_r($student); ?></pre>-->
			<!--pre><?php  //print_r($students); ?></pre-->
			<div>
				<h3 class="new_name">ACADEMIC TRANSCRIPT</h3>
				<p class="new_exam">
				    <?php
					     $cond=array("exam_id"=>$result[0]->exam_id);
					     $exam_name=$this->retrieve->read("exam",$cond);
					     echo $exam_name[0]->title;
					    //echo $exam_name[0]->title."-".$result[0]->year;
				     ?>
				</p>



  				<table style="width:100%;">
  				<?php $student_info=$this->retrieve->read("registration",array('reg_id'=>$student[0]->student_id)); ?>
  				<!--<pre><?php //print_r($student_info);?></pre>-->
 				<tr>
 					<td style="width:60%;border:1px solid transparent;padding-left:0px;">
 						<table width="100%" cellspacing="1" cellpadding="0">

					         <tr>
					          <td width="25%" align="right" class="title3">Student's ID</td>
					          <td width="25%" align="left" class="title3" colspan="2"><b><?php echo $student_info[0]->id;?></b></td>
					          <td width="25%" align="center" class="title3" rowspan="4"><img style="width:100px; height:100px;" src="<?php echo site_url($student_info[0]->photo);?>"></td>
					        </tr>

					        <tr>
					          <td width="25%" align="right" class="title3">Class Roll</td>
					          <td width="25%" align="left" class="title3" colspan="2"><?php echo $student[0]->roll;?></td>
					        </tr>
					        <tr>
					          <td width="25%" align="right" class="title3">Name</td>
					          <td width="25%" align="left" class="title3" colspan="2"><?php echo $student_info[0]->name;?></td>
					        </tr>
					        <tr>
					          <td width="25%" align="right" class="title3">Class</td>
					          <td width="25%" align="left" class="title3" colspan="2"><b><?php echo $student[0]->class;?></b></td>
					        </tr>
					        <tr>
					          <td width="25%" align="right" class="title3">Group</td>
					          <td width="25%" align="left" class="title3" colspan="3"><?php echo $student[0]->group;?></td>
					        </tr>
					        <tr>
					          <td width="25%" align="right" class="title3">Section</td>
					          <td width="25%" align="left" class="title3"><?php echo $student[0]->section;?></td>
					          <td width="25%" align="right" class="title3">Shift</td>
					          <td width="25%" align="left" class="title3"><?php echo $student[0]->shift;?></td>
					        </tr>
					        <tr>
					          <td width="25%" align="right" class="title3">Session</td>
					          <td width="25%" align="left" class="title3"><?php echo $student[0]->session;?></td>
					          <td width="25%" align="right" class="title3">Version</td>
					          <td width="25%" align="left" class="title3"><b><?php echo $student[0]->version;?></b></td>
					        </tr>
					        <tr>
					          <td width="25%" align="right" class="title3">Batch</td>
					          <td width="25%" align="left" class="title3" colspan="3"><?php echo ucwords(str_replace("_"," ",$student[0]->batch));?></td>
					        </tr>
					    </table>

 					</td>
 					<td style="width:40%;border:1px solid transparent;">
 						<table class="marks-table" width="100%"  cellspacing="1" cellpadding="0">
					         <tr>
					          <td width="34%" align="center" class="title3"><b>LG</b></td>
					          <td width="33%" align="center" class="title3"><b>Marks</b></td>
					          <td width="33%" align="center" class="title3"><b>GP</b></td>
					        </tr>
					        <tr>
					         <td align="center">A+</td>
					          <td align="center">80-100</td>
					          <td align="center">5</td>
					        </tr>
					        <tr>
					          <td align="center">A</td>
					          <td align="center">70-79</td>
					          <td align="center">4</td>
					        </tr>
					        <tr>
					          <td align="center">A-</td>
					          <td align="center">60-69</td>
					          <td align="center">3.5</td>
					        </tr>
					        <tr>
					          <td align="center">B</td>
					          <td align="center">50-59</td>
					          <td align="center">3</td>
					        </tr>
					        <tr>
					          <td align="center">C</td>
					          <td align="center">40-49</td>
					          <td align="center">2</td>
					        </tr>
					        <tr>
					          <td align="center">D</td>
					          <td align="center">33-39</td>
					          <td align="center">1</td>
					        </tr>
					        <tr>
					          <td align="center">F</td>
					          <td align="center">0-32</td>
					          <td align="center">0</td>
					        </tr>
					    </table>
 					</td>
 				</tr>
 				</table>
 				
 				<?php if($_POST['class'] ==  'Eleven' || $_POST['class'] == "Twelve") { ?>

 				<!--<table class="table" style="width: 100%;margin: 4px 0px 10px;">
					<tr>
						<td align="center">Attandance</td>
						<td align="center">1 to 5</td>
						<td align="center">Monthly</td>
						<td align="center">20% of 30 </td>
						<td align="center">6</td>
						<td align="center">Semester </td>
						<td align="center">89% of 100</td>
						<td align="center">89</td>
					</tr>
				</table>-->
				<?php } ?>

			<table style="width: 100%;margin-bottom: 8px;">
				 <tr class="app_tr">
						<th><p>Code</p></th>
						<th style="width:25%;"><p>Subjects</p></th>
						<th><p>Full Marks</p></th>
						<!--<th><p>AT</p></th>
						<th><p>Monthly</p></th>-->
						<th><p>MCQ</p></th>
						<th><p>CQ</p></th>
						<th><p>PRAC</p></th>
						<th><p>Total Marks</p></th>
						<th><p>Highest Marks</p></th>
						<th><p>Letter Grade</p></th>
						<th><p>Grade Point</p></th>
					</tr>

				<?php
				$totalMarks=0;
				$final_total_gpa=0;

    			function getGPA($marks){
                    if($marks >= 80){return 5;} elseif($marks >= 70){return 4;}
                    elseif($marks >= 60){return 3.5;} elseif($marks >= 50){return 3;}
                    elseif($marks >= 40){return 2;} elseif($marks >= 33){return 1;}
                    else{return 0;}
                }
    
                function getLetterGrade($gpa){
                  if($gpa >=5){return "A+";} elseif($gpa >=4){return "A";}
                  elseif($gpa >= 3.5){return "A-";} elseif($gpa >=3){return "B";}
                  elseif($gpa >=2){return "C";} elseif($gpa >= 1){return "D";}
                  else{return "F";}
                }
    
                function getComment($gpa){
                    if($gpa >=5){
                    	return "Excellents";
                    }elseif($gpa >=3.5 && $gpa<5){
                 	    return "Good";
                    }elseif($gpa >= 2 && $gpa<3.5){
                  	    return "Satisfied";
                    }else{
                  	    return "Bad";
                    }
                }


				  // <!--GPA Calculation Start-->

				foreach($students as $key => $row){
				      $finalSubject = array();
				      $allMarks = $allPoints = $passPoints = array();
                    
				      $where = array("roll" => $row->roll, "class" => $row->class,"section"=> $_POST['section'],"year"=>$_POST['year']);

						$whereM = array(
                           "roll"   => $row->roll,
                           "class"  => $row->class,
                           "exam_id"=> $_POST['exam'],
                           "year"   => $this->input->post('year'),
                           "section"=> $_POST['section']
						);
						
						if($this->input->post("class") == "Twelve(BM)" || $this->input->post("class") == "Twelve"){
                            $whereM = array(
                                "roll"   => $row->roll,
                                "class"  => $row->class,
                                "exam_id"=> $_POST['exam'],
                                "year"   => $this->input->post('year')+1,
                                "section"=> $_POST['section']
                            );
                        }else {
                            $whereM = array(
                                "roll"   => $row->roll,
                                "class"  => $row->class,
                                "exam_id"=> $_POST['exam'],
                                "year"   => $this->input->post('year')+1,
                                "section"=> $_POST['section']
                            );
                        }

				        $total = $gpa = $finalTotalGP = 0;
				        $marks = $this->retrieve->read("marks", $whereM);

				        // get optional
				        $optional = $this->retrieve->read("admission", $where);
				        $optionalSub = ($optional) ? $optional[0]->optional : '';

				        // get subject
				        $subjects = $this->retrieve->read("subject", array("class" => $row->class));

					    //echo "<pre>"; print_r($marks); echo "</pre>";
                        $optTotalMarks = 0.00;
                        $subjectStatus = '';
                        $fail = '';
						foreach($marks as $key => $val){
						    if(count($marks) >= 6){
						        $subjectStatus = 'all_exists';
                            }else{
                                $subjectStatus = 'not_exists';
                            }
						    if($val->objective >= 0 || $val->written >= 0 || $val->practical >= 0) {
								$subInfo = $this->action->read("subject",array("class" => $_POST['class'],"subject_name" => $val->subject));
								$totalSubMarks = ($subInfo) ? $subInfo[0]->objective + $subInfo[0]->written + $subInfo[0]->practical : 0.00;
								$total += $val->total;
								
								
                                if($val->letter != "F"){
								    //$totalValue = ($totalSubMarks <= 50) ? $val->total*2 : $val->total;
								    
								    // Only for BBGC =>
								    if($totalSubMarks == 60){
								        $temp = (($val->total * 100) / $totalSubMarks);
								        $totalValue = ($totalSubMarks <= 30) ? $temp*2 : $temp;
								    }elseif($totalSubMarks == 45){
								        $temp = (($val->total * 100) / $totalSubMarks);
								        $totalValue = ($totalSubMarks <= 22.5) ? $temp*2 : $temp;
								    }elseif($totalSubMarks == 30){
								        $temp = (($val->total * 100) / $totalSubMarks);
								        $totalValue = ($totalSubMarks <= 15) ? $temp*2 : $temp;
								    }else{
								        $temp = (($val->total * 100) / $totalSubMarks);
								        $totalValue = ($totalSubMarks <= 50) ? $temp*2 : $temp;
								    }
                                }else{
                                    $totalValue = 0.00;
                                }
								
								if($optionalSub == $val->subject_name){
								    $optTotalMarks += 	$totalValue;
								    
									if(getGPA($totalValue) > 2 && $val->letter != "F"){
									    $gpa += (getGPA($totalValue) - 2);
									}
								} else {
								    if($val->letter == 'F'){
								        $fail = 'yes';
								    }
								    //echo $val->subject_name.'<br>';
								    //print_r($finalSubject);
									if(in_array($val->subject_name, $finalSubject)){
										$allMarks[$val->subject_name] = ($allMarks[$val->subject_name] + $totalValue) / 2;
									} else {
									    //echo $totalValue.'<br>';
                                        $finalSubject[]                 = $val->subject_name;
                                        $passPoints[$val->subject_name] = $val->point;
                                        $allMarks[$val->subject_name]   = $totalValue;
									}
								}
						    }
						}
						
						/*
						 ** calculate total point
						*/
						//echo "<pre>"; print_r($allMarks);    echo "</pre>";
						foreach($allMarks as $key => $val){
							$allPoints[$key] = getGPA($val);
						}
						
						
						
					/*
					 ** check either a student fails in a compulsory subject
					*/
					foreach ($allPoints as $point) {
						if($point == 0.00){
							$gpa = 0.00;
							break;
						}else{
						    $gpa += $point;
						}
					}
					
    				
					// Only hide for this exam [05-Jan-2020] =>
					/*if($_POST['class'] == "Eleven" || $_POST['class'] == "Twelve") { 
        				if(getGPA(($optTotalMarks/2)) > 2){
        					 $gpa += (getGPA(($optTotalMarks/2)) -2);
        				} 
    				}*/
					$finalTotalGP = $gpa;
                    
                    //echo count($allMarks);
					// calculate total gpa
					if(count($allMarks) > 0){
    					/*if(($gpa / count($allMarks)) > 5){
    						$gpa = "5.00";
    					} else {
    						$gpa = round($gpa / count($allMarks), 2);
    					}*/
    					//print_r($allMarks);
    					if(count($allMarks) < 6){
                            $gpa = 0.00;
                            //echo count($allMarks).'<br>';
                        }else{
                            //echo count($allMarks).'<br>';
                            $gpa = round($gpa / count($allMarks), 2);
                        }
					}else{
    					$gpa = round($gpa / 1, 2);
					}
					
					/*
					 ** check either a student fails in a compulsory subject then his/her gpa 0.00
					*/
					$flag = 1;
				    foreach($passPoints as $value){
					 if($value == 0.00){
						 $gpa = 0.00;
						 $flag = 0;
						 break;
					 }
				 }
			 }
			 
		        //<!--GPA Calculation Start-->
		
	        	//echo "<pre>"; print_r($result);    echo "</pre>";


					foreach ($result as $key => $value) {

						$totalMarks+=$value->total;

				     	//Highest Marks
						$whereH = array(
                            "year"    => $value->year,
                            "exam_id" => $value->exam_id,
                            "class"   => $value->class,
                            "section" => $value->section,
                            "subject" => $value->subject
						);
						
						// echo "<pre>"; print_r($whereH); echo "</pre>";
						$highest_mark=$this->retrieve->readMax("marks","total", $whereH);
	                    //echo "<pre>";print_r($highest_mark); echo "</pre>";

							 $subject=explode(" ",$value->subject);
							 //echo "<pre>";print_r($subject); echo "</pre>";

                            $subjectName =  $value->subject_name;

							if(count($subject) == 2){
									if($subject[1] == "1st"){
												$subjectName =  $value->subject_name ." "."1st";
										}elseif($subject[1] == "2nd"){
												$subjectName =  $value->subject_name ." "."2nd";
												}
								}else if(count($subject) == 3){
									if($subject[2] == "1st"){
											$subjectName =  $value->subject_name ." "."1st";
									}elseif($subject[2] == "2nd"){
											$subjectName =  $value->subject_name ." "."2nd";
									}

								}else if(count($subject) == 4){
									if($subject[3] == "1st"){
											$subjectName =  $value->subject_name ." "."1st";
									}elseif($subject[3] == "2nd"){
											$subjectName =  $value->subject_name ." "."2nd";
									}

								}else if(count($subject) == 5){
									if($subject[4] == "1st"){
											$subjectName =  $value->subject_name ." "."1st";
									}elseif($subject[4] == "2nd"){
											$subjectName =  $value->subject_name ." "."2nd";
									}

								}else if(count($subject) == 6){
									if($subject[5] == "1st"){
											$subjectName =  $value->subject_name ." "."1st";
									}elseif($subject[5] == "2nd"){
											$subjectName =  $value->subject_name ." "."2nd";
									}

								}


								if(in_array('1st', $subject) or in_array('2nd', $subject)){
										 $where=array("class"=>$value->class,"subject_name"=>$subjectName);
									 }else{
										 $where=array("class"=>$value->class,"subject"=>$subjectName);
									 }
									 // echo "<pre>";print_r($where); echo "</pre>";

								if(in_array('1st', $subject) or in_array('2nd', $subject)){
								    $where=array("class"=>$value->class,"subject_name"=>$subjectName);
								  }else{
								    $where=array("class"=>$value->class,"subject"=>$subjectName);
								  }

								 // echo "<pre>";print_r($where); echo "</pre>";

									$full_marks=$this->retrieve->read("subject",$where);

									//echo "<pre>";print_r($full_marks); echo "</pre>";
									
									$written  = ($full_marks) ? $full_marks[0]->written : 0.00;
									$objective = ($full_marks) ? $full_marks[0]->objective: 0.00;
									$practical = ($full_marks) ? $full_marks[0]->practical: 0.00;
									

							 if($value->objective >= 0 || $value->written >= 0 || $value->practical >= 0) {
							 if(in_array('1st', $subject) or in_array('2nd', $subject)){ ?>
						   <tr>
								<td align="right"><?php echo $value->subject_code;?></td>
						 		<td style="font-size: 11px;"><?php echo $value->subject;?> Paper</td>
						 		<td align="center"><b><?php echo $written + $objective + $practical;?></b></td>
								<!--<td align="center"><?php echo $value->at;?></td>
								<td align="center"><?php echo $value->mt;?></td>-->
								<td align="center"><?php echo $value->objective;?></td>
								<td align="center"><?php echo $value->written;?></td>
								<td align="center"><?php echo $value->practical;?></td>
								<td align="center"><b><?php echo $value->total;?></b></td>
								<td align="center"><?php echo $highest_mark[0]->highest_marks; ?></td>
								<td align="center"><?php echo $value->letter;?></td>
								<td align="center" rowspan="1"><b><?php echo $value->point;?></b></td>
							</tr>
							<?php }else{ ?>
								 <tr>
									<td align="right"><?php echo $value->subject_code;?></td>
							 		<td><?php echo $value->subject;?></td></td>
							 		<td align="center"><b><?php echo $written + $objective + $practical;?></b></td>
									<!--<td align="center"><?php echo $value->at;?></td>
									<td align="center"><?php echo $value->mt;?></td>-->
									<td align="center"><?php echo $value->objective;?></td>
								    <td align="center"><?php echo $value->written;?></td>
								    <td align="center"><?php echo $value->practical;?></td>
									<td align="center"><b><?php echo $value->total;?></b></td>
									<td align="center"><?php echo $highest_mark[0]->highest_marks; ?></td>
									<td align="center"><?php echo $value->letter;?></td>
									<td align="center"><b><?php echo $value->point;?></b></td>
						      </tr>
							<?php } } } ?>
							<tr>
				                <td colspan="6"><b> (Add 4th subject GP above 2)</b></td>
				                <td align="center"><b><?php printf("%.2f", $totalMarks);?></b></td>
				                <td colspan="2"></td>
				                <td align="center"><b><?php if($fail != 'yes'){ printf("%.2f", $finalTotalGP); }else{ echo '0.00'; } ?></b></td>
							</tr>
					    </table>
					    
					   

	<table style="width: 100%;margin-bottom: 8px;">
		<tr>
			<th align="left">GPA</th>
			<th><?php if($subjectStatus == 'all_exists'){ printf("%.2f", $gpa); }else{ echo '0.00';} ?></th>
			<!--<th align="left" colspan="2" style="text-align:center;">Position in Merit List</th>-->
		</tr>
		<tr>
			<td width="16.66%">Letter Grade</td>
			<td width="16.66%" align="center"><b><?php echo ($subjectStatus == 'all_exists') ? getLetterGrade($gpa) : 'F'; ?></b></td>
			<!--<td width="31%" align="center" rowspan="2" colspan="2">
			  <?php
				  $total_marks = array();
				  $total_gpa = array();

				  $cond=array(
				  	  "class"=>$student[0]->class,
				  	  "year"=>$result[0]->year,
				  	  "exam_id"=>$result[0]->exam_id,
				  	  "group"=>$student_info[0]->group,
				  	   "section" => $_POST['section'],
				  	   "roll" => $student[0]->roll
				  	);

				// print_r($cond);

				  $where=array(
				  	"class"=>$student[0]->class,
				  	"session" => $result[0]->year."-".$result[0]->year+1, // "YEAR(date)"=>$result[0]->year,
				  	"session"=>$result[0]->year."-".($result[0]->year+1),
				  	 "group"=>$student_info[0]->group,
				  	 "section" => $_POST['section']
				  );

				  //print_r($where);

				  $no_Student=$this->retrieve->read("admission",$where);
				  //echo count($no_Student);
				  $position=$this->retrieve->read("result",$cond,"desc");



				//echo "<pre>"; print_r( $position); echo "</pre>";

			$allGPA = array();
			foreach ($position as $key => $value) {
				if($value->gpa > 0.00){
					$total_marks[$value->roll] = $value->total;
					$total_gpa[$value->roll] = $value->gpa;

					$allGPA[] = $value->gpa;
				}
				echo $value->rank;
			}

		    arsort($total_marks);
		    arsort($total_gpa);

			 //echo "<pre>"; print_r($total_marks); echo "</pre>";
			//echo "<pre>"; print_r($total_gpa); echo "</pre>";
			//echo "<pre>"; print_r($allGPA); echo "</pre>";

			$counts = array_count_values($allGPA);
			//echo "<pre>"; print_r($counts); echo "</pre>";
			 
			$gpa = sprintf("%.2f", $gpa);

			if($flag == 1) {
				if(array_key_exists((string)$gpa,$counts)){
					if($counts[(string)$gpa] > 1) {
						// 2nd test the marks									
						$student_temp_pos = $total_marks_array = $finalStuPos = array();
						
						foreach($total_gpa as $sroll => $sgpa){
						    if($gpa == $sgpa){ 
						          $temp_pos                 = (array_search($sroll, array_keys($total_gpa)));						
						          $student_temp_pos[]       = $temp_pos;						  
						          $total_marks_array[]      = $total_marks[$sroll];			  
						    }  
						 }					
											
						    rsort($total_marks_array);					  
						
        					foreach($total_marks_array as $sl => $mark){
        					    $finalStuPos[$mark] = $student_temp_pos[$sl];
        					}
                            //echo "<pre>";  print_r($total_marks_array); echo "</pre>";
						  
					      //$totalMarksN = $total_marks[$_GET['roll']];						  
					      //$pos = $finalStuPos[$totalMarksN] + 1;
					      
					    if (array_key_exists($_POST['roll'],$total_marks)){
        			      //$totalMarksN = $total_marks[$_POST['roll']];						  
        			      //$pos = $finalStuPos[$totalMarksN] + 1;
                        }else{
                            $pos = '';
                        }
					} else {
						// 1st test the gpa
						//$pos = (array_search($student[0]->roll, array_keys($total_gpa)) + 1);
					}
				}	else{
					//$pos = (array_search($student[0]->roll, array_keys($total_marks)) + 1);
				}


				// echo $pos; ?> out of <?php echo count($no_Student); 
				//if($student_info[0]->group != "None"){ echo "in " . $student_info[0]->group . "&nbsp;Group."; }
			}
			?>

			</td>-->
			<?php /* echo "<pre>";print_r($total_marks); echo "</pre>"; */ ?>
			<?php /* echo "<pre>";print_r($position); echo "</pre>"; */ ?>
			<!--td width="16.66%">Working Day</td>
			<td width="16.66%"></td-->
		</tr>
		<tr>
			<td width="16.66%">Total Marks</td>
			<td width="16.66%" align="center"><b><?php printf("%.2f", $totalMarks);?></b></td>
			<!--td width="16.66%">Present</td>
			<td width="16.66%"></td-->
		</tr>
	</table>

	<!--table class="new_remarks" style="width: 100%;margin-bottom: 8px;">
		<tr>
			<td><b>Remarks : </b><?php echo getComment($gpa);?></td>
		</tr>
	</table-->

	<table class="new_table_bottom" style="width: 100%; margin-bottom: 8px;">
		<tr><td colspan="7">&nbsp</td></tr>
		<tr><td colspan="7">&nbsp</td></tr>
		<tr>
			<th width="16%">Guide Teacher</th>
			<th width="3.75%"></th>
			<th width="16%">Parents/Guardian</th>
			<th width="3.75%"></th>
			<th width="16%">Exam Committee</th>
			<th width="3.75%"></th>
			<th width="16%">Principal</th>
		</tr>
	</table>
	  	<p style="margin:20px 0 9px 0;">
	  	  <?php  $result_publish_date=$this->retrieve->read("result",array('exam_id'=>$result[0]->exam_id)); ?>
	  		Date of publication of result: <?php if($result_publish_date != NULL){ echo date( 'd F, Y',strtotime($result_publish_date[0]->date)); }else{echo "5th October,2017";} ?>
	  	</p>
		<a href="" class="print" onclick="window.print()">Print</a>

		<?php
		$year = $this->input->post('year');
		$class = $this->input->post('class');
		$roll = $this->input->post('roll');
		$exam = $this->input->post('exam');
		?>
		<a href="<?php echo site_url('home/pdf?year='.$year.'&class='.$class.'&roll='.$roll.'&exam='.$exam); ?>" class="print" target="_blank">Download</a>

	  </div>

	  <?php } ?>
	</div>
		<div class="footer">
			Software by <a target="_blank" href="http://www.freelanceitlab.com">Freelance IT Lab</a>, Mymensingh.
		</div>
	</div>
	<?php }else{ ?>
		<div style="width: 800px; margin: 0 auto;" >
			<img style="width: 100%" src="<?php echo site_url($banner[0]->path);?>"/>
			<br/><br/>		<br/>
		<h1 style="text-align: center;"><?php echo $status[0]->message; ?></h1>
		</div>

	<?php } ?>
</body>
</html>
