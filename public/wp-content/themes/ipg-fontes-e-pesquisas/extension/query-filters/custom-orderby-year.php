<?php

function custom_orderby_year( $clauses, $wp_query ) {
    global $wpdb;

    if ( isset( $wp_query->query['orderby'] ) && 'ano' == $wp_query->query['orderby'] ) {

        $clauses['join'] .= <<<SQL
LEFT OUTER JOIN {$wpdb->term_relationships} ON {$wpdb->posts}.ID={$wpdb->term_relationships}.object_id
LEFT OUTER JOIN {$wpdb->term_taxonomy} USING (term_taxonomy_id)
LEFT OUTER JOIN {$wpdb->terms} USING (term_id)
SQL;

        $clauses['where'] .= " AND (taxonomy = 'ano' OR taxonomy IS NULL)";
        $clauses['groupby'] = "object_id";
        $clauses['orderby']  = "GROUP_CONCAT({$wpdb->terms}.name ORDER BY name ASC) ";
        $clauses['orderby'] .= ( 'ASC' == strtoupper( $wp_query->get('order') ) ) ? 'ASC' : 'DESC';
    }

    return $clauses;
}
add_filter( 'posts_clauses', 'custom_orderby_year', 10, 2 );
