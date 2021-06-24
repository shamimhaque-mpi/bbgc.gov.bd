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

<div class="container-fluid" ng-controller="staffSMSCtrl" ng-cloak>
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


                    <div class="form-group">
                        <label class="col-md-2 control-label">Type <span class="req">*</span></label>

                        <div class="col-md-5">
                            <select  class="form-control" ng-model="persone" required>
                                <option value="">-- Select an option --</option>
                                <option value="teacher">Teacher</option>
                                <option value="staff">Staff</option>
                                <option value="committee_members">Committee Members</option>
                            </select>
                        </div>
                    </div> 

                    <div class="col-md-7">
                    <div class="btn-group pull-right" style="margin-top:10px;">
                        <button  ng-click="personeInfo();" class="btn btn-primary">Show</button>
                    </div>
                    </div> 
                    

                

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
                <?php  echo $this->session->flashdata('confirmation'); ?>
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
                ?>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Mobile Numbers <span class="req">*</span></label>

                        <div class="col-md-9">
                            <div class="form-element" style="height: 130px;">
                            
                                <div class="checkbox" ng-repeat=" row in result">
                                    <label><input type="checkbox" name="mobile[]" value="{{row.mobile}}" checked>{{row.mobile}} &nbsp;  &nbsp; {{row.employee_name}}</label>         
                                </div>
                            
                            </div>
                        </div>
                    </div>

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

