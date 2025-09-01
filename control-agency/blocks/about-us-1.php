<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>
<section class="section-about about-1 section-full-width<?php echo esc_attr($additional_class); ?>">	
	<div class="about-bg bg-primary text-secondary position-relative">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<?php $image_url = control_agency_get_attachment_url($image, 'full', get_theme_file_uri('assets/images/about-image.jpg')); ?>
					<div class="about-image overflow-hidden">
						<img src="<?php echo esc_url($image_url) ?>" class="obeject-fit-cover wow slideInLeft responsive-image" width="584" height="823" alt="<?php bloginfo('name') ?>">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about-contents d-flex flex-column">
						
						<?php
						if (!empty($services)):
						foreach ($services as $service) :
						?>
							<div class="about-content-inner d-flex flex-column flex-lg-row">
							<div class="list-item-number">
								<?php echo !empty($service['service_count']) ? '<h3 class="stroke-heading stroke-heading-2 mb-0"><svg stroke-width="1" class="text-line-2 fs-60 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">' . $service['service_count'] . '</text></svg></h3>' : ''; ?>
							</div>									
							
							<div>
								<?php echo !empty($service['service_title']) ? '<h4>' . $service['service_title'] . '</h4>' : ''; ?>
								<?php echo !empty($service['service_desc']) ? '<p class="mb-0">' . $service['service_desc'] . '</p>' : ''; ?>
							</div>
						</div>
						<?php 
						endforeach;
						endif; 
						?>
						<?php if (!empty($button_text) && !empty($button_url)) : ?>
						<div>
							<a href="<?php echo esc_url($button_url); ?>" class="btn btn-link link-hover-animation-1 d-inline-flex gap-10 align-items-center"><?php echo wp_kses_post($button_text); ?><span>
								<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
								</svg></span>
							</a>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>						
	</div>
</section>