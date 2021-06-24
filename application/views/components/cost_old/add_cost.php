<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add Cost</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>Official Cost</h4>

                    <ol style="font-size: 14px;">
                        <li>1. Fill all the required <mark>*</mark> fields</li>
                        <li>2. Click the <mark>Save</mark> button to Save data</li>
                    </ol>

                </blockquote>

                <hr-->


                <!-- horizontal form -->
                

                <form action="" class="">

                    <div class="form-group row">
                        <label class="col-md-2 control-label">Date <span class="req">*</span></label>
                        
                        <div class="input-group date col-md-5" id="datetimepicker1">
                            <input type="text" name="date" placeholder="YYYY-MM-YY" class="form-control" required>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 control-label">Cost Purpose <span class="req">*</span></label>
                        
                        <div class="col-md-5">
                            <select name="cost_purpose" class="form-control" required>
                                <option value="">Select Cost Purpose</option>
                                <optgroup label="Residence">
                                    <option value="feed">Feed</option>
                                    <option value="maintenance">Maintenance</option>
                                    <option value="staff_salarry">Staff Salarry</option>
                                </optgroup>
                                <optgroup label="Non-Residence">
                                    <option value="class_payment">Class Payment</option>
                                    <option value="script">Script</option>
                                    <option value="question">Question</option>
                                    <option value="printing_cost">Printing Cost</option>
                                    <option value="photo">Photo</option>
                                    <option value="advertisement">Advertisement</option>
                                    <option value="news_add">News Add</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 control-label">Amount <span class="req">*</span></label>
                        
                        <div class="col-md-5">
                            <input type="text" name="amount" placeholder="BDT" class="form-control" required>
                        </div>
                    </div>                    

                    <div class="form-group row">
                        <label class="col-md-2 control-label">Spender <span class="req">*</span></label>
                        
                        <div class="col-md-5">
                            <input type="text" name="spender " placeholder="Maximum 100 Digit" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="btn-group pull-right">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                    </div>

                </form>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

