<?php
/*
Template Name: Contato
*/

?>

<?php the_post(); ?>
<?php get_header(); ?>

<div class="c-wrapper">
  <div class="c-highlight">
    <?php the_post_thumbnail('full'); ?>

    <h1 class="o-page-title c-highlight__title"><span class="c-highlight__title-text"><?php the_title(); ?></span></h1>
  </div>

  <div class="s-container c-contact" role="main">
    <div class=" c-text__content c-contact__contente" role="article">
      <?php the_content(); ?>
    </div>
  </div>

</div>

<?php get_footer(); ?>
