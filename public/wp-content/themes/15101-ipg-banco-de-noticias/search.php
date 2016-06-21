<?php
  global $tpl_engine;
  $term = get_search_query();
?>
<?php get_header(); ?>

<div class="c-wrapper">
  <div class="c-highlight">
      <h1 class="o-page-title c-highlight__title"><span class="c-highlight__title-text">Busca</span></h1>
  </div>
  <div class="s-container" role="main">
     <div class="c-text__excerpt" role="article">
        Resultado da busca para: <strong><?php echo $term ?></strong>
      </div>
    <div class="col-lg-1"></div>
    <div class="row">
       <div class="col-lg-10">
        <div class="filters" >
          <?php $tpl_engine->partial('archive-filters'); ?>
        </div>

        <ul class="archive__list u-list-unstyled">
          <li class="c-archive-item c-archive-item--pesquisa">
            <?php while (have_posts()): the_post();  ?>
              <?php
                $type = get_post_type();
              ?>
              <?php if ($type == 'pesquisas'): ?>
                <div class="c-archive-item__info-content">
                  <?php echo $tpl_engine->partial('search-result-pesquisas'); ?>
                </div>
              <?php elseif ($type == 'fontes'): ?>
                <div class="c-archive-item__info-content">
                  <?php echo $tpl_engine->partial('search-result-fontes'); ?>
                </div>
              <?php elseif ($type == 'violencias'): ?>
                <div class="c-archive-item__info-content">
                  <?php echo $tpl_engine->partial('search-result-violencias'); ?>
                </div>
              <?php else: ?>
                <div class="c-archive-item__info-content">
                  <?php echo $tpl_engine->partial('search-result-generico'); ?>
                </div>
              <?php endif; ?>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
          </li>
        </ul>
      </div>
      <div class="col-lg-1"></div>
    </div>
    <?php $tpl_engine->partial('pagination'); ?>
  </div>
  <a class="mobile-menu__text--arrow go-to-top js-go-to-top" href="#"><span class="icon icon-arrow-up"></span></a>
</div>
<?php get_footer(); ?>
