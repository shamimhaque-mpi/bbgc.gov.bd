<style>
    @media print{
        aside{
            display: none !important;
        }
        nav{
            display: none;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .none{
            display: none;
        }
        .panel-heading{
            display: none;
        }

        .panel-footer{
            display: none;
        }
        .panel .hide{
            display: block !important;
        }
        .title{
            font-size: 25px;
        }
    }
</style>



<div class="container-fluid">
    <div class="row">
        <?php
        echo $this->session->flashdata('confirmation');
        echo form_open();
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Student's Information</h1>
                    <!--<button type="submit" name="send" class="btn btn-success pull-right" style="font-size: 14px; margin-top: 0;"><i class="fa fa-envelope-o"></i> Send SMS</button>-->
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">

                <div class="row hide">
                    <div class="view-profile">
                        <div class="col-xs-2">
                            <figure class="pull-left">
                                <img class="img-responsive" src="<?php echo site_url('private/images/logo.jpg'); ?>" style="width: 100px; height: 100px;" alt="">
                            </figure>
                        </div>

                        <div class="col-xs-8">
                            <div class="institute">
                                <h2 class="text-center" style="margin-top: 10; font-weight: bold;">NOTRE DAME COLLEGE</h2>
                                <h3 class="text-center">MYMENSINGH</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th width="50">SL</th>
                        <!--<th width="60">Image</th>-->
                        <!--<th>-->
                        <!--    <label  for="selectAll">-->
                        <!--        <input type="checkbox" id="selectAll" checked> Mobile-->
                        <!--    </label >-->

                        <!--</th>-->
                        <th>Student ID</th>
                        <th>Pssword</th>
                        <th width="120">Action</th>
                    </tr>
                    <?php
                    if(!empty($allStudents)) {
                        foreach($allStudents as $_key => $s_value){
                            ?>
                            <tr>
                                <th><?php echo ++ $_key; ?></th>
                                <?php /* ?>
                                <th style="padding: 0px !important;">
                                    <img style="width: 60px; height: 60px;" src="<?php echo base_url($s_value->photo); ?>">
                                </th>
                                
                                <th>
                                    <label  for="<?php echo "item_" . $s_value->id; ?>">
                                        <input type="checkbox" name="mobile[]" checked id="<?php echo "item_" . $s_value->id; ?>" class="selectItem" value="<?php echo $s_value->mobile; ?>" > <?php echo $s_value->mobile; ?>
                                    </label >
                                </th>
                                <?php */ ?>
                                <th>
                                    <?php echo $s_value->student_id; ?>
                                    <input type="checkbox" style="opacity: 0;" checked name="message[]" class="<?php echo "item_" . $s_value->id; ?>" value="<?php echo "Dear Student, Your ID-". $s_value->student_id ." and Pass-" . $s_value->password. " for online registration, Regards NDCM"; ?>">
                                </th>
                                <th><?php echo $s_value->password; ?></th>
                                <th>
                                    <a class="btn btn-warning" title="Edit" href="<?php echo base_url("apply_now/send_sms/edit/$s_value->id"); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure want to delete this Data?');" href="<?php echo base_url("apply_now/send_sms/delete/$s_value->id"); ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </th>
                            </tr>
                        <?php } } else { ?>
                        <tr>
                            <td colspan="4" class="text-center"> Data not found! </td>
                        </tr>
                    <?php } ?>
                </table>

                <!--<button type="submit" name="send" class="btn btn-success pull-right" style="font-size: 14px; margin-top: 0;"><i class="fa fa-envelope-o"></i> Send SMS</button>-->

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#selectAll").on('change', function(event) {
            event.preventDefault();
            if($(this).is(":checked")==true){
                $('input[name="mobile[]"]').prop("checked", true);
                $('input[name="message[]"]').prop("checked", true);
            }else{
                $('input[name="mobile[]"]').prop("checked", false);
                $('input[name="message[]"]').prop("checked", false);
            }
        });

        $(".selectItem").on('change', function(event) {
            event.preventDefault();
            var itemId = '.'+(event.target.id);
            if($(this).is(":checked")==true){
                $(itemId).prop("checked", true);
            }else{
                $(itemId).prop("checked", false);
            }
        });
    })
</script>
