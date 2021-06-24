<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">
		 <?php if(ck_action('registration_menu','add-new')){ ?> 
    		<a href="<?php echo site_url('registration/registration'); ?>" class="btn btn-default" id="add-new">
    			Add Student
    		</a>
    	<?php } ?>	
        
        <?php if(ck_action('registration_menu','all')){ ?> 
    		<a href="<?php echo site_url('registration/registration/allStudent'); ?>" class="btn btn-default" id="all">
    			All Student
    		</a>
       <?php } ?>
       
       <?php if(ck_action('registration_menu','up')){ ?> 
    		<a href="<?php echo site_url('admission/admission/upgrade_student'); ?>" class="btn btn-default" id="up">
    			Upgrade Student	
    		</a>
      <?php } ?>		
    </div>
</div>
