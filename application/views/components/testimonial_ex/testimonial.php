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
             aside, nav, .none, .panel-heading, .panel-footer{display: none !important;}
            .panel{border: 1px solid transparent;left: 0px;position: absolute;top: 0px;width: 100%;}
            .hide{display: block !important;}
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
            font-size: 25px;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Student Testomonial</h1>
                </div>
            </div>

            <div class="panel-body none">
                
                <?php
	                $attr=array('class'=>'form-horizontal');
	                echo form_open('testimonial/certificate',$attr);
                ?>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Roll No <span class="req">*</span></label>
                       <div class="col-md-5">
                           <input type="text" name="search[roll]" class="form-control" required>
                       </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Registration No <span class="req">*</span></label>
                       <div class="col-md-5">
                           <input type="text" name="search[reg_id]" class="form-control" required>
                       </div>
                    </div>

                    <div class="col-md-7">
                        <div class="btn-group pull-right">
                            <input type="submit" value="Show" name="viewQuery" class="btn btn-primary">
                        </div> 
                    </div>

                   <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

    </div>
</div>

