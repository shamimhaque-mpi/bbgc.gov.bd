<div class="container-fluid">
    <div class="row">
    <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Video Gallery</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>Add Gallery Images</h4>

                    <ol style="font-size: 14px;">
                        <li>1. fill all the required <mark>*</mark> fields</li>
                        <li>2. click the <mark>save</mark> button to save your informations</li>
                    </ol>

                </blockquote>

                <hr-->

                <!-- Gallery -->
                <div class="row">
                    <div class="col-xs-12">
                        <?php
                        $attr=array(
                            "class"=>"form-horizontal"
                            );
                        echo form_open('', $attr);?>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Embed Code <span class="req">*</span></label>
                            <div class="col-md-5">
                                <input type="text" name="embed_code" class="form-control file" required placeholder="">
                            </div>
                        </div>

                        <div class="col-md-7">
                            <div class="btn-group pull-right">
                                <input type="submit" name="v_gallery_Save" value="Save" class="btn btn-primary">
                            </div>
                        </div>

                    <?php echo form_close(); ?>
                    </div>
                </div>


                <hr>

                <?php if ($v_gallery_data!="") { ?>
                <div class="row">
                    <div class="col-sm-12">
                        <?php foreach ($v_gallery_data as $key => $video) { ?>
                        <div class="gallery video-gallery">
                        
                            <figure>
                                <div class="video"><?php echo $video->embed_code;?></div>
                                <figcaption>
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this Data ?')" href="?delete_token=<?php echo $video->id; ?>">Delete</a>
                                </figcaption>
                            </figure>
                        
                        </div>
                        <?php }?>
                    </div>
                </div>
                <?php } ?>
                
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

