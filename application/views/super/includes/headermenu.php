<?php 
    $where=array('messages_condition'=>'unread');
    $counter=$this->action->read('messages',$where,'desc');
    $total_msg=count($counter);
    $latest_msg=$this->action->read_limit('messages',$where,'desc','5');
?>
<style>
    .view-site:hover{
        color: #333;
    }
</style>


<!-- Page Content -->
<div id="page-content-wrapper">


    <!-- top navigation start -->
    <div class="row">
        <nav class="col-xs-12 content-fixed-nav">
            <ul>
                <li>
                    <a href="#menu-toggle" id="menu-toggle">
                        <i class="fa fa-angle-left"></i>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>

                <li class="dropdown">
                    <a id="message-menu" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge badge-messages"><?php echo $total_msg; ?></span>
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="message-menu">
                        <li class="dropdown-menu-description"><a>Messages</a></li>
                        <?php foreach ($latest_msg as $key => $msg) { ?>
                        <li><a href="<?php echo base_url('visitors/comments/view_comments')?>?id=<?php echo $msg->id; ?>" title="<?php echo $msg->messages_date; ?>"><?php echo $msg->messages_name; ?></a></li>
                        <?php } ?>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('visitors/comments'); ?>">All</a></li>
                    </ul>
                </li>

                <li style="width: 85px;"><a class="view-site" style="font-weight: bold;" target="_blank" href="<?php echo base_url(); ?>">View Site</a></li>

                <!--li class="dropdown">
                    <a id="notification-menu" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge badge-notification">13</span>
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="notification-menu">
                        <li class="dropdown-menu-description"><a>Notification</a></li>
                        <li><a href="#">Notification 1</a></li>
                        <li><a href="#">Notification 2</a></li>
                        <li><a href="#">Notification 3</a></li>
                        <li class="divider"></li>
                        <li><a href="#">More</a></li>
                    </ul>
                </li-->
            </ul>

            <ul class="nav-inner-right">
                <li class="user-menu dropdown" style="width: 72px;">
                    <a class="dropdown-toggle" type="button" data-toggle="dropdown" >
                        <img class="nav-pic" src="<?php echo site_url('private'); ?>/images/pic-male.png" />
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-menu-description"><a>Settings</a></li>
                        <li><a href="<?php echo site_url("settings/profile");?>">Profile</a></li>
                        <li><a href="<?php echo site_url('settings/createProfile'); ?>">Create Profile</a></li>
                        <li><a href="<?php echo site_url("settings/allProfile");?>">All Profiles</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('access/users/logout'); ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <!-- top navigation end -->

    <div class="main-area">&nbsp;</div>