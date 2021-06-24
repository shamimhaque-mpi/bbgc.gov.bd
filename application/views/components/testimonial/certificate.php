<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Testimonial</title>
            <!-- include css -->
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('public/css/bootstrap.css'); ?>" /> 
        <link href="<?php echo site_url('private/css/printstyle.css'); ?>" rel="stylesheet">
        
        <style>
            *,*::before,*::after{
            	margin: 0;
            	padding: 0;
            	box-sizing:  border-box;
            }
            .print-area{
            	width: 100%;
            	margin-left: auto;
            	margin-right: auto;
            	max-width: 1000px;
            	position: relative;
            }
            .serial-no{
            	position: absolute;
            	top: 130px;
            	font-size: 16px;
            }
            .item-2{
            	float: left;
            	margin-top: 75px;
            	font-size: 16px;
            }
            .print-area-content .item-1{
            	float: right;
            	text-align: center;
            	font-size: 16px;
            }
            .print-area-content p{
                margin-top: 2.5%;
                text-align: justify;
                font-size: 16px;
                line-height: 1.7;
                font-style: italic;
                font-weight: 600;
            }
            .print-area-content .sign{
            	float: right;
            	border-bottom: 2px solid #000;
            	width: 200px;
            	text-align: center;
            }
             @media print{
                .print-area {margin-top:22% !important;}
                .print-area-content {padding:0 15px 0 60px; }
                .print , .testomonial{ display : none; }
             }
        </style>
    </head>
    <body>
        <?php if($student !=null) {?>
        <div class="print-area">
            <div class="print-area-content">
            <style media="screen">
            .main-header, .main-header hr {display: none;}
            @media print {
            .main-header {display: block;}
            }
            </style>
            <div class="title-1">
                <h2 class="testomonial" style="margin: 30px auto; text-align: center; border-bottom: 1px solid #000; width: 215px;">Testimonial</h2>
                <a class="print btn btn-primery pull-right print-custom" style="margin-top: -45px;;float: right;color: blue;border: 1px solid blue;padding: 5px 15px;font-size: 12px; cursor: pointer;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                <h5 class="date" style="float: right;font-style: italic;font-weight: 600; margin-top:0; font-size: 16px;">Date: <?php echo date('Y-m-d'); ?></h5>
            </div>
            <div class="info">
                <h5 class="slno" style="margin: 10px 0;font-style: italic;font-weight: 600; font-size: 16px;">Serial no. <?php $si = date("y"); echo ($si.$serial); ?></h5>
            </div>
            <p style="margin-top: 5%;"> &nbsp; &nbsp; &nbsp; &nbsp; This is to certify that <?php echo strtoupper($student[0]->name); ?>, Father’s Name- <?php echo strtoupper($student[0]->father_name); ?>, Mother’s Name- <?php echo strtoupper($student[0]->mother_name); ?>, academic year <?php echo $student[0]->session; ?>, was a student of Higher Secondary <?php echo $student[0]->group; ?> Group. He/She took part in the Higher Secondary Certificate Examination of Dhaka Board <?php echo $student[0]->year;?> as a Regular/ Irregular student from this college. He/She Obtained GPA <?php echo $student[0]->gpa;?> in the <?php echo $student[0]->group; ?> Group. His/Her Roll<?php /* was Muktagachha */ ?> No- <?php echo $student[0]->roll;?>, Reg: No <?php echo $student[0]->reg_id;?>, Session <?php echo $student[0]->session;?> .</p></br> <p>
              &nbsp; &nbsp; &nbsp; During his/her college studies, his/her conduct was satisfactory. He/She bears a good moral character. To the best of my knowledge, he/she is not involved in any activity subversive of the state or of discipline. </br>
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  I wish him every success in life.
            </p>
            <div class="clearfix">
                <div class="item-2" style="margin-top: 70px;margin-left: 8px;font-style: italic;font-weight: 600;">
                    <h4>Prepared by</h4>
                </div>
                <div class="item-1" style="margin-right: 8px;">
                    <h4 style="font-size: 18px;margin-top: 70px;font-style: italic;font-weight: 600;">Principal <br> <span>
                       Bangabandhu Govt. College<br/>
                       Tarakanda, Mymensingh
                    </h4>
                    </div>
                </div>
            </div>
        </div>
        <?php } else {?>
            <div class="col-md-offset-3 col-md-6 col-xs-12">
                <h3 class="well well-lg text-center text-danger">Record Not Found !</h3>
            </div>
        <?php }?>
    </body>
</html>