<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">	
		<a href="<?php echo site_url('marks/marks'); ?>" class="btn btn-default" id="add-new">
			Add Marks
		</a>


		<a href="<?php echo site_url('marks/marks/all_marks'); ?>" class="btn btn-default" id="all">
			All Marks
		</a>
		
		<a href="<?php echo site_url('marks/updateMarks'); ?>" class="btn btn-default" id="update">
			<?php echo "Update Marks"; ?> 
		</a>
		
    </div>
</div>