<?php

add_filter('relevanssi_match', 'relevansii_custom_weight');
function relevansii_custom_weight($match) {
    $relevancia = (int) get_post_meta($match->doc, '_cf_relevancia', true);
    if (empty($relevancia)) { $relevancia = 0; }
    if ($relevancia < 1) { $relevancia = 1; }
    $match->weight = $match->weight * $relevancia;
    return $match;
}
