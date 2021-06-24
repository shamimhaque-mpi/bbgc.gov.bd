<style>
.form-element-custom{
	padding: 5px 0px;
}

form.horizontal .form-element-custom > label{
	text-align: left;
	width: 25%;
}

.horizontal .form-element-custom > label input[type="checkbox"]{
	float: left;
	margin-top: 4px;
}

.form-element-custom input[type="text"]{
	height: 25px;
	width: 25%;
}

.payment-slip{
	border: 1px solid #000;
	max-width: 600px;
	background: #fff;
	margin: 0px auto;
}

.payment-slip img{
	width: 100%;
	max-width: 600px;
	height: auto;
}

table.payment-top-table{
	margin: 0 0 15px;
	border: none;
	box-shadow: 0px 0px 5px transparent;
}

table.payment-top-table tr,
table.payment-top-table th,
table.payment-top-table td{
	border: none;
	text-align: left;
	background: #fff;
}

table.payment-top-table tr:first-child td{
	padding-bottom: 10px;
}

/*table.payment-bottom-table td:first-child{
	text-align: left;
}*/

table.payment-bottom-table tr th:nth-child(2){
	text-align: left;
	padding-left: 15px;
}

table.payment-bottom-table td:nth-child(2){
	  padding-left: 20px;
    padding-right: 15px;
    text-align: left;
}

table.payment-bottom-table th:nth-child(3){
	text-align: center;
}

table.payment-bottom-table td:nth-child(3){
	text-align: center;
	padding-right: 20px;
}

.title{
	text-align: center;
}

.payment-slip p{
	padding: 5px 5px 0;
}

.title b{
	margin-right: -230px;
	background: rgba(0,150,135,1);
	color: #fff;
	padding: 5px 8px;
	border-radius: 16px;
}

.title span{
	float: right;
	color: rgba(0,0,0,0.5);
}

p.half span{
	margin-left: 30%;
}

p.signature{
	padding-top: 60px;
}

p.signature span{
	border-top: 1px solid rgba(0,0,0,0.5);
}

    /* print media*/
	@page{
		margin-top: 20px;
		margin-bottom: 20px;
	}
    @media print{
		aside.left-aside,
		nav.navigation,
		table tr.table-top,
		header,
		.alert-success,
		.alert-warning{
			display: none;
		}
		.payment-slip{
			margin: 0 auto;
			border-left: 1.5px solid #000;
			border-top: 1.5px solid #000;
		}
		button.button{display: none;}
		table{
			width: 100%;
			box-shadow: 0 0 0 transparent ;
		}

		table.payment-top-table tr td{
			line-height: 5px;
		}
		table.payment-bottom-table,
		table.payment-bottom-table tr,
		table.payment-bottom-table tr th,
		table.payment-bottom-table tr td{
			border: 1px solid #000;
			border-collapse: collapse;
		}
		.title b{
			border-bottom: 2px solid rgba(0,0,0,0.2) !important;
		}
		table.payment-bottom-table tr td:first-child{
			text-align: center;
		}


		p.title b{
			border-bottom: 1px solid rgba(0,0,0,0.3);
			border-radius: 0;
		}
		p span.authorised{
			border-top: 1.5px solid rgba(0,0,0,0.3);
		}
    }
</style>

<!-- one column page main container start here -->
<div class="column global-pad">
<?php
if($slip != NULL)
 {
 $month=array('1'=>'January','2'=>'February','3'=>'March','4'=>'April','5'=>'May','6'=>'June','7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December');

  foreach($slip as $key=>$value):
   {
      $pay=$value->payment;
      $payment=json_decode($pay,TRUE);
    ?>
      <div class="row payment-slip">
        <button class="button" onclick="print();">Print</button>
        <img src="<?php echo site_url('public/upload/banner/banner.png'); ?>" alt="banner" />

        <table class="payment-top-table">
            <tr>
                <td colspan="3"><p class="title"><b>Payment Slip</b></p></td>
            </tr>
            <tr>
                <td colspan="2">Roll No:<?php echo $value->roll;?><td>
                <td>Date: <?php echo $value->datetime;?></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left:0;"><p>Student's Name: <b><?php echo $slip[0]->name;?></b></p></td>
                <td>Month: <?php echo $month[$value->month];?></td>
            </tr>
			<tr>
                <td>Class:

							<?php
     				if($value->class=='0A')
					{
					  echo " Atfal(Alif)";
					}
					else if($value->class=="0B")
					{
						echo "Atfal(Jim)";
					}
				   else if($value->class=="1A")
					{
						echo "Awal";
					}

				  else if($value->class=="02")
					{
						echo "Sani";
					}
				 else if($value->class=="03")
					{
						echo "Calis";
					}
				else if($value->class=="04")
					{
						echo "Rabe";
					}
				else if($value->class=="05")
					{
						echo "Khamesh";
					}
				else if($value->class=="06")
					{
						echo "Sadesh";
					}
				else if($value->class=="07")
					{
						echo "Sabe";
					}
				else if($value->class=="08")
					{
						echo "Saman";
					}
				else if($value->class=="09")
					{
						echo "Tase";
					}
				else if($value->class=="10")
					{
						echo "Asher";
					}
				else
					{
						echo "Hifz";
					}
				 ?>
				<td>

            </tr>
        </table>

        <table class="payment-bottom-table">
            <tr>
				<th><b>S.L</b></th>
                <th><b>Fee</b></th>
                <th><b>Taka</b></th>
            </tr>
		    <?php
			if($payment['residential_month_fee'] != 0)
			{
				?>
				 <tr>
				  <td>1</td>
                  <td>Residential Monthly Fee</td>
                  <td><?php echo $payment['residential_month_fee'];?></td>
                 </tr>
				<?php
			}
			?>
            <?php
			if($payment['current_month_fee'] != 0)
			{
			 ?>
				<tr>
					<td>2</td>
					<td>Current Month Fee</td>
					<td><?php echo $payment['current_month_fee'];?></td>
				</tr>
				<?php
			}
			?>
			<?php
			if($payment['advance_fee'] != 0)
			{
			 ?>
				<tr>
					<td>3</td>
					<td>Advance Fee</td>
					<td><?php echo $payment['advance_fee'];?></td>
				</tr>
				<?php
			}
			?>
			<?php
			if($payment['admission_fee'] != 0)
			{
			 ?>
				<tr>
					<td>4</td>
					<td>Admission Fee</td>
					<td><?php echo $payment['admission_fee'];?></td>
				</tr>
				<?php
			}
			?>
			<?php
			if($payment['admission_form_fee'] != 0)
			{
			 ?>
				<tr>
					<td>5</td>
					<td>Admission Form Fee</td>
					<td><?php echo $payment['admission_form_fee'];?></td>
				</tr>
				<?php
			}
			?>
			<?php
			if($payment['session_fee'] != 0)
			{
			 ?>
				<tr>
					<td>6</td>
					<td>Session Fee</td>
					<td><?php echo $payment['session_fee'];?></td>
				</tr>
				<?php
			}
			?>
			<?php
			if($payment['science_lab'] != 0)
			{
			 ?>
				<tr>
					<td>7</td>
					<td>Science Lab</td>
					<td><?php echo $payment['science_lab'];?></td>
				</tr>
				<?php
			}
			?>
           <?php
			if($payment['magazin'] != 0)
			{
			 ?>
				<tr>
					<td>8</td>
					<td>Magazine</td>
					<td><?php echo $payment['magazin'];?></td>
				</tr>
				<?php
			}
			?>
			<?php
			if($payment['receipt_form'] != 0)
			{
			 ?>
				<tr>
					<td>9</td>
					<td>Receipt &#38; Forms</td>
					<td><?php echo $payment['receipt_form'];?></td>
				</tr>
				<?php
			}
			?>
			<?php
			if($payment['testimonial_id_marksheet_certificate'] != 0)
			{
			 ?>
				<tr>
					<td>10</td>
					<td>Testimonial/ID/Marksheet/Certificate</td>
					<td><?php echo $payment['testimonial_id_marksheet_certificate'];?></td>
				</tr>
				<?php
			}
			?>
			<?php
			if($payment['examination_fee'] != 0)
			{
			 ?>
				<tr>
					<td>11</td>
					<td>Examination Fee</td>
					<td><?php echo $payment['examination_fee'];?></td>
				</tr>
				<?php
			}
			?>
			<?php
			if($payment['registration_fee'] != 0)
			{
			 ?>
				<tr>
					<td>12</td>
					<td>Registration Fee</td>
					<td><?php echo $payment['registration_fee'];?></td>
				</tr>
				<?php
			}
			?>
			<?php
			if($payment['seminar_fee'] != 0)
			{
			 ?>
				<tr>
					<td>13</td>
					<td>Seminar Fee</td>
					<td><?php echo $payment['seminar_fee'];?></td>
				</tr>
				<?php
			}
			?>
			<?php
			if($payment['seat_rent'] != 0)
			{
			 ?>
				<tr>
					<td>14</td>
					<td>Seat Rent</td>
					<td><?php echo $payment['seat_rent'];?></td>
				</tr>
				<?php
			}
			?>





			<?php
			if($payment['book'] != 0)
			{
			 ?>
				<tr>
					<td>15</td>
					<td>Book Fee</td>
					<td><?php echo $payment['book'];?></td>
				</tr>
				<?php
			}
			?>

			<?php
			if($payment['diary'] != 0)
			{
			 ?>
				<tr>
					<td>16</td>
					<td>Diary Fee</td>
					<td><?php echo $payment['diary'];?></td>
				</tr>
				<?php
			}
			?>

			<?php
			if($payment['id_card'] != 0)
			{
			 ?>
				<tr>
					<td>17</td>
					<td>ID Card Fee</td>
					<td><?php echo $payment['id_card'];?></td>
				</tr>
				<?php
			}
			?>

			<?php
			if($payment['transport'] != 0)
			{
			 ?>
				<tr>
					<td>18</td>
					<td>Transport Fee</td>
					<td><?php echo $payment['transport'];?></td>
				</tr>
				<?php
			}
			?>

			<?php
			if($payment['sports'] != 0)
			{
			 ?>
				<tr>
					<td>19</td>
					<td>Sports</td>
					<td><?php echo $payment['sports'];?></td>
				</tr>
				<?php
			}
			?>

			<?php
			if($payment['coaching'] != 0)
			{
			 ?>
				<tr>
					<td>20</td>
					<td>Coaching</td>
					<td><?php echo $payment['coaching'];?></td>
				</tr>
				<?php
			}
			?>
			<?php
			if($payment['study_tour'] != 0)
			{
			 ?>
				<tr>
					<td>21</td>
					<td>Study Tour</td>
					<td><?php echo $payment['study_tour'];?></td>
				</tr>
				<?php
			}
			?>







			<?php
			if($payment['other_fee'] != 0)
			{
			 ?>
				<tr>
					<td>22</td>
					<td>Other Fee</td>
					<td><?php echo $payment['other_fee'];?></td>
				</tr>
				<?php
			}
			?>

            <tr>
				<td>&nbsp;</td>
                <td><b>Total</b></td>
                <td><b><?php echo $slip[0]->total;?></b></td>
            </tr>
        </table>
        <br/><p>(In Words): <b style="text-transform: uppercase;"><?php echo $slip[0]->in_words;?></b> Taka Only</p>
        <p class="signature">
            <span style="margin-left: 5%;">&nbsp;</span>
            <span style="margin-left: 15%;">&nbsp;</span>
            <span class="authorised" style="float: right;margin-right: 5%;">Authorised Signature</span>
        </p>
        <p style="text-align:center;font-size:12px">শিক্ষার্থী দ্বারা আর্থিক লেন-দেন বাঞ্ছনীয় নয়। বেতন পরিশোধের রশিদ যত্ন করে রেখে দিবেন। </p>
        <p style="text-align:center;"><small>Software by <a href="">Freelance IT Lab</a></small></p>
    </div>
	<br/>
		<?php
       }
	   endforeach;
     }
     else
      {
	   echo"<h3 style='color:red;text-align:center;'>Sorry! No Record Found.</h3>";
      }
	?>
</div>
<!-- one column page main container end here -->
