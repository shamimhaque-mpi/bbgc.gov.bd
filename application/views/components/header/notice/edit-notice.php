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
                    <h1>Edit Notice</h1>
                </div>
            </div>

            <div class="panel-body">


                <?php
                $attr=array(
                    "class"=>"form"
                    );
                echo form_open_multipart('header/notice/edit_notice/?id='.$this->input->get("id"), $attr);?>
                    <input type="hidden" name="old_file" value="<?php echo custom_fetch($single_data,"notice_path"); ?>">

                    <div class="form-group row">
                        <label class="control-label col-md-2">Notice Title <span class="req">*</span></label>
                        <div class="col-md-5">
                        <input type="text" name="title" class="form-control" placeholder="Maximum 250 characters" required value="<?php echo custom_fetch($single_data,"notice_title"); ?>">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="control-label">Notice Description <span class="req">*</span></label>
                        <textarea name="description" id="tinyTextarea" class="form-control" cols="30" rows="15" required><?php echo custom_fetch($single_data,"notice_description"); ?></textarea>
                    </div> 
                    
                    <div class="form-group row">
                        <label class="control-label col-md-2">Attach File <span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                        <input id="input-test" type="file" name="attachFile" class="form-control file" data-show-preview="false" data-show-upload="false" data-show-remove="false">
                        </div>
                    </div> 

                    <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" value="Update" name="notice_update" class="btn btn-primary">
                    </div>
                    </div>

                <?php form_close(); ?>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

