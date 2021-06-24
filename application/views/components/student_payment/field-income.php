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
    .bn{
    	font-family: sutonnymjregular;
    	font-size: 18px;
    }
</style>

<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default none">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>মাসিক আয়</h1>
                </div>
            </div>

            <div class="panel-body">

                <?php 
                $attr=array('class'=>'form-horizontal');
                echo form_open('', $attr); ?>
                
                    <div class="form-group">
                        <label class="col-md-2 control-label">বছর</label>

                        <div class="col-md-5">
                        	<select name="year" class="form-control">
                               <option value="">-- <?php echo caption('Select'); ?> --</option>
                                <?php foreach($years as $key => $value){ ?>
                                <option value="<?php echo $value->payment_year; ?>"><?php echo $value->payment_year; ?></option>
                                <?php  } ?>
                          </select>
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

                <div class="row hide">
                    <div class="view-profile">
                        <div class="col-xs-2">
                            <figure class="pull-left">
                                <img class="img-responsive" src="<?php echo base_url($logo['logo']); ?>" style="width: 100px; height: 100px;" alt="">
                            </figure>
                        </div>
                        <div class="col-xs-8">
                            <div class="institute">
                                <h2 class="text-center title" style="margin-top: 10; font-weight: bold;font-size: 24px;"><?php echo $header_info['site_name']; ?></h2>
                                <h4 class="text-center print-text" style="margin: 0; font-size: 16px;"><?php echo $header_info['place_name']; ?></h4>
                            </div>
                        </div>                            
                     </div>
                </div>
                <hr class="hide" style="border-bottom: 2px solid #ccc; margin:5px 0 10px; ">
                <h4 class="text-center hide" style="font-size: 15px;">খাত অনুযায়ী আয়</h4>
                
				<?php 
					$total_column = array(
						"1" => array(),
						"2" => array(),
						"3" => array(),
						"4" => array(),
						"5" => array(),
						"6" => array(),
						"7" => array(),
						"8" => array(),
						"9" => array(),
						"10" => array(),
						"11" => array(),
						"12" => array()
					);
					
				?>
                
                 <div class="table-responsive">
                 	<table class="table table-bordered">
	                	<tr>
	                		<th style="width:260px;">খাত অনুযায়ী আয় </th>
	                		<?php foreach(config_item("short_month") as $key => $value) { ?>
	                		<th><?php echo $value; ?></th>
	                		<?php } ?>
	                		<th>মোট</th>
	                	</tr>
	                	<?php
                        //Student Payment
	                	$in_total = array();
	                	 foreach ($fields_name as $field => $field_bn) { ?>
	                	<tr>
	                		<td><?php echo $field_bn; ?></td>
	                		<?php

	                		 $total = array();
	                		 foreach(config_item("short_month") as $key => $value) {

	                		 ?>
	                		<td class="bn"><?php echo $total[] = $total_column[$key][] = fild_sum($key,$field); ?></td>

	                		<?php } ?>

	                		<td class="bn"><?php echo $in_total[] = array_sum($total); ?></td>
	                	</tr>
	                	<?php } ?>

                        <tr>
                            <td colspan="14" align="center">অন্যান্য</td>
                        </tr>
                        <?php foreach ($income_field as $in_field) { ?>
                        <tr>
                            <td><?php echo $in_field->purpose; ?></td>
                            <?php

                             $total_income = array();
                             foreach(config_item("short_month") as $key => $value) {
                             $field = $in_field->purpose;
                             ?>
                            <td class="bn"><?php echo $total_income[] = $total_column[$key][] = fild_sum_income($key,$field); ?></td>

                            <?php } ?>
                            <td class="bn"><?php echo $in_total[] = array_sum($total_income); ?></td>
                        </tr>

                        <?php } ?>
	                	<tr>
	                		<td><b>সর্ব মোট</b></td>
	                		<?php foreach ($total_column as $key => $value) { ?>
	                			<td class="bn"><b><?php echo array_sum($value); ?></b></td>
	                		<?php } ?>
	                		<td class="bn"><b><?php echo array_sum($in_total); ?></b></td>
	                		
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
