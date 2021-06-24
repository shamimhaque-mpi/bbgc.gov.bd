 <style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer {
            display: none !important;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .panel .hide{
            display: block !important;
        }
        .title{
            font-size: 25px;        
        }
        .hide{
       	 display: block !important;
        }
       
    }
</style>

<div class="container-fluid">
    <div class="row">
	<?php echo $confirmation; ?>
        <div class="panel panel-default none">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>পেস্লিপ কমেন্ট</h1>
                </div>
            </div>

            <div class="panel-body">

                <?php 
                $attr=array('class'=>'form-horizontal');
                echo form_open('student_payment/payment/paymentSlipComment', $attr); ?>

                    <div class="form-group">
                        <label class="col-md-2 control-label">বক্তব্য</label>

                        <div class="col-md-5">
                            <input type="text" class="form-control" name="payslipComment" value="<?php if($result!= NULL){ echo $result[0]->payslipComment; }?>">
                        </div>
                    </div>


                    <div class="col-md-7">
                        <div class="btn-group pull-right">
                            <input type="submit" value="সাবমিট" name="viewQuery" class="btn btn-primary">
                        </div> 
                    </div> 

                <?php echo form_close(); ?>
                
                <br><br><br>
                
                

            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
