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
                    <h1>Notice</h1>
                </div>
            </div>

            <div class="panel-body">
                    
                    
                <!--blockquote class="form-head">

                    <h4>Add New Notice</h4>

                    <ol style="font-size: 14px;">
                        <li>1 . to add <mark>News</mark> fill the gap's bellow</li>
                        <li>2 . to save click on the <mark>save</mark> button</li>
                        <li>3 . select only <mark>.jpg, .jpeg, .png, .pdf</mark> files</li>
                    </ol>
                </blockquote>

                <hr-->


                <?php
                $attr=array(
                    "class"=>"form"
                    );
                 echo form_open_multipart("",$attr);?>
        
                    <div class="form-group row">
                       <label class="control-label col-md-2">Notice Title <span class="req">*</span></label>
                       <div class="col-md-5"> 
                        <input type="text" name="title" class="form-control" placeholder="Maximum 250 characters" >
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="control-label">Notice Description <span class="req">*</span></label>

                        <textarea name="description" id="tinyTextarea" class="form-control" cols="30" rows="15" ></textarea>

                    </div> 

                    <div class="form-group row">
                        <label class="control-label col-md-2">Attach File ('.pdf ') <span class="req">&nbsp;</span></label>
			<div class="col-md-5">
                        <input id="input-test" type="file" name="attachFile" class="form-control file" data-show-preview="false" data-show-upload="false" data-show-remove="false">
                        </div>
                        
                    </div> 

                    <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" value="Save" name="save_notice" class="btn btn-primary">
                    </div>
                    </div>

                <?php echo form_close(); ?>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

