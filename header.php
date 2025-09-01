<?php
/**
 * The header, start #scroll-container & .main class, will end in footer
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php get_template_part('template-parts/header/header-mobile'); ?>

	<!-- START #scroll-container -->
	<div class="scroll-container position-relative  d-flex flex-column min-height-100" id="scroll-container">
		<?php get_template_part( 'template-parts/header/header', architronix_header_style() ); ?>

		<main class="main">
	