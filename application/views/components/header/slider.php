<div class="container-fluid">
    <div class="row">
    <?php echo $confirmation;?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Slider</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>Add Slider Images</h4>

                    <ol style="font-size: 14px;">
                        <li>1. fill all the required <mark>*</mark> fields<br/> </li>
                        <li>2. Image Dimension <mark>width 1020px height 400px</mark> and maximum size <mark>1024kb or 1Mb</mark></li>
                        <li>3. click the <mark>save</mark> button to save your informations</li>
                    </ol>

                </blockquote>

                <hr-->

                <!-- slider -->
                
                
                <div class="gallery image-gallery clearfix">
                <?php foreach ($slider_data as $key => $slider) { ?>
                    <figure>
                        <img src="<?php echo site_url($slider->slider_path)?>" alt="">
                        <figcaption>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this Data?');" href="?delete_token=<?php echo $slider->id ?>&img_url=<?php echo $slider->slider_path;?>">Delete</a>
                        </figcaption>
                    </figure>
                <?php }?>
                </div>
                
                
                <hr>

                <!-- horizontal form -->
                    
                <div class="col-xs-12 no-padding">
                    <?php
                    $attr=array(
                        'class'=>'form-horizontal'
                        );
                     echo form_open_multipart("",$attr); ?>
            
                    <div class="form-group">
                        <label class="col-md-2 control-label">Slide Title <span class="req">*</span></label>

                        <div class="col-md-5">
                            <input type="text" name="sliderTitle" class="form-control file" required placeholder="Maximum 100 characters">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Slider Link</label>

                        <div class="col-md-5">
                            <input type="text" name="sliderUrl" class="form-control file" placeholder="Enter Slider Link">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-2 control-label">Image ('<mark>W: 1020px H: 400px</mark>') <span class="req">*</span></label>

                        <div class="col-md-5">
                            <input id="input-test" type="file" name="slider_image" class="form-control file" data-show-preview="false" required data-show-upload="false" data-show-remove="false">
                        </div>
                    </div> 

                    <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" name="slider_Save" value="Save" class="btn btn-primary">
                    </div>
                    </div>

                <?php form_close(); ?>
                </div>
                
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

