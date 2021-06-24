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
        .hide{
       	 display: block !important;
        }
       
    }
</style>

<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default none">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1><?php echo caption('Payment_Histroy'); ?></h1>
                </div>
            </div>

            <div class="panel-body">

                <?php 
                $attr=array('class'=>'form-horizontal');
                echo form_open('', $attr); ?>


                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo caption('Year'); ?></label>

                        <div class="col-md-5">
                            <select name="search[payment_year]" class="form-control">
                                <option value="">-- <?php echo caption('Select'); ?> --</option>
                                <?php
                                 for($i=date("Y")-2; $i<=date("Y")+10;$i++)
                                 {
                                    ?>
                                     <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php
                                 } 
                                 ?>      
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo caption('Class'); ?></label>

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
                        <label class="col-md-2 control-label"><?php echo caption('Section'); ?></label>

                        <div class="col-md-5">
                            <select name="section" class="form-control">
                                <option value="">-- <?php echo caption('Select'); ?> --</option>
                                <?php 
                                    foreach(config_item('section') as $key => $value){?>
                                        <option  value="<?php echo $key; ?>"><?php echo $key; ?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">আবাসিক/অনাবাসিক</label>

                        <div class="col-md-5">
                            <select name="residential" class="form-control">
                                <option value="yes">আবাসিক</option>
                                <option value="no">অনাবাসিক</option>
                            </select>
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
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo caption('Student_ID'); ?></label>
                        <div class="col-md-5">
                            <input type="text" placeholder="<?php echo caption('Type_Students_ID_Number'); ?>" name="search[students_id]" class="form-control">
                        </div>
                    </div>


                    <div class="col-md-7">
                        <div class="btn-group pull-right">
                            <input type="submit" value="<?php echo caption('Show_btn'); ?>" name="viewQuery" class="btn btn-primary">
                        </div> 
                    </div>

                <?php echo form_close(); ?>

            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php  if ($all_payment!=null) { ?>
       
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


                <hr class="hide" style="border-bottom: 2px solid #ccc; margin:5px 0 10px; ">
                <h4 class="text-center hide" style="font-size: 15px;"><?php echo caption('Payment_Histroy'); ?></h4>
                
                
                
                <div class="hide">
                	<div class="col-xs-6" style="padding-left: 0;">
                		<h5>ক্লাস : <?php  echo $_POST['search']['payment_class']; ?></h5>
                	</div>
                	<div class="col-xs-6" style="padding-right: 0;">
                		<h5 class="text-right">তারিখ: <?php  echo date("Y-m-d"); ?></h5>
                	</div>
                </div>
                
                





                 <table class="table table-bordered">
                    <tr>
                        <th style="width: 50px;"><?php echo caption('SL'); ?></th>   
                        <th><?php echo caption('Students_Name'); ?></th>                    
                        <th><?php echo caption('Student_ID'); ?></th>
                        <!--th><?php echo caption('Roll'); ?></th-->
                        <th><?php echo caption('Class'); ?></th>
                        <th style="width: 120px;">শাখা </th>
                        <th><?php echo caption('Year'); ?></th>
                        <th>মোট প্রদেয় টাকা</th>
                        <th>আদায়কারীর নাম</th>
                        <th class="none" style="width: 65px;"><?php echo caption('Action'); ?></th>
                    </tr>
                    <?php
                     $grandTotal = 0;
                    foreach ($all_payment as $main_key => $payment) {
//                    	$student_info = $this->action->read("admission",array("student_id"=>$payment->students_id));
                    	$reg_info = $this->action->read("registration",array("reg_id"=>$payment->students_id));
                        $where=array(
                            'students_id'=>$payment->students_id,
                            'payment_year'=>$payment->payment_year
                            );
                        $all_perdata=$this->action->read('student_payment',$where);
                        $total=0;

                        for ($i=0; $i <count($all_perdata) ; $i++) { 
                            foreach ($all_perdata[$i] as $key => $value) {
                                if (!in_array($key, $not_except) && $value != null) {
                                    //echo $key."=".$value."</br>";
                                    $total+=$value;
                                }
                            }
                        $total-= $all_perdata[$i]->current_due;
                        }


                    ?>
                    <tr>
                        <td><?php echo $main_key+1; ?></td>         
                        <td><?php echo $reg_info[0]->bg_student_name; ?></td>             
                        <td><?php echo $payment->students_id; ?></td>
                        <!--td><?php echo $student_info[0]->roll; ?></td-->
                        <td><?php echo $payment->payment_class; ?></td>
                        <td><?php echo $payment->section; ?></td>
                        <td><?php echo $payment->payment_year; ?></td>
                        <td><?php echo $total;  $grandTotal+= $total;  ?></td>
                        <td><?php echo filter($payment->collected_by);  ?></td>
                        <td class="none"> <a class="btn btn-primary" href="<?php echo site_url('student_payment/payment/viewPayment?id='.$payment->students_id); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                    </tr>
                    
                    <?php } ?>                    
                    <tr><th colspan="6" style="text-align: right;">সর্বমোট</th><td colspan="2"><?php echo $grandTotal ;?></td><th colspan="2"></th></tr>
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
