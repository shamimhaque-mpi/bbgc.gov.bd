<style>
	.video{
		width:  50%;
		float:  left;
		padding:  5px;
		border:  1px solid #ccc;
	}
	.video iframe{
		width:  100%;
	}

@media screen and (max-width: 500px) {

	.video{
		width:  100%;
	}
}

</style>


<!-- gallery -->
<div class="col-md-9">
    <div class="row">

    <h3 style="font-size: 18px; font-weight: bold; color: rgba(5, 29, 29, 1); border-bottom: 1px solid rgba(0, 0, 0, 0.1); padding-bottom: 5px; margin-top: 5px;">ভিডিও গ্যালারী</h3>

        <!-- Small modal -->
        <?php foreach ($v_gallery_data as $key => $video) { ?>
            <div class="video"><?php echo $video->embed_code;?></div>
        <?php }?>

    </div>
</div>
