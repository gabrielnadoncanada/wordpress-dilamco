<?php
/**
 * The template for displaying the footer, end .main & #scroll-container
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Architronix
 * @since Architronix 1.0
 */

?>	
		
	</main>
	<?php 
	if(in_array(get_post_type(), ['post'])){
		get_template_part( 'template-parts/footer/footer-cta' ); 
	}	
	?> 	
	<footer <?php architronix_footer_class(); ?> > 
		<?php get_template_part( 'template-parts/footer/site-footer' ); ?> 	
	</footer>

</div> 
<!-- END #scroll-container -->
<?php
	$backtoTop = get_theme_mod('display_back_to_top', false);

	if($backtoTop):

?>
	<div class="progressCounter progressScroll progress-scroll-opacity-0 progress-scroll-opacity-1" style="width: 50px; height: 50px; position: fixed; bottom: 20px; right: 20px;">
		<div class="progressScroll-border" style="position: relative; text-align: center; width: 100%; height: 100%; border-radius: 50%; background-color: var(--bs-primary); background-image: linear-gradient(262.8deg, transparent 50%, var(--bs-primary) 50%),linear-gradient(90deg, var(--bs-secondary) 50%, transparent 50%);">
			<div class="progressScroll-circle" style="position: relative; display: flex; align-items: center; justify-content: center; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; width: 45px; height: 45px; border-radius: 50%; background-color: rgba(var(--bs-primary-rgb), .8);">
			<span class="progressScroll-text text-secondary" style="line-height: 1; font-size: 20px;">
				<svg width="24" height="24" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12.1758 41.7882C11.4955 41.1079 11.4388 40.0401 12.0057 39.2953L12.1758 39.1007L39.0508 12.2256C39.7929 11.4835 40.9962 11.4835 41.7383 12.2256C42.4186 12.9059 42.4753 13.9737 41.9084 14.7185L41.7383 14.9131L14.8633 41.7882C14.1211 42.5303 12.9179 42.5303 12.1758 41.7882Z"></path>
					<path d="M18.7659 15.5153C17.7163 15.5175 16.8637 14.6685 16.8614 13.619C16.8594 12.6649 17.5608 11.8735 18.4769 11.7358L18.7577 11.7146L40.3903 11.668C41.3473 11.6659 42.14 12.3714 42.2746 13.2906L42.2947 13.5723L42.25 35.2067C42.2478 36.2562 41.3952 37.1052 40.3457 37.1031C39.3916 37.1011 38.6031 36.3963 38.4693 35.4797L38.4493 35.1988L38.489 15.4727L18.7659 15.5153Z"></path>	
				</svg>
			</span>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php  wp_footer(); ?>
</body>
</html>
