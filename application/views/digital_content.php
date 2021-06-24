<style>
	.general .col-md-6{padding-left: 0px !important;}
	form.general{height:auto;min-height:250px;}
</style>
<div class="col-md-9">
    <div class="row single search">  
        <!-- single notice section -->	
		
		<h3>Digital Content</h3>
		 
		<?php
			$attr=array('class'=>'clearfix');
			echo form_open('', $attr);
		?>

			<div class="form-group clearfix">
				<label class="control-label col-md-2">Class</label>
				<div class="col-md-5">
					<select name="class" class="form-control" required>				   
						<option value="">-- Select Class --</option>
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
				<label class="control-label col-md-2">Group</label>
				<div class="col-md-5">
					<select name="group" class="form-control" required>				   
						<option value="">-- Select Group --</option>
                        <option value="Science">Science</option>
                        <option value="Huminities">Huminities</option>
                        <option value="Business_Studies">Business Studies</option>
					</select>
				</div>
			</div>

			<div class="form-group clearfix">
			    <label class="control-label col-md-2">Subject</label>
				<div class="col-md-5">
					<select name="subject" class="form-control" required >				   
						<option value="">-- Select Subject --</option>
                        <optgroup  label="Eleven & Twelve">
                            <option value="bangla_1st_paper">Bangla 1st Paper</option>
                            <option value="bangla_2nd_paper">Bangla 2nd Paper</option>
                            <option value="english_1st_paper">English 1st Paper</option>
                            <option value="english_2nd_paper">English 2nd Paper</option>  
                        	<option value="ict">ICT</option> 
                        </optgroup>

                        <!--optgroup  label="Science">
                            <option value="physics_1st_paper">Physics 1st Paper</option>
                            <option value="physics_2nd_paper">Physics 2nd Paper</option>
                            <option value="chemistry_1st_paper">Chemistry 1st Paper</option>
                            <option value="chemistry_2nd_paper">Chemistry 2nd Paper</option>
                            <option value="botany">Botany</option>
                            <option value="zoology">Zoology</option>
                            <option value="higher_math_1st_paper">Higher Math 1st Paper</option>
                            <option value="higher_math_2nd_paper">Higher Math 2nd Paper</option>
                        </optgroup>

                        <optgroup  label="Arts">
                            <option value="history_1st_paper">History 1st Paper</option>
                            <option value="history_2nd_paper">History 2nd Paper</option>
                            <option value="civics_and_good_governance_1st_paper">Civics & Good Governance 1st Paper</option>
                            <option value="civics_and_good_governance_2nd_paper">Civics & Good Governance 2nd Paper</option>
                            <option value="economics_1st_paper">Economics 1st Paper</option>
                            <option value="economics_2nd_paper">Economics 2nd Paper</option>
                            <option value="social_science_1st_paper">Social Science 1st Paper</option>
                            <option value="social_science_2nd_paper">Social Science 2nd Paper</option>
                            <option value="social_action_1st_paper">Social Action 1st Paper</option>
                            <option value="social_action_2nd_paper">Social Action 2nd Paper</option>   
                        </optgroup>

                        <optgroup label="Commerce">
                            <option value="business_organization_and_management_1st_paper">Business Organization and Management 1st Paper</option>
                            <option value="business_organization_and_management_2nd_paper">Business Organization and Management 2nd Paper</option>
                            <option value="accounting_1st_paper">Accounting 1st Paper</option>
                            <option value="accounting_2nd_paper">Accounting 2nd Paper</option>
                            <option value="finance_and_banking_1st_paper">Finance & Banking 1st Paper</option>
                            <option value="finance_and_banking_2nd_paper">Finance & Banking 2nd Paper</option>
                            <option value="production_management_and_marketing_1st_paper">Production Management and Marketing 1st Paper</option>
                            <option value="production_management_and_marketing_2nd_paper">Production Management and Marketing 2nd Paper</option>
                        </optgroup-->
					</select>
				</div>
			</div>

			<div class="col-xs-7">
				<input class="pull-right" type="submit" name="result_Query" value="Show" name="submit" />
			</div>
		<?php echo form_close(); if($digital_content!=NULL){ ?>
		
				 <table>
				 <tr>
				    <th>Sl</th>
				    <th>Title</th>
					<th>Class</th>
					<th>Group</th>
					<th>Subject</th>
					<th>Date</th>
					<th>Content</th>
				</tr>
				<?php foreach ($digital_content as $key => $d_c) { ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $d_c->dc_title; ?></td>
						<td><?php echo $d_c->dc_class; ?></td>
						<td><?php echo ucfirst($d_c->dc_group); ?></td>
						<td><?php echo ucfirst(str_replace("_"," ",$d_c->dc_subject)); ?></td>
						<td><?php echo $d_c->dc_date; ?></td>
						<td><a href="<?php echo base_url($d_c->dc_attachment); ?>" download > Download </a></td>
					</tr>
				<?php } ?>
			  </table>
			  <?php } ?>
    </div>
 
</div>