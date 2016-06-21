<?php
/*
Template Name: Clipping
*/

$args = array(
  'post_type' => 'clipping',
  'posts_per_page' => 10

);


$clipping = new WP_Query( $args );
?>

<?php the_post(); ?>
<?php get_header(); ?>


<div class="c-wrapper">
  <div class="c-highlight">
    <h1 class="o-page-title c-highlight__title"><span class="c-highlight__title-text"><?php the_title(); ?></span></h1>
  </div>

  <div class="s-container" role="main">

      <div class="c-text__excerpt" role="article">
         <?php the_excerpt(); ?>
      </div>

      <div class="row">
        <div class="col-xs-12 col-md-8">
          <div class="row">
            <?php if ($clipping->have_posts()): while($clipping->have_posts()): $clipping->the_post(); ?>
              <div class="col-xs-12 col-md-6">
                <div class="c-clipping">
                  <?php $clipping_meta = qdi_get_meta_values(); ?>

                  <div class="c-clipping__title">
                     <div class="c-clipping__thumb col-md-6">
                        <?php the_post_thumbnail(); ?>
                     </div>

                     <h1 class="col-md-6"><?php echo trim_words(get_the_title(get_the_ID()), 4); ?></h1>
                  </div>

                  <div class="c-clipping__infos">
                     <p class="col-md-6">Veículo: <span><?php echo $clipping_meta['from']; ?></span></p>
                     <p class="col-md-6">Data: <span><?php echo $clipping_meta['data']; ?></span></p>
                  </div>

                  <p class="c-clipping__more col-md-12"><a href=" <?php echo $clipping_meta['link']; ?> ">Leia na íntegra</a></p>
                </div>
              </div>
            <?php endwhile; endif; ?>
          </div>

          <div class="col-xs-12">
            <div class="pagination">
                <?php $tpl_engine->partial('pagination', array(
                  'query' => $clipping,
                  'base_url' => get_bloginfo('url') . '/clipping'
               )); ?>
            </div>
          </div>
        </div>

        <aside class="col-xs-12 col-md-4">
          <div class="c-clipping__twitter">

            <a class="twitter-timeline" href="https://twitter.com/hashtag/feminicidio" data-widget-id="704779158505844736">feminicidio Tweets</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

          </div>

          <div class="c-clipping__facebook">
             <div class="fb-page" data-href="https://www.facebook.com/agenciapatriciagalvao/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/agenciapatriciagalvao/"><a href="https://www.facebook.com/agenciapatriciagalvao/">Agência Patrícia Galvão</a></blockquote></div></div>
          </div>

        </aside>
      </div>
  </div>

</div>
<?php wp_reset_query (); ?>
<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>
