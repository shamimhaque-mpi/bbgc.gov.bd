<style>
	.attendance tr th{
		text-align: center;
	}
	.attendance label{
		display: block;
	}
    .reg-publish td{
        padding: 0 !important;
        border:  1px solid #bcb9b9 !important;
    }
    .reg-publish td input[type="text"]{
        border: 1px solid transparent;
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
        <div class="panel panel-default none">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Search Result</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php echo $confirmation; ?>

                <?php
                $attribute = array("class" => "form-horizontal");
                echo form_open("", $attribute);
                ?>

                <div class="form-group">
                    <label class="col-md-2 control-label">Exam Name <span class="req">*</span></label>
                    <div class="col-md-5">
                        <select name="exam_id" class="form-control" required>
                            <option value="" selected> -- Select Exam Name -- </option>
                            <?php if(!empty($exam)){ foreach($exam as $row){ ?>
                            <option value="<?php echo $row->exam_id; ?>">
                                <?php echo $row->title; ?>
                            </option>
                            <?php }} ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Session <span class="req">*</span></label>
                    <div class="col-md-5">
                        <select name="year" class="form-control" required >
                            <option value="">-- Select Session --</option>

                            <?php for($i=2015; $i<=date("Y"); $i++){ $j = $i +1; ?>
                            	<option value="<?php echo $i; ?>"><?php echo $i."-".$j; ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Class <span class="req">*</span></label>
                    <div class="col-md-5">
                        <select name="class" class="form-control" required >
                            <option value="">-- Select Class --</option>
                            <?php foreach(config_item('classes') as $key => $value){ ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

				<div class="form-group">
					<label class="col-md-2 control-label">Section <span class="req">*</span></label>
					<div class="col-md-5">
						<select name="section" class="form-control" required >
							<option value="">-- Select Section --</option>
							<?php foreach(config_item('section') as $value){ ?>
							<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>

                <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" value="Show" name="show" class="btn btn-primary">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php if(!empty($students)){ ?>
        <div class="panel panel-default" ng-init="active=true">
        	<div class="panel-heading">
        		<div class="panal-header-title">
	                <h1 class="pull-left">Tabulation Sheet</h1>
	                <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
	            </div>
        	</div>

        	<div class="panel-body">
        	  <img style="width: 100%;" src="<?php echo site_url('public/banner/banner.png') ?>">

        	  <p class="text-center hide">
        	    Year : <?php echo $this->input->post("year")+1; ?><br/>
        	    Class : <?php echo $this->input->post("class"); ?><br/>
        	    Exam : <?php $ex_info = $this->action->read("exam",array("exam_id"=>$this->input->post("exam_id"))); if($ex_info != NULL) { echo $ex_info[0]->title;} ?><br/>
        	  </p>

                <table class="table table-bordered reg-publish">
                    <tr>
                        <th class="text-center">SL</th>
                        <th width="200" >Student Name</th>
                        <th width="60" class="text-center">Roll </th>
                        <th class="text-center">Subjective Marks</th>
                        <th width="60" class="text-center">GPA</th>
                        <th class="text-center">Grade</th>
                        <!--<th class="text-center">Position</th>-->
                    </tr>

                    <?php
                    function getGPA($marks = NULL){
                        if($marks >= 80){return 5;}
                        elseif($marks >= 70){return 4;}
                        elseif($marks >= 60){return 3.5;}
                        elseif($marks >= 50){return 3;}
                        elseif($marks >= 40){return 2;}
                        elseif($marks >= 33){return 1;}
                        else{return 0;}
                    }

                    function letter_grade($gpa = NULL){
				        if($gpa >= 5.00){return "A+";}
						elseif($gpa >= 4.00){return "A";}
						elseif($gpa >= 3.50){return "A-";}
						elseif($gpa >= 3.00){return "B";}
						elseif($gpa >= 2.00){return "C";}
						elseif($gpa >= 1.00){return "D";}
						else{return "F";}
                    }

		            $counter = 0; $stu_position = array();
		            //echo "<pre>"; print_r($students); echo "</pre>";
                    foreach($students as $key => $row){

                        $finalSubject = array();
				        $allMarks = $allPoints = $passPoints = array();
                    
				        $where = array("roll" => $row->roll, "class" => $row->class,"section"=> $_POST['section'],"year"=>$_POST['year']);

						$whereM = array(
                           "roll"   => $row->roll,
                           "class"  => $row->class,
                           "exam_id"=> $_POST['exam_id'],
                           "year"   => $this->input->post('year'),
                           "section"=> $_POST['section']
						);
						
						if($this->input->post("class") == "Twelve(BM)" || $this->input->post("class") == "Twelve"){
                            $whereM = array(
                                "roll"   => $row->roll,
                                "class"  => $row->class,
                                "exam_id"=> $_POST['exam_id'],
                                "year"   => $this->input->post('year')+1,
                                "section"=> $_POST['section']
                            );
                        }else {
                            $whereM = array(
                                "roll"   => $row->roll,
                                "class"  => $row->class,
                                "exam_id"=> $_POST['exam_id'],
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
						
						
							
                        //echo "<pre>"; print_r($allMarks); echo "</pre>";
                        foreach($allMarks as $key => $val){
							$allPoints[$key] = getGPA($val);
                        }
                        
						foreach ($allPoints as $key => $point) {
							if($point == 0.00){
								$gpa = 0.00;
								break;
							}else{
							    $gpa += $point;
							}
 						}
 						
 					
 						//echo $gpa.'<br>';
 						
 						// Only hide for this exam [05-Jan-2020] =>
        				/*if($_POST['class'] == "Eleven" || $_POST['class'] == "Twelve") { 
            				if(getGPA(($optTotalMarks/2)) > 2){
            					 $gpa += (getGPA(($optTotalMarks/2)) -2);
            				} 
        				}*/
                       
                        // calculate total gpa
                        //echo $gpa.'<br>';
                        
                        if(count($allMarks) > 0){
                            /*if(($gpa / count($allMarks)) > 5){
                                $gpa = "5.00";
                            } else {
                                $gpa = round($gpa / count($allMarks), 2);
                            }*/
                            
                            if(count($allMarks) < 6){
                                $gpa = 0.00;
                                //echo count($allMarks).'<br>';
                            }else{
                                //echo count($allMarks).'<br>';
                                $gpa = round($gpa / count($allMarks), 2);
                            }
                        }
                        
                        //echo $gpa.'<br>';
                       	/*** check either a student fails in a compulsory subject then his/her gpa 0.00 */
                        if($this->input->post('exam_id') == "1512477873"){
                          foreach($allPoints as $value){
                             if($value == 0.00){
                               $gpa = 0.00;
    							break;
                             }
                           }
                        }else{
                           foreach($passPoints as $value){
                             if($value == 0.00){
                               $gpa = 0.00;
    							break;
                             }
                           }
                        }

                        // get student name
                        $where = array(
                            "admission.roll"    => $row->roll,
                            "admission.class"   => $row->class,
                            "admission.section" => $this->input->post('section'),
                            "admission.year"    => $this->input->post('year')
                        );
                        
                        $details = array(
                            "admission" => array("condition" => "registration.reg_id=admission.student_id")
                        );
                        
                        $info = $this->action->multipleJoinAndRead("registration", $details, $where);
                        //echo "<pre>"; print_r($info); echo "</pre>";
                        if($info) {
                            $counter++;
                    ?>
                    <tr>
                       <td><input type="text" class="text-center form-control" readonly value="<?php echo $counter;?>"></td>
                       <td><input type="text" class="form-control" readonly value="<?php echo ($info) ? $info[0]->name : ''; ?>"></td>
                       <td><input type="text" class="text-center form-control" readonly value="<?php echo $row->roll; ?>"></td>

                       <td style="text-align:justify; font-size: 12px; padding: 6px 6px 2px 6px !important;">

                         <?php
                           //get all subjective marks
                           if($this->input->post("class") == "Twelve(BM)" || $this->input->post("class") == "Twelve"){
                                $where = array(
                                    "year"    => $this->input->post("year")+1,
                                    "exam_id" => $this->input->post("exam_id"),
                                    "class"   => $this->input->post("class"),
                                    "roll"    => $row->roll,
                                    "section" => $_POST['section']
                                );
                            }else {
                                  $where = array(
                                    "year"    => $this->input->post("year")+1,
                                    "exam_id" => $this->input->post("exam_id"),
                                    "class"   => $this->input->post("class"),
                                    "roll"    => $row->roll,
                                    "section" => $_POST['section']
                                );
                            }
                            $sub_mark="";

                            $marks =$this->retrieve->read("marks", $where);
                            foreach($marks as $key=>$value){
                                //if($value->objective >0 || $value->written >0 || $value->practical >0) {
                                if($value->objective >=0 || $value->written >=0 || $value->practical >=0) {
                                    $sub_mark .= $value->subject." = <strong>".$value->letter."</strong> &nbsp;&nbsp;";
                                }
                            }
                           echo $sub_mark;
                         ?>
                        </td>
                        <td><input type="text" class="text-center form-control" readonly value="<?php if($subjectStatus == 'all_exists'){ printf("%.2f", $gpa); }else{ echo '0.00';}; ?>"></td>
                        <td><input type="text" class="text-center form-control" readonly value="<?php echo ($subjectStatus == 'all_exists') ? letter_grade($gpa) : 'F'; ?>"></td>
                        <td class="hide" style="text-align:center;">
                       
                        <?php
            			  $total_marks = array();
            			  $total_gpa = array();
            
            			  $cond=array(
                            "class"   => $_POST['class'],
                            "year"    => $_POST['year']+1,
                            "exam_id" => $_POST['exam_id'],
                            "group"   => $info[0]->group,
                            "section" => $_POST['section']
            			  );

        				  	//print_r($cond);
        
        				  $where=array(
                           "class"      => $_POST['class'],
                           "YEAR(date)" => $_POST['year'],
                           "session"    => $_POST['year']."-".($_POST['year']+1),
                           "group"      => $info[0]->group,
                           "section"    => $_POST['section']
        				  );
        
        				  //print_r($where);
        
        				  $no_Student=$this->retrieve->read("admission",$where);
        				  $position=$this->retrieve->read("result",$cond,"desc");
        				  
        
        				//echo "<pre>"; print_r( $position); echo "</pre>";
        
            			$allGPA = $marksGPA = array();
            			foreach ($position as $key => $value) {
            				if($value->gpa > "0.00"){
            					$total_marks[$value->roll] = $value->total;
            					$total_gpa[$value->roll] = $value->gpa;					
            
            					$allGPA[] = $value->gpa;
            				}
            			}
        
            		     arsort($total_marks);
            		     arsort($total_gpa);  
 		   
            			$counts = array_count_values($allGPA);
            		      
            			$gpa = sprintf("%.2f",$gpa);
            			
            			
            			if($gpa > 0.00) {
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
            						
                    				if (array_key_exists($info[0]->roll, $total_marks)){
                    			      //$totalMarksN = $total_marks[$info[0]->roll];						  
                    			      //$pos = $finalStuPos[$totalMarksN] + 1;
                                    }else{
                                        //$pos = '';
                                    }
            						
            					} else {					
            						// 1st test the gpa
            					     	//$pos = (array_search($info[0]->roll, array_keys($total_gpa)) + 1);				     
            					     	
            					}
            				} else {
            				   //$pos = (array_search($info[0]->roll, array_keys($total_marks)) + 1);
            				}
            				//$stu_position[$info[0]->roll] = $pos;					
            				//echo "<strong>" . $pos . "</strong>"; 
            			   }
            			?>
                       </td>
                    </tr>
                  <?php } } /*  echo "<pre>"; print_r(array_count_values($stu_position)); echo "</pre>";  */  ?>
                </table>
                <div class="pull-right hide" style="width: 200px; margin: 35px 0px 0px; text-align: center; border-top: 1px solid #bfbaba;">
                    <strong>President</strong>
                </div>
	        </div>
           <div class="panel-footer">&nbsp;</div>
         </div>
      <?php } ?>
    </div>
</div>
