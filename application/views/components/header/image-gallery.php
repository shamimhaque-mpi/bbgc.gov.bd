<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Image Gallery</h1>
                </div>
            </div>

            <div class="panel-body">
               <div class="row">
                   <div class="col-sm-12">
                        <div id="sortable" class="gallery image-gallery">
                            <?php foreach ($gallery_data as $key => $gallery) { ?>
                                <figure id="id<?php echo $key+1; ?>" data-mainid="<?php echo $gallery->id; ?>" data-position="<?php echo $gallery->position; ?>" >
                                    <img src="<?php echo site_url($gallery->gallery_path)?>" alt="">
                                    <figcaption>
                                        <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this Data ?')" href="?delete_token=<?php echo $gallery->id; ?>&img_url=<?php echo $gallery->gallery_path; ?>">Delete</a>
                                    </figcaption>
                                </figure>
                            <?php } ?>
                        </div>
                   </div>
               </div>
                
                
                <hr>

                <!-- horizontal form -->
                    
                <div class="col-xs-12 no-padding">
                    <?php
                    $attr=array(
                        "class"=>"form-horizontal"
                        );
                    echo form_open_multipart('', $attr);?>
                    <div id="dyn_form">
                      <div class="form-group">
                          <label class="col-md-2 control-label">Image Title <span class="req">*</span></label>
                          <div class="col-md-5">
                              <input type="text" name="galleryTitle[]" class="form-control file" required placeholder="Maximum 100 characters">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-2 control-label">Image<span class="req">*</span></label>
                          <div class="col-md-5">
                              <input id="" type="file" name="gallery_image[]" required class="form-control file" data-show-preview="false" required data-show-upload="false" data-show-remove="false">
                          </div>
                      </div>
                    </div>

                    <div class-"col-md-7">
                    <div class="btn-group pull-right">
                        <a id="addmore_btn" class="btn btn-success" href="" style="margin-right: 5px;">Add more</a>
                        <input type="submit" name="gallery_Save" value="Save" class="btn btn-primary">
                    </div>
                    </div>

                <?php form_close();?>
                </div>
                
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

   <script>
   $(document).ready(function(){
    $( function() {
    $("#sortable").disableSelection();
    (function($) {
        var sortObj = {};

        $('#sortable').sortable({
            cursor: "move",
            distance: 5,
            opacity: 0.8,
            stop: function(e, ui) {

              /*
                console.log($.map($(this).find('p'), function(el) {
                  var index = parseInt($(el).index()) + 1;
                  return $("#"+el.id).data('mainid') + ' : ' + index;
                }));
              */

                $.map($(this).find('figure'), function(el) {
                  var index = parseInt($(el).index()) + 1;
                  sortObj[$("#"+el.id).data('mainid')] = index;
                });

                //console.log(JSON.stringify(sortObj));
                var final_data=JSON.stringify(sortObj);
                //console.log(final_data);
                $.map($(this).find('p'),function(el){
                  var index = parseInt($(el).index()) + 1;
                  $("#" + el.id).attr("data-position", index);
                });
                /*Sending Ajax Data Start here*/
              $.ajax({
                  type: "POST",
                  url: "<?php echo site_url('header/imageGallery/ajax_img_sort'); ?>",
                  data: {finaldata:final_data}
                }).done(function(response){
                  console.log(response);
            });
                /*Sending Ajax Data End here*/
            }
        });
    })(jQuery);
  });

//===========================================================================
//==========================Add More start here==============================
//===========================================================================
  
$("#addmore_btn").on('click', function(event) {
  $("#dyn_form").after($("#dyn_form").html());
  event.preventDefault();
});
//===========================================================================
//===========================Add More end here===============================
//===========================================================================


   });


  </script>