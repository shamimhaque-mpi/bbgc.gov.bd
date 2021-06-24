<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>SMS Report</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>Send Custom SMS</h4>

                    <ol style="font-size: 14px;">
                        <li>1. you can search sms report by <mark>date</mark></li>
                    </ol>

                </blockquote>
                
                <hr-->

                <div>
                <?php 
                	$sent_sms = 0;
                	foreach($all_sms as $sms){
                		$sent_sms = $sent_sms + $sms->total_messages;
                	}

                ?>
                    <p style="font-size: 16px; margin-bottom: 18px;" class="text-center">Total SMS : <strong><?php echo $total_sms; ?></strong>, &nbsp; Total Sent SMS : <strong><?php echo $sent_sms; ?></strong>, &nbsp; Remaining SMS : <strong><?php echo $total_sms-$sent_sms; ?></strong></p>
                </div>

                <?php
	                $attr=array('class'=>'form-horizontal');
	                echo form_open('',$attr);
                ?>
                    
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="col-md-3 control-label">Date From</label>

                                <div class="input-group date col-md-9" id="datetimepickerSMSFrom">
                                    <input type="text" name="date_from" class="form-control" placeholder="YYYY-MM-DD">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="col-md-3 control-label">Date to</label>

                                <div class="input-group date col-md-9" id="datetimepickerSMSTo">
                                    <input type="text" name="date_to" class="form-control" placeholder="YYYY-MM-DD">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>

                            </div>
                        </div>

                    </div>


                    <div class="btn-group pull-right">
                        <input type="submit" value="Show" name="show_between" class="btn btn-primary">
                    </div> 

                <?php echo form_close(); ?>

            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Show Result</h1>
                </div>
            </div>
		<?php if($sms_record!=null){?>
            <div class="panek-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>Mobile Number</th>
                        <th>Message</th>
                    </tr>
		<?php foreach($sms_record as $key=>$all_sms){?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $all_sms->delivery_date; ?></td>
                        <td><?php echo $all_sms->mobile; ?></td>
                        <td><?php echo $all_sms->message; ?></td>
                    </tr>
                 <?php } ?>
                </table>
            </div>
            <?php } ?>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script>
    // linking between two date
    $('#datetimepickerSMSFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerSMSTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $("#datetimepickerSMSFrom").on("dp.change", function (e) {
        $('#datetimepickerSMSTo').data("DateTimePicker").minDate(e.date);
    });
    $("#datetimepickerSMSTo").on("dp.change", function (e) {
        $('#datetimepickerSMSFrom').data("DateTimePicker").maxDate(e.date);
    });
</script>