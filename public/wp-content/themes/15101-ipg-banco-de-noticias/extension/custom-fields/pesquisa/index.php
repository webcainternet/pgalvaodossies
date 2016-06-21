<?php
// text
function ipg_cf_search(){
    global $post, $meta_boxes;

    $custom = get_post_custom($post->ID);

    $post_id = $post->ID;

    $tipos = explode(',', get_post_meta($post_id, '_cf_tipos', true));
    $link = get_post_meta($post_id, '_cf_link', true);
    $relevancia = (int) get_post_meta($post_id, '_cf_relevancia', true);
    if (empty($relevancia)) { $relevancia = 0; }

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

function ipg_cf_search_add() {
    add_meta_box(
        'ipg_cf_search',
        'Dados para Pesquisa',
        'ipg_cf_search',
        'pesquisas',
        'normal',
        'high'
    );
}

add_action( 'add_meta_boxes', 'ipg_cf_search_add' );

function ipg_cf_search_save(){
    global $post;

    if (!isset($_REQUEST['cf_tipos'])) { return; }
    if (!isset($_REQUEST['cf_link'])) { return; }
    if (!isset($_REQUEST['cf_relevancia'])) { return; }

    $tipos = '';

    if(isset($_POST['cf_tipos'])) {
        $tipos = implode(",", $_POST["cf_tipos"]);
    }

    update_post_meta($post->ID, '_cf_tipos', $tipos);
    update_post_meta($post->ID, '_cf_link', $_REQUEST["cf_link"]);
    update_post_meta($post->ID, '_cf_relevancia', $_REQUEST["cf_relevancia"]);
}
add_action('save_post', 'ipg_cf_search_save');
