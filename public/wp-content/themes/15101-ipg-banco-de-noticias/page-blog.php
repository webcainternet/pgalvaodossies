<?php
/*
Template Name: Blog
*/


the_post();
get_header();

$paged = 1;

if (isset($_GET) && array_key_exists('paged', $_GET)) {
  $paged = (int) $_GET['paged'];
  if ($paged < 1) { $paged = 1; }
}

$args = array(
  'post_type' => 'post',
  'paged' => $paged,
  'posts_per_page' => get_option('posts_per_page')
);

$query = new WP_Query($args);
?>

<div class="container">
  <h1 class="page__title page__title--search">Blog</h1>

  <ul class="search-result__list">
    <?php if ($query->have_posts()): while ($query->have_posts()): $query->the_post();  ?>
      <?php ipg_get_partial('search-result-generico'); ?>
    <?php endwhile; endif; ?>
    <?php wp_reset_query(); ?>
    <?php wp_reset_postdata(); ?>
  </ul>

  <?php ipg_get_partial('pagination', array(
    'base_url' => get_bloginfo('url'),
    'query' => $query
  )); ?>
</div>

<?php get_footer(); ?>
