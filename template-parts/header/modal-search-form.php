<!--Full-Screen-Modal (Search-Modal) ======================-->
<?php 
	$placeholder_text = get_theme_mod('header_search_placeholder', 'Type & Hit Enter');
	$search_label = get_theme_mod('header_search_label', 'Search');
?>
<div class="modal fade" id="FullScreenModal" aria-hidden="true"  tabindex="-1">
	<div class="modal-dialog modal-fullscreen">
		<div class="modal-content">
		<div class="modal-header">					  
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
			<svg width="55" height="55" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M2 2L53 53" stroke="#D2E0D9" stroke-width="3"/>
				<line x1="1.93543" y1="53.4393" x2="52.9354" y2="2.43934" stroke="#D2E0D9" stroke-width="3"/>
			</svg> 
			</button>
		</div>
		<div class="modal-body">
			<div class="container">
				<h2 class="display-2 fw-extra-bold mb-30"><?php echo esc_html($search_label); ?></h2>							
				<form class="modal-search-form search-form searchform" method="get" id="searchform"  action="<?php echo esc_url(home_url('/')); ?>">
					<div class="position-relative">
						<input type="text" class="form-control" name="s" id="s" placeholder="<?php echo esc_attr($placeholder_text) ?>" value="<?php echo get_search_query(); ?>">
						<button class="search-icon" type="submit">
							<?php
							echo architronix_get_icon_svg('ui', 'search', 45);
							?>
						</button>
					</div>										  
				</form>							
			</div>
		</div>					
		</div>
	</div>
</div>
<!--Full-Screen-Modal (Search-Modal) ======================-->