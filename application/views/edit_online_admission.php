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
            <div class="" ng-controller="edit_registrationCtrl">
                <?php
                    $attr=array('class'=>'form-horizontal');
                    echo form_open_multipart('online_registration/edit_online_registration?college_id='.$result[0]->college_id, $attr);
                ?>
               <h5><strong class="color-size">Form to be Filled up in BLOCK LETTERS (in English)</strong></h5>
               <div class="text-right">
                   <?php 
                        $get_student_photo = $this->retrieve->read('student_id_password', array('student_id'=> $this->session->userdata['student_id']));
                   ?>
                   <img style="width: 10%;" src="<?php echo site_url($get_student_photo[0]->photo); ?>">
               </div>
               <div class="form-group">
                  <div class="col-md-6">
                     <label style="padding-top: 0;" class="control-label"> Name of Student (in English) <!--as your SSC Exam Admit Card--></small>)<span class="req">*</span></label>
                     <input type="text" name="name_english" class="form-control" value="<?php echo (!empty($result[0]->name_english)) ? $result[0]->name_english : ''; ?>"  required >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Name of Student (বাংলায়)<span class="req">*</span></label>
                     <input type="text" name="name_bangla" class="form-control" value="<?php echo (!empty($result[0]->name_bangla)) ? $result[0]->name_bangla : ''; ?>" required >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Nickname</label>
                     <input type="text" name="nickname" class="form-control" value="<?php echo (!empty($result[0]->nickname)) ? $result[0]->nickname : ''; ?>">
                  </div>
               </div>
               
               <h5><strong class="color-size">SSC RECORD</strong></h5>
               
               <div class="form-group">
                  <div class="col-sm-6 mb15">
                     <label class="control-label">SSC GROUP <span class="req">*</span></label>
                     <select name="ssc_group" ng-model="groupSelect" ng-init="groupSelect='<?php echo $result[0]->ssc_group; ?>'" class="form-control" required >
                        <option value="">--Group Select--</option>
                        <?php foreach(config_item('group') as $key => $value) {?>
                            <option  <?php echo (!empty($result[0]->ssc_group) && $result[0]->ssc_group==$key)?'selected':''; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php }?>
                     </select>
                  </div>
                  
                  <div class="col-sm-6 mb15">
                     <label class="control-label">School Name<span class="req">*</span></label>
                     <input type="text" name="ssc_record_school_name" value="<?php echo (!empty($result[0]->ssc_record_school_name) ? $result[0]->ssc_record_school_name : ""); ?>" class="form-control" required >
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-6 mb15">
                     <label class="control-label">School Address <span class="req">*</span></label>
                     <input type="text" name="ssc_record_school_address" value="<?php echo (!empty($result[0]->ssc_record_school_address) ? $result[0]->ssc_record_school_address : ""); ?>" class="form-control" required >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">District<span class="req">*</span></label>
                     <select name="ssc_record_district" class="selectpicker form-control" 
                     data-show-subtext="true" data-live-search="true" required>
                         <option value="" disabled selected >--selcet district--</option>
                         <?php foreach(config_item('district') as $key => $value) {?>
                            <option <?php echo (!empty($result[0]->ssc_record_district) && $result[0]->ssc_record_district==$value) ? 'selected' : ''; ?> value="<?php echo $value;?>"><?php echo $value; ?></option>
                         <?php }?>
                     </select>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Board<span class="req">*</span></label>
                     <select name="ssc_record_board"  class="form-control" required >
                        <option value="">--Group Select--</option>
                        <?php foreach(config_item('board') as $key => $value) {?>
                            <option <?php echo (!empty($result[0]->ssc_record_board) && $result[0]->ssc_record_board==$value) ? 'selected' : ''; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>
                        <?php }?>
                     </select>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Center<span class="req">*</span></label>
                     <input type="text" name="ssc_record_center" value="<?php echo (!empty($result[0]->ssc_record_center)) ? $result[0]->ssc_record_center : ""; ?>" class="form-control" required >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">SSC Roll No<span class="req">*</span></label>
                     <input type="hidden" name="college_id" value="<?php echo $get_student_photo[0]->student_id; ?>" class="form-control">
                     <input type="text" name="roll_no" value="<?php echo (!empty($result[0]->roll_no)) ? $result[0]->roll_no : ''; ?>"  class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Exam Year<span class="req">*</span></label>
                     <select name="exam_year"  class="form-control" required >
                        <option value="">--Select Year--</option>
                        <?php  
                            for ($year = 2017; $year <= date('Y'); $year++) { ?>
                            <option <?php echo (!empty($result[0]->exam_year) && $result[0]->exam_year==$year) ? 'selected' : ''; ?> value="<?php echo $year; ?>"><?php echo $year; ?></option>
                        <?php }?>
                     </select>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Registration No<span class="req">*</span></label>
                     <input type="text" name="reg_no" value="<?php echo (!empty($result[0]->reg_no)) ? $result[0]->reg_no : ''; ?>" class="form-control" >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Registration Year/Session<span class="req">*</span></label>
                     <select name="ssc_session"  class="form-control" required >
                        <option value="">--Select Year/Session--</option>
                        <?php for($i=date("Y")-3; $i<=date("Y"); $i++){?>
                            <option <?php echo (!empty($result[0]->ssc_session) && $result[0]->ssc_session==$i."-".($i+1)) ? 'selected' : ''; ?> value="<?php echo $i."-".($i+1); ?>"><?php echo $i."-".($i+1); ?></option>
                        <?php } ?>
                     </select>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">GPA (with additional subject)<span class="req">*</span></label>
                     
                     <input type="text" name="ssc_record_gpa_with_addition" value="<?php echo (!empty($result[0]->ssc_record_gpa_with_addition)) ? $result[0]->ssc_record_gpa_with_addition : ""; ?>" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">GPA (without additional subject)<span class="req">*</span></label>

                     <input type="text" name="ssc_record_gpa_without_addition" value="<?php echo (!empty($result[0]->ssc_record_gpa_without_addition)) ? $result[0]->ssc_record_gpa_without_addition : ""; ?>" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">No. of A+ <span class="req">*</span></label>
                     <input type="text" name="ssc_record_no_of_plush" value="<?php echo (!empty($result[0]->ssc_record_no_of_plush)) ? $result[0]->ssc_record_no_of_plush : ""; ?>" class="form-control" required>
                  </div>
               </div>
               
               <h5><strong class="color-size">SSC LETTER GRADES</strong></h5>
               
               
               
               <?php
                    $compulsory_subject_grade = json_decode($result[0]->compulsory_subject_grade);
               ?>
               <div class="form-group">
                  <div class="col-md-12"><h4><small><strong class="color">General Compulsory Subjects</strong></small></h4></div>
                  <div class="col-sm-3 mb15">
                     <label class="control-label">Bangla<span class="req">*</span></label>
                     <select name="compulsory_subject_grade[bangla]" class="form-control" required>
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option <?php if(!empty($compulsory_subject_grade->bangla) && $compulsory_subject_grade->bangla=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($compulsory_subject_grade->bangla) && $compulsory_subject_grade->bangla=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($compulsory_subject_grade->bangla) && $compulsory_subject_grade->bangla=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($compulsory_subject_grade->bangla) && $compulsory_subject_grade->bangla=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($compulsory_subject_grade->bangla) && $compulsory_subject_grade->bangla=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($compulsory_subject_grade->bangla) && $compulsory_subject_grade->bangla=='D'){echo 'selected';} ?> value="D">D</option> 
                        
                    <select>
                  </div>
                  <div class="col-sm-3 mb15">
                     <label class="control-label">English<span class="req">*</span></label>
                     <select name="compulsory_subject_grade[english]" class="form-control" required>
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option <?php if(!empty($compulsory_subject_grade->english) && $compulsory_subject_grade->english=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($compulsory_subject_grade->english) && $compulsory_subject_grade->english=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($compulsory_subject_grade->english) && $compulsory_subject_grade->english=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($compulsory_subject_grade->english) && $compulsory_subject_grade->english=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($compulsory_subject_grade->english) && $compulsory_subject_grade->english=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($compulsory_subject_grade->english) && $compulsory_subject_grade->english=='D'){echo 'selected';} ?> value="D">D</option> 
                        
                    <select>
                  </div>
                  <div class="col-sm-3 mb15">
                     <label class="control-label">Mathematics<span class="req">*</span></label>
                     
                     <select name="compulsory_subject_grade[mathematics]" class="form-control" required>
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option <?php if(!empty($compulsory_subject_grade->mathematics) && $compulsory_subject_grade->mathematics=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($compulsory_subject_grade->mathematics) && $compulsory_subject_grade->mathematics=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($compulsory_subject_grade->mathematics) && $compulsory_subject_grade->mathematics=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($compulsory_subject_grade->mathematics) && $compulsory_subject_grade->mathematics=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($compulsory_subject_grade->mathematics) && $compulsory_subject_grade->mathematics=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($compulsory_subject_grade->mathematics) && $compulsory_subject_grade->mathematics=='D'){echo 'selected';} ?> value="D">D</option> 
                        
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Science'">
                     <label class="control-label">Genarel Science</label>

                     <select name="compulsory_subject_grade[social_science]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option <?php if(!empty($compulsory_subject_grade->social_science) && $compulsory_subject_grade->social_science=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($compulsory_subject_grade->social_science) && $compulsory_subject_grade->social_science=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($compulsory_subject_grade->social_science) && $compulsory_subject_grade->social_science=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($compulsory_subject_grade->social_science) && $compulsory_subject_grade->social_science=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($compulsory_subject_grade->social_science) && $compulsory_subject_grade->social_science=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($compulsory_subject_grade->social_science) && $compulsory_subject_grade->social_science=='D'){echo 'selected';} ?> value="D">D</option> 
                        
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect !== 'Humanities'">
                     <label class="control-label">ICT<span class="req">*</span></label>

                     <select name="compulsory_subject_grade[ict]" class="form-control" required>
                        <option value="" disabled selected>--Select Grade--</option>
                        <option <?php if(!empty($compulsory_subject_grade->ict) && $compulsory_subject_grade->ict=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($compulsory_subject_grade->ict) && $compulsory_subject_grade->ict=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($compulsory_subject_grade->ict) && $compulsory_subject_grade->ict=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($compulsory_subject_grade->ict) && $compulsory_subject_grade->ict=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($compulsory_subject_grade->ict) && $compulsory_subject_grade->ict=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($compulsory_subject_grade->ict) && $compulsory_subject_grade->ict=='D'){echo 'selected';} ?> value="D">D</option>  
                        
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect !== 'Humanities'">
                     <label class="control-label">Career Education</label>
                    
                     <select name="compulsory_subject_grade[career_education]" class="form-control">
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option <?php if(!empty($compulsory_subject_grade->career_education) && $compulsory_subject_grade->career_education=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($compulsory_subject_grade->career_education) && $compulsory_subject_grade->career_education=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($compulsory_subject_grade->career_education) && $compulsory_subject_grade->career_education=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($compulsory_subject_grade->career_education) && $compulsory_subject_grade->career_education=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($compulsory_subject_grade->career_education) && $compulsory_subject_grade->career_education=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($compulsory_subject_grade->career_education) && $compulsory_subject_grade->career_education=='D'){echo 'selected';} ?> value="D">D</option> 
                        
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect !== 'Humanities'">
                     <label class="control-label" >Religion<span class="req">*</span></label>
                    
                    <select name="compulsory_subject_grade[religion]" class="form-control" required>
                        <option value="" disabled selected>--Select Grade--</option>
                        <option <?php if(!empty($compulsory_subject_grade->religion) && $compulsory_subject_grade->religion=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($compulsory_subject_grade->religion) && $compulsory_subject_grade->religion=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($compulsory_subject_grade->religion) && $compulsory_subject_grade->religion=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($compulsory_subject_grade->religion) && $compulsory_subject_grade->religion=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($compulsory_subject_grade->religion) && $compulsory_subject_grade->religion=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($compulsory_subject_grade->religion) && $compulsory_subject_grade->religion=='D'){echo 'selected';} ?> value="D">D</option> 
                        
                    <select>
                  </div>
<!--                  <div class="col-sm-3 mb15">
                     <label class="control-label">Other</label>
                     <input type="text" name="compulsory_subject_grade[other]" class="form-control">
                  </div>-->
                  <div class="col-md-12">
                     <h4><small><strong class="color">Other Compulsory </strong></small></h4>
                  </div>
                  
                    <?php
                        $elective_subject_grade = json_decode($result[0]->elective_subject_grade);
                    ?>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Science'">
                     <label class="control-label">Physics</label>
                     <select name="elective_subject_grade[physics]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option>
                        <option <?php if(!empty($elective_subject_grade->physics) && $elective_subject_grade->physics=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($elective_subject_grade->physics) && $elective_subject_grade->physics=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($elective_subject_grade->physics) && $elective_subject_grade->physics=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($elective_subject_grade->physics) && $elective_subject_grade->physics=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($elective_subject_grade->physics) && $elective_subject_grade->physics=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($elective_subject_grade->physics) && $elective_subject_grade->physics=='D'){echo 'selected';} ?> value="D">D</option>  
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Science'">
                     <label class="control-label">Chemistry</label>
                    
                     <select name="elective_subject_grade[chemistry]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option>
                        <option <?php if(!empty($elective_subject_grade->chemistry) && $elective_subject_grade->chemistry=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($elective_subject_grade->chemistry) && $elective_subject_grade->chemistry=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($elective_subject_grade->chemistry) && $elective_subject_grade->chemistry=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($elective_subject_grade->chemistry) && $elective_subject_grade->chemistry=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($elective_subject_grade->chemistry) && $elective_subject_grade->chemistry=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($elective_subject_grade->chemistry) && $elective_subject_grade->chemistry=='D'){echo 'selected';} ?> value="D">D</option> 
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Science'">
                     <label class="control-label">Higher Math</label>
                     
                     <select name="elective_subject_grade[higer_math]" class="form-control">
                        <option value="" disabled selected>--Select Grade--</option>
                        <option <?php if(!empty($elective_subject_grade->higer_math) && $elective_subject_grade->higer_math=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($elective_subject_grade->higer_math) && $elective_subject_grade->higer_math=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($elective_subject_grade->higer_math) && $elective_subject_grade->higer_math=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($elective_subject_grade->higer_math) && $elective_subject_grade->higer_math=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($elective_subject_grade->higer_math) && $elective_subject_grade->higer_math=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($elective_subject_grade->higer_math) && $elective_subject_grade->higer_math=='D'){echo 'selected';} ?> value="D">D</option> 
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Science'">
                     <label class="control-label">Biology</label>
                     
                     <select name="elective_subject_grade[biology]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option>
                        <option <?php if(!empty($elective_subject_grade->biology) && $elective_subject_grade->biology=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($elective_subject_grade->biology) && $elective_subject_grade->biology=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($elective_subject_grade->biology) && $elective_subject_grade->biology=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($elective_subject_grade->biology) && $elective_subject_grade->biology=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($elective_subject_grade->biology) && $elective_subject_grade->biology=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($elective_subject_grade->biology) && $elective_subject_grade->biology=='D'){echo 'selected';} ?> value="D">D</option> 
                    <select>
                  </div>
                  
                  
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Business_Studies'">
                     <label class="control-label">Business Introduction  </label>
                     
                     <select name="elective_subject_grade[intro_to_business]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option <?php if(!empty($elective_subject_grade->intro_to_business) && $elective_subject_grade->intro_to_business=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($elective_subject_grade->intro_to_business) && $elective_subject_grade->intro_to_business=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($elective_subject_grade->intro_to_business) && $elective_subject_grade->intro_to_business=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($elective_subject_grade->intro_to_business) && $elective_subject_grade->intro_to_business=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($elective_subject_grade->intro_to_business) && $elective_subject_grade->intro_to_business=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($elective_subject_grade->intro_to_business) && $elective_subject_grade->intro_to_business=='D'){echo 'selected';} ?> value="D">D</option> 
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Business_Studies'">
                     <label class="control-label">Accounting</label>
                     
                     <select name="elective_subject_grade[accounting]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option>
                        <option <?php if(!empty($elective_subject_grade->accounting) && $elective_subject_grade->accounting=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($elective_subject_grade->accounting) && $elective_subject_grade->accounting=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($elective_subject_grade->accounting) && $elective_subject_grade->accounting=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($elective_subject_grade->accounting) && $elective_subject_grade->accounting=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($elective_subject_grade->accounting) && $elective_subject_grade->accounting=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($elective_subject_grade->accounting) && $elective_subject_grade->accounting=='D'){echo 'selected';} ?> value="D">D</option> 
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Business_Studies'">
                     <label class="control-label">Management</label>
                     
                     <select name="elective_subject_grade[management]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option>
                        <option <?php if(!empty($elective_subject_grade->management) && $elective_subject_grade->management=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($elective_subject_grade->management) && $elective_subject_grade->management=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($elective_subject_grade->management) && $elective_subject_grade->management=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($elective_subject_grade->management) && $elective_subject_grade->management=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($elective_subject_grade->management) && $elective_subject_grade->management=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($elective_subject_grade->management) && $elective_subject_grade->management=='D'){echo 'selected';} ?> value="D">D</option> 
                    <select>
                  </div>
                  
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Business_Studies'">
                     <label class="control-label">Finace & Banking</label>
                     
                     <select name="elective_subject_grade[finace]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option>
                        <option <?php if(!empty($elective_subject_grade->finace) && $elective_subject_grade->finace=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($elective_subject_grade->finace) && $elective_subject_grade->finace=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($elective_subject_grade->finace) && $elective_subject_grade->finace=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($elective_subject_grade->finace) && $elective_subject_grade->finace=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($elective_subject_grade->finace) && $elective_subject_grade->finace=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($elective_subject_grade->finace) && $elective_subject_grade->finace=='D'){echo 'selected';} ?> value="D">D</option> 
                    <select>
                  </div>
                  
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Humanities'">
                     <label class="control-label">Soc./Gen.Science</label>
                    
                     <select name="elective_subject_grade[gen_science]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option>
                        <option <?php if(!empty($elective_subject_grade->gen_science) && $elective_subject_grade->gen_science=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($elective_subject_grade->gen_science) && $elective_subject_grade->gen_science=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($elective_subject_grade->gen_science) && $elective_subject_grade->gen_science=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($elective_subject_grade->gen_science) && $elective_subject_grade->gen_science=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($elective_subject_grade->gen_science) && $elective_subject_grade->gen_science=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($elective_subject_grade->gen_science) && $elective_subject_grade->gen_science=='D'){echo 'selected';} ?> value="D">D</option> 
                    <select>
                  </div>
                  
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Humanities'">
                     <label class="control-label" >Religion <span class="req">*</span></label>
                     
                     <select name="elective_subject_grade[religion]" class="form-control" required>
                        <option value="" disabled selected>--Select Grade--</option>
                        <option <?php if(!empty($elective_subject_grade->religion) && $elective_subject_grade->religion=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($elective_subject_grade->religion) && $elective_subject_grade->religion=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($elective_subject_grade->religion) && $elective_subject_grade->religion=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($elective_subject_grade->religion) && $elective_subject_grade->religion=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($elective_subject_grade->religion) && $elective_subject_grade->religion=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($elective_subject_grade->religion) && $elective_subject_grade->religion=='D'){echo 'selected';} ?> value="D">D</option>  
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Humanities'">
                     <label class="control-label">Geography</label>

                     <select name="elective_subject_grade[giography]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option>
                        <option <?php if(!empty($elective_subject_grade->giography) && $elective_subject_grade->giography=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($elective_subject_grade->giography) && $elective_subject_grade->giography=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($elective_subject_grade->giography) && $elective_subject_grade->giography=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($elective_subject_grade->giography) && $elective_subject_grade->giography=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($elective_subject_grade->giography) && $elective_subject_grade->giography=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($elective_subject_grade->giography) && $elective_subject_grade->giography=='D'){echo 'selected';} ?> value="D">D</option> 
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Humanities'">
                     <label class="control-label">History</label>
                     
                     <select name="elective_subject_grade[history]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option>
                        <option <?php if(!empty($elective_subject_grade->history) && $elective_subject_grade->history=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($elective_subject_grade->history) && $elective_subject_grade->history=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($elective_subject_grade->history) && $elective_subject_grade->history=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($elective_subject_grade->history) && $elective_subject_grade->history=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($elective_subject_grade->history) && $elective_subject_grade->history=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($elective_subject_grade->history) && $elective_subject_grade->history=='D'){echo 'selected';} ?> value="D">D</option> 
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Humanities'">
                     <label class="control-label">Civics</label>
                     <select name="elective_subject_grade[civics]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option>
                        <option <?php if(!empty($elective_subject_grade->civics) && $elective_subject_grade->civics=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($elective_subject_grade->civics) && $elective_subject_grade->civics=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($elective_subject_grade->civics) && $elective_subject_grade->civics=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($elective_subject_grade->civics) && $elective_subject_grade->civics=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($elective_subject_grade->civics) && $elective_subject_grade->civics=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($elective_subject_grade->civics) && $elective_subject_grade->civics=='D'){echo 'selected';} ?> value="D">D</option> 
                    <select>
                  </div>
                  
                  <div class="col-sm-3 mb15">
                     <label class="control-label">Physical Education</label>
                     
                     <select name="elective_subject_grade[physical_education]" class="form-control" >
                        <option value="" disabled selected>--Select Grade--</option>
                        <option <?php if(!empty($elective_subject_grade->physical_education) && $elective_subject_grade->physical_education=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($elective_subject_grade->physical_education) && $elective_subject_grade->physical_education=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($elective_subject_grade->physical_education) && $elective_subject_grade->physical_education=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($elective_subject_grade->physical_education) && $elective_subject_grade->physical_education=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($elective_subject_grade->physical_education) && $elective_subject_grade->physical_education=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($elective_subject_grade->physical_education) && $elective_subject_grade->physical_education=='D'){echo 'selected';} ?> value="D">D</option> 
                    <select>
                  </div>
                  
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Humanities'">
                     <label class="control-label">ICT (Elective Subject) <span class="req">*</span></label>
                     
                     <select name="elective_subject_grade[ict]" class="form-control" required>
                        <option value="" disabled selected>--Select Grade--</option>
                        <option <?php if(!empty($elective_subject_grade->ict) && $elective_subject_grade->ict=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($elective_subject_grade->ict) && $elective_subject_grade->ict=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($elective_subject_grade->ict) && $elective_subject_grade->ict=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($elective_subject_grade->ict) && $elective_subject_grade->ict=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($elective_subject_grade->ict) && $elective_subject_grade->ict=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($elective_subject_grade->ict) && $elective_subject_grade->ict=='D'){echo 'selected';} ?> value="D">D</option> 
                    <select>
                  </div>

                  
                  <!--<div class="col-sm-3 mb15">
                     <label class="control-label">Other</label>
                     <input type="text" name="elective_subject_grade[other]" class="form-control">
                  </div>-->
                  
                  <div class="col-md-12">
                     <h4><small><strong class="color">Additional Subject</strong></small></h4>
                  </div>
                  
                  
                    <?php
                        $additional_subject_grade = json_decode($result[0]->additional_subject_grade);
                    ?>
                  <div class="col-sm-4 mb15" ng-if="groupSelect == 'Science'">
                     <label class="control-label">Higher Math</label>
                     <select name="additional_subject_grade[higer_math]" class="form-control">
                        <option value="" disabled selected>--Select Grade--</option>
                        <option <?php if(!empty($additional_subject_grade->higer_math) && $additional_subject_grade->higer_math=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($additional_subject_grade->higer_math) && $additional_subject_grade->higer_math=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($additional_subject_grade->higer_math) && $additional_subject_grade->higer_math=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($additional_subject_grade->higer_math) && $additional_subject_grade->higer_math=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($additional_subject_grade->higer_math) && $additional_subject_grade->higer_math=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($additional_subject_grade->higer_math) && $additional_subject_grade->higer_math=='D'){echo 'selected';} ?> value="D">D</option> 
                    <select>
                  </div>
                  <div class="col-sm-4 mb15" ng-if="groupSelect == 'Science'">
                     <label class="control-label">Biology</label>

                     <select name="additional_subject_grade[biology]" class="form-control">
                        <option value="" disabled selected>--Select Grade--</option> 
                        <option <?php if(!empty($additional_subject_grade->biology) && $additional_subject_grade->biology=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($additional_subject_grade->biology) && $additional_subject_grade->biology=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($additional_subject_grade->biology) && $additional_subject_grade->biology=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($additional_subject_grade->biology) && $additional_subject_grade->biology=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($additional_subject_grade->biology) && $additional_subject_grade->biology=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($additional_subject_grade->biology) && $additional_subject_grade->biology=='D'){echo 'selected';} ?> value="D">D</option> 
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect == 'Business_Studies'">
                     <label class="control-label">Computer Studies</label>

                     <select name="additional_subject_grade[computer_st]" class="form-control">
                        <option value="" disabled selected>--Select Grade--</option>
                        <option <?php if(!empty($additional_subject_grade->computer_st) && $additional_subject_grade->computer_st=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($additional_subject_grade->computer_st) && $additional_subject_grade->computer_st=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($additional_subject_grade->computer_st) && $additional_subject_grade->computer_st=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($additional_subject_grade->computer_st) && $additional_subject_grade->computer_st=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($additional_subject_grade->computer_st) && $additional_subject_grade->computer_st=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($additional_subject_grade->computer_st) && $additional_subject_grade->computer_st=='D'){echo 'selected';} ?> value="D">D</option> 
                    <select>
                  </div>
                  <div class="col-sm-3 mb15" ng-if="groupSelect !== 'Science'">
                     <label class="control-label">Agriculture Studies</label>

                     <select name="additional_subject_grade[agriculture_studys]" class="form-control">
                        <option value="" disabled selected>--Select Grade--</option>
                        <option <?php if(!empty($additional_subject_grade->agriculture_studys) && $additional_subject_grade->agriculture_studys=='A+'){echo 'selected';} ?> value="A+">A+</option> 
                        <option <?php if(!empty($additional_subject_grade->agriculture_studys) && $additional_subject_grade->agriculture_studys=='A'){echo 'selected';} ?> value="A">A</option> 
                        <option <?php if(!empty($additional_subject_grade->agriculture_studys) && $additional_subject_grade->agriculture_studys=='A-'){echo 'selected';} ?> value="A-">A-</option> 
                        <option <?php if(!empty($additional_subject_grade->agriculture_studys) && $additional_subject_grade->agriculture_studys=='B'){echo 'selected';} ?> value="B">B</option> 
                        <option <?php if(!empty($additional_subject_grade->agriculture_studys) && $additional_subject_grade->agriculture_studys=='C'){echo 'selected';} ?> value="C">C</option> 
                        <option <?php if(!empty($additional_subject_grade->agriculture_studys) && $additional_subject_grade->agriculture_studys=='D'){echo 'selected';} ?> value="D">D</option> 
                    <select>
                  </div>
                  
                  <!--<div class="col-sm-4 mb15">
                     <label class="control-label">Other</label>
                     <input type="text" name="additional_subject_grade[other]" class="form-control">
                  </div>-->
                  <div class="col-md-12 mb15">
                     <h5><strong class="color-size">General Information (Student)</strong></h5>
                  </div>
                  <div class="col-sm-6 mb15">
                    <label class="control-label">Date Of Birth <span class="req">*</span></label>
                    <input type="text" class="form-control" id="datepicker" name="birth_date" value="<?php echo (!empty($result[0]->birth_date)) ? $result[0]->birth_date : ""; ?>" placeholder="YYYY-MM-DD" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Nationality <span class="req">*</span></label>
                     <select  name="nationalitity" class="form-control" requierd>
                            <option value="" disabled selected>--Select Nationality--</option>
                            <option <?php echo (!empty($result[0]->nationalitity) && $result[0]->nationalitity=="Bangladeshi") ? 'selected' : ""; ?> value="Bangladeshi">Bangladeshi</option>
                            <option <?php echo (!empty($result[0]->nationalitity) && $result[0]->nationalitity=="Others") ? 'selected' : ""; ?> value="Others">Others</option>
                     </select>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Religion <span class="req">*</span></label>
                     <select  name="religion" class="form-control" requierd>
                        <option value="" disabled selected >-- Select Religion--</option>
                         <?php foreach(config_item('religion') as $key => $value) {?>
                            <option <?php echo (!empty($result[0]->religion) && $result[0]->religion == $value) ? 'selected' : ""; ?> value="<?php echo $value;?>"><?php echo $value; ?></option>
                         <?php }?>
                     </select>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Blood Group<span class="req">*</span></label>
                     <select name="blood_group"  class="form-control" required >
                        <option value="" disabled selected>-- Blood Group Select--</option>
                        <?php foreach(config_item('blood_group') as $key => $value) {?>
                            <option <?php echo (!empty($result[0]->blood_group) && $result[0]->blood_group == $value) ? 'selected' : ""; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>
                        <?php }?>
                     </select>
                     
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">District<span class="req">*</span></label>
                     <select  name="district" class="selectpicker form-control" 
                     data-show-subtext="true" data-live-search="true" requierd>
                        <option value="" disabled selected>--selcet district--</option>
                         <?php foreach(config_item('district') as $key => $value) {?>
                            <option <?php echo (!empty($result[0]->district) && $result[0]->district == $value) ? 'selected' : ""; ?> value="<?php echo $value;?>"><?php echo $value; ?></option>
                         <?php }?>
                     </select>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Student's Mobile<span class="req">*</span></label>
                     <input type="text" name="student_phone" value="<?php echo (!empty($result[0]->student_phone) ? $result[0]->student_phone : ""); ?>" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label style="padding-top: 0px;" class="control-label">Present Address<span class="req">*</span> </label>
                     <div class="mb15">
                        <textarea name="present_address" class="form-control" id="p1" rows="4" cols="50" required><?php echo (!empty($result[0]->present_address) ? $result[0]->present_address : ""); ?></textarea>
                     </div>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label style="padding-top: 0px;" class="control-label">Permanent Address ( <input type="checkbox" id="copy"> Same as present address) </label>
                     <div class="mb15">
                        <textarea name="permanent_address" id="p2" class="form-control" rows="4" cols="50" required><?php echo (!empty($result[0]->permanent_address) ? $result[0]->permanent_address : ""); ?></textarea>
                     </div>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Phone (Res)</label>
                     <input type="text" name="phone_res" value="<?php echo (!empty($result[0]->phone_res) ? $result[0]->phone_res : ""); ?>" class="form-control">
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Which of the following do you stay With/in ? <span class="req">*</span></label>
                     <select name="stay_with" class="form-control" required>
                        <option value="" disabled selected>--Select Option--</option>
                        <option <?php echo (!empty($result[0]->stay_with && $result[0]->stay_with == "Parents") ? 'selected' : ""); ?> value="Parents">Parents</option>
                        <option <?php echo (!empty($result[0]->stay_with && $result[0]->stay_with == "Relatives") ? 'selected' : ""); ?> value="Relatives">Relatives</option>
                        <option <?php echo (!empty($result[0]->stay_with && $result[0]->stay_with == "Hostel") ? 'selected' : ""); ?> value="Hostel">Hostel</option>
                        <option <?php echo (!empty($result[0]->stay_with && $result[0]->stay_with == "Mess") ? 'selected' : ""); ?> value="Mess">Mess</option>
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
                     <input type="text" name="father_info_name" value="<?php echo (!empty($result[0]->father_info_name)) ? $result[0]->father_info_name : "" ?>" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Name<span class="req">*</span></label>
                     <input type="text" name="mother_info_name" value="<?php echo (!empty($result[0]->mother_info_name)) ? $result[0]->mother_info_name : "" ?>" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Occupation<span class="req">*</span></label>
                     <input type="text" name="father_info_occupation" value="<?php echo (!empty($result[0]->father_info_occupation)) ? $result[0]->father_info_occupation : "" ?>" class="form-control" required >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Occupation<span class="req">*</span></label>
                     <input type="text" name="mother_info_occupation" value="<?php echo (!empty($result[0]->mother_info_occupation)) ? $result[0]->mother_info_occupation : "" ?>" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Designation<span class="req"></span></label>
                     <input type="text" name="father_info_designation" value="<?php echo (!empty($result[0]->father_info_designation)) ? $result[0]->father_info_designation : "" ?>" class="form-control" >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Designation</label>
                     <input type="text" name="mother_info_designation" value="<?php echo (!empty($result[0]->mother_info_designation)) ? $result[0]->mother_info_designation : "" ?>" class="form-control" >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Name of Institution/Organization/Office & Address<span class="req">*</span></label>
                     <input type="text" name="father_info_institution" value="<?php echo (!empty($result[0]->father_info_institution)) ? $result[0]->father_info_institution : "" ?>" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Name of Institution/Organization/Office & Address</label>
                     <input type="text" name="mother_info_institution" value="<?php echo (!empty($result[0]->mother_info_institution)) ? $result[0]->mother_info_institution : "" ?>" class="form-control" >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Phone (office)<span class="req">*</span></label>
                     <input type="text" name="father_info_phone" value="<?php echo (!empty($result[0]->father_info_phone)) ? $result[0]->father_info_phone : "" ?>" class="form-control" >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Phone (office)</label>
                     <input type="text" name="mother_info_phone" value="<?php echo (!empty($result[0]->mother_info_phone)) ? $result[0]->mother_info_phone : "" ?>" class="form-control">
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Monthly Income of Parents (Tk)<span class="req">*</span></label>
                     <input type="text" name="father_info_monthly_income" value="<?php echo (!empty($result[0]->father_info_monthly_income)) ? $result[0]->father_info_monthly_income : "" ?>" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Mobile <span class="req">*</span></label>
                     <input type="text" name="mother_info_mobile" value="<?php echo (!empty($result[0]->mother_info_mobile)) ? $result[0]->mother_info_mobile : "" ?>" class="form-control" required>
                  </div>
                  <div class="row">
                     <div class="col-sm-6 mb15" style="padding: 0px 10px 0 28px;">
                        <label class="control-label">Total Monthly Income of Family (Tk) <span class="req">*</span></label>
                        <input type="text" name="father_info_total_monthly_income" value="<?php echo (!empty($result[0]->father_info_total_monthly_income)) ? $result[0]->father_info_total_monthly_income : "" ?>" class="form-control" required>
                     </div>
                  </div>
                  
                  <div class="col-md-12 mb15">
                     <h5><strong class="color-size">Local Guardian</strong></h5>
                  </div>
                  
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Name<span class="req">*</span></label>
                     <input type="text" name="local_gurdian_name" value="<?php echo (!empty($result[0]->local_gurdian_name)) ? $result[0]->local_gurdian_name : "" ?>" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Relation<span class="req">*</span></label>
                     <input type="text" name="local_gurdian_relation" value="<?php echo (!empty($result[0]->local_gurdian_relation)) ? $result[0]->local_gurdian_relation : "" ?>" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Occupation<span class="req">*</span></label>
                     <input type="text" name="local_gurdian_occupation" value="<?php echo (!empty($result[0]->local_gurdian_occupation)) ? $result[0]->local_gurdian_occupation : "" ?>" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Designation<span class="req"></span></label>
                     <input type="text" name="local_gurdian_designation" value="<?php echo (!empty($result[0]->local_gurdian_designation)) ? $result[0]->local_gurdian_designation : "" ?>" class="form-control" >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Phone (Residence)</label>
                     <input type="text" name="local_gurdian_phone_res" value="<?php echo (!empty($result[0]->local_gurdian_phone_res)) ? $result[0]->local_gurdian_phone_res : "" ?>" class="form-control">
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Phone (office)</label>
                     <input type="text" name="local_gurdian_phone_off" value="<?php echo (!empty($result[0]->local_gurdian_phone_off)) ? $result[0]->local_gurdian_phone_off : "" ?>" class="form-control">
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Name of Institution/Organization/Office & Address<span class="req">*</span></label>
                     <textarea name="local_gurdian_institution" class="form-control" rows="4" cols="50" required><?php echo (!empty($result[0]->local_gurdian_institution)) ? $result[0]->local_gurdian_institution : "" ?></textarea>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Present Address <span class="req">*</span></label>
                     <textarea name="local_gurdian_address" class="form-control" rows="4" cols="50" required><?php echo (!empty($result[0]->local_gurdian_address)) ? $result[0]->local_gurdian_address : "" ?></textarea>
                  </div>
                  
                  <div class="col-md-12 mb15">
                     <h5><strong class="color-size">Information to be sent to</strong></h5>
                  </div>

                  <div class="col-sm-6 mb15">
                     <label class="control-label">Name<span class="req">*</span></label>
                     <input type="text" name="progress_report_name" value="<?php echo (!empty($result[0]->progress_report_name) ? $result[0]->progress_report_name : "") ?>" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Relationship<span class="req">*</span></label>
                     <input type="text" name="progress_report_relationship" value="<?php echo (!empty($result[0]->progress_report_relationship) ? $result[0]->progress_report_relationship : "") ?>" class="form-control" required>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Address<span class="req">*</span></label>
                     <textarea name="progress_report_address" class="form-control" rows="4" cols="50"><?php echo (!empty($result[0]->progress_report_address) ? $result[0]->progress_report_address : "") ?></textarea>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Phone (Residence)<span class="req">*</span></label>
                     <input type="text" name="progress_report_phone_res" value="<?php echo (!empty($result[0]->progress_report_phone_res) ? $result[0]->progress_report_phone_res : "") ?>" class="form-control" required>
                  </div>
                  <div class="col-md-12 mb15">
                     <h5><strong class="color-size">Co-curricular activities you took part while in high school</strong></h5>
                  </div>
                  <?php
                    $extra_activity = json_decode($result[0]->extra_activity);
                  ?>
                  
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Sports</label>
                     <input type="text" name="extra_activity[sports]" value="<?php echo (!empty($extra_activity->sports)) ? $extra_activity->sports : "" ?>" class="form-control">
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Clubs</label>
                     <input type="text" name="extra_activity[club]" value="<?php echo (!empty($extra_activity->club)) ? $extra_activity->club : "" ?>" class="form-control">
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Others</label>
                     <input type="text" name="extra_activity[others]" value="<?php echo (!empty($extra_activity->others)) ? $extra_activity->others : "" ?>" class="form-control">
                  </div>
               </div>
                <div class="col-md-12 mb15">
                    <h5><strong class="color-size">Subjects you wish to study at Notre Dame College Mymensingh</strong></h5>
                </div>
               <div class="col-md-6 clearfix">
                  <div class="row">
                     <div class="col-sm-12 mb15">
                        <div class="row">
                           <label class="control-label"> Group<span class="req">*</span></label>
                           <select style="margin-bottom: 10px;" name="group" class="form-control" ng-model="group" ng-init="group='<?php echo $result[0]->group; ?>'" ng-change="getSubjectFn()" required>
                                <option value="" selected disabled>&nbsp;</option>
                                <option <?php echo (!empty($result[0]->group) && $result[0]->group == "science") ? "selected" : "" ?> value="science">Science</option>
                                <option <?php echo (!empty($result[0]->group) && $result[0]->group == "humanities") ? "selected" : "" ?> value="humanities">Humanities</option>
                                <option <?php echo (!empty($result[0]->group) && $result[0]->group == "business studies") ? "selected" : "" ?> value="business studies">Business Studies</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6"></div>
               <div class="col-md-12 clearfix">
                   <?php
                        $optional_subject   = json_decode($result[0]->optional);
                        $compulsory_subject = json_decode($result[0]->compulsory);
                   ?>
                  <div class="row" ng-cloak>
                     <table class="table table-bordered text-center table-custome">
                        <tr>
                           <!--<th width="100" style="text-align: center;">Subject </th>-->
                           <th colspan="6" style="text-align: center;">Compulsory</th>
                           <th style="text-align: center;">Optional</th>
                        </tr>
                        <tr>
                           <!--<td style="background: #15749c;color: #fff;">Name  </td>-->
                           <td><input type="text" name="compulsory_subject[]"  value="BANGLA" readonly></td>
                           <td><input type="text" name="compulsory_subject[]"  value="ENGLISH" readonly></td>
                           <td><input type="text" name="compulsory_subject[]"  value="ICT" readonly required></td>
                           <td>
                               <input ng-if="group == 'science'" type="text" name="compulsory_subject[]" value="Physics" readonly>
                               <input ng-if="group == 'humanities'" type="text" name="compulsory_subject[]" value="History" readonly>
                               <input ng-if="group == 'business studies'" type="text" name="compulsory_subject[]" value="Accounting" readonly>
                            </td>
                           <td>
                               <input ng-if="group == 'science'" style="width: 60%;" type="text" name="compulsory_subject[]" value="Chemistry" readonly required>
                               <input ng-if="group == 'humanities'" style="width: 60%;" type="text" name="compulsory_subject[]" value="Civics" readonly required>
                               <input ng-if="group == 'business studies'" style="width: 60%;" type="text" name="compulsory_subject[]" value="Business Organization and Management" readonly required>
                            </td>

                           <td>
                                <select 
                                    name="compulsory_subject[]" 
                                    class="form-control" required>
                                    <option value="" disabled>--Select Subject--</option>
                                    <?php foreach(config_item('edit_optional_subject') as $key => $value){ ?>
                                        <option <?php echo (!empty($compulsory_subject[5]->subject) && $compulsory_subject[5]->subject == $key) ? 'selected' : ""; ?> value="<?php echo $key; ?>" ><?php echo $key; ?></option>
                                    <?php } ?>
                                  </select>
                           </td>
                           
                           <td>
                            <select 
                                 name="optional_subject" 
                                 class="form-control" required>
                                <option value="" disabled>--Select Subject--</option>
                                  <?php foreach(config_item('edit_optional_subject') as $key => $value){ ?>
                                        <option <?php echo (!empty($optional_subject->subject) && $optional_subject->subject == $key) ? 'selected' : ""; ?> value="<?php echo $key; ?>" ><?php echo $key; ?></option>
                                    <?php } ?>
                              </select>
                           </td>
                           
                        </tr>
                        <tr>
                           <!--<td style="background: #15749c;color: #fff;">Code </td>-->
                           <td><input type="text" name="compulsory_code[]" value="101" readonly></td>
                           <td><input type="text" name="compulsory_code[]" value="107" readonly></td>
                           <td><input type="text" name="compulsory_code[]" value="275" readonly></td>
                           
                           <td>
                               <input ng-if="group == 'science'" type="text" name="compulsory_code[]" value="174" readonly>
                               <input ng-if="group == 'humanities'" type="text" name="compulsory_code[]" value="304" readonly>
                               <input ng-if="group == 'business studies'" type="text" name="compulsory_code[]" value="253" readonly>
                            </td>
                           <td>
                               <input ng-if="group == 'science'" type="text" name="compulsory_code[]" value="176" readonly>
                               <input ng-if="group == 'humanities'" type="text" name="compulsory_code[]" value="269" readonly>
                               <input ng-if="group == 'business studies'" type="text" name="compulsory_code[]" value="277" readonly>
                            </td>
                           <td>
                               <select 
                                 name="compulsory_code[]"
                                 class="form-control" required>
                                  <option value="" disabled>--Select Code--</option>
                                  <?php foreach(config_item('edit_optional_subject') as $key => $value){ ?>
                                        <option <?php echo (!empty($compulsory_subject[5]->code) && $compulsory_subject[5]->code == $value) ? 'selected' : ""; ?> value="<?php echo $value; ?>" ><?php echo $key.'-'.$value; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                           
                           <td>
                               <select 
                                 name="optional_code" 
                                 class="form-control" required>
                                   <option value="" disabled>--Select Code--</option>
                                  <?php foreach(config_item('edit_optional_subject') as $key => $value){ ?>
                                        <option <?php echo ($optional_subject->code == $value) ? 'selected' : ""; ?> value="<?php echo $value; ?>" ><?php echo $key.'-'.$value; ?></option>
                                    <?php } ?>
                                </select>
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
               
               <!--<div class="form-group" ng-if="group">
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
               </div>-->
               <input type="hidden" name="students_photo" class="form-control" value="<?php echo $get_student_photo[0]->photo;?>">
               
               <div class="col-md-12">
                  <div class="row">
                     <div class="btn-group pull-right">
                        <input type="submit" value="Update" name="student_submit" class="btn btn-success">
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
    
    $(function() {
        $("#datepicker").datepicker();
    });
    
    $("#datepicker").datepicker({
      dateFormat: "yy-mm-dd"
    });
</script>

