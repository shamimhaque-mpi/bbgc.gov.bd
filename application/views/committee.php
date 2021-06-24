<style>
	.teacher_table table tr td:nth-child(2){
		width: 80px;
		height: 80px;
	}
</style>

<div class="col-md-9">
    <div class="row">       
		<div class="single teacher_table">
		
		    <h3>কলেজ কমিটির সদস্যবৃন্দ </h3>
			<table>
				<thead>
					<tr>
						<th>ক্রম</th>
						<th>ছবি</th>
						<th>নাম</th>
						<th>পদবী</th>
						<th>সময়কাল</th>
						<th>মোবাইল</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($committee_info as $key => $committee) {
					$post=str_replace("_"," ",$committee->member_post);
					if (mb_detect_encoding ($post)=="ASCII") {
						$post=ucfirst($post);
					}
					?>
				   <tr>
					<td><?php echo $key+1; ?></td>
					<td><img src="<?php echo site_url($committee->member_photo);?>" width="80px" height="80px"></td>
					<td> <?php echo $committee->member_full_name; ?> </td>
					<td> <?php echo $post; ?> </td>
					<td> <?php echo $committee->member_year_from."-".$committee->member_year_to; ?> </td>
					<td> <?php echo $committee->member_mobile_number; ?> </td>
				   </tr>
				<?php } ?>		
				</tbody>
			</table>
		</div>
    </div>
</div>