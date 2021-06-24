
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
        .pro{
            margin-left: 22%;
        }
    }

</style>

<div class="container-fluid">
    <div class="row">
    <?php //echo "<pre>"; print_r($member_info); echo "</pre>"; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title">
                    <h1 class="pull-left"> View Cost</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">
               
                <div class="row">

                    <div class="view-profile">
                        <div class="col-xs-2">
                            <figure class="pull-left">
                                <img class="img-responsive" src="<?php echo site_url('public/logo/logo.png'); ?>" style="width: 100px; height: 100px;" alt="">
                            </figure>
                        </div>

                        <div class="col-xs-8">
                            <div class="institute">
                                <h2 class="text-center" style="margin-top: 10px; font-weight: bold; title">বঙ্গবন্ধু ডিগ্রী কলেজ</h2>
                                <h3 class="text-center" style="margin: 0;">তারাকান্দা, ময়মনসিংহ</h3>
                            </div>
                        </div>

                    </div>

                </div>

                
                <hr style="border-bottom: 1px solid #ccc; margin-top: 0;">
                <h3 style="margin-top: -10px;" class="text-center hide">Cost Information</h3><br/>

                <div class="col-md-12">
                    
                    <table class="table table-bordered table-hover">
                        
                        <tr>
                            <th>Date</th>
                            <td>
                                <p><?php echo $costs[0]->date; ?></p>
                            </td>
                        </tr>
                
                        <tr>
                            <th>Field of Income</th>
                            <td>
                                <p><?php echo $costs[0]->cost_field; ?></p>
                            </td>
                        </tr>
                    
                        <tr>
                            <th>Description </th>
                            <td>
                                <p><?php echo $costs[0]->description; ?></p>
                            </td>
                        </tr>
                   
                        <tr>
                            <th>Spend By</th>
                            <td>
                                <p><?php echo $costs[0]->spend_by; ?></p>
                            </td>
                        </tr>
                   
                        <tr>
                            <th>Amount</th>
                            <td>
                                <p><?php echo $costs[0]->amount.' TK'; ?></p>
                            </td>
                        </tr>
                        
                    </table>

                </div>

            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

