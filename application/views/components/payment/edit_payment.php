<style>
    @media print {
        aside, nav, .none, .panel-heading, .panel-footer {
            display: none !important;
        }

        .panel {
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }

        .hide {
            display: block !important;
        }

        .block-hide {
            display: none;
        }
    }

    .green {
        background-color: green;
        display: block;
        padding: none !important;
        color: #fff;
    }

    .profile {
        border-radius: 80px;
        max-width: 60px;
        width: 100%;
        max-height: 60px;
        height: 100%;
        margin-top: -8px;
    }

    .action {
        padding: 0px !important;
        vertical-align: middle !important;
        text-align: center !important;
    }

</style>
<div class="container-fluid block-hide" ng-controller="studentPaymentEditCtrl" ng-cloak>
    <div class="row">

        <?php echo $this->session->flashdata('confirmation'); ?>

        <!-- horizontal form -->
        <?php
        $attribute = array(
            'name'  => '',
            'class' => 'form-horizontal',
            'id'    => ''
        );
        echo form_open('payment/receieve_payment/payment_update', $attribute);
        ?>

        <?php
        //fetch Student basic info from 'registration' and 'admission' table
        $where       = ['registration.reg_id' => $info->student_id];
        $select      = ['registration.name', 'registration.student_mobile', 'registration.photo', 'admission.*'];
        $studentInfo = get_row_join('registration', 'admission', 'registration.reg_id = admission.student_id', $where, $select);
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <span style="font-size:24px; font-weight:bold;" class="pull-left">Student Information</span>
                    <span class="pull-right">
                        <img class="profile" ng-src="<?php echo site_url("public/students/$studentInfo->photo"); ?>"
                             alt="">
                    </span>
                </div>
            </div>

            <div class="panel-body">

                <table class="table table-bordered">
                    <tr>
                        <th width="15%">Name</th>
                        <td width="35%"><?php echo $studentInfo->name; ?> </td>

                        <th width="15%">Class</th>
                        <td width="35%"><?php echo filter($studentInfo->class); ?> </td>
                    </tr>

                    <tr>
                        <th>Session</th>
                        <td><?php echo $studentInfo->session; ?> </td>

                        <th>Mobile</th>
                        <td><?php echo $studentInfo->student_mobile; ?> </td>
                    </tr>

                    <tr>
                        <th>Roll</th>
                        <td><?php echo $studentInfo->roll; ?> </td>

                        <th>Year</th>
                        <td><?php echo $info->year; ?></td>
                    </tr>
                </table>

                <div class="row">
                    <div class="col-md-2">
                        <label for="" class="control-label">Date</label>
                        <div class="input-group date " id="datetimepicker1">
                            <input type="text" class="form-control" name="date" value="<?php echo $info->date; ?>"
                                   required>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label for="" class="control-label">Invoice No</label>
                        <input type="text" name="invoice_no" class="form-control"
                               ng-init="invoice_no='<?php echo $info->invoice_no; ?>'" ng-model="invoice_no"
                               ng-value="invoice_no" readonly>
                    </div>

                    <div class="col-md-4">
                        <label for="" class="control-label">Description</label>
                        <select class="form-control" name="description">
                            <option value="<?= $info->description; ?>"><?= $info->description; ?></option>
                            <?php
                            foreach ($description as $value) { ?>
                                <option value="<?= $value->description ?>"
                                        class="<?php if ($value->description == $info->description) {
                                            echo 'selected';
                                        } ?>"><?= $value->description ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="" class="control-label">Payment Field</label>
                        <select class="form-control" ng-model="field" ng-change="addFieldFn(field)">
                            <option value="" selected>-- Select Field --</option>
                            <?php
                            foreach ($allField as $value) { ?>
                                <option value="<?= $value->field_name ?>"><?= $value->field_name ?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>

                <hr style="margint-top: 0px;">

                <table class="table table-bordered" ng-cloak>
                    <tr>
                        <th width="55">SL</th>
                        <th>Field of Payment</th>
                        <th width="350px">Amount (TK)</th>
                        <th width="50">Action</th>
                    </tr>

                    <tr ng-repeat="item in cart">

                        <input type="hidden" name="id[]" ng-value="item.id">
                        <input type="hidden" name="field[]" ng-value="item.field">
                        <input type="hidden" name="old_amount[]" ng-value="item.old_amount">
                        <td ng-bind="$index+1"></td>
                        <td ng-bind="item.field | textBeautify"></td>
                        <td class="action">
                            <input type="number" name="amount[]" class="form-control" ng-model="item.amount" step="any" placeholder="0">
                        </td>
                        <td class="action">
                            <span class="btn btn-danger btn-sm" ng-click="removeCartItem($index)">
                                <i class="fa fa-trash-o"></i>
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="text-right">Total</td>
                        <td>{{ getTotalAmount() }} TK</td>
                    </tr>
                </table>


                <input type="hidden" name="trash_id[]" ng-repeat="trashItem in trashCart" ng-value="trashItem">

                <div class="form-gorup">
                    <div class="text-right">
                        <input type="submit" name="update" value="Update" class="btn btn-primary">
                    </div>
                </div>
            </div>


            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
</div>
