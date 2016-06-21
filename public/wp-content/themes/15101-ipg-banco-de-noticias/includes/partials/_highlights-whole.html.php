<?php


global $page_has_highlights;
$page_has_highlights = true;

$post_id = get_the_ID();
$show_highlights_summary = (int) get_post_meta($post_id, '_cf_highlight_summary', true);
$show_highlights_nav = (int) get_post_meta($post_id, '_cf_highlight_nav', true);
$highlights = get_post_meta($post_id, '_cf_highlights', true);
$highlights = json_decode($highlights, true);

?>

<?php
if ($show_highlights_summary) {
  ipg_get_partial('highlights-summary', array('highlights' => $highlights));
}
?>

<?php
if ($show_highlights_nav) {
  ipg_get_partial('highlights-menu', array('highlights' => $highlights));
}
?>

<?php ipg_get_partial('highlights', array('highlights' => $highlights)); ?>

