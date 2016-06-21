<?php
/*
Template Name: O Dossiê
*/

the_post();
get_header();

$_cf_o_dossie_btn1_link = get_post_meta($post->ID, '_cf_o_dossie_btn1_link', true);
$_cf_o_dossie_btn1_text = get_post_meta($post->ID, '_cf_o_dossie_btn1_text', true);
$_cf_o_dossie_btn2_link = get_post_meta($post->ID, '_cf_o_dossie_btn2_link', true);
$_cf_o_dossie_btn2_text = get_post_meta($post->ID, '_cf_o_dossie_btn2_text', true);
?>

<div class="container">
  <?php the_post_thumbnail('full_image'); ?>

  <div class="textblock">
    <h1 class="page__title"><?php the_title(); ?></h1>

    <div class="clearfix">
      <?php the_content(); ?>
    </div>

    <div class="aligner">
      <div class="page__button-group page__button-group--general">
        <a class="page__button page__button--prev" href="<?php echo $_cf_o_dossie_btn1_link; ?>">
          <?php echo $_cf_o_dossie_btn1_text; ?>
        </a>
        <a class="page__button page__button--next" href="<?php echo $_cf_o_dossie_btn2_link; ?>">
          <?php echo $_cf_o_dossie_btn2_text; ?>
        </a>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
