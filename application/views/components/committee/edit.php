<div class="container-fluid">
    <div class="row">
    <?php 
        echo $confirmation;
        //echo "<pre>"; print_r($member_info); echo "</pre>"; 
     ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Member</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>Add New Employee</h4>

                    <ol style="font-size: 14px;">
                        <li>1 . If you want to insert <mark>new employee</mark> then use the fields</li>
                        <li>2 . At last click on the <mark>Save</mark> button</li>
                    </ol>

                </blockquote>

                <hr-->


                <!-- horizontal form -->
                <?php
                    $attr=array("class"=>"form-horizontal");
                    echo form_open_multipart('committee/committee/edit_member?id='.$this->input->get('id'), $attr);
                ?>
                    <input type="hidden" name="hidden_id" value="<?php echo $member_info[0]->id; ?>">
                    <input type="hidden" name="hidden_imgurl" value="<?php echo $member_info[0]->member_photo; ?>">

                	<div class="form-group">
                        <label class="col-md-2 control-label">&nbsp; <span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <img src="<?php echo site_url($member_info[0]->member_photo); ?>" width="80px" height="80px" alt="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Year From <span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="member_year_from" class="form-control">
                                <option value="">-- Select Year --</option>
                                <?php 
                                    for($i=2015;$i<=date('Y')+10;$i++ )
                                {
                                    ?>
                                        <option <?php if($member_info[0]->member_year_from==$i) {echo "selected";} ?> value="<?php echo $i;?>"><?php echo $i; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Year To <span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="member_year_to" class="form-control">
                                <option value="">-- Select Year --</option>
                                <?php 
                                    for($i=2015;$i<=date('Y')+10;$i++ )
                                {
                                    ?>
                                        <option <?php if($member_info[0]->member_year_to==$i) {echo "selected";} ?> value="<?php echo $i;?>"> -- <?php echo $i; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Full Name <span class="req">*</span></label>
                        <div class="col-md-5">
                            <input type="text" name="member_full_name" value="<?php echo $member_info[0]->member_full_name; ?>" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Post <span class="req">*</span></label>
                        <div class="col-md-5" >
                            <select name="member_post" class="form-control" >
                                <option value="">Select Designation</option>
				<?php foreach(config_item('committee_designation') as $key=>$value){?>
                                <option value="<?php echo $key; ?>" <?php if($member_info[0]->member_post==$key){echo "selected";} ?> ><?php echo $value; ?></option>
				<?php } ?>
                            </select>
                                
                                
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Mobile Number <span class="req">*</span></label>
                        <div class="col-md-5">
                            <input type="text" value="<?php echo $member_info[0]->member_mobile_number; ?>" name="member_mobile_number" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Address <span class="req">*</span></label>
                        <div class="col-md-5">
                            <textarea name="member_address" id="pre_addr" class="form-control" cols="30" rows="5" required> <?php echo $member_info[0]->member_address; ?> </textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Photo <span class="req">*</span></label>
                        <div class="col-md-5">
                            <input id="input-test" type="file" name="attachFile" class="form-control file" data-show-preview="false" data-show-upload="false" data-show-remove="false">
                        </div>
                    </div> 

                    <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" name="edit_member" value="Update" class="btn btn-success">
                    </div>
                    </div>
                    
                <?php echo form_close(); ?>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>