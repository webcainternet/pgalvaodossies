<?php

$post_id = get_the_ID();
$show_highlights_summary = (int) get_post_meta($post_id, '_cf_highlight_summary', true);
$show_highlights_nav = (int) get_post_meta($post_id, '_cf_highlight_nav', true);
$highlights = get_post_meta($post_id, '_cf_highlights', true);
$highlights = json_decode($highlights, true);

?>
<div class="mobile-menu">
  <?php
    if ($show_highlights_summary) {
      ipg_get_partial('highlights-menu-mobile', array('highlights' => $highlights));
    }
  ?>
</div>

<?php
  if ($show_highlights_nav) {
    ipg_get_partial('highlights-header-mobile', array('highlights' => $highlights));
  }
?>
