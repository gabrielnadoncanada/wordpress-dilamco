<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>
<div class="section-full-width pt-3<?php echo esc_attr($additional_class); ?>">	
	<div class="section-title-wrapper position-relative">
		<div class="scroll-move scroll-move-right">
			<?php
				if( !empty( $section_name )):
					architronix_content(
						$section_name,
						'<span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1">',
						'</span>'
					);
				endif;
			?>
		</div>				
		<div class="container">	
			<div class="section-title section-separator">
				<?php if( !empty( $title )): architronix_content($title,'<h2 class="fw-extra-bold heading-title separator lh-1">','</h2>' ); endif; ?>
				<div class="d-flex flex-column flex-lg-row gap-4 align-items-lg-end justify-content-lg-between">
					<?php if( !empty( $short_desc )): architronix_content($short_desc,'<p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">','</p>' ); endif; ?>	
					<?php if (!empty($button_text) && !empty($button_url)) : ?>
					<div class="architronix-button">
						<a href="<?php echo esc_url($button_url); ?>" class="btn btn-outline-primary  gap-10"><?php echo wp_kses_post($button_text); ?> 							
							<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
							</svg>							
						</a>
					</div>	
					<?php endif; ?>							
				</div>
			</div>
		</div>
	</div>			
</div>