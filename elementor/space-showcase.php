<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;


class Space_Showcase extends Widget_Base{    
	    
    public function get_name() {  
        
		return 'control_agency_space_showcase';
	}

	public function get_title() {
		return 'Space Showcase';
	}

	public function get_icon() {
		return 'dashicons dashicons-category';
	}

	public function get_categories() {
		return [ 'architronix-theme' ];
	}

	public function get_keywords() {
		return explode(' ', 'Space Showcase Posts controlspace');      
	}

    protected function register_controls() {

		$this->start_controls_section(
			'space_showcase_section',
			[
				'label' => 'Space Showcase',
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'number',
			[
				'label' => esc_html__( 'Number of spaces', 'architronix' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5,
				'min' => 1,
				'max' => 20,
				'description' => esc_html__( 'Maximum number of spaces to display', 'architronix' ),
			]
		);

        $this->add_control(
			'include',
			[
				'label' => esc_html__( 'Filter By Space', 'architronix' ),
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $this->get_spaces(),
				'description' => esc_html__( 'Select specific spaces to display', 'architronix' ),
			]
		);

        $this->add_control(
			'order',
			[
				'label' => esc_html__( 'Order', 'architronix' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'ASC' => esc_html__( 'Ascending', 'architronix' ),
					'DESC' => esc_html__( 'Descending', 'architronix' ),
				],
			]
		);

        $this->add_control(
			'orderby',
			[
				'label' => esc_html__( 'Order by', 'architronix' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'count',
				'options' => [
					'name' => esc_html__( 'Name', 'architronix' ),
					'slug' => esc_html__( 'Slug', 'architronix' ),
					'count' => esc_html__( 'Post Count', 'architronix' ),
					'id' => esc_html__( 'ID', 'architronix' ),
					'description' => esc_html__( 'Description', 'architronix' ),
				],
			]
		);

        $this->add_control(
			'additional_class',
			[
				'label' => esc_html__( 'Additional CSS Class', 'architronix' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'my-custom-class', 'architronix' ),
				'description' => esc_html__( 'Optional CSS class for styling', 'architronix' ),
			]
		);

        $this->end_controls_section();
    }

    private function get_spaces() {
        $spaces = [];
        $posts = get_posts([
            'post_type' => 'controlspace',
            'posts_per_page' => -1,
        ]);
        if (!empty($posts) && !is_wp_error($posts)) {
            foreach ($posts as $post) {
                $spaces[$post->ID] = $post->post_title;
            }
        }
        
        return $spaces;
    }

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		// Extract settings
		$number = !empty($settings['number']) ? $settings['number'] : 5;
		$include = !empty($settings['include']) ? $settings['include'] : [];
		$order = !empty($settings['order']) ? $settings['order'] : 'DESC';
		$orderby = !empty($settings['orderby']) ? $settings['orderby'] : 'count';
		$additional_class = !empty($settings['additional_class']) ? $settings['additional_class'] : '';
		
		// Include template with variables
		$template_path = get_template_directory() . '/elementor/blocks/space-showcase.php';
		if (file_exists($template_path)) {
			include $template_path;
		}
	}
    
    
}


