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
        .panel-heading{
            display: none;
        }
        .panel .hide{
            display: block !important;
        }
        .none{
            display: none;
        }
        .panel-footer{
            display: none;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default none">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Earn from Student</h1>
                </div>
            </div>

            <div class="panel-body">

                <blockquote class="form-head">

                    <h4>Search And View Income</h4>

                    <ol style="font-size: 14px;">
                        <li> 1. Fill all the required <mark>*</mark> fields</li>
                        <li> 2. Click the <mark>Show</mark> button to view data </li>
                    </ol>

                </blockquote>
                
                <hr>


                <form action="" class="form-horizontal">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Date</label>
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
                            <label class="col-md-3 control-label">to</label>
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
            <div class="panel-footer">&nbsp;</div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class=" pull-left">Show Result</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <h3 class="hide text-center" style="margin-top: 0;">Earn Form Student</h3>

            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Roll Number</th>
                        <th>Class</th>
                        <th>Amount</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>imtiaz</td>
                        <td>2016-24-154</td>
                        <td>Class-5</td>
                        <td>500</td>
                    </tr>

                    <tr>
                        <td colspan="4" class="text-center">Total</td>
                        <td>500</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="panel-footer">&nbsp;</div>
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