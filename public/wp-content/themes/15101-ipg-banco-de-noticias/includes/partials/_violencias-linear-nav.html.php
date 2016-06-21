<?php

global $post;
$stored_post = $post;

$last_post = false;
$next_post = false;
$break_after_next = false;

$this_order = (int) get_post_meta(get_the_ID(), '_cf_order', true);

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

if ($query->have_posts()) {
  while ($query->have_posts()) {
    $query->the_post();

    $order = (int) get_post_meta(get_the_ID(), '_cf_order', true);

    $nav_tpl = array(
      'title' => get_the_title(),
      'permalink' => get_permalink()
    );

    if ($order > $this_order) {
      $next_post = $nav_tpl;
    } elseif ($order < $this_order) {
      $last_post = $nav_tpl;
    }

    if ($break_after_next) { break; }

    if ($order == $this_order) {
      $break_after_next = true;
    }
  }
}

wp_reset_query();
wp_reset_postdata();

$post = $stored_post;

?>

<div class="aligner page__button-group">

<?php if ($last_post): ?>
  <a class="page__button page__button--prev" href="<?php echo $last_post['permalink']; ?>"
     title="<?php echo $last_post['title']; ?>">
      <span class="icon icon-angle-double-left"></span>
      <span class="page__button-text"><?php echo $last_post['title']; ?></span>
  </a>
<?php endif; ?>

<?php if ($next_post): ?>
  <a class="page__button page__button--next" href="<?php echo $next_post['permalink']; ?>"
     title="<?php echo $next_post['title']; ?>">
      <span class="page__button-text"><?php echo $next_post['title']; ?></span>
      <span class="icon icon-angle-double-right"></span>
  </a>
<?php endif; ?>
</div>
