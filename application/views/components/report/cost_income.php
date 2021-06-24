<style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer{display: none !important;}
        .panel{ border: 1px solid transparent; left: 0px; position: absolute; top: 0px; width: 100%; }
        .hide{display: block !important;}
        .block-hide{display: none;}
    }
</style>

<div class="container-fluid block-hide">
    <div class="row">
    <?php echo $this->session->flashdata('confirmation'); ?>
    <!-- horizontal form -->
    <?php $attribute = array('name' => '','class' => 'form-horizontal','id' => '');
        echo form_open_multipart('', $attribute); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Income & Cost Report</h1>
                </div>
            </div>
            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>
                <!-- left side -->
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Year</label>
                        <div class="col-md-6">
                            <select name="year" class="form-control">
                                <option value="" selected disabled>&nbsp;</option>
                                <?php for($start=2018; $start<=date('Y'); $start++) { ?>
                                <option value="<?php echo $start.'-'.((int)$start+1); ?>"> <?php echo $start.'-'.((int)$start+1); ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <div class="btn-group">
                                <input class="btn btn-primary" type="submit" name="show" value="Show">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>Income & Cost Report</h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>
            <div class="panel-body">
                <img class="hide" style="width: 100%; margin-bottom: 10px;" src="<?php echo site_url('public/banner/banner.png') ?>">
                <span class="hide print-time text-center">আয় ও খরচ রিপোর্ট</span><br>
                <span class="hide print-time text-center" style="margin-bottom: 5px;"><?php echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?></span>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-center" width="50%">Income</th>
                            <th class="text-center">Cost</th>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-6">
                <?php if(count($resultset) > 0) { ?>
                    <table class="table table-bordered">
                        <tr>
                            <th width="40">SL</th>
                            <th>Field Of Income</th>
                            <th>Total</th>
                        </tr>
    
                        <?php 
                        $sum = $previous_sum_income = $sum_previous_cost = $total_previous_sum = $grand_total_income = 0.00;
                        $allMonths = config_item('reportMonths');
                        foreach ($resultset as $row){ ?>
                        <tr>
                            <th><?php echo $row['sl']; ?></th>
                            <th><?php echo filter($row['field']); ?></th>
                            <td><?php echo $row['total']; $sum += $row['total']; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <th colspan="2" class="text-right">Total</th>
                            <th><?php echo $sum; ?> TK</th>
                        </tr>
                        <?php   foreach($resultset_previous as $row){$previous_sum_income += $row['total'];}
                                foreach($resultset_cost_previous as $row){$sum_previous_cost += $row['total'];} ?>
                        <tr>
                            <th colspan="2" class="text-right">Previous Balance </th>
                            <th> <?php if($previous_sum_income > 0){ echo $total_previous_sum =  ($previous_sum_income-$sum_previous_cost);
                                }else{ echo $total_previous_sum = 0.00; } ?> Tk</th>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-right">Grand Total </th>
                            <th><?php echo $grand_total_income =  ($sum+$total_previous_sum); ?> TK</th>
                        </tr>
                    </table>
                    <?php } ?>
                    </div>
                    <div class="col-xs-6">
                        <?php if(count($resultset_cost) > 0) { ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>Field Of Cost</th>
                                <th>Total</th>
                            </tr>
                            <?php 
                            $sum = $remaining_balance = $toal_balance = 0.00;
                            $allMonths = config_item('reportMonths');
                            foreach ($resultset_cost as $row) { 
                            ?>
                            <tr>
                                <th><?php echo $row['sl']; ?></th>
                                <th><?php echo filter($row['field']); ?></th>
                                <td><?php echo $row['total'];$sum += $row['total']; ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <th colspan="2" class="text-right">Total</th>
                                <th><?php echo $sum ; ?> Tk</th>
                            </tr>
                            <tr>
                                <th colspan="2" class="text-right">Remaining Balance</th>
                                <th><?php echo $remaining_balance = ($grand_total_income-$sum); ?> Tk</th>
                            </tr>
                            <tr>
                                <th colspan="2" class="text-right">Grand Total</th>
                                <th><?php echo $toal_balance = ($remaining_balance+$sum); ?> Tk</th>
                            </tr>
                        </table>
                    <?php } ?>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>