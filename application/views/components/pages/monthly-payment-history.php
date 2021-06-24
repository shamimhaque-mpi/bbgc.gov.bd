<style>
.form-element-custom input[type="text"]{width: 68%;}
.all-month{margin-left: -10px;}
.month{
	width: 120px;
	padding: 35px 0;
	border: 1px solid #000;
	text-align: center;
	float: left;
	margin: 10px;
}
.month i{color: #080;font-size: 1.5em;}
	img.printOption{width:100%;}
	.printOption{
	 text-align: center;
	 display: none;
	}


@media print{
	 nav,
	 header,
	 aside,
	 form,
	 a.button,
	 p{
	  display: none;
	 }
	.printOption{
	 display: block;
	}
	table{
	 width:100%;
	 margin-top:-40px;
	}
	table,tr,th,td{
	 border:1px solid #ddd;
	 border-collapse: collapse;
	 padding: 5px;
	 text-align: left;
	}
}
</style>

<!-- one column page main container start here -->
<div class="column global-pad">
    <div class="row">
    
        <?php 
        $attribute = array(
            'name' => '',
            'class' => 'horizontal',
            'id' => ''
        );

        echo form_open('', $attribute);
        ?>

        <blockquote class="form-head">
            <h1>Search Payment History</h1>
            <small>
                1 . fill all the required fields and click on the <mark>Show</mark> button
            </small>
        </blockquote>

        <div class="form-content">
            
            <div class="form-element form-element-custom">
                <label for="in1">Class<sup class="required"></sup></label>
                <select name="class" required >
			<option value="">-- Select Class--</option>
	<option value="0A" >Atfal(Alif)</option>
				<option value="0B" >Atfal(Jim)</option>
				<option value="1A" >Awal</option>				
				<option value="02" >Sani</option>
				<option value="03" >Calis</option>
				<option value="04" >Rabe</option>
				<option value="05" >Khamesh</option>
				<option value="06" >Sadesh</option>
				<option value="07" >Sabe</option>
				<option value="08" >Saman</option>
				<option value="09" >Tase</option>
				<option value="10" >Asher</option>
				<option value="11" >Hifz</option>     
              </select>

            </div>
			
	    <div class="form-element form-element-custom">
                <label>Select Year <sup class="required"></sup></label>
                <select name="year" required>
                    <option value="">-- Select Year --</option>
                    <?php 
                    $y = date('Y');
                    $i = 2015;
                    $c = $y+5;
                    for($i;$i<=$c;$i++){
                    	echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                	?>
                </select>
            </div>
            
            <div class="form-element form-element-custom">
                <label>Select Month <sup class="required"></sup></label>
                <select name="month" required>
                    <option value="">-- Select Month --</option>
                    <?php
             $month = array('1'=>'January', '2'=>'February', '3'=>'March', '4'=>'April', '5'=>'May', '6'=>'June', '7'=>'July', '8'=>'August', '9'=>'September', '10'=>'October', '11'=>'November', '12'=>'December');
                    foreach($month as $key => $opt){
                    	echo '<option value="'.($key).'">'.$opt.'</option>';
                    }
                    ?>
                </select>
            </div>
			
	</div>
		
        <blockquote class="form-foot">
            <input type="submit" class="button" value="Show" name="payment" />
        </blockquote>

        <?php echo form_close(); ?>
        
    </div>
    <?php   
    $class=array("0A"=>"Atfal(Alif)","0B"=>"Atfal(Jim)","1A"=>"Awal","02"=>"Sani","03"=>"Calis","04"=>"Rabe","05"=>"Khamesh","06"=>"Sadesh","07"=>"Sabe","08"=>"Saman","09"=>"Tase","10"=>"Asher","11"=>"Hifz"); 
    if($monthly_info != null)
     { 
      ?> 
            
	<img class="printOption" src="<?php echo site_url("public/upload/banner/".$banner[0]->path);?>"><br/>
	<p class="printOption">
	 Class : <b><?php echo$class[$monthly_info[0]->class];?></b> &nbsp;
	 Year : <b><?php echo $year;?></b> &nbsp;
	 Month : <b><?php echo $month[$mon];?></b>
	</p>
	
	<a class="button" style="float:left;" onclick="window.print()"><i class="fa fa-print"></i> Print</a><br/><br/>
	
        <p> Total Found:&nbsp;<b><?php echo count($monthly_info);?></b></p><br/>                            
       <?php
      }
    ?>
    <div class="row">
    	<!-- pre><?php print_r($monthly_info); ?></pre -->

    	<?php
    	$class=array("0A"=>"Atfal(Alif)","0B"=>"Atfal(Jim)","1A"=>"Awal","02"=>"Sani","03"=>"Calis","04"=>"Rabe","05"=>"Khamesh","06"=>"Sadesh","07"=>"Sabe","08"=>"Saman","09"=>"Tase","10"=>"Asher","11"=>"Hifz"); 
    	 if($monthly_info != null){ ?>
    	<table>
    		<tr>
    			<th>Sl</th>
    			<th>Roll</th>
    			<th>Name</th>
    			<th>Class</th>
    			<th>Mobile</th>
    			<th>Status</th>
    		</tr>
    		<tr><td colspan="7">&nbsp;</td></tr>
    		
    		<?php foreach($monthly_info as $key => $row){
    		$monthInfo = $this->action->read('pay_slip', array('roll' => $row->roll_no, 'month' => $this->input->post('month')));
    		?>
    		<tr>
<td  > <?php echo ($key+1);?></td>
<td ><?php echo $row->roll_no; ?></td>
<td ><?php echo $row->applicant; ?></td>
<td  ><?php echo $class[$row->class]; ?></td>
<td><?php echo $row->guardian_mobile; ?></td>
<td <?php if(count($monthInfo) > 0){ if($monthInfo[0]->current_month_fee != null) { echo "style='color:green;'";} else { echo "style='color:red;'"; }} else {
echo "style='color:red;'";
}?> >
<?php 



if(count($monthInfo) > 0){
if($monthInfo[0]->current_month_fee != null){
echo "Paid";
} else {
echo "Unpaid";
}
} else {
echo "Unpaid";
}
?>
</td>
    		</tr>
    		<?php } ?>
    		<tr><td colspan="7">&nbsp;</td></tr>
    	</table>
    	<?php } ?>

    </div>
    
</div>
<!-- one column page main container end here -->



