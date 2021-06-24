<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">	
		<a href="<?php echo site_url('students/studentInfo'); ?>" class="btn btn-default" id="add-new">
			Add New
		</a>
			
		<a href="<?php echo site_url('students/admission_view/show'); ?>" class="btn btn-default" id="all">
			All Student's
		</a>

		<a href="<?php echo site_url('students/upgrade_student'); ?>" class="btn btn-default" id="upgrade">
			Upgrade Student
		</a>
    </div>
</div>