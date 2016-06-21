<?php get_header(); ?>

<div class="c-wrapper">
  <div class="c-highlight">
    <h1 class="o-page-title c-highlight__title"><span class="c-highlight__title-text">Biblioteca</span></h1>
  </div>

    <div class="s-container" role="main">

        <div class="row">
            <?php if (have_posts()): while(have_posts()): the_post(); ?>
                <div class="col-xs-6 col-md-3">
                    <a href="<?php the_permalink(); ?>" class="c-biblioteca__link">
                        <div class="c-biblioteca__link__imagem">
                            <?php the_post_thumbnail('regular'); ?>
                        </div>
                        <div class="c-biblioteca__link__titulo">
                            <h1><?php the_title(); ?></h1>
                        </div>
                    </a>
                </div>

                <?php endwhile; endif; ?>
                <?php wp_reset_query (); ?>
                <?php wp_reset_postdata(); ?>

                <div class="col-xs-12">
                  <div class="pagination">
                      <?php $tpl_engine->partial('pagination', array(
                       'base_url' => get_bloginfo('url') . '/biblioteca'
                     )); ?>
                  </div>
                </div>
        </div>
    </div>


</div>

<?php get_footer(); ?>
