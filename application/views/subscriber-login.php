
<!-- student login start -->
<div class="col-md-9">
    <div class="row single search">
        <h3>Student Login Panel</h3>
            <?php echo $this->session->flashdata('error'); ?>
            <?php
                $attr = array('class'=>'general');
                echo form_open('access/subscriber/login', $attr);
            ?>   
            
            <div class="col-md-3">
                <div class="row"><strong>Student ID:</strong></div>
            </div>
    
            <div class="col-md-9">
                <div class="row" style="width:60%;">
                    <input type="text" name="student_id" placeholder=""  required />
                </div>
            </div>
    
            <div class="col-md-3">
                <div class="row"><strong>Password :</strong></div>
            </div>
    
            <div class="col-md-9">
                <div class="row" style="width:60%;">
                    <input type="text" name="password" placeholder="" required />
                </div>
            </div>
    
            <div class="col-md-offset-3 col-md-9">
                <div class="row">
                    <input type="submit" value="Sign-in" style="margin-top:5px;" />
                </div>
            </div>
        
        <?php echo form_close(); ?>
    </div>
    <div class="row border mt-15">
        <div class="col-md-12 py-15">
            <h4>নির্দেশনাঃ</h4>
            <hr class="my-5">
            <ol>
                <li>&emsp;১.&nbsp;শিক্ষার্থীকে তার শিক্ষার্থী আইডি এবং পাসওয়ার্ড দিয়ে তার প্যানেলে লগিন করতে হবে।</li>
                <li>&emsp;২.&nbsp;লগিন করার পর তার ছবি দেখে তার প্যানেল নিশ্চিত করতে হবে।</li>
                <li>&emsp;৩.&nbsp;শিক্ষার্থীকে তার একাডেমিক, ব্যাক্তিগত তথ্য সহ অন্যান্য তথ্য দিয়ে আবেদন ফর্মটি পূরণ করে সাবমিট করতে হবে।</li>
                <li>&emsp;৪.&nbsp;আবেদন ফর্ম সাবমিটের পর সে তার প্রিন্ট কপি সংরক্ষণ করবে এবং কলেজের নির্দিষ্ট শাখায় জমা দিবে।</li>
            </ol>
        </div>
    </div>
</div>
<!-- student login end -->
<style>
    .border {
        border: 1px solid #ddd;
    }
    .mt-15 {
        margin-top: 15px;
    }
    .py-15 {
        padding-top: 15px;
        padding-bottom: 15px;
    }
    .my-5 {
        margin-top: 5px;
        margin-bottom: 5px;
    }
</style>