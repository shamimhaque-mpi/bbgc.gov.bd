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
	        .hide{
	            display: block !important;
	        }
	        .form-control{
	            border: none;
	        }
	}
</style>

<div class="container-fluid" ng-controller="ShowAllAdmissionStudentCtrl">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation');?>

        <div class="panel panel-default none">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>সকল শিক্ষার্থী</h1>
                </div>
            </div>

            <div class="panel-body">
                <form ng-submit="getAllStudentsFn()"  class="form-horizontal">
                
                     <div class="form-group">
                        <label class="col-md-2 control-label">শিক্ষাবর্ষ <span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <select ng-model="search.session" class="form-control">
                               <option value="">-- Select Session --</option>
                               <?php foreach ($session_list as $key => $value) { ?>
                               <option value="<?php echo $value->session; ?>"><?php echo $value->session; ?></option>
                               <?php } ?>
                           </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">ভর্তির বছর<span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <select ng-model="search.year" class="form-control">
                               <option value="">-- Select Year--</option>
                               <?php for($i=2010;$i<=date('Y')+1;$i++) { ?>
                               <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                               <?php } ?>
                           </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">পাশের বছর<span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <select ng-model="search.pass_year" class="form-control">
                               <option value="">-- Select Year--</option>
                                <?php for($i=2012; $i<=date("Y"); $i++){?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                           </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">শ্রেণী <span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <select ng-model="search.class" class="form-control">
                                <option value="">-- Select Class--</option>
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
                        <label class="col-md-2 control-label">শাখা<span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <select ng-model="search.section" class="form-control">
                               <option value="">-- Select Section--</option>
                               <?php foreach (config_item('section') as $key => $value) { ?>
                               <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                               <?php } ?>
                           </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">উপস্থিতি <span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <select ng-model="search.student_status" class="form-control">
                               <option value="">-- Select Section--</option>
                               <option value="active"> নিয়মিত </option>
                               <option value="deactivate"> অনিয়মিত </option>
                           </select>
                        </div>
                    </div>


                    <div class="col-md-7">
			<div class="btn-group pull-right">
				<input type="submit" value="দেখুন" class="btn btn-primary">
			</div>
                    </div>
                </form>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>






        <div ng-cloak class="panel panel-default"  ng-hide="active" ng-init="active=true">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">ফলাফল দেখুন<br>
                        <small>{{ allStudents.length }} Items Found</small>
                    </h1>
                     
                        
                    
                    
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> প্রিন্ট</a>
                </div>
            </div>

            <div class="panel-body">
                <img class="hide" style="width: 100%; margin-bottom: 10px;" src="<?php echo site_url('public/banner/banner.png') ?>">

				<div class="row none" style="margin-bottom:15px;">
				<div class="col-md-4">
				    <input type="text" ng-model="searchText" placeholder="অনুসন্ধান করুন...." class="form-control">
				</div>
				<div class="col-md-5">&nbsp;</div>
					<div class="col-md-3">
					   <div>
					        <span style="margin-left: 55px;line-height: 2.4;font-weight: bold;">প্রতি পেইজ&nbsp;:&nbsp;</span>
					        <select ng-model="perPage" class="form-control" style="width:92px;float:right;">
					           <option value="">All</option>
					           <option value="10">10</option>
					           <option value="20">20</option>
					           <option value="50">50</option>
					           <option value="100">100</option>
					           <option value="150">150</option>
					           <option value="200">200</option>
					           <option value="500">500</option>
					        </select>
					    </div>
					</div>
				</div>

                <h4 class="text-center hide" style="margin-top: 0px;">সকল শিক্ষার্থী</h4>

                <div class="row">
                    <div class="col-md-12">

                        <table class="table table-bordered">
                            <tr>
                                <!--<th width="45" style="cursor:pointer;" ng-click="sortField='sl'; reverse = !reverse;">#&nbsp;<span class="pull-right none"><i class="fa fa-sort" aria-hidden="true"></i></span></th> -->
								<th width="40px" style="cursor:pointer;" ng-click="sortField='student_id'; reverse = !reverse;">আইডি&nbsp;<span class="pull-right none"><i class="fa fa-sort" aria-hidden="true"></i></span></th>
                                <th>ছবি</th>
                                <th width="300" >নাম</th>
                                <th>মোবাইল</th>
				                <td width="200">ঠিকানা</td>
                                <th width="60">ক্লাস</th>
                                <th style="cursor:pointer; width: 50px;" ng-click="sortField='roll'; reverse = !reverse;">রোল &nbsp;<span class="pull-right"><i class="fa fa-sort" aria-hidden="true"></i></span></th>
                                <th width="70">সেকশন</th>
                                <th width="97"> অবস্থা </th>
                                <th class="none">একশান</th>
                            </tr>

                            <tr dir-paginate="row in allStudents|filter:searchText|itemsPerPage:perPage|orderBy:sortField:reverse">
                                <!-- <td>{{ row.sl }}</td> -->
                                <td>{{ row.reg_id }}</td>
                                <td width="60px" style="padding: 2px;">
                                	<img ng-src="<?php echo site_url('{{ row.photo }}'); ?>" width="60px" height="60px" alt="">
                                </td>
                                <td>
                                    নামঃ {{ row.name }} <br>
                                    পিতাঃ {{ row.father_name }} <br>
                                    মাতাঃ {{ row.mother_name }}
                                </td>
                                <td>{{ row.guardian_mobile }}</td>
                                <td style="white-space: pre-line;">
                                    {{ row.address }}
                                </td>
                                <td ng-if="row.class=='Eleven'">HSC 1st year</td>
                                <td ng-if="row.class=='Twelve'">HSC 2nd year</td>
                                <td ng-if="row.class!='Eleven'&&row.class!='Twelve'">{{ row.class }}</td>
                                <td>{{ row.roll }}</td>
                                <td>{{ row.section }}</td>
								<td>
                                    <select ng-model="s_status" ng-change="change_status(s_status, row.student_id)" class="form-control">
                               		<option ng-selected = "{{row.student_status == 'active'}}" value="active">আছে</option>
                               		<option ng-selected = "{{row.student_status == 'deactivate'}}" value="deactivate"> নাই</option>
                           	   </select>
                                </td>

                                <td class="none" style="width: 160px;">
                                    <a title="View" class="btn btn-primary" target="_blank" href="<?php echo site_url('registration/registration/profile/{{ row.id }}'); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a title="Edit" class="btn btn-warning" target="_blank" href="<?php echo site_url('admission/admission/editStudent?id={{ row.student_id }}'); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a title="Delete" class="btn btn-danger"  href="<?php echo site_url('admission/admission/delete?id={{ row.student_id }}'); ?>" onclick="return confirm('Are you sure want to delete this Student?');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        </table>
						<dir-pagination-controls max-size="perPage" direction-links="true" boundary-links="true" class="none"></dir-pagination-controls>
                    </div>
                </div>
             </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
