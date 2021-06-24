<style>
    /* texteditor style */
#mceu_22{
    border: 1px solid #eee !important;
}
</style>

<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Assign Live</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>Search Bank Transaction</h4>

                    <ol style="font-size: 14px;">
                        <li>1. Fill all the required <mark>*</mark> fields</li>
                        <li>2. Click the <mark>Save</mark> button to save data</li>
                    </ol>

                </blockquote>

                <hr-->


                <!-- horizontal form -->
                    

                    <form action="" >
                    
                    

                        <div class="form-group row">
                            <label class="control-label col-md-2">Employee Name <span class="req">*</span></label>
                            
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

                        <div class="form-group row">
                            <label class="control-label col-md-2">Date From <span class="req">*</span></label>
                            
                           <div class="col-md-5">
                            <div class="input-group date" id="datetimepickerSMSFrom">
                                
                                <input type="text" name="date_from" class="form-control" placeholder="YYYY-MM-DD">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-2">Date to <span class="req">*</span></label>
                            
                            <div class="col-md-5">
                            <div class="input-group date" id="datetimepickerSMSTo">
                                <input type="text" name="date_to" class="form-control" placeholder="YYYY-MM-DD">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label class="control-label">Cause of Leave <span class="req">*</span></label>
                            <textarea name="cause" id="tinyTextarea" class="form-control" cols="30" rows="15"></textarea>
                        </div>

                        <div class="btn-group pull-right">
                            <input type="submit" value="Save" class="btn btn-primary">
                        </div>

                    </form>

                

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

