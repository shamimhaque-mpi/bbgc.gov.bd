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
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left"><?php echo caption('Student_Payment_Slip'); ?></h1>
                </div>
            </div>

            <div class="panel-body">
				<?php
					$attr = array(
						'class' => 'form-horizontal'
					);
				echo form_open('', $attr); ?>

					<div class="form-group">
						<label class="control-label col-md-2"><?php echo caption('Student_ID'); ?><span class="req">*</span></label>
						<div class="col-md-4">
							<input type="text" name="studentID" class="form-control" required>
						</div>
						<div class="col-md-2">
							<div class="btn-group">
		                        <input type="submit" name="view_payment" value="<?php echo caption('Show_btn'); ?>" class="btn btn-primary">
		                    </div>
						</div>
					</div>


				<?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>




        <?php if ($payment_data!=null) { ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left"><?php echo caption('Show_Result'); ?></h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> <?php echo caption('Print'); ?></a>
                </div>
            </div>
            <!--pre><?php //print_r($payment_data);?></pre-->

            <div class="panel-body">

                 <!-- Print Banner -->
                <img class="img-responsive print-banner hide" src="<?php echo site_url('private/images/print-banner.jpg'); ?>" alt="Photo not found...!">


                <hr class="hide" style="border-bottom: 2px solid #ccc; margin-top: 5px; ">
                <h4 class="text-center hide" style="margin-top: -10px;"><?php echo caption('All_Pay_slip'); ?></h4>


                <table class="table table-bordered">
                	<tr>
                		<th style="width: 35px;"><?php echo caption('SL'); ?></th>
                		<th><?php echo caption('Image'); ?></th>
                		<th><?php echo caption('Name'); ?></th>
                		<th><?php echo caption('Date'); ?></th>
                		<th><?php echo caption('Amount'); ?></th>
                		<th><?php echo "আদায়কারীর নাম"; ?></th>
                		<th class="none" style="width: 120px;"><?php echo caption('Action'); ?></th>
                	</tr>

                    <?php  foreach ($payment_data as $mainkey => $payment_info) {
                        $total=0;
                        foreach ($payment_info as $key => $value) {
                            if (!in_array($key, $not_except) && $value != null) {
                                //echo $key."=".$value."</br>";
                                $total+=$value;
                            }
                        }
                        $total -= $payment_info->current_due;

                    ?>

                	<tr>
                		<td><?php echo $mainkey+1; ?></td>
                		<td><img src="<?php echo base_url($student_data[0]->students_photo);?>" alt="Photo Not Found" width="50px" height="50px"></td>
                		<td><?php echo $student_data[0]->bg_student_name; ?></td>
                		<td><?php echo $payment_info->payment_date; ?></td>
                		<td><?php echo $total; ?></td>
                		<td><?php echo filter($payment_info->collected_by); ?></td>
                		<td class="none">
                			<a href="<?php echo site_url('student_payment/payment/paymentSlipView')?>?id=<?php echo $payment_info->id; ?>&&student_id=<?php echo $student_data[0]->reg_id; ?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
					<a href="<?php echo site_url('student_payment/payment/edit_payment/'.$payment_info->id)?>" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                		</td>
                	</tr>
                   <?php } ?>
                </table>



            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php } ?>
    </div>
</div>
