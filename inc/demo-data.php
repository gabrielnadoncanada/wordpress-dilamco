<?php
add_filter( 'pt-ocdi/import_files', 'architronix_import_demo_data' );
function architronix_import_demo_data() {
  return array( 
    array(
      'import_file_name'           => 'Home 1 - WPBakery',
      'import_file_url'            => ARCHITRONIX_URI.'/inc/demo-data/demo-content-wpbakery.xml',
      'import_widget_file_url'     => ARCHITRONIX_URI.'/inc/demo-data/widgets.wie',
      'preview_url'                => 'https://themeperch.net/architronix/wpbakery/home-1',
      'import_preview_image_url'   => ARCHITRONIX_ASSETS . '/images/demos/bakery-home-1.jpg',
      'categories'                 => array( 'WPBakery Page Builder' ),
    ),
    array(
      'import_file_name'           => 'Home 1 - Elementor',
      'import_file_url'            => ARCHITRONIX_URI.'/inc/demo-data/demo-content-elementor.xml',
      'import_widget_file_url'     => ARCHITRONIX_URI.'/inc/demo-data/widgets.wie',
      'preview_url'                => 'https://themeperch.net/architronix/elementor/home-1',
      'import_preview_image_url'   => ARCHITRONIX_ASSETS . '/images/demos/elementor-home-1.jpg',
      'categories'                 => array( 'Elementor Page Builder' ),
    ),
    array(
      'import_file_name'           => 'Home 1 - Gutenberg',
      'import_file_url'            => ARCHITRONIX_URI.'/inc/demo-data/demo-content-gutenberg.xml',
      'import_widget_file_url'     => ARCHITRONIX_URI.'/inc/demo-data/widgets.wie',
      'preview_url'                => 'https://themeperch.net/architronix/gutenberg/home-1',
      'import_preview_image_url'   => ARCHITRONIX_ASSETS . '/images/demos/gutenberg-home-1.jpg',
      'categories'                 => array( 'Gutenberg Page Builder' ),
    ),
    array(
      'import_file_name'           => 'Home 2 - WPBakery',
      'import_file_url'            => ARCHITRONIX_URI.'/inc/demo-data/demo-content-wpbakery.xml',
      'import_widget_file_url'     => ARCHITRONIX_URI.'/inc/demo-data/widgets.wie',
      'preview_url'                => 'https://themeperch.net/architronix/wpbakery/home-2',
      'import_preview_image_url'   => ARCHITRONIX_ASSETS . '/images/demos/bakery-home-2.jpg',
      'categories'                 => array( 'WPBakery Page Builder' ),
    ),
    array(
      'import_file_name'           => 'Home 2 - Elementor',
      'import_file_url'            => ARCHITRONIX_URI.'/inc/demo-data/demo-content-elementor.xml',
      'import_widget_file_url'     => ARCHITRONIX_URI.'/inc/demo-data/widgets.wie',
      'preview_url'                => 'https://themeperch.net/architronix/elementor/home-2',
      'import_preview_image_url'   => ARCHITRONIX_ASSETS . '/images/demos/elementor-home-2.jpg',
      'categories'                 => array( 'Elementor Page Builder' ),
    ),
    array(
      'import_file_name'           => 'Home 2 - Gutenberg',
      'import_file_url'            => ARCHITRONIX_URI.'/inc/demo-data/demo-content-gutenberg.xml',
      'import_widget_file_url'     => ARCHITRONIX_URI.'/inc/demo-data/widgets.wie',
      'preview_url'                => 'https://themeperch.net/architronix/gutenberg/home-2',
      'import_preview_image_url'   => ARCHITRONIX_ASSETS . '/images/demos/gutenberg-home-2.jpg',
      'categories'                 => array( 'Gutenberg Page Builder' ),
    ),
    array(
      'import_file_name'           => 'Home 3 - WPBakery',
      'import_file_url'            => ARCHITRONIX_URI.'/inc/demo-data/demo-content-wpbakery.xml',
      'import_widget_file_url'     => ARCHITRONIX_URI.'/inc/demo-data/widgets.wie',
      'preview_url'                => 'https://themeperch.net/architronix/wpbakery/home-3',
      'import_preview_image_url'   => ARCHITRONIX_ASSETS . '/images/demos/bakery-home-3.jpg',
      'categories'                 => array( 'WPBakery Page Builder' ),
    ),
    array(
      'import_file_name'           => 'Home 3 - Elementor',
      'import_file_url'            => ARCHITRONIX_URI.'/inc/demo-data/demo-content-elementor.xml',
      'import_widget_file_url'     => ARCHITRONIX_URI.'/inc/demo-data/widgets.wie',
      'preview_url'                => 'https://themeperch.net/architronix/elementor/home-3',
      'import_preview_image_url'   => ARCHITRONIX_ASSETS . '/images/demos/elementor-home-3.jpg',
      'categories'                 => array( 'Elementor Page Builder' ),
    ),
    array(
      'import_file_name'           => 'Home 3 - Gutenberg',
      'import_file_url'            => ARCHITRONIX_URI.'/inc/demo-data/demo-content-gutenberg.xml',
      'import_widget_file_url'     => ARCHITRONIX_URI.'/inc/demo-data/widgets.wie',
      'preview_url'                => 'https://themeperch.net/architronix/gutenberg/home-3',
      'import_preview_image_url'   => ARCHITRONIX_ASSETS . '/images/demos/gutenberg-home-3.jpg',
      'categories'                 => array( 'Gutenberg Page Builder' ),
    ),
    array(
      'import_file_name'           => 'Home 4 - WPBakery',
      'import_file_url'            => ARCHITRONIX_URI.'/inc/demo-data/demo-content-wpbakery.xml',
      'import_widget_file_url'     => ARCHITRONIX_URI.'/inc/demo-data/widgets.wie',
      'preview_url'                => 'https://themeperch.net/architronix/wpbakery/home-4',
      'import_preview_image_url'   => ARCHITRONIX_ASSETS . '/images/demos/bakery-home-4.jpg',
      'categories'                 => array( 'WPBakery Page Builder' ),
    ),
    array(
      'import_file_name'           => 'Home 4 - Elementor',
      'import_file_url'            => ARCHITRONIX_URI.'/inc/demo-data/demo-content-elementor.xml',
      'import_widget_file_url'     => ARCHITRONIX_URI.'/inc/demo-data/widgets.wie',
      'preview_url'                => 'https://themeperch.net/architronix/elementor/home-4',
      'import_preview_image_url'   => ARCHITRONIX_ASSETS . '/images/demos/elementor-home-4.jpg',
      'categories'                 => array( 'Elementor Page Builder' ),
    ),
    array(
      'import_file_name'           => 'Home 4 - Gutenberg',
      'import_file_url'            => ARCHITRONIX_URI.'/inc/demo-data/demo-content-gutenberg.xml',
      'import_widget_file_url'     => ARCHITRONIX_URI.'/inc/demo-data/widgets.wie',
      'preview_url'                => 'https://themeperch.net/architronix/gutenberg/home-4',
      'import_preview_image_url'   => ARCHITRONIX_ASSETS . '/images/demos/gutenberg-home-4.jpg',
      'categories'                 => array( 'Gutenberg Page Builder' ),
    ),
  );
}

function architronix_demo_import_nav_menu_setup(){
    
    $primary = get_term_by( 'name', 'Primary menu', 'nav_menu' );
    set_theme_mod( 'nav_menu_locations', array(         
          //set primary menu
          'primary' => $primary->term_id,
          'mobile' => $primary->term_id
        )
    );

}

function architronix_demo_import_page_on_front_setup($selected_import){
  // Assign front page and posts page (blog page).
  $front_page = architronix_get_post_by_title('Home 1');
  $blog_page  = architronix_get_post_by_title('Blog');

  

  $home_pages = array('Home 1', 'Home 2', 'Home 3', 'Home 4');
  $seleced_name = explode('-', $selected_import['import_file_name']) ;
  if (in_array(wp_trim_words($seleced_name[0]), $home_pages)){
    $front_page = architronix_get_post_by_title($seleced_name[0]);
  }

  if (empty(get_option('page_on_front'))){
    update_option('show_on_front', 'page', true);
  } 
  
  if(!empty($front_page->ID)){
      update_option('page_on_front', $front_page->ID, true);
  }
  if(!empty($blog_page->ID)){
    update_option('page_for_posts', $blog_page->ID, true);
  }
}

function architronix_update_theme_mod(){
  set_theme_mod('navbar_icons', architronix_header_default('navbar_icons'));
  set_theme_mod('topbar_items_left', architronix_header_default('topbar_items_left'));
  set_theme_mod('topbar_items_right', architronix_header_default('topbar_items_right'));
  set_theme_mod('header_social_links', architronix_header_default('header_social_links'));
  set_theme_mod('header_tagline', architronix_header_default('header_tagline'));
  set_theme_mod('enable_cta', true);
  set_theme_mod('enable_footer_company_info', true);
  set_theme_mod('display_footer_address_1', true);
  set_theme_mod('display_footer_address_2', true);
  set_theme_mod('display_back_to_top', true);
  set_theme_mod('footer_social_links', architronix_footer_default('footer_social_links'));
  
}

add_action('pt-ocdi/after_import', 'architronix_after_import_setup', 10, 1);
function architronix_after_import_setup($selected_import){
  architronix_demo_import_nav_menu_setup();
  architronix_demo_import_page_on_front_setup($selected_import);
  architronix_update_theme_mod();
  flush_rewrite_rules(true);
}

function architronix_before_content_import($selected_import){
  if (empty($selected_import['import_file_name'])) return;
  wp_delete_post(1, true); // remove hello world

}
add_action('ocdi/before_content_import', 'architronix_before_content_import');