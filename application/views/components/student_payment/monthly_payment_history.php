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
                    <h1><?php echo caption('Monthly_Payment_Histroy'); ?></h1>
                </div>
            </div>

            <div class="panel-body">

                <?php
                $attr=array(
                    'class'=>'form-horizontal'
                    );
                echo form_open('',$attr);?>

                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo caption('Class'); ?> <span class="req">*</span></label>

                        <div class="col-md-5">
                            <select name="search[payment_class]" class="form-control" required>
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
                        <label class="col-md-2 control-label"><?php echo caption('Year'); ?> <span class="req">*</span></label>

                        <div class="col-md-5">
                            <select name="search[payment_year]" class="form-control" required>
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
                        <label class="col-md-2 control-label"><?php echo caption('Month'); ?> <span class="req">*</span></label>

                        <div class="col-md-5">
                            <select name="search[payment_month]" class="form-control" required>
                                <option value="">-- <?php echo caption('Select'); ?> --</option>
                                <?php
                                        foreach(config_item("months_num") as $key => $opt){
                                        echo '<option value="'.($key).'">'.$opt.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div> 
					
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo caption('Section'); ?><span class="req">&nbsp;</span></label>

                        <div class="col-md-5">
                            <select name="search[section]" class="form-control">
                                <option value="">-- <?php echo caption('Select'); ?> --</option>
                                <?php foreach(config_item("section") as $key => $value){?>
								<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
								<?php } ?>
                            </select>
                        </div>
                    </div> 
					
                    <div class="form-group">
                        <label class="col-md-2 control-label">আবাসিক/অনাবাসিক <span class="req">&nbsp;</span></label>

                        <div class="col-md-5">
                            <select name="search[residential]" class="form-control">
                                <option value="">-- <?php echo caption('Select'); ?> --</option>
                                <option value="yes">আবাসিক</option>
                                <option value="no">অনাবাসিক</option>
                            </select>
                        </div>
                    </div> 


                    <div class="col-md-7">
                        <div class="btn-group pull-right">
                            <input type="submit" name="submit_monthly" value="<?php echo caption('Show_btn'); ?>" class="btn btn-primary">
                        </div>
                    </div> 

                <?php echo form_close(); ?>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>



        <?php if ($monthly_payment!=null) { ?>
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
                <h4 class="text-center hide" style="margin-top: -10px;"><?php echo caption('Monthly_Payment_Histroy'); ?></h4>



                 <table class="table table-bordered">
                    <tr>                       
                        <th><?php echo caption('SL'); ?></th>
                        <th><?php echo caption('Name'); ?></th>
                        <th><?php echo caption('Roll'); ?></th>
                        <th><?php echo caption('Class'); ?></th>
                        <th><?php echo caption('Year'); ?></th>
                        <th><?php echo caption('Month'); ?></th>
                        <th><?php echo caption('Amount'); ?></th>
                        <th>আদায়কারীর নাম</th>
                    </tr>
                    <!--pre><?php //print_r($monthly_payment );?></pre-->
                    <?php 
                      $total=$final_total=0;
					  $month = config_item("months_num");
                     foreach ($monthly_payment as $key => $value) {
						$where = array("reg_id" => $value->students_id);
						$info = $this->action->read("registration",$where);
					 ?>
                         <tr>
                            <td><?php echo $key+1;?></td>                     
                            <td><?php if(isset($info[0])){echo $info[0]->bg_student_name; } ?></td>
                            <td><?php echo $value->students_id; ?></td>
                            <td><?php echo $value->payment_class; ?></td>
                            <td><?php echo $value->payment_year; ?></td>
                            <td><?php echo $month[$value->payment_month]; ?></td>
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
                        </tr>
                    <?php } ?>

                    <tr>
                      <th colspan="6" style="text-align:right;"><?php echo caption('Total'); ?></th>
                      <td><strong><?php echo $final_total;?></strong> <?php echo caption('Tk'); ?></td>
                      <th colspan="1"></th>
                     </tr>
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    <?php } ?>
    </div>
</div>

