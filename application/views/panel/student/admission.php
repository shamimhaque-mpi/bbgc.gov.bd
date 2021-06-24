<div class="col-md-9">
    <div class="row single search admit-card">
     <?php echo $confirmation;?>
             
        <div class="search-result">
            <div class="admit-header">
                <div class="col-md-3">
                    <div class="row">
                         <img class="img-responsive" src="<?php echo site_url($photo); ?>" alt="<?php echo $name; ?>" /> <br>                         
		           
		                <?php 
		                $attr = array(
		                	'name' => '',
		                	'class' => ''
		                );
		                echo form_open('', $attr); 
		                ?>
		                 <label>TrxID:</label><input type="text" name="trxid" /> 
		                  <input type="hidden" name="tid" required value="<?php echo $username; ?>">              
		                 <input type="submit" style="margin-top:5px;" name="submit" value="Submit">
		                 <?php echo form_close(); ?>
                    </div>
                </div>
				

                <div class="print-header">
			        <h4>Admision Form</h4>
                    <p>The Cadet Coaching Centre</p>
                    <p> Time:<?php echo date('Y-m-d H:i a'); ?></p>
                </div>
            </div>	

            <div class="col-md-9">
                <div class="row admit">

                
                  
                    
                </div>
            </div>
        </div>
    </div>
</div>
