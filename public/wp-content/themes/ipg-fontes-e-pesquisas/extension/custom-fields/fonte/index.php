<?php

// text
function ipg_cf_source(){
    global $post, $meta_boxes;

    $description = get_post_meta($post->ID, '_cf_description', true);
    $contact = get_post_meta($post->ID, '_cf_contact', true);
    $contact_email = get_post_meta($post->ID, '_cf_contact_email', true);
    $contact_phone = get_post_meta($post->ID, '_cf_contact_phone', true);
    $contact_video = get_post_meta($post->ID, '_cf_contact_video', true);
    $about = get_post_meta($post->ID, '_cf_about', true);
    $about = explode(',', $about);

    $args = array(
        'post_type' => 'violencias',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => '_cf_not_hidden',
                'value' => '1',
                'compare' => '='
            )
        )
    );

    $list = new WP_Query($args);

    include('view.html.php');
}

function ipg_cf_source_add() {
    add_meta_box(
        'ipg_cf_source',
        'Dados da Fonte',
        'ipg_cf_source',
        'fontes',
        'normal',
        'high'
    );
}

add_action( 'add_meta_boxes', 'ipg_cf_source_add' );

function ipg_cf_source_save(){
    global $post;

    if (!isset($_REQUEST['cf_description'])) { return; }
    if (!isset($_REQUEST['cf_contact'])) { return; }
    if (!isset($_REQUEST['cf_contact_email'])) { return; }
    if (!isset($_REQUEST['cf_contact_phone'])) { return; }

    $about = '';
    if($_POST['cf_about'] != '') {
        $about = implode(",", $_POST["cf_about"]);
    }

    update_post_meta($post->ID, '_cf_description', $_POST["cf_description"]);
    update_post_meta($post->ID, '_cf_contact', $_POST["cf_contact"]);
    update_post_meta($post->ID, '_cf_contact_email', $_POST["cf_contact_email"]);
    update_post_meta($post->ID, '_cf_contact_phone', $_POST["cf_contact_phone"]);
    update_post_meta($post->ID, '_cf_contact_video', $_POST["cf_contact_video"]);
    update_post_meta($post->ID, '_cf_about', $about);
}
add_action('save_post', 'ipg_cf_source_save');
