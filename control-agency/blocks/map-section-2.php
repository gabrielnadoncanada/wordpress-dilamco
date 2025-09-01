<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>
<section class="section-contact-map position-relative<?php echo esc_attr($additional_class); ?>">
	<div class="container">
		<div class="row justify-content-between gy-5">
			<div class="col-lg-3">
				<div class="contact-wrapper mt-md-n70">
					<!-- <div class="contact-wrapper d-flex flex-column gap-40 gap-lg-60 mt-md-n70"> -->
					<div class="row g-40 g-lg-60">
						<?php 
						foreach ($locations as $location) :
						control_agency_render_template('global/location-2.php', $location);
						endforeach;
						?>
					</div>
				</div>
			</div>
			<!-- col-3 -->
			<div class="col-lg-8">
				<div class="sticky-elements">
					<div id="map"></div>
				</div>
				<?php
				architronix_leaflet_map_script($locations);
				?>
			</div>
		</div>
	</div>
</section>