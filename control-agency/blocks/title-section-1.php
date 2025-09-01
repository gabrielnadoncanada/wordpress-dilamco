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
				<?php
				$title = str_replace(['[post_title]', '[service_title]'], get_the_title(), $title);
				if( !empty( $title )): architronix_content($title,'<h2 class="fw-extra-bold heading-title separator lh-1">','</h2>' ); endif; ?>
				<div class="d-flex flex-column flex-lg-row gap-4 align-items-lg-end justify-content-lg-between">
					<?php if( !empty( $short_desc )): architronix_content($short_desc,'<p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">','</p>' ); endif; ?>	
									
				</div>
			</div>
		</div>
	</div>			
</div>