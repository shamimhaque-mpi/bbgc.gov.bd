<style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer {
            display: none !important;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .panel .hide{
            display: block !important;
        }
        .title{
            font-size: 25px;        
        }
        .print-width-fixed{white-space: nowrap;}
    }
</style>

<div class="container-fluid">
    <div class="row">
    <?php //echo "<pre>"; print_r($info); echo "</pre>"; ?>
    <?php echo $confirmation; ?>
    
    
        <div class="panel panel-default none">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>শিক্ষার্থী বেতন খাত খুঁজুন</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php
                $attribute = array('class' => 'form-horizontal');
                echo form_open('', $attribute);
                ?>

                <div class="form-group">
	                <label class="col-md-2 control-label">সেশন<span class="req">*</span></label>
	                <div class="col-md-5">
	                    <select name="search[session]" class="form-control" required>
	                       <option value="">-- Select Session--</option>
	                       <?php foreach ($years as $key => $value) { ?>
	                       <option value="<?php echo $value->session; ?>"><?php echo $value->session; ?></option>
	                       <?php } ?>
	                   </select>
	                </div>
    	        </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">শ্রেণী <span class="req">&nbsp;</span></label>
                    <div class="col-md-5">
                        <select name="search[class]" class="form-control">
                            <option value="">-- Select Class--</option>
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
                    <label class="col-md-2 control-label">শাখা <span class="req">&nbsp;</span></label>
                    <div class="col-md-5">
                        <select name="search[section]" class="form-control">
                            <option value="">-- Select Class--</option>
                            <?php 
                                foreach(config_item('section') as $key => $value){?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php
                                }
                            ?>
                        </select>
                    </div>
    	        </div>
    	        
                <div class="form-group">
                    <label class="col-md-2 control-label">ধরন <span class="req">&nbsp;</span></label>
                    <div class="col-md-5">
                        <select name="type" class="form-control">
                            <option value="1">মাসিক</option>
                            <option value="12">বার্ষিক</option>
                        </select>
                    </div>
    	        </div>

                
                    
                <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" value="<?php echo caption('Show_btn'); ?>" name="find" class="btn btn-primary">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        
        
        
        
        <?php if($info != null){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">বেতন খাত</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> <?php echo caption('Print'); ?></a>
                </div>
            </div>

            <div class="panel-body">
                <!-- Print Banner -->
                <img class="img-responsive print-banner hide" src="<?php echo site_url('private/images/print-banner.jpg'); ?>" alt="Photo not found...!">

                <h4 class="text-center hide"  style="margin-top: 0px;">শিক্ষার্থী বেতন খাত</h4>
                <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th><?php echo caption('SL'); ?></th>
                        <th>নাম </th>
                        <th>আই ডি নং</th>
                        <th>ক্লাস </th>
                        <th>মাসিক বেতন</th>
                        <th>ডাইনিং বিল</th>
                        <th>আবাসিক চার্জ</th>
                        <th>পরিবহন</th>
                        <th>জেনারেটর</th>
                        <th>ডে-কেয়ার/কোচিং </th>
                        <th>পরীক্ষা ফি </th>
                        <th>এসি চার্জ</th>
                        <th>নবায়ন</th> 
                        <th>সর্ব মোট</th>
                    </tr>
                  <?php
                  	$type = $this->input->post("type");
                  	$intotal = $total_tution_fee = $total_dining_bill = $total_resedintial_charge = $total_transport_bill = $total_generator_chage = $total_day_care_fee = $total_all_exam = $total_ac_charge = $total_renewal_fee_old = array();
                  	foreach($info as $key => $row){
			$total = array();
                  ?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $row->bg_student_name; ?></td>
                        <td><?php echo $row->student_id; ?></td>
                        <td><?php echo $row->class; ?></td>
                        <td>
                        	<?php
                        		$tution_fee = get_amount("monthly_tution_fee",$row->class,$row->residential,$type,$row->student_id); 
                        		echo $total[] = $tution_fee;
                        		$total_tution_fee[] = $tution_fee;
                        	?>
                        </td>
                        <td>
                        	<?php 
                        		$dining_bill = get_amount("dining_bill",$row->class,$row->residential,$type,$row->student_id); 
                        		echo $total[] = $dining_bill;
                        		$total_dining_bill[] = $dining_bill;
                        	?>
                        </td>
                        <td>
                        	<?php 
                        		$resedintial_charge = get_amount("resedintial_charge",$row->class,$row->residential,$type,$row->student_id); 
                        		echo $total[] = $resedintial_charge;
                        		$total_resedintial_charge[]=$resedintial_charge;
                        	?>
                        </td>
                        <td>
                        	<?php
                        		$transport_bill = get_amount("transport_bill",$row->class,$row->residential,$type,$row->student_id);
                        		echo $total[] = $transport_bill;
                        		$total_transport_bill[] = $transport_bill;
                        	?>
                        </td>
                        <td>
                        	<?php
                        		$generator_chage = get_amount("generator_chage",$row->class,$row->residential,$type,$row->student_id);
                        	 	echo $total[] = $generator_chage;
                        	 	$total_generator_chage[] = $generator_chage;
                        	 ?>
                        </td>
                        <td>
                        	<?php 
                        		$day_care_fee = get_amount("day_care_fee",$row->class,$row->residential,$type,$row->student_id);
                        		echo $total[] = $day_care_fee;
                        		$total_day_care_fee[] = $day_care_fee;
                        	?>
                        </td>
                        <td>
                        	<?php
                        		$total_exam = (get_amount("monthly_exam",$row->class,$row->residential,$type,$row->student_id)+get_amount("semester_anual_exam",$row->class,$row->residential,$type,$row->student_id)); 
                        		$total_exam = ($total_exam==0)?"":$total_exam;
                        		echo $total[] = $total_exam;
                        		$total_all_exam[] = $total_exam;
                        	?>
                        </td>
                        <td>
                        	<?php 
                        		$ac_charge = get_amount("ac_charge",$row->class,$row->residential,$type,$row->student_id); 
                        		echo $total[] = $ac_charge;
                        		$total_ac_charge[] = $ac_charge;
                        	?>
                        </td>
                        <td>
                        	<?php
                        		$renewal_fee_old = get_amount("renewal_fee_old",$row->class,$row->residential,$type,$row->student_id);
                        		echo $total[] = $renewal_fee_old;
                        		$total_renewal_fee_old[] = $renewal_fee_old;
                        	?>
                        </td>
                        <td><strong><?php echo $intotal[] = array_sum($total);?></strong></td>
                    </tr>
                    <?php } ?>
                    <tr>
                    	<th colspan="4">সর্বমোট</th>
                    	<th><?php echo array_sum($total_tution_fee);?></th>
                    	<th><?php echo array_sum($total_dining_bill);?></th>
                    	<th><?php echo array_sum($total_resedintial_charge);?></th>
                    	<th><?php echo array_sum($total_transport_bill);?></th>
                    	<th><?php echo array_sum($total_generator_chage);?></th>
                    	<th><?php echo array_sum($total_day_care_fee);?></th>
                    	<th><?php echo array_sum($total_all_exam);?></th>
                    	<th><?php echo array_sum($total_ac_charge);?></th>
                    	<th><?php echo array_sum($total_renewal_fee_old);?></th>
                    	<th><?php echo array_sum($intotal);?></th>
                    </tr>
                    </table>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php } ?>
    </div>
</div>

<script>
    // linking between two date
    $('#datetimepickerSMSFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerSMSTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $("#datetimepickerSMSFrom").on("dp.change", function (e) {
        $('#datetimepickerSMSTo').data("DateTimePicker").minDate(e.date);
    });
    $("#datetimepickerSMSTo").on("dp.change", function (e) {
        $('#datetimepickerSMSFrom').data("DateTimePicker").maxDate(e.date);
    });
</script>

