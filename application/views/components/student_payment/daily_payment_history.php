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
    }
</style>

<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default none">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>দৈনিক পেমেন্ট হিস্ট্রি</h1>
                </div>
            </div>

            <div class="panel-body">

                <?php
                $attr=array(
                    'class'=>'form-horizontal'
                    );
                echo form_open('',$attr);?>

                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo caption('Class'); ?> <span class="req">&nbsp;</span></label>

                        <div class="col-md-5">
                            <select name="search[payment_class]" class="form-control">
                                <option value="">-- <?php echo caption('Select'); ?> --</option>
                                <?php 
                                    foreach(config_item('classes') as $key => $value){?>
                                        <option  value="<?php echo $key; ?>"><?php echo $key; ?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                     <div class="form-group">
                        <label class="col-md-2 control-label"> আইডি <span class="req">&nbsp;</span></label>

                        <div class="col-md-5">
                            <input name="search[students_id]" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo caption('Form'); ?></label>

                        <div class="input-group date col-md-5" id="datetimepickerFrom">
                            <input type="text" name="date[from]" class="form-control" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo caption('To'); ?></label>

                        <div class="input-group date col-md-5" id="datetimepickerTo">
                            <input type="text" name="date[to]" class="form-control" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>

                    </div>

                    <div class="col-md-7">
                        <div class="btn-group pull-right">
                            <input type="submit" name="submit_daily" value="<?php echo caption('Show_btn'); ?>" class="btn btn-primary">
                        </div>
                    </div> 

                <?php echo form_close(); ?>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>



        <?php if ($daily_payment!=null) { ?>
        <div class="panel panel-default">  
            
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left"><?php echo caption('Show_Result'); ?></h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> <?php echo caption('Print'); ?></a>
                </div>
            </div>

            <div class="panel-body">
                
                <!-- Print Banner -->
                <img class="img-responsive print-banner hide" src="<?php echo site_url('private/images/print-banner.jpg'); ?>" alt="Photo not found...!">

                <hr class="hide" style="border-bottom: 2px solid #ccc; margin-top:5px; ">
                <h4 class="text-center hide" style="margin-top: -10px;">দৈনিক পেমেন্ট হিস্ট্রি</h4>



                 <table class="table table-bordered">
                    <tr>
                        <th><?php echo caption('SL'); ?></th>
                        <th><?php echo 'নাম'; ?></th>
                        <th><?php echo 'শ্রেণী'; ?></th>
                        <th>শাখা</th>
                        <th><?php echo 'আইডি'; ?></th>
                        <th>পেমেন্টের তারিখ</th>
                        <th><?php echo 'টাকা'; ?></th>
                        <th>আদায়কারী</th>
                        <th class="none"><?php echo caption('Action'); ?></th>
                    </tr>
                    <?php 
                     //print_r($daily_payment );
                     $total=$final_total=0;
                     foreach ($daily_payment as $key => $value) {
                     $info = $this->action->read("registration",array("reg_id" => $value->students_id));
                     ?>
                         <tr>
                            <td><?php echo $key+1;?></td>
                            <td><?php echo $info[0]->bg_student_name; ?></td>
                            <td><?php echo $value->payment_class; ?></td>
                            <td>
                                <?php
                                    $group = $this->action->read('admission', array('student_id'=>$value->students_id));
                                    if($group[0]->group=='none'){
                                    	echo 'নাই';
                                    }else{
                                    	echo $group[0]->group;
                                    }
                                    
                                ?>
                            </td>
                            <td><?php echo $value->students_id; ?></td>
                            <td><?php echo $value->payment_date; ?></td>
                            <td>
                               <?php foreach ($value as $k => $v) {                                                          
                                  if (!in_array($k, $not_except) && $v != null) {
                                     $total+=$v;
                                      }
                                    }
                                    $total-=$value->current_due;
                                    $final_total+=$total;
                                    echo $total; 
                                    $total=0;
                                 ?>
                              </td>
                              <td><?php echo filter($value->collected_by);  ?></td>
                              <td class="none">
                              	<a class="btn btn-primary" href="<?php echo site_url("student_payment/payment/paymentSlipView?id=".$value->id."&student_id=".$value->students_id);?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                              </td>
                        </tr>
                    <?php } ?>

                    <tr>
                      <th colspan="6" style="text-align:right;"><?php echo caption('Total'); ?></th>
                      <td><strong><?php echo $final_total;?></strong> <?php echo caption('Tk'); ?></td>
                       <th colspan="2"></th>
                     </tr>
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    <?php } ?>
    </div>
</div>
<script>
    // linking between two date
    $('#datetimepickerFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false

    });
    $('#datetimepickerTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $("#datetimepickerFrom").on("dp.change", function (e) {
        $('#datetimepickerTo').data("DateTimePicker").minDate(e.date);
    });
    $("#datetimepickerTo").on("dp.change", function (e) {
        $('#datetimepickerFrom').data("DateTimePicker").maxDate(e.date);
    });
</script>
