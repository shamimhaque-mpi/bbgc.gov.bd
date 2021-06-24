<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer{
            display: none !important;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .hide{
            display: block !important;
        }
        .block-hide{
            display: none;
        }
    }
</style>


<div class="container-fluid block-hide">
    <div class="row">
    <?php echo $this->session->flashdata('confirmation'); ?>

    <!-- horizontal form -->
    <?php
        $attribute = array(
            'name' => '',
            'class' => 'form-horizontal',
            'id' => ''
        );
        echo form_open('income/infoView/addIncome', $attribute);
    ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>New Income</h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>

                <!-- left side -->
                <div class="col-md-9">                                
                    
                        <div class="form-group">
                            <label class="col-md-3 control-label">Date<span class="req">*</span></label>
                            <div class="input-group date col-md-7" id="datetimepicker1">
                                <input type="text" name="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" required>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Income Type</label>
                            <div class="col-md-7">
                                <select id="income_type" name="income_type" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                    <option value="" selected>Select Income Type</option>
                                    <option value="students">Students</option>
                                    <option value="others">Others</option>
                                </select> 
                            </div>
                        </div>
                        
                        <div class="form-group" >
                            <label for="" class="col-md-3 control-label">Roshid No</label>
                            <div class="col-md-7">
                                <input type="text" name="rosid_no"  id="rosid_no"  class="form-control" placeholder="Roshid no" required>
                                <span id="roshid_msg" style="color: red;"></span>
                            </div>
                        </div>
                        
                        <div class="form-group student_row" >
                            <label for="" class="col-md-3 control-label">Class </label>
                            <div class="col-md-7">
                                 <select name="class" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                    <option value="">-- Select Class --</option>
                                    <?php foreach(config_item('classes') as $key => $value){?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php } ?>                             
                                </select> 
                            </div>
                        </div>
                        
                        <div class="form-group student_row" >
                            <label for="" class="col-md-3 control-label">Session </label>
                            <div class="col-md-7">
                                 <select name="session" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                    <option value="">-- Select Session --</option>
                                    <?php for($i=2011; $i<(date("Y")+6); $i++){ ?>
                                        <option value="<?php echo $i."-".($i+1); ?>"><?php echo $i."-".($i+1); ?></option>
                                    <?php } ?>                             
                                </select> 
                            </div>
                        </div>
                        
                        <div class="form-group student_row" >
                            <label for="" class="col-md-3 control-label">Roll No</label>
                            <div class="col-md-7">
                                <input type="text" name="roll_no" class="form-control" placeholder="Roll No">
                            </div>
                        </div>
                        
                        <div class="row">
                            <label for="" class="col-md-3 control-label">Field Of Income</label>
                            <div class="col-md-7">
                                <table class="table table-bordered">
                                    <tr id="man_get_data_from_this">
                                        <td>
                                            <select class="form-control select2" required onchange="push_field_data()" id="incomeField">
                                                <option value="" selected disabled>-Select Field-</option>
                                                <?php 
                                                    foreach ($incomeField as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value->code; ?>"><?php echo $value->field_income; ?></option>
                                                <?php } ?>                             
                                            </select> 
                                        </td>
                                    </tr>
                                </table>
                                
                                <!--this is out put table-->
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="200">Field Of Income</th>
                                        <th>Amount</th>
                                        <th width="15">
                                            Delete
                                        </th>
                                    </tr>
                                    <tbody id="man_append_to_this"></tbody>
                                </table>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Description </label>
                            <div class="col-md-7">
                               <textarea name="description" class="form-control" cols="30" rows="4" placeholder="Add Your Description....."></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label"> Income By </label>
                            <div class="col-md-7">
                                <input type="text" name="income_by" class="form-control" placeholder="Maximum 100 Characters.........">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-7">
                                <div class="btn-group pull-right">
                                    <input class="btn btn-primary" type="submit" id="submit_income" name="add_income" value="Save">
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>

<script>
    function push_field_data(event){
        var income_field = man_get_data_from_this.children[0].firstElementChild,
            tr                    = '',
            income_field_children = income_field.children,
            incomeFieldName       = '';
        
        income_field_children = Array.isArray(income_field_children) ? income_field_children : Object.values(income_field_children);
        
        income_field_children.forEach(function(single_income_field_children){
            if(single_income_field_children.value==income_field.value){
                incomeFieldName = single_income_field_children.innerHTML;
            }
        });
        
        console.log(income_field);
        
        tr = `
                <tr>
                    <td>
                        <input type="hidden" name="income_field[]" value="${income_field.value}" class='form-control' required>
                        <input type="text" value="${incomeFieldName}" class='form-control' readonly required>
                    </td>
                    <td>
                        <input type="number" name="amount[]" value="0" class="form-control main_input" placeholder="Amount..." min="0" required>
                    </td>
                    <td>
                        <button type="button" class="btn-danger" onclick="man_remove_tr(this)" style="border: none; padding: 5px 10px;">
                            <strong style="display: inline-block;transform: rotate(-45deg)">+</strong>
                        </button>
                    </td>
                </tr>
              `;
              
        man_append_to_this.innerHTML += tr;
    }

    function man_remove_tr(x){
        x.closest('tbody').removeChild(x.closest('tr'));
    }
</script>

<script>
    rosid_no.oninput = function() {
        var rosid = $( "#rosid_no" ).val();
        $.post("<?php echo site_url('income/infoView/roshid_info');  ?>", 
            { rosid: rosid}, 
            function(data,success){
                var row = parseInt(data);
               if(row > 0){
                   roshid_msg.innerHTML = 'This Roshid No Already Taken!';
                   submit_income.style.cssText = "pointer-events: none";
               }else{
                   roshid_msg.innerHTML = '';
                   submit_income.style.cssText = "pointer-events: auto";
               }
            }
        );
    }     
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        $('#income_type').change(function(){
            var type = $('#income_type').val();
            if(type == 'students'){
                $('.student_row').show();
            }else{
                $('.student_row').hide();
            }
        });
        $('.student_row').hide();
    });
    
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>