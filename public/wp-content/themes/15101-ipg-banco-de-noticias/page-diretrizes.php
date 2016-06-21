<?php
/*
Template Name: Diretrizes
*/

$args = array(
  'post_type' => 'diretrizes',
  'posts_per_page'         => -1,
  'order' => 'ASC'
);


$diretrizes = new WP_Query( $args );

?>

<?php get_header(); ?>

<div class="c-wrapper">
  <div class="c-highlight">
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

    <nav class="c-dynamic-summary" role="nav">
      <ul class="c-dynamic-summary__list">

        <?php if ($diretrizes->have_posts()): while($diretrizes->have_posts()): $diretrizes->the_post(); ?>
        <?php $diretrizes_meta = qdi_get_meta_values(); ?>
          <li class="c-dynamic-summary__item js-dynamic-summary__item c-dynamic-summary__item--<?php echo( basename(get_permalink()) ); ?>">
            <a class="c-dynamic-chapters__link js-dynamic-chapters__link" href="#"><h4 class="c-dynamic-chapters__item-title"><?php the_title(); ?></h4></a>
            <div class="c-dynamic-chapters">
              <h3 class="c-dynamic-chapters__title"><?php the_title(); ?></h3>
              <div class="c-dynamic-chapters__excerpt"><?php the_content(); ?></div>
              <?php if ($diretrizes_meta['pdf']) : ?>
                <a class="o-btn c-dynamic-chapters__btn" href="<?php echo $diretrizes_meta['pdf']; ?>" download>Download do pdf</a>
              <?php endif ?>
            </div>
          </li>
        <?php endwhile; endif; ?>

      </ul>
    </nav>
  </div>
</div>

<?php get_footer(); ?>
