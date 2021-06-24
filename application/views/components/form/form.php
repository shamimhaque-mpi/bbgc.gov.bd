<div class="container-fluid">
    <div class="row">

        <!-- horizontal form -->
        <form action="" method="post" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">Horizontal Form Components</div>

                <div class="panel-body">
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Full name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="full name" id="name" required>
                        </div>
                    </div>

                    <div class="form-group required">
                        <label for="email-address" class="col-md-3 control-label">
                            Email address
                        </label>

                        <div class="col-md-9">
                            <input type="email" class="form-control" placeholder="email" id="email-address" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Select File</label>

                        <div class="col-md-9">
                            <input id="input-test" type="file" class="form-control file" data-show-preview="false">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-3 control-label">Select Single File</label>

                        <div class="col-md-9">
                            <input id="input-single" name="input_single" type="file" class="form-control file" data-show-upload="true">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-3 control-label">Select Multiple File</label>

                        <div class="col-md-9">
                            <input id="input" name="input[]" type="file" class="form-control file" multiple data-show-upload="false">
                        </div>
                    </div>  

                    <div class="form-group">
                        <label for="address" class="col-md-3 control-label">Address</label>

                        <div class="col-md-9">
                            <textarea class="form-control" placeholder="type address" id="address"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Date and Time</label>

                        <div class="input-group date col-md-9" id="datetimepicker1">
                            <input type="text" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">&nbsp;</label>
                        
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group date" id="datetimepickerFrom">
                                        <input type="text" class="form-control" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group date" id="datetimepickerTo">
                                        <input type="text" class="form-control" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    

                </div>

                <div class="panel-footer">
                    <div class="btn-group pull-right">
                        <input type="submit" value="Save" class="btn btn-primary">
                        <input type="reset" value="Clear All" class="btn btn-danger">
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>