<?php
// text
function ipg_cf_violence(){
    global $post, $meta_boxes;

    $order = get_post_meta($post->ID, '_cf_order', true);
    $order = (empty($order)) ? 0 : (int) $order;

    $not_hidden = get_post_meta($post->ID, '_cf_not_hidden', true);
    $not_hidden = (empty($not_hidden) || $not_hidden == '0') ? 0 : 1;

    $not_hidden_index = get_post_meta($post->ID, '_cf_not_hidden_index', true);
    $not_hidden_index = (empty($not_hidden_index) || $not_hidden_index == '0') ? 0 : 1;

    $quadrinho_terms = get_terms(array('chave'));
    $quadrinho_radio = get_post_meta($post->ID, '_cf_qd_chave', true);

    $chave_sel_first = false;
    if (empty($quadrinho_radio)) {
        $chave_sel_first = true;
    }

    include('view.html.php');
}

function ipg_cf_violence_add() {
    add_meta_box(
        'ipg_cf_violence',
        'Utilidades',
        'ipg_cf_violence',
        'violencias',
        'side',
        'high'
    );
}

add_action( 'add_meta_boxes', 'ipg_cf_violence_add' );

function ipg_cf_violence_save(){
    global $post;

    if (!isset($_REQUEST['_cf_order'])) { return; }

    $order = (empty($_POST['_cf_order'])) ? 0 : (int) $_POST['_cf_order'];
    update_post_meta($post->ID, '_cf_order', $order);

    $not_hidden = ($_POST['_cf_not_hidden'] && $_POST['_cf_not_hidden'] == '1') ? '1' : '0';
    update_post_meta($post->ID, '_cf_not_hidden', $not_hidden);

    $not_hidden_index = ($_POST['_cf_not_hidden_index'] && $_POST['_cf_not_hidden_index'] == '1') ? '1' : '0';
    update_post_meta($post->ID, '_cf_not_hidden_index', $not_hidden_index);

    update_post_meta($post->ID, '_cf_qd_chave', $_POST['_cf_qd_chave']);
}
add_action('save_post', 'ipg_cf_violence_save');
