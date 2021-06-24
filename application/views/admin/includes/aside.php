<style>
    ul li a span.icon{
        float: right;
        margin-right: 20px;
    }
</style>
<!-- Sidebar -->
<aside id="sidebar-wrapper">
    <div class="sidebar-nav">
        <h3 class="sidebar-brand"><a href="<?php echo site_url("admin/dashboard"); ?>">Admin <span>Panel</span></a></h3>
    </div>

    <nav>
        <ul class="sidebar-nav">

            <li id="dashboard">
                <a href="<?php echo site_url('admin/dashboard'); ?>">
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
                            President Speech
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
                            Vice Principal Speech
                        </a>
                    </li>

                </ul>
            </li>

            <!--li id="registration_menu">
                <a href="<?php echo site_url('registration/registration'); ?>">
                    <i class="fa fa-file-text"></i>
                    Registration
                </a>
            </li>

             <li id="admission_menu">
                <a href="<?php echo site_url('admission/admission/allStudent'); ?>">
                    <i class="fa fa-graduation-cap"></i>
                    Students
                </a>
            </li-->
            
            <li id="apply_now_menu">
                <a href="<?php echo site_url('apply_now/apply_now'); ?>">
                    <i class="fa fa-check-square-o"></i>
                    Applying Student
                </a>
            </li>
            
            <li id="sendIDPass">
                <a href="<?php echo site_url('apply_now/send_sms'); ?>">
                    <i class="fa fa-envelope-o"></i>
                    Send ID/Pass
                </a>
            </li>


            <li id="registration_menu">
               <a href="#registration" data-toggle="collapse">
                  <i class="fa fa-graduation-cap"></i>&nbsp;
                                       Students
                   <span class="icon"><i class="fa fa-sort-desc"></i></span>
               </a>
               <ul id="registration" class="sidebar-nav collapse">
                   <li>
                       <a href="<?php echo site_url('registration/registration'); ?>">
                           <i class="fa fa-angle-right"></i>
                                                Add Student
                       </a>
                   </li>

                   <li>
                       <a href="<?php echo site_url('registration/registration/allStudent'); ?>">
                           <i class="fa fa-angle-right"></i>
                                                        All Student
                       </a>
                   </li>

                   <li>
                       <a href="<?php echo site_url('admission/admission/upgrade_student'); ?>">
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
            
            <li id="payment_menu">
                <a href="#payment" data-toggle="collapse">
                    <i class="fa fa-money"></i>&nbsp;
                    Payment
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="payment" class="sidebar-nav collapse">
                    
                    <li>
                        <a href="<?php echo site_url('payment/description');?>">
                            <i class="fa fa-angle-right"></i>
                            Add Description
                        </a>
                    </li>
                        
                         
                    <li>
                        <a href="<?php echo site_url('payment/payment');?>">
                            <i class="fa fa-angle-right"></i>
                            Field of Payment
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('payment/payment/payment_set'); ?>">
                            <i class="fa fa-angle-right"></i>
                           Set Payment Amount
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('payment/payment/setting'); ?>">
                            <i class="fa fa-angle-right"></i>
                           Month Settings
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('payment/receieve_payment'); ?>">
                            <i class="fa fa-angle-right"></i>
                           Recieve Payment
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('payment/payment_report'); ?>">
                            <i class="fa fa-angle-right"></i>
                           Payment Report
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('payment/payment_report/field_report'); ?>">
                            <i class="fa fa-angle-right"></i>
                           Field Report
                        </a>
                    </li>
                    
                     <li>
                        <a href="<?php echo site_url('payment/payment_report/monthly_income_report'); ?>" >
                            <i class="fa fa-angle-right"></i>
                             Monthly Report
                        </a>
                    </li>

                </ul>
            </li>
            

            <!--<li id="cost_menu">
                <a href="#cost" data-toggle="collapse">
                    <i class="fa fa-money"></i>
                    &nbsp; Cost
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="cost" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('cost/cost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; Field of Cost
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('cost/cost/newcost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; New Cost
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('cost/cost/allcost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; All Cost
                        </a>
                    </li>

                </ul>
            </li>
            
            
            
            <li id="income_menu">
                <a href="#income" data-toggle="collapse">
                    <i class="fa fa-money"></i>
                    &nbsp;Income
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="income" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('income/infoView'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Field of Income
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('income/infoView/addIncome'); ?>" >
                            <i class="fa fa-angle-right"></i>
                            New Income
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('income/infoView/showIncome'); ?>" >
                            <i class="fa fa-angle-right"></i>
                            All Income
                        </a>
                    </li>
                </ul>
            </li>
            
            

            <li id="report_menu">
                <a href="#report" data-toggle="collapse">
                    <i class="fa fa-money"></i>&nbsp;
                    Report
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="report" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('report/income_report');?>">
                            <i class="fa fa-angle-right"></i>
                            Income Report
                        </a>
                    </li>
                    
                     <li>
                        <a href="<?php echo site_url('report/cost_report');?>">
                            <i class="fa fa-angle-right"></i>
                            Cost Report
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('report/balance_report');?>">
                            <i class="fa fa-angle-right"></i>
                            Balance Sheet
                        </a>
                    </li>
                </ul>
            </li>-->



      <!-- <li id="income_menu">-->
      <!--          <a href="#income" data-toggle="collapse">-->
      <!--              <i class="fa fa-money"></i>-->
						<!--Income-->
      <!--              <span class="icon"><i class="fa fa-sort-desc"></i></span>-->
      <!--          </a>-->

      <!--          <ul id="income" class="sidebar-nav collapse">-->
      <!--              <li>-->
      <!--                  <a href="<?php echo site_url('income/infoView'); ?>">-->
      <!--                      <i class="fa fa-angle-right"></i>-->
						<!--	Income Field-->
      <!--                  </a>-->
      <!--              </li>-->

      <!--              <li>-->
      <!--                  <a href="<?php echo site_url('income/infoView/addIncome'); ?>" >-->
      <!--                      <i class="fa fa-angle-right"></i>-->
      <!--                     New Income-->
      <!--                  </a>-->
      <!--              </li>-->
                    
      <!--              <li>-->
      <!--                  <a href="<?php echo site_url('income/infoView/showIncome'); ?>" >-->
      <!--                      <i class="fa fa-angle-right"></i>-->
      <!--                   All Income-->
      <!--                  </a>-->
      <!--              </li>   -->
                    
      <!--              <li>-->
      <!--                  <a href="<?php echo site_url('monthlyIncomeReport/monthlyIncomeReport'); ?>" >-->
      <!--                      <i class="fa fa-angle-right"></i>-->
      <!--                       Monthly All Income-->
      <!--                  </a>-->
      <!--              </li>-->
                    
      <!--          </ul>-->
      <!--      </li>-->

            <li id="cost_menu">
                <a href="#cost" data-toggle="collapse">
                    <i class="fa fa-money"></i>
                    &nbsp; Cost
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="cost" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('cost/cost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; Cost Field
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('cost/cost/newcost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; New Cost
                        </a>
                    </li>
                    
                  
                    
                    <li>
                        <a href="<?php echo site_url('cost/cost/allcost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; All Cost
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('monthlyCostReport/monthlyCostReport'); ?>" >
                            <i class="fa fa-angle-right"></i>
                            Monthly All cost
                        </a>
                    </li>  


                </ul>
            </li>



            <li id="report_menu">
                <a href="#report" data-toggle="collapse">
                    <i class="fa fa-money"></i>&nbsp;
                    Report
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="report" class="sidebar-nav collapse">

                    <li>
                        <a href="<?php echo site_url('report/income_report');?>">
                            <i class="fa fa-angle-right"></i>
                            Income Report
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('report/cost_report');?>">
                            <i class="fa fa-angle-right"></i>
                            Cost Report
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('report/cost_income');?>">
                            <i class="fa fa-angle-right"></i>
                            Income & Cost Report
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('report/balance_report');?>">
                            <i class="fa fa-angle-right"></i>
                            Balance Report
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('report/balance_report/field_wise_balance_report');?>">
                            <i class="fa fa-angle-right"></i>
                            Field Wise Balance Report
                        </a>
                    </li>
                </ul>
            </li>



          
            

            <li id="subject_menu">
                <a href="<?php echo site_url('subject/subject'); ?>">
                    <i class="fa fa-file-text"></i>
                    Subject
                </a>
            </li>

             <li id="exam_menu">
                <a href="<?php echo site_url('exam/exam/setNewExam'); ?>">
                    <i class="fa fa-file-text"></i>
                    Exam
                </a>
            </li>

            <!--<li id="marks_menu">
                <a href="<?php echo site_url('marks/marks'); ?>">
                    <i class="fa fa-file-text"></i>
                    Marks
                </a>
            </li>-->

            <li id="result_menu">
                <a href="<?php echo site_url('resultPublish'); ?>">
                    <i class="fa fa-file-text"></i>
                    Result
                </a>
            </li>

            <li id="tabulation">
                <a href="<?php echo site_url('tabulationSheet'); ?>">
                    <i class="fa fa-file-text"></i>
                    Tabulation Sheet
                </a>
            </li>

            <li id="print_result">
                <a href="<?php echo site_url('print_result'); ?>">
                    <i class="fa fa-file-text"></i>
                    Print Result
                </a>
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
            
            <li id="testimonial_menu">
                <a href="<?php echo site_url('testimonial'); ?>">
                    <i class="fa fa-file-text"></i>
                    Testimonial 
                </a>
            </li>
            
            <li id="ids-menu">
                <a href="#ids_menu" data-toggle="collapse">
                    <i class="fa fa-graduation-cap"></i>&nbsp;
                    ID Card
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="ids_menu" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('identity'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Student ID Card
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('identity/validity'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Student Validity Date
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('identity/teacher'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Teacher ID Card
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
            
            <li id="admit">
                <a href="<?php echo site_url('admitCard'); ?>">
                    <i class="fa fa-file-text"></i>
                    Admit Card
                </a>
            </li>
            
            <!--<li id="testimonial_menu">
                <a href="<?php echo site_url('testimonial/testimonial/allView'); ?>">
                    <i class="fa fa-file-text"></i>
                    Testimonial 
                </a>
            </li>-->

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
                        <a href="<?php echo site_url('sms/sendSms/staff_sms'); ?>">
                            <i class="fa fa-angle-right"></i>
                           Staff SMS
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


            <li id="privilege-menu">
                <a href="<?php echo site_url('privilege/privilege');?>">
                    <i class="fa fa-user-plus"></i>
                    &nbsp;Set Privilege
                </a>
            </li>    

            <!--li id="visitor">
                <a href="<?php echo site_url('visitors/comments'); ?>">
                    <i class="fa fa-envelope"></i>
                    Visitor Comments
                </a>
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

            <!--li id="leave_menu">
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
            </li-->

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

            <li id="backup_menu">
                <a href="<?php echo site_url('data_backup'); ?>">
                    <i class="fa fa-database"></i>
                    Data Backup
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