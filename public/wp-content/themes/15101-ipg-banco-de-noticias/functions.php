<?php
@ini_set( 'upload_max_size' , '5M' );

define('THEMELIB', TEMPLATEPATH . '/extension');
define('COMPOSER', TEMPLATEPATH . '/vendor');
require_once(COMPOSER . '/autoload.php');

$root = dirname(__FILE__);
$qdi_config_path = implode(DIRECTORY_SEPARATOR, array($root, 'config'));
$qdi_config = \Qdi\WP\Utils::load_config($qdi_config_path);
\Qdi\WP\Theme::initialize($qdi_config);

$theme_version = wp_get_theme();
$theme_version = $theme_version->get('Version');

define('PATHS_INC', TEMPLATEPATH . '/includes');
define('PATHS_SVG', PATHS_INC . '/svg');
define('PATHS_PARTIALS', PATHS_INC . '/partials');
define('JQUERY_VERSION', $qdi_config['env']['jquery_version']);
define('THEME_VERSION', $theme_version);
define('ENV', $qdi_config['env']['env']);
define('FB_APP_ID', $qdi_config['env']['fb_app_id']);
define('LIB', TEMPLATEPATH . '/lib');

// Functions
require_once(THEMELIB . '/helpers.php');
require_once(THEMELIB . '/post-types.php');
require_once(THEMELIB . '/custom-fields.php');
require_once(THEMELIB . '/shortcodes.php');
require_once(THEMELIB . '/custom-taxonomy.php');
require_once(THEMELIB . '/query-filters.php');

global $tpl_engine;
global $cache_engine;

$tpl_engine = new \Qdi\WP\Template(array(
    'base_path' => PATHS_INC
));

$cache_engine = new \Qdi\WP\Cache(array(
    'prefix' => '_ipg_fmc_cache',
    'debug' => WP_DEBUG
));

// Necessary to force custom post types nice urls to work
function my_rewrite_flush() {
  flush_rewrite_rules(false);
}
add_action('after_switch_theme', 'my_rewrite_flush');

function register_site_styles() {
    if (is_admin()) { return false; }

    $base_path = get_template_directory_uri();
    $base_path .= '/public/css/';

    $main_css = $base_path;
    $main_css .= (ENV == 'production') ? 'main.min.css' : 'main.css';
    wp_enqueue_style('main_css', $main_css, array(), THEME_VERSION);
}

add_action( 'wp_enqueue_scripts', 'register_site_styles' );

function register_admin_styles() {
    if (!is_admin()) { return false; }

    $main_css = get_template_directory_uri();
    $main_css .= '/public/css/';
    $main_css .= 'admin.css';
    wp_enqueue_style('admin_css', $main_css, array(), THEME_VERSION);

    $admin_js = get_template_directory_uri();
    $admin_js .= '/public/js/';
    $admin_js .= 'admin.js';
    wp_enqueue_script('admin_js', $admin_js, array('jquery', 'media-upload'), THEME_VERSION);
}
add_action( 'admin_init', 'register_admin_styles' );

function register_site_scripts() {
    if (is_admin()) { return false; }

    wp_deregister_script('jquery');
    wp_register_script('jquery', '', false, JQUERY_VERSION, true);

    $public_js_dir = get_template_directory_uri();
    $public_js_dir .= '/public/js/';

    $vendor_queue = array('jquery');
    $vendor_js = (ENV == 'production') ? 'vendor.min.js' : 'vendor.js';
    $vendor_js = $public_js_dir . $vendor_js;
    wp_enqueue_script('vendor_js', $vendor_js, $vendor_queue, THEME_VERSION, true);

    $main_queue = array('jquery', 'vendor_js');
    $main_js = (ENV == 'production') ? 'main.min.js' : 'main.js';
    $main_js = $public_js_dir . $main_js;
    wp_enqueue_script('main_js', $main_js, $main_queue, THEME_VERSION, true);

    $js_vars = array(
        'ajaxUrl' => get_permalink(get_page_by_title('Ajax')),
        'env' => ENV,
        'homeUrl' => get_bloginfo('url')
    );
    wp_localize_script('main_js', 'phpVars', $js_vars);
}
add_action('wp_enqueue_scripts', 'register_site_scripts');

register_nav_menus(array(
    'dossie_menu' => 'Menu do dossie',
    'ferramentas_menu' => 'Menu de ferramentas'
));
