<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" /> -->

<style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer{
            display: none !important;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .hide{
            display: block !important;
        }
        .block-hide{
            display: none;
        }
    }
</style>
<div class="container-fluid block-hide">
    <div class="row">

    <?php echo $this->session->flashdata('confirmation'); ?>

    <!-- horizontal form -->
    <?php
    $attribute = array(
        'name' => '',
        'class' => 'form-horizontal',
        'id' => ''
    );
    echo form_open('income/infoView/', $attribute);
    ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Field of Income</h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>

                <!-- left side -->
                <div class="col-md-9">                                

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Field of Income </label>
                        <div class="col-md-7">

                            <input  name="field_income" class="form-control" autocomplete="off" >
                                
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-7">
                            <div class="btn-group pull-right">
                                <input class="btn btn-primary" type="submit" name="submit" value="Save">
                            </div>
                        </div>
                    </div>
                        
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>

<div class="container-fluid" >
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>All Field of Income</h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">
               <!-- Print banner -->
               <!--<img class="img-responsive print-banner hide" src="<?php echo site_url('public/img/banner.jpg'); ?>"> -->
                <span class="hide print-time"><?php echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?></span>
            

            <table class="table table-bordered">
                <tr>
                    <th width="55" >Sl</th>
                    <th>Field of Income</th>
                    <th style="text-align:center; width: 115px;" class="block-hide">Action</th>
                </tr>
                <?php foreach ($incomeField as $key => $value){ ?>
                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $value->field_income; ?></td>
                    <td class="none text-center" >        
                                       
                        <a title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this Field of Income?');" href="<?php echo site_url('income/infoView/delete_field/'.$value->id); ?>" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        
                    </td>
                </tr>
                <?php } ?>
            </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>



<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script> -->

