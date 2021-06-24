<style>
    .cusLabel{
        display:  flex;
    }
    .cusLabel input[type="checkbox"]{
        margin-right: 5px;
        margin-top: 10px;
    }
</style>

<div class="container-fluid">
    <div class="row">
    <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1><?php echo caption('Fee_Set'); ?></h1>
                </div>
            </div>

            <div class="panel-body">
                <?php 
                    $attr=array(
                        'class'=>'form-horizontal'
                        );
                    echo form_open('',$attr);
                ?>
                    <input type="hidden" name="hidden_id" id="hidden_id" value="">
                    <div class="row">
	                    <div class="col-md-9">
		                    <div class="form-group">
		                        <label class="col-md-3 control-label"><?php echo caption('Class'); ?> <span class="req">&nbsp;</span></label>
		
		                        <div class="col-md-8">
		                            <select name="payment_class" id="class" class="form-control">
		                                <option value="">-- <?php echo caption('Select'); ?> --</option>
		                                <?php
		                                    foreach (config_item('classes') as $key => $value) {?>
		                                        <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
		                                    <?php
		                                    }
		                                ?>
		                            </select>
		                        </div>
		                    </div>
		                    
		                      <div class="form-group">
		                        <label class="col-md-3 control-label">আবাসিক<span class="req">&nbsp;</span></label>
		                        <div class="col-md-8">
		                            <select name="payment_type"  id="type"  class="form-control" >
		                               <option value="yes"> আবাসিক </option>
		                               <option value="no"> অনাবাসিক </option>
		                           </select>
		                        </div>
		                    </div>
		                    
		                    <div class="form-group">
		                        <label class="col-md-3 control-label"><?php echo caption('Student_ID'); ?> <span class="req">&nbsp;</span></label>
		
		                        <div class="col-md-8">
		                            <input type text name="reg_id" id="reg_id" class="form-control">
		                        </div>
		                    </div>
			    </div>
			    
	                    <div class="col-md-3">
				<img class="img-thumbnail" style="height: 150px;" id="student_image" src="" alt="Image Not Found">
				<p id="student_name"></p>
			    </div>
		    </div>
                    <hr>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label  class="col-md-5 control-label">মাসিক বেতন <span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="monthly_tution_fee" value="0">
                                    </div>
                                </div>
                            </div>
                            
                            <!--div class="form-group">
                                <label for="late" class="col-md-5 control-label"><?php echo caption('Late_Fee'); ?> <span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="late_fee" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label">লেইট ফি ২য় দিন থেকে <span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="late_fee_2nd" value="0">
                                    </div>
                                </div>
                            </div-->

                            <div class="form-group">
                                <label class="col-md-5 control-label">ভর্তি<span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="addmission" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-5 control-label">নবায়ন ফি (পুরাতন)<span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="renewal_fee_old" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-5 control-label">ডাইনিং বিল  <span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="dining_bill" value="0">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-5 control-label">পরিবহন বিল<span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="transport_bill" value="0">
                                    </div>
                                </div>
                            </div>

                             <!--div class="form-group">
                                <label class="col-md-5 control-label">রশিদ<span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="receipt" value="0">
                                    </div>
                                </div>
                            </div>

                             <div class="form-group">
                                <label  class="col-md-5 control-label">বই<span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="book" value="0">
                                    </div>
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="sprots_cultural_fee" class="col-md-5 control-label">ক্রিড়া ও সাংস্কৃতিক ফি:<span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="sprots_cultural_fee" value="0">
                                    </div>
                                </div>
                            </div-->

                            <div class="form-group">
                                <label class="col-md-5 control-label">আবাসিক চার্জ<span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="resedintial_charge" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-5 control-label">জেনারেটর চার্জ <span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="generator_chage" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-5 control-label">এসি চার্জ <span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="ac_charge" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-5 control-label">স্পেশাল আরবির কোচিং এ ভর্তি ফি:<span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="arabic_coaching_admit" value="0">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-5 control-label">স্পেশাল আরবির কোচিং ফি:<span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="arabic_coaching_tution" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">

                            <!--div class="form-group">
                                <label class="col-md-5 control-label">হাতের লেখার কোচিং এ ভর্তি ফি:<span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="handwritting_admit" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-5 control-label">হাতের লেখার কোচিং ফি:<span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="handwritting_tution" value="0">
                                    </div>
                                </div>
                            </div-->
                           
                            <div class="form-group">
                                <label class="col-md-5 control-label">ডে-কেয়ার ভর্তি ফি:<span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="day_care_admit" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-5 control-label">ডে-কেয়ার ক্লাস ফি: <span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="day_care_class" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-5 control-label">ডে-কেয়ার ফি:<span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="day_care_fee" value="0">
                                    </div>
                                </div>
                            </div>

                            <!--div class="form-group">
                                <label class="col-md-5 control-label">স্পেশাল ইসলামি সংগীত ক্লাস এ ভর্তি ফি:<span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="islamic_cultural_admit" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-5 control-label">স্পেশাল ইসলামি সংগীত ক্লাস ফি:  <span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="islamic_class_fee" value="0">
                                    </div>
                                </div>
                            </div-->

                            <div class="form-group">
                                <label class="col-md-5 control-label">মাসিক পরিক্ষা ফি<span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="monthly_exam" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-5 control-label">সেমিস্টার/বার্ষিক পরীক্ষার ফি: <span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="semester_anual_exam" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-5 control-label">প্রত্যয়ন পত্র<span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="certification" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label">ট্রান্সফার সার্টিফিকেট<span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="tc" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-5 control-label">স্টেশনারি  বিক্রয়<span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="stetationary" value="0">
                                    </div>
                                </div>
                            </div>
                            <!--div class="form-group">
                                <label  class="col-md-5 control-label">কর্জ আদায়<span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="korjo_adai" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label">দান<span class="req">&nbsp;</span></label>
                                <div class="col-md-7">
                                    <div class="cusLabel">
                                        <input type="text" class="form-control amount" name="donation" value="0">
                                    </div>
                                </div>
                            </div-->

                        </div>

                    </div>

                    <div class="btn-group pull-right">
                        <input type="submit" id="submit_btn" name="amount_insert" value="<?php echo caption('Save'); ?>" class="btn btn-primary">
                    </div>
                <?php echo form_close(); ?>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

    </div>

</div>
<script type="text/javascript" src="<?php echo base_url("private/js/inword.js");?>"></script>
<script type="text/javascript">
    
    $(document).ready(function(){
        $("#class").on("change",function(){
		fetch_data();
		$("#reg_id").val("")
		$("#student_image").attr("src","");
		$("#student_name").html("");
        });
        
         $("#type").on("change",function(){
		fetch_data();	
		$("#reg_id").val("")	
		$("#student_image").attr("src","");
		$("#student_name").html("");
        });
        
        $("#reg_id").on("keyup",function(){
		fetch_data();
        });
        
        function fetch_data(){
            var className=$("#class").val();
            var reg_id = $("#reg_id").val();
            var residential = $("#type").val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('student_payment/payment/ajax_set_amount1'); ?>",
                data: {
                    class_name:className,
                    residential:residential,
                    reg_id:reg_id                    
                }
            }).success(function(response){
		//console.log(response);
                if (response!="Error"){
                    var data=JSON.parse(response);
                    console.log(data);
                    
                    $("#student_image").attr("src","<?php echo site_url();?>/"+data.students_photo);
                    $("#student_name").html(data.bg_student_name);
                    
                    $('#hidden_id').val(data.id);
                    $('input[name="tution_fee"]').val(data.tution_fee);
                    $('input[name="late_fee"]').val(data.late_fee);
                    $('input[name="late_fee_2nd"]').val(data.late_fee_2nd);
                    $('input[name="addmission"]').val(data.addmission);
                    $('input[name="renewal_fee_old"]').val(data.renewal_fee_old);
                    $('input[name="monthly_tution_fee"]').val(data.monthly_tution_fee);
                    $('input[name="dining_bill"]').val(data.dining_bill);
                    $('input[name="transport_bill"]').val(data.transport_bill);
                    $('input[name="receipt"]').val(data.receipt);
                    $('input[name="book"]').val(data.book);
                    $('input[name="sprots_cultural_fee"]').val(data.sprots_cultural_fee);
                    $('input[name="resedintial_charge"]').val(data.resedintial_charge);
                    $('input[name="generator_chage"]').val(data.generator_chage);
                    $('input[name="ac_charge"]').val(data.ac_charge);
                    $('input[name="arabic_coaching_admit"]').val(data.arabic_coaching_admit);
                    $('input[name="arabic_coaching_tution"]').val(data.arabic_coaching_tution);
                    $('input[name="handwritting_admit"]').val(data.handwritting_admit);
                    $('input[name="handwritting_tution"]').val(data.handwritting_tution);
                    $('input[name="id_card"]').val(data.id_card);
                    
                    $('input[name="day_care_admit"]').val(data.day_care_admit);
                    $('input[name="day_care_class"]').val(data.day_care_class);
                    $('input[name="day_care_fee"]').val(data.day_care_fee);
                    $('input[name="islamic_cultural_admit"]').val(data.islamic_cultural_admit);
                    $('input[name="islamic_class_fee"]').val(data.islamic_class_fee);
                    $('input[name="monthly_exam"]').val(data.monthly_exam);
                    $('input[name="semester_anual_exam"]').val(data.semester_anual_exam);
                    $('input[name="certification"]').val(data.certification);
                    $('input[name="tc"]').val(data.tc);
                    $('input[name="korjo_adai"]').val(data.korjo_adai);
                    $('input[name="donation"]').val(data.donation);
                    $('input[name="late_fee"]').val(data.late_fee);
                   


                    $("#submit_btn").attr("name","amount_update");
                    $("#submit_btn").attr("value","Update");
                    $("#submit_btn").removeClass('btn-primary');
                    $("#submit_btn").addClass('btn-success');
                }
                else{
                    $("#student_image").attr("src","");
                    $("#student_name").html("");
			console.log(response);
                    $('#hidden_id').val(0);
                    $('input[name="tution_fee"]').val(0);
                    $('input[name="late_fee"]').val(0);
                    $('input[name="late_fee_2nd"]').val(0);
                    $('input[name="addmission"]').val(0);
                    $('input[name="renewal_fee_old"]').val(0);
                    $('input[name="monthly_tution_fee"]').val(0);
                    $('input[name="dining_bill"]').val(0);
                    $('input[name="transport_bill"]').val(0);
                    $('input[name="receipt"]').val(0);
                    $('input[name="book"]').val(0);
                    $('input[name="sprots_cultural_fee"]').val(0);
                    $('input[name="resedintial_charge"]').val(0);
                    $('input[name="generator_chage"]').val(0);
                    $('input[name="ac_charge"]').val(0);
                    $('input[name="arabic_coaching_admit"]').val(0);
                    $('input[name="arabic_coaching_tution"]').val(0);
                    $('input[name="handwritting_admit"]').val(0);
                    $('input[name="handwritting_tution"]').val(0);
                    // $('input[name="cap"]').val(0);
                    // $('input[name="base"]').val(0);
                    // $('input[name="tie"]').val(0);
                    $('input[name="day_care_admit"]').val(0);
                    $('input[name="day_care_class"]').val(0);
                    $('input[name="day_care_fee"]').val(0);
                    $('input[name="islamic_cultural_admit"]').val(0);
                    $('input[name="islamic_class_fee"]').val(0);
                    $('input[name="monthly_exam"]').val(0);
                    $('input[name="semester_anual_exam"]').val(0);
                    $('input[name="tc"]').val(0);
                    $('input[name="stetationary"]').val(0);
                    $('input[name="korjo_adai"]').val(0);
                    $('input[name="donation"]').val(0);
                    $('input[name="late_fee"]').val(0);


                    $("#submit_btn").attr("name","amount_insert");
                    $("#submit_btn").attr("value","Save");
                    $("#submit_btn").removeClass('btn-success');
                    $("#submit_btn").addClass('btn-primary');
                }
            });
        }
    });
</script>