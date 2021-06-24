<style>
	.general .col-md-6{padding-left: 0px !important;}
	form.general{height:auto;min-height:250px;}
</style>
<div class="col-md-9">
    <div class="row single search">  
        <!-- single notice section -->	
	<h3>ফলাফল দেখুন </h3>
		 
		<?php
			$attr=array('class'=>'clearfix');
			echo form_open('', $attr);
		?>

			<div class="form-group clearfix">
				<label class="control-label col-xs-2">শ্রেণী</label>
				<div class="col-xs-5">
					<select name="class" class="form-control" required>
					<option value="">-- শ্রেণী--</option>
                    <optgroup label="HSC">
                        <option value="hsc_1st_year">HSC 1st Year</option>
                        <option value="hsc_2nd_year">HSC 2nd Year</option>
                    </optgroup>
                    <optgroup label="BA">
                        <option value="ba_1st_year">BA 1st Year</option>
                        <option value="ba_2nd_year">BA 2nd Year</option>
                        <option value="ba_3rd_year">BA 3rd Year</option>
                    </optgroup>
                    <optgroup label="BSS">
                        <option value="bss_1st_year">BSS 1st Year</option>
                        <option value="bss_2nd_year">BSS 2nd Year</option>
                        <option value="bss_3rd_year">BSS 3rd Year</option>
                    </optgroup>
                    <optgroup label="BBS">
                        <option value="bbs_1st_year">BBS 1st Year</option>
                        <option value="bbs_2nd_year">BBS 2nd Year</option>
                        <option value="bbs_3rd_year">BBS 3rd Year</option>
                    </optgroup>
				</select>
				</div>
			</div>

			<div class="form-group clearfix">
				<label class="control-label col-xs-2">পরীক্ষা</label>
				<div class="col-xs-5">
					<select class="form-control" name="exam" required>
					<option value="">-- পরীক্ষা --</option>
                    <option value="Weekly_Exam">Weekly Exam</option>
                    <option value="Monthly_Exam">Monthly Exam</option>
                    <option value="Model_Test">Model Test</option>
                    <option value="Year_Final">Year Final</option>
				</select>
				</div>
			</div>

			<div class="col-xs-7">
				<input class="pull-right" type="submit" name="result_Query" value="দেখুন" name="submit" />
			</div>
			
		<?php echo form_close(); ?>
		<?php if(isset($result)){ ?>
				<table>
					 <tr>
					    <th>ক্রম</th>
					    <th>শ্রেণী</th>
					    <th>পরীক্ষা</th>					
					    <th>তারিখ</th>
					    <th>ফলাফল</th>
					</tr>
				<?php  foreach ($result as $key => $result) { ?>
					 <tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $result->result_class;?></td>						
						<td><?php echo str_replace("_", " ",$result->result_exam);?></td>
						<td><?php echo $result->result_date;?></td>						
						<td><a href="<?php echo base_url($result->result_attachment) ;?>" download > ডাউনলোড</a></td>
					</tr>
				<?php }?>
			  </table>
		<?php } ?>
    </div>
</div>