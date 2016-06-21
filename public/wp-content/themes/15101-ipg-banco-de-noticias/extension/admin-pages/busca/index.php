<?php

add_action('admin_menu', 'ipg_adpg_busca');

function ipg_adpg_busca() {
    add_submenu_page(
        'ipg-admin/ipg-admin-pages.php',
        'Busca',
        'Busca',
        'manage_options',
        'ipg-admin/ipg-admin-pages-busca.php',
        'ipg_adpg_busca_view'
    );
}

function ipg_adpg_busca_view() {
    $form_sent = false;
    $prefix = '_ipg_busca_';
    $fields = array(
        $prefix . 'titulo' => array(
            'type' => 'text',
            'title' => 'Texto do Título',
            'value' => get_option($prefix . 'titulo', '')
        ),
        $prefix . 'conteudo' => array(
            'type' => 'textarea',
            'title' => 'Texto de Conteúdo',
            'value' => get_option($prefix . 'conteudo', '')
        ),
        $prefix . 'imagem' => array(
            'type' => 'upload',
            'title' => 'Imagem da página',
            'value' => get_option($prefix . 'imagem', '')
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
