<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<style>
    .table_responsive{
        min-height: .01%;
        overflow-x: auto;
    }
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
        .table_responsive{
            min-height: unset !important;
            overflow-x: unset !important;
        }
    }
    .m-0 {
        margin: 0;
    }
</style>


<div class="container-fluid block-hide">
    <div class="row">

    <!-- horizontal form -->
    <?php
    /*$attribute = array(
        'name' => '',
        'class' => 'form-horizontal',
        'id' => ''
    );
    echo form_open_multipart('', $attribute);*/
    ?>
        <form action="" class="form-horizontal" method="post">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panal-header-title pull-left">
                        <h1>Search</h1>
                    </div>
                </div>
    
                <div class="panel-body no-padding">
                    <div class="no-title">&nbsp;</div>
    
                    <!-- left side -->
                    <div class="col-md-9"> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">From</label>
                            <div class="input-group date col-md-7" id="datetimepicker1">
                                <input type="text" name="from_date" placeholder="From" class="form-control" >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">To</label>
                            <div class="input-group date col-md-7" id="datetimepicker2">
                                <input type="text" name="to_date" placeholder="To" class="form-control" >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-7">
                                <div class="btn-group pull-right">
                                    <input class="btn btn-primary" type="submit" name="show" value="Search">
                                </div>
                            </div>
                        </div>
                        
                        <script>
                            $('#datetimepicker1,#datetimepicker2').datetimepicker({
                                format: 'YYYY-MM-DD'
                            });
                        
                        </script>
                    </div>
                </div>
    
                <div class="panel-footer">&nbsp;</div>
            </div>
        </form>
        <?php //echo form_close(); ?>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>Monthly  Report</h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">
                <div class="view-profile hide" style="margin-bottom: 20px;">
                       
                        <div class="col-md-12">
                            <h4 class="text-center"> Monthly Report </h4>
                        </div>
                    <?php if(($this->input->post('show')) && ($this->input->post('from_date')) && ($this->input->post('to_date'))){  ?>
                        <div class="col-md-6">
                            <h3 class="text-right" > Date : <?php  echo $this->input->post('from_date').'-'.$this->input->post('to_date'); ?>  </h3>
                        </div>
                    <?php } ?>       
                 </div>

                <div class="table_responsive">
                    
                    <table class="table table-bordered">
                        <tr>
                            <th>Date</th>
                            <?php
                                $income_field = read('payment_field', [], 'id asc');
                                if($income_field!=null){
                                    foreach($income_field as $key => $value){
                                // ----------------------------------------------
                            ?>
                                <th><?php echo $value->field_name; ?></th>
                            <?php }} ?>
                            <th>Total</th>
                        </tr>
                        
                        <?php
                            if(isset($_POST['show'])){
                                if($_POST['from_date']!='' && $_POST['to_date']!=''){
                                    $query = [
                                        'table'   =>'payment',
                                        'order_by'=> 'date DESC',
                                        'group_by'=> ['date'],
                                        'cond' => [
                                            'trash'=>0,
                                            'status'=>"approved",
                                            'date >='=>$_POST['from_date'],
                                            'date <='=>$_POST['to_date']
                                        ]
                                    ];
                                }else{
                                    $query = [
                                        'table'   =>'payment',
                                        'order_by'=> 'date DESC',
                                        'group_by'=> ['date'],
                                        'cond' => [
                                            'trash'=>0,
                                            'status'=>"approved",
                                        ]
                                    ];
                                }
                                
                                $income = read($query);
                                
                                
                                if($income!=null){
                                    $total_toal = 0;
                                    foreach($income as $income_key => $income_value){
                                // ----------------------------------------------
                        ?>
                        <tr>
                            <td style="white-space: nowrap;"><?php echo $income_value->date; ?></td>
                            
                            <?php
                                $horizontal_total = 0;
                                $income_field = read('payment_field', [], 'id asc');
                                if($income_field!=null){
                                    foreach($income_field as $income_key2 => $income_value2){
                                // ----------------------------------------------
                            ?>
                            <td>
                                <?php
                                    $income_field_id = isset($income_value->field) ? $income_value->field : '';
                                    $sum = $this->action->read_sum('payment', "amount", ['date'=>$income_value->date, 'field'=>$income_value2->field_name, 'trash'=>0]);
                                    echo isset($sum[0]->amount) ? $sum[0]->amount : 0;
                                   
                                    //set horizontal total
                                    $horizontal_total += isset($sum[0]->amount) ? $sum[0]->amount : 0;
                                    
                                    // set right horizontal total total for bottom total
                                    $total_toal += isset($sum[0]->amount) ? $sum[0]->amount : 0;
                                ?>
                            </td>
                            <?php }} ?>
                            <td><?php echo $horizontal_total; ?></td>
                        </tr>
                        <?php }} ?>
                        
                                <tr>
                            <th>Total</th>
                            <?php
                                $income_field_for_total = read('payment_field', [], 'id asc');
                                if($income_field_for_total!=null){
                                    foreach($income_field_for_total as $for_total_key => $for_total_value){
                                // ----------------------------------------------
                            ?>
                                <td>
                                    <?php
                                        $field_id = $for_total_value->field_name;
                                        
                                        $where['trash'] = 0;
                                        $where['field'] = $field_id;
                                        
                                        if(isset($_POST['show']) && !empty($_POST['from_date']) && !empty($_POST['to_date'])){
                                            $where['date >=']=$_POST['from_date'];
                                            $where['date <=']=$_POST['to_date'];
                                        }
                                        
                                        $vertical_total = $this->action->read_sum('payment','amount', $where);
                                        echo ($vertical_total[0]->amount>0) ? $vertical_total[0]->amount : 0;
                                    ?>
                                </td>
                            <?php }} ?>
                            <th><?php echo $total_toal; ?></th>
                        </tr>
                            <?php } ?>
                    </table>      
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>