<!DOCTYPE html>
<html ng-app="frontendApp">
<head>
    <title><?php echo $site_name; ?> | <?php echo ucwords(str_replace('_',' ',$meta_title));?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- include css -->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('public/css/bootstrap.css'); ?>" /> 
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('public/css/font-awesome.css'); ?>" /> 

    <!-- slider css -->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('public/css/slider.css'); ?>" /> 
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('public/css/skitter.styles.css'); ?>" /> 

    <link rel="stylesheet" type="text/css" href="<?php echo site_url('public/css/style.css'); ?>" /> 
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('public/css/responsive.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('public/css/jasny-bootstrap.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('public/css/wow.style.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('public/plugins/ligntboxMaster/css/lightbox.css'); ?>" />
    <!--<link rel="stylesheet" href="http://ndcm.edu.bd/public/css/sakura.min.css" />-->

    <!-- include js  -->
    <script type="text/javascript" src="<?php echo site_url('public/js/jQuery.js'); ?>"></script>

    <!-- slider js -->
    <!--script type="text/javascript" language="javascript" src="<?php echo site_url('public/js/jquery-2.1.1.min.js');?>"></script-->
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="<?php echo site_url('public/js/mapInitialize.js');?>"></script>
    <!--script type="text/javascript" language="javascript" src="<?php echo site_url('public/js/jquery.easing.1.3.js');?>"></script-->
    <script type="text/javascript" language="javascript" src="<?php echo site_url('public/js/jquery.skitter.min.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo site_url('private/js/angular.js');?>"></script>
       <script>
        $(document).ready(function(){
            hitting();
            setInterval(hitting,5000);
        });

        function hitting(){
            $.ajax({
                url: '<?php echo site_url('home/c_counter');?>',
                type: 'POST',
            })
            .done(function(response) {
                //console.log(response);
            });
        }
        
    </script>
    <link href="https://fonts.maateen.me/siyam-rupali/font.css" rel="stylesheet">
    <style>
        body {
            font-family: 'SiyamRupali', Arial, sans-serif;
        }
    </style>
</head>

<body>
    <div class="wrapper">
