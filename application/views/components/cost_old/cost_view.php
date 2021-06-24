<style>
    @media print{
        aside{
            display: none !important;
        }
        nav{
            display: none;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .none{
            display: none;
        }
        .panel-heading{
            display: none;
        }
        .hide{
            display: block !important;
        }
        .none{
            display: none;
        }
        .panel-footer{
            display: none;
        }
        .title{
            font-size: 25px;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default none">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Show Cost</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>Search And View Cost</h4>

                    <ol style="font-size: 14px;">
                        <li> 1. Fill all the required <mark>*</mark> fields</li>
                        <li> 2. Click the <mark>Show</mark> button to view data </li>
                    </ol>

                </blockquote>
                
                <hr-->

                <form action="">
                    
                    
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Date</label>
                            <div class="input-group date col-md-5" id="datetimepickerSMSFrom">
                                <input type="text" name="date_from" class="form-control" placeholder="YYYY-MM-DD">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    

                    
                        <div class="form-group row">
                            <label class="col-md-2 control-label">to</label>
                            <div class="input-group date col-md-5" id="datetimepickerSMSTo">
                                <input type="text" name="date_to" class="form-control" placeholder="YYYY-MM-DD">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    

                    <div class="col-md-7 no-padding">
                        <div class="btn-group pull-right">
                            <input type="submit" value="Show" class="btn btn-primary">
                        </div>
                    </div>

                </form>

            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>



        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class=" pull-left">Search Result</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">
                
                <div class="row hide">

                    <div class="view-profile">
                        <div class="col-xs-2">
                            <figure class="pull-left">
                                <img class="img-responsive" src="<?php echo site_url('private/images/logo.jpg'); ?>" width="80px" height="80px" alt="">
                            </figure>
                        </div>

                        <div class="col-xs-8">
                            <div class="institute">
                               <h2 class="text-center" style="margin-top: 10; font-weight: bold; title">Jhawla Gopalpur College</h2>
                                <h3 class="text-center" style="margin: 0;">Jamalpur Sadar, Jamalpur</h3>
                            </div>
                        </div>

                    </div>

                </div>

                <hr class="hide" style="border-bottom: 1px solid #ccc;">

                <h3 class="hide text-center" style="margin-top: -10px;">All Cost</h3>

                <table class="table table-bordered">
                    <tr>
                        <th>Sl</th>
                        <th>Date</th>
                        <th>Cost Purpose</th>
                        <th>Spender</th> 
                        <th>Amount</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>2016-07-19</td>
                        <td>Class Payment</td>
                        <td>imtiaz</td>
                        <td>500</td>
                    </tr>

                    <tr>
                        <td colspan="4" class="text-center">Total</td>
                        <td>500</td>
                    </tr>
                </table>

            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>

    </div>
</div>

<script>
    // linking between two date
    $('#datetimepickerSMSFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerSMSTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $("#datetimepickerSMSFrom").on("dp.change", function (e) {
        $('#datetimepickerSMSTo').data("DateTimePicker").minDate(e.date);
    });
    $("#datetimepickerSMSTo").on("dp.change", function (e) {
        $('#datetimepickerSMSFrom').data("DateTimePicker").maxDate(e.date);
    });
</script>