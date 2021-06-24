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
	                			<img class="img-responsive" src="<?php echo site_url('public/logo/logo.png'); ?>" style="width: 100px; height: 100px;" alt="">
	                		</figure>
	                	</div>

	                	<div class="col-xs-8">
							<div class="institute">
								<h2 class="text-center title" style="margin-top: 10; font-weight: bold;">বঙ্গবন্ধু সরকারি কলেজ</h2>
                                <h3 class="text-center" style="margin: 0;">তারাকান্দা, ময়মনসিংহ</h3>
							</div>
						</div>
                	</div>
                </div>

                <hr style="border-bottom: 1px solid #ccc;">



            	<div class="row">
                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Exam Name</label>
                        <div class="col-xs-6">
                            <p><?php echo $info[0]->title; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Exam Start At</label>
                        <div class="col-xs-6">
                            <p><?php echo $info[0]->date; ?></p>
                        </div>
                    </div>                    

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Class</label>
                        <div class="col-xs-6">
                            <p><?php echo $info[0]->class; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Exam ID</label>
                        <div class="col-xs-6">
                            <p><?php echo $info[0]->exam_id; ?></p>
                        </div>
                    </div>
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Subject Name</th>
                        <th>Objective</th>
                        <th>OPM</th>
                        <th>Written</th>
                        <th>WPM</th>
                        <th>Practical</th>
                        <th>PPM</th>
                        <th>Total</th>
                    </tr>
                    <!--pre><?php print_r($info);?></pre-->

                    <?php foreach($info as $key => $row){ ?>
                    <tr>
                        <td><?php echo ($key+1); ?></td>
                        <td><?php echo $row->subject; ?></td>
                        <td><?php echo $row->objective; ?></td>
                        <td><?php echo $row->objective_pass_mark;?></td>
                        <td><?php echo $row->written; ?></td>
                        <td><?php echo $row->written_pass_mark;?></td>
                        <td><?php echo $row->practical; ?></td>
                        <td><?php echo $row->practical_pass_mark;?></td>
                        <td><?php echo ($row->objective + $row->written + $row->practical); ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>


