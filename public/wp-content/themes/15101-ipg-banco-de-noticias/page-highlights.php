<?php
/*
Template Name: Pagina com Seções
*/


the_post();

?>

<?php get_header(); ?>

<div class="container">
  <?php the_post_thumbnail('full_image'); ?>

  <div class="textblock">
    <h1 class="page__title"><?php the_title() ?></h1>

    <div class="clearfix">
      <?php the_content(); ?>
    </div>
  </div>
</div>

<?php ipg_get_partial('highlights-whole'); ?>

<?php get_footer(); ?>
