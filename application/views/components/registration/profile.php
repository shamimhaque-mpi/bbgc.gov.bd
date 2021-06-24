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

<?php 
    $where = array(
        "student_id" => $student[0]->reg_id
    );
    $ad_info = $this->action->read("admission",$where);

?>

<div class="container-fluid">
    <div class="row">
<?php // echo "<pre>"; print_r($student); echo "</pre>";?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">শিক্ষার্থীর তথ্য</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> প্রিন্ট</a>
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
                                <?php $header_info = config_item("header");?>
								<h2 class="text-center title" style="margin-top: 10; font-weight: bold;"><?php echo $header_info['title']; ?></h2>
                                <h3 class="text-center" style="margin: 0;"><?php echo $header_info['place']; ?></h3>
							</div>
						</div>

						<div class="col-xs-2">
                			<figure class="pull-right">
                				<img src="<?php echo site_url($student[0]->photo);?>" class="img-responsive" src="" style="width: 100px; height: 100px;" alt="Photo not found!" style="outline:none;text-decoration:none;display:block;border:none;-webkit-border:0;" border="0" class="img-responsive">
                			</figure>
	                	</div>
                	</div>
                </div>

                <hr style="border-bottom: 1px solid #ccc;">
                <h4 class="hide text-center" style="margin: 0 0 20px 0;">শিক্ষার্থীর তথ্য</h4>


                <div class="row">
                    <div class="col-xs-6 no-padding">
                        <label class="control-label col-xs-6">Student ID</label>
                        <div class="col-xs-6">
                            <p><?php echo ($student) ? $student[0]->reg_id : "";?></p>
                        </div>
                    </div>
                    <div class="col-xs-6 no-padding">
                        <label class="control-label col-xs-6">শিক্ষার্থী নাম</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->name;?></p>
                        </div>
                    </div>



                    <div class="col-xs-6 no-padding">
                        <label class="control-label col-xs-6">পিতার নাম</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->father_name;?></p>
                        </div>
                    </div>

                    <div class="col-xs-6 no-padding">
                        <label class="control-label col-xs-6">মাতার নাম</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->mother_name;?></p>
                        </div>
                    </div>

                    <div class="col-xs-6 no-padding">
                        <label class="control-label col-xs-6">পিতার পেশা</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->father_profession;?></p>
                        </div>
                    </div>

					<div class="col-xs-6 no-padding">
                        <label class="control-label col-xs-6">মাতার পেশা </label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->mother_profession;?></p>
                        </div>
                    </div>

					<div class="col-xs-6 no-padding">
                        <label class="control-label col-xs-6">শিক্ষার্থীর মোবাইল নম্বর</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->student_mobile;?></p>
                        </div>
                    </div>

					<div class="col-xs-6 no-padding">
                        <label class="control-label col-xs-6">অভিভাবকের মোবাইল নম্বর</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->guardian_mobile;?></p>
                        </div>
                    </div>

		    <div class="col-xs-6 no-padding">
                        <label class="control-label col-xs-6">জন্ম তারিখ </label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->birth_date;?></p>
                        </div>
                    </div>

                    <div class="col-xs-6 no-padding">
                        <label class="control-label col-xs-6">ধর্ম</label>
                        <div class="col-xs-6">
                            <p><?php echo ucwords($student[0]->religion);?></p>
                        </div>
                    </div>

                    <div class="col-xs-6 no-padding">
                        <label class="control-label col-xs-6">জেন্ডার</label>
                        <div class="col-xs-6">
                            <p><?php echo ucwords($student[0]->gender);?></p>
                        </div>
                    </div>

                    <div class="col-xs-6 no-padding">
                        <label class="control-label col-xs-6">বর্তমান ঠিকানা</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->present_address;?></p>
                        </div>
                    </div>

		    <div class="col-xs-6 no-padding">
                        <label class="control-label col-xs-6">স্থায়ী ঠিকানা </label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->permanent_address;?></p>
                        </div>
                    </div>

					<div class="col-xs-6 no-padding">
                        <label class="control-label col-xs-6">ক্লাস </label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->class;?></p>
                        </div>
                    </div>


		    <div class="col-xs-6 no-padding">
                        <label class="control-label col-xs-6">সেকশন</label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->section;?></p>
                        </div>
                    </div>

					<div class="col-xs-6 no-padding">
                        <label class="control-label col-xs-6">গ্রুপ </label>
                        <div class="col-xs-6">
                            <p><?php echo filter($student[0]->group);?></p>
                        </div>
                    </div>

                    <div class="col-xs-6 no-padding">
                        <label class="control-label col-xs-6">সেশন </label>
                        <div class="col-xs-6">
                            <p><?php echo $student[0]->session;?></p>
                        </div>
                    </div>

                    <div class="col-xs-12 no-padding">
                        <label class="control-label col-xs-3">বিষয় কোড </label>
                        <div class="col-xs-9">
                            <p><?php echo $ad_info[0]->subjects;?></p>
                        </div>
                    </div>

                    <div class="col-xs-6 no-padding">
                        <label class="control-label col-xs-6">Password </label>
                        <div class="col-xs-6">
                            <p>
                            <?php
                            $where = array('student_id' => $student[0]->reg_id);
                            $info = $this->action->read('admission', $where);
                            echo $info[0]->password;
                            ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-xs-6 no-padding">
                        <label class="control-label col-xs-6">অপশনাল সাবজেক্ট</label>
                        <div class="col-xs-6">
                            <p>
                            <?php
                            $where = array('student_id' => $student[0]->reg_id);
                            $info = $this->action->read('admission', $where);
                            echo $info[0]->optional;
                            ?>
                            </p>
                        </div>
                    </div>

                </div>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
