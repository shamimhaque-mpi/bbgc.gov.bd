<style>
    /* texteditor style */
#mceu_22{
    border: 1px solid #eee !important;
}

#tinymce p{
    font-size: 14px !important;
}
</style>


<div class="container-fluid">
    <div class="row">
        <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Page Content</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>Add Page Content</h4>

                    <ol style="font-size: 14px;">
                        <li>1. fill all the required <mark>*</mark> fields</li>
                        <li>2. click the <mark>save</mark> button to insert data</li>
                    </ol>

                </blockquote>
                
                <hr-->

                <!-- horizontal form -->

                
                    
                    <div class="col-md-12">

                        <?php
                        $attr=array(
                            );
                        echo form_open_multipart('', $attr);?>
                            <input type="hidden" name="hidden_image_url" id="hidden_image_url" value="">
                            <input type="hidden" name="id_num" id="hidden_id" value="">
                            <div class="form-group row">
                                <label class="control-label col-md-2">Page <span class="req">*</span></label>
                                
                                <div class="col-md-5">
                                <select name="page" id="page" class="form-control" required>
                                    <option value="">-- Select page from the list --</option>

                                    <optgroup label="About College">
                                        <option value="at_a_glance">At a Glance</option>
                                        <option value="future_plan">Future Plan</option>
                                        <option value="master_plan">Master Plan</option>
                                        <option value="college_history">College History</option>
                                        <option value="success_story">Success Story</option>
                                        <option value="college_achievement">College Achievement</option>
                                        <!--option value="campus">College Campus</option-->
                                        <option value="archive">Archive</option>
                                        <option value="academic_facilites">Academic Falities</option>
                                        <option value="college_infrastructure">College Infrastructure</option>
                                        <option value="post_information">Post Information</option>
                                        <option value="Activities">Activities</option>
                                        <option value="Our_Features">Our Features</option>
                                        <option value="Our_Aim">Our Aim</option>
                                        <option value="Public_Exam_Results">Public Exam Results</option>
                                       <!-- <option value="Current_Governing_Body">Current Governing Body</option>-->
                                        <option value="Former_Hade_Of_The_Institute">Former Hade Of The Institute</option>
                                        
                                        
                                     </optgroup>

                                    <optgroup label="Administration">
                                        <option value="publication">Publication</option>
                                        <option value="academic_rules">Academic Rules</option>
                                        <option value="admission_rules">Admission Rules</option>
                                    </optgroup>

                                    <optgroup label="Co-Curiculums">
                                        <option value="bncc">BNCC</option>
                                        <option value="sports">Sports</option>
                                        <option value="library">Library</option>
                                        <option value="rover_scout">Rover Scout</option>
                                        <option value="cultural_function">Cultural Function</option>
                                        <option value="physical_education">Physical Education</option>
                                    </optgroup>

                                    <optgroup label="Facilities">
                                        <option value="scholarship">Scholarship</option>
                                        <!--option value="residential">Residential</option-->
                                        <option value="study_tour">Study Tour</option>
                                    </optgroup>
                                </select>
                                </div>

                            </div> 

                            <div class="form-group row">
                                <label class="control-label col-md-2">Title <span class="req">*</span></label>
                                <div class="col-md-5">
                                <input type="text" name="title" id="title" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-2">Image <span class="req">&nbsp;</span></label>
                                <div class="col-md-5">
                                <input id="input-test" name="attachFile" type="file" class="form-control file" data-show-preview="false" data-show-upload="false" data-show-remove="false">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label">Description <span class="req">*</span></label>
                                <textarea name="description" id="tinyTextarea" class="form-control" cols="30" rows="15" ></textarea>
                            </div> 

                            <div class="btn-group pull-right">
                                <input type="submit" name="add_page" id="submit_btn" value="Save" class="btn btn-primary">
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
        $(document).on("change","#page",function(){
            var pageName=$(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('header/pages/ajax_pages'); ?>",
                data: {
                    page_name:pageName
                }
            }).success(function(response){
                if (response!="Error"){
                    var data=JSON.parse(response);
                    $("#title").val(data.page_title);
                    $("#page_image").attr("src","<?php echo base_url();?>"+data.page_path);
                    $("#hidden_image_url").val(data.page_path);
                    $("#hidden_id").val(data.id);
                    tinyMCE.activeEditor.setContent(data.page_description);

                    $("#submit_btn").attr("name","update_page");
                    $("#submit_btn").attr("value","Update");
                    $("#submit_btn").removeClass('btn-primary');
                    $("#submit_btn").addClass('btn-success');


                }
                else{

                        $("#title").val("");
                        $("#page_image").attr("src","");
                        $("#hidden_image_url").val("");
                        $("#hidden_id").val("data.id");
                        tinyMCE.activeEditor.setContent("");

                        $("#submit_btn").attr("name","add_page");
                        $("#submit_btn").attr("value","Save");
                        $("#submit_btn").removeClass('btn-success');
                        $("#submit_btn").addClass('btn-primary');

                }
            });
        });
    });
</script>