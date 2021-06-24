<style>
    /* texteditor style */
#mceu_22{
    border: 1px solid #eee !important;
}
</style>

<div class="container-fluid">
    <div class="row">
        <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>At a Glance</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">
                    <h4>Add At a Glance</h4>
                    <ol style="font-size: 14px;">
                        <li> 1. fill all the required <mark>*</mark> fields</li>
                        <li>2. click the <mark>save</mark> button to insert data</li>
                    </ol>
                </blockquote>

                <hr-->

                <!-- horizontal form -->
                    
                    <div class="col-sm-12 no-padding">

                        <?php
                            $attr=array("class"=>"form");
                            echo form_open('', $attr);
                        ?>
                            <input type="hidden" value="" id="hidden_id" name="id_num">
                            <div class="form-group">
                                <label class="control-label">Title <span class="req">*</span></label>
                                <div class="">
                                    <input type="text" id="title" name="title" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Description <span class="req">*</span></label>
                                <textarea name="description" id="tinyTextarea" class="form-control" cols="30" rows="15"></textarea>
                            </div> 

                            <div class="btn-group pull-right">
                                <input type="submit" name="aag_save" id="submit_btn" value="Save" class="btn btn-primary">
                            </div>

                        <?php echo form_close(); ?>

                    </div>

                </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function(){
        function exec(){
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('header/speech/ajax_at_a_glance'); ?>",
        }).success(function(response){
            if (response!="Error"){
                var data=JSON.parse(response);
                $("#hidden_id").val(data.id);
                $("#title").val(data.at_a_glance_title);
                tinyMCE.activeEditor.setContent(data.at_a_glance);

                $("#submit_btn").attr("name","aag_update");
                $("#submit_btn").attr("value","Update");
                $("#submit_btn").removeClass('btn-primary');
                $("#submit_btn").addClass('btn-success');
                console.log(data);

            }
        });
    }
    setTimeout(exec,1000);
    });
</script>

