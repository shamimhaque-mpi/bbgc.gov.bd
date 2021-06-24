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
                    <h1>Monthly Income Report</h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">
                <div class="view-profile hide" style="margin-bottom: 20px;">
                        <!--<div class="row banner">
                            <!--<img style="width: 100%;" class="img-responsive" src="<?php //echo site_url($banner_info[0]->path);?>" alt="Uploaded banner not found!" />-->
                            <!--<h1 class="text-center m-0">মুক্তাগাছা আব্বাছিয়া কামিল মাদরাসা</h1>-->
                            <!--<h3 class="text-center m-0">মুক্তাগাছা, ময়মনসিংহ।</h3>-->
                        <!--</div>-->
                        
                        <div class="col-md-12">
                            <h4 class="text-center"> Monthly Income Report </h4>
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
                            <th>তারিখ</th>
                            <?php
                                $cost_field = read('cost_field', [], 'id asc');
                                if($cost_field!=null){
                                    foreach($cost_field as $key => $value){
                                // ----------------------------------------------
                            ?>
                                <th><?php echo $value->cost_field; ?></th>
                            <?php }} ?>
                            <th>মোট</th>
                        </tr>
                        
                        
                        
                        <?php
                            $total_total = 0;
                            if(isset($_POST['show'])){
                                if(!empty($_POST['from_date']) && !empty($_POST['to_date'])){
                                    $query = [
                                        'table'   =>'cost',
                                        'order_by'=> 'date DESC',
                                        'group_by'=> ['date'],
                                        'cond'    => [
                                                    'trash'=>0,
                                                    'date >='=>$_POST['from_date'],
                                                    'date <='=>$_POST['to_date']
                                                ]
                                    ];
                                }else{
                                    $query = [
                                        'table'   =>'cost',
                                        'order_by'=> 'date DESC',
                                        'group_by'=> ['date'],
                                        'cond'    => ['trash'=>0]
                                    ];
                                }
                                
                                $cost = read($query);
                                
                                if($cost!=null){
                                    $total_total = 0;
                                    foreach($cost as $cost_key => $cost_value){
                                // ----------------------------------------------
                        ?>
                        <tr>
                            <td style="white-space: nowrap;"><?php echo $cost_value->date; ?></td>
                            
                            <?php
                                $horizontal_total = 0;
                                $cost_field = read('cost_field', [], 'id asc');
                                if($cost_field!=null){
                                    foreach($cost_field as $cost_key2 => $cost_value2){
                                // ----------------------------------------------
                            ?>
                            <td>
                                <?php
                                    $cost_field_id = isset($cost_value->cost_field) ? $cost_value->cost_field : '';
                                    $sum = $this->action->read_sum('cost', "amount", ['date'=>$cost_value->date, 'cost_field'=>$cost_value2->code, 'trash'=>0]);
                                    echo isset($sum[0]->amount) ? $sum[0]->amount : 0;
                                   
                                    //set horizontal total
                                    $horizontal_total += isset($sum[0]->amount) ? $sum[0]->amount : 0;
                                    
                                    // set right horizontal total total for bottom total
                                    $total_total += isset($sum[0]->amount) ? $sum[0]->amount : 0;
                                ?>
                            </td>
                            <?php }} ?>
                            <td><?php echo $horizontal_total; ?></td>
                        </tr>
                        <?php }} ?>
                        
                                <tr>
                            <th>মোট</th>
                            <?php
                                $cost_field_for_total = read('cost_field', [], 'id asc');
                                if($cost_field_for_total!=null){
                                    foreach($cost_field_for_total as $for_total_key => $for_total_value){
                                // ----------------------------------------------
                            ?>
                                <td>
                                    <?php
                                        $field_id = $for_total_value->code;
                                        
                                        $where['trash'] = 0;
                                        $where['cost_field'] = $field_id;
                                        
                                        if(isset($_POST['show']) && !empty($_POST['from_date']) && !empty($_POST['to_date'])){
                                            $where['date >=']=$_POST['from_date'];
                                            $where['date <=']=$_POST['to_date'];
                                        }
                                        
                                        $vertical_total = $this->action->read_sum('cost','amount', $where);
                                        echo ($vertical_total[0]->amount>0) ? $vertical_total[0]->amount : 0;
                                    ?>
                                </td>
                            <?php }} ?>
                            <th><?php echo $total_total; ?></th>
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