<div class="col-md-9">
    <div class="row">
        <!-- single notice section -->
        <div class="single">
            <h3><?php echo $notice[0]->notice_title;?></h3>
            <p><small><?php echo $notice[0]->notice_date; ?></small></p>
            <p><?php echo $notice[0]->notice_description; ?></p>
            <?php if($notice[0]->notice_path!=null){?><a href="<?php echo site_url($notice[0]->notice_path)?>" download>Download</a><?php } ?>
           
        </div>
    </div>
</div>