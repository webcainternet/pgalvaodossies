<?php
// text
function ipg_cf_o_dossie(){
    global $post, $meta_boxes;

    $_cf_o_dossie_btn1_link = get_post_meta($post->ID, '_cf_o_dossie_btn1_link', true);
    $_cf_o_dossie_btn1_text = get_post_meta($post->ID, '_cf_o_dossie_btn1_text', true);
    $_cf_o_dossie_btn2_link = get_post_meta($post->ID, '_cf_o_dossie_btn2_link', true);
    $_cf_o_dossie_btn2_text = get_post_meta($post->ID, '_cf_o_dossie_btn2_text', true);

    include('view.html.php');
}

function ipg_cf_o_dossie_add() {
    global $post;
    $page_template = get_post_meta( $post->ID, '_wp_page_template', true );
    $pages = array('page-o-dossie.php');
    if(!in_array($page_template, $pages)) { return; }

    add_meta_box(
        'ipg_cf_o_dossie',
        'Dados dos botões',
        'ipg_cf_o_dossie',
        'page',
        'normal',
        'high'
    );
}

add_action( 'add_meta_boxes', 'ipg_cf_o_dossie_add' );

function ipg_cf_o_dossie_save(){
    global $post;

    $fields = array(
        '_cf_o_dossie_btn1_link',
        '_cf_o_dossie_btn1_text',
        '_cf_o_dossie_btn2_link',
        '_cf_o_dossie_btn2_text'
    );

    $should_return = false;

    foreach ($fields as $field) {
        if (isset($_REQUEST[$field])) { continue; }
        $should_return = true;
    }

    if ($should_return) { return; }

    foreach ($fields as $field) {
        update_post_meta($post->ID, $field, $_REQUEST[$field]);
    }
}
add_action('save_post', 'ipg_cf_o_dossie_save');
