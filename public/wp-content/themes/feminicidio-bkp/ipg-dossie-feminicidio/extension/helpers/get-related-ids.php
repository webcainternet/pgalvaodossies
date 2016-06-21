<?php

function sos_get_related_ids($count = 4) {
    $relids = array();

    for ($i = 0; $i < $count; $i++) {
        array_push($relids, 0);
    }

    $relids_queue = array();

    $selected_related_posts = wp_rp_get_selected_posts();
    $relpostes = wp_rp_fetch_posts_and_title();
    $relpostes = $relpostes['posts'];

    foreach ($relpostes as $key => $relposte) {
      $relid = $relposte->ID;

      $sel_reposts = false;
      $sel_reposts = (!empty($selected_related_posts));
      $sel_reposts = ($sel_reposts && array_key_exists($key, $selected_related_posts));

      if ($sel_reposts && $selected_related_posts[$key]->type != 'empty') {
        array_push($relids_queue, $relid);
        $relid = (int) str_replace('in_', '', $relposte->ID);
        $relids[$key] = $relid;
        continue;
      }

      $relids[$key] = $relid;
    }

    foreach ($relids as $key => $relid) {
      if ($relid !== 0) { continue; }
      $relids[$key] = array_shift($relids_queue);
    }

    $parsed_relids = array();
    foreach ($relids as $relid) {
        array_push($parsed_relids, $relid);
        if (count($parsed_relids) == $count) { break; }
    }

    return $parsed_relids;
}
