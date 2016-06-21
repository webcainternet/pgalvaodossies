<?php
/*
Template Name: Sobre as violências
*/
the_post();
get_header();

$post_id = $post->ID;

$start_reading_link = false;

$args = array(
  'post_type' => 'violencias',
  'posts_per_page' => -1,
  'order' => 'ASC',
  'orderby' => 'meta_value_num',
  'meta_key' => '_cf_order',
  'meta_query' => array(
      array(
          'key' => '_cf_not_hidden_index',
          'value' => '1',
          'compare' => '='
      )
  )
);

$query = new WP_Query($args);
?>

<div class="container">
  <?php the_post_thumbnail('full_image'); ?>

  <h1 class="page__title"><?php the_title(); ?></h1>

  <div class="clearfix textblock">
    <?php the_content(); ?>
  </div>

  <div class="page--about__info">
    <ul class="page--about__info-list">
      <div class="row">
        <?php if ($query->have_posts()): while ($query->have_posts()): $query->the_post();  ?>
          <?php
            if (!$start_reading_link) {
              $start_reading_link = get_permalink();
            }
          ?>

          <div class="col-sm-12 col-md-3">
            <li class="page--about__info-item">
              <a class="page--about__info-link" href="<?php the_permalink() ?>">
                <span class="page--about__info-img"><?php the_post_thumbnail('quad_about') ?></span>
                <span class="page--about__info-title"><?php the_title(); ?></span>
              </a>
            </li>
          </div>

        <?php endwhile; endif; ?>
      </div>

      <?php wp_reset_query(); ?>
    </ul>
  </div>

  <div class="aligner aligner--center page__button-group">
    <a class="page__button page__button--next" href="<?php echo $start_reading_link; ?>">
      Começar a ler
      <span class="icon icon-angle-double-right"></span>
    </a>
  </div>
</div>

<?php get_footer(); ?>
