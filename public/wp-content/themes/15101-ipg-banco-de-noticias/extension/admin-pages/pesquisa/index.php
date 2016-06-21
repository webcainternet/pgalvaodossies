<?php

add_action('admin_menu', 'ipg_adpg_pesquisa');

function ipg_adpg_pesquisa() {
    add_submenu_page(
        'ipg-admin/ipg-admin-pages.php',
        'Pesquisa',
        'Pesquisa',
        'manage_options',
        'ipg-admin/ipg-admin-pages-pesquisa.php',
        'ipg_adpg_pesquisa_view'
    );
}

function ipg_adpg_pesquisa_view() {
    $form_sent = false;
    $prefix = '_ipg_pesquisa_';
    $fields = array(
        $prefix . 'conteudo' => array(
            'type' => 'textarea',
            'title' => 'Texto de Introdução',
            'value' => get_option($prefix . 'conteudo', '')
        ),
        $prefix . 'name_button_1' => array(
            'type' => 'text',
            'title' => 'Nome do 1º botão de destaque',
            'value' => get_option($prefix . 'name_button_1', '')
        ),
        $prefix . 'link_button_1' => array(
            'type' => 'url',
            'title' => 'Link do 1º botão de destaque',
            'value' => get_option($prefix . 'link_button_1', '')
        ),
        $prefix . 'name_button_2' => array(
            'type' => 'text',
            'title' => 'Nome do 2º botão de destaque',
            'value' => get_option($prefix . 'name_button_2', '')
        ),
        $prefix . 'link_button_2' => array(
            'type' => 'url',
            'title' => 'Link do 2º botão de destaque',
            'value' => get_option($prefix . 'link_button_2', '')
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
