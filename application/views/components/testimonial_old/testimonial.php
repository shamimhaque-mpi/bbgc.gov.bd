<style>
    .student-table{
        width: 100%;
        margin-bottom: 15px;
    }
    .student-table tr td{
        padding: 2px 0;
    }

    .instruction ul li{
        padding-left: 15px;
        margin-bottom: 10px;
    }
    .instruction ul li i{
        font-size: 8px;
    }

    /* custom form style*/

    .custom-form .control-label{
        float: left;
        margin-right: 10px;
        padding-top: 6px;
        width: 36%;
    }
    .custom-form .form-group{
        margin-bottom: 5px;
    }
    .custom-form .custom-file{
        width: 200px;
        display: table;
    }

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
        .panel .none{
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
        .custom-form .control-label{
            width: 230px;
        }
        input[type="text"]{
            border: 1px solid transparent;
        }
        span{
            display: none !important;
        }
        input[type="submit"]{
            display: none;
        }
        .title{
            font-size: 25px !important;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Testimonial Generator</h1>
                </div>
            </div>

            <div class="panel-body none">

                <!--blockquote class="form-head">

                    <h4>Admit Card Generate</h4>

                    <ol style="font-size: 14px;">
                        <li>1. Fill all the required <mark>*</mark> fields</li>
                        <li>2. Click the <mark>Show</mark> button to Show Data</li>
                    </ol>

                </blockquote>
                
                <hr-->

                <form action="" class="form-horizontal">

                    <div class="form-group">
                        <label class="col-md-2 control-label">Session </label>
                        <div class="col-md-5">
                            <select name="session" class="form-control">
                              <option value="">-- Select Session --</option>
                              <option value="2016-2017">-- 2015-2016 --</option>
                              <option value="2016-2017">-- 2016-2017 --</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Group</label>
                        <div class="col-md-5">
                            <select name="group" class="form-control">
                                <option value="">-- Select Group --</option>
                                <option value="Science">Science</option>
                                <option value="Huminities">Huminities</option>
                                <option value="Business_Studies">Business Studies</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Roll Number </label>

                        <div class="col-md-5">
                            <input type="text" name="roll_number" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" value="Show" class="btn btn-primary">
                    </div> 
                    </div>

                </form>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Show Result</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>


            <div class="panel-body">
                <div class="row">

                    <div class="view-profile">
                        <div class="col-xs-2">
                            <figure class="pull-left">
                                <img class="img-responsive" src="<?php echo site_url('private/images/logo.jpg'); ?>" width="80px" height="80px" alt="">
                            </figure>
                        </div>

                        <div class="col-xs-8">
                            <div class="institute">
                                <h2 class="text-center" style="margin-top: 10; font-weight: bold; title">Jhawla Gopalpur College</h2>
                                <h3 class="text-center" style="margin: 0;">Jamalpur Sadar, Jamalpur</h3>
                            </div>
                        </div>

                    </div>

                </div>

                <hr style="border: 2px solid #ccc;">

                <h3 class="text-center">Student's Information</h3>

                <div class="row">
                    <div class="col-xs-9">
                        <table class="student-table">

                            <tr>
                                <th>ID</th>
                                <td>1254</td>
                            </tr>

                            <tr>
                                <th>Name</th>
                                <td>Imtiaz Ahammed</td>
                            </tr>

                            <tr>
                                <th>Father's Name</th>
                                <td>Abcd</td>
                            </tr>

                            <tr>
                                <th>Mother's Name</th>
                                <td>526604</td>
                            </tr>

                            <tr>
                                <th>Class</th>
                                <td>Eleven</td>
                            </tr>

                            <tr>
                                <th>Roll</th>
                                <td>526604</td>
                            </tr>

                            <tr>
                                <th>Date Of Birth</th>
                                <td>2016-07-08</td>
                            </tr>
                            
                        </table>
                    </div>

                    <div class="col-xs-3">
                        <figure class="pull-right">
                            <img style="width: 100px; height: 100px;" class="img-responsive" src="<?php echo site_url('private/images/pic-male.png'); ?>" alt="Photo not found!" class="img-responsive">
                        </figure>
                    </div>

                </div> 

                <form action="" class="custom-form">

                    <div class="form-group">
                        <label class="control-label">GPA</label>
                        <div class="custom-file">
                            <input type="text" name="gpa" class="form-control">
                        </div>
                    </div>

                    <div class="btn-group pull-right">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                    
                </form>
                

            </div>


            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

