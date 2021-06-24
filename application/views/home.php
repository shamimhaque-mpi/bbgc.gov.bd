<div class="col-md-9">
    <div class="row">
      <!-- speech -->
        <div class="col-sm-4 col-xs-5 custom-sm">
            <div class="width-speech row">
                <img style="width: 100%; height: 321px;" class="img-responsive" src="<?php echo site_url('public/img/21.jpg'); ?>">
            </div>  
        </div>
        
        <div class="col-sm-8 col-xs-7 custom-sm">
            <div class="width-speech row">
                <div class="speech">
                    <h3>গৃহায়ন ও গনপুর্ত প্রতিমন্ত্রীর বানী</h3>
                                          
                    <p>
                        <img class="img-responsive" src="<?php echo site_url($p_speech[0]->p_speech_path); ?>">

                        <?php echo $p_speech[0]->p_speech_speech;?>
                       
                    </p>
                   
                </div>
            </div>  
        </div>
        
        <!-- notice -->
        <div class="col-md-6 col-sm-6 col-xs-6 custom-sm">
            <div class="width-speech row">
                <div class="speech">
                    <h3> অধ্যক্ষের বানী </h3>
                        
                    <p>
                        <img class="img-responsive" src="<?php echo site_url($principal_speech[0]->p_speech_path); ?>">
                        <?php echo $principal_speech[0]->p_speech_speech;?>
                        
                       
                    </p>
                    
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-sm-6 col-xs-6 custom-sm">
            <div class="width-speech row">
                <div class="speech">
                    <h3> উপাধ্যক্ষের বানী </h3>
                        
                    <p>
                        <img class="img-responsive" src="<?php echo site_url($vp_speech[0]->vp_speech_path); ?>">

                        <?php echo $vp_speech[0]->vp_speech_speech;?>
                       
                    </p>
                    
                </div>
            </div>
        </div>

      
        
        <!-- At a Glance -->
        <!--div class="col-md-12 col-sm-6 col-xs-6 custom-sm">
            <div class="width-speech row">
                <div class="">
                     <h3>এক নজরে দারুল আমান ক্যাডেট মাদ্রাসা</h3>
                    <p><?php if($at_a_glance != NULL){ echo $at_a_glance[0]->at_a_glance ; }?></p>
                </div>
            </div>  
        </div-->        
    </div>   
</div>

