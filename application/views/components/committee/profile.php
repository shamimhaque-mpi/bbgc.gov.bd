
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
            width: 100%;
            top: 0;
            left: 0;
            position: absolute;
        }
        .none{
            display:  none;
        }
        .panel-heading{
            display: none;
        }
        .panel-footer{
            display: none;
        }
        .hide{
            display: block !important;
        }
        .title{
            font-size: 25px !important;
        }
    }

</style>

<div class="container-fluid">
    <div class="row">
    <?php //echo "<pre>"; print_r($member_info); echo "</pre>"; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title">
                    <h1 class="pull-left">Profile View</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">
               
                <img style="width: 100%; margin-bottom: 10px;" src="<?php echo site_url('public/banner/banner.png') ?>">
                <span class="print-time text-center" style="display: block;">কমিটির সদস্যের বিস্তারিত তথ্য</span>

                <hr style="border-bottom: 1px solid #ccc; margin-top: 0;">
                <h3 style="margin-top: -10px;" class="text-center hide">Committee Member Information</h3>

                <div class="row">
                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Full Name</label>
                        <div class="col-xs-6">
                            <p><?php echo $member_info[0]->member_full_name; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Post</label>
                        <div class="col-xs-6">
                            <p><?php echo $member_info[0]->member_post; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Year</label>
                        <div class="col-xs-6">
                            <p><?php echo $member_info[0]->member_year_from."-".$member_info[0]->member_year_to; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Mobile Number</label>
                        <div class="col-xs-6">
                            <p><?php echo $member_info[0]->member_mobile_number; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6 no-padding">
                        <label class="control-label col-xs-6">Address</label>
                        <div class="col-xs-6">
                            <p><?php echo $member_info[0]->member_address; ?></p>
                        </div>
                    </div>

                </div>

            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

