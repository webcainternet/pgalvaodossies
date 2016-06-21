<?php

global $page_has_highlights;
global $tpl_engine;

$page_has_highlights = true;

$post_id = get_the_ID();
$show_highlights_summary = (int) get_post_meta($post_id, '_cf_highlight_summary', true);
$show_highlights_nav = (int) get_post_meta($post_id, '_cf_highlight_nav', true);
$highlights = get_post_meta($post_id, '_cf_highlights', true);
$highlights = json_decode($highlights, true);

?>

<?php
if ($show_highlights_summary) {
  // TODO: Apagar título
  echo '<h2>Sumário</h2>';
  echo $tpl_engine->partial('highlights/summary', array('highlights' => $highlights));
}
?>

<?php
if ($show_highlights_nav) {
  // TODO: Apagar título
  echo '<h2>Menu</h2>';
  echo $tpl_engine->partial('highlights/menu', array('highlights' => $highlights));
}
?>

<!-- TODO: Apagar título -->
<h2>Textos</h2>
<?php $tpl_engine->partial('highlights/sections', array('highlights' => $highlights)); ?>

