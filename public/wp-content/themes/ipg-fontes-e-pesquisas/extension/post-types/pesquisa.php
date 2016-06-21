<?php

function ipg_cpt_pesquisa() {
  $labels = array(
    'name'               => 'Pesquisas',
    'singular_name'      => 'Pesquisa',
    'menu_name'          => 'Pesquisas',
    'name_admin_bar'     => 'Pesquisa',
    'add_new'            => 'Adicionar nova',
    'add_new_item'       => 'Adicionar nova pesquisa',
    'new_item'           => 'Nova pesquisa',
    'edit_item'          => 'Editar pesquisa',
    'view_item'          => 'Ver pesquisa',
    'all_items'          => 'Todos',
    'search_items'       => 'Buscar',
    'parent_item_colon'  => 'Pesquisa mãe',
    'not_found'          => 'Não encontrado',
    'not_found_in_trash' => 'Não encontrado'
  );

  $supports = array('title', 'editor', 'thumbnail');

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'pesquisas'),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'taxonomies' => array('post_tag'),
    'supports'           => $supports
  );

  register_post_type('pesquisas', $args);
}
add_action('init', 'ipg_cpt_pesquisa');
