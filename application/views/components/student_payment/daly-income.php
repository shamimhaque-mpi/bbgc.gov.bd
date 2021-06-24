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
        .table > tbody > tr > td{
        	padding: 0px 8px;
        	line-height: 1;
        }
       
    }
    .table tr td:first-child, .table tr td:last-child{
    	font-family: 'sutonnymjregular';
    	font-size: 20px;
    }
</style>

<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default none">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>দৈনিক আয়</h1>
                </div>
            </div>

            <div class="panel-body">

                <?php 
                $attr=array('class'=>'form-horizontal');
                echo form_open('', $attr); ?>
                
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo caption('Form'); ?></label>

                        <div class="input-group date col-md-5" id="datetimepickerFrom">
                            <input type="text" name="date[from]" class="form-control" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo caption('To'); ?></label>

                        <div class="input-group date col-md-5" id="datetimepickerTo">
                            <input type="text" name="date[to]" class="form-control" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>

                    </div>
                    
                    


                    <div class="col-md-7">
                        <div class="btn-group pull-right">
                            <input type="submit" value="<?php echo caption('Show_btn'); ?>" name="viewQuery" class="btn btn-primary">
                        </div> 
                    </div>

                <?php echo form_close(); ?>

            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
        
	<?php //if($amount!=null){?>
        <div class="panel panel-default">  
            
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left"><?php echo caption('Show_Result'); ?></h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> <?php echo caption('Print'); ?></a>
                </div>
            </div>
            
            <div class="panel-body">

                 <!-- Print Banner -->
                <img class="img-responsive print-banner hide" style="margin-bottom: 0;" src="<?php echo site_url('private/images/print-banner.jpg'); ?>" alt="Photo not found...!">
                <p class="hide" style="text-align: right;">Date: <?php echo $this->input->post("date")["from"]." - ".$this->input->post("date")["to"]; ?></p>
                <hr class="hide" style="border-bottom: 2px solid #ccc; margin:5px 0 10px; ">
                <h4 class="text-center hide" style="font-size: 15px;">দৈনিক আয়</h4>
                
                
                
                 <div class="table-responsive">
                 	<table class="table table-bordered">
	                	<tr>
	                		<th style="width:40px;">ক্রম</th>
	                		<th>আয়ের খাত</th>
	                		<th>টাকা</th>
	                	</tr>
	                	<?php
	                	$total = array();
	                	$sl = 1;
	                	
	                	$today_due = $this->action->read_sum("due","due",array("date" => date("Y-m-d")));

	                	foreach($fields_name as $field => $field_bn){ 
	                	?>
	                	<tr>
	                		<td><?php echo $sl;?></td>
	                		<td><?php echo $field_bn;?></td>
	                		<td><?php echo $total[] = date_fild_sum($field)?></td>
	                	</tr>
	                	<?php $sl++; } ?>
	                	
	                	<tr>
	                		<td colspan="3" align="center">অন্যান্য</td>
	                	</tr>
                        <?php foreach ($income_data as $key=>$value) { ?>
                        <tr>
                            <td><?php echo $sl;?></td>
                            <td><?php echo $value->purpose;?></td>
                            <td><?php echo $total[] = $value->amount; ?></td>
                        </tr>
                        <?php $sl++; } ?>
                        <tr>
                            <td><?php echo $sl;?></td>
                            <td>মোট বকেয়া</td>
                            <td><?php echo $today_due[0]->due; ?></td>
                        </tr>
	                	
	                	<tr>
	                		<td colspan="2" class="text-right"><b>মোট</b></td>
	                		<td><b><?php echo array_sum($total)-$today_due[0]->due;?></b></td>
	                	</tr>
	                	
	                </table>
                 </div>
                

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
		<?php  ?>
    </div>
</div>


<script>
    // linking between two date
    $('#datetimepickerFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $("#datetimepickerFrom").on("dp.change", function (e) {
        $('#datetimepickerTo').data("DateTimePicker").minDate(e.date);
    });
    $("#datetimepickerTo").on("dp.change", function (e) {
        $('#datetimepickerFrom').data("DateTimePicker").maxDate(e.date);
    });
</script>
