<!DOCTYPE html>
<html>
<head>
	<title><?php echo ucwords(str_replace('_',' ',$site_name)) .  "  |  "  . ucwords(str_replace('_',' ',$meta_title));?></title>
	<style>
		.wrapper{
			margin: 20px auto;
			width: 100%;
			max-width: 800px;
			height: auto;
			border: 1px solid rgba(0,0,0,0.2);
			
		}
		.header{
			text-align: center;
			max-height: 94px;
		}
		.header img{
			margin: 0;
			width: 100%;
			max-width: 800px;
			height: auto;
		}
		.body{
			padding: 10px;
			width: 100%;
			max-width: 780px;
			height: auto;
			border-top: 1px solid rgba(0,0,0,0.2);
			border-bottom: 1px solid rgba(0,0,0,0.2);
			background: #F4F4F4;	
				
		}
		select,
		input[type="text"],input[type="number"]{
			border: 1px solid rgba(0,0,0,0.3);
			height: 20px;
			padding-left: 5px;
			font-size: 12px;
			width: 160.5px;
		}
		select{
			height: 25px;
		}
		input[type="submit"]{
			
			width: 80px;
			text-align: center;
			border: 1px solid rgba(0,0,0,0.3); 
			background: rgba(0,0,0,0.1);
			line-height:22px;
		}
		input[type="submit"]:hover{
			cursor: pointer;
		}
		table, tr, th, td{
			font-size: 14px;
			margin-top: 10px;
			border: 1px solid rgba(0,0,0,0.2);
			border-collapse: collapse;	
			text-align: center;	
		}
		.body a{
			color: #000;
			border: 1px solid rgba(0, 0, 0, 0.3);
			padding: 3px 20px;
			font-size: 18px;
			background: rgba(0, 0, 0, 0.1) none repeat scroll 0% 0%;
			text-decoration: none;
			}
		.footer{
			padding: 10px;
			width: 100%;
			max-width: 780px;
			height: auto;
			background: #F4F4F4;
			text-align: center;			
		}
		.footer a{
			text-decoration: none;
			color: #000; 
			font-weight: bold;
		}
		
		@media print{
			select,
			input[type="text"],
			input[type="submit"],
			a.print,
			legend
			{display: none;}
			fieldset{border:none;}
			.wrapper{border:none;}	
			.body{border-top:none;}	
			h3{margin-top:-10px;}		
			.header img{max-width:620px;}
		}
	</style>
</head>

<body>
	<div class="wrapper">
		<div class="header">
			<img class="img-responsive" src="<?php echo site_url($banner[0]->path);?>" alt="Uploaded banner not found!" />
		</div>
		
		<div class="body">
			<fieldset>
				<legend>Academic Result</legend>			
								
							
				<select name="year" required>
					<option value="">-- Select Session --</option>
					<option value="2015_2016">2015-2016</option>
					<option value="2016_2017">2016-2017</option>
				</select>		

				<select name="class" required>
					<option value="">-- Select Class --</option>
					<option value="Eleven" >Eleven</option>
					<option value="Twelve" >Twelve</option>
				</select>					
			
				<input type="text" name="roll" placeholder="Student ID"   required />

			    <select name="exam" required>
					<option value="">-- Select Exam--</option>	
                    <option value="Weekly Exam">Weekly Exam</option>
                    <option value="Monthly Exam">Monthly Exam</option>
                    <option value="Model Test">Model Test</option>
                    <option value="Year Final">Year Final</option>	
				</select>
				
				<input type="submit" name="submit"  class="button" value="Show" />
				 
				<center>
				 	<h3>asdf</h3>
				 	<p style="margin-top:-15px;border-bottom:1px solid #999;width: 250px;">MARKS CERTIFICATE</p>
				</center>	
				 
				 
				 
		
	
	<table style="width:100%;">
		<tr>
		 <td style="width:50%;border:1px solid transparent;">
		  <ul style="padding: 0;list-style-type: none;text-align: left;margin-top: 0px;">	
			<li><span style="width:100px;display:inline-block;">Name </span>: <b>Abcd</b></li>
			<li><span style="width:100px;display:inline-block;">Father's Name </span>: Abcd</li>
			<li><span style="width:100px;display:inline-block;">Mother's Name </span>: Abcd</li>
			<li><span style="width:100px;display:inline-block;">Date of Birth </span>: 2016-07-26</li>
			<!--li><span style="width:100px;display:inline-block;">Class Roll No </span>: 01</li-->
			<li><span style="width:100px;display:inline-block;">Student ID </span>: <b>54874</b></li>
			<li><span style="width:100px;display:inline-block;">Class </span>: Eleven</li>
			<li><span style="width:100px;display:inline-block;">Session </span>: 2016-2017</li>
	      </ul>
		</td>
 					<td style="width:50%;border:1px solid transparent;">
 						<table width="100%"  cellspacing="1" cellpadding="0">
					         <tr>
					          <td width="33%" align="center" class="title3"><b>Marks</b></td>
					          <td width="34%" align="center" class="title3"><b>LG</b></td>
					          <td width="33%" align="center" class="title3"><b>GP</b></td>
					          <td style="padding:0 2px" width="33%" align="center" class="title3"><b>COMMENTS</b></td>
					        </tr>
					        <tr>
					          <td>80-100</td>
					          <td>A+</td>
					          <td>5</td>
					          <td style="padding:0 3px;">Excellents</td>
					        </tr>
					        <tr>
					          <td>70-79</td>
					          <td>A</td>
					          <td>4</td>
					          <td ROWSPAN="2">Good</td>
					        </tr>
					        <tr>
					          <td>60-69</td>
					          <td>A-</td>
					          <td>3.5</td>
					        </tr>
					        <tr>
					          <td>50-59</td>
					          <td>B</td>
					          <td>3</td>
					          <td ROWSPAN="2">Satisfied</td>
					        </tr>
					        <tr>
					          <td>40-49</td>
					          <td>C</td>
					          <td>2</td>
					        </tr>
					        <tr>
					          <td>33-39</td>
					          <td>D</td>
					          <td>1</td>
					          <td ROWSPAN="2">Bad</td>
					        </tr>
					        <tr>
					          <td>0-32</td>
					          <td>F</td>
					          <td>0</td>
					        </tr>
					    </table>
 					</td>
 				</tr>
 				</table>	
 				
				<table style="width: 100%;margin-bottom: 8px;">			
				
				<tr class="app_tr">
					<th rowspan="2"><p>Subjects</p></th>
					<th rowspan="2"><p>Full Marks</p></th>
					<th rowspan="2"><p>Heighest Marks</p></th>
					<th colspan="6"><p>Student's Own Performance</p></th>	
					<th rowspan="2"><p>Comments</p></th>					
				</tr>
				<tr>
					<th><p>Written</p></th>
					<th><p>Objective</p></th>
					<th><p>Viva Voce</p></th>					
					<th><p>Total Marks</p></th>
					<th><p>LG</p></th>
					<th><p>GP</p></th>						
				</tr>
			
					<tr>
					 <td style="text-align:left;padding:0 5px;">
					
						
						  
			</td>			<td>
			<td>		</td>
			<td>xxx</td>
			<td></td>
			<td>		</td>
			
			<td>		</td>							
	         <td></td>
			<td></td>													
			<td></td>	
			<td>
			Good
			</td>												
					
							
		 </tr>
				
					 <tr><td colspan="10">&nbsp;</td></tr>
            <tr>
                <td colspan="9">GPA</td>
                <td><b>
							 						    
							
				</b></td>
			</tr>
				</table>
				<p style="margin:50px 0 9px 0;">Date of publication of result: 10 April, 2016</p>				
				<a href="" class="print" onclick="window.print()">Print</a>
				<a href="" class="print">Download</a>
				<i style="font-style: normal;font-weight: bold;float: right;border-top: 1px solid #999;width: 120px;text-align: center;">Principal</i>
		        			
			</fieldset>
		</div>		
		<div class="footer">
			Developed by <a target="_blank" href="http://www.freelanceitlab.com">Freelance iT Lab</a>, Mymensingh.
		</div>
	</div>
</body>
</html>