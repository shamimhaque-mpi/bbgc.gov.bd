<style type="text/css">
    pre{
        line-height: 15px;
        font-size: 16px;
        clear: both;
        margin: 15px 0 0;
        padding: 15px;
    }    
</style>

<!-- Transition area stare -->
<div class="col-md-9">
    <div class="row single search">
        <h3>Recover PIN Number</h3>

        <form action="" class="general">

        <div id="mess"><?php echo $confirmation; ?></div>

        <div class="row">
            <div class="col-md-6">
                <input  style="width:99% !important;" type="text" name="trxid" value="" placeholder="TrxID" required    />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <input type="text" name="guardian_mobile" value="" placeholder="Guardian Mobile number" required />
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <input type="submit" value="Submit" name="recover_tracking_id" />
            </div>
        </div>
        
       
        <div class="col-md-12">
            <div class="row">
<pre>
Applicant      : Abc<br/>
Father's Name  : Abc<br/>
Mother's Name  : Abc<br/>
PIN Number     : 254864
</pre>
            </div>
        </div>
        
        
        </form>
    </div>
</div>
<!-- Transition area end -->
