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
            width: 100%;
            top: 0;
            left: 0;
            position: absolute;
        }
        .none{
            display: none;
        }
        .panel-heading{
            display: none;
        }
        .panel-footer{
            display: none;
        }
        .hide{
            display: block !important;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default none">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Show Leave List</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>Search Bank Transaction</h4>

                    <ol style="font-size: 14px;">
                        <li>1. Show individual <mark>Employee</mark> Leave List</li>
                        <li>2. Click the <mark>Show</mark> button to show data</li>
                    </ol>

                </blockquote>

                <hr-->

                <!-- horizontal form -->

                <form action="" class="form-horizontal">

                    <div class="form-group">
                        <label class="col-md-2 control-label">Employee Name <span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="employee_name" class="form-control" required>
                                <option value="">-- Select Employee Name --</option>
                                <option value="1">abc 1</option>
                                <option value="2">abc 2</option>
                                <option value="3">abc 3</option>
                                <option value="4">abc 4</option>
                                <option value="5">abc 5</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-7">
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
                    <h1 class="pull-left">Show Result</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">
                
                <h3 class="hide text-center" style="margin-top: 0;">Leave List</h3>

                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Day</th>
                        <th>Cause</th>
                        <th class="none">Action</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>2016-07-17</td>
                        <td>2016-07-19</td>
                        <td>1</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam quidem ipsam dolorum. Eaque dolorum, exercitationem, unde consectetur minima quasi tempore adipisci mollitia similique neque, odit rem illo voluptatibus esse sed!</td>
                        <td class="none"><a class="btn btn-danger" href="#">Delete</a></td>
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

