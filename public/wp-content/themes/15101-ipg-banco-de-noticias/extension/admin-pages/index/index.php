<?php

add_action('admin_menu', 'ipg_adpg_index');

function ipg_adpg_index() {
  add_menu_page(
    'Administração',
    'Administração',
    'manage_options',
    'ipg-admin/ipg-admin-pages.php',
    'ipg_adpg_index_view',
    'dashicons-admin-settings',
    0
  );
}

function ipg_adpg_index_view() {
    $form_sent = false;
    $prefix = '_ipg_global_';
    $fields = array(
        $prefix . 'public' => array(
            'type' => 'boolean',
            'title' => 'Página visível para todos',
            'tip' => 'Caso essa opção não esteja marcada, apenas administradores poderão ver o site',
            'value' => get_option($prefix . 'public', '')
        ),
        $prefix . 'facebook' => array(
            'type' => 'url',
            'title' => 'Link da página no Facebook',
            'value' => get_option($prefix . 'facebook', '')
        ),
        $prefix . 'twitter' => array(
            'type' => 'url',
            'title' => 'Link da página no Twitter',
            'value' => get_option($prefix . 'twitter', '')
        ),
        $prefix . 'googleplus' => array(
            'type' => 'url',
            'title' => 'Link da página no Google+',
            'value' => get_option($prefix . 'googleplus', '')
        )
    );

    if (isset($_REQUEST['save_options']) && $_REQUEST['save_options'] == 'Y') {
        foreach ($fields as $field => $type) {
            $value = $_REQUEST[$field];
            update_option($field, $value);
            $fields[$field]['value'] = $value;
        }

        $form_sent = true;
    }

    include('view.html.php');
}
