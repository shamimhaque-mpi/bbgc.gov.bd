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

<div class="container-fluid" ng-controller="allSubjectCtrl">
    <div class="row">
    <?php echo $this->session->flashdata('confirmation');?>
        <div class="panel panel-default none">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Subjects</h1>
                </div>
            </div>

            <div class="panel-body"> 

                <form  class="form-horizontal" ng-submit="allsubjectFn()">
				
					<div class="form-group">
                        <label class="col-md-2 control-label">Class</label>
                        <div class="col-md-5">
                            <select  ng-model="search.class" class="form-control">
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
					
					<div class="form-group ">
                        <label class="col-md-2 control-label">Group <span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <select ng-model="search.group" class="form-control">
                                <option value="">-- Select Group --</option>
                                <?php 
                                    foreach(config_item('group') as $key => $value){?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php
                                    }
                                ?>                                        
                            </select>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="col-md-2 control-label">Subject Type <span class="req">&nbsp;</label>
                        <div class="col-md-5">
                           <select ng-model="search.subject_type" class="form-control">
                               <option value="">-- Select Type --</option>
                               <option value="compulsory">Compulsory</option>
                               <option value="optional">Optional</option>
                           </select>
                        </div>
                    </div>

                    <div class="col-md-7">
						<div class="btn-group pull-right">
							<input type="submit" value="Show" name="viewQuery" class="btn btn-primary">
						</div>
                    </div>

                </form>

            </div>
            <div class="panel-footer">&nbsp;</div>

        </div>

        <div class="panel panel-default" ng-hide="active" ng-init="active=true">

            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Show Result</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">  

            <input type="text" ng-model="searchText" placeholder="Search Here..." style="width:300px;" class="form-control none"> <hr class="none" />       
          

                <img class="hide" style="width: 100%; margin-bottom: 10px;" src="<?php echo site_url('public/banner/banner.png') ?>">
                <span class="hide print-time text-center">সকল বিষয়</span>


                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <th>Sl</th>
                                <th style="cursor:pointer;" ng-click="sortField='subject_name'; reverse = !reverse;">Subject Name<span class="pull-right"><i class="fa fa-sort" aria-hidden="true"></i></span></th>
                                <th>Paper</th>
                                <th>Subject Code</th>
                                <th>Subject Type</th>
                                <th>Group</th>
                                <th style="cursor:pointer;" ng-click="sortField='written'; reverse = !reverse;">Written<span class="pull-right"><i class="fa fa-sort" aria-hidden="true"></i></span></th>
                                <th style="cursor:pointer;" ng-click="sortField='objective'; reverse = !reverse;">Objective<span class="pull-right"><i class="fa fa-sort" aria-hidden="true"></i></span></th>
                                <th style="cursor:pointer;" ng-click="sortField='practical'; reverse = !reverse;">Practical<span class="pull-right"><i class="fa fa-sort" aria-hidden="true"></i></span></th>
                                <th class="none">Action</th>
                            </tr>
                            
                            <tr ng-repeat="subject in allSubjects|filter:searchText|orderBy:sortField:reverse">
                                <td>{{($index+1)}}</td>
                                <td>{{subject.subject_name}}</td>
                                <td>{{subject.paper}}</td>
                                <td>{{subject.subject_code}}</td>
                                <td>{{subject.subject_type}}</td>
                                <td>{{subject.group}}</td>
                                <td>{{subject.written}}</td>
                                <td>{{subject.objective}}</td>
                                <td>{{subject.practical}}</td>
                                <td class="none" style="width: 150px;">
                                    <a class="btn btn-warning" href="<?php echo base_url('subject/subject/editSubject')?>/{{subject.id}}">Edit</a>
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this Data');" href="<?php echo base_url('subject/subject/deleteSubject')?>/{{subject.id}}">Delete</a>
                                </td>
                            </tr>
                            

                        </table>
                    </div>
                </div>

            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

