<?php

function ipg_get_link_term($options) {
    $defaults = array(
        'post_id' => null,
        'page' => '',
        'title' => '',
        'separator' => '',
        'taxonomy' => null,
        'param' => null
    );

    $options = array_merge($defaults, $options);

    if ($options['taxonomy'] === null || $options['param'] === null) {
        return false;
    }

    if ($options['post_id'] == null) {
        $options['post_id'] = get_the_ID();
    }

    if (!$options['post_id']) { return false; }

    $post_id = $options['post_id'];
    $taxonomy = $options['taxonomy'];
    $page = $options['page'];
    $param = $options['param'];
    $title = $options['title'];
    $separator = $options['separator'];
    $all_terms = '';

    $terms = get_the_terms($post_id, $taxonomy);

    if ($terms && ! is_wp_error($terms)) {
        $term_links = array();
        $url = get_bloginfo('url');

        foreach ($terms as $term) {
            if (empty($page)) {
                $local_url = '%s/?%s=%s';
                $local_url = sprintf($local_url, $url, $param, $term->slug);
            } else {
                $local_url = '%s/%s/?%s=%s';
                $local_url = sprintf($local_url, $url, $page, $param, $term->slug);
            }

            $term_string = '<a href="%s" rel="tag">%s</a>';
            $terms_links[] = sprintf($term_string, $local_url, $term->name);
        }

        $separator = ($separator != "") ? ' ' . $separator . ' ' : $separator;
        $title = ($title != "") ? '<span class="result__info-title">' . $title . ':</span> ' : $title;
        $all_terms = implode($separator, $terms_links);
        $all_terms = $title . $all_terms;
    }

    return $all_terms;
}

function ipg_the_link_term($options) {
    echo ipg_get_link_term($options);
}
