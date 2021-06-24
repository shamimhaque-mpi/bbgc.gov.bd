<!-- file upload -->
<!-- Bootstrap Date Picker -->
<!-- includ moment for bootstrap calander -->
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo site_url('public/js/bootstrap.js'); ?>"></script>

<!-- Bootstrap file upload CSS -->
<link href="<?php echo site_url('private/plugins/bootstrap-fileinput-master/css/fileinput.min.css'); ?>" rel="stylesheet">
<!-- Select Option 2 Stylesheet -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
  
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    
<div class="col-md-12">
   <div class="row">
      <style>
         .req{color: red;}
         .table > tbody > tr > td{padding: 0;vertical-align: middle;}
         .table > tbody > tr > td{padding: 0;}
         .table > tbody > tr > td input, .table > tbody > tr > td select{height: 35px !important;border: none !important;}
         .table-custome > tbody > tr > td input{width: 50%;}
         .panal-header-title h4{margin: 0;}
         .table > tbody > tr > th {background: #15749c;color: #fff;}
         .alert button{padding: 35px 20px;}
         .form-control{border-radius:0;}
         .color-size {
             color: #15749c;
             font-size: 20px;
         }
         .color {
             color: #15749c;
         }
      </style>
      <?php echo $this->session->flashdata('conmirmation'); ?>
      <?php echo $this->session->flashdata('error'); ?>
      <div class="panel panel-default">
         <div class="panel-heading">
            <div class="panal-header-title text-center text-uppercase">
               <h4>Admission Form -  <?php echo date('Y'); ?> <a href="<?php echo site_url('access/subscriber/logout'); ?>" class="btn btn-info" style="width: 10%; float:right; text-transform: capitalize; margin-top:-7px;" class="text-right">Logout</a></h4>
            </div>
         </div>
         <div class="panel-body">
            <div class="" ng-controller="registrationCtrl">
                <?php
                    $attr=array('class'=>'form-horizontal');
                    echo form_open_multipart('online_registration/online_registration', $attr);
                ?>
                
               <h5><strong class="color-size">Form to be Filled up in BLOCK LETTERS (in English)</strong></h5>
               <div class="text-right">
                   <?php 
                        $get_student_photo = $this->retrieve->read('student_id_password', array('student_id'=> $this->session->userdata['student_id']));
                   ?>
                   <img style="width: 20%;" src="<?php echo site_url($get_student_photo[0]->photo); ?>">
               </div>
               <div class="form-group">
                  <div class="col-md-6">
                     <label style="padding-top: 0;" class="control-label"> Name of Student (in English) <!--as your SSC Exam Admit Card--></small><span class="req">*</span></label>
                     <input type="text" name="name_english" class="form-control"  required >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Name of Student (বাংলায়)</label>
                     <input type="text" name="name_bangla" class="form-control" >
                     <input type="hidden" name="college_id" value="<?php echo $get_student_photo[0]->student_id; ?>" class="form-control">
                  </div>
                  <!--<div class="col-sm-6 mb15">-->
                  <!--   <label class="control-label">Nickname</label>-->
                  <!--   <input type="text" name="nickname" class="form-control">-->
                  <!--</div>-->
               </div>
               
               <?php /*
               <h5><strong class="color-size">SSC RECORD</strong></h5>
               
               <div class="form-group">
                   
                  <div class="col-sm-6 mb15">
                     <label class="control-label">SSC GROUP <span class="req">*</span></label>
                     <select name="ssc_group" ng-model="groupSelect" class="form-control" required >
                        <option value="">--Group Select--</option>
                        <?php foreach(config_item('group') as $key => $value) {?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php }?>
                     </select>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">School Name<span class="req">*</span></label>
                     <input type="text" name="ssc_record_school_name" class="form-control" required >
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-6 mb15">
                     <label class="control-label">School Address <span class="req">*</span></label>
                     <input type="text" name="ssc_record_school_address" class="form-control" required >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">District<span class="req">*</span></label>
                     <select name="ssc_record_district" class="selectpicker form-control" 
                     data-show-subtext="true" data-live-search="true" required>
                         <option value="" disabled selected >--selcet district--</option>
                         <?php foreach(config_item('district') as $key => $value) {?>
                            <option value="<?php echo $value;?>"><?php echo $value; ?></option>
                         <?php }?>
                     </select>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Board<span class="req">*</span></label>
                     <select name="ssc_record_board"  class="form-control" required >
                        <option value="">--Group Select--</option>
                        <?php foreach(config_item('board') as $key => $value) {?>
                            <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                        <?php }?>
                     </select>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Center<span class="req">*</span></label>
                     <input type="text" name="ssc_record_center" class="form-control" required >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">SSC Roll No<span class="req">*</span></label>
                     <input type="hidden" name="college_id" value="<?php echo $get_student_photo[0]->student_id; ?>" class="form-control">
                     <input type="text" name="roll_no"  class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Exam Year<span class="req">*</span></label>
                     <select name="exam_year"  class="form-control" required >
                        <option value="">--Select Year--</option>
                        <?php  
                            for ($year = 2017; $year <= date('Y'); $year++) { ?>
                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                        <?php }?>
                     </select>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Registration No<span class="req">*</span></label>
                     <input type="text" name="reg_no" class="form-control" >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Registration Year/Session<span class="req">*</span></label>
                     <select name="ssc_session"  class="form-control" required >
                        <option value="">--Select Year/Session--</option>
                        <?php for($i=date("Y")-3; $i<=date("Y"); $i++){?>
                            <option value="<?php echo $i."-".($i+1); ?>"><?php echo $i."-".($i+1); ?></option>
                        <?php } ?>
                     </select>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">GPA (with additional subject)<span class="req">*</span></label>
                     
                     <input type="text" name="ssc_record_gpa_with_addition" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">GPA (without additional subject)<span class="req">*</span></label>

                     <input type="text" name="ssc_record_gpa_without_addition" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">No. of A+ <span class="req">*</span></label>
                     <input type="text" name="ssc_record_no_of_plush" class="form-control" required>
                  </div>
               </div>
               
               <h5><strong class="color-size">SSC LETTER GRADES</strong></h5>
               
               
               <div class="form-group">
                  <div class="col-md-12"><h4><small><strong class="color">General Compulsory Subjects</strong></small></h4></div>
                  <div class="col-sm-3 mb15">
                     <label class="control-label">Bangla<span class="req">*</span></label>
                     <select name="compulsory_subject_grade[bangla]" class="form-control" required>
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                        
                    <select>
                  </div>
                  <div class="col-sm-3 mb15">
                     <label class="control-label">English<span class="req">*</span></label>
                     <select name="compulsory_subject_grade[english]" class="form-control" required>
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                        
                    <select>
                  </div>
                  <div class="col-sm-3 mb15">
                     <label class="control-label">Mathematics<span class="req">*</span></label>
                     
                     <select name="compulsory_subject_grade[mathematics]" class="form-control" required>
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                        
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Science'">
                     <label class="control-label">Genarel Science</label>

                     <select name="compulsory_subject_grade[social_science]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                        
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect !== 'Humanities'">
                     <label class="control-label">ICT<span class="req">*</span></label>

                     <select name="compulsory_subject_grade[ict]" class="form-control" required>
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                        
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect !== 'Humanities'">
                     <label class="control-label">Career Education</label>
                    
                     <select name="compulsory_subject_grade[career_education]" class="form-control">
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                        
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect !== 'Humanities'">
                     <label class="control-label" >Religion<span class="req">*</span></label>
                    
                    <select name="compulsory_subject_grade[religion]" class="form-control" required>
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                        
                    <select>
                  </div>
<!--                  <div class="col-sm-3 mb15">
                     <label class="control-label">Other</label>
                     <input type="text" name="compulsory_subject_grade[other]" class="form-control">
                  </div>-->
                  <div class="col-md-12">
                     <h4><small><strong class="color">Other Compulsory </strong></small></h4>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Science'">
                     <label class="control-label">Physics</label>
                    
                     <select name="elective_subject_grade[physics]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option>  
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Science'">
                     <label class="control-label">Chemistry</label>
                    
                     <select name="elective_subject_grade[chemistry]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Science'">
                     <label class="control-label">Higher Math</label>
                     
                     <select name="elective_subject_grade[higer_math]" class="form-control">
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Science'">
                     <label class="control-label">Biology</label>
                     
                     <select name="elective_subject_grade[biology]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                    <select>
                  </div>
                  
                  
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Business_Studies'">
                     <label class="control-label">Business Introduction  </label>
                     
                     <select name="elective_subject_grade[intro_to_business]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Business_Studies'">
                     <label class="control-label">Accounting</label>
                     
                     <select name="elective_subject_grade[accounting]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Business_Studies'">
                     <label class="control-label">Management</label>
                     
                     <select name="elective_subject_grade[management]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                    <select>
                  </div>
                  
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Business_Studies'">
                     <label class="control-label">Finace & Banking</label>
                     
                     <select name="elective_subject_grade[finace]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                    <select>
                  </div>
                  
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Humanities'">
                     <label class="control-label">Soc./Gen.Science</label>
                    
                     <select name="elective_subject_grade[gen_science]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                    <select>
                  </div>
                  
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Humanities'">
                     <label class="control-label" >Religion <span class="req">*</span></label>
                     
                     <select name="elective_subject_grade[religion]" class="form-control" required>
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Humanities'">
                     <label class="control-label">Geography</label>

                     <select name="elective_subject_grade[giography]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Humanities'">
                     <label class="control-label">History</label>
                     
                     <select name="elective_subject_grade[history]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Humanities'">
                     <label class="control-label">Civics</label>
                     
                     <select name="elective_subject_grade[civics]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                    <select>
                  </div>
                  
                  <div class="col-sm-3 mb15">
                     <label class="control-label">Physical Education</label>
                     
                     <select name="elective_subject_grade[physical_education]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                    <select>
                  </div>
                  
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Humanities'">
                     <label class="control-label">ICT (Elective Subject) <span class="req">*</span></label>
                     
                     <select name="elective_subject_grade[ict]" class="form-control" required>
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                    <select>
                  </div>

                  
                  <!--<div class="col-sm-3 mb15">
                     <label class="control-label">Other</label>
                     <input type="text" name="elective_subject_grade[other]" class="form-control">
                  </div>-->
                  
                  <div class="col-md-12">
                     
                     <h4><small><strong class="color">Additional Subject</strong></small></h4>
                     
                  </div>
                  <div class="col-sm-4 mb15" ng-if="groupSelect == 'Science'">
                     <label class="control-label">Higher Math</label>
                     
                     <select name="additional_subject_grade[higer_math]" class="form-control">
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                    <select>
                  </div>
                  <div class="col-sm-4 mb15" ng-if="groupSelect == 'Science'">
                     <label class="control-label">Biology</label>

                     <select name="additional_subject_grade[biology]" class="form-control">
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Business_Studies'">
                     <label class="control-label">Computer Studies</label>

                     <select name="additional_subject_grade[computer_st]" class="form-control">
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect !== 'Science'">
                     <label class="control-label">Agriculture Studies</label>

                     <select name="additional_subject_grade[agriculture_studys]" class="form-control">
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option value="A+">A+</option> 
                        <option value="A">A</option> 
                        <option value="A-">A-</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                    <select>
                  </div>
                */?>
                  <!--<div class="col-sm-4 mb15">
                     <label class="control-label">Other</label>
                     <input type="text" name="additional_subject_grade[other]" class="form-control">
                  </div>-->
                  <div class="col-md-12 mb15">
                     
                     <h5><strong class="color-size">General Information (Student)</strong></h5>
                     
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Date Of Birth <span class="req">*</span></label>
                     <input type="text" class="form-control" name="birth_date" id="datepicker" placeholder="YYYY-MM-DD" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Nationality <span class="req">*</span></label>
                     <select  name="nationalitity" class="form-control" requierd>
                            <option value="" disabled selected>--Select Nationality--</option>
                            <option value="Bangladeshi">Bangladeshi</option>
                            <option value="Others">Others</option>
                     </select>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Religion <span class="req">*</span></label>
                     <select  name="religion" class="form-control" requierd>
                        <option value="" disabled selected >-- Select Religion--</option>
                         <?php foreach(config_item('religion') as $key => $value) {?>
                            <option value="<?php echo $value;?>"><?php echo $value; ?></option>
                         <?php }?>
                     </select>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Blood Group<span class="req">*</span></label>
                     <select name="blood_group"  class="form-control" required >
                        <option value="" disabled selected>-- Blood Group Select--</option>
                        <?php foreach(config_item('blood_group') as $key => $value) {?>
                            <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                        <?php }?>
                     </select>
                     
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">District<span class="req">*</span></label>
                     <select  name="district" class="selectpicker form-control" 
                     data-show-subtext="true" data-live-search="true" requierd>
                        <option value="" disabled selected>--selcet district--</option>
                         <?php foreach(config_item('district') as $key => $value) {?>
                            <option value="<?php echo $value;?>"><?php echo $value; ?></option>
                         <?php }?>
                     </select>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Student's Mobile<span class="req">*</span></label>
                     <input type="text" name="student_phone" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label style="padding-top: 0px;" class="control-label">Present Address<span class="req">*</span> </label>
                     <div class="mb15">
                        <textarea name="present_address" class="form-control" id="p1" rows="4" cols="50" required></textarea>
                     </div>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label style="padding-top: 0px;" class="control-label">Permanent Address ( <input type="checkbox" id="copy"> Same as present address) </label>
                     <div class="mb15">
                        <textarea name="permanent_address" id="p2" class="form-control" rows="4" cols="50"></textarea>
                     </div>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Phone (Res)</label>
                     <input type="text" name="phone_res" class="form-control">
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Which of the following do you stay With/in ? <span class="req">*</span></label>
                     <select name="stay_with" class="form-control" required>
                        <option value="" disabled selected>--Select Option--</option>
                        <option value="Parents">Parents</option>
                        <option value="Relatives">Relatives</option>
                        <option value="Hostel">Hostel</option>
                        <option value="Mess">Mess</option>
                     </select>
                  </div>
                  <div class="col-md-6 mb15">
                     
                     <h5><strong class="color-size">Father's Information (Student)</strong></h5>
                     
                  </div>
                  <div class="col-md-6 mb15">
                     
                     <h5><strong class="color-size">Mother's Information (Student)</strong></h5>
                     
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Name<span class="req">*</span></label>
                     <input type="text" name="father_info_name" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Name<span class="req">*</span></label>
                     <input type="text" name="mother_info_name" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Occupation<span class="req">*</span></label>
                     <select name="father_info_occupation" class="form-control" required>
                    	<option value="ফার্মার">ফার্মার</option>
                    	<option value="টিচার">টিচার</option>
                    	<option value="বিজনেস">বিজনেস</option>
                    	<option value="সার্ভিস হোল্ডার">সার্ভিস হোল্ডার</option>
                    	<option value="লেবার">লেবার</option>
                    	<option value="others">others</option>
                    </select>

                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Occupation<span class="req">*</span></label>
                     <select name="mother_info_occupation" class="form-control" required>
                    	<option value="মাতার পেশা হবে">মাতার পেশা হবে</option>
                    	<option value="হাউজ ওয়াইফ">হাউজ ওয়াইফ</option>
                    	<option value="টিচার">টিচার</option>
                    	<option value="সার্ভিস হোল্ডার">সার্ভিস হোল্ডার</option>
                    	<option value="Others">Others</option>
                    </select>
                  </div>
                  <?php /*
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Designation<span class="req"></span></label>
                     <input type="text" name="father_info_designation" class="form-control" >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Designation</label>
                     <input type="text" name="mother_info_designation" class="form-control" >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Name of Institution/Organization/Office & Address<span class="req">*</span></label>
                     <input type="text" name="father_info_institution" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Name of Institution/Organization/Office & Address</label>
                     <input type="text" name="mother_info_institution" class="form-control" >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Phone (office)<span class="req">*</span></label>
                     <input type="text" name="father_info_phone" class="form-control" >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Phone (office)</label>
                     <input type="text" name="mother_info_phone" class="form-control">
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Monthly Income of Parents (Tk)<span class="req">*</span></label>
                     <input type="text" name="father_info_monthly_income" class="form-control" required>
                  </div>
                  */?>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Mobile <span class="req">*</span></label>
                     <input type="text" name="mother_info_mobile" class="form-control" required>
                  </div>
                  <?php /*
                  <div class="row">
                     <div class="col-sm-6 mb15" style="padding: 0px 10px 0 28px;">
                        <label class="control-label">Total Monthly Income of Family (Tk) <span class="req">*</span></label>
                        <input type="text" name="father_info_total_monthly_income" class="form-control" required>
                     </div>
                  </div>
                  */?>
                  <div class="col-md-12 mb15">
                     
                     <h5><strong class="color-size">Local Guardian</strong></h5>
                     
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Name</label>
                     <input type="text" name="local_gurdian_name" class="form-control" >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Relation</label>
                     <input type="text" name="local_gurdian_relation" class="form-control" >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Occupation</label>
                     <input type="text" name="local_gurdian_occupation" class="form-control" >
                  </div>
                  <?php /*
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Designation<span class="req"></span></label>
                     <input type="text" name="local_gurdian_designation" class="form-control" >
                  </div>
                  */?>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Phone (Residence)</label>
                     <input type="text" name="local_gurdian_phone_res" class="form-control">
                  </div>
                  <?php /*
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Phone (office)</label>
                     <input type="text" name="local_gurdian_phone_off" class="form-control">
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Name of Institution/Organization/Office & Address<span class="req">*</span></label>
                     <textarea name="local_gurdian_institution" class="form-control" rows="4" cols="50" required></textarea>
                  </div>
                  */?>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Present Address </label>
                     <textarea name="local_gurdian_address" class="form-control" rows="4" cols="50"></textarea>
                  </div>
                  <?php /*
                  <div class="col-md-12 mb15">
                     
                     <h5><strong class="color-size">Information to be sent to</strong></h5>
                     
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Name<span class="req">*</span></label>
                     <input type="text" name="progress_report_name" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Relationship<span class="req">*</span></label>
                     <input type="text" name="progress_report_relationship" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Address<span class="req">*</span></label>
                     <textarea name="progress_report_address" class="form-control" rows="4" cols="50"></textarea>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Phone (Residence)<span class="req">*</span></label>
                     <input type="text" name="progress_report_phone_res" class="form-control" required>
                  </div>
                  <div class="col-md-12 mb15">
                     
                     <h5><strong class="color-size">Co-curricular activities you took part while in high school</strong></h5>
                     
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Sports</label>
                     <input type="text" name="extra_activity[sports]" class="form-control">
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Clubs</label>
                     <input type="text" name="extra_activity[club]" class="form-control">
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Others</label>
                     <input type="text" name="extra_activity[others]" class="form-control">
                  </div>
               </div>
               */?>
               <div class="col-md-12 mb15">
                     
                     <h5><strong class="color-size">Subjects you wish to study at bangabandhu govt College Mymensingh</strong></h5>
                     
                  </div>
               <div class="col-md-6 clearfix">
                  <div class="row">
                     <div class="col-sm-12 mb15">
                        <div class="row">
                           <label class="control-label"> Group<span class="req">*</span></label>
                           <select style="margin-bottom: 10px;" name="group" class="form-control" ng-model="group" ng-change="getSubjectFn()" required>
                                <option value="" selected disabled>&nbsp;</option>
                                <option value="science">Science</option>
                                <option value="humanities">Humanities</option>
                                <option value="business studies">Business Studies</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6"></div>
               <div class="col-md-12 clearfix">
                  <div class="row" ng-cloak>
                     <table class="table table-bordered text-center table-custome">
                        <tr>
                           <!--<th width="100" style="text-align: center;">Subject </th>-->
                           <th colspan="6" style="text-align: center;">Compulsory</th>
                           <th style="text-align: center;">Optional</th>
                        </tr>
                        <tr>
                           <!--<td style="background: #15749c;color: #fff;">Name  </td>-->
                           <td><input type="text" name="compulsory_subject_one" value="BANGLA" readonly></td>
                           <td><input type="text" name="compulsory_subject_two" value="ENGLISH" readonly></td>
                           <td><input type="text" name="compulsory_subject_three" value="ICT" readonly required></td>
                           <td>
                               <!--<input ng-if="group == 'humanities'" type="text" name="compulsory_subject[]" value="History" readonly>-->
                               <select 
                                     ng-show="group == 'humanities'"
                                     name="compulsory_subject_four" 
                                     ng-model="chose3rd" 
                                     ng-options="cho[0] for cho in chose_3 track by cho[0]"
                                     ng-change="getSubjectCodeFn('chose_3')" 
                                     class="form-control">
                                    <option value="" selected disabled>--Select Subject--</option>                                    
                                  </select>
                                  
                               <input ng-if="group == 'science'" type="text" name="compulsory_subject_four" value="Physics" readonly>
                               <input ng-if="group == 'business studies'" type="text" name="compulsory_subject_four" value="Accounting" readonly>
                            </td>
                           <td>
                               <!--<input ng-if="group == 'humanities'" style="width: 60%;" type="text" name="compulsory_subject[]" value="Civics" readonly required>-->

                                  <select 
                                     ng-show="group == 'humanities'"
                                     name="compulsory_subject_five" 
                                     ng-model="chose2nd" 
                                     ng-options="cho[0] for cho in chose_2 track by cho[0]"
                                     ng-change="getSubjectCodeFn('chose_2')" 
                                     class="form-control" >
                                    <option value="" selected disabled>--Select Subject--</option>                                    
                                  </select>
                                  
                               <input ng-if="group == 'science'" style="width: 60%;" type="text" name="compulsory_subject_five" value="Chemistry" readonly required>
                               <input ng-if="group == 'business studies'" style="width: 60%;" type="text" name="compulsory_subject_five" value="Business Organization and Management" readonly required>
                            </td>

                           <td>
                                <select 
                                     name="compulsory_subject_six" 
                                     ng-model="chose1st" 
                                     ng-options="cho[0] for cho in chose_1 track by cho[0]"
                                     ng-change="getSubjectCodeFn('chose_1')" 
                                     class="form-control" required>
                                    <option value="" selected disabled>--Select Subject--</option>                                    
                                  </select>
                           </td>
                           
                           <td>
                            <select 
                                 name="optional_subject" 
                                 ng-model="optional_chose" 
                                 ng-options="cho[0] for cho in optional track by cho[0]"
                                 ng-change="getSubjectCodeFn('optional')" 
                                 class="form-control" required>
                                 <option value="" selected disabled>--Select Subject--</option>
                              </select>
                           </td>
                           
                        </tr>
                        <tr>
                           <!--<td style="background: #15749c;color: #fff;">Code </td>-->
                           <td><input type="text" name="compulsory_code_one" value="101" readonly></td>
                           <td><input type="text" name="compulsory_code_two" value="107" readonly></td>
                           <td><input type="text" name="compulsory_code_three" value="275" readonly></td>
                           
                           <td>
                               <input ng-if="group == 'science'" type="text" name="compulsory_code_four" value="174" readonly>
                               <input ng-if="group == 'humanities'" type="text" name="compulsory_code_four" ng-value="code.chose3rd" readonly>
                               <input ng-if="group == 'business studies'" type="text" name="compulsory_code_four" value="253" readonly>
                            </td>
                           <td>
                               <input ng-if="group == 'science'" type="text" name="compulsory_code_five" value="176" readonly>
                               <input ng-if="group == 'humanities'" type="text" name="compulsory_code_five" ng-value="code.chose2nd" readonly>
                               <input ng-if="group == 'business studies'" type="text" name="compulsory_code_five" value="277" readonly>
                            </td>
                           <td><input type="text" name="compulsory_code_six" ng-value="code.chose1st" readonly></td>
                           
                           <td>
                               <input type="text" name="optional_code" ng-value="code.optional" readonly>
                           </td>
                        </tr>
                     </table>
                  </div>
               </div>
               
<!--               <div class="form-group">
                  <div class="col-sm-offset-6 col-sm-6 mb15">
                     <label class="control-label">
                     Admission Serial No
                     <span class="req">*</span>
                     </label>
                      <div>
                        <input
                        type="text"
                        name="admission_serial_no"
                        class="form-control" required
                        >
                        </div>
                  </div>
               </div>-->
               <div class="form-group">
                  <div class="col-sm-offset-6 col-sm-6 mb15">
                     <label class="control-label">
                     Student's Photo (300x300px)
                     <span class="req">*</span>
                     </label>
                      <div>
                        <input
                        id="input"
                        type="file"
                        name="students_photo"
                        class="form-control file"
                        data-show-preview="true"
                        data-show-upload="false"
                        data-show-remove="false"
                        >
                        </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="row">
                     <div class="btn-group pull-right">
                        <input type="submit" value="Save" name="student_submit" class="btn btn-primary">
                     </div>
                  </div>
               </div>
               
               <?php echo form_close(); ?>
            </div>
         </div>
         <div class="panel-footer">&nbsp;</div>
      </div>
   </div>
</div>

<!-- All plugins -->
<script type="text/javaScript" src="<?php echo site_url('private/js/bootstrap.min.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script type="text/javaScript" src="<?php echo site_url('private/plugins/bootstrap-fileinput-master/js/fileinput.min.js'); ?>"></script>
<script type="text/javaScript" src="http://ndcm.edu.bd/private/plugins/peity/jquery.peity.min.js"></script>


        

 <script>
        $(document).on('ready', function() {
            $("#input-4").fileinput({showCaption: true});

           $("button").click(function(){
                $(".alert").hide();
            });
        });
</script>
        
<script>
    $(function() {
        $("#datepicker").datepicker();
    });
    
    $("#datepicker").datepicker({
      dateFormat: "yy-mm-dd"
    }); 
     
    
    // $('#datetimepicker1').datetimepicker({
    //      format: 'YYYY-MM-DD'
    // });
    
    // file upload with plugin options
    $("input#input").fileinput({
        browseLabel: "Pick Image",
        previewFileType: "text",
        allowedFileExtensions: ["jpg", "jpeg", "png"],
    });
    
    $(document).ready(function(){
        $('#copy').click(function(){
            $('#p2').val($('#p1').val());
        });
    });
    
</script>

