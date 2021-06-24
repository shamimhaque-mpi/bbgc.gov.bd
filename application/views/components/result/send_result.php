<style type="text/css">
    .caption{
        text-align: left;
        font-size: 18px;
        line-height: 40px;
    }
    .all-roll-div{
        max-height: 300px;
        overflow-y: scroll;
    }
    .message-div{
        margin-top: 20px;
    }
    .message-div textarea{
        width: 100%;
        height: 150px;
        padding: 5px;
        resize: none;
        font-size: 14px;
    }
</style>

<!-- add account page start here -->
<div class="column global-pad">
    <div class="row">
        <?php
        $attributeShow = array(
            'name' => '',
            'class' => 'horizontal',
            'id' => ''
        );
        echo form_open('', $attributeShow);
        ?>

        <blockquote class="form-head">
            <h1>Send Result as SMS</h1>
            <small>
                1. Fill all the required <mark>*</mark> fields<br/>
                2. Click the <mark>Show</mark> button to save data 
            </small>
        </blockquote>       
        <div class="form-content"> 
        <?php  echo $confirmation; ?>
        <div class="form-element">
                <label>Year </label>
                  <select class="form-control" name="condition[year]">
                    <option value="">-- Select Year --</option> 
                    <?php
                     for($i=2015;$i<=date('Y')+2;$i++) 
                     {
                      ?>          
                        <option value="<?php echo $i;?>"><?php echo $i;?></option> 
                       <?php
                     }
                    ?>    
                </select>
            </div>  
            
            
    <div class="form-element">
                <label>Class </label>
                  <select class="form-control" name="condition[class]">
                    <option value="">-- Select Class --</option>
                    <?php  
                    $class_array=array('1'=>'One','2'=>'Two','3'=>'Three','4'=>'Four','5'=>'Five','6'=>'Six','7'=>'Seven','8'=>'Eight','9'=>'Nine','10'=>'Ten','11'=>'Eleven','12'=>'Twelve','13'=>'Play','14'=>'Nursery','15'=>'KG'); 
                               
                     foreach($student_class as $value):
                     {
                       ?>
                          <option value="<?php echo $value->class;?>"> <?php echo $class_array[$value->class];?></option>
                       <?php
                     }
                     endforeach;
                   ?>
                    
                </select>
            </div>    
            
            
       <div class="form-element">
            <label>Batch </label>
            <select name="condition[batch]" class="form-control" required>
		<option value="">-- Select Batch --</option>
		<option value="07:00–09:00">Provaty Batch (07:00 – 09:00 AM) </option>
		<option value="09:30–11:30" >Sokalik Batch (09:30 – 11:30   AM)</option>
		<option value="12:00–02:00" >Moddhonno Batch (12:00 – 02:00 PM)</option>
		<option value="02:00–04:00" >Diba Batch  (02:00 – 04:00 PM )</option>
		<option value="04:15–06:15" >Boikalik Batch (04:15 – 06:15 PM )</option>
		<option value="09:30–03:00" >Cadet Special Batch  (09:30 – 03:00 PM )</option>
		<option value="12:00am–12:00pm" >Residential Batch</option>
	    </select>
       </div>
            
                  
            
         <div class="form-element">
                <label>Exam</label>
                 <select class="form-control" name="condition[exam]">
                    <option value="">-- Select Exam--</option>                    
                   <?php  
               
                               
                     foreach($exam as $evalue):
                     {
                       ?>
                          <option value="<?php echo $evalue->exam;?>"> <?php echo ucwords(str_replace('-',' ',$evalue->exam));?></option>
                       <?php
                     }
                     endforeach;
                   ?> 
                    
                 </select>
            </div>   
        </div>
        <blockquote class="form-foot">
            <input type="submit" class="button" name="btnShow" value="Show" />
        </blockquote>
        <?php echo form_close(); ?>
    </div>
    
    
    <?php if($students != NULL){ ?>
    <div class="row">
        <!--pre><?php  print_r($students); ?></pre-->
        
        
        <?php
        $attributeSend = array(
            'name' => '',
            'class' => 'horizontal',
            'id' => ''
        );
        echo form_open('', $attributeSend);
        ?>
        
        <blockquote class="form-head">
            <h1>Send Result as SMS</h1>
            <small>
                1. Fill all the required <mark>*</mark> fields<br/>
                2. Click the <mark>Send</mark> button to save data 
            </small>
        </blockquote>
        
        <div class="form-content">
            <div>
                <span class="caption">Roll Numbers</span>
                <div class="all-roll-div">
               
                    <table>
                        <?php 
                        $c = $this->input->post('condition');
                        foreach ($students as $key => $student) { 
                        ?>
                        <tr>
                            <td>
                            <?php echo $student->roll; ?>
                            <input type="hidden" name="roll[]" value="<?php echo $student->roll; ?>" />
                            </td>
                            
                            <td>
                            <?php 
                            $sub_marks = array();
                            $content = "";
                            $details = $this->action->read('marks', array('roll' => $student->roll));
                            foreach($details as $sub){
                            	$marks = json_decode($sub->marks, true);
                            	if(! in_array($sub->subject, $sub_marks)){
                            		$sub_marks[$sub->subject] = $marks['marks'];
                            	}
                            }
                            
                            // print_r($sub_marks);
                            foreach($sub_marks as $key => $mar){
                            	$content .= ucwords(str_replace("_", " ", $key)) . " = " . $mar . " ";
                            	echo ucwords(str_replace("_", " ", $key)) . " : " . $mar . "  "; 
                            }
                            ?>
                            <input type="hidden" name="exam" value="<?php echo $c['exam']; ?>" />
                            <input type="hidden" name="message[]" value="<?php echo $content; ?>" />
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            
          
        </div>
        
        <blockquote class="form-foot">
            <input type="submit" class="button" name="btnSend" value="Send" />
        </blockquote>
        <?php echo form_close(); ?>
    </div>
    <?php } ?>
</div>
<!-- add account page end here -->



