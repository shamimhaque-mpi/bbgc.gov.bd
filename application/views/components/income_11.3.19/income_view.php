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
                    <h1>Search By</h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>

                <!-- left side -->
                <div class="col-md-9"> 

                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Field of Income</label>
                            <div class="col-md-7">
                                <select name="search[income_field]" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" >
                                  <option value="">-- Select Option --</option>
                                   <?php foreach ($incomeField as $key => $value) {?>
                                     <option value="<?php echo $value->field_income; ?>"><?php echo $value->field_income; ?></option>
                                   <?php } ?>                                 
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
                    <h1>All Income</h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">
                <!-- Print banner -->
                <img class="img-responsive print-banner hide" src="<?php echo site_url('public/img/banner.jpg'); ?>" > <br/>
                <!--span class="hide print-time"><?php //echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?></span-->
                
                <!--div class="view-profile">
                    <div class="col-xs-2">
                        <figure class="pull-left">
                            <img class="img-responsive" src="<?php// echo site_url('public/logo/logo.png'); ?>" style="width: 100px; height: 100px;" alt="">
                        </figure>
                    </div>
    
                    <div class="col-xs-8">
                        <div class="institute">
                            <h2 class="text-center title" style="margin-top: 10; font-weight: bold;">Border Guard Public School and College</h2>
                            <h3 class="text-center" style="margin: 0;">MYMENSINGH</h3>
                        </div>
                    </div>
                 </div-->

                <!-- span class="hide print-time"><?php// echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?></span -->

                <table class="table table-bordered">
                    <tr>
                        <th class="num-center">SL</th>
                        <th class="num-center">Date</th>
                        <th>Field of Income </th>
                        <th>Description </th>
                        <th>By </th>
                        <th class="num-center">Amount </th>
                        <th class="block-hide" width="115">Action</th>
                    </tr>
                    <?php
                        $total=0;
                        foreach ($incomeInfo as $key => $value) {
                    ?>
                    <tr>
                        <td class="num-center"><?php echo $key + 1; ?></td>
                        <td class="num-center"><?php echo $value->date; ?></td>
                        <td><?php echo filter($value->income_field); ?></td>
                        <td><?php echo $value->description; ?></td>
                        <td><?php echo $value->income_by; ?></td>
                        <td class="num-center"><?php echo $value->amount; ?></td>
                        <td class="none text-center " style="width: 160px;">
                            
                            <a title="view" class="btn btn-info" href="<?php echo site_url('income/infoView/profile/'.$value->id);?>" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                            
                            <a title="edit" class="btn btn-warning" href="<?php echo site_url('income/infoView/edit/'.$value->id);?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                            <a title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this Income?');" href="<?php echo site_url('income/infoView/delete_income/'.$value->id);?>" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                        </td>
                    </tr>
                    <?php $total+=$value->amount; } ?>
                    <tr>
                        <th colspan="5"><span class="pull-right">Total</span> </th>
                        <th colspan="2" class=""><?php echo $total; ?> TK</th>
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

