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

    .green{
        background-color: green;
        display: block;
        padding: none !important;
        color: #fff;
    }

    .profile{
        border-radius: 80px;
        max-width: 60px;
        width: 100%;
        max-height: 60px;
        height: 100%;
        margin-top: -8px;
    }



</style>
<div class="container-fluid block-hide" ng-controller="studentPaymentCtrl" ng-cloak>
    <div class="row">

    <?php echo $this->session->flashdata('confirmation'); ?>

    <!-- horizontal form -->
    <?php
    $attribute = array(
        'name' => '',
        'class' => 'form-horizontal',
        'id' => ''
    );
    echo form_open('', $attribute);
    ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <span style="font-size:24px; font-weight:bold;" class="pull-left">Student Information</span>
                    <span class="pull-right">
                        <img class="profile" ng-src="<?php echo site_url('public/students/{{ studentsInfo[0].photo }}');?>" alt="">
                    </span>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>

                <!-- left side -->
                <div class="col-md-12">
                    
                        <div class="col-md-3">
                            <input type="text" name="student_id" ng-model="student_id" ng-change="getStudentInfoFn(); getStudentPaymentsInfoFn();" class="form-control" autocomplete="off" placeholder="Student ID" required>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group date " id="datetimepicker1">
                                <input type="text" class="form-control" name="date" value="<?php echo date('Y-m-d');?>" required>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <select name="year" ng-model="year" ng-init="year='<?php echo date('Y'); ?>'" ng-change="getStudentPaymentsInfoFn()" class="form-control" required>
                                <option value="" selected disabled>-- Select Year --</option>
                                <?php
                                for ($i=date('Y')+1 ; $i >=2010  ; $i--) { ?>
                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select name="month" ng-model="month" ng-change="getStudentPaymentFieldsFn();" class="form-control" required>
                                <option value="" selected disabled>-- Select Month --</option>
                                <?php
                                foreach(config_item('months') as $key => $value){ ?>
                                <option value="<?php echo $value; ?>"> <?php echo $value; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        
                </div>

                 <div class="col-md-12">&nbsp;</div>


                <div class="container-fluid" ng-hide = "active">
                    <div class="col-sm-8">
                        <label for="" class="col-md-1">Name</label>
                        <div class="col-md-5">
                            <input type="text" name="student_name" class="form-control" value="{{ studentsInfo[0].name  }}" readonly >
                        </div>

                        <label for="" class="col-md-1">Class</label>
                        <div class="col-md-5">
                            <input type="text" name="class" class="form-control" value="{{ studentsInfo[0].class }}" readonly >
                            <input type="hidden" name="session" class="form-control" value="{{ studentsInfo[0].session }}">
                        </div>

                        <label for="" class="col-md-1">Section</label>
                        <div class="col-md-5">
                            <input type="text" name="section" class="form-control" value="{{ studentsInfo[0].section }}" readonly >
                        </div>

                        <label for="" class="col-md-1">Roll</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" value="{{ studentsInfo[0].roll }}" readonly >
                        </div>

                        <!--label for="" class="col-md-1">Type</label>
                        <div class="col-md-5">
                            <input type="text" name="type" class="form-control" value="{{ studentsInfo[0].type}}" readonly >
                        </div-->

                        <label for="" class="col-md-1">Mobile</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" value="{{ studentsInfo[0].student_mobile }}" readonly >
                            <input type="hidden" class="form-control" name="guardian_mobile" value="{{ studentsInfo[0].guardian_mobile }}" readonly >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <label for="" class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <select name="description" class="form-control" required>
                                    <option value="" selected disabled>-- Select Description --</option>
                                    <?php
                                    foreach($description as $value){ ?>
                                    <option value="<?php echo $value->description; ?>"> <?php echo $value->description; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-md-4">
                        <table class="table table-bordered">
                        <div ng-repeat="(key,month) in allMonths">
                            <div class="col-md-4 table-bordered" ng-class="{'green': (paymentMonths[key] == 1)}">
                                 <strong style="display:block;padding: 2px 0px;">{{ month }}</strong>
                            </div>
                        </div>
                        </table>
                    </div> -->

                </div>
            </div>



            <div class="col-md-12">&nbsp;</div>


            <div class="panel-body" ng-hide = "active1" >
                <table class="table table-bordered" ng-cloak>
                    <tr>
                        <th width="55" >SL</th>
                        <th>Field of Payment </th>
                        <th width="350px">Amount (TK)</th>

                    </tr>

                    <tr ng-repeat="row in studentsPaymentFields">
                        <td>{{ $index +1 }}</td>
                        <td>
                           {{ row.field_name | textBeautify }}
                           <input type="hidden" name="field_name[]" value="{{ row.field_name }}">
                        </td>
                        <td>
                          {{ row.amount }}
                          <input type="hidden" name="amount[]"  value="{{ row.amount }}">
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td ><strong class="pull-right">Total</strong></td>
                        <td>{{ studentsPaymentFields['total'] }} TK</td>
                    </tr>
                </table>

            </div>

            <div class="form-group" ng-hide = "active1" >
                <label class="col-md-3 control-label"></label>
                <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input class="btn btn-primary" type="submit" name="payment" value="Save">
                    </div>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
        <?php echo form_close(); ?>
  </div>
</div>
