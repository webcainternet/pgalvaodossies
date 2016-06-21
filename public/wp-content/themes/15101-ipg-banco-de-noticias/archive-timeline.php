<?php
  global $tpl_engine;
  get_header();
?>

<div class="c-wrapper">
  <div class="c-highlight">
    <h1 class="o-page-title c-highlight__title"><span class="c-highlight__title-text">Timeline</span></h1>
  </div>

  <div class="s-container" role="main">
    <?php echo $tpl_engine->partial('timeline'); ?>
  </div>
</div>

<?php get_footer(); ?>
