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

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit News</h1>
                </div>
            </div>

            <div class="panel-body">


                <?php
                $attr=array(
                    "class"=>"form"
                    );
                echo form_open('header/latest_news/edit_news?news_id='.$this->input->get("news_id"), $attr);?>
        
                    <div class="form-group row">
                        <label class="control-label col-md-2">News Title <span class="req">*</span></label>
                        <div class="col-md-5">
                        <input type="text" name="news_title" value="<?php echo custom_fetch($ind_news,"latest_news_title"); ?>" class="form-control" placeholder="Maximum 250 characters" required>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="control-label">News Description <span class="req">*</span></label>
                        <textarea name="news_description" id="tinyTextarea" class="form-control" cols="30" rows="15"><?php echo custom_fetch($ind_news,"latest_news_description"); ?></textarea>
                    </div> 

                    <div class="form-group row">
                        <label class="control-label col-md-2">Link url <span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                        <input type="text" name="link_url" value="<?php echo custom_fetch($ind_news,"latest_news_link"); ?>" class="form-control">
                        </div>
                    </div> 

                    <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" name="news_Update" value="Update" class="btn btn-success">
                    </div>
                    </div>

                </form>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

