<style>
	.single{
	    float: left;
	}
	.teacher_hover{
		padding-top: 20px;
		margin-bottom: 10px;
	}
	.teacher_hover:hover{
	    border: 1px solid #9BC97C;
	    box-shadow: 0px 0px 1px 0px #95C1B9; 
	}
	.teacher_hover img{
	    width: 100%; 
	    height: 140px;
	}
</style>

<div class="col-md-9 col-xs-12">
    <div class="">        
		<div class="single">
		
		    <h3 class="text-center" style="color: green;">শিক্ষক মণ্ডলী</h3><br/>
		    
		   
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_designation == 'vice_principal' ||  $teacher->employee_designation == 'principal'){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    
		    
		    <h4 class="text-center"><b> বাংলা </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'বাংলা'){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
    		
		    </div><h1>&nbsp;</h1><h4 class="text-center"><b> ইংরেজি </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'ইংরেজি'){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    
		    
		    <h4 class="text-center"><b> আই.সি.টি  </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'আই.সি.টি '){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    <h4 class="text-center"><b> উচ্চতর গণিত </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'উচ্চতর গণিত'){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    
		    
		    <h4 class="text-center"><b> পদার্থবিদ্যা </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'পদর্থবিদ্যা' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    <h4 class="text-center"><b> রসায়ন </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'রসায়ন' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    
		    
		    <h4 class="text-center"><b> উদ্ভিদবিদ্যা </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'উদ্ভিদবিদ্যা' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    
		    
		    <h4 class="text-center"><b> প্রাণীবিদ্যা </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		         if($teacher->employee_subject == 'প্রাণিবিদ্যা ' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    
		    <h4 class="text-center"><b> হিসাব বিজ্ঞান </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'হিসাববিজ্ঞান' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    <h4 class="text-center"><b>  পরিসংখ্যান  </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'পরিসংখ্যান' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    
		    
		    <h4 class="text-center"><b> উৎপাদন ব্যবস্থাপনা এবং বিপণন </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'উৎপাদন ব্যবস্থাপনা ও বিপনণ ' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    
		    
		    <h4 class="text-center"><b> ব্যবসা সংগঠন ও ব্যবস্থাপনা </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'ব্যবসায় সংগঠন ' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    
		    
		    <h4 class="text-center"><b> ইতিহাস </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'ইতিহাস' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    
		    
		    <h4 class="text-center"><b> অর্থনীতি </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'অর্থনীতি' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>

		    
		    <h4 class="text-center"><b> পৌরনীতি এবং সুশাসন </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'পৌরনীতি/রাষ্ট্রবিজ্ঞান' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    
		    
		    <h4 class="text-center"><b> ভূগোল </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'ভূগোল ' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    
		    
		    <h4 class="text-center"><b> রাষ্ট্রবিজ্ঞান </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'পৌরনীতি/রাষ্ট্রবিজ্ঞান' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    
		    
		    <h4 class="text-center"><b> মনোবিজ্ঞান </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'মনোবিজ্ঞান' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    
		    
		    <h4 class="text-center"><b> ইসলামিক শিক্ষা  </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'ইসলামী শিক্ষা' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    <h4 class="text-center"><b> ইসলামের ইতিহাস ও সংস্কৃতি  </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'ইসলামের ইতিহাস ও সংস্কৃতি' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    
		    
		    <h4 class="text-center"><b> সমাজকর্ম </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'সমাজকর্ম ' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    
		    <h4 class="text-center"><b> সমাজবিজ্ঞান </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'সমাজবিজ্ঞান' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    <h4 class="text-center"><b> সাঁটলিপি </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'সাঁটলিপি' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    
		    
		    <h4 class="text-center"><b> কৃষি শিক্ষা  </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'কৃষিশিক্ষা' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
    		 </div><h1>&nbsp;</h1>
    		<h4 class="text-center"><b>শারীরিক শিক্ষা  </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'শারীরিক শিক্ষা' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
    		<h4 class="text-center"><b> যুক্তিবিদ্যা/দর্শন </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'যুক্তিবিদ্যা/দর্শন' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    
		    <h4 class="text-center"><b>সাচিবীক বিদ্যা   </b> </h4><hr/>
		    <div class="col-xs-12">
		    <?php foreach ($teachers as $key => $teacher) {
		        if($teacher->employee_subject == 'সাচিবীক বিদ্যা ' ){
		    ?>
    		    <div class="teacher_hover col-xs-3" style="height: 220px">
    		      <img  src="<?php echo site_url($teacher->image);?>">
    		      <h5 class="text-center"><b><?php echo filter($teacher->name); ?></b></h5>
    		      <h6 class="text-center"><b><?php echo filter($teacher->employee_designation); ?></b></h6><br>
    		    </div>
    		<?php } } ?>
		    </div><h1>&nbsp;</h1>
		    
		    
	
		      
		      
			 <!--<table>
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

					<?php /*foreach ($teachers as $key => $teacher) {
					$post=str_replace("_"," ",$teacher->employee_designation);
					if (mb_detect_encoding ($post)=="ASCII") {
						$post=ucfirst($post);
					}
					
					$desig_list=config_item('teacher_designation');
					$designation=$desig_list[$teacher->employee_designation];
					$des=$designation;*/

					 ?>
				     <tr>
						<td><?php echo $key+1; ?></td>
						<td><img src="<?php echo site_url($teacher->image);?>" width="80px" height="80px"></td>
						<td><?php echo $teacher->name; ?></td>
						<td><?php echo $des; ?></td>
						<td><?php echo $teacher->employee_mobile; ?></td>
					 </tr>
					<?php// } ?>							
				</tbody>
			</table>-->
		</div>
    </div>
</div>