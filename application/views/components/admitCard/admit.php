<style>
    @font-face {
        font-family: 'algerianregular';
        src: url(<?php echo site_url('public/fonts/algerfont.woff2'); ?>) format('woff2'),
             url(<?php echo site_url('public/fonts/algerfont.woff'); ?>) format('woff'),
             url(<?php echo site_url('public/fonts/algerfont.ttf'); ?>) format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    .instruction ul li{
        padding-left: 15px;
        margin-bottom: 10px;
    }
    .instruction ul li i{
        font-size: 8px;
    }
    .student-table {
        font-family: "Times New Roman", Times, serif;
    }
    .title {
        font-family: 'algerianregular';
        margin: 10px 0 5px;
        font-size: 36px;
        font-weight: bold;
        text-transform: uppercase;
    }
    .view-profile {
         position: relative;
     }
    .profilePic img.right {
         position: absolute;
         top: 0;
         right: 0;
         height: 135px;
    }
    .profilePic img.left {
        position: absolute;
        top: 7px;
        left: 7px;
        height: 125px;
    }
    
    .admitArea{
        height:32%;
        background: #F2F2F2;
        border-bottom: 1px solid #ddd;
        margin-bottom: 35px;
    }
    .subtitle {
        margin: 0;
        font-size: 24px;
    }
    @media print{
        .brack{
          page-break-after: always !important;
        }
        .admitArea{
            height:32%;
            background: #F2F2F2;
        }
        aside{
            display: none !important;
        }
        nav{
            display: none;
        }
        .panel{
            border: 1px solid transparent;
            position: relative;
            width: 100%;
            margin-top: -40px;
        }
        .none{display: none;}
        .admit_card{
            border: 1px solid transparent;
            position: relative;
            height: 100vh;
            width: 100%;
            margin-top: -60px;
        
        }
        .panel .none{
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
            font-size: 27px;
        }
        .subtitle {
            font-size: 18px;
        }
        .col-sm-6 {
            width: 50% !important;
            float: left;
        }
        
        .profilePic img.right {
             height: 105px;
        }
        .profilePic img.left {
            height: 90px;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Admit Card</h1>
                </div>
            </div>

            <div class="panel-body none">
                
                <?php
	                $attr=array('class'=>'form-horizontal');
	                echo form_open('',$attr);
                ?>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Session <span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="search[session]" class="form-control" required>
                              <option value="">-- Select Session --</option>
                               <?php foreach ($session_list as $key => $value) { ?>
                               <option value="<?php echo $value->session; ?>"><?php echo $value->session; ?></option>
                               <?php } ?>
                            </select>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Class <span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="search[class]" class="form-control" required>
                              <option value="">-- Select Class --</option>
                              <?php foreach (config_item('classes') as $key => $value) {?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                              <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Section <span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="search[section]" class="form-control" required>
                              <option value="">-- Select Section --</option>
                              <?php
                                    foreach (config_item('section') as  $value) {?>
                                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                       
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
            <label for="" class="col-md-2 control-label">Payment Year <span class="req">*</span></label>
            <div class="col-md-5">
                <select name="year" class="form-control" required>
                    <option value="" selected disabled>-- Select Year --</option>
                    <?php
                    for ($i=2016; $i <= date('Y')+2 ; $i++) { ?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Exam Name </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="exem_name" >
                        </div>
                    </div> 


                    <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" name="viewQuery" value="Show" class="btn btn-primary">
                    </div>
                    </div> 

                <?php echo form_close(); ?>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

  <?php if($student_info!=NULL){  ?>
        <div class="panel panel-default admit_card">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Show Result</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">
            <div class="row">




       
 <?php  foreach($student_info as $key=>$admit){
      
      $paymentMonths = $futureMonths = array();
          $months = array('January', 'February', 'March', 'April','May', 'June', 'July', 'August','September', 'October', 'November', 'December');
          
          for($i = date('m')+1; $i<=12;$i++){
              $futureMonths[] = date('F', mktime(0, 0, 0, $i, 12));
          }
          
         /* $where = array(
              "year"       => $_POST['year'],
              "student_id" => $admit->student_id,
              "status"     => "approved",
              "trash"      => 0
            );*/
            
          //$paymentInfo = $this->action->readGroupBy("payment","month",$where);
          
          
          /*if($paymentInfo != NULL){
              foreach($paymentInfo as $sl=>$val){
                  $paymentMonths[$sl] = $val->month;
              }
              $months = array_diff($months,$paymentMonths);
          }else{
              $months = $months;
          }
          
        $months = array_diff($months,$futureMonths);
          
        if(count($months) >=  0){*/ 
      
    // this code write for print brack purpose  
    $index = $key+1;
    if($index == 1){echo "<div class='col-xs-12'><div class='row'>";}
 ?>

        <div class="admitArea" >
            <div style="clear:both;margin:0 0 25px;">
            <!--<div class="col-sm-12" >-->

                <div class="view-profile clearfix">
                    <div class="col-xs-2 clearfix">
                        <figure class="profilePic clearfix">
                            <img class="img-responsive left" src="<?php echo site_url('public/img/bannerlogo.png'); ?>" alt="">
                        </figure>
                    </div>
                        
                    <div class="col-xs-8 clearfix">
                        <div class="institute" style="margin-bottom: 25px;">
                            <h3 class="text-center title">Bangabandhu Govt. College</h3>
                            <h5 class="text-center subtitle">Tarakanda, Mymensingh</h5>
                            <h3 class="text-center" style="margin: 5px;font-weight: bold;">Admit Card</h3>
                            <h5 class="text-center"><?php echo $this->input->post('exem_name'); ?></h5>
                        </div>
                    </div>
                    <div class="col-xs-2 clearfix">
                        <figure class="profilePic clearfix">
                            <img class="img-responsive right" src="<?php echo site_url($admit->photo); ?>" alt="">
                        </figure>
                    </div>
                </div>
            
                <table class="table-bordered table">
                    <tr>
                        <th width="15%">Student ID</th>
                        <td width="35%" colspan="3"><?php echo $admit->student_id;?></td>
                        <th width="15%">Section</th>
                        <td width="35%"><?php echo $admit->section; ?></td>
                    </tr>

                    <tr>
                        <th width="15%">Name</th>
                        <td width="35%" colspan="3"><?php echo $admit->name;?></td>
                        
                        <th width="15%">Roll</th>
                        <td width="35%"><?php echo $admit->roll; ?></td>
                    </tr>

                    <tr>
                        <th width="15%">Class</th>
                        <td width="35%"  colspan="3"><?php echo $admit->class; ?></td>
                        <th width="15%">Group</th>
                        <td width="35%"><?php echo $admit->group; ?></td>
                    </tr>
                </table>
                <p style="padding: 30px 15px 0; font-family:'Times New Roman', Times, serif !important;">Convener Examination Committee <span style="float:right;">Principal </span></p>
            </div> 

        </div>

        <?php   
        
        // this code write for print brack purpose  
        if($key == count($student_info)){echo '</div></div>';}
        if($index % 6 == 0){echo  "</div></div><br class='brack'/><div class='col-xs-12'><div class='row'>";}
        
        }   ?>


            </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php } ?>



    </div>
</div>

