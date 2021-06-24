<style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer {
            display: none !important;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
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
                    <h1 class="pull-left">পেমেন্ট হিস্ট্রি </h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> প্রিন্ট</a>
                </div>
            </div>
            <!--pre><?php print_r($details);?></pre-->

            <div class="panel-body">

                <div class="row">
                    <div class="view-profile">
                        <div class="col-xs-2">
                            <figure class="pull-left">
                                <img class="img-responsive" src="<?php echo base_url($logo['logo']); ?>" style="width: 100px; height: 100px;" alt="">
                            </figure>
                        </div>
                        <div class="col-xs-8">
                            <div class="institute">
                                <h2 class="text-center title" style="margin-top: 10; font-weight: bold;"><?php echo $header_info['site_name']; ?></h2>
                                <h3 class="text-center" style="margin: 0;"><?php echo $header_info['place_name']; ?></h3>
                            </div>
                        </div>                            
                     </div>
                </div>

                <hr style="border-bottom: 2px solid #ccc; margin:5px 0 15px; ">
            	<div class="row">
            
            	<?php $info=$this->action->read('registration',array('reg_id'=>$details[0]->students_id)); ?>
           
            
                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">নাম</label>
                        <div class="col-xs-6">
                            <p><?php echo $info[0]->bg_student_name;?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">রোল</label>
                        <div class="col-xs-6">
                            <p><?php echo $info[0]->id;?></p>
                        </div>
                    </div>                    

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">সেশন</label>
                        <div class="col-xs-6">
                            <p><?php echo $info[0]->session;?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">ক্লাস</label>
                        <div class="col-xs-6">
                            <p><?php echo $info[0]->class;?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">বছর</label>
                        <div class="col-xs-6">
                            <p><?php if($details[0]->payment_year != NULL){ echo $details[0]->payment_year;}else{
                            	echo date("Y");
                            	}?></p>
                        </div>
                    </div>

                </div>

                <?php if($details != NULL){ ?>
				<table class="table table-bordered">
					<tr>
						<th style="width: 50px;">ক্র.নং</th>
						<th>তারিখ</th>
						<th>মাস</th>
						<th>টাকার পরিমাণ</th>

					</tr>
					<?php
					$final_total=0;
					$total=0;				
					 foreach ($details as $key => $value) { ?>

					 	<tr>
							<td><?php echo $key+1;?></td>
							<td><?php echo $value->payment_date;?></td>
							<td>
								<?php
								 foreach (config_item('months') as $k => $v) {
								 	if($k+1==$value->payment_month){
								 		echo $v;
								 	}
								 }
								?>
							</td>	
							<td>
                               <?php foreach ($value as $k => $v) {                                                          
                                  if (!in_array($k, $not_except) && $v != null) {
                                     $total+=$v;
                                      }
                                    }
                                    $total -= $value->current_due;
                                    $final_total += $total;
                                    echo $total; 
                                    $total=0;
                                 ?>
                              </td>						
					   </tr>
					<?php  }	?>	
					<tr>
					  <th colspan="3" style="text-align:right;">মোট</th>
					  <td><strong><?php echo $final_total;?></strong> Tk</td>
					 </tr>				
				</table>
				<?php } ?>
     
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>


