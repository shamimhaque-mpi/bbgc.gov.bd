<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer{display: none !important;}
        .panel{border: 1px solid transparent;left: 0px;position: absolute;top: 0px;width: 100%;}
        .hide{display: block !important;}
        .block-hide{display: none;}
    }
    .menu_item {
        min-width: 150px !important;
    }
</style>
<div class="container-fluid block-hide">
    <div class="row">
    <?php echo $this->session->flashdata('confirmation'); ?>
    <!-- horizontal form -->
    <?php
        $attribute = array('name' => '','class' => 'form-horizontal','id' => '');
        echo form_open_multipart('', $attribute);
    ?>
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
                        <label for="" class="col-md-3 control-label">Field Of Cost </label>
                        <div class="col-md-7">
                            <select name="search[cost_field]" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" >
                              <option value="">-- Select Any --</option>
                               <?php foreach ($cost_fields as $key => $value) {?>
                                 <option value="<?php echo $value->code; ?>"><?php echo $value->cost_field; ?></option>
                               <?php } ?>                                 
                             </select> 
                        </div>
                    </div>                               
                
                    <div class="form-group">
                        <label class="col-md-3 control-label">From</label>
                        <div class="input-group date col-md-7" id="datetimepickerFrom">
                            <input type="text" name="date[from]" placeholder="From" class="form-control" >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>   

                    <div class="form-group">
                        <label class="col-md-3 control-label">To</label>
                        <div class="input-group date col-md-7" id="datetimepickerTo">
                            <input type="text" name="date[to]" placeholder="To" class="form-control" >
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
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
<?php if($costs != NULL) {
    $date_from = !empty($_POST['date']['from']) ? $_POST['date']['from'] : "";
    $date_to = !empty($_POST['date']['to']) ? $_POST['date']['to'] : "";
?>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>All Cost</h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>
            <div class="panel-body">
                <img class="hide" style="width: 100%; margin-bottom: 10px;" src="<?php echo site_url('public/banner/banner.png') ?>">
                
                <strong class="hide print-time text-center">সকল খরচ</strong><br>
                
                <?php if(!empty($date_from) && !empty($date_to)) { ?>
                <strong class="hide print-time">
                    তারিখঃ <?php echo $date_from . ' - '  .$date_to; ?>
                </strong><br>
                <?php } ?>
                
                <table class="table table-bordered">
                    <tr>
                        <th class="num-center">SL</th>
                        <th class="num-center" width="90">Date</th>
                        <th width="155"> Field Of Cost </th>
                        <th>Discription </th>
                        <th>Cost By </th>
                        <th class="num-center">Amount </th>
                        <th class="block-hide" width="100">Action</th>
                    </tr>
                    <?php
                        $total=0;
                        foreach ($costs as $key => $value) {
                            $getField =$this->action->read('cost_field',array('code'=>$value->cost_field));
                    ?>
                    <tr>
                        <td class="num-center"><?php echo $key + 1; ?></td>
                        <td class="num-center"><?php echo $value->date; ?></td>
                        <td><?php echo (isset($getField[0]->cost_field) ? filter($getField[0]->cost_field) : $value->description); ?></td>
                        <td><?php echo $value->description; ?></td>
                        <td><?php echo $value->spend_by; ?></td>
                        <td class="num-center"><?php echo $value->amount; ?></td>
                        <td class="none text-center ">
                        <!-- Single button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right menu_item">
                                <a title="edit" class="btn btn-primary" href="<?php echo site_url('cost/cost/cost_details/'.$value->id);?>" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a title="edit" class="btn btn-warning" href="<?php echo site_url('cost/cost/edit/'.$value->id);?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this Cost?');" href="<?php echo site_url('cost/cost/delete_cost/'.$value->id);?>" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </ul>
                        </div>
                            
                        </td>
                    </tr>
                    <?php $total+=$value->amount; } ?>
                    <tr>
                        <th colspan="5"><span class="pull-right">Total</span> </th>
                        <th colspan="2"><?php echo $total; ?> TK</th>
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