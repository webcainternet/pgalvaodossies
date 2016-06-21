<?php
the_post();
get_header();

// Exposing wp global vars
global $post;

// Storing to garantee data integrity later
$original_post = $post;

// Getting basic data
$post_id = get_the_ID();
$quadrinho_tax = get_post_meta($post_id, '_cf_qd_chave', true);

// Fetching the post images (which are stored as custom post types)
$quadrinho_args = array(
  'post_type' => 'quadrinhos',
  'posts_per_page' => 6,
  'order' => 'ASC',
  'orderby' => 'rand'
);

// If there is a selected tax, get only the posts related
// to it
if (!empty($quadrinho_tax)) {
  $quadrinho_args['tax_query'] = array(
    array(
      'taxonomy' => 'chave',
      'field'    => 'slug',
      'terms'    => $quadrinho_tax
    )
  );
}

// Divide the posts into two 6-pack groups
$t_query = quadrinhos_parser($quadrinho_args);
$thumb_first_seq = $t_query['thumbs'];

while (count($thumb_first_seq) < 6) {
  $rand_key = array_rand($thumb_first_seq);
  array_push($thumb_first_seq, $thumb_first_seq[$rand_key]);
}

// Excluding posts that were already included
$quadrinho_args['post__not_in'] = $t_query['ids'];

$t_query = quadrinhos_parser($quadrinho_args);
$thumb_scnd_seq = $t_query['thumbs'];

while (count($thumb_scnd_seq) < 6) {
  if (count($thumb_scnd_seq) == 0) {
    $thumb_scnd_seq = $thumb_first_seq;
    continue;
  }

  $rand_key = array_rand($thumb_scnd_seq);
  array_push($thumb_scnd_seq, $thumb_scnd_seq[$rand_key]);
}

// Reestabilishing the original post after heavy wp global
// data manipulation
$post = $original_post;

$post_name = $post->post_name;

?>

<div class="cover cover--<?php echo $post_name; ?>">
  <div class="container">
    <ul class="cover__story">
      <?php foreach ($thumb_first_seq as $thumb): ?>
        <li class="cover__frame">
          <img class="cover__frame-img" src="<?php echo $thumb['src']; ?>" alt="<?php echo $thumb['alt']; ?>" />
        </li>
      <?php endforeach; ?>

      <div class="cover__title-frame vertical-align">
        <h1 class="cover__title vertical-align__child">
          <?php the_title(); ?>
          <span class="cover__title cover__title--shadow"><?php the_title(); ?></span>
        </h1>
      </div>

      <?php foreach ($thumb_scnd_seq as $thumb): ?>
        <li class="cover__frame">
          <img class="cover__frame-img" src="<?php echo $thumb['src']; ?>" alt="<?php echo $thumb['alt']; ?>" />
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>

<div class="container">
  <div class="position-social">
    <?php ipg_get_partial('social-media'); ?>
  </div>


  <div class="textblock textblock--<?php echo $post_name; ?>">
    <?php the_content(); ?>
  </div>
</div>

<?php ipg_get_partial('highlights-whole'); ?>

<div class="container">
  <?php ipg_get_partial('violencias-linear-nav'); ?>

</div>

<?php get_footer(); ?>
