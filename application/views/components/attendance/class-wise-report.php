<style>
    .attendance tr th{
        text-align: center;
    }
    .attendance label{
        display: block;
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
        .box-width{
            width: 50%;
        }
        .none{
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
    }

</style>

<div class="container-fluid">
    <div class="row">
        <?php echo $confirmation; ?>
        <div class="panel panel-default none">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Class Wise Report</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>Add Student Data</h4>

                    <ol style="font-size: 14px;">
                        <li>1. fill all the required <mark>*</mark> fields</li>
                        <li>2. click the <mark>save</mark> button to insert data</li>
                    </ol>

                </blockquote>

                
                <hr-->

                <!-- horizontal form -->
                    
                    <div class="col-sm-12 no-padding">

                        <?php
                        echo $confirmation; //echo"<pre>"; print_r($each_student); echo"</pre>";
                        $attr=array(
                            "class"=>"form-horizontal"
                            );
                        echo form_open("",$attr);?>


                             <div class="form-group">
                            <label class="col-md-2 control-label">Class <span class="req">*</span></label>
                            <div class="col-md-5">
                                <select name="search[class]" class="form-control"  required>
                                    <option value="">-- Select Class --</option>
                                    <?php
                                        foreach(config_item('classes') as $key => $value){?>
                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                        <?php 
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Year/Session <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="search[session]" class="form-control"  required>
                                    <option value="">-- Select Year/Session --</option>
                                   <?php foreach ($session_list as $key => $value) { ?>
                                   <option value="<?php echo $value->session; ?>"><?php echo $value->session; ?></option>
                                   <?php } ?>                                  
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Group <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="search[group]" class="form-control"  required>
                                        <option value="">-- Select Group --</option>
                                        <?php 
                                            foreach(config_item('group') as $key => $value){?>
                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-2 control-label">Section <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="search[section]" class="form-control"  required>
                                        <option value="">-- Select Section --</option>
                                        <?php 
                                            foreach(config_item('section') as $key => $value){?>
                                                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label class="col-md-2 control-label">Subject <span class="req">&nbsp;</span></label>
                                <div class="col-md-5">
                                    <select name="search[subject]" class="form-control">
                                        <option value="">-- Select Subject --</option>
                                        <?php
                                            foreach(config_item('subject') as $key => $value){ ?>
                                                <optgroup label="Class <?php echo $key; ?>">
                                                    <?php foreach($value as $skey => $sVal){ ?>
                                                    <option value="<?php echo $sVal; ?>"><?php echo $sVal; ?></option>
                                                    <?php } ?>
                                                </optgroup>
                                                
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div> -->

                            <div class="col-md-7">
                                <div class="btn-group pull-right">
                                    <input type="submit" value="Show" name="student_submit" class="btn btn-primary">
                                </div>
                            </div>

                        <?php echo form_close(); ?>

                    </div>

                </div>

            <div class="panel-footer">&nbsp;</div>
        </div>








<?php if($results != NULL) { ?>
       
        <div class="panel panel-default">
            <div class="panel-heading">
                 <div class="panal-header-title">
                        <h1 class="pull-left">Show Result</h1>
                         <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                    </div>
            </div>

            <h3 class="text-center hide">Class Wise Report</h3>
            
            <div class="panel-body">

                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <tr>
                                <th class="num-center">SL</th>
                                <th>Photo</th>
                                <th class="num-center">Roll</th>
                                <th>Name</th>
                                <th class="num-center">Total Working Days</th>
                                <th class="num-center">Total Present</th>
                                <th class="num-center">Total Absent</th>
                                <th class="num-center">Present Rate</th>
                                <th class="num-center">Absent Rate</th>
                            </tr>
                            
                            <?php 
                              $present = $absent = 0;
                              $rolls = array();
                              foreach($students as $key=>$value) { 
                              $info = $this->action->read("registration",array("reg_id" => $value->student_id));
                             $photo = '';
                              if($info != NULL){
                                  $photo = $info[0]->photo;
                                  $name = filter($info[0]->name);
                              }
                            ?>
                              <tr>
                                <td class="num-center"><?php echo $key+1; ?></td>
                                <td>                                    
                                    <img src="<?php echo base_url($photo)?>" alt="photo not found!" width=50px height=50px>
                                </td>
                                <td class="num-center"><?php echo $value->roll;?></td>
                                <td><?php echo $name; ?></td>
                                <td class="num-center"><?php echo count($results); ?></td>
                                <td class="num-center">
                                    <?php
                                      foreach($results as $key=>$val){
                                          $rolls = json_decode($val->roll,true);
                                          if(in_array($value->roll,$rolls)){
                                              $present += 1;
                                          }else{
                                              $absent += 1;
                                          }
                                      }
                                      echo $present;
                                    ?>
                                </td>
                                <td class="num-center"><?php echo $absent; ?></td>
                                <td class="num-center"><?php echo round((($present*100)/count($results)),2); ?> %</td>
                                <td class="num-center"><?php echo round((($absent*100)/count($results)),2); ?> %</td>
                             </tr>
                             <?php $present = $absent = 0; } ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
           <?php } ?>
        </div>
    </div>
</div>
