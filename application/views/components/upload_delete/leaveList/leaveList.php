<div class="container-fluid">
    <div class="row">
        <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Leave List</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>Add Gallery Images</h4>

                    <ol style="font-size: 14px;">
                        <li>1 . Leave List must contain <mark>*.pdf *</mark></li>
                        <li>2 . To upload leave list click on the <mark>Upload</mark> Button</li>
                    </ol>

                </blockquote>

                <hr-->

                <!-- horizontal form -->
                    
                <div class="col-xs-12 no-padding">

                    <?php
                        $attr=array("class"=>"form-horizontal");
                        echo form_open_multipart('', $attr);
                    ?>
            
                        <div class="form-group">
                            <label class="col-md-2 control-label">Title <span class="req">*</span></label>
                            <div class="col-md-5">
                                <input type="text" name="leave_title" class="form-control file" required placeholder="Maximum 100 characters">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-md-2 control-label">Select File ('.pdf ') <span class="req">*</span></label>
                            <div class="col-md-5">
                                <input id="input-test" type="file" name="attachFile" required class="form-control file" data-show-preview="false" required data-show-upload="false" data-show-remove="false">
                            </div>
                        </div> 

                        <div class="col-md-7">
                        <div class="btn-group pull-right">
                            <input type="submit" name="submit_leavelist" value="Upload" class="btn btn-primary">
                        </div>
                        </div>

                    <?php echo form_close(); ?>
                </div>
                
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

