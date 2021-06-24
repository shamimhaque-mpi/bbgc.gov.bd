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
            <h1>Search Balance</h1>
        </div>
    </div>

    <div class="panel-body">
        <!-- horizontal form -->
        <?php   $attribute = array( 'name' => '', 'class' => 'form-horizontal', 'id' => '' );
                echo form_open('', $attribute); ?>

        <div class="form-group">
            <label class="col-md-2 control-label"> From </label>
            <div class="input-group date col-md-5" id="datetimepickerFrom">
                <input type="text" name="date[from]" placeholder="From" class="form-control" >
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>   

        <div class="form-group">
            <label class="col-md-2 control-label"> To </label>
            <div class="input-group date col-md-5" id="datetimepickerTo">
                <input type="text" name="date[to]" placeholder="To" class="form-control"  >
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
    if(isset($_POST['date']['from']) && ($_POST['date']['from'] != '') && isset($_POST['date']['to']) && ($_POST['date']['to'] != '')){
       $from = $_POST['date']['from'];
       $to = $_POST['date']['to'];
    }else{
        $from = '';
        $to = '';
    }
?>




<?php if(isset($_POST['show'])) { ?>
<div class="panel panel-default">
    <div class="panel-heading ">
        <div class="panal-header-title">
            <h1 class="pull-left">
                Balance Sheet 
                 <?php 
                    if(($from != '') && ($to != '')){ 
                        echo  '('.$from.' To '.$to.')';
                    }
                ?>
            </h1>
            <a href="#" class="pull-right " style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
        </div>
    </div>


    <div class="panel-body">
        <img class="hide" style="width: 100%; margin-bottom: 10px;" src="<?php echo site_url('public/banner/banner.png') ?>">
        <span class="hide print-time text-center">
          ব্যালেন্স রিপোর্ট
         
         <?php 
                if(($from != '') && ($to != '')){ 
                    echo  '('.$from.' To '.$to.')';
                }
            ?>
        </span>    
        <div class="container-fluid" style="margin-left: -30px;margin-right:-30px;">
            <?php 
            $paymentIncome = $totalIncome = $totalCost = $totalSalary =  0.00;

            /* if ($allPayments != NUll) { ?>
            <!-- <div class="col-sm-6 col-xs-6">
                <table class="table table-bordered">
                    <caption>
                        <h4 class="text-center">Income</h4>
                    </caption>
                    <tr>
                        <th width="50">SL</th>
                        <th>Field</th>
                        <th width="100">Amount</th>
                    </tr>
                    <?php
                        $paymentIncome = 0;
                        foreach ($allPayments as $key => $value) {
                           
                    ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo filter($value->field); ?></td>
                        
                        <td>
                            <?php
                                
                                $where = array('field' => $value->field,'status'=> 'approved' );
                                $total_paid = $this->action->read_total('payment','amount',$where);
                                echo $total_paid[0]->amount;
                            ?>
                        </td>
                        
                    </tr>
                    <?php $paymentIncome += $total_paid[0]->amount; } ?>
            
                    <tr>
                        <th colspan="2" class="text-right">Total</th>
                        <th><?php echo $paymentIncome; ?> TK</th>
                    </tr>
                </table>
            </div> -->
            <?php //} */?>
            
            <!--<pre>
                <?php // print_r($otherIncome); ?>
            </pre>
-->
            <?php
                if(isset($_POST['date']['from']) && ($_POST['date']['from'] != '')){
                     $date = $_POST['date']['from'];
                     $date = strtotime($date);
                     $date = strtotime("-1 day", $date);
                     $date = date('Y-m-d', $date);
                     
                     $pre_income = $this->action->read_sum('payment','amount',array('trash' => 0, 'date <=' => $date));
                     $pre_cost = $this->action->read_sum('cost','amount',array('trash' => 0, 'date <=' => $date));
                     $previous_balance = $pre_income[0]->amount -$pre_cost[0]->amount;
                }else{
                    $previous_balance = 0;
                }
                
                
            ?>
            
            <?php if($otherIncome != NULL) { ?>
            <div class="col-sm-6 col-xs-6">
                <table class="table table-bordered">
                    <caption>
                        <h4 class="text-center"> Income</h4>
                    </caption>
                    <tr>
                        <th width="50">SL</th>
                        <!--<th>Date</th>-->
                        <th>Field of Income </th>
                        <th width="100">Amount</th>
                    </tr>
                    
                    <?php 
                    $totalIncome = 0.00;
                    foreach ($otherIncome as $key => $value) {
                        //$income_filed = trim($value->income_field);
                        //$fieldName  =  $this->action->read('income_field', array('code'=>$income_filed));
                    ?>
                    
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <!--<td><?php //echo $value->date; ?></td>-->
                        <td>
                            <?php echo $value->field;  ?>    
                            <?php //echo (isset($fieldName[0]->field_income) ? filter($fieldName[0]->field_income) : $value->description ); ?>
                        </td>
                        <td><?php echo $value->amount;$totalIncome += $value->amount; ?></td>
                    </tr>
                    <?php } ?>

                    <tr>
                        <th colspan="2" class="text-right">Total</th>
                        <th><?php echo $totalIncome ?> TK</th>
                    </tr>
                </table>
            </div>
            <?php } ?>


            <?php if ($allCost != NULL) { ?>
            <div class="col-sm-6 col-xs-6">
                <table class="table table-bordered">
                    <caption>
                        <h4 class="text-center"> Cost</h4>
                    </caption>
                    <tr>
                        <th width="50">Cost</th>
                        <!--<th>Date</th>-->
                        <th>Field Of Cost </th>
                        <th width="100">Amount</th>
                    </tr>
                    <?php 
                    $totalCost = 0.00;
                    foreach ($allCost as $key => $value) { 
                    $costName  = $this->action->read('cost_field', array('code'=>$value->cost_field));
                    ?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <!--<td><?php echo $value->date; ?></td>-->
                        <td><?php echo (isset($costName[0]->cost_field) ? $costName[0]->cost_field : filter($value->description ) );
                        ?></td>
                        <td><?php echo $value->amount; ?></td>
                    </tr>
                    <?php $totalCost += $value->amount; } ?>
                    <tr>
                        <th colspan="2" class="text-right">Total</th>
                        <th><?php echo $totalCost; ?> TK</th>
                    </tr>
                </table>
            </div>
            <?php } ?>




            <?php /* if ($resultset != NULL) { ?>
            <!-- <div class="col-sm-6 col-xs-6">
                <table class="table table-bordered">
                    <caption>
                        <h4 class="text-center">Salary</h4>
                    </caption>
                    <tr>
                        <th width="50">SL</th>
                        <th>Employee</th>
                        <th width="100">Amount</th>
                    </tr>
                    <?php 
                    $totalSalary = 0.00;
                    foreach ($resultset as $key => $value) { ?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $value['name'] ?></td>
                        <td><?php echo $value['total'];$totalSalary += $value['total'];?></td>
                    </tr>
                    <?php } ?>
            
                    <tr>
                        <th colspan="2" class="text-right">Total</th>
                        <th><?php //echo $totalSalary; ?> TK</th>
                    </tr>
                </table>
            </div> -->

            <?php // } */ ?>

            <?php $balance = ($paymentIncome + $totalIncome ) - ($totalCost + $totalSalary); ?>
            <div class="col-sm-12 col-xs-12">
                <div class="balance text-center">
                  <h4 class="green">
                        <span> Previous Balance :</span>
                        <strong><?php echo $previous_balance .' TK'; ?></strong>
                    </h4>
                    <h4><span class="<?php echo($balance < 0)? 'red':'green'; ?>">Balance :</span>
                        <strong> <span class="<?php echo($balance < 0)? 'red':'green'; ?>"><?php echo $balance+$previous_balance .' TK'; ?></span></strong>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">&nbsp;</div>
    <?php } ?>
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