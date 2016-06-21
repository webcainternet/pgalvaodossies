<?php

// text
function ipg_cf_highlights() {
    global $post, $meta_boxes;

    $post_id = (int) $post->ID;
    $highlights = get_post_meta($post_id, '_cf_highlights', true);
    $highlights = json_decode($highlights, true);

    if (empty($highlights)) {
        $highlights = array();
    }

    $highlight_count = (int) get_post_meta($post_id, '_cf_highlight_count', true);
    $highlight_summary = (int) get_post_meta($post_id, '_cf_highlight_summary', true);
    $highlight_nav = (int) get_post_meta($post_id, '_cf_highlight_nav', true);

    include('view.html.php');
}

function ipg_cf_highlights_add() {
    global $post;
    $page_template = get_post_meta( $post->ID, '_wp_page_template', true );

    $pages = array('page-highlights.php');

    add_meta_box(
        'ipg_cf_highlights',
        'Seções',
        'ipg_cf_highlights',
        'pesquisas',
        'normal',
        'high'
    );

    add_meta_box(
        'ipg_cf_highlights',
        'Seções',
        'ipg_cf_highlights',
        'violencias',
        'normal',
        'high'
    );

    if(!in_array($page_template, $pages)) { return; }

    add_meta_box(
        'ipg_cf_highlights',
        'Seções',
        'ipg_cf_highlights',
        'page',
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'ipg_cf_highlights_add');

function ipg_cf_highlights_save(){
    global $post;

    if (!isset($_REQUEST['_highlights_count'])) { return; }

    if ( get_magic_quotes_gpc() ) {
        $_POST      = array_map( 'stripslashes_deep', $_POST );
        $_GET       = array_map( 'stripslashes_deep', $_GET );
        $_COOKIE    = array_map( 'stripslashes_deep', $_COOKIE );
        $_REQUEST   = array_map( 'stripslashes_deep', $_REQUEST );
    }

    $highlights = array();
    $highlights_raw = $_REQUEST['register']['highlights'];
    $count = (int) $_REQUEST['_highlights_count'];
    $count = ($count < 0) ? 0 : $count;


    foreach ($highlights_raw as $item => $value) {
        if ($item === '{{keys}}') { continue; }
        $escape = array("\n", "\r", "\\\"", "\\'", "\t");
        $replace = array("\\n", "\\r", "\"", "'", "\\t");
        $value['description'] = str_replace($escape, $replace, $value['description']);
        $value['description'] = htmlentities($value['description'], ENT_QUOTES, 'UTF-8');

        $replace = array("\\n", "\\r", "&quot;", "'", "\\t");

        $value['title'] = str_replace($escape, $replace, $value['title']);
        $value['title'] = htmlentities($value['title'], ENT_QUOTES, 'UTF-8');
        $highlights[$item] = $value;
    }

    $highlights = json_encode($highlights);
    $highlights = preg_replace_callback('/\\\u(\w{4})/', function ($matches) {
        return html_entity_decode('&#x' . $matches[1] . ';', ENT_COMPAT, 'UTF-8');
    }, $highlights);

    update_post_meta($post->ID, '_cf_highlights', $highlights);
    update_post_meta($post->ID, '_cf_highlight_count', $count);
    update_post_meta($post->ID, '_cf_highlight_summary', $_REQUEST['_highlights_summary']);
    update_post_meta($post->ID, '_cf_highlight_nav', $_REQUEST['_highlights_nav']);
}
add_action('save_post', 'ipg_cf_highlights_save');
