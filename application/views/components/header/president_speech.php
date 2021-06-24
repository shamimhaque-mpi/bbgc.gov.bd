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
                    <h1>President Speech</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>Add Principal Speech</h4>

                    <ol style="font-size: 14px;">
                        <li>1. fill all the required <mark>*</mark> fields</li>
                        <li>2. click the <mark>save</mark> button to insert data</li>
                    </ol>

                </blockquote>

                
                <hr-->

                <!-- horizontal form -->
                
                    
                    <div class="col-sm-12">

                        <?php
                            $attr=array();
                            echo form_open_multipart('', $attr);
                        ?>

                            <input type="hidden" value="" id="hidden_image_url" name="hidden_image_url">
                            <input type="hidden" value="" id="hidden_id" name="id_num">
                            
                            <div class="form-group clearfix">
                                <img class="pull-right" src="" id="p_image" class="img-thumbnail" style="height: 100px;" alt="">
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-2">Image <span class="req">*</span></label>
                                <div class="col-md-5">
                                <input id="input-test" name="attachFile" type="file" class="form-control file" data-show-preview="false" data-show-upload="false" data-show-remove="false" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Description <span class="req">*</span></label>
                                <textarea name="description" id="tinyTextarea" class="form-control" cols="30" rows="15"  style="font-size: 15px;"></textarea>
                            </div> 

                           
                            <div class="btn-group pull-right">
                                <input type="submit" name="add_speech" id="submit_btn" value="Save" class="btn btn-primary">
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
            url: "<?php echo site_url('header/speech/ajax_p_speech'); ?>",
        }).success(function(response){
            if (response!="Error"){
                var data=JSON.parse(response);
                $("#p_image").attr("src","<?php echo base_url();?>"+data.p_speech_path);
                $("#hidden_image_url").val(data.p_speech_path);
                $("#hidden_id").val(data.id);
                tinyMCE.activeEditor.setContent(data.p_speech_speech);

                $("#submit_btn").attr("name","update_speech");
                $("#submit_btn").attr("value","Update");
                $("#submit_btn").removeClass('btn-primary');
                $("#submit_btn").addClass('btn-success');

                $("#input-test").removeAttr('required','required');

            }
        });
    }
    setTimeout(exec,1000);
    });
</script>