<div class="col-md-9">
    <div class="row">  
        <!-- single notice section -->
			<div class="single">
				<h3>Leave List</h3>

				<?php foreach ($leave_list as $key => $leave) { ?>
				<h4 style="margin: 0;"><?php echo $leave->leave_title; ?></h4>
				<p>Published Date:&nbsp;<small><?php echo $leave->leave_date; ?></small></p>						
				<a href="<?php echo base_url($leave->leave_attachment);?>" download >Download</a>
				<p>..................................................</p>
				<?php } ?>
				
			</div>
			<br/>
    </div>
</div>