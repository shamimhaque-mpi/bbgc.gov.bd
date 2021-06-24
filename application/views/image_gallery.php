<style>
/*--------------------Tooltip Start Here--------------------*/
#tt {
position:absolute; 
z-index: 9999999;
display:block; 
padding: 10px;
font-size: 13px;
border-radius: 5px 5px 5px 0;
color: #fff;
font-weight: bold;
background: rgba(0,100,0,.8);
}
#tt:after {
position:absolute; 
content:'';
border-left:10px solid transparent;
border-right:10px solid rgba(0,100,0,.8);
border-top:10px solid transparent;
border-bottom:10px solid rgba(0,100,0,.8);
left: -19px;
bottom: 5px;

}
.view-gallery{
    width:  100%;
    height:  200px;
}
.view-gallery img{
    width:  100%;
    height:  100%;
    border:  1px solid #eee;
    padding:  6px;
    background: #fff;
}
@media screen and (max-width: 550px) {
    .view-gallery{
        height:  180px;
    }
}

/*--------------------Tooltip End Here--------------------*/
</style>
<!-- gallery -->
<div class="col-md-9">
    <div class="row">

    <h3 style="font-size: 18px; font-weight: bold; color: rgba(5, 29, 29, 1); border-bottom: 1px solid rgba(0, 0, 0, 0.1); padding-bottom: 5px; margin-top: 5px;">ফটো গ্যালারী</h3>

        <!-- Small modal -->
        <?php foreach ($gallery_data as $key => $gallery) {?>
        <a style="margin: 0;" class="mg-btm col-sm-4 col-xs-6" href="<?php echo site_url($gallery->gallery_path); ?>" data-lightbox="example-set" data-title="<?php echo $gallery->gallery_title; ?>" onmouseover="tooltip.show('<?php echo $gallery->gallery_title; ?>')" onmouseout="tooltip.hide()" >
            <div class="row">
                <img style="padding: 8px; background: #fff; border: 1px solid #eee; width: 100%; height: 180px;" class="example-image img-responsive" src="<?php echo site_url($gallery->gallery_path); ?>" alt="" />
            </div>
        </a>
        <?php } ?>

    </div>
</div>
<script src="<?php echo base_url('public/js/tooltip.js');?>"></script>
