<div class="container-fluid">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Add Description</h1>
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
                        <input type="text" name="description" class="form-control" required>
                    </div>
                </div>

                <d

                <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" value="Save" name="add" class="btn btn-primary">
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php if($description != null){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>All Description</h1>
                </div>
            </div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="50">SL</th>
                        <th>Description Name</th>
                        <th width="125">Action</th>
                    </tr>

                    <?php foreach($description as $key => $row) { ?>
                    <tr>
                        <td><?php echo ($key + 1); ?></td>
                        <td><?php echo $row->description; ?></td>
                        <td>
                            <a href="<?php echo site_url('payment/description/editDescription?id=' . $row->id); ?>" class="btn btn-warning">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>

                            <a href="<?php echo site_url('payment/description/deleteDescription?id=' . $row->id); ?>" onclick="return confirm('Are You Sure Want to Delete this Exam Name?');" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php } ?>
    </div>
</div>
