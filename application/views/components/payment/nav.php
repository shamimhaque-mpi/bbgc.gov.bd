<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">
		 <?php if(ck_action('payment_menu','add_description')){ ?> 
    		<a href="<?php echo site_url('payment/description'); ?>" class="btn btn-default" id="add_description">
    			Add Description
    		</a>
    	 <?php } ?>
    	 
    	 <?php if(ck_action('payment_menu','field')){ ?> 
    		<a href="<?php echo site_url('payment/payment'); ?>" class="btn btn-default" id="field">
    			Field of Payment
    		</a>
    	 <?php } ?>
    	 
         <?php if(ck_action('payment_menu','payment_set')){ ?>    
    		<a href="<?php echo site_url('payment/payment/payment_set'); ?>" class="btn btn-default" id="payment_set">
    			Set Payment Amount
    		</a>
    	 <?php } ?>
    	 
        <?php if(ck_action('payment_menu','setting')){ ?>      
    		<a href="<?php echo site_url('payment/payment/setting'); ?>" class="btn btn-default" id="setting">
    			Month Settings
    		</a>
    	 <?php } ?>
    	 
        <?php if(ck_action('payment_menu','receieve_payment')){ ?> 
        
    		<a href="<?php echo site_url('payment/receieve_payment'); ?>" class="btn btn-default" id="receieve_payment">
    			Recieve Payment
    		</a>
    	 <?php } ?>
    	 
        <?php if(ck_action('payment_menu','payment_report')){ ?> 
        
    		<a href="<?php echo site_url('payment/payment_report'); ?>" class="btn btn-default" id="payment_report">
    			Payment Report
    		</a>
    	 <?php } ?>
    	 
    	<?php if(ck_action('payment_menu','payment_field')){ ?>	
    		<a href="<?php echo site_url('payment/payment_report/field_report'); ?>" class="btn btn-default" id="payment_field">
    			Field Report
    		</a>
         <?php } ?>
         
        <a href="<?php echo site_url('payment/payment_report/monthly_income_report'); ?>" class="btn btn-default" id="monthly_income_report">
	    	Monthly  Report
	    </a>



    </div>
</div>
