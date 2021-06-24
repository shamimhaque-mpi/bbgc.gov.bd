<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Preview News</h1>
                </div>
            </div>

            <div class="panel-body">
        
                <div class="form-group">
                    <label class="control-label">News Title <span class="req">&nbsp;</span></label>
                    <div class="preview-box"><?php echo $latest_info[0]->latest_news_title; ?></div>
                    
                </div> 

                <div class="form-group">
                    <label class="control-label">News Description <span class="req">&nbsp;</span></label>
                    <div class="preview-box"><?php echo $latest_info[0]->latest_news_description; ?></div>

                </div> 
                  
                <div class="form-group">
                    <label class="control-label">Link url <span class="req">&nbsp;</span></label>
                    <div class="preview-box">
                        <a target="_blank" href="<?php echo $latest_info[0]->latest_news_link; ?>"><?php echo $latest_info[0]->latest_news_link; ?></a>
                    </div>
                    
                    
                </div>
                

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

