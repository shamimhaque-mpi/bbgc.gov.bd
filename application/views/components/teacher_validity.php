<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default" ng-controller="studentValidity">
            
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Teacher Validity Date</h1>
                </div>
            </div>

            <div class="panel-body" ng-cloak>
        		<?php
        		    echo $this->session->flashdata('confirmation');
	        		$attr=array(
						"class"=>"form-horizontal"
	        		);
	        		echo form_open_multipart('', $attr);
        		?>

                <div class="form-group">
                    <label class="col-md-3 control-label">Index No <span class="req"></span></label>
                    <div class="col-md-5">
                        <input type="text" name="index_no" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                        <label class="col-md-3 control-label">Date</label>
                        <div class="input-group date col-md-5" id="datetimepickerFrom">
                            <input type="text" value="{{validity}}" name="validity" class="form-control" >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                </div> 
		                   
                <div class="col-md-8">
                    <div class="btn-group pull-right">
                        <input type="submit" value="Save" name="save" class="btn btn-primary">
                    </div>
                </div>
            	<?php echo form_close(); ?>
			        
	        </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script>
     $('#datetimepickerFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>