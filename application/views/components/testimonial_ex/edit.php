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
            font-size: 25px;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">     

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Edit</h1>                   
                </div>
            </div>


            <div class="panel-body">
                <!-- div class="row">
                    <div class="view-profile">
                        <div class="col-xs-2">
                            <figure class="pull-left">
                                <img class="img-responsive" src="<?php echo site_url('public/logo/logo.png'); ?>" width="80px" height="80px" alt="">
                            </figure>
                        </div>

                        <div class="col-xs-8">
                            <div class="institute">
                                <?php $heading = config_item('header'); ?>
                                <h2 class="text-center title" style="margin-top: 10; font-weight: bold;"><?php echo $heading['title']; ?></h2>
                                <h3 class="text-center" style="margin: 0;"><?php echo $heading['place']; ?></h3>
                            </div>
                        </div>
                    </div>
                </div -->

                <!-- hr style="border: 2px solid #ccc;">
                <h4 class="text-center">Testimonial Certificate</h4 -->

                <div class="row">
                    <div class="col-xs-9">
                        <table class="student-table">

                            <tr>
                                <th>Student ID</th>
                                <td><?php echo $testimonial[0]->student_id;?></td>
                            </tr>

                            <tr>
                                <th>Students Name</th>
                                <td><?php echo $testimonial[0]->name;?></td>
                            </tr>

                            <tr>
                                <th>Fathers Name</th>
                                <td><?php echo $testimonial[0]->father_name;?></td>
                            </tr>

                            <tr>
                                <th>Mothers Name</th>
                                <td><?php echo $testimonial[0]->mother_name;?></td>
                            </tr>

                            <tr>
                                <th>Date of Birth</th>
                                <td><?php echo $testimonial[0]->birth_date;?></td>
                            </tr>

                            <tr>
                                <th>Class</th>
                                <td><?php echo $testimonial[0]->class;?></td>
                            </tr>                        
                        </table>
                    </div>

                    <div class="col-xs-3">
                    <?php $info=$this->action->read('registration',array('id'=>$testimonial[0]->student_id));?>
                        <figure class="pull-right">
                        <?php if($info !=null){ ?>
                            <img style="width: 100px; height: 100px;" class="img-responsive" src="<?php echo site_url('public/students/'.$info[0]->photo); ?>" alt="Photo not found!" class="img-responsive">
                        <?php } ?>
                        </figure>
                    </div>

                </div> 

                <?php $attr=array('class'=>'custom-form');?>
                <?php echo form_open("testimonial/update/".$testimonial[0]->student_id,$attr);?>              
                   <div class="form-group">
                        <label class="control-label">Roll</label>
                        <div class="custom-file">
                            <input type="text" name="roll" class="form-control"  value="<?php echo $testimonial[0]->roll;?>" required placeholder="Roll">
                        </div>
                    </div>                

                    <!--div class="form-group">
                        <label class="control-label"><?php //echo caption('Registration_Number'); ?></label>
                        <div class="custom-file">
                            <input type="text" name="reg" class="form-control" value="<?php echo $testimonial[0]->reg;?>" required placeholder="Reg">
                        </div>
                    </div-->

                    <div class="form-group">
                        <label class="control-label">GPA</label>
                        <div class="custom-file">
                            <input type="text" name="gpa" class="form-control"  value="<?php echo $testimonial[0]->gpa;?>" required placeholder="GPA">
                        </div>
                    </div>

                    <div class="btn-group pull-right">
                        <input type="submit" name="submit" value="Update" class="btn btn-primary">
                    </div>                    
                <?php echo form_close();?>
             </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

