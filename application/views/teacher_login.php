<!-- student login start -->
<div class="col-md-9">
    <div class="row single search">
        <h3>Teacher Login Panel</h3>
        <?php
        $attribute = array(
            'name' => '',
            'class' => 'general',
            'id' => ''
        );
        echo form_open('',$attribute);
        ?>
            
        <div class="col-md-3">
            <div class="row">Username:</div>
        </div>

        <div class="col-md-9">
            <div class="row" style="width:60%;">
                <input type="text" name="username" placeholder="Username" value="" required />
            </div>
        </div>

        <div class="col-md-3">
            <div class="row">Password :</div>
        </div>

        <div class="col-md-9">
            <div class="row" style="width:60%;">
                <input type="password" name="password" placeholder="Password" required />
            </div>
        </div>

        <div class="col-md-offset-3 col-md-9">
            <div class="row">
                <input type="submit" value="Sign-in" style="margin-top:5px;" />
            </div>
        </div>
        
        <?php echo form_close(); ?>
    </div>
</div>
<!-- student login end -->
