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
                <label for="in1">Roll No.<sup class="required"></sup></label>
                <input type="text" name="roll" id="in1" required />
            </div>
			
			<div class="form-element form-element-custom">
                <label>Select Year <sup class="required"></sup></label>
                <select name="year" required>
                    <option value="">-- Select Year --</option>
                    <?php 
                    $y = date('Y');
                    $i = $y-5;
                    $c = $y+5;
                    for($i;$i<=$c;$i++){
                    	echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                	?>
                </select>
            </div>
			
		</div>
		
        <blockquote class="form-foot">
            <input type="submit" class="button" value="Show" name="payment" />
        </blockquote>

        <?php echo form_close(); ?>
		
		<div class="all-month">
			<?php
			if($payment_details != null){
				$month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
				foreach ($payment_details as $key => $value) {
					$month_in_num = $value->month;
			?>

			<div class="month">
				<h4><?php echo $month[$month_in_num-1]; ?></h4>
				<i class="fa fa-check"></i>
			</div>

			<?php
				}
			}
			?>
		</div>

    </div>
</div>
<!-- one column page main container end here -->



