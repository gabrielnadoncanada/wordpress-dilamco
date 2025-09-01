<?php 
get_header();

 	if(!is_singular()){
		get_template_part('template-parts/header/banner', get_post_type());
	}	
    get_template_part('template-parts/content/before', get_post_type());
	do_action('architronix_content_before');

	ob_start();
	woocommerce_content();
	$woocommerce_content = ob_get_clean();
	echo architronix_woocommerce_content($woocommerce_content);

	do_action('architronix_content_after');
	get_template_part('template-parts/content/after', get_post_type());

get_footer();