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

<div class="container-fluid" ng-controller="ShowAllStudentCtrl">
    <div class="row">
    <?php echo $this->session->flashdata('confirmation');?>   

        <div class="panel panel-default none">

                <div class="panel-heading panal-header">
                    <div class="panal-header-title pull-left">
                        <h1>All Student</h1>
                    </div>
                </div>

                <div class="panel-body">
                    <form ng-submit="getAllStudentsFn()"  class="form-horizontal">
                       
                        <div class="form-group">
                            <label class="col-md-2 control-label">Session</label>
                            <div class="col-md-5">
                                <select name="session" ng-model="session" class="form-control">
                                   <option value="">-- Select Session --</option>
                                   <?php foreach ($sessions as $key => $value) { ?>
                                   <option value="<?php echo $value->session; ?>"><?php echo $value->session; ?></option>
                                   <?php } ?>
                               </select>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-md-2 control-label">Class <span class="req">&nbsp;</span></label>
                            <div class="col-md-5">
                                <select name="class" ng-model="class" class="form-control">
                                    <option value="">-- Select Class--</option>
                                    <?php foreach(config_item('classes') as $key => $value){ ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                             <div class="form-group">
                            <label class="col-md-2 control-label">Section<span class="req">&nbsp;</span></label>
                            <div class="col-md-5">
                                <select name="section" ng-model="section" class="form-control">
                                    <option value="">-- Select Section--</option>
                                    <?php foreach(config_item('section') as $key => $value){ ?>
                                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <label class="col-md-2 control-label">Group</label>
                            <div class="col-md-5">
                                <select name="group" ng-model="group" class="form-control">
                                    <option value="">-- Select Group --</option>
                                    <?php foreach(config_item('group') as $key => $value){ ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php } ?>
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



            <div ng-cloak class="panel panel-default"  ng-hide="active" ng-init="active=true">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">All Students</h1>
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
                                <h2 class="text-center title" style="margin-top: 10; font-weight: bold;"><?php echo $site_name; ?></h2>
                            </div>
                        </div>                            
                     </div>

                </div>

                <hr style="border-bottom: 1px solid #ccc;">                   
                   <input type="text" ng-model="searchText" placeholder="Search Here.." class="form-control none" style="width: 250px !important;">
                <hr style="border-bottom: 1px solid #ccc;" class="none">

                <h3 class="text-center hide">All Student</h3>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <th style="cursor:pointer;" ng-click="sortField='id'; reverse = !reverse;">Sl<span class="pull-right"><i class="fa fa-sort" aria-hidden="true"></i></span></th> 
                                <th style="cursor:pointer;" ng-click="sortField='session'; reverse = !reverse;">Session <span class="pull-right"><i class="fa fa-sort" aria-hidden="true"></i></span></th>
                                <th>Photo</th>
                                <th style="cursor:pointer;" ng-click="sortField='first_name'; reverse = !reverse;">Student's Name <span class="pull-right"><i class="fa fa-sort" aria-hidden="true"></i></span></th>
                                <th style="cursor:pointer;" ng-click="sortField='group'; reverse = !reverse;">Group <span class="pull-right"><i class="fa fa-sort" aria-hidden="true"></i></span></th>
                                <th style="cursor:pointer;" ng-click="sortField='gender'; reverse = !reverse;">Gender <span class="pull-right"><i class="fa fa-sort" aria-hidden="true"></i></span></th>
                                <th style="cursor:pointer;" ng-click="sortField='class'; reverse = !reverse;">Class <span class="pull-right"><i class="fa fa-sort" aria-hidden="true"></i></span></th>
                                <th class="none">Action</th>
                            </tr>
                            
                            <tr ng-repeat="student in allStudents | filter:searchText | orderBy:sortField:reverse">
                                <td>{{$index+1}}</td>
                                <td>{{student.session}}</td>
                                <td><img ng-src="<?php echo site_url('public/students');?>/{{student.photo}}" width="50px" height="50px" alt=""></td>
                                <td>{{student.name}}</td>
                                <td>{{student.group}}</td>                              
                                <td>{{student.gender}}</td>                              
                                <td>{{student.class}}</td>
                                <td class="none" style="width: 316px;">
                                    <a class="btn btn-primary" href="<?php echo base_url('registration/registration/profile')?>/{{student.id}}">View</a>
                                    <a class="btn btn-warning" href="<?php echo base_url('registration/registration/editStudent')?>/{{student.id}}">Edit</a>
                                     <a target="_blank" class="btn btn-info" href="<?php echo base_url('admission/admission?id={{student.id}}');  ?>">Admission</a>
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this Data?');" href="<?php echo base_url('registration/registration/deleteStudent')?>/{{student.id}}">Delete</a>
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

