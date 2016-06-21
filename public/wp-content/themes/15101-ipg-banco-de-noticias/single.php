<?php
the_post();
get_header();

// Exposing wp global vars
global $post;
global $tpl_engine;

// Storing to garantee data integrity later
$original_post = $post;

// Getting basic data
$post_id = get_the_ID();

// Reestabilishing the original post after heavy wp global
// data manipulation
$post = $original_post;

$post_name = $post->post_name;

global $page_has_highlights;

$page_has_highlights = true;

$show_highlights_summary = (int) get_post_meta($post_id, '_cf_highlight_summary', true);
$show_highlights_nav = (int) get_post_meta($post_id, '_cf_highlight_nav', true);
$highlights = get_post_meta($post_id, '_cf_highlights', true);
$highlights = json_decode($highlights, true);

$vars = array(
  'show_highlights_summary' => $show_highlights_summary,
  'show_highlights_nav' => $show_highlights_nav,
  'highlights' => $highlights
)

?>



<div class="c-wrapper">
  <div class="c-highlight">
    <div class="c-highlight__image-content">
      <?php the_post_thumbnail('full'); ?>
    </div>

    <h1 class="o-page-title c-highlight__title"><span class="c-highlight__title-text"><?php the_title(); ?></span></h1>
  </div>

  <div class="s-container" role="main">
    <div class="c-text">
      <div class="c-text__excerpt" role="article">
        <?php the_excerpt(); ?>
      </div>
    </div>
  </div>


  <?php echo $tpl_engine->partial('highlights/whole', array('vars' => $vars)); ?>
  <?php wp_reset ?>


  <?php echo $tpl_engine->partial('highlights/linear-nav'); ?>
</div>
<?php echo $tpl_engine->partial('highlights/mobile', array('vars' => $vars)); ?>

<?php get_footer(); ?>
