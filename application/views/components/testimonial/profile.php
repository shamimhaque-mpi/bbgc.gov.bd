<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Testimonial Certificate</title>
    <link href="<?php echo site_url('private/css/printstyle.css'); ?>" rel="stylesheet">
    <style>
      @media print{
        .print{
          display : none;
        }
      }
*,*::before,*::after{
	margin: 0;
	padding: 0;
	box-sizing:  border-box;
}

body{
	background: #fff;
}
.print-area{
	width: 100%;
	margin-left: auto;
	margin-right: auto;
	max-width: 1000px;
	position: relative;
}
.print-area .print-area-img{
	width: 100%;
	padding: 10px;
}
.print-area-content{
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    padding: 50px;
    height: 100%;
}
.print-area-content figure {
	position: relative;
	margin-bottom: 50px;
	width: 20%;
	margin: -24px auto;

}
.print-area-content figure img{
	width: 100%;
	position: relative;
}
.print-area-content figure:after{
	content: '';
	width: 100%;
	height: 100%;
	top: 0;
	opacity: 0;
	display: block;
	position: absolute;
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

/* .print-area-content .item-1 .slno{
	float: left;
} */
.print-area-content .item-1{
	float: right;
	text-align: center;
	font-size: 25px;
}
.print-area-content p{
	text-align: justify;
	font-size: 20px;
	line-height: 2;
	margin-bottom: 5%;
}
.print-area-content .sign{
	float: right;
	border-bottom: 2px solid #000;
	width: 200px;

	text-align: center;
}

 @media print{
 	.print-area-content figure h1{
        font-size: 25px;
    }
 }      
    </style>
</head>
<body>
    <div class="print-area">
        <!-- img class="print-area-img" src="<?php echo site_url('private/images/pring-bg.jpg'); ?>" alt="" -->
        <div class="print-area-content">
            <!-- figure>
                <img src="<?php echo site_url('private/images/banner.jpg'); ?>" alt="">
            </figure -->

            <!--pre><?php //print_r($student);?></pre-->
            <?php
              $address = json_decode($student[0]->address,true);
            ?>

            <!-- pre><?php print_r($address);?></pre -->

            <!-- span class="serial-no">?????????????????? ??????- <strong><?php //echo $student[0]->id; ?></strong></span -->

            <?php
               //$session=explode('-',$student[0]->session);
               //$start=strtotime($session[0]);
               //$year = date("Y", strtotime(date("Y-m-d", $start) . " + 4 years"));
            ?>

            <style media="screen">
                .main-header, .main-header hr {display: none;}
                @media print {
                    .main-header {display: block;}
                }
            </style>
            <!-- div class="main-header">
                <div class="col-xs-2">
	                		<figure class="pull-left">
	                			<img class="img-responsive" src="<?php echo site_url('public/logo/logo.png'); ?>" style="width: 100px; height: 100px;" alt="">
	                		</figure>
	                	</div>

	                	<div class="col-xs-8">
							<div class="institute">
								<h2 class="text-center title" style="margin-top: 40px !importnat; font-weight: bold;">Govt. Shahid Smrity College, Muktagacha, Mymensingh.</h2>
							</div>
						</div>
                <hr>
            </div -->

            <div class="title-1">
                <h2 style="margin: 30px auto; text-align: center; border-bottom: 1px solid #000; width: 215px;">???????????????????????? ????????????</h2>
                <a class="print btn btn-primery pull-right print-custom" style="margin-top: 0;float: right;color: blue;border: 1px solid blue;padding: 5px 15px;font-size: 12px; cursor: pointer;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="info">
                <h4 class="slno" style="margin: 10px 0;">?????????:??????: <?php echo $student[0]->id;?></h4>
                <!-- h4 class="date"></h4 -->
            </div>


               <p>&nbsp; &nbsp; &nbsp; ?????? ??????????????? ???????????????????????? ????????? ?????????????????? ??????, <b><?php echo $student[0]->name; ?></b>, ????????????: <b><?php echo $student[0]->father_name; ?></b>,  ????????????: <b><?php echo $student[0]->mother_name; ?></b>,  ???????????????: <b><?php echo $address['village'];?></b>,  ??????????????????: <b><?php echo $address['upazila'];?></b>,  ????????????: <b><?php echo $address['district'];?></b>  ?????????  ???????????? ????????????????????????????????? <b><?php echo $student[0]->session;?></b> ????????????????????????????????? <b><?php echo $student[0]->class;?></b> ???????????????????????? ???????????????????????? ???????????? ?????????????????? ???????????????/????????????????????? ????????? ?????????????????? ?????????????????? ???????????? ???????????? ???????????????????????????????????? ?????????????????? ??????????????? ????????? ????????????????????? ????????? ???????????? ??????????????? <b><?php echo $student[0]->birth_date;?></b> ????????????:???<br>
               &nbsp; &nbsp; &nbsp; ????????? ????????? ????????????????????? ??????????????? ??????????????? ????????????</p>

		<!-- p>?????? ??????????????? ???????????????????????? ????????? ?????????????????? ??????, <strong><?php echo $student[0]->name; ?></strong> ???????????? <strong><?php echo $student[0]->father_name;?></strong> ???????????? <strong><?php echo $student[0]->mother_name;?></strong> ???????????? ?????????????????????????????? ?????? ???????????? ???????????????/????????????????????? ????????? ??????????????? ????????? ?????? <strong><?php echo $student[0]->roll;?></strong> ??????????????? ?????? <strong><?php echo $student[0]->reg;?></strong>  ?????????????????????????????? <strong><?php echo $student[0]->session;?></strong> ????????? ?????? ???(?????????) ????????? ?????????????????? ???????????? ???????????????????????? ????????????????????????????????? ????????????????????????/ ??????????????????????????? ?????????????????? <strong><?php echo $year;?></strong> ???????????? ???????????????????????? ????????????????????? ???????????????????????? ???????????????????????? ????????? ????????????????????? <strong><?php echo $student[0]->gpa;?></strong> (4.00 ??????????????? ?????? ???????????????) ???????????? ???????????????????????? ?????????????????? ???????????? ????????????????????? ???????????? ????????????????????????????????? ????????????????????????????????? ?????? ????????????????????? ?????? ????????? ????????????????????? ?????????????????? ???????????? ???????????? ???????????? <br> ????????? ????????? ??????????????? ????????????????????? ??????????????? ????????????</p -->

            <div class="clearfix">
                <div class="item-2">
                    <!-- h4 class="date">?????????????????? <?php echo $student[0]->datetime;?></h4 -->
                </div>
                <div class="item-1">
                    <h4 style="font-size: 18px;">????????????????????? <br> <span style="font-weight: normal;">
                        ???????????? ?????????????????? ?????????????????? ??????????????????, ?????????????????????????????????
                    </h4>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
