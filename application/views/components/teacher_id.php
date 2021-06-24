<style>
@import url('https://fonts.maateen.me/bangla/font.css');
.bg-1 {
    z-index: 0;
    position: absolute;
    background: #3498db !important;
    right: 0px;
    left: 0px;
    top: 0px;
    height: 118px;
    border-bottom: 5px solid #e4edff;
}
.bg-2 {
    position: absolute;
    z-index: 0;
    background: #3498db !important;
    right: 0px;
    left: 0px;
    bottom: 0;
    height: 38px;
}
body {
    font-family: 'Bangla', sans-serif;
}
.m-0 {
    margin: 0 !important;
    line-height: 16px !important;
    text-align: center;
}
img {
    width: 100%;
}
@media print{
	aside, nav, .panel-heading, .panel-footer, .none{
		display: none !important;
	}
	.panel{
		border: 1px solid transparent;
		width: 100%;
		left: 0px;
            position: absolute;
            top: 30px;
            width: 100%;
	}
    	.hide{
    		display: block !important;
	}
	.panel-body{
    		padding-top: 0;
	}

}
.__main_id {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    align-items: center;
}
.newH{
    max-width: 408px;
    min-width: 408px;
    width: 408px;
    margin-bottom: 10px;
    margin-right: 15px;
}
.latest-id-cover {
    position: relative;
    border: 1px solid #ddd;
    
    padding: 5px;
    max-height: 322px;
    min-height: 322px;
    height: 322px;
}
.front_part {
    width: 50%;
    float: left;
}
.back_part {
    width: 50%;
    float: left;
}
.latest-id-header{
    display: flex;
    justify-content: space-evenly;
}
.__std_img {
	width: 100px;
    height: 105px;
    border-radius: 50%;
    border: 5px solid #e4edff;
    background: #ddd;
}

.latest-id-img {
    margin-top: 5px;
    display: flex;
    justify-content: center;
}
.latest-id-name {
	padding: 5px 5px 7px;
    text-align: center;
    text-transform: uppercase;
    margin: 0 3px;
    font-size: 13px;
    font-weight: 700;
    color: #3498db !important;
}
.__principal_signature {
    position: absolute;
    bottom: 2px;
    right: 5px;
}
.__principal_signature img {
    width: 63px;
}
table tr td, table tr th {
    padding: 0px 5px 0px 2px;
    font-size: 12px !important;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default none">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Teacher ID Card</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php $attr = array('class' => 'form-horizontal');
                echo form_open('', $attr); ?>

                <!--<div class="form-group">
                    <label class="col-md-2 control-label">Year/Session<span class="req">*</span></label>
                    <div class="col-md-5">
                        <select name="search[session]" class="form-control" required>
                           <option value="">--Select--</option>
                            <?php foreach ($session_list as $key => $val) { if($val->session != NULL) { ?>
                                <option value="<?php echo $val->session; ?>"><?php echo $val->session; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Class <span class="req">*</span></label>
                    <div class="col-md-5">
                        <select name="search[class]" class="form-control" required>
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
                    <label class="col-md-2 control-label">Section</label>
                    <div class="col-md-5">
                        <select name="search[section]" class="form-control">
                            <option value="">-- Select --</option>
                            <?php
                                foreach(config_item('section') as $key => $value){?>
                                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
-->
                <div class="form-group">
                    <label class="col-md-2 control-label">ID Card No</label>
                    <div class="col-md-5">
                        <input type="text" name="id" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-7">
                        <div class="btn-group pull-right">
                            <input type="submit" value="Show" name="show" class="btn btn-primary">
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
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
                <div class="__main_id">
                    <?php if(!empty($employee)){ foreach($employee as $key=>$value ){ ?>
                    <?php
                        $img_url=$emp_name=$mobile=$status=null;
                        if ($value->employee_type=="teacher"){
                            $img_url=$value->image;
                            $emp_name=$value->name;
                        }
                        elseif($value->employee_type=="staff"){
                            $img_url=$value->employee_photo;
                            $emp_name=$value->employee_name;
                        }
                        if ($value->employee_status==1) {
                            $status="Available";
                        }
                        elseif ($value->employee_status==0) {
                            $status="Not Available";
                        }
                    ?>
    				<div class="newH">
        				<div class="front_part">
        					<div class="latest-id-cover" style="background: #4ec34605;">
        						<div class="row">
        						    <div class="col-xs-12 bg-1">
        						        &nbsp;
        						    </div>
        						    <div class="col-xs-12 bg-2">
        						        <div style="padding-top: 9px;padding-left: 22px;color:#fff !important">
        						            Principal&nbsp;:&nbsp;<img src="<?php echo site_url("public/img/hs.jpg"); ?>" style="width: 60px;">
        						        </div>
        						    </div>
        						    <div class="col-xs-12">
        						        <div class="latest-id-header">
                							<img style="height: 50px; width: 50px; " src="<?php echo base_url('public/logo.png');?>" class="img-responsive">
                							<div>
                							    <h4 class="m-0" style="font-weight: 700; color: #fff !important;">বঙ্গবন্ধু সরকারি কলেজ</h4>
                							    <p class="m-0" style="color: #fff !important">তারাকান্দা, ময়মনসিংহ</p>
                							    <p class="m-0" style="color: #fff !important">স্থাপিতঃ ১৯৭৩ইং</p>
                							</div>
                						</div>
        						    </div>
        						
            						<div class="col-xs-12">
                						<div class="latest-id-main">
                    						<div class="latest-id-img">
                    							<img class="__std_img" src="<?php echo site_url($img_url); ?>" class="img-responsive">
                    						</div>
                						</div>
                					</div>
                					<div class="col-xs-12">
                						<div class="latest-id-name">
                							<?php echo $emp_name; ?>
                						</div>
            						</div>
            						<div class="col-xs-12">
                						<table style="width:100%">
                						    <tr>
                						        <th class="text-right">Index No</th>
                						        <th>:</th>
                						        <td><?php echo $value->employee_emp_id; ?></td>
                						    </tr>
                						    <tr>
                						        <th class="text-right">Designation</th>
                						        <th>:</th>
                						        <td><?php echo ucwords($value->employee_designation); ?></td>
                						    </tr>
                						    <tr>
                						        <th class="text-right">Mobile</th>
                						        <th>:</th>
                						        <td><?php echo $value->mobile; ?></td>
                						    </tr>
                						    <tr>
                						        <th class="text-right">Joining Date</th>
                						        <th>:</th>
                						        <td><?php echo $value->employee_joining; ?></td>
                						    </tr>
                						    <tr>
                						        <th class="text-right">Validity</th>
                						        <th>:</th>
                						        <td><?php echo $value->validity_date; ?></td>
                						    </tr>
                						</table>
            						</div>
            						<!--<div class="__principal_signature">
                						<img src="<?php echo site_url("public/img/hs.jpg"); ?>" class="img-responsive">
                						<b>Principal</b>
            						</div>-->
                                </div>
        					</div>
    					</div>
    					<div class="back_part">
        					<div class="latest-id-cover" style="background: #4ec34605;">
        					    <div style="display: flex; justify-content: center; margin-top: 30px;">
        					        <img style="height: 90px; width: 90px; " src="<?php echo base_url('public/logo.png');?>" class="img-responsive">
        					    </div>
        					    <div class="text-center">
        					        <h2 style="font-weight: 700; color: #3498db !important; margin: 0; font-size: 23px;">বঙ্গবন্ধু সরকারি কলেজ</h2>
        					        <p style="margin-bottom: 2px; font-size: 16px;">তারাকান্দা, ময়মনসিংহ</p>
        					        <p style="margin-bottom: 2px; font-size: 14px;">ওয়েবসাইটঃ www.bbgc.gov.bd</p>
        					        <p style="margin-bottom: 2px; font-size: 10px;">bangabandhucollege1973@gmail.com</p>
        					        <p style="margin-bottom: 2px; font-size: 16px;">মোবাইলঃ ০১৭২৪৮৩৫৪৬৪ (অধ্যক্ষ)</p>
        					        <p style="margin-bottom: 2px; font-size: 16px; text-align: right;">০১৭২৭৬৭৩৩০৬ (উপাধ্যক্ষ)</p>
        					    </div>
        					</div>
        				</div>
                    </div>
                    <?php }} ?>
    				
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
