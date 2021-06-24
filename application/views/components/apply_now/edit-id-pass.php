<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panal-header-title">
            <h4>Edit Student ID/Pass</h4>
        </div>
    </div>

    <div class="panel-body">

        <?php
        $attr = array('class' => 'form-horizontal');
        echo form_open_multipart('', $attr);
        ?>

        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label class="col-md-4 control-label">Student ID </label>
                    <div class="col-md-8">
                        <input type="text" name="student_id"  value="<?php echo $info->student_id; ?>" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Password </label>
                    <div class="col-md-8">
                        <input type="text" name="password"  value="<?php echo $info->password; ?>" class="form-control">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Mobile </label>
                    <div class="col-md-8">
                        <input type="text" name="mobile"  value="<?php echo $info->mobile; ?>" class="form-control">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Photo <span class="req">*</span></label>
                    <div class="col-md-8">
                        <input id="input-test" type="file" name="photo" class="form-control file" data-show-preview="false" data-show-upload="false" data-show-remove="false">
                        <input type="hidden" name="old_photo" value="<?php echo $info->photo; ?>">

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="btn-group pull-right">
                            <input type="submit" value="Update" name="update" class="btn btn-success">
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <img class="img-responsive img-thumbnail" src="<?php echo base_url($info->photo); ?>" alt="" style="width: 150px;">
            </div>
        </div>


        <?php echo form_close(); ?>
    </div>
    <div class="panel-footer">&nbsp;</div>
</div>