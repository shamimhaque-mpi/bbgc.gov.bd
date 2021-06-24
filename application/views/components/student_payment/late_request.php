 <style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer {
            display: none !important;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .panel .hide{
            display: block !important;
        }
        .title{
            font-size: 25px;        
        }
        .hide{
       	 display: block !important;
        }
       
    }
</style>

<div class="container-fluid">
    <div class="row">
    	<?php echo $confirmation; ?>
    	<?php echo $this->session->flashdata("confirmation"); ?>
        <div class="panel panel-default none">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>বিলম্ব অনুরোধ</h1>
                </div>
            </div>

            <div class="panel-body">

                <?php 
                $attr=array('class'=>'form-horizontal');
                echo form_open('', $attr); ?>

                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo caption('Student_ID'); ?></label>
                        <div class="col-md-5">
                            <input type="text" placeholder="<?php echo caption('Type_Students_ID_Number'); ?>" name="student_id" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">পেমেন্টের তারিখ</label>

                        <div class="input-group date col-md-5" id="datetimepicker">
                            <input type="text" name="payment_date" class="form-control" placeholder="DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>

                    </div>


                    <div class="col-md-7">
                        <div class="btn-group pull-right">
                            <input type="submit" value="<?php echo caption('Save'); ?>" name="save" class="btn btn-primary">
                        </div> 
                    </div>

                <?php echo form_close(); ?>

            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php  //if ($all_payment!=null) { ?>
       
        <div class="panel panel-default">  
            
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left"><?php echo caption('Show_Result'); ?></h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> <?php echo caption('Print'); ?></a>
                </div>
            </div>
            

            <div class="panel-body">

                 <!-- Print Banner -->
                <img class="img-responsive print-banner hide" src="<?php echo site_url('private/images/print-banner.jpg'); ?>" alt="Photo not found...!">


                <hr class="hide" style="border-bottom: 2px solid #ccc; margin:5px 0 10px; ">
                <h4 class="text-center hide" style="font-size: 15px;"><?php echo caption('Payment_Histroy'); ?></h4>
                 <table class="table table-bordered">
                    <tr>
                        <th style="width: 50px;"><?php echo caption('SL'); ?></th>                       
                        <th><?php echo caption('Student_ID'); ?></th>
                        <th>পেমেন্টের তারিখ</th>
                        <th class="none" style="width: 65px;"><?php echo caption('Action'); ?></th>
                    </tr>
                    <?php
                        foreach ($late_request as $key => $val) {

                    ?>
                    <tr>
                        <td><?php echo $key+1; ?></td>                      
                        <td><?php echo $val->student_id; ?></td>
                        <td><?php echo $val->payment_date; ?></td>
                        <td class="none"> <a class="btn btn-danger" href="<?php echo site_url("student_payment/payment/delete_payment_req/".$val->id); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    
                    <?php } ?>  
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php //} ?>
    </div>
</div>


<script>
    // linking between two date
    $('#datetimepicker').datetimepicker({
        format: 'DD',
        useCurrent: false
    });
</script>
