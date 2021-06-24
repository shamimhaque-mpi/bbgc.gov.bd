<style>
	@media print{
		aside{
			display: none !important;
		}
		nav{
			display: none;
		}
		.panel{
			border: 1px solid transparent;
			left: 0px;
			position: absolute;
			top: 0px;
			width: 100%;
		}
		.none{
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
			font-size: 25px;
		}
	}
</style>


<div class="container-fluid block-hide">
    <div class="row">

        <div class="panel panel-default">
            
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1> খরচের ভাউচার<h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> প্রিন্ট</a>
            </div>

            <div class="panel-body">
                
                <!-- Print banner -->
                <img class="img-responsive print-banner hide" src="<?php echo site_url('public/banner/banner.jpg'); ?>">

                <div class="no-title">&nbsp;</div>
                <h3 class="hide text-center" style="margin: 0 0 20px 0;">খরচের ভাউচার</h3>
                <table class="table table-bordered">
                    <tr>
                        <th width="50">ক্র.নং</th>
                        <th>খরচের খাত</th>
                        <th>খরচের মাধ্যম</th>
                        <th>পরিমাণ</th>
                    </tr>
                    <?php 
                        $total =0.00; 
                        foreach($info as $key=>$row) {  $total += $row->amount;
                         $getField = $this->action->read('cost_field',array('code'=>$row->cost_field));
                    ?>
                    <tr>
                        <td><?php echo ($key+1); ?></td>
                        <td><?php echo filter($getField[0]->cost_field); ?></td>
                        <td><?php echo $row->spend_by; ?></td>
                        <td><?php echo $row->amount; ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="3" class="text-right">মোট</th>
                        <th><?php echo $total; ?> Tk</th>
                    </tr>
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>




