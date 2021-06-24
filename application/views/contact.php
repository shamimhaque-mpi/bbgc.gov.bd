<div class="col-md-9">
    <div class="row">
    <?php echo $message; ?>
        <div class="single clearfix">
            <!-- contact -->
            <div style="width:100%;height:300px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7239.842395410416!2d90.41805977337339!3d24.866540863847696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6c5f2fdb2aaee0e4!2sTarakanda+Bazar!5e0!3m2!1sen!2sbd!4v1473127474309" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <?php echo form_open(); ?>
            <div class="contact-form">
               
                <div class="col-md-12">
                    <div class="row">
                        <textarea name="message" id="in4" placeholder="Message..." required ></textarea>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="row">
                        <input type="text" name="name" placeholder="Name" id="in1" required />
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="row">
                        <input type="text" name="mobile" placeholder="Mobile Number (11 Digits)" id="in3" required />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <input style="margin-top:6px;" type="submit" name="msg_submit" class="btn-contact" value="Send" name="contact_message" />
                    </div>
                </div>
                
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


