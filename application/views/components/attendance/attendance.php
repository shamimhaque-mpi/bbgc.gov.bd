<style>
.attendance tr th{
	text-align: center;
}
.attendance label{
	display: block;
}
/* attendence style start */
.attendance-section{}
.attendance-section li{
    border-radius: 31px 4px 4px 31px;
    float: left;
    height: 62px;
    margin: 10px;
    max-width: 300px;
    overflow: auto;
    position: relative;
    width: 100%;
    background: #008000;
}
.attendance-section li label{
	color: #fff;
    cursor: pointer;
    display: block;
    padding: 6px 10px 0;
}
.attendance-section li img{
	border-radius: 50%;
	display: inline-block;
	margin-right: 10px;
}
.attendance-section li p{
	display: inline-block;
	vertical-align: middle;
}
.attendance-section li input{
	position: absolute;
	opacity: 0;
}
.attendance-section li.red{background: #f44;}

.dash-box{
     text-align: center;
     padding: 30px 0;
     color: #fff;
     border-radius: 4px;
     margin: 0 0 15px;
}
.dash-box-1{
    background: #FF9800;
}
.dash-box-2{
    background: #E91E63;
}
.dash-box-3{
    background: #46C35F;
}
.dash-box-4{
    background: #00BCD4;
}
.dash-box-5{
    background: #4BC0C0;
}
.dash-box-6{
    background: #36A2EB;
}
.dash-box-7{
    background: #FFCE56;
}
.dash-box-8{
    background: #FF6384;
}
.dash-box h1{
    margin: 0;
}
.dash-box span{
     font-size: 16px;
     text-transform: uppercase;
}
.roll_name {
    overflow: auto;
}
.roll_name img {
    max-height: 51px;
    float: left;
}
.roll_name p {
    float: left;
    width: 76%;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
/* attendence style end */
</style>

<div class="container-fluid">
    <div class="row">
        <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Take Attendance</h1>
                </div>
            </div>

            <div class="panel-body">
              
                    <div class="col-sm-12 no-padding">

                        <?php
                          $attr=array("class"=>"form-horizontal");
                          echo form_open("",$attr);
                        ?>

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
                                    <option value="">-- Select Session --</option>
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

                            <div class="form-group">
                                <label class="col-md-2 control-label">Subject <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="search[subject_name]" class="form-control" required>
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
                            </div>

                            
                            <div class="col-md-7">
                                <div class="btn-group pull-right">
                                    <input type="submit" value="Show" name="show_students" class="btn btn-primary">
                                </div>
                            </div>

                        <?php echo form_close(); ?>

                    </div>

                </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

     <?php
      if($all_students != NULL){?>

        <div class="panel panel-default attendance-section">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Please Uncheck the Roll Numbers those are absent to Send SMS</h1>
                </div>
            </div>
            
            <div class="panel-body">
                <?php 
                    echo form_open('');
                ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <?php foreach ($all_students as $key => $value) { 
                                // set a condisonal array for by stutent id
                                //$where=array('student_id'=>$value->reg_id);
                                // read admission table
                                //$admitted_student=$this->action->read('admission',$where);

                                ?>
                                    
                                  <input type="hidden" name="id[]" value="<?php echo $value->id; ?>">
                                  <input type="hidden" name="reg_id[]" value="<?php echo $value->reg_id; ?>">
                                  <input type="hidden" name="class" value="<?php echo $value->class;?>">
                                  <input type="hidden" name="session" value="<?php echo $value->session;?>">
                                  <input type="hidden" name="group" value="<?php echo $value->group;?>">
                                  <input type="hidden" name="section" value="<?php echo $value->section;?>">
                                  <input type="hidden" name="subject" value="<?php echo $subject;?>">
                                 
                                 <li ng-class="{red: !boxvalue<?php echo $key; ?>}" ng-init="boxvalue<?php echo $key; ?>=true">
                                    <label class="roll_name" for="chackbox-<?php echo $key; ?>">
                                        <img 
                                            src="<?php echo site_url($value->photo); ?>" 
                                             style="max-width=48px; max-height: 51px;" alt="Photo not found!">
                                        <p>
                                            <strong><?php echo ucwords($value->name);?></strong><br>
                                            <small><?php echo $value->roll;?></small>
                                        </p>                                        

                                        <input 
                                            type="checkbox" name="attendance[]" 
                                            ng-model="boxvalue<?php echo $key; ?>"
                                            id="chackbox-<?php echo $key; ?>"
                                            value="<?php echo $value->roll."_".$value->guardian_mobile;?>">
                                    </label>
                                </li>

                            <?php   } ?>
                        </ul>
                    </div>         
                </div>
            </div>
        </div>
        
        
        <div class="panel panel-default" style="margin-top: -25px;">
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="col-md-6 col-md-offset-2">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Date<span class="req"> *</span></label>
                            <div class="input-group  col-md-8" id="datetimepicker">
                                <input type="text" class="form-control" name="attendance_date"  required value="<?php echo date('Y-m-d'); ?>">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="btn-group pull-right">
                           <select name="submit_method" class="btn" required style="margin-right: 2px; border: 1px solid #DDDDDD;" >
                                <option value="">--Select an option--</option>
                                <option value="save">Only Save</option>
                                <option value="save_send">Save & Send</option>
                           </select>
                           <input type="submit" value="Save" name="submit" class="btn btn-primary">
                        </div>
                    </div>  
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
        
        
        <?php echo form_close(); ?>
      <?php } ?>    

  </div>
</div>   


<script type="text/javascript">
  $(document).ready(function(){
    $('#datetimepicker').datetimepicker({
      format: 'YYYY-MM-DD'
    });
  });
</script>

