<!-- slideshow -->
<div class="container">
	<div class="row">

		<div id="wowslider-container1">
			<div class="ws_images">
				<ul>
					<?php foreach ($slider_data as $key => $slider) { ?>
					<li><img src="<?php echo site_url($slider->slider_path);?>" alt="Slider Image" title="" id="wows1_2"/></li>
					<?php } ?>
				</ul>
			</div>
			<div class="ws_shadow"></div>
		</div>

	</div>
</div>