<div class="container-fluid">
    <div class="row">
        <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Magazine</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>Routine Upload</h4>

                    <ol style="font-size: 14px;">
                        <li>1. fill all the required <mark>*</mark> fields</li>
                        <li>2. you can upload only <mark>.pdf</mark> files</li>
                        <li>3. Click the <mark>save</mark> button to insert data</li>
                    </ol>

                </blockquote>

                
                <hr-->

                <!-- horizontal form -->


                <?php
                $attr=array("class"=>"form-horizontal");
                echo form_open_multipart("",$attr);?>
        
                    <div class="form-group">
                        <label class="col-md-2 control-label">Title <span class="req">*</span></label>
                        <div class="col-md-5">
                            <input type="text" name="magazine_title" class="form-control" required>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-2 control-label">Select File ('.pdf ') <span class="req">*</span></label>
                        <div class="col-md-5">
                            <input id="input-test" type="file" name="attachFile" required class="form-control file" data-show-preview="false" data-show-upload="false" data-show-remove="false">
                        </div>
                    </div> 

                    <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" name="magazine_submit" value="Upload" class="btn btn-primary">
                    </div>
                    </div>

                <?php echo form_close(); ?>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

