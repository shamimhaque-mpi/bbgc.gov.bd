


<div class="container-fluid">
    <div class="row">
    <?php echo $confirmation; ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Banner</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>Add Site Banner</h4>

                    <ol style="font-size: 14px;">
                       <li>1. Banner Image must contain <mark>*.jpg or, *.jpeg or, *.png</mark></li>
                       <li>2. Image Dimension <mark>width... height...</mark> and maximum size <mark>1024kb or 1Mb</mark></li>
                       <li>3. To add banner image click on the <mark>Image</mark> field</li>
                    </ol>

                </blockquote>
                
                <hr-->

                <div>
                   
                   <?php if($banner_info!=null) {echo'<img src="'.base_url($banner_info[0]->path).'" />';}?>
                  
                </div>

                <hr>


               <?php
                   $attribute=array(
                        "name"=>"",
                        "class"=>"form-horizontal"
                    );
                    echo form_open_multipart("",$attribute);
                ?>
            
                    <div class="form-group">
                        <label class="col-md-2 control-label">Image <span class="req">*</span></label>

                        <div class="col-md-5">
                            <input id="input-test" type="file" name="banner_image" class="form-control file" data-show-preview="false" data-show-upload="false" data-show-remove="false" required>
                        </div>
                            <input type="hidden" name="banner_id" value="<?php if($banner_info!=null) { echo $banner_info[0]->id;}?>">
                    </div> 

                    <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" name="banner_save" value="Save" class="btn btn-primary">
                    </div>
                    </div>

                <?php echo form_close(); ?>
                
            </div>

           

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

