<?php
/*
Template Name: Legislações
*/
?>

<?php the_post(); ?>
<?php get_header(); ?>


<div class="c-wrapper">
  <div class="c-highlight">
    <?php the_post_thumbnail('full'); ?>

    <h1 class="o-page-title c-highlight__title"><span class="c-highlight__title-text"><?php the_title(); ?></span></h1>
  </div>

  <div class="s-container">
    <div class="u-no-desktop-block u-aligner">
      <?php echo $tpl_engine->svg('legislacoes_mobile'); ?>
    </div>
    <div class="u-no-mobile">
      <?php echo $tpl_engine->svg('legislacoes_desk'); ?>
    </div>
    <br>
    <br>
  </div>
</div>

<?php get_footer(); ?>
