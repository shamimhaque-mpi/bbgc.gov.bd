<style>
    @media print{
        table.table-right{
            border-right: 1px solid #ddd;
        }
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
        .panel .box-width{
            width: 50%;
            float: left;
        }
        .panel-heading{
            display: none;
        }
        .panel .hide{
            display: block !important;
        }
        .panel .none{
            display: none;
        }
        .panel-footer{
            display: none;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Balance Sheet</h1>
                </div>
            </div>

            <div class="panel-body none">

                <blockquote class="form-head">

                    <!--h4>Search And View Cost</h4-->

                    <ol style="font-size: 14px;">
                        <li> 1. Fill all the required <mark>*</mark> fields</li>
                        <li> 2. Click the <mark>Show</mark> button to view data </li>
                    </ol>

                </blockquote>
                
                <hr>

                <div class="row">

                    <form action="" class="form-horizontal">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Date From</label>
                                <div class="input-group date col-md-9" id="datetimepickerSMSFrom">
                                    <input type="text" name="date_from" class="form-control" placeholder="YYYY-MM-DD">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Date To</label>
                                <div class="input-group date col-md-9" id="datetimepickerSMSTo">
                                    <input type="text" name="date_to" class="form-control" placeholder="YYYY-MM-DD">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="btn-group pull-right">
                                <input type="submit" value="Show" class="btn btn-primary">
                            </div>
                        </div>

                    </form>

                </div>

            </div>

        <div class="panel-footer">&nbsp;</div>
        </div>

            <div class="panel panel-default">
                
                <div class="panel-heading">
                    <div class="panal-header-title">
                        <h1 class=" pull-left">Show Result</h1>
                        <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                    </div>
                </div>

                <div class="panel-body">
                   
                    <div class="row">
                        <h2 class="hide text-center" style="margin-top: 0px;"> Balance Sheet </h2>

                        <div class="col-md-6 box-width">

                            <table class="table table-bordered table-right">
                                <tr>
                                    <th>Sl</th>
                                    <th>Cost Purpose</th>
                                    <th>Amount</th>
                                </tr>

                                <tr>
                                    <td>1</td>
                                    <td>Class Payment</td>
                                    <td>500</td>
                                </tr>

                                <tr>
                                    <td colspan="2" class="text-center">Total</td>
                                    <td>500</td>
                                </tr>
                            </table>
                       </div>

                       <div class="col-md-6 box-width">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Sl</th>
                                    <th>Income Purpose</th>
                                    <th>Amount</th>
                                </tr>

                                <tr>
                                    <td>1</td>
                                    <td>Class Payment</td>
                                    <td>450</td>
                                </tr>

                                <tr>
                                    <td colspan="2" class="text-center">Total</td>
                                    <td>500</td>
                                </tr>
                            </table>
                       </div>

                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Total Income</th>
                                    <th>Total Cost</th>
                                    <th>Net Balance</th>
                                    <th>Status</th>
                                </tr>

                                <tr>
                                    <td>450</td>
                                    <td>500</td>
                                    <td>-50</td>
                                    <td>Loss</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="panel-footer">&nbsp;</div>

            </div>

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