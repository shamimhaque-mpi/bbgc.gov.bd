
<!-- dynamic gallery start here -->
<div class="column global-pad">
    <div class="row">
        <?php
        $attribute = array(
            'name' => '',
            'class' => 'horizontal',
            'id' => ''
        );

        echo form_open_multipart('components/slider/validation', $attribute);
        ?>

        <blockquote class="form-head">
            <h1>Dynamic Gallery</h1>
            <small>
                1. fill all the required <mark>*</mark> fields<br/> 
                2. click the <mark>save</mark> button to insert data
            </small>
        </blockquote>

        <div class="form-content">
            <div id="mess">
                
            </div>
            
            <div class="gallery dynamic-gallery">

                <figure>
                    <img src="http://localhost/erp/public/slider/slider-1435141173.jpg" title="Some text..." alt="image 1" />

                    <figcaption>
                        <a id="" data-path="">
                            Delete
                        </a>
                    </figcaption>
                </figure>
                
                <figure>
                    <img src="http://localhost/erp/public/slider/slider-1435211464.jpg" title="Some text..." alt="image 1" />

                    <figcaption>
                        <a id="" data-path="">
                            Delete
                        </a>
                    </figcaption>
                </figure>
                
                <figure>
                    <img src="http://localhost/erp/public/slider/slider-1435212131.jpg" title="Some text..." alt="image 1" />

                    <figcaption>
                        <a id="" data-path="">
                            Delete
                        </a>
                    </figcaption>
                </figure>
                
                <figure>
                    <img src="http://localhost/erp/public/slider/slider-1435141173.jpg" title="Some text..." alt="image 1" />

                    <figcaption>
                        <a id="" data-path="">
                            Delete
                        </a>
                    </figcaption>
                </figure>
                
                <figure>
                    <img src="http://localhost/erp/public/slider/slider-1435212121.jpg" title="Some text..." alt="image 1" />

                    <figcaption>
                        <a id="" data-path="">
                            Delete
                        </a>
                    </figcaption>
                </figure>
                
                <figure>
                    <img src="http://localhost/erp/public/slider/slider-1435141173.jpg" title="Some text..." alt="image 1" />

                    <figcaption>
                        <a id="" data-path="">
                            Delete
                        </a>
                    </figcaption>
                </figure>
                
                <figure>
                    <img src="http://localhost/erp/public/slider/slider-1435211464.jpg" title="Some text..." alt="image 1" />

                    <figcaption>
                        <a id="" data-path="">
                            Delete
                        </a>
                    </figcaption>
                </figure>
                
                <figure>
                    <img src="http://localhost/erp/public/slider/slider-1435212131.jpg" title="Some text..." alt="image 1" />

                    <figcaption>
                        <a id="" data-path="">
                            Delete
                        </a>
                    </figcaption>
                </figure>
                
                <figure>
                    <img src="http://localhost/erp/public/slider/slider-1435141173.jpg" title="Some text..." alt="image 1" />

                    <figcaption>
                        <a id="" data-path="">
                            Delete
                        </a>
                    </figcaption>
                </figure>
                
                <figure>
                    <img src="http://localhost/erp/public/slider/slider-1435212121.jpg" title="Some text..." alt="image 1" />

                    <figcaption>
                        <a id="" data-path="">
                            Delete
                        </a>
                    </figcaption>
                </figure>
                
            </div>

            <div class="form-element">
                <label for="title">Slide title <sup class="required"></sup></label>
                <input type="text" name="title" id="title" placeholder="maximum 100 characters" required />
            </div>

            <div class="form-element">
                <label for="image">Image <sup class="required"></sup></label>
                <span class="upload">
                    <input type="file" name="image" id="image" data-upload="upload" required />
                    <input type="text" placeholder="Select image ..." id="upload" readonly />
                </span>
            </div>
        </div>

        <blockquote class="form-foot">
            <input type="submit" class="button" value="Save" />
        </blockquote>

        <?php echo form_close(); ?>
    </div>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('a#delete').on('click', function(event){
                event.preventDefault();
                
                var cond = {'id': $(this).data('id')},
                    file = $(this).data('path');
                
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url(); ?>ajax/deleteFile/slider',
                    data: 'condition='+JSON.stringify(cond)+'&file='+file
                }).done(function(response){
                    $('#mess').html(response);
                    // console.log(response);
                    
                    // after 2sec it will be reload itself
                    setTimeout(function(){
                        window.location.reload(true);
                    }, 2000);
                });
                // console.log(cond);
            });
        });
    </script>
</div>
<!-- bdynamic gallery end here -->



