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
	                <label class="col-md-2 control-label">বছর<span class="req">*</span></label>
	                <div class="col-md-5">
	                    <select name="search[payment_year]" class="form-control" required>
	                       <option value="">-- Select Section--</option>
	                       <?php foreach ($years as $key => $value) { ?>
	                       <option value="<?php echo $value->payment_year; ?>"><?php echo $value->payment_year; ?></option>
	                       <?php } ?>
	                   </select>
	                </div>
    	        </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">শ্রেণী <span class="req">&nbsp;</span></label>
                    <div class="col-md-5">
                        <select name="search[payment_class]" class="form-control">
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
                        <select name="section" class="form-control">
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
            	<!--pre>
		<?php //print_r($info[0]); ?>
		</pre-->
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
                  <?php foreach($info as $key => $row){
                  	$where = array("reg_id" => $row->students_id);
			$student_info = $this->action->read("registration",$where);
			$total = array();
                  ?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $student_info[0]->bg_student_name; ?></td>
                        <td><?php echo $row->student_id; ?></td>
                        <td><?php echo $row->payment_class; ?></td>
                        <td><?php echo $total[] = fild_sum_byID($row->student_id,"monthly_tution_fee"); ?></td>
                        <td><?php echo $total[] = fild_sum_byID($row->student_id,"dining_bill"); ?></td>
                        <td><?php echo $total[] = fild_sum_byID($row->student_id,"resedintial_charge"); ?></td>
                        <td><?php echo $total[] = fild_sum_byID($row->student_id,"transport_bill"); ?></td>
                        <td><?php echo $total[] = fild_sum_byID($row->student_id,"generator_chage"); ?></td>
                        <td><?php echo $total[] = fild_sum_byID($row->student_id,"day_care_fee"); ?></td>
                        <td><?php echo $total[] = (fild_sum_byID($row->student_id,"monthly_exam")+fild_sum_byID($row->student_id,"semester_anual_exam")); ?></td>
                        <td><?php echo $total[] = fild_sum_byID($row->student_id,"ac_charge"); ?></td>
                        <td><?php echo $total[] = fild_sum_byID($row->student_id,"renewal_fee_old"); ?></td>
                        <td><strong><?php echo array_sum($total);?></strong></td>
                    </tr>
                    <?php } ?>                
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

