<?php

function ipg_sc_infogram($attr, $content = null, $code = "") {
    // Alignments: left|right|center|none
    $attr = shortcode_atts(
        array(
            'id' => '',
            'prefix' => 'aaa',
            'alignment' => 'none'
        ),
    $attr, 'infogram');

    if (empty($attr['id'])) {
        return 'Infogram: Por favor, forneça um id';
    }

    $align_classes = 'align' . $attr['alignment'];
    $align_classes .= ' sc-infogram';
    $align_classes .= ' sc-infogram--' . $attr['alignment'];

    if ($attr['prefix'] == 'aaa') {
        $attr['prefix'] = generate_random_string(3);
    }

    $format = array(
        '<div class="%s">',
            '<script id="%s" src="//e.infogr.am/js/embed.js?%s" type="text/javascript"></script>',
        '</div>'
    );
    $format = implode('', $format);

    return sprintf($format, $align_classes, $attr['id'], $attr['prefix']);
}

add_shortcode('infogram', 'ipg_sc_infogram');
