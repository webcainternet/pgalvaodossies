<?php
// text
function ipg_cf_capitulo(){
    global $post, $meta_boxes;

    $order = get_post_meta($post->ID, '_cf_order', true);
    $order = (empty($order)) ? 0 : (int) $order;

    $not_hidden_index = get_post_meta($post->ID, '_cf_not_hidden_index', true);
    $not_hidden_index = (empty($not_hidden_index) || $not_hidden_index == '0') ? 0 : 1;

    include('view.html.php');
}

function ipg_cf_capitulo_add() {
    add_meta_box(
        'ipg_cf_capitulo',
        'Utilidades',
        'ipg_cf_capitulo',
        'capitulo',
        'side',
        'high'
    );
}

add_action( 'add_meta_boxes', 'ipg_cf_capitulo_add' );

function ipg_cf_capitulo_save(){
    global $post;

    if (!isset($_REQUEST['_cf_order'])) { return; }

    $order = (empty($_POST['_cf_order'])) ? 0 : (int) $_POST['_cf_order'];
    update_post_meta($post->ID, '_cf_order', $order);

    $not_hidden = ($_POST['_cf_not_hidden'] && $_POST['_cf_not_hidden'] == '1') ? '1' : '0';
    update_post_meta($post->ID, '_cf_not_hidden', $not_hidden);

    $not_hidden_index = ($_POST['_cf_not_hidden_index'] && $_POST['_cf_not_hidden_index'] == '1') ? '1' : '0';
    update_post_meta($post->ID, '_cf_not_hidden_index', $not_hidden_index);
}
add_action('save_post', 'ipg_cf_capitulo_save');
