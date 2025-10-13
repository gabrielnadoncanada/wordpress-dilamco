<?php
/**
 * Color Grid Shortcode
 *
 * Usage: [color_grid]
 */

function dilamco_color_grid_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'csv_file' => get_template_directory() . '/inc/colors/colors.csv',
    ), $atts );

    $colors = dilamco_parse_color_csv( $atts['csv_file'] );

    if ( empty( $colors ) ) {
        return '<p>Aucune couleur disponible.</p>';
    }

    ob_start();
    get_template_part( 'inc/colors/template-parts/color-grid', null, array( 'colors' => $colors ) );
    return ob_get_clean();
}
add_shortcode( 'color_grid', 'dilamco_color_grid_shortcode' );

/**
 * Parse CSV file and return colors grouped by category
 */
function dilamco_parse_color_csv( $file_path ) {
    if ( ! file_exists( $file_path ) ) {
        return array();
    }

    $colors = array();
    $handle = fopen( $file_path, 'r' );

    if ( $handle === false ) {
        return array();
    }

    $header = fgetcsv( $handle );

    while ( ( $row = fgetcsv( $handle ) ) !== false ) {
        $group = $row[1];

        if ( ! isset( $colors[ $group ] ) ) {
            $colors[ $group ] = array();
        }

        $colors[ $group ][] = array(
            'id'    => $row[0],
            'name'  => $row[2],
            'rgb'   => $row[3],
        );
    }

    fclose( $handle );

    return $colors;
}

/**
 * Calculate if text should be white or black based on background color
 */
function dilamco_get_text_color( $rgb ) {
    preg_match_all( '/\d+/', $rgb, $matches );

    if ( empty( $matches[0] ) || count( $matches[0] ) < 3 ) {
        return 'text-white';
    }

    $r = (int) $matches[0][0];
    $g = (int) $matches[0][1];
    $b = (int) $matches[0][2];

    $luminance = ( 0.299 * $r + 0.587 * $g + 0.114 * $b ) / 255;

    return $luminance > 0.5 ? 'text-black' : 'text-white';
}
