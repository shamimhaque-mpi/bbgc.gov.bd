<!DOCTYPE html>
<html lang="en" ng-app="MainApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Pannel</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo site_url('private/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Bootstrap Date Picker -->
    <link href="<?php echo site_url('private/plugins/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.min.css'); ?>" rel="stylesheet">

    <!-- Bootstrap file upload CSS -->
    <link href="<?php echo site_url('private/plugins/bootstrap-fileinput-master/css/fileinput.min.css') ;?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo site_url('private/css/simple-sidebar.css'); ?>" rel="stylesheet">

    <!-- Awesome Font CSS -->
    <link href="<?php echo site_url('private/css/font-awesome.min.css'); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    
    <link href="<?php echo site_url('private/css/profile.css'); ?>" rel="stylesheet">
    <link href="<?php echo site_url('private/css/form.css'); ?>" rel="stylesheet">
    <link href="<?php echo site_url('private/css/top-nav.css'); ?>" rel="stylesheet">
    <link href="<?php echo site_url('private/css/style.css'); ?>" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="<?php echo site_url('private/css/responsive.css'); ?>" rel="stylesheet">

    <!-- Angular -->
    <script type="text/javaScript" src="<?php echo site_url('private/js/angular.js'); ?>"></script>
    
    <!-- jQuery -->
    <script type="text/javaScript" src="<?php echo site_url('private/js/jquery.js'); ?>"></script>
	<script type="text/javaScript" src="<?php echo site_url('private/js/jquery-ui.min.js'); ?>"></script>
    
    <!-- includ moment for bootstrap calander -->
    <script type="text/javascript" src="<?php echo site_url('private/js/Moment.js'); ?>"></script>
    <script type="text/javaScript" src="<?php echo site_url('private/plugins/bootstrap-datetimepicker-master/build/js/bootstrap-datetimepicker.min.js') ;?>"></script>
    <!-- texteditor Core Javascript -->
	
    <script src="<?php echo site_url('private/plugins/tinymce/js/tinymce/tinymce.min.js')?>"></script>

    <script>
               // Texteditor Script
            tinymce.init({ 
                selector: '#tinyTextarea',
                theme: 'modern',
                plugins: [
                  'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                  'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                  'save table contextmenu directionality emoticons template paste textcolor'
                ],
                // content_css: 'css/content.css',
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | code',
                skin: 'lightgray',
                content_css: "<?php echo site_url('private/css/tinymce.css'); ?>"
            });
        
    </script>
    
    <link href="https://fonts.maateen.me/siyam-rupali/font.css" rel="stylesheet">
    <style>
        body {
            font-family: 'SiyamRupali', Arial, sans-serif;
        }
    </style>
</head>

<body <?php echo $active; ?>>

    <div id="wrapper">

























