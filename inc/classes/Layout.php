<?php
namespace Architronix;

final class Layout {

    public $data = [];

    public function __construct() {
        add_action('template_redirect', [$this, 'init'], -1);
    }

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }
    }

    public function init() {
        // Fresh theme layout        
        $this->display_header = true;
        $this->display_topbar = false;
        $this->display_banner = true;
        $this->sidebar = false;
        $this->layout = 'full';
        $this->display_footer = true;
        $this->display_footer_cta = false;
        $this->display_footer_widget = false;
        $this->display_footer_copyrightbar = true;

        // Demo layout
        $this->post_type();
        $this->post_id();        
        $this->header();
        $this->footer();
        $this->layout();
        $this->sidebar();

        $GLOBALS['architronixLayout'] = $this;
    }

    private function post_id(){
        global $wp_query;
        $this->post_id = $wp_query->get_queried_object_id();

        //custom plugin support
        if(defined('CTRL_AGENCY_VER')){
            global $controlAgency;
            if( array_key_exists($this->post_type, $controlAgency->archive_pages) ){
                $this->post_id = $controlAgency->archive_pages[$this->post_type];
            }
        }


    }

    private function header() {
        $this->header_style = '';
        if(get_post_type($this->post_id) == 'page'){
            $disable_banner = get_post_meta($this->post_id, 'disable_banner', true);
            if(!empty($disable_banner)){
                $this->display_banner = false;
            }
            $this->header_style = get_post_meta($this->post_id, 'header_style', true);
            $this->display_topbar = get_post_meta($this->post_id, 'enable_topbar', true);
        }

        $this->banner_args();
    }

    private function post_type() {
        $this->post_type = get_post_type();
    }

    private function sidebar() {
        if (!$this->sidebar)
            return;
        ob_start();
        dynamic_sidebar($this->sidebar);
        $content = ob_get_clean();

        if(!empty($content) && function_exists('architronix_get_sidebar_parse_selectors')){
            $selectors = architronix_get_sidebar_parse_selectors();
            $parser = new Parser($content);
            $content = $parser->string;
            $content = Helpers::parse_by_selectors($content, $selectors);
        }
       
        $this->sidebar_content = $content;
    }

    
    private function layout() {

        $this->layout_by_post_type();

        if (!$this->sidebar) {
            $this->layout = 'full';
        } elseif (!is_active_sidebar($this->sidebar)) {
            $this->layout = 'full';
            $this->sidebar = false;
        }
    }

    private function footer() {
        
    }

    private function banner_args() {
        global $wp_query;

        // initialize return value
        $image = false;
        $prefix = '';
        $title = '';
        $subtitle = '';

        // get active post type of page
        $post_type = get_query_var('post_type');
        if (is_array($post_type)) {
            $post_type = reset($post_type);
        }
        $post_type_obj = get_post_type_object($post_type);

        if (is_page()) {
            $title = get_the_title();
            $title_meta = get_post_meta(get_the_ID(), 'title', true);
            $title = !empty($title_meta) ? $title_meta : $title;
            $prefix = get_post_meta(get_the_ID(), 'prefix', true);
            $subtitle = get_post_meta(get_the_ID(), 'subtitle', true);
        } elseif (is_singular()) {
            global $post;
            $title = get_the_title();
            $prefix = !empty($post_type_obj->labels->singular_name)? $post_type_obj->labels->singular_name : '';
            $subtitle = $post->post_excerpt;
        } elseif (is_category()) {
            $title = single_cat_title('', false);
            $prefix = esc_attr_x('Category', 'category archive title prefix', 'architronix');
            $subtitle = get_the_archive_description();
        } elseif (is_tag()) {
            $title = single_tag_title('', false);
            $prefix = esc_attr_x('Tag', 'tag archive title prefix', 'architronix');
            $subtitle = get_the_archive_description('description');
        } elseif (is_author()) {
            $title = get_the_author();
            $prefix = esc_attr_x('Author', 'author archive title prefix', 'architronix');
            $subtitle = get_the_author_meta();
        } elseif (is_year()) {
            $title = get_the_date(_x('Y', 'yearly archives date format', 'architronix'));
            $prefix = esc_attr_x('Year', 'date archive title prefix', 'architronix');
            $subtitle = get_theme_mod('banner_blog_subtitle', esc_attr__('Unveil the Secrets to Transforming Spaces', 'architronix'));
            $subtitle = sprintf(esc_attr_x('%s', 'Blog subtitle', 'architronix'), $subtitle);
        } elseif (is_month()) {
            $title = get_the_date(_x('F Y', 'monthly archives date format', 'architronix'));
            $prefix = esc_attr_x('Month', 'date archive title prefix', 'architronix');
            $subtitle = get_theme_mod('banner_blog_subtitle', esc_attr__('Unveil the Secrets to Transforming Spaces', 'architronix'));
            $subtitle = sprintf(esc_attr_x('%s', 'Blog subtitle', 'architronix'), $subtitle);
        } elseif (is_day()) {
            $title = get_the_date(_x('F j, Y', 'daily archives date format', 'architronix'));
            $prefix = esc_attr_x('Day', 'date archive title prefix', 'architronix');
            $subtitle = get_theme_mod('banner_blog_subtitle', esc_attr__('Unveil the Secrets to Transforming Spaces', 'architronix'));
            $subtitle = sprintf(esc_attr_x('%s', 'Blog subtitle', 'architronix'), $subtitle);
        } elseif (is_tax('post_format')) {
            if (is_tax('post_format', 'post-format-aside')) {
                $title = esc_attr_x('Asides', 'post format archive title', 'architronix');
            } elseif (is_tax('post_format', 'post-format-gallery')) {
                $title = esc_attr_x('Galleries', 'post format archive title', 'architronix');
            } elseif (is_tax('post_format', 'post-format-image')) {
                $title = esc_attr_x('Images', 'post format archive title', 'architronix');
            } elseif (is_tax('post_format', 'post-format-video')) {
                $title = esc_attr_x('Videos', 'post format archive title', 'architronix');
            } elseif (is_tax('post_format', 'post-format-quote')) {
                $title = esc_attr_x('Quotes', 'post format archive title', 'architronix');
            } elseif (is_tax('post_format', 'post-format-link')) {
                $title = esc_attr_x('Links', 'post format archive title', 'architronix');
            } elseif (is_tax('post_format', 'post-format-status')) {
                $title = esc_attr_x('Statuses', 'post format archive title', 'architronix');
            } elseif (is_tax('post_format', 'post-format-audio')) {
                $title = esc_attr_x('Audio', 'post format archive title', 'architronix');
            } elseif (is_tax('post_format', 'post-format-chat')) {
                $title = esc_attr_x('Chats', 'post format archive title', 'architronix');
            }
            $queried_object = get_queried_object();
            if ($queried_object) {
                $tax = get_taxonomy($queried_object->taxonomy);
                $prefix = $tax->labels->singular_name;
                $subtitle = get_the_archive_description();
            }
        } elseif (is_post_type_archive()) {            
            $title = post_type_archive_title('', false);
            $prefix = $post_type_obj->labels->singular_name;
            $subtitle = get_the_archive_description();
        } elseif (is_tax()) {
            $queried_object = get_queried_object();
            if ($queried_object) {
                $tax = get_taxonomy($queried_object->taxonomy);
                $title = single_term_title('', false);
                $prefix = $tax->labels->singular_name;
                $subtitle = get_the_archive_description();
            }
        } elseif (is_search()) {
            $prefix = esc_attr_x('Search', 'Search page title prefix', 'architronix');
            $title = sprintf(esc_attr__('Results for "%s"', 'architronix'), esc_html(get_search_query()));
            $subtitle = sprintf(esc_attr(_n('We found  %d  result for your search.', 'We found  %d  results for your search.', (int) $wp_query->found_posts, 'architronix')), (int) $wp_query->found_posts);
        } elseif (is_404()) {
            $prefix = esc_attr_x('404', '404 page title prefix', 'architronix');
            $title = esc_attr__('You are Lost in the Blueprint ', 'architronix');
            $subtitle = esc_attr__('Explore Our Architectural Wonders Instead', 'architronix');
        } elseif (is_home()) {
            $prefix = get_theme_mod('banner_blog_prefix', esc_attr__('Blog', 'architronix'));
            $prefix = sprintf(esc_attr_x('%s', 'Blog title prefix', 'architronix'), $prefix);

            $title = get_theme_mod('banner_blog_title', esc_attr__('Design Insights & Inspiration', 'architronix'));
            $title = sprintf(esc_attr_x('%s', 'Blog title', 'architronix'), $title);

            $subtitle = get_theme_mod('banner_blog_subtitle', esc_attr__('Unveil the Secrets to Transforming Spaces', 'architronix'));
            $subtitle = sprintf(esc_attr_x('%s', 'Blog subtitle', 'architronix'), $subtitle);
        }

        $original_title = $title;

        /**
         * Filters the title prefix.
         *
         * @param string $prefix title prefix.
         */
        $prefix = apply_filters('get_the_archive_title_prefix', $prefix);
        /**
         * Filters the prefix.
         *
         * @param string $prefix            prefix to be displayed.
         * @param string $post_type         Query var post type.
         */
        $prefix = apply_filters('architronix_get_the_banner_prefix', $prefix, $post_type);

        /**
         * Filters the archive title.
         *
         * @param string $title          title to be displayed.
         * @param string $original_title title without prefix.
         * @param string $prefix         title prefix.
         */
        $title = apply_filters('get_the_archive_title', $title, $original_title, $prefix);
        /**
         * Filters the title.
         *
         * @param string $title             title to be displayed.
         * @param string $post_type         Query var post type.
         */
        $title = apply_filters('architronix_get_the_banner_title', $title, $post_type);

        /**
         * Filters the subtitle.
         *
         * @param string $subtitle          subtitle to be displayed.
         * @param string $post_type         Query var post type.
         */
        $subtitle = apply_filters('architronix_get_the_banner_subtitle', $subtitle, $post_type);
        $allowed_html = array(
            'a' => array(
                'href' => array(),
                'title' => array()
            ),
            'br' => array(),
            'em' => array(),
            'span' => array(),
            'strong' => array(),
        );

        $title = str_replace('[post_title]', get_the_title($this->post_id), $title);
        $subtitle = str_replace('[post_title]', get_the_title($this->post_id), $subtitle);
        $image = get_post_meta($this->post_id, 'image', true);

        $this->banner_prefix = $prefix;
        $this->banner_title = $title;
        $this->banner_subtitle = wp_kses($subtitle, $allowed_html);
        $this->banner_image = $image;
        $this->banner_args = [
            'prefix' => $this->banner_prefix,
            'title' => $this->banner_title,
            'subtitle' => $this->banner_subtitle,
            'image' => $image
        ];
    }

    private function layout_by_post_type() {
        switch (get_post_type()) {
            case 'post':
                if (is_singular()) {
                    $this->layout = get_theme_mod('post_single_layout', 'rs');
                    $this->sidebar = get_theme_mod('post_single_sidebar', 'sidebar-post');
                } elseif (is_home() || is_archive() || is_category() || is_tag() || is_author()) {
                    $this->layout = get_theme_mod('post_archive_layout', 'rs');
                    $this->sidebar = get_theme_mod('post_archive_sidebar', 'sidebar-post');
                }

                break;

            case 'page':
                $layout = get_post_meta($this->post_id, 'layout', true);
                $this->layout = !empty($layout) ? $layout : $this->layout;
                $sidebar = get_post_meta($this->post_id, 'sidebar', true);
                $this->sidebar = !empty($sidebar) ? $sidebar : $this->sidebar;
                break;

            default:

                break;
        }
    }

    
}