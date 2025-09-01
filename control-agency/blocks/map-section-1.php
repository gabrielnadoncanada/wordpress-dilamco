<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>
<section class="section-contact-map position-relative mt-n4 mt-md-n60<?php echo esc_attr($additional_class); ?>">
	<div class="container">
		<div class="swiper contact-swiper">
			<div class="swiper-wrapper">
				<?php
				foreach ($locations as $location) :
					control_agency_render_template('global/location-1.php', $location);
				endforeach; ?>
				<!-- swiper-slide -->
			</div>
			<!-- swiper-wrapper -->
		</div>
		<!-- swiper -->
		<div class="pt-5 pt-lg-90">
			<div id="map"></div>
		</div>
		<?php
		architronix_leaflet_map_script($locations);
		?>
	</div>
	<!-- container -->
</section>