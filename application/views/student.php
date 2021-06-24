<style>
	.teacher_table table tr td:nth-child(2){
		width: 80px;
		height: 80px;
	}
	select{
		width: 327px;
		height: 30px;
		border: 1px solid #0092B7 !important;
		margin-bottom: 8px;
	}
	input[type="submit"]{
		width: 80px;
		height: 30px;
		background: #fff;
		color: #0092B7 !important;
		border: 1px solid #0092B7 !important;
	}
	input[type="submit"]:hover{
		background: #0092B7 !important;
		color: #fff !important;
	}
</style>

<div class="col-md-9">
    <div class="row">       
		<div class="single teacher_table">	
				
            <h3>ছাত্র ছাত্রী খুজুন</h3>
			
			<?php echo form_open("");?>
                <select name="session">
                   <option value="">-- সেশন সিলেক্ট করুন --</option>
                   <?php foreach ($session_list as $key => $value) { ?>
                   <option value="<?php echo $value->session; ?>"><?php echo $value->session; ?></option>
                   <?php } ?>
               </select>
				
		        <select name="class" required="required">				   
		            <option value="">-- শ্রেণী সিলেক্ট করুন --</option>
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
			<input type="submit" name="viewQuery" value="খুঁজুন" />
			<?php echo form_close(); ?>
			
			  <table>
				<thead>
					<tr> 
					    <th>ক্রম</th>
					    <th>রোল</th>
					    <th>ছবি</th>
					    <th>নাম</th>
					    <th>সেশন</th>
					    <th>শ্রেণী</th>
					    <th>মোবাইল</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($student_info as $key => $student) { ?>
					 <tr>   
					    <td><?php echo $key+1; ?></td>
						<td><?php echo $student->students_roll; ?></td>
						<td><img src="<?php echo site_url($student->photo);?>" width="80px" height="80px"></td>
						<td><?php echo $student->students_name; ?></td>
						<td><?php echo $student->session; ?></td>
						<td><?php echo $student->class; ?></td>
						<td><?php echo $student->mobile_number; ?></td>
				     </tr>
				<?php } ?>	
				</tbody>
			</table>
	
		</div>
    </div>
</div>