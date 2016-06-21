<?php
  global $tpl_engine;
  the_post();

?>
<?php get_header(); ?>


<div class="c-wrapper">
  <div class="s-container" role="main">
    <div class="c-archive-item__info-content">
      <?php $tpl_engine->partial('search-result-pesquisas'); ?>
    </div>
    <?php //echo do_shortcode("[mashshare]"); ?>
    <div style="clear:both;"></div>
  </div>

  <?php $tpl_engine->partial('highlights/whole'); ?>

  <?php $tpl_engine->partial('highlights/linear-nav'); ?>
</div>
<?php $tpl_engine->partial('highlights/mobile'); ?>

<?php get_footer(); ?>
