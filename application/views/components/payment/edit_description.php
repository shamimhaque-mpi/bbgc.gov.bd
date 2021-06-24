<div class="container-fluid">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Edit Description</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php
                $attr = array("class" => "form-horizontal");
                echo form_open("", $attr);
                ?>

                <div class="form-group">
                    <label class="col-md-2 control-label">
                       Description
                        <span class="req">*</span>
                    </label>

                    <div class="col-md-5">
                        <input type="text" name="description" value="<?= $description[0]->description; ?>" class="form-control" required>
                        <input type="hidden" name="id" value="<?= $description[0]->id; ?>" class="form-control" >
                        <input type="hidden" name="old_description" value="<?= $description[0]->description; ?>" >
                    </div>
                </div>

                <d

                <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" value="Update" name="change" class="btn btn-primary">
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>

        
        </div>

</div>

