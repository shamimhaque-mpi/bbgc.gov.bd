<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">	
		<a href="<?php echo site_url('identity'); ?>" class="btn btn-default" id="card">
			Student ID Card
		</a>
			
		<a href="<?php echo site_url('identity/validity'); ?>" class="btn btn-default" id="validity">
			Student Validity Date
		</a>
		
		<a href="<?php echo site_url('identity/teacher'); ?>" class="btn btn-default" id="teacher">
			Teacher ID Card
		</a>

	
		<a href="<?php echo site_url('identity/teacher_validity'); ?>" class="btn btn-default" id="teacher_id">
			Teacher ID Card Validity Date
		</a>

    </div>
</div>