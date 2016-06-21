<?php

function ipg_modify_query($query, $tax_filters, $meta_filters) {
    $txt_tax_query = false;

    if (isset($_GET) && array_key_exists('txtq', $_GET)) {
      $txtq = trim($_GET['txtq']);
      if (!empty($txtq)) {
        $txt_tax_query = array(
          'taxonomy' => 'post_tag',
          'field' => 'slug',
          'terms' => $_GET['txtq']
        );
      }
    }

    $tax_query = create_tax_query($tax_filters);

    if ($txt_tax_query) {
        if ($tax_query) {
            if (count($tax_query) > 1) {
                array_push($tax_query[0], $txt_tax_query);
            } else {
                array_push($tax_query[0], $txt_tax_query);
                $tax_query = array(
                    'relation' => 'AND',
                    $tax_query[0]
                );
            }
        } else {
            $tax_query = array($txt_tax_query);
        }
    }

    if ($tax_query) {
        $query->set('tax_query', $tax_query);
    }

    $meta_query = create_meta_query($meta_filters);
    if ($meta_query) {
        $query->set('meta_query', $meta_query);
    }

    $query = create_order_args($query);


    return $query;
}

