<style>
    p{
        display: inline-block;
        float: right;
    }
    p span .sms{
        border: 1px solid transparent;
        width: 40px;
    }
</style>

<div class="container-fluid" ng-controller="CustomSMSCtrl">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Send SMS</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>Set Subjects & Marks</h4>

                    <ol style="font-size: 14px;">
                        <li>1 . Select Class , Group and Press <mark>Show</mark> button</li>
                    </ol>

                </blockquote>
                
                <hr-->

                <?php
                    $attr=array('class'=>'form-horizontal');
                    echo form_open('', $attr);
                ?>

                    <div class="form-group">
                        <label class="col-md-2 control-label"> Session </label>

                        <div class="col-md-5">
                            <select name="search[session]" class="form-control">
                               <option value="">-- Select Session --</option>
                                <?php for($i=2014; $i<=date("Y")+3; $i++){?>
                                <option value="<?php echo $i."-".($i+1); ?>"><?php echo $i."-".($i+1); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Class <span class="req">*</span></label>

                        <div class="col-md-5">
                            <select name="search[class]" class="form-control" required>
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
                        <label class="col-md-2 control-label"> Group </label>

                        <div class="col-md-5">
                            <select name="search[group]" class="form-control">
                                <option value="">-- Select Group --</option>
                                <option value="">All</option>
                                <?php
                                    foreach($info as $key => $value){?>
                                        <option value="<?php echo $value->group; ?>"><?php echo $value->group; ?></option>
                                    <?php
                                    }
                                ?>
                            </select>
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

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Mobile Number & Message</h1>
                </div>
            </div>

            <div class="panel-body">

                <blockquote class="form-head">

                <!--h4>Set Subjects & Marks</h4-->
                <?php 
                	$sent_sms = 0;
                	foreach($all_sms as $sms){
                		$sent_sms = $sent_sms + $sms->total_messages;
                	}

                ?>
                    <ol style="font-size: 14px;">
                        <li>1 . Select Mobile Number and Type your Message; then Press <mark>Send</mark> button</li>
                        <li>Total SMS : <strong><?php echo $total_sms; ?></strong>, &nbsp; Total Sent SMS : <strong><?php echo $sent_sms; ?></strong>, &nbsp; Remaining SMS : <strong><?php echo $total_sms-$sent_sms; ?></strong></li>
                    </ol>

                </blockquote>

	            <?php
	                $attr=array('class'=>'form-horizontal');
	                echo form_open('', $attr);
	                if ($student_info!=null) {
	            ?>
                <div class="form-group">
                    <label class="col-md-3 control-label"></span></label>
                    <div class="col-md-9">
                        <label style="user-select:none"><input type="checkbox" id="checked" checked> All Checked</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Mobile Numbers <span class="req">*</span></label>

                    <div class="col-md-9">
                        <div class="form-element" style="height: 130px;">
                        <?php foreach ($student_info as $key => $student) { 
                        	if($student->student_mobile != null){
                        ?>
                            <div class="checkbox">
                                <label><input type="checkbox" name="mobile[]" mobile='true' value="<?php echo $student->student_mobile; ?>" checked><?php echo $student->student_mobile . "&nbsp" .' ( '.$student->name .' - '.$student->group. ' ) ';?></label>         
                            </div>
                        <?php } }?>
                        </div>
                    </div>
                </div>
                <?php } ?>
	          
	           
		        <div class="col-md-12">&nbsp;</div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Your Message <span class="req">*</span></label>
                        <div class="col-md-9">
                            <textarea name="message" ng-model="msgContant" ng-change="messageFn()" class="form-control" cols="30" rows="5" placeholder="Type Your Message" required></textarea>
                        </div>
                    </div>

                    <div class="clearfix">
                        <p>
                            <span><strong>Total characters</strong> 
                                <input name="total_characters" ng-model="totalChar" class="sms" type="text" >
                            </span>
                            &nbsp;  
                            <span><strong>Message size</strong> 
                                <input class="sms" name="total_messages" ng-model="msgSize" type="text" >
                            </span>
                        </p>
                    </div>

                    <div class="btn-group pull-right">
                        <input type="submit" name="sendSms" value="Send" class="btn btn-primary">
                    </div>

                <?php echo form_close(); ?>
                </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script>
    ((x)=>{
        var btn = document.querySelector('#checked');
        if(btn){
            btn.addEventListener('click', ()=>{
                var mobiles = x("input[type=checkbox][mobile=true]");
                if(btn.checked){
                    Object.values(mobiles).forEach(tag=>{
                        tag.checked = true;
                    });
                }
                else {
                    Object.values(mobiles).forEach(tag=>{
                        tag.checked = false;
                    });
                }
            });
        }
    })(x=>document.querySelectorAll(x));
</script>

