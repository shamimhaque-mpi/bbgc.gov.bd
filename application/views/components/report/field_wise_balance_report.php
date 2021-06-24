<style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer{display: none !important;}
        .panel{border: 1px solid transparent;left: 0px;position: absolute;top: 0px;width: 100%;}
        .hide{display: block !important;}
        .block-hide{display: none;}
    }
    .balance {background: rgb(245, 245, 245);}
    .balance h4{line-height: 48px; font-weight: bold;}
    .red{color: red;}
    .green{color: green;}
</style>
<?php echo $this->session->flashdata('confirmation'); ?>
<div class="panel panel-default none">
    <div class="panel-heading">
        <div class="panal-header-title pull-left">
            <h1>Search</h1>
        </div>
    </div>

    <div class="panel-body">
        <!-- horizontal form -->
        <?php   $attribute = array( 'name' => '', 'class' => 'form-horizontal', 'id' => '' );
                echo form_open('', $attribute); ?>

        <div class="form-group">
            <label class="col-md-2 control-label"> From </label>
            <div class="input-group date col-md-5" id="datetimepickerFrom">
                <input type="text" name="from" placeholder="From" class="form-control" >
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>   

        <div class="form-group">
            <label class="col-md-2 control-label"> To </label>
            <div class="input-group date col-md-5" id="datetimepickerTo">
                <input type="text" name="to" placeholder="To" class="form-control"  >
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>

        <div class="col-md-7">
            <div class="btn-group pull-right">
                <input class="btn btn-primary" type="submit" name="show" value="Show">
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="panel-footer">&nbsp;</div>
</div>
<?php
    if(isset($_POST['from']) && ($_POST['from'] != '') && isset($_POST['to']) && ($_POST['to'] != '')){
       $from = $_POST['from'];
       $to = $_POST['to'];
    }else{
        $from = '';
        $to = '';
    }
?>


<div class="panel panel-default">
    <div class="panel-heading ">
        <div class="panal-header-title">
            <h1 class="pull-left">
                Field Wise Balance Report
                <?php 
                    if(($from != '') && ($to != '')){ 
                        echo '('.$from.'  To  '.$to.')';
                    }
                ?>
            </h1>
            <a href="#" class="pull-right " style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
        </div>
    </div>



    <div class="panel-body">
        <img class="hide" style="width: 100%; margin-bottom: 10px;" src="<?php echo site_url('public/banner/banner.png') ?>">
        <span class="hide print-time text-center">
            খাত অনুযায়ী ব্যালেন্স রিপোর্ট
            <?php 
                if(($from != '') && ($to != '')){ 
                    echo  '('.$from.' To '.$to.')';
                }
            ?>
        </span>    
        
        <div class="container-fluid" style="margin-left: -30px;margin-right:-30px;">
                <?php 
                    $paymentIncome = $totalIncome = $totalCost = $totalSalary =  0.00;
                ?>
                    <table class="table table-bordered">
                        <tr>
                            <th width="50">SL</th>
                            <th>Field</th>
                            <th>Previous Balance</th>
                            <th>Present Income Amount</th>
                            <th>Sum of Previous Balance & <br> present Income Amount</th>
                            <th>Cost Amount</th>
                            <th>Balance</th>
                        </tr>
                        
                        <?php 
                        $totalIncome = $totalCost =0.00; $total_field_wise_previous_income =0; $total_field_wise_previous_cost = 0;$total_sum_income_and_previous_balance =0;
                        foreach ($fields as $key => $value) {
                            
                            
                            $field_wise_cost = $field_wise_previous_cost = 0;
                                
                                $field_name = $value->cost_field;
                                
                                if(isset($_POST['show']) && ($_POST['from'] != '') && ($_POST['to'] != '')) {
                                    
                                    //income part 
                                    $field_wise_income = $this->action->read_sum('payment', 'amount', $where=array('field' => $field_name,'date >=' => $_POST['from'],'date <=' => $_POST['to'],'trash' => 0));
                              
                                    $field_wise_previous_income = $this->action->read_sum('payment', 'amount', $where=array('field' => $field_name,'date <' => $_POST['from'],'trash' => 0));
                                    $field_wise_previous_income = $field_wise_previous_income[0]->amount;

                                    //cost part
                                    $field_code = $this->action->read('cost_field',array('cost_field' => $field_name));
                                    if(!empty($field_code)){
                                         $cost_field_code = $field_code[0]->code;
                                         $field_wise_cost = $this->action->read_sum('cost', 'amount', $where=array('cost_field' => $cost_field_code,'date >=' => $_POST['from'],'date <=' => $_POST['to'],'trash' => 0));
                                         
                                         $field_wise_previous_cost = $this->action->read_sum('cost', 'amount', $where=array('cost_field' => $cost_field_code,'date <' => $_POST['from'],'trash' => 0));
                                         $field_wise_previous_cost = $field_wise_previous_cost[0]->amount;   
                                    }
                                    
                                }else{
                                    
                                    
                                    $field_wise_income = $this->action->read_sum('payment', 'amount', $where=array('field' => $field_name,'trash' => 0));
                                    $field_wise_previous_income = 0;$field_wise_previous_cost =0;
                                    $field_code = $this->action->read('cost_field',array('cost_field' => $field_name));
                                    if(!empty($field_code)){
                                         $cost_field_code = $field_code[0]->code;
                                         $field_wise_cost = $this->action->read_sum('cost', 'amount', $where=array('cost_field' => $cost_field_code,'trash' => 0));
                                    }
                                }
                        ?>
                        
                                <tr>
                                    <td><?php echo $key+1; ?></td>
                                    
                                    <td>
                                        <?php echo $value->cost_field; ?>
                                    </td>
                                    
                                    <!--<td>
                                        <?php 
                                            echo $field_wise_previous_income;
                                            $total_field_wise_previous_income += $field_wise_previous_income; 
                                        ?>
                                    </td>
                                    
                                     <td>
                                        <?php 
                                            echo $field_wise_previous_cost;
                                            $total_field_wise_previous_cost += $field_wise_previous_cost;
                                        ?>
                                    </td>-->
                                    
                                    <td><?php echo $previous_balance_field_wise = $field_wise_previous_income-$field_wise_previous_cost;  ?></td>
                                    
                                    <td>
                                       <?php 
                                            if(!empty($field_wise_income)){  
                                                $income_amount = $field_wise_income[0]->amount; 
                                            }else{
                                                $income_amount = 0;
                                            } 
                                            $totalIncome += $income_amount;
                                            echo number_format($income_amount,2);
                                        ?>
                                    </td>
                                    
                                   <td>
                                       <?php 
                                            echo number_format(($income_amount+$previous_balance_field_wise),2);
                                            $total_sum_income_and_previous_balance += $income_amount+$previous_balance_field_wise;
                                        ?>
                                    </td>
                                    
                                    <td>
                                       <?php 
                                            if(!empty($field_wise_cost)){ 
                                                 $cost_amount = $field_wise_cost[0]->amount;
                                            }else{
                                                 $cost_amount = 0;
                                            } 
                                            $totalCost += $cost_amount;
                                            echo  number_format($cost_amount,2);
                                        ?> 
                                    </td>
                            
                                    
                            
                                    <!--<td>
                                        <?php //echo number_format($income_amount - $cost_amount,2);  ?>
                                    </td>-->
                                    
                                    <td><?php echo number_format(($field_wise_previous_income+$income_amount- $cost_amount-$field_wise_previous_cost),2);  ?></td>
                                </tr>
                        <?php   
                                $field_wise_cost = [];
                                $field_wise_income = [];
                            }
                        ?>
    
                        <tr>
                            <th colspan="2" class="text-right">Total</th>
                            <th><?php echo number_format(($total_field_wise_previous_income-$total_field_wise_previous_cost),2);  ?></th>
                            <th><?php echo  number_format($totalIncome,2); ?> TK</th>
                            <th><?php echo number_format($total_sum_income_and_previous_balance,2);  ?></th>
                            <th><?php echo number_format($totalCost,2); ?> TK</th>
                            <th><?php echo number_format(($total_field_wise_previous_income+$totalIncome-$total_field_wise_previous_cost-$totalCost),2);  ?></th>
                        </tr>
                    </table>
                
            </div>
            
            </div>
        </div>
    </div>
    <div class="panel-footer">&nbsp;</div>
</div>

<script>
     $('#datetimepickerFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
</script>