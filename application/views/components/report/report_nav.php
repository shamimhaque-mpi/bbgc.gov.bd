<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">
       
    <?php if(ck_action('report_menu','income')){ ?>
    	<a href="<?php echo site_url('report/income_report'); ?>" class="btn btn-default" id="income">
			Income Report
		</a>
    <?php } ?> 

     <?php if(ck_action('report_menu','cost')){ ?>
		<a href="<?php echo site_url('report/cost_report'); ?>" class="btn btn-default" id="cost">
			Cost Report
		</a>
	 <?php } ?> 
	
	<?php if(ck_action('report_menu','cost_income')){ ?>
		<a href="<?php echo site_url('report/cost_income'); ?>" class="btn btn-default" id="cost_income">
		    Income & Cost Report
		</a>
	<?php } ?> 
	
	<?php if(ck_action('report_menu','balance')){ ?>
    		<a href="<?php echo site_url('report/balance_report'); ?>" class="btn btn-default" id="balance">
    			Balance Report
    		</a>
	<?php } ?> 
	
	
    <?php if(ck_action('report_menu','field_wise_balance_report')){ ?>
    		<a href="<?php echo site_url('report/balance_report/field_wise_balance_report'); ?>" class="btn btn-default" id="field_wise_balance_report">
    			Field Wise Balance Report
    		</a>
	<?php } ?> 	
	
    </div>
</div>