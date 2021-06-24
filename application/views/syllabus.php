<div class="col-md-9">
    <div class="row">  
        <!-- single notice section -->
		
		<div class="single">
			<h3>Syllabus</h3>

			<?php foreach ($syllabus as $key => $syllabus) { ?>
			<h4 style="margin: 0;"><?php echo $syllabus->syllabus_class; ?></h4>
			<p>Published Date:&nbsp;<small><?php echo $syllabus->syllabus_date; ?></small></p>						
			<a href="<?php echo base_url($syllabus->syllabus_attachment);?>" download >Download</a>
			<p>..................................................</p>

			<?php } ?>
			
		</div>

    </div>
</div>