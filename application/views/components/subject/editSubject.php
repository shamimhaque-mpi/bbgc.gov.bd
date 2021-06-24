<div class="container-fluid">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation');?>
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Edit Subject</h1>
                </div>
            </div>

            <div class="panel-body">
                    
                    <div class="row">
                    
                        <div class="col-md-7">

                        <?php                        
                          $attr=array("class"=>"form-horizontal");
                          echo form_open("subject/subject_validation/update/".$subject[0]->id , $attr);
                        ?>

                            <div class="form-group ">
                                <label class="col-md-4 control-label">Class <span class="req">&nbsp;</span></label>
                                <div class="col-md-8">
                                    <select name="class" class="form-control">
                                        <option value="">-- Select Class --</option>                                        
                                        <?php 
                                            foreach(config_item('classes') as $key => $value){?>
                                                <option <?php if($subject[0]->class==$key){echo "selected";}?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group ">
                                <label class="col-md-4 control-label">Group <span class="req">&nbsp;</span></label>
                                <div class="col-md-8">
                                   <select name="group" class="form-control">
                                        <option value="">-- Select Group --</option>
                                        <?php 
                                            foreach(config_item('group') as $key => $value){?>
                                                <option <?php if($subject[0]->group==$key){echo "selected";}?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php 
                                            }
                                        ?>
                                   </select>
                                </div>
                            </div>
                            
                            <div class="form-group ">
                                <label class="col-md-4 control-label">Subject Name <span class="req">&nbsp;</span></label>
                                <div class="col-md-8">
                                    <select name="subject_name" class="form-control">
                                        <option value="">-- Select Subject --</option>
                                        <?php 
                                            foreach (config_item('subject') as $key => $value) {?>
                                                <optgroup label="Class <?php echo $key; ?>">
                                                    <?php
                                                        foreach ($value as $skey => $svalue) {?>
                                                            <option <?php if($subject[0]->subject==$skey && $key == $subject[0]->class){echo "selected";}?> value="<?php echo $svalue; ?>"><?php echo $svalue; ?></option>
                                                        <?php
                                                        }
                                                    ?>
                                                </optgroup>

                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label">Paper <span class="req">*</span></label>
                                <div class="col-md-8">
                                    <select name="paper" class="form-control" required>
                                        <option value="None" <?php if($subject[0]->paper == "None"){echo "selected";} ?>>None</option>
                                        <option value="1st" <?php if($subject[0]->paper == "1st"){echo "selected";} ?>>1st Part</option>
                                        <option value="2nd" <?php if($subject[0]->paper == "2nd"){echo "selected";} ?>>2nd Part</option>
                                    </select>
                                </div>
                            </div>

                             <div class="form-group ">
                                <label class="col-md-4 control-label">Subject Code <span class="req"> *</span></label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" value="<?php echo $subject[0]->subject_code;?>" name="subject_code" required>
                                </div>
                            </div>
                            
                            <div class="form-group ">
                                <label class="col-md-4 control-label">Subject Type <span class="req">&nbsp;</span></label>
                                <div class="col-md-8">
                                   <select name="subject_type" class="form-control">
                                       <option value="">-- Select Type --</option>
                                       <option <?php if($subject[0]->subject_type=="compulsory") { echo "selected";} ?> value="compulsory">Compulsory</option>
                                       <option <?php if($subject[0]->subject_type=="optional") { echo "selected";} ?> value="optional">Optional</option>
                                   </select>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label">Objective <span class="req">&nbsp;</span></label>
                                <div class="col-md-8">
                                    <input class="form-control" type="number" max="100" min="0" value="<?php echo $subject[0]->objective;?>" name="objective">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label">Written <span class="req">&nbsp;</span></label>
                                <div class="col-md-8">
                                    <input type="number" max="100" min="0"  name="written" value="<?php echo $subject[0]->written;?>" class="form-control">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label">Practical <span class="req">&nbsp;</span></label>
                                <div class="col-md-8">
                                    <input type="number" max="100" min="0"  name="practical" value="<?php echo $subject[0]->practical;?>" class="form-control">
                                </div>
                            </div>
                            
                            
                        </div>                       
                       
                        
                    </div>

                    <div class="row">
                        <div class="col-md-7">
                            <div class="btn-group pull-right">
                                <input type="submit" value="Update" name="student_submit" class="btn btn-primary">
                            </div>
                        </div>
                    </div>  

                    <?php echo form_close(); ?>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>