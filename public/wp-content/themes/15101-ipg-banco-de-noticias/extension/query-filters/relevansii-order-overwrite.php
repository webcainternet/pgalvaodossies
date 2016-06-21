<?php

add_filter('relevanssi_modify_wp_query', 'relevanssi_order_overwrite');
function relevanssi_order_overwrite($query) {
    $query = create_order_args($query);
    return $query;
}
