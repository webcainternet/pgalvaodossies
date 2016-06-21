<?php

function ipg_sc_boxout($attr, $content = null, $code = "") {
    // Alignments: left|right|center|none
    $attr = shortcode_atts(
        array(
            'alignment' => 'none',
            'style' => 'dark'
        ),
    $attr, 'boxout');

    $boxout_classes = 'align' . $attr['alignment'] . 'style' . $attr['style'];
    $boxout_classes .= ' sc-boxout';
    $boxout_classes .= ' sc-boxout--' . $attr['alignment'] . ' sc-boxout--' . $attr['style'];

    $format = array(
        '<div class="%s">',
            '<p>%s</p>',
        '</div>'
    );
    $format = implode('', $format);

    return sprintf($format, $boxout_classes, $content);
}

add_shortcode('boxout', 'ipg_sc_boxout');
