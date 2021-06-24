<style>
	.paymentSlip{
		border: 1px solid #ccc;
		font-size:  12px;
	}
	.paymentSlip table, tr, th, td{
		padding: 5px 8px !important;
	}
	.paymentitle{
		width: 130px;
		margin: 0 auto 5px;
		color: #fff;
		text-align: center;
		border-radius: 10px;
		display: block;
	}
	.payslip .info-table tr td{
		padding: 2px 2px 0 0!important;
	}
	.topOfTable span{width: 35%; display: inline-block;}
        .tdNoBorder tr td{border-top: 1px solid transparent !important;}
        .v1 tr td{padding:2px 8px !important;}
        .table{margin-bottom: 0 !important; max-height: 528px !important;}
	@media print{
	        .tab1{max-width: 288px;}
         	.tab2{max-width: 480px;}
		aside, nav, .none, .panel-heading, .panel-footer{
			display: none !important;
		}
		.print-banner-bottom{
			margin-top:85px !important;
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
		.payslip{
			width:  50% !important;
			float: left;
		}
		.logo{
			height: 35px !important;
		}
	}
</style>

<?php
	$month = config_item("months_num");
?>


<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left"><?php echo caption('View_Payment_Slip'); ?></h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> <?php echo caption('Print'); ?></a>
                </div>
            </div>
            <div class="panel-body">
            	<div class="col-xs-5">
            	   <div class="">
            	   
            	   
            	   
            	   
		<img class="img-responsive print-banner hide" src="<?php echo site_url('private/images/left-header.png'); ?>" alt="Photo not found...!">
            		<table class="table topOfTable tdNoBorder tab1 v1">
			    <tr>
			        <td><span><b>পেমেন্ট আইডি</b></span> :&nbsp; <?php echo $payment_info[0]->id; ?></td>
			    </tr>
			    <tr>
			        <td><span><b>শিক্ষার্থী আইডি</b></span> :&nbsp; <?php echo $payment_info[0]->students_id; ?></td>
			    </tr>
			    <tr>
			        <td><span><b>নাম</b></span> :&nbsp; <?php echo $student_info[0]->bg_student_name; ?></td>
			    </tr>
			    <tr>
			        <td><span><b>পিতার নাম</b></span> :&nbsp; <?php echo $student_info[0]->bg_father_name; ?></td>
			    </tr>
			    <tr>
			        <td><span><b>মোবাইল</b></span> :&nbsp; <?php echo $student_info[0]->guardian_mobile; ?></td>
			    </tr>
			    <tr>
			        <td><span><b>সেকশন</b></span> :&nbsp; <?php echo $admission_info[0]->section; ?></td>
			    </tr>
			    <tr>
			        <td><span><b>তারিখ</b></span> :&nbsp; <?php echo $payment_info[0]->payment_date; ?></td>
			    </tr>
			    <tr>
			        <td><span><b>শ্রেণী</b></span> :&nbsp; <?php echo $student_info[0]->class; ?></td>
			    </tr>
			    <tr>
			        <td><span><b>রোল</b></span> :&nbsp; <?php echo $admission_info[0]->roll; ?></td>
			    </tr>
			    <tr>
			        <td><span><b>মাস</b></span> :&nbsp; <?php echo $month[$payment_info[0]->payment_month]; ?></td>
			    </tr>

			    <?php if($payment_info[0]->collected_by != NULL){?>
			      <tr>
			        <td><span><b>আদায়কারীর নাম</b></span> :&nbsp; <?php echo $payment_info[0]->collected_by; ?></td>
			     </tr>
			    <?php } ?>
			</table>

			<table class="table table-bordered tab1">
	                    <tr>
	                        <th class="text-center">নং</th>
	                        <th class="text-center">বিবরণ</th>
	                        <th class="text-center">টাকা</th>
	                    </tr>

	                    <?php
				$total=0;
				$i=0;
                            	foreach ($payment_info[0] as $key => $value) {
                                if (!in_array($key, $not_except) && $value != null)
                                {
                                    //echo $key."=".$value."</br>";
                                    $total+=$value;
                                    $i++;
			    ?>
	                    <tr>

                		<?php if($key != "collected_by") {?>
                		    <td><?php echo $i; ?></td>
                		    <td><?php echo filter($key); ?></td>
                		    <td><?php echo $value; ?></td>
                		 <?php } ?>

	                    </tr>
	                    <?php }} ?>
	                    <tr>
	                        <td rowspan="4">&nbsp;</td>
	                    </tr>
	                    <tr>
	                        <th class="text-right">মোট</th>
	                        <td><?php echo $total; ?></td>
	                    </tr>

	                     <tr>
	                        <th class="text-right">প্রদেয়</th>
	                        <td><?php echo $total-$payment_info[0]->current_due; ?></td>
	                    </tr>

	                    <tr>
	                        <th class="text-right">বকেয়া</th>
	                        <td><?php echo $payment_info[0]->current_due; ?></td>
	                    </tr>
	                    <tr>
	                        <td colspan="3"><b>কথায়: <span id="inword"></span> টাকা মাত্র</b></td>
	                    </tr>
	                </table>
	                
	                
	                
	                
	                
	                
	                
	                
	<img class="img-responsive print-banner hide" style="margin-top:20px;" src="<?php echo site_url('private/images/left-footer.png'); ?>" alt="Photo not found...!">

                	<!-- <p class="text-center">
                	<small><?php if($comment!= NULL){ echo $comment[0]->payslipComment; }?></small><br>
                	<small>Software By: Freelance IT Lab</small>
                	</p> -->
            	    </div>
            	</div>

            	<div class="col-xs-7">
            	    <div class="">
            	    
            	    <style>
            	    	.studentSlip td{
            	    		padding:11px 8px !important;
            	    	}
            	    </style>
            	    
			<img class="img-responsive print-banner hide" src="<?php echo site_url('private/images/right-header.png'); ?>" alt="Photo not found...!">
            	        <table class="table topOfTable tdNoBorder tab2 studentSlip">
			    <tr>
			        <td><span><b>পেমেন্ট আইডি</b></span> :&nbsp; <?php echo $payment_info[0]->id; ?></td>
			        <td><span><b>শিক্ষার্থী আইডি</b></span> :&nbsp; <?php echo $payment_info[0]->students_id; ?></td>
			    </tr>
			    <tr>
			        <td><span><b>নাম</b></span> :&nbsp; <?php echo $student_info[0]->bg_student_name; ?></td>
			        <td><span><b>সেকশন</b></span> :&nbsp; <?php echo $admission_info[0]->section; ?></td>
			    </tr>
			    <tr>
			        <td><span><b>পিতার নাম</b></span> :&nbsp; <?php echo $student_info[0]->bg_father_name; ?></td>
			        <td><span><b>মোবাইল</b></span> :&nbsp; <?php echo $student_info[0]->guardian_mobile; ?></td>
			    </tr>
			    <tr>
			        <td><span><b>তারিখ</b></span> :&nbsp; <?php echo $payment_info[0]->payment_date; ?></td>
			        <td><span><b>শ্রেণী</b></span> :&nbsp; <?php echo $student_info[0]->class; ?></td>
			    </tr>
			    <tr>
			        <td><span><b>রোল</b></span> :&nbsp; <?php echo $admission_info[0]->roll; ?></td>
				<td><span><b>মাস</b></span> :&nbsp; <?php echo $month[$payment_info[0]->payment_month]; ?></td>
			    </tr>
			    <?php if($payment_info[0]->collected_by != NULL){?>
			      <tr>
			        <td colspan="2"><span><b>আদায়কারীর নাম</b></span> :&nbsp; <?php echo $payment_info[0]->collected_by; ?></td>
			     </tr>
			    <?php } ?>
			</table>


			<table class="table table-bordered tab2">
	                    <tr>
	                        <th class="text-center">নং</th>
	                        <th class="text-center">বিবরণ</th>
	                        <th class="text-center">টাকা</th>
	                    </tr>

	                    <?php
				$total=0;
				$i=0;
                            	foreach ($payment_info[0] as $key => $value) {
                                if (!in_array($key, $not_except) && $value != null)
                                {
                                    //echo $key."=".$value."</br>";
                                    $total+=$value;
                                    $i++;
			    ?>
	                    <tr>

	                       <?php if($key != "collected_by") {?>
                		    <td><?php echo $i; ?></td>
                		    <td><?php echo filter($key); ?></td>
                		    <td><?php echo $value; ?></td>
                		 <?php } ?>

	                    </tr>
	                    <?php }} ?>
	                    <tr>
	                        <td rowspan="4">&nbsp;</td>
	                    </tr>
	                    <tr>
	                        <th class="text-right">মোট</th>
	                        <td><?php echo $total; ?></td>
	                    </tr>

	                     <tr>
	                        <th class="text-right">প্রদেয়</th>
	                        <td><?php echo $total-$payment_info[0]->current_due; ?></td>
	                    </tr>

	                    <tr>
	                        <th class="text-right">বকেয়া</th>
	                        <td><?php echo $payment_info[0]->current_due; ?></td>
	                    </tr>
	                    <tr>
	                        <td colspan="3"><b>কথায়: <span id="inword2"></span> টাকা মাত্র</b></td>
	                    </tr>
	                </table>
	                
	                
	                
	                
	                
			<img class="img-responsive print-banner hide print-banner-bottom" style="margin-top: 20px;" src="<?php echo site_url('private/images/right-footer.png'); ?>" alt="Photo not found...!">

                	<!-- <p class="text-center">
                	<small><?php if($comment!= NULL){ echo $comment[0]->payslipComment; }?></small><br>
                	<small>Software By: Freelance IT Lab</small>
                	</p> -->
            	    </div>
            	</div>





				<!-- div class="row">
				<div class="col-xs-6">
			            <img class="img-responsive" src="<?php echo site_url('private/images/office.jpg'); ?>" alt="">
			            <div class="left_item">
							<div class="paymentSlip clearfix">


			                    <div class="col-xs-7 payslip" style="margin-bottom: 10px;">
			                    	<table class="info-table">
			                    		<tr>
			                    			<td>পেমেন্ট আইডি: </td>
			                    			<td><strong><?php echo $payment_info[0]->id; ?></strong></td>
			                    		</tr><tr>
			                    			<td>শিক্ষার্থী আইডি: </td>
			                    			<td><strong><?php echo $payment_info[0]->students_id; ?></strong></td>
			                    		</tr>
			                    		<tr>
			                    			<td>নাম: </td>
			                    			<td><strong><?php echo $student_info[0]->bg_student_name; ?></strong></td>
			                    		</tr>
			                    		<tr>
			                    			<td>সেকশন: </td>
			                    			<td><strong><?php echo $admission_info[0]->section; ?></strong></td>
			                    		</tr>
			                    	</table>
			                    </div>

			                    <div class="col-xs-5 payslip">
			                    	<table class="pull-right info-table">
			                    		<tr>
			                    			<td>তারিখ:</td>
			                    			<td><strong><?php echo $payment_info[0]->payment_date; ?></strong></td>
			                    		</tr>
			                    		<tr>
			                    			<td>শ্রেণী: </td>
			                    			<td><strong><?php echo $student_info[0]->class; ?></strong></td>
			                    		</tr>
			                    		<tr>
			                    			<td>রোল: </td>
			                    			<td><strong><?php echo $admission_info[0]->roll; ?></strong></td>
			                    		</tr>
			                    	</table>
			                    </div>



				                <table class="table table-bordered">
				                	<tr>
				                		<th style="width: 35px;">নং</th>
				                		<th class="text-center">বিবরণ</th>
				                		<th  class="text-center" style="width: 150px;">টাকা</th>
				                	</tr>
								<?php
									$total=0;
									$i=0;
		                            foreach ($payment_info[0] as $key => $value) {
		                                if (!in_array($key, $not_except) && $value != null)
		                                {
		                                    //echo $key."=".$value."</br>";
		                                    $total+=$value;
		                                    $i++;
										?>

				                	<tr>
				                		<td><?php echo $i; ?></td>
				                		<td><?php echo filter($key); ?></td>
				                		<td><?php echo $value; ?></td>
				                	</tr>
				                	<?php }} ?>
				                	<tr>
				                		<th class="text-right" colspan="2">মোট</th>
				                		<th><?php echo $total; ?></th>
				                	</tr>
                					<tr>
				                		<th class="text-right" colspan="2">প্রদেয়</th>
				                		<th><?php echo $total-$payment_info[0]->current_due; ?></th>
				                	</tr>
                					<tr>
				                		<th class="text-right" colspan="2">বকেয়া</th>
				                		<th><?php echo $payment_info[0]->current_due; ?></th>
				                	</tr>
				                </table>


				               <div class="col-xs-12">
				               		<p style="font-size: 11px; margin-bottom: 20px;" ><strong>কথায়: (<span class="inword" ></span>) Taka Only.</strong></p>
									<h5 style="border-top: 1px solid #222; margin-bottom: 20px;"  class="pull-right">আদায়কারীর স্বাক্ষর</h5>
				               </div>

			                	<p class="text-center">
			                	<small><?php if($comment!= NULL){ echo $comment[0]->payslipComment; }?></small><br>
			                	<small>Software By: Freelance IT Lab</small>
			                	</p>

			                </div>
		                </div>
					</div>

					<div class="col-xs-6">
						<img class="img-responsive " src="<?php echo site_url('private/images/student.jpg'); ?>" alt="">
						<div class="right_item"></div>
					</div>

				</div -->
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url("private/js/inwordbn.js"); ?>"></script>
<script type="text/javascript">
/*$(document).ready(function(){
	$('.inword').html(inWord(<?php echo $total-$payment_info[0]->current_due; ?>));
	$('.right_item').html($('.left_item').html());
	$('.right_item .slip-title').html("Student");
	$
});*/

$(document).ready(function(){
    $("#inword").html(inWordbn(<?php echo $total; ?>));
    $("#inword2").html(inWordbn(<?php echo $total; ?>));
});

</script>
