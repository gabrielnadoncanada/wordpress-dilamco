<?php
/* 
* Template Name: Architronix Blank Template
*/
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class('dark-mode'); ?>>
	<?php wp_body_open(); ?>

	<?php
	if ( have_posts() ):
		// Load posts loop.
		while ( have_posts() ) {
			the_post();
			
			the_content();
			
		}
	endif;
	?>

	<?php wp_footer(); ?>
</body>
</html>