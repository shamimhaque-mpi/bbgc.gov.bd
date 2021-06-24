<style>
    input[type="text"].small{ width: 58px; }
      .cost-table h3{
		display: none;
	}
	.cost-table{
		width: 100%;
		height: 80px;
	}
	.cost-table button{
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
		.cost-table h3{
			display: block;
			text-align: center;
			font-weight: bold;
		}
		.cost-table button{
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
        echo form_open_multipart('cost/infoView/search', $attribute_one);
        ?>
		
        <blockquote class="form-head">
            <h1>View All Cost</h1>
            <small>
				1. Fill all the required <mark>*</mark> fields<br/>
				2. Click the <mark>Show</mark> button to view data 
            </small>
        </blockquote>

        <div class="form-content">

            <div class="form-element">
                <label for="in1">Date (from) <sup class="required"></sup></label>
                <input type="text" class="date-picker" name="date_from" id="in1" placeholder="YYYY-MM-DD" required />
            </div>

            <div class="form-element">
                <label for="in2">Date (to) <sup class="required"></sup></label>
                <input type="text" class="date-picker" name="date_to" id="in2"  placeholder="YYYY-MM-DD" required />
            </div>
        </div>
            
        <blockquote class="form-foot">
            <input type="submit" class="button" value="Show" />
        </blockquote>

        <?php echo form_close(); ?>
        <?php
          if($cost_record != NULL)
          {
          ?>
        
         <div class="cost-table">
			<h3>Total Cost</h3>
			<button class="button" onclick="window.print();"><i class="fa fa-print"></i> Print </button>
         </div>
        <table id="transition-table">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Date</th>
                    <th>Cost Purpose</th>
                    <th>Amount</th>
                    <th>Spender</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="5">&nbsp;</td>
                </tr>
               <?php 
			    $i=1;
			    $amount=0;
				foreach($cost_record as $value):
				  {
					?>				
				
                   <tr>
						<td><?php  echo $i;?></td>
						<td><?php  echo $value->datetime;?></td>
						<td><?php  echo ucwords(str_replace('_',' ',$value->cost_perpouse));?></td>
						<td><?php  echo $a=$value->amount;?></td>
						<td><?php  echo $value->spender;?></td>
                   </tr>
				   <?php 
				   $amount=$amount+$a;
				   $i++;
				  }
				endforeach;
			?>
              
            
                <tr>
                    <td colspan="5">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Total</td>
                    <td><?php echo $amount; ?></td>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>
        <?Php
        }
        else
        {
           echo "<h3 style='text-align:center;color:red;font-weight:bold;'>No Cost Found.</h3>";
        }
        ?>
    </div>
</div>
<!-- add account page end here -->



