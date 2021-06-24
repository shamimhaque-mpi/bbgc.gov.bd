<!-- aside start -->
<div class="col-md-3 col-sm-12 col-xs-12 custom-sm">
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-6 custom-sm">
            <div class="row">
                <div class="pannel-custom pannel-custom-new res-margin-right-5" style="margin-top:0;">
                    <h3>Menu</h3>
                    <ul>
                        <li><a href="<?php echo site_url('studentPanel/dashboard'); ?>">Home</a></li>
                        <li><a href="<?php echo site_url('studentPanel/studentProfile'); ?>">Profile</a></li>
                        
                        <?php
                           $today_date=strtotime(date('Y-m-d'));                    
                           $start_date=strtotime('2015-09-19');                      
                           $end_date=strtotime('2016-09-20');
                           
                           if ($today_date >= $start_date ||  $today_date <=$end_date)
                             {
	                           ?>
	                               <li><a href="<?php echo site_url('studentPanel/studentAdmitCard'); ?>">Admit</a></li>                        
	                           <?php
                             }
                         ?>
                         
                          
                         <?php 
                         
                           $t_date=strtotime(date('Y-m-d'));  
                           $s_date=strtotime('2015-09-23');
                           $e_date=strtotime('2016-10-05');
                           
                              
                           if ($t_date >=$s_date && $t_date <=$e_date)
                             {
	                           ?>
	                                <li><a href="<?php echo site_url('studentPanel/studentAdmitCard/result'); ?>">Result</a></li>
                                   <?php                            
                             } 
                             
                          ?>  

                        <?php 
                         
                           $t_date=strtotime(date('Y-m-d'));  
                           $s_date=strtotime('2015-09-23');
                           $e_date=strtotime('2016-10-04');
                           
                              
                           if ($t_date >=$s_date && $t_date <=$e_date)
                             {
	                           ?>
	                                <li><a href="<?php echo site_url('studentPanel/studentAdmitCard/pay_slip/'.$username); ?>">Pay Slip</a></li>
                                   <?php                            
                             } 
                             
                          ?>                                         
                      						  
                      
	               <li><a href="<?php echo site_url('studentPanel/studentSetting'); ?>">Setting</a></li>
                        <li><a href="<?php echo site_url('access/subscriber/logout'); ?>">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- aside end -->