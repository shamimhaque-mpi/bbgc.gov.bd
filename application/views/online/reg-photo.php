<!-- upload area stare -->
<div class="col-md-9">
    <div class="row single search">
        <h3>Upload Section</h3>
     
        <form action="" class="general">

        <div id="mess"><?php echo $confirmation; ?></div>

        <div class="col-md-6">
            <input type="text" name="pin" placeholder="Your PIN Number" value="<?php echo $tracking; ?>" style="margin-bottom: 20px;" required />
   
            <p>Upload Photo</p>
            <div class="form-group upload-img">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width:300px; height:300px;">
                        <img src="http://placehold.it/300x300">
                    </div>

                    <div class="custom-button">
                        <span class="btn btn-default btn-file">
                            <span class="fileinput-new">Upload image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="photo" required />
                        </span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <input type="submit" value="Submit" name="reg_photo" />
            </div>
        </div>

        </form>
    </div>
</div>
<!-- upload area end -->


