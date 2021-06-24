<div class="container-fluid">
    <div class="row">
        <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Preview Notice</h1>
                </div>
            </div>

            <div class="panel-body">
        
                <div class="form-group">
                    <label class="control-label">Notice Title <span class="req">&nbsp;</span></label>
                    
                    <div class="preview-box"><?php echo custom_fetch($single_data,"notice_title")?></div>
                    
                </div> 

                <div class="form-group">
                    <label class="control-label">Notice Description <span class="req">&nbsp;</span></label>

                    <div class="preview-box"><?php echo custom_fetch($single_data,"notice_description")?></div>

                </div> 
                  <?php
                    $attach=custom_fetch($single_data,"notice_path");
                    if ($attach!=null or $attach!="") { ?>
                <div class="form-group">
                    <label class="control-label">Attach File <span class="req">&nbsp;</span></label>
  
                    <div class="preview-box">
                        <a target="_blank" href="<?php echo base_url(custom_fetch($single_data,"notice_path")); ?>">View File</a>
                    </div>
                    
                    
                </div>
                <?php } ?>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

