<style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer, input[type="checkbox"]{
            display: none !important;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .hide{
            display: block !important;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">
        	
     <!--pre><?php // print_r($due_data); ?></pre-->
     <!--pre><?php // print_r($allStudents); ?></pre-->
 	<?php echo $confirmation; ?>
	
   <div class="panel panel-default none">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>বকেয়ার তালিকা</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php 
                  $attr = array("class" =>"form-horizontal");
                  echo form_open("",$attr);
                ?>
                
                    <div class="form-group">                       
                       <label class="col-md-2 control-label">শিক্ষাবর্ষ<span class="req">&nbsp;</span></label>
                       <div class="col-md-5">
                            <select name="search[session]" class="form-control">
                              <option value="">-- নির্বাচন করুন --</option>
                              <option value="2017">2017</option>
                              <option value="2018">2018</option>
                            </select>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-2 control-label">শ্রেণী<span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <select name="search[class]"  class="form-control">
                                <option value="">-- নির্বাচন করুন --</option>
								<option value="প্লে">প্লে</option>
								<option value="নার্সারি">নার্সারি</option>
								<option value="প্রথম">প্রথম</option>
								<option value="দ্বিতীয়">দ্বিতীয়</option>
								<option value="তৃতীয়">তৃতীয়</option>
								<option value="চতুর্থ">চতুর্থ</option>
								<option value="পঞ্চম">পঞ্চম</option>
								<option value="ষষ্ঠ">ষষ্ঠ</option>
								<option value="হিফজুল কুরআন">হিফজুল কুরআন</option>
								<option value="নাজেরা বিভাগ">নাজেরা বিভাগ</option>
								<option value="নূরানি বিভাগ">নূরানি বিভাগ</option>
							</select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">শাখা<span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <select name="search[section]" class="form-control">
                              <option value="">-- নির্বাচন করুন --</option>
                              <option value="মক্কা">মক্কা</option>
                              <option value="মদিনা">মদিনা</option>
                              <option value="বুখারী">বুখারী</option>
                              <option value="মুসলিম">মুসলিম</option>
                              <option value="তিরমিযি">তিরমিযি</option>
                              <option value="নাই">নাই</option>
                          </select>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="btn-group pull-right">
                            <input type="submit" value="দেখুন"  name="show"   class="btn btn-primary">
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
      </div>
        
   
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title ">
                    <h1 class="pull-left">ফলাফল</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> <?php echo caption('Print'); ?></a>
                </div>
            </div>

            <div class="panel-body">

                <!-- Print Banner -->
                <img class="img-responsive hide print-banner" src="<?php echo site_url('private/images/print-banner.jpg'); ?>">
                <?php 
                echo form_open("");
                ?>
                <p class="text-center hide">বকেয়ার তালিকা</p>
                <table class="table table-bordered table2">
                    <tr>
                        <th width="80"><label><input type="checkbox" checked id="check-all"/> <?php echo caption('SL'); ?></label></th>                      
                        <th><?php echo caption('Name'); ?></th>
                        <th>আইডি</th>
                        <th><?php echo caption('Class'); ?></th>
                        <th><?php echo caption('Section'); ?></th>
                        <th>বকেয়ার মাস</th>
                        <th>বছর</th>                     
                        <th><?php echo caption('Mobile'); ?></th>
                        <th>মন্তব্য</th> 
                    </tr>
                    
                    <?php 
                    foreach($due_data  as  $key => $id){
					$info = $this->action->joinAndRead("registration","admission","registration.reg_id = admission.student_id", array("admission.student_id" => $id));	            
					$month = config_item("months_num");
					
                    ?>
                    <tr>
                        <td><label><input type="checkbox" name="mobiles[]" checked value="<?php  if($info != NULL) {  echo $info[0]->guardian_mobile; } ?>"/> <?php echo $key + 1; ?></label></td>                      
                        <td><?php  if($info != NULL) {  echo  $info[0]->bg_student_name; } ?></td>
                        <td><?php  if($info != NULL) {  echo $info[0]->student_id; } ?></td>
                        <td><?php  if($info != NULL) {  echo $info[0]->class; } ?></td>
                        <td><?php  if($info != NULL) {  echo $info[0]->section; } ?></td>
                        <td><?php  echo $month[intval(date("m"))]; ?></td>
                        <td><?php  echo date("Y"); ?></td>
                        <td><?php  if($info != NULL) {  echo $info[0]->guardian_mobile; } ?></td>
                        <td></td>                        
                        <!--td><?php  if($info != NULL) {  echo $info[0]->session; } ?></td-->
                        
                    </tr>
                    <?php }  ?>
                </table>
                <div class="form-group">
                   <div class="row">
                    <div class="col-md-10">
                        <textarea name="msg" class="form-control"></textarea>
                    </div>
                    <div class="col-md-2">
                        <input name="sendSms" class="btn btn-primary" type="submit" value="Send" >
                    </div>
                    </div>
                </div>
                <?php echo form_close();?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script>
//--------------------------------------------------------------
//-----------------------Check All Start here-------------------
//--------------------------------------------------------------
$(document).ready(function(){
  $("#check-all").on('change', function(event) {
      if($("#check-all").is(":checked")){
        $('input[name="mobiles[]"]').prop("checked", true);
      }else{
        $('input[name="mobiles[]"]').prop("checked", false);
      }
  });
});
//--------------------------------------------------------------
//-----------------------Check All End here---------------------
//--------------------------------------------------------------
</script>
