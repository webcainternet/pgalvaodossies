<?php

add_action('admin_menu', 'ipg_adpg_home');

function ipg_adpg_home() {
    add_submenu_page(
        'ipg-admin/ipg-admin-pages.php',
        'Home',
        'Home',
        'manage_options',
        'ipg-admin/ipg-admin-pages-home.php',
        'ipg_adpg_home_view'
    );
}

function ipg_adpg_home_view() {
    $form_sent = false;
    $prefix = '_ipg_home_';
    $fields = array(
        $prefix . 'destaque' => array(
            'type' => 'textarea',
            'title' => 'Texto de destaque',
            'value' => get_option($prefix . 'destaque', '')
        ),
        $prefix . 'conteudo' => array(
            'type' => 'textarea',
            'title' => 'Texto de Conteúdo',
            'value' => get_option($prefix . 'conteudo', '')
        ),
        $prefix . 'botao' => array(
            'type' => 'text',
            'title' => 'Texto do Botão',
            'value' => get_option($prefix . 'botao', '')
        ),
        $prefix . 'link_button' => array(
            'type' => 'url',
            'title' => 'Link do Botão',
            'value' => get_option($prefix . 'link_button', '')
        ),
        $prefix . 'link_video' => array(
            'type' => 'url',
            'title' => 'Link do Video',
            'value' => get_option($prefix . 'link_video', '')
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
