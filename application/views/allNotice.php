<div class="col-md-9">
    <div class="row">
        <!-- single notice section -->
		
		<div class="single">

			<h3>সকল নোটিশ</h3>

			<table>
				<tr>
					<th>ক্রম</th>
					<th>টাইটেল</th>
					<th>তারিখ</th>
					<th>ডাউনলোড</th>
					<th>দেখুন</th>
				</tr>
			<?php foreach ($all_notice as $key => $notices) { ?>
				<tr>
					<td><?php echo $key+1; ?></td>
					<td><?php echo $notices->notice_title;?></td>
					<td><?php echo $notices->notice_date;?></td>
					<td><a href="<?php echo site_url($notices->notice_path);?>" download><i class="fa fa-download"></i> ডাউনলোড</a></td>
					<td><a target="_blank" href="<?php echo site_url('home/notice'); ?>?id=<?php echo $notices->id ?>"><i class="fa fa-eye" aria-hidden="true"></i> দেখুন</a></td>
				</tr>
			<?php } ?>
			</table>
		</div>
		<br/>
    </div>
</div>