<div class="col-md-9">
    <div class="row">  
        <!-- single notice section -->
		
		<div class="single">
			
			<?php foreach ($magazine as $key => $magazine) { ?>
			<h3><?php echo $magazine->magazine_title; ?></h3>							
			<p>Published Date:&nbsp;<small><?php echo $magazine->magazine_date; ?></small></p>						
			<a href="<?php echo base_url($magazine->magazine_attachment); ?>" download >Download</a>
			<p>..................................................</p>
			<?php } ?>
			
		</div>

    </div>
</div>