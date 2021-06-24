<div class="col-md-9">
    <div class="row">  
        <!-- single notice section -->
		
		<div class="single">
			<h3>Class Routine </h3>

			<?php foreach ($class_routine as $key => $routine) { ?>
			<h4 style="margin: 0;"><?php echo $routine->routine_title; ?></h4>						
			<p>Published Date:&nbsp;<small><?php echo $routine->routine_date; ?></small></p>						
			<p>Class:&nbsp;<small><?php echo $routine->routine_class; ?></small></p>						
			<a href="<?php echo base_url($routine->routine_attachment);?>" download >Download</a>
			<p>-------------------------------------------</p>
			<?php } ?>
		</div>
		<br/>
			
    </div>
</div>