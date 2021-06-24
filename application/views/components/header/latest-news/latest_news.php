<style>
    /* texteditor style */
#mceu_22{
    border: 1px solid #eee !important;
}
</style>


<div class="container-fluid">
    <div class="row">
        <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Latest News</h1>
                </div>
            </div>

            <div class="panel-body">
                <!-- horizontal form -->

                <!--blockquote class="form-head">

                    <h4>Add Latest News</h4>

                    <ol style="font-size: 14px;">
                        <li>1 .To add <mark>Latest News</mark> fill the gap's bellow</li>
                        <li>2 . To save click on the <mark>save</mark> button</li>
                    </ol>

                </blockquote>
                
                <hr-->
                    
                        
                        <?php 
                            echo form_open();
                        ?>
                            <input type="hidden" id="news_id" name="news_id" value="">

                            <div class="form-group row">
                                <label class="control-label col-md-2">News Title <span class="req">*</span></label>
                                <div class="col-md-5">
                                <input type="text" name="news_title" class="form-control" placeholder="Maximum 250 characters" required>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="control-label">News Description <span class="req">*</span></label>
                                <textarea name="news_description" id="tinyTextarea" class="form-control" cols="30" rows="15"></textarea>
                            </div> 

                            <div class="form-group row">
                                <label class="control-label col-md-2">Link url <span class="req">&nbsp;</span></label>
                                <div class="col-md-5">
                                <input type="text" name="link_url" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-7">
                            <div class="btn-group pull-right">
                                <?php if ($this->input->get("news_id")) { ?>
                                <a href="?delete_token=<?php echo $this->input->get("news_id");?>" class="btn btn-danger" onclick="return confirm('Are sure to delete this Data..?');">Delete</a>
                                <?php } ?>
                                <input type="submit" name="news_Submit" value="Save" class="btn btn-primary">
                                
                            </div>
                            </div>

                        <?php echo form_close();?>

                    

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

