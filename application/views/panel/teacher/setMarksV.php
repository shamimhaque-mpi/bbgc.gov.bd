<style>
	h4 a{font-size:18px;}
	a{
		color: #1887CB;
		text-decoration: none !important;
	}
	.notice-area{
		border: 1px solid rgba(0,0,0,0.1);
		padding: 10px 20px;
		height: auto;
		max-height: 185px;
	}
	form.formBottom{
		height: auto;
		max-height: 600px;
		overflow-y: scroll;
		overflow-x: hidden;
	}
	form label{
		width: 100%;
		text-align: right;
		line-height: 35px;
		font-weight: normal;
	}
	form select{
		width: 50%;
		height: 35px;
		border: 1px solid rgba(0,0,0,0.2);
		padding: 5px;
		font-size: 14px;
	}
	form option{
		padding: 8px;
	}
	
	form span{
		color: #f00;
		font-weight: bold;
		font-size: 18px;
	}
	input[type="submit"]{
		background: #1887CB;
		border: 1px solid #1887CB;
		padding: 10px 18px;
		color: #fff;
	}
	input[type="submit"]:hover{
		background: #FFF;
		border: 1px solid #1887CB;
		color: #1887CB;
	}
	table input[type="number"]{
		width: 80px;
	}
	table input[type=number]{
		-moz-appearance: textfield;
	}
	table th{
		text-align: center;
		color: #1887CB;
	}
	table td{
		padding: 0;
	}
	table tr td:first-child{
		padding: 0 5px;
	}
	.table-responsive input[type="submit"]{
		margin-top: 8px;
		float: right;
		line-height: 12px;
	}
</style>





<!-- student panel start -->
<div class="col-md-12">

<div class="row" style="margin:0px -16px 7px -15px;">
<nav>
     <ul id="nav" class="slimmenu" style="padding-left:0;">
     	<li><a href="<?php echo site_url('teacherPanel/dashboard'); ?>">Home</a></li>                                
        <li><a href="<?php echo site_url('teacherPanel/setMarksC'); ?>">Set Marks</a></li>

        <li><a href="<?php echo site_url('access/teachers/logout'); ?>">Logout</a></li>
     </ul>
</nav>
</div>
        
        
    <div class="row single search">

        
        <h3 align="center">Set Marks</h3>
        
        
        <!-- main contant start -->
		    	<div class="col-md-12" style="background: #fff;">
		    		<div class="row main-content-right">
		    			

						<div class="full-width">						
						 <?php echo form_open(''); ?>
								<div class="row">
								
									<div class="col-md-3">

										<label>Exam<span>*</span></label>
									</div>
									
									<div class="col-md-9">
										<select name="exam_name" required>
											<option value="">-- Select Exam --</option>
											<option value="Weekly Exam">Weekly Exam</option>
			                                <option value="Monthly Exam">Monthly Exam</option>
			                                <option value="Model Test">Model Test</option>
			                                <option value="Year Final">Year Final</option>
										</select>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-3">
										<label>Class <span>*</span></label>
									</div>
									
									<div  class="col-md-9">
									    <select name="class" required>
											<option value="">-- Select Class --</option>
											<option value="Eleven" >Eleven</option>
											<option value="Twelve" >Twelve</option>
											
										</select>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-3">
										<label>Subject <span>*</span></label>
									</div>
									
<div class="col-md-9">

	
	
 <select name="subject" required>
 <option value="">Select Subject</option>
 <option value="bangla">Bangla</option>
 <option value="math">Math</option>
 <option value="english">English</option>
 <!--option value="arabic_writing">Arabic Writing</option>
 <option value="hadith">Hadith</option>
 <option value="general_knowledge">General Knowledge</option>
 <option value="computer">Computer</option>
 <option value="social_science">Social Science</option>
 <option value="general_science">General Science</option>
 <option value="quran">Quran</option>
 <option value="akaid">Akaid</option>
 
  <optgroup label="Atfal(Alif)">
   <option value="kalima_masayel_and_hadith">Kalima Masayel and Hadith</option>
  </optgroup>
  
  <optgroup label="Atfal(Jim)">
	<option value="kalima_masayel">Kalima Masayel</option>
	<option value="ojanake_jana">Ojanake Jana</option>
	<option value="arabic_and_islam_studies">Arabic and Islam Studies</option>
  </optgroup>
  
  <optgroup label="Awal">
    <option value="arabic_and_islam_studies">Arabic and Islam Studies</option>
    <option value="ojanake_jana">Ojanake Jana</option>
    <option value="kalima_masayel">Kalima Masayel</option>
  </optgroup>
  
   <optgroup label="Sani">
    <option value="nurani_arabic">Nurani Arabic</option> 
  </optgroup>
  
  <optgroup label="Calis">
    <option value="arabic_1st_paper">Arabic 1st Paper</option>
    <option value="arabic_2nd_paper">Arabic 2nd Paper</option>
  </optgroup>
  
   <optgroup label="Rabe">
    <option value="arabic_1st_paper">Arabic 1st Paper</option>
    <option value="arabic_2nd_paper">Arabic 2nd Paper</option>
  </optgroup>
  
  <optgroup label="Khamesh">
    <option value="quran_and_fikha">Quran and Fikha</option> 
    <option value="social_and_science">Social and Science</option> 
    <option value="arabic_1st_and_arabic_2nd">Arabic 1st and Arabic 2nd</option> 
    <option value="bangla_1st_and_bangla_2nd">Bangla 1st and Bangla 2nd</option> 
    <option value="english_1st_and_english_2nd">English 1st and English 2nd</option> 
  </optgroup>
  
  <optgroup label="Sadesh">
    <option value="fikha">Fikha</option>
	<option value="bangla_1st_paper">Bangla 1st Paper</option>
    <option value="bangla_2nd_paper">Bangla 2nd Paper</option>
	<option value="english_1st_paper">English 1st Paper</option>
    <option value="english_2nd_paper">English 2nd Paper</option>
    <option value="arabic_1st_paper">Arabic 1st Paper</option>
    <option value="arabic_2nd_paper">Arabic 2nd Paper</option>
    <option value="bangladesh_and_global_studies">Bangladesh and Global Studies</option>
    <option value="work_and_life_oriented_education">Work and Life Oriented Education</option>
    <option value="agriculture_studies">Agriculture Studies</option>
    <option value="ict">ICT</option>
  </optgroup>
  
  <optgroup label="Sabe">
    <option value="fikha">Fikha</option>
	<option value="bangla_1st_paper">Bangla 1st Paper</option>
    <option value="bangla_2nd_paper">Bangla 2nd Paper</option>
	<option value="english_1st_paper">English 1st Paper</option>
    <option value="english_2nd_paper">English 2nd Paper</option>
    <option value="arabic_1st_paper">Arabic 1st Paper</option>
    <option value="arabic_2nd_paper">Arabic 2nd Paper</option>
    <option value="bangladesh_and_global_studies">Bangladesh and Global Studies</option>
    <option value="work_and_life_oriented_education">Work and Life Oriented Education</option>
    <option value="agriculture_studies">Agriculture Studies</option>
    <option value="ict">ICT</option>
  </optgroup-->
  
  
</select> 
	

	
	
	
	
	
	
	
	
	
	
	
		</div>
			</div>	
								
								
								
								
								
				<div class="row">
							<div class="col-md-3">
								<label>Subject Type <span>*</span></label>
							</div>		
								
								
					<div  class="col-md-9">
									    <select name="type" required>
											<option value="">-- Select Subject Type --</option>
											  <option value="optional" >Optional</option>
                                              <option value="compulsory" >Compulsory</option>
                  
										</select>
									</div>
								</div>	

									
								<!-- /div -->
								
								
								
								
														
								
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										 <input type="submit"  style="width: 108px;
height: 43px;" name="btn_generate" value="Generate" />
									</div>
								</div>
							 <?php echo form_close(); ?>
						</div>	
						<br/><br/>
                 
						<div class="full-width row">
					      <div class="col-md-12 table-responsive">
					      <?php 
					      	$attr = array(
					      		"class" => "formBottom",
					      		"name" => "",
					      		"id" => ""
					      	);
					      	echo form_open($attr); 
					      ?>
					      
								 <table id="result">
									<tr>
										<th>Sl</th>
										<th>Name</th>
										<th>Roll</th>
										<th style="width: 60px;">Written</th>
										<th>Objective</th>
										<th>Viva Voce</th>								
										<th>Marks</th>
										<th>Grade</th>
										<th>GP</th>
									</tr>
	<tr>	
	<td>	
					
<input type="hidden" name="exam_name_after" value="" />
<input type="hidden" name="class_after" value="" />
<input type="hidden" name="type_after" value="" />
<input type="hidden" name="subject_after" value="" />
<input type="hidden" name="percent" value="" id="percent" />
</td>
</tr>
			
					<tr>
					<td style="width: 40px;"></td>
					<td style="width: 140px;"></td>
													
<td style="width: 100px;"><input type="text" value="" name="roll[]" readonly /></td>

<td style="width: 60px;"><input type="number" style="width: 60px;" name="written[]" id="" 
 max="" 
 step="0.01"  /></td>
 
<td style="width: 60px;"><input type="number" style="width: 60px;" name="objective[]" 
id="" 
max="" 
step="0.01" /></td>


<td style="width: 60px;"><input type="number" style="width: 60px;" name="viva[]" 
  id=""
  max=""
  step="0.01" /></td>
  
  

					<td style="width: 60px;">
					<input 
					type="number" style="width: 60px;"
					name="sum[]" 
					class="sum"
					id=""
					data-target=""
					step="any"
					max=
					data-tmarks=""
					data-omarks=""
					data-pmarks=""
					readonly />
					</td>					

					<td style="width: 60px;">
					<input 
					type="text" style="width: 60px;"
					name="grade[]" 
					class="grade"
					data-target=""
					readonly />
					</td>

					<td style="width: 60px;">
					<input 
					type="text" style="width: 60px;"
					name="" 
					class="gp"
					data-target=""
					readonly />
					</td>
					</tr>

		</table>
		
		 <input type="submit" class="button" name="btn_result" value="Save" />

		 <?php  echo form_close(); ?>
		
	</div>
</div>
</div>	

			
				   </div>
      
        
        
    </div>
</div>
<!-- student panel end -->

