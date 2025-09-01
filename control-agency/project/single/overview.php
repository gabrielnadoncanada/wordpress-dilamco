<div class="section-hero hero-2 position-relative overflow-x-hidden max-width">
	<?php	
    $image_url = get_theme_file_uri('assets/images/project-hero-image.jpg');			
	if(has_post_thumbnail()){
		$image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
	}
	if(!empty($image)){
		$image_url = control_agency_get_attachment_url($image, 'full', $image_url);
	}	
	?>				
	<img src="<?php echo esc_url($image_url); ?>" class="object-fit-cover img-fluid-sm" width="1920" height="867" alt="<?php echo esc_attr(get_the_title()) ?>">
</div>

<section class="section-full-width position-relative">
    <div class="container">	
		<div class="section-padding-xxl">
			<div class="position-relative z-5">
				<div class="row g-40">
					<div class="col-lg-7 col-xxl-8">
						<div class="section-title section-separator mt-lg-120 mt-60">
							<?php 
							$post_title = control_agency_get_title();
							$title = !empty($title)? $title : $post_title;
							$title = str_replace(['[post_title]', '[project_title]'], $post_title, $title);
							control_agency_content($title, '<h2 class="fw-extra-bold heading-title separator lh-1">', '</h2>');
							$excerpt = get_the_excerpt();
							$desc = !empty($subtitle)? $subtitle : '';
							$desc = str_replace(['[post_excerpt]', '[project_excerpt]'], $excerpt, $desc);
							control_agency_content($desc, '<p class="fs-4 mb-0 subtitle">', '</p>');
							?>							
						</div>
					</div>
					<div class="col-lg-5 col-xxl-4">
						<div class="project-details-wrapper bg-primary text-secondary mt-lg-n200 mt-40">							
							
								<?php
								if(!empty($overviews)):
									ob_start();
									control_agency_render_template('global/simple-group.php', [                        
										'title' => $overview_title,
										'desc' => '',
										'group' => $overviews,
										'format_title' => '<h4 class="mb-40 fw-semibold">%s</h4>',
										'format_group_title' => '<span class="fs-5 fw-bold">%s</span>',
										'format_group_desc' => '<span>%s</span>',
										'format_group_item' => '<li class="d-flex flex-column gap-2 gap-xxl-10 mb-2">%s</li>',
										'format_group' => '<ul class="project-details-list list-unstyled mb-0 gap-30 d-flex flex-row flex-lg-column flex-wrap flex-lg-nowrap gap-3">%s</ul>',
										'format_wrapper' => '%s',
									]);
									$overview_content = ob_get_clean();
									$poject_types = control_agency_get_terms([
										'taxonomy' => 'project_cat', 
										'wrapper_class' => '',
										'link_class' => 'text-secondary text-decoration-none link-hover-animation-1'
										], false);

									$overview_content = str_replace('[project_types]', $poject_types, $overview_content);	
									$members = get_post_meta(get_the_ID(), 'members');
									$collaborators = control_agency_get_posts([
											'post_type' => 'controlmember', 
											'post__in' => $members,
											'link_format' => '<a class="text-secondary text-decoration-none link-hover-animation-1" href="%s">%s</a>',
											]);
									$overview_content = str_replace(['[collaborators]', '{collaborators}'], $collaborators, $overview_content);
									
									echo do_shortcode($overview_content);
								endif;		
								?> 
								<div class="architronix-button mt-30">
									<?php 
									foreach ($website as $key => $value) {
										$value['fallback_icon'] = '<span class="arrow-down"><svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path></svg></span>';
										$website[$key] = $value;
									}
									control_agency_render_block('button', $website, true); 
									?>
								</div>
							
						</div>																		
					</div>
				</div>
			</div>						
		</div>											
	</div>		
	<!-- container -->
</section>

