<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
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

<?php 
    if($incomeEdit==null){
        redirect('income/infoView/showIncome');
    } 
?>

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
        echo form_open('income/infoView/edit/'.$incomeEdit[0]->id, $attribute);
    ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1> Edit Income </h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <!-- Print banner -->
                <img class="img-responsive print-banner hide" src="<?php echo site_url('public/img/banner.png'); ?>">

                <div class="no-title">&nbsp;</div>

                <!-- left side -->
                <div class="col-md-9">                                
                    
                        <div class="form-group">
                            <label class="col-md-3 control-label">Date</label>
                            <div class="input-group date col-md-7" id="datetimepicker1">
                                <input type="text" name="date" class="form-control" value="<?php echo $incomeEdit[0]->date; ?>" >
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
                                    <option <?php echo ($incomeEdit[0]->income_type=="students") ? 'selected' : ''; ?> value="students">Students</option>
                                    <option <?php echo ($incomeEdit[0]->income_type=="others") ? 'selected' : ''; ?> value="others">Others</option>
                                </select> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label"> Roshid No </label>
                            <div class="col-md-7">
                                <input type="text" name="rosid_no" value="<?php echo $incomeEdit[0]->rosid_no; ?>" readonly class="form-control" placeholder="রশিদ নং">
                            </div>
                        </div>
                        <div class="form-group student_row">
                            <label for="" class="col-md-3 control-label">Class </label>
                            <div class="col-md-7">
                                <select name="class" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                    <option value="">-- Select Class --</option>
                                    <?php foreach(config_item('classes') as $key => $value){?>
                                        <option <?php if($incomeEdit[0]->class==$key){echo"selected"; } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
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
                                        <option <?php echo  ($incomeEdit[0]->session==$i."-".($i+1)) ? "selected" : ""; ?> value="<?php echo $i."-".($i+1); ?>"><?php echo $i."-".($i+1); ?></option>
                                    <?php } ?>                             
                                </select> 
                            </div>
                        </div>
                        
                        <div class="form-group student_row" >
                            <label for="" class="col-md-3 control-label">Roll No</label>
                            <div class="col-md-7">
                                <input type="text" name="roll_no" value="<?php echo $incomeEdit[0]->roll_no; ?>" class="form-control" placeholder="Roll No">
                            </div>
                        </div>
                        
                        <div class="row">
                            <label for="" class="col-md-3 control-label">Field Of Income </label>
                            <div class="col-md-7">
                                <table class="table table-bordered">
                                    <tr id="man_get_data_from_this">
                                        <td>
                                            <select class='form-control select2' onchange="push_field_data()" id="incomeField">
                                                <option value="" selected disabled>-Select Field-</option>
                                                <?php 
                                                    foreach ($income_fields as $key => $value) {
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
                                    <tbody id="man_append_to_this">
                                        <?php
                                            if($incomeEdit){foreach($incomeEdit as $incom_key => $income_value){
                                                $field_name = $this->action->read('income_field', ['id'=>$income_value->income_field]);
                                        ?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="income_field[]" value="<?php echo $income_value->income_field; ?>" class='form-control' required>
                                                    <input type="text" value="<?php echo ($field_name!=null) ? $field_name[0]->field_income: ''; ?>" class='form-control' readonly required>
                                                </td>
                                                <td>
                                                    <input type="number" name="amount[]" value="<?php echo $income_value->amount; ?>" class="form-control main_input" placeholder="Amount..." min="0" required>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn-danger" onclick="return confirm('Are you sure to delete this?') ? delete_this('<?php echo $income_value->id; ?>') : false" style="border: none; padding: 5px 10px;">
                                                        <strong style="display: inline-block;transform: rotate(-45deg)">+</strong>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                        
                        <script>
                            function delete_this(id){
                                var xhttp = new XMLHttpRequest();
                                  xhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        if(this.responseText){
                                          alert('Income Delete Successfully!');
                                          location.reload();
                                        }
                                    }
                                };
                                xhttp.open("POST", "<?php echo site_url('income/infoView/deleteSingleIncomeByAjax'); ?>", true);
                                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                xhttp.send("id="+id);
                            }
                        </script>
                        
                        
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Discription </label>
                            <div class="col-md-7">
                               <textarea name="description" class="form-control" cols="30" rows="4" placeholder="Add Your Discription...."><?php echo $incomeEdit[0]->description; ?></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label"> Income By </label>
                            <div class="col-md-7">
                                <input type="text" name="income_by" class="form-control" value="<?php echo $incomeEdit[0]->income_by; ?>" placeholder="সর্বোচ্চ ১০০ অক্ষর">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-7">
                                <div class="btn-group pull-right">
                                    <input class="btn btn-primary" type="submit" name="edit_income" value="Update">
                                    <input class="btn btn-danger" type="reset"  value="Clean">
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
        if($('#income_type').val()!="students"){
            $('.student_row').hide();
        }
    });
    
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>






<script>
/*    man_clon_tr.onclick=()=>{
      var clonedTr = man_append_to_this.firstElementChild.cloneNode(true);
      man_append_to_this.append(clonedTr);
      var man_last_tr = man_append_to_this.lastElementChild;
      man_last_tr.children[(man_last_tr.children.length)-1].innerHTML = `<button type="button" class="btn-danger" onclick="man_remove_tr(this)" style="border: none; padding: 5px 10px;">
                                                                            <strong style="display: inline-block;transform: rotate(-45deg)">+</strong>
                                                                        </button>`;
      man_last_tr.children[(man_last_tr.children.length)-2].firstElementChild.value='';
      man_last_tr.children[(man_last_tr.children.length)-3].firstElementChild.value='';
      man_last_tr.children[(man_last_tr.children.length)-3].lastElementChild.value='';
    }
    
    function man_remove_tr(x){
      if(x.closest('tbody').firstElementChild != x.closest('tr')){
        x.closest('tbody').removeChild(x.closest('tr'));
      }else{
          alert("This Field Has No Permission To Delete.");
      }
    }*/
</script>