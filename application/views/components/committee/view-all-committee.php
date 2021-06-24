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
        .hide{
            display: block !important;
        }
        .none{
            display: none;
        }
        .panel-footer{
            display: none;
        }
        .title{
            font-size: 25px;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">
    <?php //echo "<pre>"; print_r($info); echo "</pre>"; ?>
    <?php echo $confirmation; ?>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Show Member</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>


            <div class="panel-body">

                <img class="hide" style="width: 100%; margin-bottom: 10px;" src="<?php echo site_url('public/banner/banner.png') ?>">
                <span class="hide print-time text-center">সকল কমিটি</span>

                
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Post</th>
                        <th>Mobile Number</th>
                        <th>Year</th>
                        <th class="none">Action</th>
                    </tr>
                    <?php 
                        foreach ($member_info as $key => $member) { ?>
                    <tr>
                        <td> <?php echo $key+1; ?> </td>
                        <td> <?php echo $member->member_date; ?> </td>
                        <td> <img src="<?php echo base_url($member->member_photo); ?>" width="50px" height="50px" alt=""></td>
                        <td> <?php echo $member->member_full_name; ?> </td>
                        <td> <?php echo ucfirst($member->member_post); ?> </td>
                        <td> <?php echo $member->member_mobile_number; ?> </td>
                        <td> <?php echo $member->member_year_from; ?>-<?php echo $member->member_year_to; ?> </td>
                        <td class="none" style="width: 216px;">
                            <a class="btn btn-primary" href="<?php echo site_url('committee/committee/member_profile');?>?id=<?php echo $member->id; ?>">View</a>
                            <a class="btn btn-warning" href="<?php echo site_url('committee/committee/edit_member') ;?>?id=<?php echo $member->id; ?>">Edit</a>
                            <a class="btn btn-danger" onclick="return confirm('This Data will delete permanently');" href="?delete_token=<?php echo $member->id;?> & img_url=<?php echo $member->member_photo;?>">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                
                </table>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

