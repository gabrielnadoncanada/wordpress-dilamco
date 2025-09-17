<header <?php architronix_header_class(); ?>>
	
 	<?php  
	$enable_topbar = get_theme_mod('enable_topbar', false);
	if ($enable_topbar) :  
		get_template_part('template-parts/header/topbar');  
	  endif ?>
	<!-- Topbar End -->
fsddff
	
	<nav <?php architronix_navbar_class();  ?> aria-label="Offcanvas navbar large">	
		<div class="container-fluid max-width">		
		<a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand">
				<picture class="logo logo-dark">
					<?php if (architronix_get_logo_uri('custom_logo')) : ?>
						<?php echo architronix_get_custom_logo(); ?>
					<?php else : ?>
						<?php echo architronix_get_custom_logo(); ?>
					<?php endif; ?>
				</picture>
			</a> 
			<a href="javascript:void(0)" class="text-decoration-none d-block d-xl-none" data-bs-toggle="offcanvas" data-bs-target="#architronixNavbar" aria-controls="architronixNavbar" aria-label="Toggle navigation">
				<svg width="40" height="23" viewBox="0 0 40 23" fill="none" xmlns="http://www.w3.org/2000/svg">
					<line x1="1.5" y1="1.5" x2="38.5" y2="1.5" stroke="#253B2F" stroke-width="3" stroke-linecap="round"/>
					<line x1="1.5" y1="11.5" x2="38.5" y2="11.5" stroke="#253B2F" stroke-width="3" stroke-linecap="round"/>
					<line x1="21.5" y1="21.5" x2="38.5" y2="21.5" stroke="#253B2F" stroke-width="3" stroke-linecap="round"/>
				</svg> 
			</a>
				
				
			<?php 
			$display_search_icon = get_theme_mod('enable_header_search', false); 
			$search_icon = architronix_search_icon('', false);

			wp_nav_menu([
				'container' => 'div',
				'container_class' => 'collapse navbar-collapse',
				'menu_class' => 'navbar-nav justify-content-end flex-grow-1 align-items-xl-center list-unstyled',
				'theme_location' => 'primary',
				'depth' => 2,
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s'. $search_icon . '</ul>',
				'fallback_cb'    => 'Architronix\Nav_Walker::fallback',
				'fallback_title'    => esc_attr__('Primary menu', 'architronix'),
				'walker' => new Architronix\Nav_Walker()
			]);

			?>   	  
				
			
		</div>	
		
		<!-- container-fluid -->
	</nav>		

</header> 

<?php 
 get_template_part('template-parts/header/modal-search-form');
 get_template_part('template-parts/header/offcanvas-menu');
?>