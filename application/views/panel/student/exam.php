
<div class="col-md-9">
    <div class="row single search exam">
        <h3>Exam Name</h3>
        <!-- pre>
            <?php 
            // print_r($this->session->all_userdata());
            // print_r($questions);
            // echo $counter; 
            // echo $this->session->userdata('right_ans');
            // echo $this->session->userdata('wrong_ans');
            ?>
        </pre -->
        
        <?php
        $attribute = array(
            'name' => '',
            'class' => '',
            'id' => ''
        );
        echo form_open('', $attribute);
        ?>
        <p><?php echo $questions->question; ?></p>
        <ul>
            <?php 
            $answers = json_decode($questions->options, TRUE);
            foreach ($answers as $key => $ans){
            ?>
            <li>
                <label>
                    <input type="radio" name="ans" value="<?php echo $key; ?>" />
                    <?php echo $ans; ?>
                </label>
            </li>
            <?php } ?>
        </ul>
        
        <input type="submit" name="exam_submit" value="Next" class="btn-class" />
        <?php echo form_close(); ?>
    </div>
</div>
