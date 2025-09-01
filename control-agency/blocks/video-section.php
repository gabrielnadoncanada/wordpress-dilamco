<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>
<section class="section-video section-full-width pb-0 pb-lg-130<?php echo esc_attr($additional_class); ?>">
	<div class="video-contents text-secondary">
		<div class="video-contents-inner">
			<div class="container">
				<div class="row gy-5 gy-lg-0">								
					<div class="col-lg-6 col-xxl-5">
						
						<?php if( !empty( $video_title )): architronix_content($video_title,'<h4 class="mb-4">','</h4>' ); endif; ?>
						<?php if( !empty( $video_desc )): architronix_content($video_desc,'<p>','</p>' ); endif; ?>
						<ul class="video-contents-list list-unstyled d-flex flex-column gap-3 mb-0">
							<?php      
								if(!empty($content_list)):
								$content_list = is_string($content_list)? explode(',', $content_list) : $content_list;
								$count = 1;
							?>
							<?php foreach ($content_list as $content_single) : ?> 
							<li class="d-flex align-items-center">
								<svg class="rtl-rotate" width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
								</svg><?php !empty($content_list) ? architronix_content($content_single) : '' ?>
							</li>	
							<?php endforeach; ?>
							<?php endif; ?>								
						</ul>

						<?php if (!empty($button_text) && !empty($button_url)) : ?>
						<div class="architronix-button">
							<a href="<?php echo esc_url($button_url); ?>" class="btn btn-outline-secondary  d-inline-flex gap-10 align-items-center"><?php echo wp_kses_post($button_text); ?><span>
								<svg class="rtl-rotate" width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
								</svg></span>
							</a>
						</div>
						<?php endif; ?>
						
					</div>
					<?php if (!empty($video_url)): ?>
						<div class="col-lg-6 col-xxl-6">
							<div class="video-image-wrapper position-relative overflow-hidden">
								<div class="wow slideInLeft">
									<?php
									// Get the video background image URL using a custom function
									$video_image_url = control_agency_get_attachment_url(
										$video_image, // Single attachment ID or URL
										'architronix-636x391-cropped', // Image size
										get_theme_file_uri('assets/images/video-image.jpg') // Fallback image
									);
									?>

									<div class="video-image">
										<img src="<?php echo esc_url($video_image_url); ?>" class="img-fluid" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
									</div>

									<a href="<?php echo esc_url($video_url); ?>" class="video-popup video-popup-link">
										<span class="video-icon">
											<svg width="30" height="36" viewBox="0 0 30 36" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M0.500004 1.54552L29 18L0.500002 34.4545L0.500004 1.54552Z" stroke="#253B2F"/>
											</svg>
										</span>
									</a>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>