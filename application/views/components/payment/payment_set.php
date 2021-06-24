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
<div class="container-fluid block-hide" ng-controller="paymentSetCtrl" ng-cloak>
    <div class="row">
    <?php echo $this->session->flashdata('confirmation'); ?>
    <!-- horizontal form -->
    <?php
        $attribute = array('name' => '','class' => 'form-horizontal','id' => '');
        echo form_open('', $attribute);
    ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Class Information</h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>

                <!-- left side -->
                <div class="col-md-12">
                    <label for="" class="col-md-1 control-label">Class <span class="req">*</span> </label>
                    <div class="col-md-3">
                        <select name="class" ng-model="search.class" ng-change="getPaymentInfoFn();" class="form-control" required>
                            <option value="" selected disabled>-- Select Class --</option>
                            <?php foreach(config_item('classes') as $key => $value){?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <label for="" class="col-md-1 control-label">Section<span class="req">*</span> </label>
                    <div class="col-md-3">
                        <select name="section" ng-model="search.section" ng-change="getPaymentInfoFn();" class="form-control" required>
                            <option value="" selected disabled>-- Select Section--</option>
                            <?php foreach(config_item('section') as $key => $value){?>
                            <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!--label for="" class="col-md-1 control-label">Type <span class="req">*</span> </label>
                    <div class="col-md-3">
                        <select name="student_type" ng-model="search.type" ng-change="getPaymentInfoFn();" class="form-control" required>
                            <option value=""  selected disabled>-- Select Type--</option>
                            <option value="bgb">BGB</option>
                            <option value="civil">Civil</option>
                        </select>
                    </div-->

                    <!-- <label for="" class="col-md-1 control-label">C.ID </label>
                    <div class="col-md-2">
                        <input list="allStudentsID" type="text" name="student_id" class="form-control" placeholder="Student Main ID">
                        <datalist id="allStudentsID">
                            <?php foreach ($allStudents as $key => $value) { ?>
                                <option value="<?php echo $value->student_id ?>">
                            <?php } ?>
                        </datalist>
                    </div> -->

                </div>
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        
        
        <div class="panel panel-default" ng-hide="active">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>All Field of Payment</h1>
                </div>

            </div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th class="num-center" width="55" >SL</th>
                        <th>Field of Payment</th>
                        <th width="350px">Amount (TK)</th>

                    </tr>                   
                    <tr ng-repeat="row in allFields">
                        <td class="num-center"> {{ $index+1 }}</td>
                        <td>
                            <input type="hidden" name="field_name[]" value="{{ row.field_name }}" >
                            {{ row.field_name | textBeautify }}
                        </td>
                        <td><input type="number" name="amount[]" class="form-control" value="{{ row.amount }}"></td>
                    </tr>
                </table>

            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input class="btn btn-primary" type="submit" name="set" value="Save">
                    </div>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
    <?php echo form_close(); ?>
    </div>
</div>
