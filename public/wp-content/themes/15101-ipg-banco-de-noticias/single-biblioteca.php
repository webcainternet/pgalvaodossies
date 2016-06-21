<?php the_post(); ?>
<?php get_header(); ?>
<?php
$biblioteca_meta = qdi_get_meta_values();
?>

<div class="c-wrapper">
  <div class="s-container" role="main">
    <p class="c-biblioteca__btn"><a href="../"> < Voltar </a></p>

    <h1 class="c-biblioteca__single-title">Titulo</h1>
    <div class="c-text c-text--full">
      <div class="c-text__excerpt" role="article">
        <div class="row">
          <div class="col-md-12">
          <?php if ($biblioteca_meta['check'] != 'sim'): ?>
            <div class="c-biblioteca__img">
          <?php else: ?>
            <div class="c-biblioteca__infogram">
          <?php endif; ?>
              <?php the_content(); ?>
            </div>
          </div>
          <?php if ($biblioteca_meta['check'] != 'sim'): ?>
            <div class="col-md-6 u-pull-left">
              <p class="c-biblioteca__btn">
                <a target="_blank" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" download> Download </a>
              </p>
            </div>
            <div class="col-md-6">
              <p class="u-pull-right"><?php //echo do_shortcode("[mashshare]"); ?></p>
            </div>
          <?php endif; ?>
          <div class="col-xs-12">
            <div class="row">
              <div class="col-md-6">
                <p class="c-biblioteca__btn--text c-biblioteca__btn--text--anterior u-pull-left"><?php previous_post_link('%link', '< Anterior'); ?></p>
              </div>

              <div class="col-md-6">
                <p class="c-biblioteca__btn--text c-biblioteca__btn--text--proximo u-pull-right"><?php next_post_link('%link', 'Próximo >'); ?></p>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
