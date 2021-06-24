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
</style>

<div class="container-fluid block-hide">
    <div class="row">
    <?php echo $this->session->flashdata('confirmation'); ?>

    <!-- horizontal form -->
    <?php
    $attribute = array(
        'name' => '',
        'class' => 'form-horizontal',
        'id' => ''
    );
    echo form_open_multipart('', $attribute);
    ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Income Report</h1>
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
                                <option value="<?php echo $start.'-'.((int)$start+1); ?>"> <?php echo $start.'-'.((int)$start+1); ?></option>
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



<?php if(count($resultset) > 0) { ?>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>Income Report</h1>
                </div>

                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">
                
                <img class="hide" style="width: 100%; margin-bottom: 10px;" src="<?php echo site_url('public/banner/banner.png') ?>">
                <span class="hide print-time text-center">আয় রিপোর্ট</span><br>

                <span class="hide print-time text-center" style="margin-bottom: 5px;"><?php echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?></span>

                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Field Of Income</th>
                        <th>Jul</th>
                        <th>Aug</th>
                        <th>Sep</th>
                        <th>Oct</th>
                        <th>Nov</th>
                        <th>Dec</th>
                        <th>Jan</th>
                        <th>Feb</th>
                        <th>Mar</th>
                        <th>Apr</th>
                        <th>May</th>
                        <th>Jun</th>
                        <th>Total</th>
                    </tr>

                    <?php 
                    $sum = 0.00;
                    $allMonths = config_item('reportMonths');
                    foreach ($resultset as $row) { ?>
                    <tr>
                        <th><?php echo $row['sl']; ?></th>
                        <th><?php echo filter($row['field']); ?></th>
                        <?php 
                        foreach ($row['details'] as $month) { 
                            foreach ($allMonths as $value) {
                                if($month['month'] == $value) {
                                    $key = strtolower($value);
                                    $totalRec[$key] += $month['amount'];
                        }   }   ?>
                        <td><?php echo $month['amount']; ?></td>
                        <?php } ?>
                        <td>
                            <?php 
                                echo $row['total']; 
                                $sum += $row['total']; 
                            ?>
                        </td>
                    </tr>
                    <?php } ?>

                    <tr>
                        <th colspan="2" class="text-right">Total</th>
                        <?php foreach ($totalRec as $key => $value) { ?>
                        <th><?php echo $value; ?></th>
                        <?php } ?>

                        <th><?php echo $sum; ?></th>
                    </tr>
                </table>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<?php } ?>

