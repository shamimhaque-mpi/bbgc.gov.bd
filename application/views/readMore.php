
<!-- read more page -->
<div class="col-md-9">
    <div class="row">
        <div class="single">
            <?php if($pageInfo != NULL){ ?>
            <h3><?php echo ucwords($pageInfo[0]->title); ?></h3>
            
            <img src="<?php echo site_url($pageInfo[0]->path); ?>" alt="<?php echo $pageInfo[0]->title; ?>">
			<p style="text-align:justify;">
              
                <?php echo $pageInfo[0]->description; ?>
            </p>
            <?php } ?>
        </div>
    </div>
</div>
