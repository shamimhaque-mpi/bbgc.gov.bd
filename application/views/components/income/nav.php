<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">
        <?php if(ck_action('income_menu','field')){ ?> 
    		<a href="<?php echo site_url('income/infoView/'); ?>" class="btn btn-default" id="field">
    			 Income Field
    		</a>
	    <?php } ?>   
		
		<?php if(ck_action('income_menu','new')){ ?> 
    		<a href="<?php echo site_url('income/infoView/addIncome'); ?>" class="btn btn-default" id="new">
    			New Income
    		</a>
	    <?php } ?>   
		
        <?php if(ck_action('income_menu','all')){ ?>
    		<a href="<?php echo site_url('income/infoView/showIncome'); ?>" class="btn btn-default" id="all">
    			All Income
    		</a>
    	 <?php } ?>   
		
         <?php if(ck_action('income_menu','monthly_income_report')){ ?>
    		<a href="<?php echo site_url('monthlyIncomeReport/monthlyIncomeReport'); ?>" class="btn btn-default" id="monthly_income_report">
    		 Monthly All Income
    		</a>
		 <?php } ?>   
    </div>
</div>