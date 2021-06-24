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
		
		.panel-footer{
			display: none;
		}
		.panel .hide{
			display: block !important;
		}
		.title{
			font-size: 25px;
		}
	}
</style>



<div class="container-fluid">
    <div class="row">
<?php //echo "<pre>"; print_r($student_info); echo "</pre>";?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Details</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">

                <div class="row">

	                <div class="view-profile">
	                	<div class="col-xs-2">
	                		<figure class="pull-left">
	                			<img class="img-responsive" src="<?php echo site_url('private/images/logo.jpg'); ?>" style="width: 100px; height: 100px;" alt="">
	                		</figure>
	                	</div>

	                	<div class="col-xs-8">
							<div class="institute">
								<h2 class="text-center title" style="margin-top: 10; font-weight: bold;">Border Guard Public School and College</h2>
                                <h3 class="text-center" style="margin: 0;">MYMENSINGH</h3>
							</div>
						</div>

                	</div>

                </div>

                <hr style="border-bottom: 1px solid #ccc;">



            	<div class="row">

                    <!--h3 class="hide text-center" style="margin: 0 0 20px 0;">Student's Information</h3-->
            
                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Exam Name</label>
                        <div class="col-xs-6">
                            <p>abx</p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Subject Name</label>
                        <div class="col-xs-6">
                            <p>asdf</p>
                        </div>
                    </div>                    

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Class</label>
                        <div class="col-xs-6">
                            <p>asdf</p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Year</label>
                        <div class="col-xs-6">
                            <p>2016-08-14</p>
                        </div>
                    </div>

                </div>

                <table class="table table-bordered">
                    <tr>
                        <th>Roll</th>
                        <th>Name</th>
                        <th>Objective</th>
                        <th>Written</th>
                        <th>Practical</th>
                        <th>Total</th>
                        <th>Grade Point</th>
                        <th>Letter Grade</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Imtiaz</td>
                        <td>20</td>
                        <td>40</td>
                        <td>0</td>
                        <td>60</td>
                        <td>3.5</td>
                        <td>B</td>
                    </tr>
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>


