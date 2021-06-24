<style>
	.teacher_table table tr td:nth-child(2){
		width: 80px;
		height: 80px;
	}
</style>

<div class="col-md-9">
    <div class="row">       
		<div class="single teacher_table">
		
		    <h3>কর্মচারী বৃন্দ</h3>
			<table>
				<thead>
					<tr>
						<th>ক্রম</th>
						<th>ছবি</th>
						<th>নাম</th>
						<th>পদবী</th>
						<th>মোবাইল</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($staff as $key => $staff) { ?>
				   <tr>
					<td><?php echo $key+1; ?></td>
					<td><img src="<?php echo site_url($staff->employee_photo);?>" width="80px" height="80px"></td>
					<td><?php echo $staff->employee_name;?></td>
					<td><?php echo filter($staff->employee_designation);?></td>
					<td><?php echo $staff->employee_mobile;?></td>
				   </tr>
				<?php } ?>		
				</tbody>
			</table>
		</div>
    </div>
</div>