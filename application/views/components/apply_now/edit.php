<!-- file upload -->
<!-- Bootstrap Date Picker -->
<!-- includ moment for bootstrap calander -->
<script type="text/javascript" src="<?php echo site_url('public/bootstrap-datetimepicker-master/js/moment.js'); ?>"></script>
<script type="text/javaScript" src="<?php echo site_url('public/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('public/js/bootstrap.js'); ?>"></script>
<link href="<?php echo site_url('private/plugins/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.min.css'); ?>" rel="stylesheet">
<!-- Bootstrap file upload CSS -->
<link href="<?php echo site_url('private/plugins/bootstrap-fileinput-master/css/fileinput.min.css'); ?>" rel="stylesheet">
<!-- Select Option 2 Stylesheet -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />

    
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
               <h4>Edit Student's Information.</h4>
            </div>
         </div>
         <div class="panel-body">
            <div class="" ng-controller="edit_registrationCtrl">
                <?php
                    $attr=array('class'=>'form-horizontal');
                    echo form_open_multipart('online_registration/edit_online_registration/', $attr);
                ?>
               <h5><strong class="color-size">Form to be Filled up in BLOCK LETTERS (in English)</strong></h5>
               <div class="text-right">
                   <?php 
                        $get_student_photo = $this->retrieve->read('student_id_password', array('student_id'=> $result[0]->college_id));
                   ?>
                   <img style="width: 10%;" src="<?php echo site_url($result[0]->photo); ?>">
               </div>
               <div class="form-group">
                  <div class="col-md-6">
                     <label style="padding-top: 0;" class="control-label"> Name of Student (in English) <!--as your SSC Exam Admit Card--></small>)<span class="req">*</span></label>
                     <input type="text" name="name_english" class="form-control" value="<?php echo (!empty($result[0]->name_english)) ? $result[0]->name_english : ''; ?>"  required >
                     <input type="hidden" name="student_id" ng-init="studentId='<?php echo (!empty($result[0]->id)) ? $result[0]->id : ''; ?>'" class="form-control" value="<?php echo (!empty($result[0]->id)) ? $result[0]->id : ''; ?>" >
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Name of Student (বাংলায়)</label>
                     <input type="text" name="name_bangla" class="form-control" value="<?php echo (!empty($result[0]->name_bangla)) ? $result[0]->name_bangla : ''; ?>">
                  </div>
               </div>
               
               <div class="form-group">

                  <div class="col-md-12 mb15">
                     <h5><strong class="color-size">General Information (Student)</strong></h5>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Date Of Birth <span class="req">*</span></label>
                     <div class="input-group date" id="datetimepicker1">
                        <input type="text" class="form-control" name="birth_date" value="<?php echo (!empty($result[0]->birth_date)) ? $result[0]->birth_date : ""; ?>" placeholder="YYYY-MM-DD" required>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
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
                        <textarea name="permanent_address" id="p2" class="form-control" rows="4" cols="50"><?php echo (!empty($result[0]->permanent_address) ? $result[0]->permanent_address : ""); ?></textarea>
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
                     
                     <select name="father_info_occupation" class="form-control" required>
                    	<option selected disabled value="">--নির্বাচন করুন--</option>
                    	<option <?php echo ($result[0]->father_info_occupation=='ফার্মার' ? 'selected' : ''); ?> value="ফার্মার">ফার্মার</option>
                    	<option <?php echo ($result[0]->father_info_occupation=='টিচার' ? 'selected' : ''); ?> value="টিচার">টিচার</option>
                    	<option <?php echo ($result[0]->father_info_occupation=='বিজনেস' ? 'selected' : ''); ?> value="বিজনেস">বিজনেস</option>
                    	<option <?php echo ($result[0]->father_info_occupation=='সার্ভিস হোল্ডার' ? 'selected' : ''); ?> value="সার্ভিস হোল্ডার">সার্ভিস হোল্ডার</option>
                    	<option <?php echo ($result[0]->father_info_occupation=='লেবার' ? 'selected' : ''); ?> value="লেবার">লেবার</option>
                    	<option <?php echo ($result[0]->father_info_occupation=='others' ? 'selected' : ''); ?> value="others">others</option>
                    </select>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Occupation<span class="req">*</span></label>
                     
                     <select name="mother_info_occupation" class="form-control" required="">
                    	<option selected disabled value="">--নির্বাচন করুন--</option>
                    	<option <?php echo ($result[0]->mother_info_occupation=="হাউজ ওয়াইফ" ? 'selected' : '' ); ?> value="হাউজ ওয়াইফ">হাউজ ওয়াইফ</option>
                    	<option <?php echo ($result[0]->mother_info_occupation=="টিচার" ? 'selected' : '' ); ?> value="টিচার">টিচার</option>
                    	<option <?php echo ($result[0]->mother_info_occupation=="সার্ভিস হোল্ডার" ? 'selected' : '' ); ?> value="সার্ভিস হোল্ডার">সার্ভিস হোল্ডার</option>
                    	<option <?php echo ($result[0]->mother_info_occupation=="Others" ? 'selected' : '' ); ?> value="Others">Others</option>
                    </select>
                  </div>
                  
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Mobile <span class="req">*</span></label>
                     <input type="text" name="mother_info_mobile" value="<?php echo (!empty($result[0]->mother_info_mobile)) ? $result[0]->mother_info_mobile : "" ?>" class="form-control" required>
                  </div>
                  
                  
                  <div class="col-md-12 mb15">
                     <h5><strong class="color-size">Local Guardian</strong></h5>
                  </div>
                  
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Name</label>
                     <input type="text" name="local_gurdian_name" value="<?php echo (!empty($result[0]->local_gurdian_name)) ? $result[0]->local_gurdian_name : "" ?>" class="form-control">
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Relation</label>
                     <input type="text" name="local_gurdian_relation" value="<?php echo (!empty($result[0]->local_gurdian_relation)) ? $result[0]->local_gurdian_relation : "" ?>" class="form-control">
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Occupation</label>
                     <input type="text" name="local_gurdian_occupation" value="<?php echo (!empty($result[0]->local_gurdian_occupation)) ? $result[0]->local_gurdian_occupation : "" ?>" class="form-control">
                     
                  </div>
                  
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Present Address</label>
                     <textarea name="local_gurdian_address" class="form-control" rows="4" cols="50"><?php echo (!empty($result[0]->local_gurdian_address)) ? $result[0]->local_gurdian_address : "" ?></textarea>
                  </div>
                  
               </div>
               
                <div class="col-md-12 mb15">
                    <div class="row">
                        <h5><strong class="color-size">Subjects you wish to study at bangabandhu govt college mymensingh</strong></h5>
                    </div>
                </div>
                
               <div class="col-md-6 clearfix">
                  <div class="row">
                     <div class="col-sm-12 mb15">
                        <div class="row">
                           <label class="control-label"> Group<span class="req">*</span></label>
                           
                           <select style="margin-bottom: 10px;" name="group" class="form-control" ng-model="group" ng-init="group='<?php echo $result[0]->group; ?>'" required>
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
                  <div class="row" ng-cloak>
                     <table class="table table-bordered text-center table-custome">
                        <tr>
                           <th colspan="6" style="text-align: center;">Compulsory</th>
                           <th style="text-align: center;">Optional</th>
                        </tr>
                        <tr>
                           <td><input type="text" name="compulsory_subject_one" value="BANGLA" readonly></td>
                           <td><input type="text" name="compulsory_subject_two" value="ENGLISH" readonly></td>
                           <td><input type="text" name="compulsory_subject_three" value="ICT" readonly required></td>
                           <td>
                               <select 
                                     ng-show="group == 'humanities'"
                                     name="compulsory_subject_four" 
                                     ng-model="chose3rd"
                                     ng-options="cho[0] for cho in chose_3 track by cho[0]"
                                     ng-change="getSubjectCodeFn('chose_3')"
                                     class="form-control">
                                    <option value=""  disabled>--Select Subject--</option>                                    
                                </select>
                                  
                               <input ng-if="group == 'science'" type="text" name="compulsory_subject_four" value="Physics" readonly>
                               <input ng-if="group == 'business studies'" type="text" name="compulsory_subject_four" value="Accounting" readonly>
                            </td>
                           <td>
                               
                          <select 
                             ng-show="group == 'humanities'"
                             name="compulsory_subject_five" 
                             ng-model="chose2nd" 
                             ng-options="cho[0] for cho in chose_2 track by cho[0]"
                             ng-change="getSubjectCodeFn('chose_2')" 
                             class="form-control">
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
                                     class="form-control" ng-required="true">
                                    <option value="" selected disabled>--Select Subject--</option>                                    
                                  </select>
                           </td>
                           
                           <td>
                            <select 
                                 name="optional_subject" 
                                 ng-model="optional_chose" 
                                 ng-options="cho[0] for cho in optional track by cho[0]"
                                 ng-change="getSubjectCodeFn('optional')" 
                                 class="form-control" ng-required="true">
                                 <option value="" selected disabled>--Select Subject--</option>
                              </select>
                           </td>
                           
                        </tr>
                        <tr>
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
                           <td>
                               <input type="text" name="compulsory_code_six" ng-value="code.chose1st" readonly></td>
                           
                           <td>
                               <input type="text" name="optional_code" ng-value="code.optional" readonly>
                           </td>
                        </tr>
                     </table>
                  </div>
               </div>
               
               <div class="form-group">
                  <div class="col-sm-offset-6 col-sm-6 mb15">
                     <label class="control-label">
                     Student's Photo (300x300px)
                    
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
    
    $('#datetimepicker1').datetimepicker({
         format: 'YYYY-MM-DD'
    });  
    
    $('#datetimepicker2').datetimepicker({
         format: 'YYYY-MM-DD'
    });
    
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

