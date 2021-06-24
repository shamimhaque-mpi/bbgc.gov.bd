<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo ucwords(str_replace('_',' ',$site_name)) . ' | ' . ucwords(str_replace('_',' ', $meta_title)); ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo site_url('private/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Awesome Font CSS -->
    <link href="<?php echo site_url('private/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo site_url('private/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo site_url('private/css/form.css'); ?>" rel="stylesheet">
</head>

<body>

    <div class="login-wrapper">
        <div class="login-content">
            <div class="login-panel">

                <div class="login-panel-title">
                    <h2>ADMIN <span>PANEL</span></h2>
                    <h4>LOGIN TO YOUR ACCOUNT</h4>
                </div>

                <!-- div class="login-icon">
                    <img src="img/key.png" alt="no image">
                </div -->

                <div class="login-form">
                <?php echo $this->session->flashdata('error'); ?>

                    <?php echo form_open('access/users/login');?>    

                        <div class="login-field form-group" style="margin-bottom: 5px;">
                            <span><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" name="username" class="form-control" required placeholder="Username">
                        </div>

                        <div class="login-field form-group">
                            <span><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" name="password" placeholder="Password" required class="form-control">
                        </div>

                        <input class="form-control login" type="submit" name="submit" value="Login">

                        <div class="form-group">
                           <label style="color: #333;"><input type="checkbox" name="true">&nbsp; Remember me</label>
                           <span class="pull-right"><a href="forgetPassword.html">Forget Password?</a></span>
                        </div>

                    <?php echo form_close(); ?>

                </div>

                <hr style="border-color: #666">

                <p><a href="<?php echo base_url(); ?>";>Go back home</a></p>

            </div>
        </div>

    </div>      
   
</body>
</html>