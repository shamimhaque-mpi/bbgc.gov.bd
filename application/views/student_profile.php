<style>
	@media print{
		aside, .footer-wrapper{
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

		.table tr th, .table tr td {
			padding: 4px !important;
		}
		.table {
			margin-bottom: 10px !important;
		}
	}
</style>



<div class="container-fluid">
    <div class="row">
<?php //echo "<pre>"; print_r($student); echo "</pre>";?>
        <div class="panel panel-default">
            <div class="panel-heading" style="height: 56px;">
                <div class="panal-header-title">
                    <h3 style="margin-top: 8px;" class="pull-left">শিক্ষার্থীর তথ্য</h3>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">

                <div class="row hide">
                    <div class="col-md-12">
                        <img class="img-responsive" src="http://bbgc.gov.bd/public/banner/banner.jpg" alt="Uploaded banner not found!">
                    </div>
                </div>

                <hr class="hide" style="border-bottom: 1px solid #ccc; margin: 10px 0">

                <h3 class="hide text-center" style="margin: 0 0 20px 0;">শিক্ষার্থীর তথ্য</h3>
			    <table class="table table-bordered">
                    <tr>
                        <th width="300">ছাত্র/ছাত্রীর আইডি</th>
                        <td><?php echo (isset($student[0]->reg_id) ? $student[0]->reg_id : ''); ?></td>
                        <th width="300">নাম</th>
                        <td><?php echo (isset($student[0]->name) ? $student[0]->name : ''); ?></td>
                        <td rowspan="4" width="125"><img class="img-responsive" src="<?php echo site_url($student[0]->photo);?>" alt="student photo"></td>
                    </tr>
                    <tr>
                        <th>পিতার নাম</th>
                        <td><?php echo (isset($student[0]->father_name) ? $student[0]->father_name : ''); ?></td>
                        <th>মাতার নাম</th>
                        <td><?php echo (isset($student[0]->mother_name) ? $student[0]->mother_name : ''); ?></td>
                    </tr>
                    <tr>
                        <th>পিতার পেশা</th>
                        <td><?php echo (isset($student[0]->father_profession) ? $student[0]->father_profession : ''); ?></td>
                        <th>মাতার পেশা </th>
                        <td><?php echo (isset($student[0]->mother_profession) ? $student[0]->mother_profession : ''); ?></td>
                    </tr>
                     <tr>
                        <th> শিক্ষার্থীর মোবাইল নম্বর  </th>
                        <td><?php echo (isset($student[0]->student_mobile) ? $student[0]->student_mobile : ''); ?></td>
                        <th> অভিভাবকের মোবাইল নম্বরল   </th>
                        <td><?php echo (isset($student[0]->guardian_mobile) ? $student[0]->guardian_mobile : ''); ?></td>
                    </tr>
                    
                </table>
                
                <table class="table table-bordered">
                    <tr>
                        <th width="300"> জন্ম তারিখ</th>
                        <td><?php echo (isset($student[0]->birth_date) ? $student[0]->birth_date : ''); ?></td>
                        <th width="300">ধর্ম</th>
                        <td><?php echo (isset($student[0]->religion) ? $student[0]->religion : ''); ?></td>
                    </tr>
                    <tr>
                        <th>জেন্ডার</th>
                        <td><?php echo (isset($student[0]->father_name) ? $student[0]->gender : ''); ?></td>
                        <th>ক্লাস</th>
                        <td><?php echo (isset($student[0]->class) ? $student[0]->class : ''); ?></td>
                    </tr>
                    <tr>
                        <th>বর্তমান ঠিকানা</th>
                        <td><?php echo (isset($student[0]->present_address) ? $student[0]->present_address : ''); ?></td>
                        <th>স্থায়ী ঠিকানা </th>
                        <td><?php echo (isset($student[0]->permanent_address) ? $student[0]->permanent_address : ''); ?></td>
                    </tr>
                     <tr>
                        <th> সেকশন  </th>
                        <td><?php echo (isset($student[0]->section) ? $student[0]->section : ''); ?></td>
                        <th> গ্রুপ  </th>
                        <td><?php echo (isset($student[0]->group) ? $student[0]->group : ''); ?></td>
                    </tr>
                    
                    <?php 
                        $where = array(
                            "student_id" => $student[0]->reg_id
                        );
                        $ad_info = $this->action->read("admission",$where);
                    
                    ?>
                    
                    <tr>
                        <th> সেশন  </th>
                        <td><?php echo (isset($student[0]->session) ? $student[0]->session : ''); ?></td>
                        <th> অপশনাল সাবজেক্ট  </th>
                        <td>
                            <?php
                            $where = array('student_id' => $student[0]->reg_id);
                            $info = $this->action->read('admission', $where);
                            echo $info[0]->optional; 
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th> বিষয় কোড  </th>
                        <td colspan="3" ><?php echo (isset($ad_info[0]->subjects) ? $ad_info[0]->subjects : ''); ?></td>
                    </tr>
                </table>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
