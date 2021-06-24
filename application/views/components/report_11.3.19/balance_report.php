<style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer{
            display: none !important;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .hide{
            display: block !important;
        }
        .block-hide{
            display: none;
        }
    }
    .balance {background: rgb(245, 245, 245);}
    .balance h4{line-height: 48px; font-weight: bold;}
    .red{
        color: red;
    }
    .green{
        color: green;
    }
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
        <?php $attribute = array( 'name' => '', 'class' => 'form-horizontal', 'id' => '' );
        echo form_open('', $attribute); ?>

        <div class="form-group">
            <div class="col-md-5">
                <label class="col-md-3 control-label">Form</label>
                <div class="input-group date col-md-9" id="datetimepickerFrom">
                    <input type="text" name="date[from]" placeholder="From" class="form-control" >
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            
            <div class="col-md-5">
                <label class="col-md-2 control-label">To</label>
                <div class="input-group date col-md-9" id="datetimepickerTo">
                    <input type="text" name="date[to]" placeholder="To" class="form-control" >
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="col-md-2">
                <div class="btn-group">
                    <input class="btn btn-primary" type="submit" name="show" value="Show">
                </div>
            </div>
        </div>

        
        <?php echo form_close(); ?>
    </div>
    <div class="panel-footer">&nbsp;</div>
</div>

<?php //if(isset($_POST['show'])) { ?>

<div class="panel panel-default">
    <div class="panel-heading ">
        <div class="panal-header-title">
            <h1 class="pull-left">Balance Sheet</h1>
            <a href="#" class="pull-right " style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
        </div>
    </div>


    <div class="panel-body">
        <!-- Print banner -->
        <div class="hide">
            <img class="img-responsive print-banner" src="<?php echo site_url('public/banner/banner.jpg'); ?>">
            <h3 class="text-center">Balance Sheet</h3>
        </div>
        
        <div class="row">
            <?php 
            $paymentIncome = $totalIncome = $totalCost = $totalSalary =  0.00;

            if ($allPayments != NUll) { ?>
            <div class="col-sm-4 col-xs-6 ">
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
                        <th><?php echo $paymentIncome.' TK'; ?></th>
                    </tr>
                </table>
            </div>

            <?php } ?>

            <?php if ($allCost != NULL) { ?>

            <div class="col-sm-4 col-xs-6 col-md-6">
                <table class="table table-bordered">
                    <caption>
                        <h4 class="text-center"><b>Cost</b></h4>
                    </caption>
                    <tr>
                        <th width="50">SL</th>
                        <th>Date</th>
                        <th>Field</th>
                        <th width="100">Amount</th>
                    </tr>
                    <?php 
                    $totalCost = 0.00;
                    foreach ($allCost as $key => $value) { ?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo filter($value->date); ?></td>
                        <td><?php echo filter($value->cost_field); ?></td>
                        <td><?php echo $value->amount; ?></td>
                    </tr>
                    <?php $totalCost += $value->amount; } ?>
                    <tr>
                        <th colspan="3" class="text-right">Total</th>
                        <th><?php echo $totalCost.' TK'; ?></th>
                    </tr>
                </table>
            </div>

            <?php } ?>

            <?php if ($resultset != NULL) { ?>

            <div class="col-sm-4 col-xs-6">
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
                        <td><?php echo $value['total']; $totalSalary += $value['total'];?></td>
                    </tr>
                    <?php } ?>

                    <tr>
                        <th colspan="2" class="text-right">Total</th>
                        <th><?php echo $totalSalary; ?> TK</th>
                    </tr>
                </table>
            </div>

            <?php } ?>

            <?php if($otherIncome != NULL) { ?>

            <div class="col-sm-4 col-xs-6 col-md-6">
                <table class="table table-bordered">
                    <caption>
                        <h4 class="text-center"><b>Income</b></h4>
                    </caption>
                    <tr>
                        <th width="50">SL</th>
                        <th>Date</th>
                        <th>Field</th>
                        <th width="100">Amount</th>
                    </tr>
                    <?php 
                    $totalIncome = 0.00;
                    foreach ($otherIncome as $key => $value) { ?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $value->date; ?></td>
                        <td><?php echo $value->income_field; ?></td>
                        <td><?php echo $value->amount; $totalIncome += $value->amount; ?></td>
                    </tr>
                    <?php } ?>

                    <tr>
                        <th colspan="3" class="text-right">Total</th>
                        <th><?php echo $totalIncome ?> TK</th>
                    </tr>
                </table>
            </div>

            <?php } ?>

            <?php
            $balance = ($paymentIncome + $totalIncome ) - ($totalCost + $totalSalary) ;
             ?>

            <div class="col-sm-12 col-xs-12">
                <div class="balance text-center">
                    <h4><span class="<?php echo($balance < 0)? 'red':'green'; ?>">Balance :</span>
                        <strong> <span class="<?php echo($balance < 0)? 'red':'green'; ?>"><?php echo $balance.' TK'; ?></span></strong>
                    </h4>
                </div>
            </div>

        </div>
    </div>

    <div class="panel-footer">&nbsp;</div>
    <?php //} ?>
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
