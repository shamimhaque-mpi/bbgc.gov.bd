<!-- single page -->
<style>
	.single .table5 tr th, .single .table5 tr td{
		border: 1px solid transparent !important;
		 text-align: left !important;
	}
</style>
<div class="col-md-9">
    <div class="row">
        <div class="single">
            
            <h3><?php if (isset($page_data[0])) { echo $page_data[0]->page_title;} ?></h3>
            <!-- style="float:left; width:100%; max-width:150px; margin-right:10px; padding:5px; border:2px solid #000;" -->
            <?php if(isset($page_data[0])){ if($page_data[0]->page_path!=""){ ?><img  style="width:100%; max-width:765px; height: 300px;" src="<?php echo base_url($page_data[0]->page_path); ?>" ‍all=""> <?php }}?>
			<p style="text-align:justify;">
              <?php 
                if (isset($page_data[0])) {
                    echo $page_data[0]->page_description; 
                }
                
              ?>
            </p>
            
        </div>
    </div>
</div>
