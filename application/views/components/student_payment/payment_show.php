<!-- student insert page start here -->
<div class="column global-pad">
    <div class="row">
        <?php 
        $attribute_one = array(
            'name' => '',
            'class' => 'horizontal',
            'id' => ''
        );

        echo form_open_multipart('student_payment/payment_view/show', $attribute_one);
        ?>

        <blockquote class="form-head">
            <h1>Show Pay Slip</h1>
            <small>
                1. Fill all the required <mark>*</mark> fields<br/> 
                2. Click the <mark>save</mark> button to Add Data
            </small>
        </blockquote>	
		
		<?php echo $this->session->flashdata('confirmation');?>

        <div class="form-content">		
            <div class="form-element">
                <label for="in5">Roll Number<sup class="required"></sup></label>
                <input type="text" name="roll" required id="in5"  />
            </div>	
			</div>
			<blockquote class="form-foot">
               <input type="submit" class="button" id="button" value="Show" />
            </blockquote>
		<?php echo form_close(); ?>
    </div>

</div>
<!-- student insert page end here -->



