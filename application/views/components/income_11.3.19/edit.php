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
    echo form_open('income/infoView/edit/'.$incomeEdit[0]->id, $attribute);
    ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Edit Income</h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <!-- Print banner -->
                <!--img class="img-responsive print-banner hide" src="<?php// echo site_url('public/img/banner.png'); ?>"-->
                <span class="hide print-time"><?php echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?></span>

                <div class="no-title">&nbsp;</div>

                <!-- left side -->
                <div class="col-md-9">                                
                    
                        <div class="form-group">
                            <label class="col-md-3 control-label">Date</label>
                            <div class="input-group date col-md-7" id="datetimepicker1">
                                <input type="text" name="date" class="form-control" value="<?php echo $incomeEdit[0]->date; ?>" >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="" class="col-md-3 control-label">Field of Income </label>
                        <div class="col-md-7">
                            <select name="income_field" class="form-control">
                              <?php foreach ($income_fields as $key => $value) {?>
                                  <option <?php if($incomeEdit[0]->income_field == str_replace(" ","_",$value->field_income)){ echo "selected"; }?> value="<?php echo str_replace(" ","_",$value->field_income); ?>"><?php echo $value->field_income; ?></option>
                              <?php } ?>                             
                             </select> 
                        </div>
                    </div>

                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Description </label>
                            <div class="col-md-7">
                               <textarea name="description" class="form-control" cols="30" rows="4" placeholder="Enter Description"><?php echo $incomeEdit[0]->description; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Amount </label>
                            <div class="col-md-7">
                                <input type="text" name="amount" class="form-control" value="<?php echo $incomeEdit[0]->amount; ?>" placeholder="BDT">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Spend By </label>
                            <div class="col-md-7">
                                <input type="text" name="income_by" class="form-control" value="<?php echo $incomeEdit[0]->income_by; ?>" placeholder="Enter maximum 100 characters">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-7">
                                <div class="btn-group pull-right">
                                    <input class="btn btn-primary" type="submit" name="edit_income" value="Update">
                                    <input class="btn btn-danger" type="reset"  value="Clear">
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




