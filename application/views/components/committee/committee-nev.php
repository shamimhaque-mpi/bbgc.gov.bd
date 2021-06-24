
<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">	
		<?php if(ck_action('committee_menu','add-new')){ ?>  
    		<a href="<?php echo site_url('committee/committee'); ?>" class="btn btn-default" id="add-new">
    			Add New
    		</a>
    	<?php }  ?>
    	
		<?php if(ck_action('committee_menu','all')){ ?>  	
    		<a href="<?php echo site_url('committee/committee/all_view_member'); ?>" class="btn btn-default" id="all">
    			All Member
    		</a>
		<?php }  ?>
    </div>
</div>