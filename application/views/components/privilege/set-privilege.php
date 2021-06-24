<style>
    .deshitem {margin-bottom:15px !important;}
    .delete{color: red;}
    .view{color: green;}
    .edit{color: #EC971F;}

    .checkbox-inline,
    .checkbox label,
    .radio label{
        padding-left: 0;
        font-weight: bold;
    }

    .checkbox label:after,
    .radio label:after {
        content: '';
        display: table;
        clear: both;
    }

    .checkbox .cr,
    .radio .cr {
        position: relative;
        display: inline-block;
        border: 1px solid #a9a9a9;
        border-radius: .25em;
        width: 1.3em;
        height: 1.3em;
        float: left;
    }

    .radio .cr {
        border-radius: 50%;
    }

    .checkbox .cr .cr-icon,
    .radio .cr .cr-icon {
        position: absolute;
        font-size: .8em;
        line-height: 0;
        top: 50%;
        left: 20%;
    }

    .radio .cr .cr-icon {
        margin-left: 0.04em;
    }

    .checkbox label input[type="checkbox"],
    .radio label input[type="radio"] {
        display: none;
    }

    .checkbox label input[type="checkbox"] + .cr > .cr-icon,
    .radio label input[type="radio"] + .cr > .cr-icon {
        transform: scale(3) rotateZ(-20deg);
        opacity: 0;
        transition: all .3s ease-in;
    }

    .checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
    .radio label input[type="radio"]:checked + .cr > .cr-icon {
        transform: scale(1) rotateZ(0deg);
        opacity: 1;
    }

    .checkbox label input[type="checkbox"]:disabled + .cr,
    .radio label input[type="radio"]:disabled + .cr {
        opacity: .5;
    }
    #progress{display: none ;}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title">
                    <h1 class="pull-left">Set Privilege</h1>
                    <img id="progress" class="pull-right" src="#" alt=""></span>
                </div>
            </div>

            <div class="panel-body">
                <form action="" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Privilege  <span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="privilege" id="privilege" class="form-control" required>
                                <option value="">-- Select --</option>
                                <?php foreach ($privileges as $privilege) { ?>
                                <option value="<?php echo $privilege->privilege; ?>"><?php echo filter($privilege->privilege); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">User Name<span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="user_id" id="user_id" class="form-control" required> </select>
                        </div>
                        <div class="col-md-12">
                            <hr style="margin-bottom: 0">
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="active">
                            <th rowspan="2" class="text-center" style="vertical-align: middle;">Menu Item</th>
                            <th colspan="3" class="text-center">Navbar Items</th>
                        </tr>
                    </thead>


                    <tbody>
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="dashboard">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Dashboard</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">

                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="dashboard" data-item="action" value="total_teachers">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Total Teachers
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="dashboard" data-item="action" value="total_employees">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Total Employees
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="dashboard" data-item="action" value="total_committee">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Total Committee
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="dashboard" data-item="action" value="total_students">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Total Students
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="dashboard" data-item="action" value="total_salary_paid">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Total Salary Paid
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="dashboard" data-item="action" value="total_salary_due">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Total Salary Due
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="dashboard" data-item="action" value="total_cost">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Total Cost
                                  </label>
                                </div>
                            </td>
                        </tr>
                        <!-- Row End here -->
                        
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="header_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Header</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="header_menu" data-item="action" value="banner">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Banner
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="header_menu" data-item="action" value="slider">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Slider
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="header_menu" data-item="action" value="add-new">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Add Notice
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="header_menu" data-item="action" value="all">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;All Notice
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="header_menu" data-item="action" value="pages">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Pages
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="header_menu" data-item="action" value="add">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Add Latest News
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="header_menu" data-item="action" value="all">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;All Latest News
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="header_menu" data-item="action" value="image_gallery">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Image Gallery
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="header_menu" data-item="action" value="video_gallery">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Video Gallery
                                  </label>
                                </div>
                            </td>
                        </tr>
                        <!-- Row End here -->
                        
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="speech_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Speech</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="speech_menu" data-item="action" value="president_speech">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;President Speech
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="speech_menu" data-item="action" value="principal_speech">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Principal Speech
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="speech_menu" data-item="action" value="vice_principal_speech">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Vice Principal Speech
                                  </label>
                                </div>
                            </td>
                        </tr>
                        <!-- Row End here -->
                        
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="registration_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Students</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="registration_menu" data-item="action" value="add-new">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Add Student
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="registration_menu" data-item="action" value="all">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;All Student
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="registration_menu" data-item="action" value="up">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Upgrade Student
                                  </label>
                                </div>
                            </td>
                        </tr>
                        <!-- Row End here -->
                        
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="attendance_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Attendance</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="attendance_menu" data-item="action" value="add-new">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Take Attendance
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="attendance_menu" data-item="action" value="stu-rep">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Student Report
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="attendance_menu" data-item="action" value="all-rep">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Class Wise Report
                                  </label>
                                </div>
                            </td>
                        </tr>
                        <!-- Row End here -->
                        
                        
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="payment_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Payment</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="payment_menu" data-item="action" value="field">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Field Of Payment
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="payment_menu" data-item="action" value="payment_set">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Set Payment Amount
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="payment_menu" data-item="action" value="setting">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Month Settings
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="payment_menu" data-item="action" value="receieve_payment">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Receive Payment 
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="payment_menu" data-item="action" value="payment_report">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Payment Report
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="payment_menu" data-item="action" value="payment_field">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Field Report
                                  </label>
                                </div>
                            </td>
                        </tr>
                        <!-- Row End here -->
                        
                        
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="income_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Income</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="income_menu" data-item="action" value="field">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Field Of Income
                                  </label>
                                </div>

                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="income_menu" data-item="action" value="new">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;New Income
                                  </label>
                                </div>

                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="income_menu" data-item="action" value="all">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;All Income
                                  </label>
                                </div>
                                
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="income_menu" data-item="action" value="monthly_income_report">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Monthly All Income
                                  </label>
                                </div>
                                
                            </td>
                        </tr>
                        <!-- Row End here -->
                        
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="cost_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Cost</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="cost_menu" data-item="action" value="field">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Field Of Cost
                                  </label>
                                </div>

                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="cost_menu" data-item="action" value="new">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;New Cost
                                  </label>
                                </div>

                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="cost_menu" data-item="action" value="all">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;All Cost
                                  </label>
                                </div>
                                
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="cost_menu" data-item="action" value="monthly_cost_report">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Monthly All Cost
                                  </label>
                                </div>                                
                                
                            </td>
                        </tr>
                        <!-- Row End here -->
                        
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="report_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Report</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="report_menu" data-item="action" value="income">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Income Report
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="report_menu" data-item="action" value="cost">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Cost Report
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="report_menu" data-item="action" value="cost_income">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Income & Cost Report
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="report_menu" data-item="action" value="balance">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Balance Report
                                  </label>
                                </div>
                            </td>
                        </tr>
                        <!-- Row End here -->
                        

                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="privilege-menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Set Privilege</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320"></td>
                        </tr>
                        <!-- Row End here -->
                        
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="subject_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Subject</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                            </td>
                        </tr>
                        <!-- Row End here -->
                        
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="exam_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Exam</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                                <!--<div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="" data-item="action" value="">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Exam Name
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="" data-item="action" value="">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Add Exam 
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="" data-item="action" value="">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;All Exam
                                  </label>
                                </div>-->
                            </td>
                        </tr>
                        <!-- Row End here -->
                        
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="marks_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Marks</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                                <!--<div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="marks_menu" data-item="action" value="">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Add Marks
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="marks_menu" data-item="action" value="">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;All Marks
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="marks_menu" data-item="action" value="">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Update Marks
                                  </label>
                                </div>-->
                            </td>
                        </tr>
                        <!-- Row End here -->
                        
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="result_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Result</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                                <!--<div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="result_menu" data-item="action" value="">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Result Publish
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="result_menu" data-item="action" value="">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Publish Message
                                  </label>
                                </div>-->
                            </td>
                        </tr>
                        <!-- Row End here -->
                        
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="tabulation_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Tabulation Sheet</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320"></td>
                        </tr>
                        <!-- Row End here -->
                        
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="committee_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Committee</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="committee_menu" data-item="action" value="add-new">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Add Member
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="committee_menu" data-item="action" value="all">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Show Member
                                  </label>
                                </div>
                            </td>
                        </tr>
                        <!-- Row End here -->
                        
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="testimonial_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Testimonial</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320"></td>
                        </tr>
                        <!-- Row End here -->
                        
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="ids-menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">ID Card</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                                <!--<div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="ids_menu" data-item="action" value="">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Student ID Card
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="ids_menu" data-item="action" value="">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Student Validity Date
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="ids_menu" data-item="action" value="">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Teacher ID Card
                                  </label>
                                </div>-->
                            </td>
                        </tr>
                        <!-- Row End here -->
                        
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="employee_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Employee</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="employee_menu" data-item="action" value="add-new">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Add Employee
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="employee_menu" data-item="action" value="all">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;All Employee
                                  </label>
                                </div>
                            </td>
                        </tr>
                        <!-- Row End here -->
                        
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="admit_card_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Admit Card</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320"></td>
                        </tr>
                        <!-- Row End here -->
                        
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="sms_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Mobile SMS</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="sms_menu" data-item="action" value="send-sms">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Send SMS
                                  </label>
                                </div>

                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="sms_menu" data-item="action" value="staff-sms">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Staff SMS
                                  </label>
                                </div>
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="sms_menu" data-item="action" value="custom-sms">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Custom SMS
                                  </label>
                                </div>

                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="sms_menu" data-item="action" value="sms-report">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;SMS Report
                                  </label>
                                </div>
                            </td>
                        </tr>
                        <!-- Row End here -->
                        
                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="uploadDelete_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Upload & Download</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="uploadDelete_menu" data-item="action" value="result-add-new">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp; Result
                                  </label>
                                </div>
                                <!--<div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="upload_menu" data-item="action" value="">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;All Result
                                  </label>
                                </div>-->
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="uploadDelete_menu" data-item="action" value="routine-add-new">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp; Routine
                                  </label>
                                </div>
                                <!--<div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="upload_menu" data-item="action" value="">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;All Routine
                                  </label>
                                </div>-->
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="uploadDelete_menu" data-item="action" value="syllabus-add-new">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Syllabus
                                  </label>
                                </div>
                                <!--<div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="upload_menu" data-item="action" value="">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;All Syllabus
                                  </label>
                                </div>-->
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="uploadDelete_menu" data-item="action" value="magazine-add-new">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp; Magazine
                                  </label>
                                </div>
                                <!--<div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="upload_menu" data-item="action" value="">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;All Magazine
                                  </label>
                                </div>-->
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="uploadDelete_menu" data-item="action" value="leave-list-add-new">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp; Leave
                                  </label>
                                </div>
                                <!--<div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="upload_menu" data-item="action" value="">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;All Leave
                                  </label>
                                </div>-->
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="uploadDelete_menu" data-item="action" value="digital-content-add-new">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp; Digital Content
                                  </label>
                                </div>
                                <!--<div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="upload_menu" data-item="action" value="">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;All Digital Content
                                  </label>
                                </div>-->
                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="uploadDelete_menu" data-item="action" value="calander-add-new">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp; Academic Calendar
                                  </label>
                                </div>
                                <!--<div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="upload_menu" data-item="action" value="">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;All Academic Calendar
                                  </label>
                                </div>-->
                                
                            </td>
                        </tr>
                        <!-- Row End here -->

                        <!-- Row Start here -->
                        <tr>
                            <th>
                                <div class="checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-item="menu" value="backup_menu">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    <span style="margin-left: 10px;">Data Backup</span>
                                  </label>
                                </div>
                            </th>

                            <td colspan="3" width="320">
                                <!--<div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="backup_menu" data-item="action" value="add-new">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Export
                                  </label>
                                </div>

                                <div class="deshitem checkbox checkbox-inline view">
                                  <label>
                                    <input type="checkbox" data-menu="backup_menu" data-item="action" value="all">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    &nbsp;Import
                                  </label>
                                </div>-->
                            </td>
                        </tr>
                        <!-- Row End here -->
                        
                    </tbody>
                </table>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function(){

        // get all users
        $('select#privilege').on("change",function(){
            var data = [];
            var obj = { 'privilege' : $(this).val() };

            $.ajax({
                type : "POST",
                url  : "<?php echo site_url("ajax/retrieveBy/users"); ?>",
                data : "condition=" + JSON.stringify(obj)
            }).done(function(response){
                var items = $.parseJSON(response);
                data.push('<option value="">-- Select --</option>');
                $.each(items,function(i,el){
                    data.push('<option value="'+ el.id+'">'+ el.username +'</option>');
                });

                $('select#user_id').html(data);

            });
        });

        $("#check_view").on('change', function(event) {
            if($(this).is(":checked")){
                $('input[type="checkbox"][value="view"]').prop({checked:true});
            }else{
                $('input[type="checkbox"][value="view"]').prop({checked:false});
            }
        });


        $("#check_edit").on('change', function(event) {
            if($(this).is(":checked")){
                $('input[type="checkbox"][value="edit"]').prop({checked:true});
            }else{
                $('input[type="checkbox"][value="edit"]').prop({checked:false});
            }
        });

        $("#check_delete").on('change', function(event) {
            if($(this).is(":checked")){
                $('input[type="checkbox"][value="delete"]').prop({checked:true});
            }else{
                $('input[type="checkbox"][value="delete"]').prop({checked:false});
            }
        });
        //Getting All Menu Name It's Just for use the data
        var input = $('input[type="checkbox"][data-item="menu"]');
        var list = [];
        $.each(input,function(index, el) {
            list.push($(el).val());
        });
        // console.log(list);

        //Set Privilege Data Start
        $('input[type="checkbox"]').on('change', function(event) {
            if($('select[name="privilege"]').val()!="" && $('select[name="user_id"]').val()!=""){
                $("#progress").fadeIn(300);
                //Collecting all data start here
                var access_item = {};

                var input = $('input[type="checkbox"]');

                $.each(input,function(index, el) {
                    if($(el).is(":checked")){
                        //access_item.push($(el).val());
                        if($(el).data("item")=="menu"){
                            //action data collection Start here
                            var ac_el = $('input[data-menu="'+$(el).val()+'"]');
                            var action_data = [];
                            $.each(ac_el,function(ac_i, ac_el) {
                                if($(ac_el).is(":checked")){
                                    action_data.push($(ac_el).val());
                                }
                            });
                            //action data collection End here
                            access_item[$(el).val()] = action_data;
                        }
                    }
                });
                //console.log(access_item);

                var access = JSON.stringify(access_item);
                //console.log(access);
                var privilege_name = $('select[name="privilege"]').val();
                var user_id = $('select[name="user_id"]').val();
                //Collecting All data end here


                //Sending Request Start here
                $.ajax({
                    url: '<?php echo site_url("privilege/privilege/set_privilege_ajax"); ?>',
                    type: 'POST',
                    data: {
                        privilege_name: privilege_name,
                        user_id : user_id ,
                        access : access
                    }
                })
                .done(function(response) {
                    //console.log(response);
                    $("#progress").fadeOut(300);
                });
                //Sending Request End here
            }else{
                alert("Please select a Privilege and User Name.");
                return false
            }
        });
        //Set Privilege Data End

        //Get Privilege Data Start
        $('select[name="user_id"]').on('change', function(event) {
            $('input[type="checkbox"]').prop({checked:false});
            //Sending Request Start here
            var user_id = $(this).val();
            var privilege_name = $('#privilege').val();
            $.ajax({
                url: '<?php echo site_url("privilege/privilege/get_privilege_ajax"); ?>',
                type: 'POST',
                data: {user_id : user_id , privilege_name:privilege_name}
            }).done(function(response) {
                if(response!="error"){
                    var data = $.parseJSON(response);
                    access = $.parseJSON(data.access);

                    //console.log(access);
                    $.each(access,function(access_index,access_val){
                        //console.log(access_index);
                        //data-item="menu" value="theme_ettings"
                        $('input[data-item="menu"][value="'+access_index+'"]').prop({checked: true});
                        $.each(access_val,function(action_in,action_val){
                            $('input[data-item="action"][data-menu="'+access_index+'"][value="'+action_val+'"]').prop({checked: true});
                        });
                        //$('input[name="'+el.module_name+'"][value="'+access_val+'"]').prop({checked: true});
                    });
                }
            });
            //Sending Request End here
        });
        //Get Privilege Data End
    });
</script>