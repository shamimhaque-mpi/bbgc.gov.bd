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
                    <h1>Income Search</h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>

                <!-- left side -->
                <div class="col-md-9">
                        
                        <div class="form-group student_row" >
                            <label for="" class="col-md-3 control-label">Class </label>
                            <div class="col-md-7">
                                 <select name="search[class]" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                    <option value="">-- Select Class --</option>
                                    <?php foreach(config_item('classes') as $key => $value){ ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php } ?>                             
                                </select> 
                            </div>
                        </div>
                        
                        <div class="form-group student_row" >
                            <label for="" class="col-md-3 control-label">Session </label>
                            <div class="col-md-7">
                                 <select name="search[session]" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                    <option value="">-- Select Session --</option>
                                    <?php for($i=2011; $i<(date("Y")+6); $i++){ ?>
                                        <option value="<?php echo $i."-".($i+1); ?>"><?php echo $i."-".($i+1); ?></option>
                                    <?php } ?>                             
                                </select> 
                            </div>
                        </div>                        
                        
                        
                        <div class="form-group student_row" >
                            <label for="" class="col-md-3 control-label">Roll</label>
                            <div class="col-md-7">
                                <input type="text" name="search[roll_no]" class="form-control" placeholder="Roll">
                            </div>
                        </div>
                        
                        
                        <div class="form-group student_row" >
                            <label for="" class="col-md-3 control-label">Roshid No</label>
                            <div class="col-md-7">
                                <input type="text" name="search[rosid_no]" class="form-control" placeholder="Roshid No">
                            </div>
                        </div>                        
                        
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label"> Field Of Income </label>
                            <div class="col-md-7">
                                <select name="search[income_field]" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" >
                                  <option value="">-- Select --</option>
                                   <?php 
                                        foreach ($incomeField as $key => $value) {
                                        if($value->code != '0024'){    
                                   ?>
                                     <option value="<?php echo $value->code; ?>"><?php echo $value->field_income; ?></option>
                                   <?php }} ?>                                 
                                 </select> 
                            </div>
                        </div>                               
                    
                        <div class="form-group">
                            <label class="col-md-3 control-label">Form</label>
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

<?php if($incomeInfo != NULL) {?>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1> All Income</h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">
                <!-- Print banner -->
                <!-- img class="img-responsive print-banner hide" src="<?php //echo site_url('public/img/banner.jpg'); ?>" --> 

                
                
                <div class="view-profile hide" style="margin-bottom: 20px;">
                    <!-- <div class="col-xs-2">
                        <figure class="pull-left">
                            <img class="img-responsive" src="<?php //echo site_url('public/logo/logo.png'); ?>" style="width: 100px; height: 100px;" alt="">
                        </figure>
                    </div>

                    <div class="col-xs-8">
                        <div class="institute">
                            <h2 class="text-center title" style="margin-top: 10; font-weight: bold;">Border Guard Public School and College</h2>
                            <h3 class="text-center" style="margin: 0;">MYMENSINGH</h3>
                        </div>
                    </div> -->
                
                   <div class="col-md-12">
                        <div class="row banner">
                         <img style="width: 100%;" class="img-responsive" src="<?php echo site_url($banner_info[0]->path);?>" alt="Uploaded banner not found!" />
                        </div>
                    </div>

                <!-- span class="hide print-time"><?php //echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?></span -->

                <table class="table table-bordered">
                    <tr>
                        <th class="num-center">SL</th>
                        <th class="num-center">Date</th>
                        <th>Roshid No</th>
                        <th>Class</th>
                        <th>Session</th>
                        <th>Roll No</th>
                        <!--<th>Field Of Income</th>-->
                        <!--<th>Description </th>-->
                        <th>Income By </th>
                        <th class="num-center">Amount </th>
                        <th class="block-hide" width="160">Action</th>
                    </tr>
                    <?php
                        $total=0;
                        foreach ($incomeInfo as $key => $value) {
                             $getField =$this->action->read('income_field',array('code'=>$value->income_field));
                    ?>
                    <tr>
                        <td class="num-center"><?php echo $key + 1; ?></td>
                        <td class="num-center"><?php echo $value->date; ?></td>
                        <td><?php echo $value->rosid_no; ?></td>
                        <td style="text-transform: uppercase">
                            <?php  
                                if($value->class=="Eleven"){
                                    echo "HSC 1st Year";
                                }elseif($value->class=="Twelve"){
                                    echo "HSC 2nd Year";
                                }elseif($value->class=="Eleven(BM)"){
                                    echo "HSC(BM) 1st";
                                }elseif($value->class=="Twelve(BM)"){
                                    echo "HSC(BM) 2nd";
                                }else{
                                    echo ucwords(str_replace('_',' ',$value->class));
                                }
                            ?>
                        </td>
                        <td><?php echo $value->session; ?></td>
                        <td><?php echo $value->roll_no; ?></td>
                        <!--<td><?php //echo (isset($getField[0]->field_income) ? $getField[0]->field_income : $value->description); ?></td>-->
                        <!--<td><?php //echo $value->description; ?></td>-->
                        <td><?php echo $value->income_by; ?></td>
                        <td class="num-center">
                            <?php
                                if(isset($_POST['date']['from']) && isset($_POST['date']['to'])){
                                    $rosid_no = $value->rosid_no;
                                    $from = $_POST['date']['from'];
                                    $to = $_POST['date']['to'];
                                    
                                    if(!empty($_POST['date']['from']) && !empty($_POST['date']['to'])){
                                        $amount = $this->action->read_sum('income', 'amount', ['date >=' => $from,'date <='=>$to,'rosid_no'=>$rosid_no, 'trash'=>0]);
                                    }else{
                                        $amount = $this->action->read_sum('income', 'amount', ['rosid_no'=>$rosid_no, 'trash'=>0]);
                                    }
                                    
                                    echo ($amount[0]->amount);
                                    $total+=$amount[0]->amount;
                                }else{
                                    $rosid_no = $value->rosid_no;
                                    $amount = $this->action->read_sum('income', 'amount', ['rosid_no'=>$rosid_no, 'trash'=>0]);
                                    echo ($amount[0]->amount);
                                    $total+=$amount[0]->amount;
                                }

                            ?>
                        </td>
                        <td class="none text-center " style="width: 110px;">
                            <a title="view" class="btn btn-success" href="<?php echo site_url('income/infoView/view/'.$value->rosid_no);?>" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a title="edit" class="btn btn-warning" href="<?php echo site_url('income/infoView/edit/'.$value->rosid_no);?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this Income?');" href="<?php echo site_url('income/infoView/delete_income/'.$value->rosid_no);?>" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="7"><span class="pull-right">Total</span> </th>
                        <th colspan="2"><?php echo $total; ?> Tk</th>
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

