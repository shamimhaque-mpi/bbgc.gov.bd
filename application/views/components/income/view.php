<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />


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

<?php if($incomeInfo != NULL) {?>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>Income Information</h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Roshid No</th>
                        <th>Class</th>
                        <th>Session</th>
                        <th>Roll No</th>
                        <th>Description </th>
                        <th>Income By </th>
                    </tr>
                    <tr>
                        <td><?php echo $incomeInfo[0]->rosid_no; ?></td>
                        <td><?php  echo $incomeInfo[0]->class;  ?></td>
                        <td><?php echo $incomeInfo[0]->session; ?></td>
                        <td><?php echo $incomeInfo[0]->roll_no; ?></td>
                        <td><?php echo $incomeInfo[0]->description; ?></td>
                        <td><?php echo $incomeInfo[0]->income_by; ?></td>
                    </tr>
                </table>
                
                
                
                <table class="table table-bordered">
                    <tr>
                        <th class="num-center">SL</th>
                        <th class="num-center">Date</th>
                        <th>Field Of Income</th>
                        <th class="num-center">Amount </th>
                    </tr>
                    <?php
                        $total=0;
                        foreach ($incomeInfo as $key => $value) {
                            $getField =$this->action->read('income_field',array('code'=>$value->income_field));
                    ?>
                    <tr>
                        <td class="num-center"><?php echo $key + 1; ?></td>
                        <td class="num-center"><?php echo $value->date; ?></td>
                        <td><?php echo (isset($getField[0]->field_income) ? $getField[0]->field_income : $value->description); ?></td>
                        <td class="num-center"><?php echo $value->amount; ?></td>
                    </tr>
                    <?php $total+=$value->amount; } ?>
                    <tr>
                        <th colspan="3"><span class="pull-right">Total</span> </th>
                        <th><?php echo $total; ?> Tk</th>
                    </tr>
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<?php } ?>


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



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

