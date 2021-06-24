
<!-- one column page main container start here -->
<div class="column global-pad">
 <?php echo $meg; ?>
    
	  <?php 
	     foreach($record as $value):
		   {
			 ?>
			   <div id="delete_option" class="contact">
					<ul>
						<li><h3><?php echo $value->name;?><span><a id="delete" onclick="return confirm('Are You Sure to Delete this Record?');" href="<?php echo site_url();?>header/message/deleteRecord/<?php echo $value->id;?>"><i class="fa fa-times-circle fa-lg"></i></a></span></h3></li>
						<li><?php echo $value->subject; ?></li> 
						<li><span> <?php echo $value->email_or_mobile; ?></span> | <span><?php echo $value->date; ?></span></li>
						<li>
							<p><?php echo $value->message; ?>	</p>
						</li>
					</ul>
			   </div> 
		     <?php
		   }
		  endforeach;
		?>
		
  
</div>
<!-- one column page main container end here -->



