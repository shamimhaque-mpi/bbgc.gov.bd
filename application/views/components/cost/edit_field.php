<style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer{display: none !important;}
        .panel{border: 1px solid transparent;left: 0px;position: absolute;top: 0px;width: 100%;}
        .hide{display: block !important;}
        .block-hide{display: none;}
    }
</style>
<div class="container-fluid block-hide">
    <div class="row">
    <?php echo $this->session->flashdata('confirmation'); ?>
    <!-- horizontal form -->
    <?php   $attribute = array('name' => '','class' => 'form-horizontal','id' => '');
            echo form_open('', $attribute);
    ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Edit</h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>
                <!-- left side -->
                <div class="col-md-9">                                
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Field Of Cost </label>
                        <div class="col-md-6">
                            <input type="text" name="field_cost" value="<?php echo $getField[0]->cost_field; ?>" class="form-control">
                            <input type="hidden" name="code" value="<?php echo $getField[0]->code; ?>" class="form-control">
                        </div>
                        <div class="btn-group">
                            <input class="btn btn-success" type="submit" name="submit" value="Update">
                        </div>
                    </div>
                        
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>