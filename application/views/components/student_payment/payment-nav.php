<?php if($privilege=='super'|| $privilege=='admin'){ ?>
<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">	
		<a href="<?php echo site_url('student_payment/payment'); ?>" class="btn btn-default" id="add-new">
			Accept_payments
		</a>
			
		<a href="<?php echo site_url('student_payment/payment/paymentHistory'); ?>" class="btn btn-default" id="all">
			Payment_Histroy
		</a>

		<a href="<?php echo site_url('student_payment/payment/monthly_payment_history'); ?>" class="btn btn-default" id="m-history">
		    Monthly_Payment_Histroy
		</a>
		
		<a href="<?php echo site_url('student_payment/payment/daily_payment_history'); ?>" class="btn btn-default" id="d-history">
			দৈনিক পেমেন্ট হিস্ট্রি
		</a>

		<a href="<?php echo site_url('student_payment/payment/paymentSlip'); ?>" class="btn btn-default" id="paySlip">
			 Student_Payment_Slip
		</a>	
		
		<?php if($privilege == "admin" || $privilege == "supper") { ?>
		<a href="<?php echo site_url('student_payment/payment/setAmount'); ?>" class="btn btn-default" id="setAmount">
			 Set_Amount
		</a>
		<?php } ?>

		<!--a class="btn btn-default" data-toggle="modal" data-target="#myModal">
		   Help
		</a-->
		<a href="<?php echo site_url('student_payment/payment/paymentSlipComment'); ?>" class="btn btn-default" id="paySlipComment">
			 কমেন্ট
		</a>

    </div>
</div>
<?php }?>
<!-- Tutorial -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Help Tutorial</h4>
      </div>
      <div class="modal-body">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/hrZqiCUx6kg" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>
<!-- End -->