<style>
    .show-btn{
        width: 70px;
        height: 35px;
        color: #008000;
        border: 1px solid #008000;
        background: #fff;
    }
    .show-btn:hover{
        background: #008000;
        color: #fff;
    }
</style>

<div class="col-md-9">
    <div class="row">        
        <div class="single teacher_table clearfix">
        <!--pre><?php print_r($student_info);?></pre-->

        <h3>সকল ছাত্রছাত্রী</h3>

            <?php echo form_open('');?>

                <div class="form-group clearfix">
                    <label class="col-md-2 control-label">সেশন  </label>
                    <div class="col-md-5">
                        <select name="session" class="form-control" >
                           <option value="">-- নির্বাচন করুন --</option>
                           <?php foreach ($session_list as $key => $value) { ?>
                           <option value="<?php echo $value->session; ?>"><?php echo $value->session; ?></option>
                           <?php } ?>
                       </select>
                    </div>
                </div>

                 <div class="form-group clearfix">
                    <label class="col-md-2 control-label">ক্লাস </label>
                    <div class="col-md-5">
                        <select name="class" class="form-control" >
                            <option value="">-- নির্বাচন করুন --</option>
                            <?php
                                foreach (config_item('classes') as $key => $value) {?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group clearfix">
                    <label class="col-md-2 control-label">বিভাগ </label>
                    <div class="col-md-5">
                        <select name="group" class="form-control">
                            <option value="">-- নির্বাচন করুন --</option>
                            <?php
                                foreach (config_item('group') as $key => $value) {?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group clearfix">
                    <label class="col-md-2 control-label">আইডি</label>
                    <div class="col-md-5">
                        <input name="reg_id" type="text" class="form-control">
                    </div>
                </div>
                
                <div class="form-group clearfix">
                    <label class="col-md-2 control-label">রোল</label>
                    <div class="col-md-5">
                        <input name="roll" type="text" class="form-control" placeholder="অবশ্যই সেশন,ক্লাস,বিভাগ সিলেক্ট করুন">
                    </div>
                </div>

                <div class="col-xs-7" style="margin-bottom: 25px;">
                    <input class="pull-right show-btn" type="submit" value="Show" name="viewQuery" />
                </div>

            <?php echo form_close(); if ($student_info !=NULL) { ?>

            <table>
                <thead>
                    <tr>
                        <th>ক্রম</th>
                        <th>আইডি</th>
                        <th>রোল</th>
                        <th>ছবি</th>
                        <th>নাম</th>
                        <th>ক্লাস</th>
                        <th>সেশন</th>
                        <th>বিভাগ</th>
                        <th>একশন</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                   foreach ($student_info as $key => $students) {  
                       $info = $this->action->read("admission",array("student_id" => $students->reg_id));
                       $roll = ($info) ? $info[0]->roll : "";
                     ?>
                     <tr>
                        <td><?php echo ($key+1); ?></td>
                        <td><?php echo $students->reg_id; ?></td>
                        <td><?php echo $roll; ?></td>
                        <td style="width: 80px;"><img src="<?php echo site_url( $students->photo);?>" width="80px" height="80px"></td>
                        <td><?php echo $students->name; ?></td>
                        <td><?php echo $students->class; ?></td>
                        <td><?php echo $students->session; ?></td>
                        <td><?php echo str_replace("_"," ",$students->group);?></td>
                        <td><a style="color: #fff; " class="btn btn-primary" href="<?php echo site_url('home/student_profile/'.$students->id);?>">View</a></td>
                     </tr>
                <?php } ?> 
                
                </tbody>
            </table>
            <?php } ?>
        </div>
    </div>
</div>