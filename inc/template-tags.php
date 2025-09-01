<?php
/**
 * Custom template tags for this theme
 *
 * @package 	WordPress
 * @subpackage 	Architronix
 */

if ( ! function_exists( 'architronix_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 *
	 * @return void
	 */
	function architronix_posted_on($human_time_diff = false, $before = '', $after = '', $echo = true) {
		
		if($human_time_diff){
			$time_string = sprintf( esc_html__( '%s ago', 'architronix' ), human_time_diff(get_the_time ( 'U' ), current_time( 'timestamp' ) ) );
		}else{
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
			$time_string = sprintf(
				$time_string,
				esc_attr( get_the_date( DATE_W3C ) ),
				esc_html( get_the_date() )
			);
		}
		
		$content = sprintf(
			/* translators: %s: Publish date. */
			esc_html__( '%s', 'architronix' ),
			$time_string // phpcs:ignore WordPress.Security.EscapeOutput
		);

		if($echo){
			architronix_content($content, $before, $after, $echo);
		}else{
			return architronix_content($content, $before, $after, $echo);
		}
		
	}
}

if ( ! function_exists( 'architronix_posted_by' ) ) {
	/**
	 * Prints HTML with meta information about theme author.
	 *
	 * @return void
	 */
	function architronix_posted_by($class='') {
		$displayed = (is_single() && get_the_author_meta( 'description' ))? false : true;
		if ( $displayed && post_type_supports( get_post_type(), 'author' ) ) {
			echo '<span class="byline '.esc_attr($class).'">';
			printf(
				/* translators: %s: Author name. */
				esc_html__( 'By %s', 'architronix' ),
				'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author">' . esc_html( get_the_author() ) . '</a>'
			);
			echo '</span>';
		}
	}
}

if ( ! function_exists( 'architronix_entry_meta_header' ) ) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 * Footer entry meta is displayed differently in archives and single posts.
	 *
	 * @return void
	 */
	function architronix_entry_meta_header($args, $before = '', $after = '', $echo = true) {
		
		if(is_string($args)){
			$args = [
				'separator' => $args
			];
		}
		
		extract(wp_parse_args($args, [
			'separator' => ' ',
			'human_time_diff' => false,
			'link_class' => 'text-decoration-none link-hover-animation-1',
			'link_separator' => ', ',
			'disable_meta' => [],
			'max_link' => false,
			'slice_count' => 2
		]));

		if(is_string($disable_meta)){
			$disable_meta = [$disable_meta];
		}
		

		// Early exit if not a post.
		if ( !in_array(get_post_type(), ['post', 'attachment']) ) {
			return;
		}	

		global $wp_query;
		
		$meta = [];
		
		
		if ( is_sticky() && !has_post_thumbnail() ) {
			$sticky_text = get_theme_mod('sticky_text', esc_attr__('Featured post', 'architronix'));
			$before .= '<span class="small py-1 px-2 text-bg-primary me-2">' . esc_html( $sticky_text) . '</span><br />';
		}
		
		$meta['date'] = architronix_posted_on($human_time_diff, '', '', false);

		if ( has_category() ) {
			$args = [
				'separator' => $link_separator, 
				'link_class' => esc_attr($link_class),
				'slice' => $max_link,
				'slice_count' => $slice_count
			];
			$meta['category'] = architronix_get_terms($args);			
		}

		if( is_singular() && !in_array('reading_time', $disable_meta) ){			
			$meta['reading_time'] = sprintf(esc_attr_x('%s min read', 'Reading title', 'architronix'), architronix_get_reading_time());
		}

		$content = implode($separator, $meta);
		
		if($echo){
			architronix_content($content, $before, $after, $echo);
		}else{
			return architronix_content($content, $before, $after, $echo);
		}
		
	}
}

if ( ! function_exists( 'architronix_entry_meta_footer' ) ) {
/**
 * Prints HTML with meta information for the categories, tags and comments.
 * Footer entry meta is displayed differently in archives and single posts.
 *
 * @return void
 */
	function architronix_entry_meta_footer() {

		// Early exit if not a post.
		if ( 'post' !== get_post_type() ) {
			return;
		}


		// Hide meta information on pages.
		if ( ! is_single() ) {

			echo '<div class="post-footer-meta text-muted d-flex gap-15">';

			
			// Posted on.
			architronix_posted_by();

			// Edit post link.
			edit_post_link(
				sprintf(
					/* translators: %s: Post title. Only visible to screen readers. */
					esc_html__( 'Edit %s', 'architronix' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				),
				'<span class="edit-link">',
				'</span><br>'
			);

			echo '</div>';
			
		} else {

			echo '<div class="posted-by d-flex gap-10">';
			// Posted on.
			architronix_posted_on();
			// Posted by.
			architronix_posted_by();
			// Edit post link.
			edit_post_link(
				sprintf(
					/* translators: %s: Post title. Only visible to screen readers. */
					esc_html__( 'Edit %s', 'architronix' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				),
				'<span class="edit-link">',
				'</span>'
			);
			echo '</div>';

			if ( has_category() || has_tag() ) {

				echo '<div class="post-taxonomies d-grid gap-20">';

				$categories_list = get_the_category_list( wp_get_list_item_separator() );
				if ( $categories_list ) {
					printf(
						/* translators: %s: List of categories. */
						'<span class="cat-links">' . esc_html__( 'Categorized as %s', 'architronix' ) . ' </span>',
						$categories_list // phpcs:ignore WordPress.Security.EscapeOutput
					);
				}

				$tags_list = get_the_tag_list();
				if ( $tags_list ) {
					printf(
						/* translators: %s: List of tags. */
						'<span class="tags-links tagcloud py-20 border-top border-bottom">%s</span>',
						$tags_list // phpcs:ignore WordPress.Security.EscapeOutput
					);
				}
				echo '</div>';
			}
		}
	}
}

if(!function_exists('architronix_get_categories')):
	/**
	 * Get account endpoint URL.
	 *
	 * @param 	string 	$separator 	(optional)
	 * @return 	string	$taxonomy	category
	 * @param 	boolean	$echo		true
	 * 
	 * @return	string	
	 * 
	 */
	function architronix_get_categories($separator = ' ', $taxonomy = 'category', $echo = true){

		// Get the term IDs assigned to post.
		$post_terms = wp_get_object_terms( get_the_ID(), $taxonomy, array( 'fields' => 'ids' ) );

		if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {

			$term_ids = implode( ', ' , $post_terms );

			$terms = wp_list_categories( array(
				'title_li' => '',
				'style'    => 'none',
				'echo'     => false,
				'taxonomy' => $taxonomy,
				'include'  => $term_ids
			) );
			
			if(empty($terms)) return;
			
			$terms = rtrim( trim( str_replace( '<br/>',  '', $terms ) ), '' );
			$terms = str_replace( '">',  '">'.$separator, $terms );
			$terms = str_replace( '<a href="',  '<a class="font-xl-bold color-600 link-tag text-opacity" href="', $terms );
			
			

			// Display post categories.
			if($echo){
				echo wp_strip_all_tags($terms);
			}else{
				return $terms;
			}
			
		}
	}
endif;

if ( ! function_exists( 'architronix_post_thumbnail' ) ) {
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 * @return void
	 */
	function architronix_post_thumbnail($size = 'post-thumbnail', $before = '', $after = '', $echo = true) {
		global $post;
		if ( ! architronix_can_show_post_thumbnail($post->ID) ) {
			return;
		}		
		
		$attachement_id = get_post_thumbnail_id($post->ID);
		$attachement = wp_get_attachment_image_src($attachement_id, $size);
		$caption = wp_get_attachment_caption( $attachement_id );
		$alt = get_the_title($attachement_id);
		$sticky_text = is_sticky()? get_theme_mod('sticky_text', esc_attr__('Featured post', 'architronix')) : '';

		ob_start();
		?>

		<?php if ( is_singular() ) : ?>

			<figure class="post-thumbnail">
				<?php 
				printf('<img src="%1$s" alt="%2$s" width="%3$s" height="%4$s" class="%5$s"/>', esc_url($attachement[0]), esc_attr($alt), intval($attachement[1]), intval($attachement[2]), 'object-fit-cover w-100'); 

				if ( $caption ){
					printf('<figcaption class="wp-caption-text fst-italic mt-1">%s</figcaption>', wp_kses_post( $caption ));
				}
				?>				
			</figure><!-- .post-thumbnail -->

		<?php else : ?>

			<figure class="post-thumbnail">
				<a class="d-block position-relative" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php 
					printf('<img src="%1$s" alt="%2$s" width="%3$s" height="%4$s" class="%5$s"/>', esc_url($attachement[0]), esc_attr($alt), intval($attachement[1]), intval($attachement[2]), 'object-fit-cover w-100'); 

					architronix_content( $sticky_text, '<span class="position-absolute start-0 bottom-0 mb-3 ms-3 small py-1 px-2 text-bg-primary">', '</span>');
					?>
				</a>	
				<?php
				if ( $caption ){
					printf('<figcaption class="wp-caption-text small fst-italic mt-1">%s</figcaption>', wp_kses_post( $caption ));
				}
				?>
			</figure>

		<?php endif; ?>

		<?php
		$content = ob_get_clean();
		if($echo){
			architronix_content($content, $before, $after, $echo);
		}else{
			return architronix_content($content, $before, $after, $echo);
		}
		
	}
}

if ( ! function_exists( 'architronix_the_posts_navigation' ) ) {
	/**
	 * Print the next and previous posts navigation.
	 *
	 * @return void
	 */
	function architronix_the_posts_navigation($before = "", $after = "", $echo = true) {
		ob_start();
		the_posts_pagination(
			array(
				'before_page_number' => '',
				'mid_size'           => 2,
				'type' => 'list',
				'prev_text'          => sprintf('%s',	architronix_get_icon_svg( 'ui', 'prev', 35 )),
				'next_text'          => sprintf( '%s %s', esc_attr__('Next', 'architronix'), architronix_get_icon_svg( 'ui', 'next', 35 )),
			)
		);
		$content = ob_get_clean();

		if($echo){
			architronix_content($content, $before, $after, $echo);
		}else{
			return architronix_content($content, $before, $after, $echo);
		}
		
	}
}

function architronix_the_post_navigation($before = "", $after = "", $echo = true){
	ob_start();

	get_template_part('template-parts/post/post-navigations');

	$content = ob_get_clean();

	if($echo){
		architronix_content($content, $before, $after, $echo);
	}else{
		return architronix_content($content, $before, $after, $echo);
	}
}

function architronix_get_reading_time($before='', $after = '', $echo = false) {
    global $post;

    // Calculate average words per minute
    $words_per_minute = 200;

    // Calculate words count in post content
    $words_count = str_word_count(strip_tags($post->post_content));

    // Calculate estimated reading time in minutes
    $reading_time = ceil($words_count / $words_per_minute);

    if($echo){
		architronix_content($reading_time, $before, $after, $echo);
	}else{
		return $before.$reading_time.$after;
	}
}

add_filter( 'paginate_links_output', function($template){
    $template = str_replace("<ul class='page-numbers", "<ul class='pagination align-items-end position-relative", $template);
    $template = str_replace('<li>', '<li class="page-item">', $template);
   	$template = str_replace('class="page-numbers dots"', 'class="page-numbers d-infline-flex align-self-end align-items-end pb-2 mx-2 mx-lg-20"', $template);   
    $template = str_replace('<a class="page-numbers', '<a class="page-link fw-semibold next-btn next-btn-sm', $template);
    $template = str_replace('page-numbers current', 'page-link active fw-semibold next-btn next-btn-sm', $template);
    $template = str_replace('next page-numbers', 'btn btn-primary btn-lg d-inline-flex gap-lg-10 next ms-10 page-numbers', $template);
    $template = str_replace('prev page-numbers', 'btn prev-btn prev-btn-sm me-10 prev page-numbers', $template);
    $template = str_replace('page-link active', 'page-link active page-item', $template);
    $template = str_replace('&hellip;', '<svg width="29" height="5" viewBox="0 0 29 5" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="2.5" cy="2.5" r="2.5" fill="currentColor"/><circle cx="14.5" cy="2.5" r="2.5" fill="currentColor"/><circle cx="26.5" cy="2.5" r="2.5" fill="currentColor"/></svg>', $template);
   
	
	
	$template = str_replace('post-page-numbers', 'page-link fw-semibold next-btn next-btn-sm', $template);
    
    return $template;
});


add_filter('navigation_markup_template', function($template){
	if( is_singular() ){
		$template = '<nav class="navigation %1$s" aria-label="%4$s">
			<h2 class="screen-reader-text">%2$s</h2>
			<div class="nav-links post-wrapper row row-cols-lg-2 gy-10 gy-lg-0 align-items-center position-relative">%3$s</div>
		</nav>';
	}
	
	return $template;
});


add_filter('wp_link_pages', function($template){
	$template = str_replace('post-page-numbers', 'post-page-numbers page-link fw-semibold next-btn next-btn-sm', $template);
	$template = str_replace('current', 'current active', $template);    
    return $template;
});


function architronix_add_custom_tag_cloud_link_classes($tag_cloud) {
    // Find all tag cloud links in the $tag_cloud HTML
    preg_match_all('/<a[^>]+>/i', $tag_cloud, $matches);

    // Loop through each found link
    foreach ($matches[0] as $link) {
        // Check if the link already has the class attribute
        if (strpos($link, 'class=') !== false) {
            // If it does, append the additional class
            $tag_cloud = str_replace($link, str_replace('class="', 'class="btn-hover-animation-3 text-decoration-none  ', $link), $tag_cloud);
        } else {
            // If it doesn't, add the class attribute and its value
            $tag_cloud = str_replace($link, str_replace('<a ', '<a class="btn-hover-animation-3 text-decoration-none " ', $link), $tag_cloud);
        }
    }

    return $tag_cloud;
}
add_filter('wp_tag_cloud', 'architronix_add_custom_tag_cloud_link_classes');

add_action('wp_footer', 'architronix_load_modal_template');
function architronix_load_modal_template(){
	if(!is_user_logged_in()):
		get_template_part('template-parts/modal', 'login');
		get_template_part('template-parts/modal', 'register');
		get_template_part('template-parts/modal', 'lost-password');
	endif;
}


function add_class_to_pagination_div($content) {
    // Replace the class of the pagination div
    $content = str_replace('wp-block-query-pagination-numbers', 'wp-block-query-pagination-numbers pagination', $content);
    return $content;
}

add_filter('the_content', 'add_class_to_pagination_div');


function architronix_comments_block_form_defaults( $fields ) {
	$req   = get_option( 'require_name_email' );
	$html5 = 'html5';

	// Define attributes in HTML5 or XHTML syntax.
	$required_attribute = ( $html5 ? ' required' : ' required="required"' );
	$checked_attribute  = ( $html5 ? ' checked' : ' checked="checked"' );

	// Identify required fields visually and create a message about the indicator.
	$required_indicator = ' ' . wp_required_field_indicator();
	$required_text      = ' ' . wp_required_field_message();
	if ( wp_is_block_theme() ) {
		$fields['submit_button'] = '<input name="%1$s" type="submit" id="%2$s" class="%3$s wp-block-button__link ' . wp_theme_get_element_class_name( 'button' ) . '" value="%4$s" />';
		$fields['submit_field']  = '<p class="form-submit text-end wp-block-button">%1$s %2$s</p>';
	}

	$fields['class_form'] = 'row';
	$fields['fields']['author'] = sprintf(
		'<div class="col-md-6"><p class="comment-form-author">%s</p></div>',
		sprintf(
			'<input id="author" class="form-control" name="author" placeholder="Your name*" type="text" value="" size="30" maxlength="245" autocomplete="name"%s />',
			( $req ? $required_attribute : '' )
		)
		);

		$fields['fields']['email'] = sprintf(
			'<div class="col-md-6"><p class="comment-form-email">%s</p></div>',
			sprintf(
				'<input id="email" class="form-control" placeholder="Your email*" name="email" %s value="" size="30" maxlength="100" aria-describedby="email-notes" autocomplete="email"%s />',
				( $html5 ? 'type="email"' : 'type="text"' ),
				( $req ? $required_attribute : '' )
			)
			);	
		unset($fields['fields']['url'] );		
		

	return $fields;
}
add_filter( 'comment_form_defaults', 'architronix_comments_block_form_defaults' );

function architronix_comment_reply_link_class( $class ) {
	$class = str_replace( "class='comment-reply-link", "class='comment-reply-link text-decoration-none link-hover-animation-1", $class );
	return $class;
}

add_filter( 'comment_reply_link', 'architronix_comment_reply_link_class' );


function architronix_edit_comment_link_defaults( $link, $comment_id, $text ) {
    $comment = get_comment( $comment_id );

    if ( ! current_user_can( 'edit_comment', $comment_id ) ) {
        return $link;
    }

    if ( null === $text ) {
        $text = esc_attr__( 'Edit','architronix' );
    }

    $link = '<h6><a class="comment-edit-link text-decoration-none link-hover-animation-1" href="' . esc_url( get_edit_comment_link( $comment_id ) ) . '">' . $text . '</a></h6>';

    /**
     * Filters the comment edit link anchor tag.
     *
     * @since 2.3.0
     *
     * @param string $link       Anchor tag for the edit link.
     * @param string $comment_id Comment ID as a numeric string.
     * @param string $text       Anchor text.
     */
    return apply_filters( 'architronix_edit_comment_link_defaults', $link, $comment_id, $text );
}
add_filter( "edit_comment_link", "architronix_edit_comment_link_defaults", 10, 3 );

function architronix_wpcf7_contact_form_options(){

	$cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');

	$contact_forms = array();
	if ($cf7) {
		foreach ($cf7 as $cform) {
			$contact_forms[$cform->post_title] = $cform->post_title;
		}
	} else {
		$contact_forms[] = esc_html__('No contact forms found', 'architronix');
	}

	return $contact_forms;
}
function architronix_inline_background_image($attachement_id, $background_size = ''){
	if(is_array($attachement_id) && !empty($attachement_id['url'])){
		$image = [
			$attachement_id['url']
		];
	}else{
		$image = wp_get_attachment_image_src($attachement_id, 'full');
		if (empty($image) || is_wp_error($image)) return;
	}
	
	if(empty($image[0])) return;

	$css = [		
		'background-image' => 'url(' . esc_url($image[0]) . ')',
		'background-size' => $background_size		
	];

	$properties = [];
	foreach ($css as $key => $value) {
		if(empty($value)) continue;
		$properties[] = "{$key}: {$value};";
	}
	
	echo ' style="'.implode(' ', $properties).';"';
}


if (!function_exists('architronix_leaflet_map_script')) :
	function architronix_leaflet_map_script($locations)	{
	?>
		<script>      
			var architronixLocations;        
				architronixLocations = [
					<?php foreach ($locations as $location) : ?>
					{
					'markerPoint': [<?php echo esc_attr($location['latitude']) ?>, <?php echo esc_attr($location['longitude']) ?>],
					'title': '<?php echo esc_attr($location['location_map_title'])  ?>',
					'subtitle': '<?php echo esc_attr($location['company_name'])  ?>',
					'address': '<?php echo esc_attr($location['address'])  ?>'
				},
				<?php endforeach; ?>
			];
		</script>
	<?php
	}
endif;

function architronix_get_sidebar_parse_selectors(){
	$selectors = [
		[
			'selectors' => '.widget > ul, .widget > nav > ul, .widget > div > ul',
			'addClass' => 'category-lists list-unstyled mb-0 d-flex flex-column gap-20',
		],
		[
			'selectors' => '.widget > ul ul, .widget > nav > ul ul, .widget > div > ul ul',
			'addClass' => 'mt-10',
		],
		[
			'selectors' => '.widget ul ul ul ul',
			'addClass' => 'ms-0 ps-0',
		],
		[
			'selectors' => '.widget img',
			'addClass' => 'img-fluid',
		],
		[
			'selectors' => '.widget a',
			'addClass' => 'text-decoration-none link-hover-animation-1',
		],
		[
			'selectors' => '.widget select',
			'addClass' => 'form-control form-select',
		],
		[
			'selectors' => '.widget input, .widget textarea',
			'addClass' => 'form-control',
		],
		[
			'selectors' => '.widget table',
			'addClass' => 'table',
		],
		[
			'selectors' => '.widget .tagcloud',
			'addClass' => 'wp-block-tag-cloud',
		],
		[
			'selectors' => '.widget .tagcloud a',
			'addClass' => 'text-decoration-none tag-cloud-link btn-hover-animation-3',
			'removeAttribute' => 'style'
		],
		[
			'selectors' => '.widget .rsswidget',
			'addClass' => 'fw-semibold',
		],
		[
			'selectors' => '.widget .rss-date',
			'addClass' => 'text-muted',
		],
		[
			'selectors' => '.widget .current-menu-item > a',
			'addClass' => 'active',
		],
	];
	return $selectors;
}