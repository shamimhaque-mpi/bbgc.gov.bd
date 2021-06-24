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

    input[type="checkbox"] + .label-text:before{
    content: "\f096";
    font-family: "FontAwesome";
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing:antialiased;
    width: 1em;
    display: inline-block;
    margin-right: 5px;
    font-size: 1.4em;


}

input[type="checkbox"]:checked + .label-text:before{
    content: "\f14a";
    color: #05963a;
    animation: effect 250ms ease-in;
}

input[type="checkbox"]:disabled + .label-text{
    color: #aaa;

}

input[type="checkbox"]:disabled + .label-text:before{
    content: "\f0c8";
    color: #ccc;


}


</style>
<div class="container-fluid block-hide" ng-controller="paymentFieldSettingCtrl" ng-cloak>
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
                <div class="panal-header-title pull-left">
                    <h1>Class Information</h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>

                <!-- left side -->
                <div class="col-md-12">

                    <div class="col-md-4">
                        <select name="class" ng-model="search.class" class="form-control" ng-change="getPaymentFieldInfoFn();" required>
                            <option value="" selected disabled>-- Select Class --</option>
                            <?php
                                foreach(config_item('classes') as $key => $value){?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php
                                }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <select name="section" ng-model="search.section" class="form-control" ng-change="getPaymentFieldInfoFn();" required>
                            <option value="" selected disabled>-- Select Section--</option>
                            <?php
                                foreach(config_item('section') as $key => $value){?>
                                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                <?php
                                }
                            ?>
                        </select>
                    </div>

                    <!--div class="col-md-3">
                        <select name="student_type" ng-model="search.type" class="form-control" ng-change="getPaymentFieldInfoFn();" required>
                            <option value=""  selected disabled>-- Select Type--</option>
                            <option value="bgb">BGB</option>
                            <option value="civil">Civil</option>
                        </select>
                    </div-->

                    <div class="col-md-4">
                        <select name="month" ng-model="month" ng-change="getPaymentFieldInfoFn();" class="form-control" required>
                            <option value="" selected disabled>-- Select Month--</option>
                            <?php
                                foreach(config_item('months') as $key => $value){?>
                                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                <?php
                                }
                            ?>
                        </select>
                    </div>



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
                        <th class="num-center" width="55" >Sl</th>
                        <th><input type="checkbox" id="check_all" >&nbsp;Field of Payment </th>
                        <th class="num-center" width="350px">Amount (TK)</th>
                    </tr>

                    <tr ng-repeat="row in allFields">

                        <td class="num-center">{{ $index+1 }}</td>
                        <td>
                            <div class="form-check ">
                                <label><input type="checkbox" ng-checked="row.check" style="display: none;" name="field_id[]" value="{{ row.id }}"  > <span class="label-text">{{ row.field_name}}</span></label>
                            </div>
                        </td>
                        <td class="num-center">{{ row.amount }}</td>
                    </tr>

                </table>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input class="btn btn-primary" type="submit" name="update" value="Update">
                    </div>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>

        <?php echo form_close(); ?>
    </div>
</div>

<script>
$("#check_all").on('change', function(event) {
    event.preventDefault();
    if($(this).is(":checked")==true){
        $('input[name="field_id[]"]').prop("checked",true);
    }else{
        $('input[name="field_id[]"]').prop("checked",false);
    }
});
</script>
