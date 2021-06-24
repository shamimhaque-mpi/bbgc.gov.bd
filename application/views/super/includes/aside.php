  
 <style>
    ul li a span.icon{
        float: right;
        margin-right: 20px;
    }
 </style>
<!-- Sidebar -->
<aside id="sidebar-wrapper">
    <div class="sidebar-nav">
        <h3 class="sidebar-brand"><a href="#">Admin <span>Panel</span></a></h3>
    </div>
    
    <nav>
        <ul class="sidebar-nav">

            <!-- li class="sidebar-brand"><a href="#">Start Bootstrap</a></li -->
            <li id="dashboard">
                <a href="<?php echo site_url('super/dashboard'); ?>">
                    <i class="fa fa-home"></i>
                    Dashboard
                </a>
            </li>


            <li id="header_menu" >
                <a href="#header" data-toggle="collapse">
                    <i class="fa fa-header"></i> 
                    Header 
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
                <ul id="header" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('header/banner'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Banner
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('header/slider'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Slider
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('header/notice'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Notice
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('header/pages'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Pages
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('header/latest_news'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Latest News
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('header/imageGallery'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Image Gallery
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('header/videoGallery'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Video Gallery
                        </a>
                    </li>
                    
                </ul>
            </li>


            <li id="uploadDelete_menu" >
                <a href="#upload_delete" data-toggle="collapse">
                    <i class="fa fa-cloud-upload"></i> 
                    Upload & Download 
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
                <ul id="upload_delete" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('upload_delete/resultUpload'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Result
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('upload_delete/routineUpload'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Routine
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('upload_delete/syllabus'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Syllabus
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('upload_delete/magazine'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Magazine
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('upload_delete/leaveList'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Leave List
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('upload_delete/digitalContent'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Digital Content
                        </a>
                    </li>

                    <!--li>
                        <a href="<?php echo site_url('upload_delete/externalLinks'); ?>">
                            <i class="fa fa-angle-right"></i>
                            External Links
                        </a>
                    </li-->

                    <li>
                        <a href="<?php echo site_url('upload_delete/academicCalendar'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Academic Calendar
                        </a>
                    </li>

                    <!--li>
                        <a href="<?php echo site_url('upload_delete/set_sub_class'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Set Class & Subject
                        </a>
                    </li-->
                </ul>
            </li>


            <li id="speech_menu">
                <a href="#speech" data-toggle="collapse">
                    <i class="fa fa-comment"></i> 
                    Speech 
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
                <ul id="speech" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('header/speech'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Principal
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('header/speech/principal_speech'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Principal Speech
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('header/speech/vice_principal_speech'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Vice Principal
                        </a>
                    </li>

                    <!--li>
                        <a href="<?php echo site_url('header/speech/at_a_glance'); ?>">
                            <i class="fa fa-angle-right"></i>
                            At a Glance
                        </a>
                    </li-->
                </ul>
            </li>


            <li id="student_menu">
                <a href="#student" data-toggle="collapse">
                    <i class="fa fa-graduation-cap"></i>
                    Student 
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
                <ul id="student" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('students/studentInfo'); ?>">
                            <i class="fa fa-angle-right"></i>
                            New Student
                        </a>
                    </li>

                    <!--li>
                        <a href="<?php echo site_url('students/admission_view'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Admission
                        </a>
                    </li-->

                    <li>
                        <a href="<?php echo site_url('students/admission_view/show'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Student
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('students/upgrade_student'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Upgrade Student
                        </a>
                    </li>
                </ul>
            </li>
            
            <li id="attendance_menu">
                <a href="#attendance" data-toggle="collapse">
                    <i class="fa fa-check-square-o"></i>
                    Attendance 
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
                <ul id="attendance" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('attendance/attendance'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Take Attendance
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('attendance/attendance/student_report'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Student Report
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('attendance/attendance/class_wise_report'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Class Wise Report
                        </a>
                    </li>
                    
                </ul>
            </li>

            <li id="admit">
                <a href="<?php echo site_url('admitCard'); ?>">
                    <i class="fa fa-file-text"></i>
                    Admit Card
                </a>
            </li>

            <li id="testimonial">
                <a href="<?php echo site_url('testimonial/testimonial/allView'); ?>">
                    <i class="fa fa-file-text"></i>
                    Testimonial 
                </a>
            </li>

            <!--li id="certificate">
                <a href="<?php echo site_url('certificate'); ?>">
                    <i class="fa fa-file-text"></i>
                    Certificate Management
                </a>
            </li-->

            <!--li id="subject_menu">
                <a href="#Subject" data-toggle="collapse">
                    <i class="fa fa-paper-plane"></i>
                    Subject 
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
                <ul id="Subject" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('result/setSubject'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Set Subject
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('students/distributeSubject'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Distribute Subject
                        </a>
                    </li>
                </ul>
            </li>

            <li id="result_menu">
                <a href="#result" data-toggle="collapse">
                    <i class="fa fa-file-text"></i>
                    Result 
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
                <ul id="result" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('result/setExamC'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Set Exam
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('result/showResultC'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Show Result
                        </a>
                    </li>
                </ul>
            </li-->

            <li id="payment_menu">
                <a href="#payment" data-toggle="collapse">
                    <i class="fa fa-money"></i> &nbsp;
                    Payment 
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="payment" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('student_payment/payment');?>">
                            <i class="fa fa-angle-right"></i>
                            Student's Payment
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('student_payment/payment/paymentHistory'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Payment History
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('student_payment/payment/monthly_payment_history'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Monthly Payment History
                        </a>
                    </li>
                </ul>
            </li>

            <li id="committee_menu">
                <a href="#committee" data-toggle="collapse">
                    <i class="fa fa-users"></i>
                    Committee 
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="committee" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('committee/committee');?>">
                            <i class="fa fa-angle-right"></i>
                            Add Member
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('committee/committee/all_view_member'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Show Member
                        </a>
                    </li>
                </ul>
            </li>
            

            <li id="employee_menu">
                <a href="#employee" data-toggle="collapse">
                    <i class="fa fa-male"></i>
                    Employee 
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="employee" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('employee/employee');?>">
                            <i class="fa fa-angle-right"></i>
                            Add Employee
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('employee/employee/show_employee'); ?>">
                            <i class="fa fa-angle-right"></i> 
                            View Employee
                        </a>
                    </li>

                    <!--li>
                        <a href="<?php echo site_url('employee/employee/salary'); ?>">
                            <i class="fa fa-angle-right"></i> 
                            Employee Salary
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('employee/employee/salary_history'); ?>">
                            <i class="fa fa-angle-right"></i> 
                            Employee's Salary History
                        </a>
                    </li-->
                </ul>
            </li>
            
            <li id="bank_menu">
                <a href="#bank" data-toggle="collapse">
                    <i class="fa fa-university"></i>
                    Bank 
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="bank" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('bank/bankInfo'); ?>">
                            <i class="fa fa-angle-right"></i>
                             Add Account
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('bank/bankInfo/all_account'); ?>">
                            <i class="fa fa-angle-right"></i>
                             All Account
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('bank/bankInfo/transaction'); ?>">
                            <i class="fa fa-angle-right"></i> 
                            Add Transaction
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('bank/bankInfo/searchViewTransaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Custom Search
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('bank/bankInfo/allTransaction'); ?>">
                            <i class="fa fa-angle-right"></i> 
                            All Bank Transaction
                        </a>
                    </li>
                </ul>
            </li>

            <li id="cost_menu">
                <a href="#cost" data-toggle="collapse">
                    <i class="fa fa-money"></i>
                    Cost 
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="cost" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('cost/infoView'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Cost
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('cost/infoView/showCost'); ?>">
                            <i class="fa fa-angle-right"></i> 
                            Show Cost
                        </a>
                    </li>
                </ul>
            </li>

            <li id="sms_menu">
                <a href="#sms" data-toggle="collapse">
                    <i class="fa fa-envelope-o"></i>
                    Mobile SMS 
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="sms" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('sms/sendSms');?>">
                            <i class="fa fa-angle-right"></i>
                            Send SMS
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('sms/sendSms/send_custom_sms'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Custom SMS
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('sms/sendSms/sms_report'); ?>">
                            <i class="fa fa-angle-right"></i>
                            SMS Report
                        </a>
                    </li>
                </ul>
            </li>

            <!--li id="visitor">
                <a href="<?php echo site_url('visitors/comments'); ?>">
                    <i class="fa fa-envelope"></i>
                    Visitor Comments
                </a>
            </li>

            <li id="income_menu">
                <a href="#income" data-toggle="collapse">
                    <i class="fa fa-money"></i>
                    Income 
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="income" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('income/infoView'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Income
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('income/infoView/showIncome'); ?>">
                            <i class="fa fa-angle-right"></i> 
                            Show Income
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('income/infoView/earn_from_student'); ?>">
                            <i class="fa fa-angle-right"></i> 
                            Earn from Student
                        </a>
                    </li>
                </ul>
            </li-->

            <!--li id="upload_menu">
                <a href="#upload" data-toggle="collapse">
                    <i class="fa fa-cloud-upload"></i>
                    Upload File 
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="upload" class="sidebar-nav collapse">
                    
                    <li>
                        <a href="<?php echo site_url('upload/uploadView/result'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Result
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('upload/uploadView/routine'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Routine
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('upload/uploadView'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Leave List
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('upload/uploadView/calendar');?>">
                            <i class="fa fa-angle-right"></i> 
                            Academic Calendar
                        </a>
                    </li>
                </ul>
            </li>

            <li id="balance">
                <a href="<?php echo site_url('balance/infoView');?>">
                    <i class="fa fa-sitemap"></i>
                    Balance Sheet
                </a>
            </li>


            <li id="form">
                <a href="<?php echo site_url('form/form'); ?>">
                    <i class="fa fa-file-text-o"></i>
                    Form
                </a>
            </li>


            <li id="table">
                <a href="<?php echo site_url('table/table'); ?>">
                    <i class="fa fa-th"></i>
                    Table
                </a>
            </li>


            <li id="comp">
                <a href="#components" data-toggle="collapse"><i class="fa fa-tint"></i> Components</a>
                <ul id="components" class="sidebar-nav collapse">
                    <li><a href="<?php echo site_url('comp/textEditor'); ?>">Texteditor</a></li>
                    <li><a href="<?php echo site_url('comp/chart'); ?>">Chart</a></li>
                </ul>
            </li-->

            <li id="leave_menu">
                <a href="#leave" data-toggle="collapse">
                    <i class="fa fa-paper-plane"></i>
                    Leave Management 
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="leave" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('leave_management/leaveView');?>">
                            <i class="fa fa-angle-right"></i>
                            Assign Leave
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('leave_management/leaveView/show');?>">
                            <i class="fa fa-angle-right"></i>
                            Show Leave
                        </a>
                    </li>
                </ul>
            </li>
            
            <li id="backup_menu">
                <a href="<?php echo site_url('data_backup'); ?>">
                    <i class="fa fa-database"></i>
                    Data Backup
                </a>
            </li>

            <li id="">
                <a target="_blank" href="http://phulpurcollege.edu.bd/webmail">
                   <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    Web Mail
                </a>
            </li>
            

        </ul>
    </nav>
</aside>
<!-- /#sidebar-wrapper -->


<!--=================== online offline checker =========================-->
<style>
    .warning {
        height: 100vh;
        background: rgba(255, 255, 255, 0.85);
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        position: fixed;
        z-index: 99999;
        top: 0;
        left: 0;
        user-select: none;
        color: red;
        font-family: serif;
        display: none;
    }
</style>

<div class="warning">
    <div>
        <h1>YOU'R OFFLINE</h1>
    </div>
</div>
<script>
if(typeof navigator.connection !== 'undefined'){
    navigator.connection.onchange = function () {
        var warning = document.querySelector('.warning');
        if (navigator.onLine) {
            warning.style.display = 'none';
        } else {
            warning.style.display = 'flex';
        }
    }
}
</script>

<!--=================== End online offline checker =========================-->