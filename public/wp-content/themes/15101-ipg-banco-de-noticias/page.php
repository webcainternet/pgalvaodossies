<?php the_post(); ?>
<?php get_header(); ?>

<div class="c-wrapper">
  <div class="c-highlight">
    <?php the_post_thumbnail('full'); ?>

    <h1 class="o-page-title c-highlight__title"><span class="c-highlight__title-text"><?php the_title(); ?></span></h1>
  </div>

  <div class="s-container" role="main">
    <div class="c-text">
      <div class="c-text__excerpt" role="article">
        <?php the_excerpt(); ?>
      </div>

      <div class=" c-text__content" role="article">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
