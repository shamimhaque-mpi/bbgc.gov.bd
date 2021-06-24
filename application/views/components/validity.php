<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default" ng-controller="studentValidity">
            
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Student Validity Date</h1>
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

			<!--	<div class="form-group">
                    <label class="col-md-3 control-label">Institute Type</label>
                    <div class="col-md-5">
                    	<select name="class" ng-model="studentClass" class="form-control" ng-change="getStudentFn()">
                            <option disabled>--select type--</option>
                            <option value="">Intermediate</option>
                            <option value="">Vocational</option>
                            <option value="">Degree</option>
                        </select>
                    </div>
                </div>-->


                <div class="form-group">
                    <label class="col-md-3 control-label">Year/Session<span class="req"></span></label>
                    <div class="col-md-5">
                        <select name="session" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" >
                           <option value="">--Select--</option>
                             <?php $session_list = $this->action->readDistinct("admission", "session"); ?>
                            <?php foreach ($session_list as $key => $val) { if($val->session != NULL) { ?>
                                <option value="<?php echo $val->session; ?>"><?php echo $val->session; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">Class <span class="req"></span></label>
                    <div class="col-md-5">
                        <select name="class" ng-model="studentClass"  ng-change="getStudentFn()"  class="selectpicker form-control" data-show-subtext="true" data-live-search="true"  >
                            <option value="">-- Select --</option>
                            <?php
                                foreach(config_item('classes') as $key => $value){?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php
                                }
                            ?>
                        </select>
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

               <!-- <div class="form-group">
                    <label class="col-md-3 control-label">Date</label>
                    
                    <div class="col-md-5">
                    	<input type="text" value="{{validity}}" name="validity" class="form-control">
                	</div>
                </div>-->
		                   
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