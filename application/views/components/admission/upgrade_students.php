<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
 toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>

<style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer {
            display: none !important;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .panel .hide{
            display: block !important;
        }
        .title{
            font-size: 25px;
        }
    }
    .progress {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        z-index : 9999;
        background: #00000030;
        display: none;
        justify-content: center;
        align-items: center;
    }
    .status {
        background: #fff;
        padding: 17px;
        border-radius: 7px;
    }
</style>

<div class="container-fluid">
    <div class="row">
     <?php echo $confirmation; ?>


        <div class="panel panel-default none">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>শ্রেণী পরিবর্তন</h1>
                </div>
            </div>

            <div class="panel-body">

                <?php $attr=array("class"=>"form-horizontal");
                echo form_open('',$attr); ?>

                <div class="form-group">
                    <label class="col-md-2 control-label">শিক্ষাবর্ষ <span class="req"> * </span></label>
                    <div class="col-md-5">
                        <select name="search[session]" class="form-control" required>
                           <option value="">-- নির্বাচন করুন --</option>
                           <?php foreach ($session_list as $key => $value) { ?>
                           <option value="<?php echo $value->session; ?>"><?php echo $value->session; ?></option>
                           <?php } ?>
                       </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">শ্রেণী <span class="req"> *</span></label>
                    <div class="col-md-5">
                        <select name="search[class]" class="form-control" required>
                            <option value="">-- নির্বাচন করুন --</option>
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
                        <label class="col-md-2 control-label">শাখা<span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <select name="search[section]" class="form-control">
                             <option value="">-- নির্বাচন করুন --</option>
                               <?php foreach (config_item('section') as $key => $value) { ?>
                               <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                               <?php } ?>
                           </select>
                        </div>
                    </div>

                <div class="col-md-7">
        			<div class="btn-group pull-right">
        				<input type="submit" value="দেখুন" name="show" class="btn btn-primary">
        			</div>
                </div>

                <?php echo form_close(); ?>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>




        <!-- result -->


        


        <?php if($result != null){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">ফলাফল দেখুন</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> প্রিন্ট</a>
                </div>
            </div>
            
            
             <form action="" onsubmit="dataprocess(event)">
                
                <div class="panel-body">

                    <img class="hide" style="width: 100%; margin-bottom: 10px;" src="<?php echo site_url('public/banner/banner.png') ?>">
    
                    <h4 class="text-center hide" style="margin-top: 0px;">শিক্ষার্থী আপগ্রেড</h4>
    
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th><input type="checkbox" checked id="check_all" />ক্র.নং</th>
                                    <th>শিক্ষার্থী নাম</th>
                                    <th>ছবি</th>
                                    <th width="60px">আইডি</th>
                                    <th>ক্লাস</th>
                                    <th>শাখা</th>
                                    <th>রোল</th>
                                    <th>সেশন</th>
                                </tr>
    
                                <?php foreach($result as $key=>$row){
                                $info = $this->action->read('registration', array('reg_id' => $row->student_id)); ?>
    
                                <tr>
                                    <td><input type="checkbox" name="id[]" student="id" value="<?php echo $row->student_id;?>"  checked > &nbsp;&nbsp; <?php echo ($key + 1); ?> </td>
                                    <td> <?php echo ($info) ?  $info[0]->name : ""; ?> </td>
                                    <td width="60" style="padding: 2px;"><img src="<?php echo ($info) ? site_url($info[0]->photo) : ''; ?>" width="60px" height="60px"  alt="Photo Missing!"</td>
                                    <td> <?php echo $row->student_id; ?> </td>
                                    <td> 
                                    <?php 
                                        if($row->class =='Eleven'){
                                            echo 'HSC 1st Year'; 
                                        }elseif($row->class =='Twelve'){
                                            echo 'HSC 2nd Year'; 
                                        }else{
                                            echo $row->class; 
                                        }
                                    ?> 
                                    </td>
                                    <td><input type="text" name="section[]" student="section" value="<?php echo $row->section; ?>" class="form-control" readonly></td>
                                    <td><input type="text" name="roll[]" student="roll" value="<?php echo $row->roll; ?>" class="form-control" readonly></td>
                                    <td><?php echo $row->session; ?></td>
                                 </tr>
                                <?php } ?>
                            </table>
                        </div>
    
    
                        <div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">পাশের বছর <span class="req"> *</span></label>
                                    <select name="year" class="form-control" required>
                                       <option value="">-- নির্বাচন করুন --</option>
                                        <?php for($i=2012; $i<=date("Y"); $i++){?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select> 
                                </div>
                            </div>
    
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">সেশন<span class="req"> *</span></label>
                                    <select name="session" class="form-control" required>
                                       <option value="">-- নির্বাচন করুন --</option>
                                       <?php foreach ($session_list as $key => $value) { ?>
                                       <option value="<?php echo $value->session; ?>"><?php echo $value->session; ?></option>
                                       <?php } ?>
                                   </select>
                                </div>
                            </div>
    
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label text-right">শ্রেণী<span class="req"> *</span></label>
                                    <select name="class" class="form-control" required>
                                        <option value="">-- নির্বাচন করুন --</option>
                                        <?php
                                            foreach(config_item('classes') as $key => $value){?>
                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
    
                            <div class="col-md-2">
                                <label>&nbsp;</label>
                                <div class="form-group">
                    			    <div class="btn-group pull-left">
                    			        <button type="submit" class="btn btn-success">আপডেট</button>
                    			    </div>
                    			</div>
                            </div>
                        </div>
    
                    </div>
                </div>
            </form>
            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php } ?>

    </div>
</div>

<div class="progress">
    <div class="status">
        Processing
        <progress id="progress" value="0" max="0"></progress>
    </div>
</div>


<script type="text/javascript">

function dataprocess(event){
    event.preventDefault();
    var ids         = Object.values(document.querySelectorAll("input[student=id]"));
    var section     = Object.values(document.querySelectorAll("input[student=section]"));
    var roll        = Object.values(document.querySelectorAll("input[student=roll]"));
    var year        = document.querySelector('select[name=year]').value;
    var session     = document.querySelector('select[name=session]').value;
    var class_      = document.querySelector('select[name=class]').value;
    var progress    = document.querySelector('#progress');
    
    
    var student = [];
    ids.forEach((id, key)=>{
        if(id.checked){
            student.push({
                roll     : roll[key].value,
                section  : section[key].value,
                id       : ids[key].value
            });
        }
    });
    
    var packet_size = Math.ceil(student.length / 50);
    
    progress.setAttribute('max', packet_size);
    progress.setAttribute('value', 0);
    
    if(progress.closest('.progress')){
        progress.closest('.progress').style.display = 'flex';
    }
    
    for(var i=1; packet_size >= i; i++){
        send(i);
    }

    function send(i){
        setTimeout(function(){
            //
            var key   = (i > 0 ? i : 1 );
            //
            var from  = ((key*50)-50);
            //
            var to    = (key*50);
            //
            var formData = new FormData();
            //
            formData.append('students', JSON.stringify(student.slice(from, to)));
            formData.append('year', year);
            formData.append('session', session);
            formData.append('class', class_);
            
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                progress.setAttribute('value', i);
                if(progress.closest('.progress') && packet_size==i){
                    progress.closest('.progress').style.display = 'none';
                    toastr.success("All Data Successfully Processed");
                }
            }
            xhttp.open("POST", "<?=site_url('admission/admission/updateStudentApi')?>");
            xhttp.send(formData);
            
        }, (i == 0 ? 0 : (i*1000)));
    }
 }



	$(document).ready(function(){
		$("#check_all").on("change",function(){
			if($(this).is(":checked")==true){
				$('input[name="id[]"]').prop("checked",true);
			}else{
				$('input[name="id[]"]').prop("checked",false);
			}
		});
	});
</script>
