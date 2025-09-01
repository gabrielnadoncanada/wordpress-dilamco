<?php
namespace Architronix;
/**
 * Dark Mode Class
 *
 * @package 	WordPress
 * @subpackage 	Architronix
 */

/**
 * This class is in charge of Dark Mode.
 */
final class Design_Options {

	/**
	 * Instantiate the object.
	 *
	 */
	public function __construct() {
		// Add customizer controls.
		add_action( 'customize_register', array( $this, 'customizer_controls' ) );
		
	}

	
	

	/**
	 * Register customizer options.
	 *
	 * @param 	WP_Customize_Manager 	$wp_customize Theme Customizer object.
	 * @return 	void
	 */
	public function customizer_controls( $wp_customize ) {

		$colors_section = $wp_customize->get_section( 'colors' );
		if ( is_object( $colors_section ) ) {
			$colors_section->title = __( 'Colors', 'architronix' );
			$colors_section->panel = 'design_panel';
		}

		$colors = architronix_get_default_colors_global();
		foreach ($colors as $color) {
			$color = wp_parse_args($color, [
				'id' => '',
				'title' => '',
				'value' => ''
			]);
	
	
			if(empty($color['title'])){
				$color['title'] = ucfirst(str_replace('-', ' ', $color['id']));
			}
			$field_id = architronix_get_field_id_by_prefix($color['id']); 

			$wp_customize->add_setting(
				$field_id,
				[
					'default' => $color['value'],
					'sanitize_callback' => 'esc_attr'						
				]				
			);

			$wp_customize->add_control( new \WP_Customize_Color_Control(
				$wp_customize, $field_id, 
				array( // setting id
					'label'    => $color['title'],
					'section'  => 'colors',
					'priority' => 1,
				)
			) );
		}

		
		$wp_customize->add_setting(
			'respect_user_color_preference_notice',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => '',
				'sanitize_callback' => '__return_empty_string',
			)
		);

		

		$wp_customize->add_setting(
			'respect_user_color_preference',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => false,
				'sanitize_callback' => static function( $value ) {
					return (bool) $value;
				},
			)
		);

		$description  = '<p>';
		$description .= sprintf(
			/* translators: %s: Architronix support article URL. */
			__( 'Dark Mode is a device setting. If a visitor to your site requests it, your site will be shown with a dark background and light text. <a href="%s">Learn more about Dark Mode.</a>', 'architronix' ),
			esc_url( __( 'https://wordpress.org/support/article/architronix/#dark-mode-support', 'architronix' ) )
		);
		$description .= '</p>';
		$description .= '<p>' . __( 'Dark Mode can also be turned on and off with a button that you can find in the bottom corner of the page.', 'architronix' ) . '</p>';

		$wp_customize->add_control(
			'respect_user_color_preference',
			array(
				'type'            => 'checkbox',
				'section'         => 'colors',
				'label'           => esc_html__( 'Dark Mode support', 'architronix' ),
				'priority'        => 110,
				'description'     => $description,
				'active_callback' => static function( $value ) {
					return 127 < Custom_Colors::get_relative_luminance_from_hex( get_theme_mod( 'background_color', 'D1E4DD' ) );
				},
			)
		);

		// Add partial for background_color.
		$wp_customize->selective_refresh->add_partial(
			'background_color',
			array(
				'selector'            => '#dark-mode-toggler',
				'container_inclusive' => true,
				'render_callback'     => function() {
					$attrs = ( $this->switch_should_render() ) ? array() : array( 'style' => 'display:none;' );
					$this->the_html( $attrs );
				},
			)
		);
	}


	

	/**
	 * Determine if we want to print the dark-mode switch or not.
	 *
	 * @return bool
	 */
	public function switch_should_render() {
		global $is_IE;
		return (
			get_theme_mod( 'respect_user_color_preference', false ) &&
			! $is_IE &&
			127 <= Custom_Colors::get_relative_luminance_from_hex( get_theme_mod( 'background_color', 'D1E4DD' ) )
		);
	}


	/**
	 * Print the dark-mode switch HTML.
	 *
	 * Inspired from https://codepen.io/aaroniker/pen/KGpXZo (MIT-licensed)
	 *
	 * @param 	array $attrs The attributes to add to our <button> element.
	 * @return 	void
	 */
	public function the_html( $attrs = array() ) {
		$attrs = wp_parse_args(
			$attrs,
			array(
				'id'           => 'dark-mode-toggler',
				'class'        => 'fixed-bottom',
				'aria-pressed' => 'false',
				'onClick'      => 'toggleDarkMode()',
			)
		);
		echo '<button';
		foreach ( $attrs as $key => $val ) {
			echo ' ' . esc_attr( $key ) . '="' . esc_attr( $val ) . '"';
		}
		echo '>';
		printf(
			/* translators: %s: On/Off */
			esc_html__( 'Dark Mode: %s', 'architronix' ),
			'<span aria-hidden="true"></span>'
		);
		echo '</button>';
		?>
		<style>
			#dark-mode-toggler > span {
				margin-<?php echo is_rtl() ? 'right' : 'left'; ?>: 5px;
			}
			#dark-mode-toggler > span::before {
				content: '<?php esc_attr_e( 'Off', 'architronix' ); ?>';
			}
			#dark-mode-toggler[aria-pressed="true"] > span::before {
				content: '<?php esc_attr_e( 'On', 'architronix' ); ?>';
			}
			<?php if ( is_admin() || wp_is_json_request() ) : ?>
				.components-editor-notices__pinned ~ .edit-post-visual-editor #dark-mode-toggler {
					z-index: 20;
				}
				.is-dark-theme.is-dark-theme #dark-mode-toggler:not(:hover):not(:focus) {
					color: var(--global--color-primary);
				}
				@media only screen and (max-width: 782px) {
					#dark-mode-toggler {
						margin-top: 32px;
					}
				}
			<?php endif; ?>
		</style>

		<?php
	}

	/**
	 * Print the dark-mode switch script.
	 *
	 * @return void
	 */
	public function the_script() {
		echo '<script>';
		include get_template_directory() . '/assets/js/dark-mode-toggler.js'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude
		echo '</script>';
	}

	

}