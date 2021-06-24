<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Testimonial</title>
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
            .print-area-content{
                left: 0;
                position: absolute;
                top: 0;
                width: 100%;
                padding: 50px;
                height: 100%;
            }
            .serial-no{
            	position: absolute;
            	top: 130px;
            	font-size: 20px;
            }
            .item-2{
            	float: left;
            	margin-top: 75px;
            	font-size: 20px;
            }
            .print-area-content .item-1{
            	float: right;
            	text-align: center;
            	font-size: 25px;
            }
            .print-area-content p{
            	text-align: justify;
            	font-size: 20px;
            	line-height: 2;
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
             	.print-area {margin-top:25% !important;}
                .print-area-content {padding:0 15px 0 60px; }
                .print , .testomonial{ display : none; }
            }
        </style>
    </head>
    <body>
        <div class="print-area">
            <!-- img class="print-area-img" src="<?php echo site_url('private/images/pring-bg.jpg'); ?>" alt="" -->
            <div class="print-area-content">
            <style media="screen">
                .main-header, .main-header hr {display: none;}
            @media print {
                .main-header {display: block;}
            }
            </style>
            <div class="title-1">
                <!--h2 style="margin: 30px auto; text-align: center; border-bottom: 1px solid #000; width: 215px;">Testimonial</h2-->
                <a class="print btn btn-primery pull-right print-custom" style="margin-top: -45px;;float: right;color: blue;border: 1px solid blue;padding: 5px 15px;font-size: 12px; cursor: pointer;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                <h4 class="date" style="float: right;font-style: italic;font-size: 20px;font-weight: 600;">Date: ...../....../.....</h4>
            </div>
            <div class="info">
                <h4 class="slno" style="margin: 10px 0;font-size: 20px;font-style: italic;font-weight: 600;">Serial no. <?php echo $student[0]->id;?></h4>
            </div>
            <p>&nbsp; &nbsp; &nbsp; This is to certify that <?php echo strtoupper($student[0]->name); ?>, Father’s Name- <?php echo strtoupper($student[0]->father_name); ?>, Mother’s Name- <?php echo strtoupper($student[0]->mother_name); ?>, academic year <?php echo $student[0]->session; ?>, was a student of Higher Secondary Science/ Humanities/ Business Studies Group. He took part in the Higher Secondary Certificate Examination of Dhaka Board <?php echo $student[0]->session;?> as a Regular/ Irregular student from this college. He Obtained GPA <?php echo $student[0]->gpa;?> in the Science/ Humanities/ Business Studies Group. His Roll was Muktagachha No- <?php echo $student[0]->roll;?>, Reg: No <?php echo $student[0]->reg;?>, Session <?php echo $student[0]->session;?> .<br/>
            
              &nbsp; &nbsp; &nbsp; During his college studies, his conduct was satisfactory. He bears a good moral character. To the best of my knowledge, he is not involved in any activity subversive of the state or of discipline. </br>
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  I wish him every success in life.
            </p>
            <div class="clearfix">
                <div class="item-2" style="margin-top: 70px;font-style: italic;font-weight: 600;">
                    <h4>Prepared by</h4>
                </div>
                <div class="item-1">
                    <h4 style="font-size: 18px;margin-top: 70px;font-style: italic;font-weight: 600;">Principal <br> <span>
                       Govt. Shahid Smriti College,<br/>
                       Muktagachha, Mymensingh
                    </h4>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>