<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">	
		<?php if(ck_action('attendance_menu','add-new')){ ?> 
    		<a href="<?php echo site_url('attendance/attendance'); ?>" class="btn btn-default" id="add-new">
    			Add Attendance
    		</a>
    	<?php } ?>	
		
		<?php if(ck_action('attendance_menu','stu-rep')){ ?> 
    		<a href="<?php echo site_url('attendance/attendance/student_report'); ?>" class="btn btn-default" id="stu-rep">
    			Student Report
    		</a>
    	<?php } ?>
    	
		<?php if(ck_action('attendance_menu','all-rep')){ ?> 
    		<a href="<?php echo site_url('attendance/attendance/class_wise_report'); ?>" class="btn btn-default" id="all-rep">
    			Class Wise Report
    		</a>
		<?php } ?>
    </div>
</div>