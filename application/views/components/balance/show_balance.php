<style>
    input[type="text"].small{
        width: 58px;
    }
	table{margin-bottom: 20px;}
	table#cost-table, table#income-table{
		float: left;
		width: 49%;
	}
	table#income-table{float: right;}
    table.neet-balance tr td:nth-child(2){
        text-align: center;
    }
	.balance-table h3{
		display: none;
	}
	.balance-table{
		width: 100%;
		height: 80px;
	}
	.balance-table button{
		float: left;
	}
	
	@media print{
		      nav,
        header,
        aside,
        form,
        .form-element{
            display: none;
        }
		.balance-table h3{
			display: block;
			text-align: center;
			font-weight: bold;
		}
		.balance-table button{
			display: none;
		}
		table{
			width: 100%;
		}
		table, tr, th, td{
			border: 1px solid #000;
			border-collapse: collapse;
		}
		table tr th,
		table tr td{
			text-align: left !important;
			padding: 0 5px;
		}
		table#cost-table tr th:nth-child(1),
		table#cost-table tr td:nth-child(1){
			text-align: center !important;
		}
		table#income-table tr th:nth-child(1),
		table#income-table tr td:nth-child(1){
			text-align: center !important;
		}
	}
</style>

<!-- add account page start here -->
<div class="column global-pad">
    <div class="row">
	
        <?php 
        $attribute_one = array(
            'name' => '',
            'class' => 'horizontal',
            'id' => ''
        );
      echo form_open_multipart('balance/infoView/search', $attribute_one);
        ?>
		
        <blockquote class="form-head">
            <h1>Balance Sheet</h1>
            <small>
				1. Fill all the required <mark>*</mark> fields<br/>
				2. Click the <mark>Show</mark> button to view data 
            </small>
        </blockquote>

        <div class="form-content">

            <div class="form-element">
                <label for="in1">Date From <sup class="required"></sup></label>
                <input type="text" class="date-picker" name="date_from" id="in1" placeholder="YYYY-MM-DD" required />
            </div>
              <div class="form-element">
                <label for="in1">Date To <sup class="required"></sup></label>
                <input type="text" class="date-picker" name="date_to" id="in2" placeholder="YYYY-MM-DD" required />
            </div>
        </div>
            
        <blockquote class="form-foot">
            <input type="submit" class="button" value="Show" />
        </blockquote>

        <?php echo form_close(); ?>
		
		
		
		<?php 
		$c_amount = 0;
		if($cost_record != NULL){ 
		?>
		<div class="balance-table">
			<h3>Balance Sheet</h3>
			<button class="button" onclick="window.print();"><i class="fa fa-print"></i> Print </button>
		</div>
		<table id="cost-table">
			<tr>
				<th>Sl</th>
				<th>Cost Purpose</th>
				<th>Amount</th>
			</tr>
			
			<tr><td colspan="3">&nbsp;</td></tr>
			
		<?php 
		foreach($cost_record as $c_key => $c_row){ 
		$c_amount += $c_row->amount;
		?>
			<tr>
				<td><?php echo ($c_key + 1); ?></td>
				<td><?php echo ucwords(str_replace('_',' ',$c_row->cost_perpouse)); ?></td>
				<td><?php echo $c_row->amount; ?></td>
			</tr>
		<?php } ?>
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr>
				<td colspan="2">Total</td>
				<td><?php echo $c_amount; ?></td>
			</tr>
		</table>
		<?php } ?>
		
		<?php 
		$i_amount = 0;
		if($income_record != NULL){ 
		?>
		<table id="income-table">		
			<tr>
				<th>Sl</th>
				<th>Income Purpose</th>
				<th>Amount</th>
			</tr>
			
			<tr><td colspan="3">&nbsp;</td></tr>
			
		<?php 
		foreach($income_record as $i_key => $i_row){ 
		$i_amount += $i_row->income_amount;
		?>
			<tr>
				<td><?php echo ($i_key + 1); ?></td>
				<td><?php echo ucwords(str_replace('_',' ',$i_row->purpose)); ?></td>
				<td><?php echo $i_row->income_amount; ?></td>
			</tr>
		<?php } ?>
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr>
				<td colspan="2">Total</td>
				<td><?php echo $i_amount; ?></td>
			</tr>
		</table>
		<?php 
		} 
		if($income_record == NULL && $income_record == NULL){
			echo '<div style="clear:both;">';
			echo '<h3 style="color:red; text-align:center;">Sorry! There are no Transaction.Try again.</h3>';
			echo '</div>';
		} else{
		?>
		<table class="balance-table">
			<tr>
				<th>Total Income</th>
				<th>Total Cost</th>				
				<th>Net Balance</th>
				<th>Status</th>
			</tr>
			
			<tr><td colspan="4">&nbsp;</td></tr>
			
			<tr>
				<td><?php echo $i_amount; ?></td>
				<td><?php echo $c_amount;?></td>
				<td><?php echo $balance = $i_amount - $c_amount; ?></td>
				<td>
					<?php 
					$status = array('Loss', 'Profit', 'Balanced');
					if($balance > 0){
						echo $status[1];
					} elseif($balance <0){
						echo $status[0];
					} else {
						echo $status[2];
					}
					?>
				</td>
			</tr>
		</table>
		<?php } ?>
    </div>
</div>
<!-- add account page end here -->



