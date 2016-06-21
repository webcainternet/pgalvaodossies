<?php

function ipg_sc_aligner($attr, $content = null, $code = "") {
    // Alignments: left|right|center|none
    $attr = shortcode_atts(
        array(
            'alignment' => 'none'
        ),
    $attr, 'aligner');

    $align_classes = 'caligner--' . $attr['alignment'];

    $format = array(
        '<div class="%s">',
            $content,
        '</div>'
    );
    $format = implode('', $format);

    return sprintf($format, $align_classes);
}

add_shortcode('aligner', 'ipg_sc_aligner');
