<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add Income</h1>
                </div>
            </div>

            <div class="panel-body">

                <blockquote class="form-head">

                    <!--h4>Official Cost</h4-->

                    <ol style="font-size: 14px;">
                        <li>1. Fill all the required <mark>*</mark> fields</li>
                        <li>2. Click the <mark>Save</mark> button to Save data</li>
                    </ol>

                </blockquote>

                <hr>


                <!-- horizontal form -->
                

                <form action="" class="form-horizontal">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Date <span class="req">*</span></label>
                        
                        <div class="input-group date col-md-9" id="datetimepicker1">
                            <input type="text" name="date" placeholder="YYYY-MM-YY" class="form-control" required>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Income Purpose <span class="req">*</span></label>
                        
                        <div class="col-md-9">
                            <select name="income_purpose" class="form-control" required>
                                <option value="">---Select One---</option>
                                <option value="residence">Residence</option>
                                <option value="coaching">Coaching</option>
                                <option value="loan">Loan</option>
                                <option value="exam">Exam</option>
                                <option value="admission">Admission</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Amount <span class="req">*</span></label>
                        
                        <div class="col-md-9">
                            <input type="text" name="amount" placeholder="BDT" class="form-control" required>
                        </div>
                    </div>                    

                    <div class="form-group">
                        <label class="col-md-3 control-label">Cashed by <span class="req">*</span></label>
                        
                        <div class="col-md-9">
                            <input type="text" name="cashed_by " placeholder="Maximum 100 Digit" class="form-control" required>
                        </div>
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

