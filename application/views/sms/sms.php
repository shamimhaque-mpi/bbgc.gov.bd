<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title></title>
        <link rel="icon" href="" type="image/png">

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
        <link href="<?php echo site_url('private/css/login.min.css'); ?>" rel="stylesheet">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	    <style>
	        .form-head h3 {margin: 0px !important;line-height: 2.7;}
    		.form-group {position: relative;}
    		.form-group #show {
    			position: absolute;
    			top: 47%;
    			right: 3px;
    			border: none;
    			background: transparent
    		}
	        .form-group #show i {color: #1976D2;opacity: 0.6;font-size: 18px;}
	    </style>
    </head>

    <body style="background: url(<?php echo site_url('public/programmer.jpg'); ?>);background-repeat: no-repeat;background-size: cover;">

        <section class="container">
            <?php /*  <form method="post" action="<?php echo site_url('smsControl/login');?>" class="login-form">
            
            <div class="form-head">
                <h3>Control Panel</h3>
            </div>
            <?php
                if(isset($_SESSION['log'])){
                    echo $_SESSION['log'];
                }
            ?>

            <div class="form-input">
                <?php 
                
                $f_class='';
                if($this->session->flashdata('error')){
                   $f_class= 'alert alert-danger alert-dismissible';
                 }
                 if($this->session->userdata('msg_updated_password')){
                    $f_class= 'alert alert-success';

                 }

                 ?>   
                <div  class="<?php echo $f_class; ?>">
                    <?php 
                        if($this->session->flashdata('error'))
                        {
                     ?>     
                        <strong><h3>LOGIN WARNING</h3></strong>
                        <h5>Wrong Username or Password!</h5>     
                     <?php  
                        }
                        if($this->session->userdata('msg_updated_password')){
                            echo $this->session->userdata('msg_updated_password');
                            $this->session->unset_userdata('msg_updated_password');
                        } 
                    ?>
                </div>

                <div class="form-group">
                    <label>Usernames</label>
                    <input type="text" name="username" placeholder="Username" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input type="password" id="pass" name="password" placeholder="Password" class="form-control" required>
                    <div id="show" class="btn btn-default" onclick="showHide()">
                    	<i class="glyphicon glyphicon-eye-open"></i>
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" name="submit_login" class="btn" value="Login">
                </div>

            </div>

            </form>   */ ?>
            <div class="row justify-content-center">
                <div class="" style="position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);width: 400px;">
                    <div class="card bg-white">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo site_url('smsControl/login');?>">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label></label>
                                    <input type="submit" class="btn btn-success float-right" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </body>
</html>