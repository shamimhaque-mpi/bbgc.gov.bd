<style>
	.admit-upper-part{
		width: 100%;
		border: 1px solid #000;
		height: 130px;
		padding-top: 15px;
	}
	.admit-upper-part-aside{
		float: left;
	}
	.admit-upper-part-aside img{
		width: 100px;
		height: 100px;
		margin-left: 15px;
	}
	.admit-upper-part-aside h4{
		/*line-height: 100px;*/
		padding-top: 10px;
		padding-left: 10px;
		font-weight: bold;
	}
	.admit-upper-part-aside h4 span{
		font-weight: normal;
		font-size: 16px;
	}
	.admit-middle-part p{
		font-size: 18px;
		font-weight: bold;
		text-align: center;
		padding: 10px 0;
		margin-bottom: 0;
	}
	.admit-lower-part{
		border: 1px solid #000;
		width: 100%;
		height: auto;
		min-height: 450px;
	}
	.admit-lower-part-aside1{
		float: left;
		width: 70%;
	}
	.admit-lower-part-aside1 table tr td{
		border: 1px solid transparent;
	}
	.admit-lower-part-aside1 table tr td:nth-child(1){
		width: 30%;
	}
	.admit-lower-part-aside1 table tr td{
		text-align: left;
		padding-left: 5px;
	}
	.admit-lower-part-aside1 table tr td img{
		margin-top: 30px;
		height: 60px;
		width: 180px;
	}
	.admit-lower-part-aside2{
		width: 25%;
		float: right;
	}
	.admit-lower-part-aside2 img{
		width: 150px;
		height: auto;
		float: right;
		border: 1px solid #000;
		margin: 5px 5px 0 0;
	}
	.pri-sig img{
		  height: 64px;
		  width: 64px;
		  float: right;
		  margin-right: 65px;
		
	}
	.pri-sig p{
		padding-top: 145px;
		float: right;
	}
	
	 .direction p{
  padding-top: 10px;
  text-align: center;
 }
 .direction ol{
  padding-top: 0px;
  padding-left: 15px;
  text-align: justify;
 }
	
	
	
	/* print */
	
	 @page{
  margin-bottom:0;
 }
	
	
	
	@media print{
		.admit-card{
			width: 100%;
		}
		.admit-upper-part{
			border: 1px solid #000;	
			border-top: 1.5px solid #000;	 			
		}
		.admit-lower-part{
			border: 1px solid #000;
		}
		.admit-lower-part{
			min-height: 450px;
		}
		.admit-upper-part-aside img,
		.admit-lower-part-aside1 table tr td img,
		.pri-sig img{
			border: 1px solid transparent;
		}
		h4.bn-hide{display:none;}
	}
</style>
<div class="col-md-9">
    <div class="row single search admit-card">
        <h3>Pay Slip Preview <span onclick="print()"><i class="fa fa-print"></i> Print</span></h3>
		
		<div class="admit-upper-part">
			<div class="admit-upper-part-aside">
				<img src="<?php echo site_url('public/img/ccc-logo.jpg');?>" alt="CCC Logo." />
			</div>
			<div class="admit-upper-part-aside">
				<h4>The Cadet Coaching Centre<br/><b> Zila School Road, Mymensingh.</b> <br/><span>Admission Test - <?php echo date("Y");?></span></h4>
			</div>
		</div>
		<?php
		if($slip !=NULL)
		{
		  ?>
			
		<div class="admit-middle-part">
			<p>Pay Slip</p>
		</div>
		
		<div class="admit-lower-part">
			<div class="admit-lower-part-aside1">
				<br><table>
					<tr>
						<td>Tracking ID</td>
						<td>: <b><?php echo $username; ?></b></td>
					</tr>
					<tr>
						<td>Name</td>
						<td>: <b><?php echo $name; ?></b></td>
					</tr>
					<tr>
						<td>Father's Name</td>
						<td>: <?php echo $slip[0]->father_name;?></td>
					</tr>
					<tr>
						<td>Mother's Name</td>
						<td>: <?php echo $slip[0]->mother_name;?></td>
					</tr>
					
					<tr>
						<td>Admission Status</td>
						<td>:<b> <?php echo ucwords(str_replace('_',' ', $slip[0]->status));?></b></td>
					</tr>
					<!-- <tr>
						<td>Trx Id</td>
						<td>: <b><?php echo $slip[0]->trxid;?></b></td>
					</tr> -->
					
					
					
				</table>
			</div>
			<div class="admit-lower-part-aside2">
				<img class="img-responsive" src="<?php echo site_url($photo); ?>" alt="<?php echo $name; ?>" />
			</div>
			<div class="pri-sig">
			<p><img src="<?php echo site_url('public/upload/signature/chairman_signature.png');?>" alt="Chairman's Signature." /> <br/>
			--------------------------
			<br/>Chairman
			<br/>CCC, Mymensingh.</p>
		</div>
		</div>		
		<br><h4 class="bn-hide" style="color:#147814; font-weight:bold;">উপরের Print বাটনে ক্লিক করে  Pay Slip Print করুন । </h4>
		<?php
		}
		else
		{
			echo "<h4 style='text-align:center; color:red; font-weight:bold;'>Sorry! You are not Admitted.</h4>";
		}
		?>
     
    </div>
</div>