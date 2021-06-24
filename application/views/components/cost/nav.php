<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">	
        
        
    	<?php if(ck_action('cost_menu','field')){ ?>	
    		<a href="<?php echo site_url('cost/cost'); ?>" class="btn btn-default" id="field">
    		  Cost Field
    		</a>
	    <?php } ?>   
		
		<?php if(ck_action('cost_menu','new')){ ?> 
		
    		<a href="<?php echo site_url('cost/cost/newcost'); ?>" class="btn btn-default" id="new">
    			New Cost
    		</a>
	   <?php } ?>   
		
        
        <?php if(ck_action('cost_menu','all')){ ?>
    		<a href="<?php echo site_url('cost/cost/allcost'); ?>" class="btn btn-default" id="all">
    			All Cost
    		</a>
	   <?php } ?>   
		 <?php if(ck_action('cost_menu','monthly_cost_report')){ ?> 
       
    		<a href="<?php echo site_url('monthlyCostReport/monthlyCostReport'); ?>" class="btn btn-default" id="monthly_cost_report">
    		  Monthly All Cost
    		</a>
		<?php } ?>   
		
		
    </div>
</div>