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

?>

<h1><?php the_title(); ?></h1>
<?php the_content(); ?>
<h2>Seções</h2>

<?php echo $tpl_engine->partial('highlights/whole'); ?>
<?php echo $tpl_engine->partial('highlights/linear-nav'); ?>

<?php get_footer(); ?>
