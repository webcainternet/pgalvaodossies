<?php

// constants
define('THEMELIB', TEMPLATEPATH . '/extension');
define('COMPOSER', TEMPLATEPATH . '/vendor');

// Functions
require_once(THEMELIB . '/helpers.php');
require_once(THEMELIB . '/post-types.php');
require_once(THEMELIB . '/custom-fields.php');
require_once(THEMELIB . '/custom-taxonomy.php');
require_once(THEMELIB . '/query-filters.php');
require_once(THEMELIB . '/shortcodes.php');
//
// Adding thumb support and thumb sizes
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );

    // Default thumbnail size
    set_post_thumbnail_size( 700, 400, false );
}

// add plus image size
if ( function_exists( 'add_image_size' ) ) {
    //add_image_size('hl_mob', 396, 223, true);
    add_image_size('full_image', 1024, 600, false);
    add_image_size('quad_about', 212, 212, false);
    add_image_size('quad_single', 190, 190, false);
    add_image_size('search_result', 197, 250, false);
    add_image_size('search_single', 276, 158, false);
}
